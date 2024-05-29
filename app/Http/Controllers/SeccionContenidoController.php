<?php

namespace App\Http\Controllers;

use App\Models\ImagenesSeccion;
use App\Models\Pagina;
use App\Models\SeccionContenido;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Log;


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

    public function crearContenido($opcion, $idPagina, $vistaPrevia)
    {
        switch ($opcion) {
            case 'uno':
                $tipo = 'CONT-opcion-uno';
                return view('formularios-contenido.uno', compact('tipo', 'idPagina', 'vistaPrevia'));
                break;
            case 'dos':
                $tipo = 'CONT-opcion-dos';
                return view('formularios-contenido.dos', compact('tipo', 'idPagina', 'vistaPrevia'));


                break;
            case 'tres':
                $tipo = 'CONT-opcion-tres';
                return view('formularios-contenido.tres', compact('tipo', 'idPagina', 'vistaPrevia'));

                break;
            case 'cuatro':
                $tipo = 'CONT-opcion-cuatro';
                return view('formularios-contenido.cuatro', compact('tipo', 'idPagina', 'vistaPrevia'));

                break;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $tipoSeccion, $idPagina)
    {
        $rules = [
            'titulo' => 'required|string|max:255',
            'imagenUno' => 'required|image|max:2048',
            'parrafo' => 'required|string|max:1000',
        ];

        if ($tipoSeccion === '2') {
            $rules['imagenDos'] = 'required|image|max:2048';
        }

        if ($tipoSeccion === '4') {
            $rules = [
                'titulo' => 'required|string|max:255',
                'parrafo' => 'required|string|max:1000',
            ];
        }
        //dd($rules);
        $validator = Validator::make($request->all(), $rules, [
            'titulo.required' => 'El titulo es requerido',
            'titulo.string' => 'El titulo debe ser un texto',
            'titulo.max' => 'El titulo no puede superar 255 caracteres',

            'imagenUno.required' => 'La foto  imagenIzquierda es obligatoria',
            'imagenUno.max' => 'El tamaño de la foto no puede superar 2mb',

            'imagenDos.required' => 'La foto imagenDerecha es obligatoria',
            'imagenDos.max' => 'El tamaño de la foto no puede superar 2mb',

            'parrafo.required' => 'El parrafo es requerido',
            'parrafo.string' => 'El contenido del parrafo es texto',
            'parrafo.max' => 'El parrafo no puede superar los 1000 caracteres',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //dd('hola');
        if ($request->hasFile('imagenUno') && $request->file('imagenUno')->isValid()) {
            $imagenUno = $this->guardarImagen($request->file('imagenUno'), 'imagenes-uno');
            if ($imagenUno !== false) {

                $seccion = new SeccionContenido;
                //dd($imagenUno);
                //dd(SeccionContenido::count());
                $seccion->idSeccion = $tipoSeccion;
                $seccion->titulo = $request->titulo;
                $seccion->parrafo = $request->parrafo;
                $seccion->idPagina = $idPagina;
                $seccion->idImagenUno = $imagenUno->id;
                if ($request->hasFile('imagenDos') && $request->file('imagenDos')->isValid()) {
                    $imagenDos = $this->guardarImagen($request->file('imagenDos'), 'imagenes-dos');

                    $seccion->idImagenDos = $imagenDos->id;
                }
                $orden = SeccionContenido::orderBy('orden', 'desc')->where('idPagina', '=', $idPagina)->first();
                //dd($orden);
                if ($orden === null) {
                    $seccion->orden = 1;
                } else {
                    $seccion->orden = $orden->orden + 1;
                }
                //dd($orden);
                $seccion->save();

                return redirect()->route('CONT-vistaPrevia', ['idContenido' => $seccion->id, 'pagina' => $idPagina]);
                //Guardar contenido

            } else {
                return redirect()->back()->with('error', 'La imagen ya existe en bd');
            }
        } else {
            $seccion = new SeccionContenido;
            //dd($imagenUno);
            //dd(SeccionContenido::count());
            $seccion->idSeccion = $tipoSeccion;
            $seccion->titulo = $request->titulo;
            $seccion->parrafo = $request->parrafo;
            $seccion->idPagina = $idPagina;
            $seccion->save();
            return redirect()->route('CONT-vistaPrevia', ['idContenido' => $seccion->id, 'pagina' => $idPagina]);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show($idSeccion, $idPagina)
    {
        //dd($idSeccion, $idPagina);
        $seccion = SeccionContenido::with(['imagenUno', 'imagenDos', 'pagina'])->find($idSeccion);
        //dd($seccion);
        $tipo = 'CONT-vistaPrevia';
        $slug = Pagina::find($idPagina)->slug;
        switch ($seccion->idSeccion) {
            case 1:
                $ruta = 'admin.CONT-vistaPrevia-uno';
                $tipo = 'CONT-vistaPrevia-uno';
                $imagen = 'der';
                $imagenUno = ImagenesSeccion::find($seccion->imagenUno->id);
                return view($ruta, compact('tipo', 'seccion', 'imagenUno', 'slug', 'idPagina', 'imagen' ));
            case 2:
                $ruta = 'admin.CONT-vistaPrevia-dos';
                $imagenUno = ImagenesSeccion::find($seccion->imagenUno->id);
                $imagenDos = ImagenesSeccion::find($seccion->imagenDos->id);
                $tipo = 'CONT-vistaPrevia-dos';
                return view($ruta, compact('seccion', 'imagenUno', 'imagenDos', 'tipo', 'slug', 'idPagina'));
            case 3:
                $ruta = 'admin.CONT-vistaPrevia-uno';
                $tipo = 'CONT-vistaPrevia-uno';
                $imagen = 'izq';
                $imagenUno = ImagenesSeccion::find($seccion->imagenUno->id);
                return view($ruta, compact('tipo', 'seccion', 'imagenUno', 'slug', 'idPagina', 'imagen'));
            case 4:
                $ruta = 'admin.CONT-vistaPrevia-tres';
                $tipo = 'CONT-vistaPrevia-tres';
                return view($ruta, compact('tipo', 'seccion', 'slug', 'idPagina'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($seccion)
    {
        //dd($seccion);
        if (!$seccion) {
            Log::error('Seccion not found');
            abort(404);
        }

        $seccion = SeccionContenido::find($seccion);
        $numeroSecciones = SeccionContenido::count();

        $idPagina = $seccion->idPagina;
        $tipo = 'CONT-crear';
        $tipoSeccion = $seccion->idSeccion;
        //dd($idPagina);
        switch ($tipoSeccion) {
            case 1:
                $tipo = 'CONT-opcion-uno';
                return view('formularios-contenido.uno', compact('tipo', 'idPagina', 'seccion', 'numeroSecciones'));
                break;
            case 2:
                $tipo = 'CONT-opcion-dos';
                return view('formularios-contenido.dos', compact('tipo', 'idPagina', 'seccion', 'numeroSecciones'));


                break;
            case 3:
                $tipo = 'CONT-opcion-tres';
                return view('formularios-contenido.tres', compact('tipo', 'idPagina', 'seccion', 'numeroSecciones'));

                break;
            case 4:
                $tipo = 'CONT-opcion-cuatro';
                return view('formularios-contenido.cuatro', compact('tipo', 'idPagina', 'seccion', 'numeroSecciones'));

                break;
        }

        return view('admin.CONT-crear', compact('seccionContenido', 'idPagina', 'tipo', 'numeroSecciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $seccion)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:255',
            'foto' => 'image|max:2048',
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
            $seccion = SeccionContenido::find($seccion);
            $imagen = $this->guardarImagen($request->file('foto'));
            $seccion->update([
                'titulo' => $request->titulo,
                'parrafo' => $request->parrafo,
                'idImagenUno' => $imagen->id,
            ]);

            $idPagina = $seccion->idPagina;

        } else {
            $seccion = SeccionContenido::find($seccion);
            $seccion->update([
                'titulo' => $request->titulo,
                'parrafo' => $request->parrafo,
            ]);

            $idPagina = $seccion->idPagina;
        }
        //Guardar contenido
        return redirect()->route('CONT-vistaPrevia', ['idContenido' => $seccion->id, 'pagina' => $idPagina]);

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
        $imagen = ImagenesSeccion::find($seccion->imagenUno->id);
        $seccion->delete();
        $imagen->delete();
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

    private function guardarImagen($file, $imagen)
    {
        $hash = md5_file($file->getRealPath());
        $existe = ImagenesSeccion::where('hash', $hash)->exists();

        if (!$existe) {
            $nombreArchivo = time() . '.' . $file->getClientOriginalExtension();
            $ruta = $file->storeAs('imagenes_seccion/' . $imagen, $nombreArchivo, 'public');
            $imagen = new ImagenesSeccion([
                'ruta_imagen' => $ruta,
                'descripcion' => 'Imagen de seccion nueva',
                'hash' => $hash,
            ]);
            //dd($imagen);

            $imagen->save();

            return $imagen;
        } else {
            return false;
        }


    }




    private function calcularOrden($idPagina)
    {
        $orden = SeccionContenido::where('idPagina', $idPagina)->max('orden');
        return $orden ? $orden + 1 : 1;
    }

}
