<?php

namespace App\Http\Controllers;

use App\Models\ImagenesSeccion;
use App\Models\Pagina;
use App\Models\SeccionContenido;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class SeccionContenidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $secciones = SeccionContenido::all();
        $tipo = 'foro';
        $imagenes = [];
        $tipo = 'CONT-seleccionarApartado';
        foreach ($secciones as $seccion) {

            $imagenes['Seccion: ' . $seccion->id . ': ' . $seccion->titulo] = [
                'imagenUno' => ImagenesSeccion::find($seccion->idImagenUno),
                'imagenDos' => ImagenesSeccion::find($seccion->idImagenDos) ?? null,
            ];
            //dd($imagenes);
        }
        return view('foro', compact('secciones', 'tipo', 'imagenes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($idPagina)
    {
        $tipo = 'CONT-crear';
        return view('admin.CONT-crear', compact('idPagina', 'tipo'));
    }

    public function crearContenido($opcion, $idPagina)
    {
        switch ($opcion) {
            case 'uno':
                $tipo = 'CONT-opcion-uno';
                return view('formularios-contenido.uno', compact('tipo', 'idPagina'));
                break;
            case 'dos':
                $tipo = 'CONT-opcion-dos';
                return view('formularios-contenido.dos', compact('tipo', 'idPagina'));


                break;
            case 'tres':
                $tipo = 'CONT-opcion-tres';
                return view('formularios-contenido.tres', compact('tipo', 'idPagina'));

                break;
            case 'cuatro':
                $tipo = 'CONT-opcion-cuatro';
                return view('formularios-contenido.cuatro', compact('tipo', 'idPagina'));

                break;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $tipoSeccion, $idPagina)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:255',
            'foto' => 'required|image|max:2048',
            'parrafo' => 'required|string|max:1000',
        ], [
            'titulo.required' => 'El titulo es requerido',
            'titulo.string' => 'El titulo debe ser un texto',
            'titulo.max' => 'El titulo no puede superar 255 caracteres',

            'foto.required' => 'La foto es obligatoria',
            'foto.max' => 'El tamaño de la foto no puede superar 2mb',

            'parrafo.required' => 'El parrafo es requerido',
            'parrafo.string' => 'El contenido del parrafo es texto',
            'parrafo.max' => 'El parrafo no puede superar los 1000 caracteres',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //dd('hola');
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $nombreArchivo = time() . '.' . $request->file('foto')->getClientOriginalExtension();
            //dd('hola');

            $ruta = $request->file('foto')->storeAs('imagenes_seccion', $nombreArchivo, 'public');

            $imagen = new ImagenesSeccion;
            $imagen->ruta_imagen = $ruta;
            $imagen->descripcion = "Imagen de nueva Seccion";
            $imagen->save();
            $seccion = new SeccionContenido;
            //dd($imagen->id);
            //dd(SeccionContenido::count());
            $seccion->idSeccion = $tipoSeccion;
            $seccion->titulo = $request->titulo;
            $seccion->parrafo = $request->parrafo;
            $seccion->idPagina = $idPagina;
            $seccion->idImagenUno = $imagen->id;
            $seccion->idImagenDos = null;
            $orden = SeccionContenido::orderBy('orden', 'desc')->where('idPagina', '=', $idPagina)->first();
            //dd($orden);
            if ($orden === null) {
                $seccion->orden = 1;
            } else {
                $seccion->orden = $orden->orden + 1;
            }
            //dd($orden);
            $seccion->save();

            $imagen->idSeccion = $seccion->id;

            return redirect()->route('CONT-vistaPrevia', ['idContenido' => $seccion->id, 'pagina' => $idPagina]);
            //Guardar contenido

        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($idSeccion, $idPagina)
    {
        $seccion = SeccionContenido::find($idSeccion);
        $imagen = ImagenesSeccion::find($seccion->idImagenUno);
        $tipo = 'CONT-vistaPrevia';
        $slug = Pagina::find($idPagina)->slug;
        //dd($seccion, $imagen, $tipo);
        return view('admin.CONT-vistaPrevia', compact('seccion', 'imagen', 'tipo', 'slug', 'idPagina'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SeccionContenido $seccionContenido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SeccionContenido $seccionContenido)
    {
        //
    }
    public function seleccionarOrden(Request $request, $idSeccion)
    {
        $partes = explode(' ', $request->orden, 2);
        //dd($partes);
        if (count($partes) === 2) {
            $posicion = $partes[0];
            $tituloSeccion = $partes[1];
            $seccionElegida = SeccionContenido::where('titulo', '=', $tituloSeccion)->first();
            //dd($seccion->orden, $posicion, $tituloSeccion);
            $seccionOrden = $seccionElegida->orden;
            $seccionNueva = SeccionContenido::find($idSeccion);
            switch ($posicion) {
                case ('encima'):
                    SeccionContenido::where('orden', '>=', $seccionOrden)->increment('orden');
                    $seccionNueva->orden = $seccionOrden;
                    break;
                case ('debajo'):
                    SeccionContenido::where('orden', '>', $seccionOrden)->increment('orden');
                    $seccionNueva->orden = $seccionOrden + 1;

                    break;
            }

            $seccionNueva->save();
            $pagina = Pagina::find($seccionNueva->idPagina);
            return redirect()->route('mostrarPagina', ['pagina' => $pagina->slug]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idSeccion)
    {
        $seccion = SeccionContenido::find($idSeccion);
        $seccion->delete();

        return redirect()->route('panel-control')->with('success', 'La seccion nueva ha sido descartada');
    }
    public function seleccionApartado($slug, $idSeccion)
    {
        //dd($slug, $idSeccion);
        $pagina = Pagina::where('slug', '=', $slug)->first();
        //dd($pagina->id);

        $secciones = SeccionContenido::where('id', '!=', $idSeccion)->where('idPagina', '=', $pagina->id)->get();
        //dd($secciones);

        $imagenes = [];
        $tipo = 'CONT-seleccionarApartado';
        foreach ($secciones as $seccion) {

            $imagenes['Seccion: ' . $seccion->id . ': ' . $seccion->titulo] = [
                'imagenUno' => ImagenesSeccion::find($seccion->idImagenUno),
                'imagenDos' => ImagenesSeccion::find($seccion->idImagenDos) ?? null,
            ];
            //dd($imagenes);
        }


        return view('admin.CONT-seleccionarApartado', compact('tipo', 'secciones', 'imagenes', 'idSeccion'));
    }

}
