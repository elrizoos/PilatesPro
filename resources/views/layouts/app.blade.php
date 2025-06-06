<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<div hidden>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="calidad-premium" viewBox="0 0 32 32">
            <title>calidad-premium</title>
            <circle cx="16" cy="16" r="14" fill="#8e6d45" data-name="Layer 1" opacity="1"
                data-original="#e6e7e8" />
            <g data-name="Layer 2">
                <path
                    d="m9.256 18.55-.935-6.077a.507.507 0 0 1 .8-.483l2.913 2.185a.7.7 0 0 0 1-.171l2.425-3.638a.648.648 0 0 1 1.078 0L18.964 14a.7.7 0 0 0 1 .171l2.913-2.185a.507.507 0 0 1 .8.483l-.935 6.077zM9.256 19.674h13.488v1.3a.949.949 0 0 1-.949.949h-11.59a.949.949 0 0 1-.949-.949v-1.3z"
                    fill="#ffffff" opacity="1" data-original="#000000" class="" />
            </g>
        </symbol>
        <symbol id="configuraciones" viewBox="0 0 32 32">
            <title>configuraciones</title>
            <circle cx="16" cy="16" r="14" fill="#8e6d45" data-name="Layer 1" opacity="1"
                data-original="#e6e7e8" />
            <path fill="#ffffff"
                d="m23.2 14.473-.891-.12a.3.3 0 0 1-.248-.213 6.642 6.642 0 0 0-.458-1.11.284.284 0 0 1 .025-.323l.492-.652c.145-.189.135-.358.025-.467l-.86-.856-.871-.875a.3.3 0 0 0-.4-.025l-.711.542a.292.292 0 0 1-.328.025 6.642 6.642 0 0 0-1.11-.458.3.3 0 0 1-.213-.248l-.12-.891a.306.306 0 0 0-.3-.264h-2.456a.306.306 0 0 0-.3.264l-.12.891a.3.3 0 0 1-.213.248 6.642 6.642 0 0 0-1.11.458.284.284 0 0 1-.323-.025l-.652-.492c-.189-.145-.358-.135-.467-.025l-1.734 1.731a.3.3 0 0 0-.025.4l.542.711a.292.292 0 0 1 .025.328 6.642 6.642 0 0 0-.458 1.11.3.3 0 0 1-.248.213l-.891.12a.306.306 0 0 0-.264.3v2.448a.306.306 0 0 0 .264.3l.891.12a.3.3 0 0 1 .248.213 6.642 6.642 0 0 0 .458 1.11.284.284 0 0 1-.025.323l-.492.652c-.145.189-.135.358-.025.467l1.731 1.731a.3.3 0 0 0 .4.025l.711-.542a.292.292 0 0 1 .328-.025 6.642 6.642 0 0 0 1.11.458.3.3 0 0 1 .213.248l.12.891a.306.306 0 0 0 .3.264h2.448a.306.306 0 0 0 .3-.264l.12-.891a.3.3 0 0 1 .213-.248 6.642 6.642 0 0 0 1.11-.458.284.284 0 0 1 .323.025l.652.492c.189.145.358.135.467.025l.856-.86.875-.871a.3.3 0 0 0 .025-.4l-.542-.711a.292.292 0 0 1-.025-.328 6.642 6.642 0 0 0 .458-1.11.3.3 0 0 1 .248-.213l.891-.12a.306.306 0 0 0 .264-.3v-2.445a.306.306 0 0 0-.253-.303zM16 18.487A2.487 2.487 0 1 1 18.487 16 2.488 2.488 0 0 1 16 18.487z"
                data-name="Layer 2" opacity="1" data-original="#231f20" class="" />
        </symbol>
        <symbol id="desconectar" viewBox="0 0 32 32">
            <title>desconectar</title>
            <circle cx="16" cy="16" r="14" fill="#8e6d45" data-name="Layer 1" opacity="1"
                data-original="#e6e7e8" class="" />
            <g fill="#231f20" data-name="Layer 2">
                <path
                    d="M22.681 8.105H9.319a1.215 1.215 0 0 0-1.214 1.214v13.362A1.215 1.215 0 0 0 9.319 23.9h13.362a1.215 1.215 0 0 0 1.219-1.219v-3.644a1.215 1.215 0 1 0-2.429 0v2.429H10.534V10.534h10.932v2.429a1.215 1.215 0 1 0 2.429 0V9.319a1.215 1.215 0 0 0-1.214-1.214z"
                    fill="#ffffff" opacity="1" data-original="#231f20" class="" />
                <path
                    d="M16.963 19.288a1.221 1.221 0 0 0 1.718 0l2.429-2.429a1.214 1.214 0 0 0 0-1.718l-2.429-2.429a1.214 1.214 0 0 0-1.718 1.717l.356.356h-4.356a1.215 1.215 0 0 0 0 2.43h4.356l-.356.356a1.22 1.22 0 0 0 0 1.717z"
                    fill="#ffffff" opacity="1" data-original="#231f20" class="" />
            </g>
        </symbol>
        <symbol id="pilates" viewBox="0 0 512 512">
            <title>pilates</title>
            <path
                d="M256 30a226.06 226.06 0 0 1 88 434.25 226.06 226.06 0 0 1-176-416.5A224.5 224.5 0 0 1 256 30m0-30C114.62 0 0 114.61 0 256s114.62 256 256 256 256-114.61 256-256S397.38 0 256 0z"
                fill="#8e6d45" opacity="1" data-original="#000000" />
            <path
                d="M382.05 189.59a42.76 42.76 0 0 0 4.89-3.06 42.22 42.22 0 1 0-45.69 2.54A45 45 0 0 0 322 207.26l24-.76h1.23c10.26 0 19.66 4.13 25.15 11.05a20.21 20.21 0 0 1 4.09 17.45c-2.63 11.3-15 19.51-29.31 19.51h-1.51L309 253l-12.5 49.93L210.15 249l-4.92-.2c-19.73 0-36-11.78-38.47-26.89l-52.43-32.73a32.16 32.16 0 0 0 3.33 46.37l191.18 158.1a35.39 35.39 0 0 0 50.16-5.12 35.94 35.94 0 0 0 4.27-6.8 44.65 44.65 0 0 0 10.9-19.89l30.47-121.67a44.88 44.88 0 0 0-22.59-50.58z"
                fill="#8e6d45" opacity="1" data-original="#000000" />
            <path
                d="M370.63 233.59c2.64-11.32-9.27-21.57-24.49-21.09L172.43 218c0 13.72 14.74 24.83 32.92 24.83l140.54 5.6c12 .48 22.65-5.89 24.74-14.84z"
                fill="#8e6d45" opacity="1" data-original="#000000" />
        </symbol>
        <symbol id="men-abierto" viewBox="0 0 512 512">
            <title>men-abierto</title>
            <path
                d="M256 39a217.06 217.06 0 0 1 84.45 417 217.06 217.06 0 0 1-168.9-400A215.48 215.48 0 0 1 256 39m0-39C114.62 0 0 114.62 0 256s114.62 256 256 256 256-114.62 256-256S397.38 0 256 0z"
                fill="#8e6d45" opacity="1" data-original="#000000" class="" />
            <rect width="280" height="39.69" x="116" y="135.87" rx="19.85" fill="#8e6d45" opacity="1"
                data-original="#000000" class="" />
            <rect width="280" height="39.69" x="116" y="236.15" rx="19.85" fill="#8e6d45" opacity="1"
                data-original="#000000" class="" />
            <rect width="280" height="39.69" x="116" y="336.44" rx="19.85" fill="#8e6d45" opacity="1"
                data-original="#000000" class="" />
        </symbol>
        <symbol id="pelota-de-pilates" viewBox="0 0 60 60">
            <title>pelota-de-pilates</title>
            <path
                d="M25.03 34.98c-7.51-7.51-11.39-16.7-10.23-23.54a24.061 24.061 0 0 0-5.24 6c-2.19 5.81 1.84 15.63 9.61 23.4 7.72 7.72 17.51 11.76 23.33 9.64a24.4 24.4 0 0 0 6.07-5.29c-.81.14-1.64.22-2.51.22-6.47 0-14.41-3.8-21.03-10.43zM51.98 22.95c-8.82 0-15.99-7.17-15.99-15.97 0-.08.01-.15.01-.22-1.92-.5-3.93-.76-6-.76-1.38 0-2.73.12-4.04.35-.26 6.63 2.82 13.8 8.36 19.34 5.53 5.53 12.7 8.61 19.33 8.35.23-1.32.35-2.66.35-4.04 0-2.47-.37-4.85-1.07-7.09-.34.02-.66.04-.95.04z"
                fill="#8e6d45" opacity="1" data-original="#000000" class="" />
            <path
                d="M7.09 22.85C6.38 25.11 6 27.51 6 30c0 13.23 10.77 24 24 24 2.48 0 4.88-.38 7.13-1.08-6.03-.69-13.25-4.54-19.38-10.67-6.14-6.15-9.99-13.37-10.66-19.4zM51.98 20.95c.07 0 .16-.01.24-.01A24.121 24.121 0 0 0 38.01 7.38c.22 7.52 6.39 13.57 13.97 13.57zM32.91 27.1c-5.79-5.78-9.08-13.29-8.97-20.32-2.34.61-4.53 1.56-6.53 2.8-2.55 6.14 1.2 16.15 9.03 23.99 7.84 7.83 17.86 11.58 23.98 9.02 1.24-2 2.2-4.2 2.81-6.54-.12 0-.23.01-.35.01-6.93 0-14.28-3.27-19.97-8.96z"
                fill="#8e6d45" opacity="1" data-original="#000000" class="" />
        </symbol>
        <symbol id="pilates-1" viewBox="0 0 32 32">
            <title>pilates-1</title>
            <path
                d="M20.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0zM24 23H13.493l3.518-8.549 6.638 2.485a.999.999 0 1 0 .701-1.873l-10.362-3.88a2.844 2.844 0 0 0-3.609 1.554l-3.085 7.722C6.373 22.608 7.952 25 10.289 25H24a1 1 0 1 0 0-2zM29 29H3a1 1 0 1 1 0-2h26a1 1 0 1 1 0 2z"
                fill="#8e6d45" opacity="1" data-original="#000000" />
        </symbol>
        <symbol id="flecha-recta" viewBox="0 0 512 512">
            <title>flecha-recta</title>
            <path d="m512 256-143.542-82.874v60.595H0v44.558h368.458v60.595z" fill="#8e6d45" opacity="1"
                data-original="#000000" />
        </symbol>
        <symbol id="reproducir-msica" viewBox="0 0 64 64">
            <title>reproducir-msica</title>
            <path
                d="M45.45 30.38 25.66 17.8c-1.27-.81-2.94.1-2.94 1.62V44.6c0 1.51 1.67 2.43 2.94 1.62l19.78-12.59c1.19-.77 1.19-2.49.01-3.25z"
                fill="#8e6d45" opacity="1" data-original="#000000" class="" />
            <path
                d="M32 0C14.36 0 0 14.36 0 32s14.36 32 32 32 32-14.36 32-32S49.64 0 32 0zm0 58.73C17.26 58.73 5.27 46.74 5.27 32S17.26 5.27 32 5.27 58.73 17.26 58.73 32 46.74 58.73 32 58.73z"
                fill="#8e6d45" opacity="1" data-original="#000000" class="" />
        </symbol>
        <symbol id="relax" viewBox="0 0 460.425 460.425">
            <title>relax</title>
            <path
                d="M143.317 128.936c-16.159 3.974-26.036 20.295-22.063 36.454l25.297 102.862h74.708c6.729 0 13.302.671 19.673 1.916l65.151-12.881 11.321-7.794 6.949 9.405c7.476 1.939 98.025 48.497 98.527 48.773l-63.293-88-31.766 6.064a39.707 39.707 0 0 1-21.519 13.256c-88.023 20.51-81.936 19.436-87.987 19.436a39.636 39.636 0 0 1-27.267-10.816c-2.328-2.192 1.256 2.832-48.694-72.613l62.047 58.429c4.887 4.597 11.872 6.54 18.515 4.99h.002l78.962-18.398c5.89-1.372 10.991-5.301 13.737-11.114l61.838-11.805c6.805-1.298 11.272-7.87 9.972-14.677-1.297-6.788-7.89-11.265-14.678-9.972l-62.776 11.984a20.26 20.26 0 0 0-15.109-4.324c-1.69.204 3.417-.927-70.56 16.309l-56.189-52.912 59.009 32.251 13.301-3.099-8.483-34.492c-3.974-16.159-20.295-26.036-36.453-22.063l-52.172 12.831z"
                fill="#8e6d45" opacity="1" data-original="#000000" />
            <circle cx="155.791" cy="66.184" r="44.602" fill="#8e6d45" opacity="1"
                data-original="#000000" />
            <path
                d="M221.259 289.581h-99.157L75.286 98.911c-5.019-20.443-25.633-32.97-46.091-28.01a38.196 38.196 0 0 0-28.099 46.204c73.508 300.193 68.658 279.346 68.658 282.22 0 7.3 5.918 13.217 13.217 13.217h7.473v15.326c0 2.217.663 4.277 1.793 6.004 1.961 2.996 5.342 4.98 9.191 4.98h27.507c3.849 0 7.229-1.983 9.191-4.98a10.923 10.923 0 0 0 1.793-6.004v-15.326h81.017v15.326c0 2.217.663 4.277 1.793 6.004 1.961 2.996 5.342 4.98 9.191 4.98h27.507c3.849 0 7.229-1.983 9.191-4.98a10.923 10.923 0 0 0 1.793-6.004v-15.326h18.706c7.3 0 13.217-5.917 13.217-13.217v-28.673c-.003-44.773-36.3-81.071-81.075-81.071zM450.257 376.706H406.482c6.202-2.076 11.632-6.473 14.829-12.762 6.463-12.715 1.395-28.26-11.318-34.723l-86.724-44.084a25.827 25.827 0 0 0-11.711-2.804l-.227.001-37.738.345c21.703 12.959 38.227 33.711 45.689 58.37l67.306 34.214a25.897 25.897 0 0 0 3.457 1.444h-27.099c-5.402 0-9.808 4.217-10.136 9.536-.013.21-.032.419-.032.632v41.811c0 5.616 4.552 10.168 10.168 10.168h87.312c5.616 0 10.168-4.553 10.168-10.168v-41.811c-.001-5.616-4.553-10.169-10.169-10.169z"
                fill="#8e6d45" opacity="1" data-original="#000000" />
        </symbol>
        <symbol id="vestuario" viewBox="0 0 60 60">
            <title>vestuario</title>
            <path
                d="M27.178 19.383a1.914 1.914 0 0 0-.328-.169A4.662 4.662 0 0 1 22 23a4.661 4.661 0 0 1-4.849-3.783 1.887 1.887 0 0 0-.351.183l-5.516 4.383a.661.661 0 0 0-.19.878l1.444 2.406a.654.654 0 0 0 .853.248l2.121-1.188A1 1 0 0 1 17 27v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V27a1 1 0 0 1 1.488-.873l2.162 1.21a.648.648 0 0 0 .812-.27l1.444-2.406a.653.653 0 0 0-.168-.861zM57 2H3a1 1 0 0 0-1 1v7h56V3a1 1 0 0 0-1-1zM7 51h8v7H7zM16 45H7v4h9a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1zM2 58h3V12H2zM39 53.145a3.506 3.506 0 0 1 3 .483 3.5 3.5 0 0 1 4 0 3.5 3.5 0 0 1 4 0 3.491 3.491 0 0 1 3-.481V12H39zM49 17a1 1 0 0 1 2 0v31a1 1 0 0 1-2 0zm-4 0a1 1 0 0 1 2 0v31a1 1 0 0 1-2 0zm-4 0a1 1 0 0 1 2 0v31a1 1 0 0 1-2 0zM55 12h3v46h-3z"
                fill="#8e6d45" opacity="1" data-original="#000000" class="" />
            <path
                d="M23 18.094a2.428 2.428 0 0 0-1.428-2.19A1 1 0 1 1 23 15a1 1 0 0 0 2 0 3 3 0 1 0-4.286 2.711.456.456 0 0 1 .286.383V19h-1.844A2.683 2.683 0 0 0 22 21a2.684 2.684 0 0 0 2.844-2H23z"
                fill="#8e6d45" opacity="1" data-original="#000000" class="" />
        </symbol>
        <symbol id="tienda" viewBox="0 0 96 96">
            <title>tienda</title>
            <path
                d="M95.983 32H0v4a8 8 0 0 0 8 8h12a8 8 0 0 0 8-8 8 8 0 0 0 8 8h24a8 8 0 0 0 8-8 8 8 0 0 0 8 8h12a8 8 0 0 0 8-8v-4zM95.017 28 87.846 2.9A4 4 0 0 0 84 0H65.679l5.6 28zM30.321 0H12a4 4 0 0 0-3.846 2.9L.983 28h23.738zM57.521 0H38.479l-5.6 28h30.242zM76 48a11.953 11.953 0 0 1-8-3.063A11.953 11.953 0 0 1 60 48H36a11.953 11.953 0 0 1-8-3.063A11.953 11.953 0 0 1 20 48H8a11.922 11.922 0 0 1-4-.7V92a4 4 0 0 0 4 4h8V60a4 4 0 0 1 4-4h20a4 4 0 0 1 4 4v36h44a4 4 0 0 0 4-4V47.3a11.922 11.922 0 0 1-4 .7zm4 24a4 4 0 0 1-4 4H56a4 4 0 0 1-4-4V60a4 4 0 0 1 4-4h20a4 4 0 0 1 4 4z"
                fill="#8e6d45" opacity="1" data-original="#000000" class="" />
        </symbol>
        <symbol id="dieta" viewBox="0 0 512 512.01">
            <title>dieta</title>
            <path
                d="M73.148 237.723h27.438v27.43H73.148zM73.148 320.012h27.438v27.426H73.148zM73.148 155.438h27.438v27.43H73.148zM274.29 91.438c5.05 0 9.144-4.094 9.144-9.141V45.723c0-5.047-4.094-9.141-9.145-9.141h-55.77a10.56 10.56 0 0 1-6.09-2.434 8.804 8.804 0 0 1-.859-.968 9.074 9.074 0 0 1-1.113-1.653 10.11 10.11 0 0 1-.516-1.308 9.781 9.781 0 0 1-.382-.969C206.082 12.227 191.105 0 173.727 0c-17.375 0-32.352 12.227-35.829 29.25-.105.29-.226.574-.367.848a8.185 8.185 0 0 1-.703 1.675 9.04 9.04 0 0 1-3.586 3.582c-.531.29-1.09.524-1.672.696a9.457 9.457 0 0 1-1.683.34c-.317.082-.64.144-.969.191h-55.77c-5.05 0-9.144 4.094-9.144 9.14v36.575c0 5.047 4.094 9.14 9.144 9.14zm-137.142-36.57h118.856a9.144 9.144 0 0 1 9.144 9.144c0 5.047-4.093 9.14-9.144 9.14H137.148c-5.05 0-9.144-4.093-9.144-9.14a9.144 9.144 0 0 1 9.144-9.145zm-45.714 0h9.144c5.047 0 9.14 4.093 9.14 9.144 0 5.047-4.093 9.14-9.14 9.14h-9.144c-5.051 0-9.145-4.093-9.145-9.14a9.144 9.144 0 0 1 9.145-9.145zM330.977 274.48c.238 0 .402.192.628.254 2.454-.226 4.922-.402 7.426-.402h20.005c4.784.012 9.526.848 14.026 2.477.915.34 1.762.824 2.649 1.218a122.458 122.458 0 0 0-5.11-22.035c-7.413-21.664-27.699-36.285-50.597-36.472h-.156c-5.871-.02-11.739.304-17.57.98-1.18 12.652-1.602 47.918 28.699 53.98zM347.434 207.086V64.012a9.144 9.144 0 0 0-9.145-9.145h-36.57v18.285h9.144c10.098 0 18.285 8.188 18.285 18.285v110.63a73.036 73.036 0 0 1 18.286 5.019zm0 0"
                fill="#8e6d45" opacity="1" data-original="#000000" class="" />
            <path
                d="M36.578 493.723c-10.101 0-18.289-8.184-18.289-18.286v-384c0-10.097 8.188-18.285 18.29-18.285h9.14V54.867H9.149a9.144 9.144 0 0 0-9.145 9.145v438.855a9.144 9.144 0 0 0 9.144 9.145H314.52a122.225 122.225 0 0 1-22.344-18.29zm0 0"
                fill="#8e6d45" opacity="1" data-original="#000000" class="" />
            <path
                d="M305.027 282.16c-21.765-17.566-23.402-50.89-20.187-69.7.844-3.757 2.406-10.327 26.023-11.17V91.436h-10.828a27.422 27.422 0 0 1-25.746 18.286H73.15a27.422 27.422 0 0 1-25.747-18.286H36.578v384h241.094a133.052 133.052 0 0 1-21.668-73.14v-39.59c-.43-34.02 18.61-65.3 49.023-80.547zM146.29 164.582h128c5.05 0 9.145 4.094 9.145 9.14a9.144 9.144 0 0 1-9.145 9.145h-128c-5.047 0-9.14-4.094-9.14-9.144 0-5.047 4.093-9.141 9.14-9.141zm-27.426 265.14c0 10.102-8.187 18.29-18.285 18.29h-27.43c-10.097 0-18.285-8.188-18.285-18.29v-27.425c0-10.102 8.188-18.285 18.285-18.285h27.43c10.098 0 18.285 8.183 18.285 18.285zm0-82.285c0 10.102-8.187 18.286-18.285 18.286h-27.43c-10.097 0-18.285-8.184-18.285-18.285v-27.426c0-10.102 8.188-18.29 18.285-18.29h27.43c10.098 0 18.285 8.188 18.285 18.29zm0-82.285c0 10.098-8.187 18.285-18.285 18.285h-27.43c-10.097 0-18.285-8.187-18.285-18.285v-27.43c0-10.097 8.188-18.285 18.285-18.285h27.43c10.098 0 18.285 8.188 18.285 18.286zm0-82.285c0 10.098-8.187 18.285-18.285 18.285h-27.43c-10.097 0-18.285-8.187-18.285-18.285v-27.43c0-10.097 8.188-18.285 18.285-18.285h27.43c10.098 0 18.285 8.188 18.285 18.285zm109.715 246.856H146.29c-5.047 0-9.14-4.09-9.14-9.141s4.093-9.145 9.14-9.145h82.29c5.046 0 9.14 4.094 9.14 9.145s-4.094 9.14-9.14 9.14zm0-82.286H146.29c-5.047 0-9.14-4.093-9.14-9.14 0-5.05 4.093-9.145 9.14-9.145h82.29c5.046 0 9.14 4.094 9.14 9.145 0 5.047-4.094 9.14-9.14 9.14zm18.285-82.285H146.29c-5.047 0-9.14-4.093-9.14-9.14 0-5.051 4.093-9.145 9.14-9.145h100.574c5.047 0 9.14 4.094 9.14 9.145 0 5.047-4.093 9.14-9.14 9.14zm0 0"
                fill="#8e6d45" opacity="1" data-original="#000000" class="" />
            <path
                d="M447.3 292.582h-20.187c-2.484.031-4.949.438-7.312 1.195l-.442.13a27.37 27.37 0 0 0-17.07 26.187l-.52 1.05c-1.828-26.843 1.07-82.726 50.864-112.12a9.14 9.14 0 0 0 3.031-12.403 9.138 9.138 0 0 0-12.32-3.34c-53.031 31.297-60.664 87.508-60.07 120.547a26.616 26.616 0 0 0-16.458-19.855 23.343 23.343 0 0 0-7.671-1.371h-20.149c-35.676-.02-64.707 31.457-64.707 70.105v39.59c0 60.488 45.66 109.715 101.77 109.715h34.175c56.11 0 101.77-49.207 101.77-109.715v-39.59c0-38.648-29.027-70.125-64.703-70.125zm-115.198 36.04c-1.016.401-21.239 8.081-21.239 37.1 0 5.051-4.093 9.145-9.144 9.145s-9.14-4.094-9.14-9.144c0-42.668 32.3-53.942 33.679-54.391a9.14 9.14 0 0 1 8.969 1.797 9.148 9.148 0 0 1-3.105 15.531zm51.902-1.18c.121 1.261.238 2.433.36 3.53a8.784 8.784 0 0 1-.36-1.82zM73.148 402.297h27.438v27.426H73.148zm0 0"
                fill="#8e6d45" opacity="1" data-original="#000000" class="" />
        </symbol>
        <symbol id="cafetera" viewBox="0 0 64 64">
            <title>cafetera</title>
            <path
                d="M32.889 25H5.111l.947 9h25.883zM28 41v.4A25.687 25.687 0 0 0 32.538 56h16.924A25.687 25.687 0 0 0 54 41.4V41a1 1 0 0 0-1-1H29a1 1 0 0 0-1 1zm13 2h2v2h-2zm-10 0h8v2h-8z"
                fill="#8e6d45" opacity="1" data-original="#000000" class="" />
            <rect width="32" height="4" x="3" y="19" rx="1" fill="#8e6d45" opacity="1"
                data-original="#000000" class="" />
            <path d="M20 10a1 1 0 0 1 .293-.707L24.586 5 23 3.414l-5 5V13h2zM33 16a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1v1h28z"
                fill="#8e6d45" opacity="1" data-original="#000000" class="" />
            <circle cx="19" cy="44" r="4" fill="#8e6d45" opacity="1" data-original="#000000"
                class="" />
            <path d="M54 58H28a1 1 0 0 0-1 1 2 2 0 0 0 2 2h24a2 2 0 0 0 2-2 1 1 0 0 0-1-1z" fill="#8e6d45"
                opacity="1" data-original="#000000" class="" />
            <path
                d="M28 56h2.146a29.41 29.41 0 0 1-1.129-2H8.163l.454 4.314A2.994 2.994 0 0 0 11.6 61h13.956A3.959 3.959 0 0 1 25 59a3 3 0 0 1 3-3zM26 41.4V41a3 3 0 0 1 3-3h2.52l.211-2H6.269l1.684 16h20.141A27.713 27.713 0 0 1 26 41.4zM19 50a6 6 0 1 1 6-6 6.006 6.006 0 0 1-6 6zM37 30.586a3.414 3.414 0 0 0 0 4.828l1.293 1.293 1.414-1.414L38.414 34a1.415 1.415 0 0 1 0-2l.586-.586a3.414 3.414 0 0 0 0-4.828l-1.293-1.293-1.414 1.414L37.586 28a1.415 1.415 0 0 1 0 2zM45 30.586a3.414 3.414 0 0 0 0 4.828l1.293 1.293 1.414-1.414L46.414 34a1.415 1.415 0 0 1 0-2l.586-.586a3.414 3.414 0 0 0 0-4.828l-1.293-1.293-1.414 1.414L45.586 28a1.415 1.415 0 0 1 0 2zM60 41h-4v.4c0 .537-.025 1.071-.055 1.6H60a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1h-5.055a27.666 27.666 0 0 1-.659 2H60a3 3 0 0 0 3-3v-4a3 3 0 0 0-3-3z"
                fill="#8e6d45" opacity="1" data-original="#000000" class="" />
        </symbol>
        <symbol id="estacionamiento" viewBox="0 0 512 512">
            <title>estacionamiento</title>
            <path
                d="M116.87 100.174h-16.696v33.391h16.696c9.206 0 16.696-7.49 16.696-16.696s-7.49-16.695-16.696-16.695z"
                fill="#8e6d45" opacity="1" data-original="#000000" class="" />
            <path
                d="M478.609 442.141C498 435.227 512 416.868 512 395.13v-33.391c0-23.228-15.968-42.633-37.451-48.273l-22.581-67.738a50.014 50.014 0 0 0-47.511-34.251H274.5a50.015 50.015 0 0 0-47.511 34.245l-22.583 67.743c-21.482 5.64-37.449 25.045-37.449 48.273v33.391c0 21.737 14 40.096 33.391 47.01v19.772c0 5.882 1.207 11.448 3.076 16.696h-69.859v-212.81c56.544-8.145 100.174-56.777 100.174-115.536V116.87C233.739 52.429 181.315 0 116.87 0S0 52.429 0 116.87v33.391c0 58.759 43.63 107.391 100.174 115.536v212.812H16.696C7.479 478.609 0 486.082 0 495.304 0 504.527 7.479 512 16.696 512h478.609c9.217 0 16.696-7.473 16.696-16.696 0-9.223-7.479-16.696-16.696-16.696h-19.772c1.87-5.248 3.076-10.813 3.076-16.696v-19.771zM100.174 166.957v16.696c0 9.223-7.479 16.696-16.696 16.696s-16.696-7.473-16.696-16.696V83.478c0-9.223 7.479-16.696 16.696-16.696h33.391c27.619 0 50.087 22.468 50.087 50.087 0 27.619-22.468 50.087-50.087 50.087h-16.695zm158.49 89.326a16.682 16.682 0 0 1 15.838-11.413h129.957a16.677 16.677 0 0 1 15.837 11.419l18.454 55.364H240.206l18.458-55.37zm-41.621 155.543c-9.206 0-16.696-7.49-16.696-16.696v-33.391c0-9.206 7.49-16.696 16.696-16.696h21.362l22.261 66.783h-43.623zm80.402 66.783c1.87-5.248 3.076-10.813 3.076-16.696v-16.696h77.913v16.696c0 5.882 1.207 11.448 3.076 16.696h-84.065zm164.468-66.783h-43.622l22.261-66.783h21.362c9.206 0 16.696 7.49 16.696 16.696v33.391c-.001 9.206-7.491 16.696-16.697 16.696z"
                fill="#8e6d45" opacity="1" data-original="#000000" class="" />
        </symbol>
        <symbol id="botn-cerrar" viewBox="0 0 32 32">
            <title>botn-cerrar</title>
            <path
                d="M21 2H11a9 9 0 0 0-9 9v10a9 9 0 0 0 9 9h10a9 9 0 0 0 9-9V11a9 9 0 0 0-9-9zm.71 18.29a1 1 0 0 1-1.42 1.42L16 17.41l-4.29 4.3a1 1 0 0 1-1.42-1.42l4.3-4.29-4.3-4.29a1 1 0 0 1 1.42-1.42l4.29 4.3 4.29-4.3a1 1 0 0 1 1.42 1.42L17.41 16z"
                fill="#8e6d45" opacity="1" data-original="#000000" class="" />
        </symbol>
        <symbol id="botn-circular-negro-flecha-abajo" viewBox="0 0 612 612">
            <title>botn-circular-negro-flecha-abajo</title>
            <path
                d="M306 0C136.992 0 0 136.992 0 306s136.992 306 306 306 306-137.012 306-306S475.008 0 306 0zm163.231 246.311-146.439 146.44c-4.59 4.59-10.863 6.005-16.811 4.973-5.929 1.052-12.221-.383-16.811-4.973l-146.44-146.44c-7.478-7.478-7.478-19.565 0-27.043s19.584-7.478 27.042 0L306 355.457l136.189-136.189c7.478-7.478 19.584-7.478 27.042 0 7.479 7.459 7.479 19.565 0 27.043z"
                fill="#8e6d45" opacity="1" data-original="#000000" class="" />
        </symbol>
        <symbol id="editar" viewBox="0 0 381.534 381">
            <title>editar</title>
            <path
                d="M370.59 230.965c-5.524 0-10 4.476-10 10v88.793c-.02 16.558-13.438 29.98-30 30H50c-16.563-.02-29.98-13.442-30-30V69.168c.02-16.563 13.438-29.98 30-30h88.79c5.523 0 10-4.477 10-10s-4.477-10-10-10H50c-27.602.031-49.969 22.398-50 50v260.59c.031 27.601 22.398 49.969 50 50h280.59c27.601-.031 49.969-22.399 50-50v-88.79c0-5.523-4.477-10.003-10-10.003zm0 0"
                fill="#8e6d45" opacity="1" data-original="#000000" class="" />
            <path
                d="M156.367 178.344 302.38 32.328l47.09 47.09-146.012 146.016zM132.543 249.258l52.039-14.414-37.625-37.625zM362.488 7.578c-9.77-9.746-25.586-9.746-35.355 0l-10.606 10.606 47.09 47.09 10.606-10.606c9.75-9.77 9.75-25.586 0-35.355zm0 0"
                fill="#8e6d45" opacity="1" data-original="#000000" class="" />
        </symbol>
        <symbol id="eliminar" viewBox="0 0 512.016 512.016">
            <title>eliminar</title>
            <path
                d="M448.199 164.387H211.386L317.434 58.339c5.858-5.858 5.858-15.356 0-21.215l-26.872-26.872c-13.669-13.669-35.831-13.669-49.501 0l-27.63 27.631-14.144-14.144c-15.596-15.597-40.975-15.596-56.572 0L87.557 78.897c-15.597 15.597-15.597 40.976 0 56.573l14.143 14.144-27.63 27.63c-13.669 13.669-13.669 35.831 0 49.501l26.872 26.872c5.857 5.858 15.356 5.859 21.214 0l38.021-38.021v231.416c0 35.901 29.104 65.005 65.005 65.005h158.012c35.901 0 65.005-29.104 65.005-65.005zm-325.284-35.989-14.143-14.143c-3.899-3.899-3.899-10.244 0-14.144l55.158-55.158c3.9-3.9 10.245-3.899 14.143 0l14.143 14.144zM252.448 428.01c0 8.285-6.716 15.001-15.001 15.001s-15.001-6.716-15.001-15.001V248.394c0-8.285 6.716-15.001 15.001-15.001s15.001 6.716 15.001 15.001zm66.741 0c0 8.285-6.716 15.001-15.001 15.001s-15.001-6.716-15.001-15.001V248.394c0-8.285 6.716-15.001 15.001-15.001s15.001 6.716 15.001 15.001zm66.741 0c0 8.285-6.716 15.001-15.001 15.001s-15.001-6.716-15.001-15.001V248.394c0-8.285 6.716-15.001 15.001-15.001s15.001 6.716 15.001 15.001z"
                fill="#8e6d45" opacity="1" data-original="#000000" class="" />
            <path
                d="M320.898 113.548a25.047 25.047 0 0 0-16.631 20.842h143.932v-24.932c0-17.119-16.845-29.167-33.022-23.682l-93.968 27.672c-.101.029-.211.069-.311.1z"
                fill="#8e6d45" opacity="1" data-original="#000000" class="" />
        </symbol>
        <symbol id="subir" viewBox="0 0 512 512">
            <title>subir</title>
            <path
                d="m380.032 133.472-112-128C264.992 2.016 260.608 0 256 0s-8.992 2.016-12.032 5.472l-112 128c-4.128 4.736-5.152 11.424-2.528 17.152A16.013 16.013 0 0 0 144 160h64v208c0 8.832 7.168 16 16 16h64c8.832 0 16-7.168 16-16V160h64a15.96 15.96 0 0 0 14.56-9.376c2.592-5.728 1.632-12.448-2.528-17.152z"
                fill="#8e6d45" opacity="1" data-original="#000000" />
            <path d="M432 352v96H80v-96H16v128c0 17.696 14.336 32 32 32h416c17.696 0 32-14.304 32-32V352h-64z"
                fill="#8e6d45" opacity="1" data-original="#000000" />
        </symbol>
        <symbol id="devolver" viewBox="0 0 512 512">
            <title>devolver</title>
            <path fill="#8e6d45"
                d="M362 512H150C67.2 512 0 444.8 0 362V150C0 67.2 67.2 0 150 0h212c82.8 0 150 67.2 150 150v212c0 82.8-67.2 150-150 150z"
                opacity="1" data-original="#007bea" class="" />
            <path fill="#ffffff"
                d="M210.7 210.7c25-25 65.5-25 90.5 0s25 65.5 0 90.5-65.5 25-90.5 0l-45.3 45.3c50 50 131 50 181 0s50-131 0-181-131-50-181 0l-33.9-33.9v113.1h113.1z"
                opacity="1" data-original="#ffffff" />
        </symbol>
    </svg>
</div>

<body class="bg-color-fondo texto-color-secundario no-scrollbar">
    <img class="vw-100 vh-100 z-0 position-fixed top-0" src="{{ asset('imagenes/pilatesIa.png') }}" alt="">
    <div class="d-flex flex-column flex-md-row  position-relative bottom-100" id="appEscritorio">
        <div class="d-none position-absolute bottom-100 z-3 vh-100 p-5 bg-color-principal border border-1 border-warning-subtle h-75 z-2 centrado overflow-y-scroll"
            id="cuadroActualizacion">
            <h5 class="w-100 p-3 fs-1 text-center texto-color-secundario">¡La página ha sido actualizada!</h5>
            <h3 class="p-2 fs-3 texto-color-importante">Version 0.0.1 (Primeras notas)</h3>
            @include('actualizacion.version_0_0_1')
        </div>
        @if (Route::currentRouteName() !== 'formularioPago' &&
                Route::currentRouteName() !== 'login' &&
                Route::currentRouteName() !== 'registrarUsuarioProducto' &&
                Route::currentRouteName() !== 'register')
            <nav class="d-none d-md-block container-fluid bg-color-principal w-20 position-relative">
                <div class="full-width position-sticky top-0 d-flex flex-column justify-content-between vh-100 p-1">
                    <div class="w-100 h-25 p-2">
                        <div class="img-fluid imagen-logo w-100 h-100 img" id="imagen-logo"
                            data-url="{{ route('inicio') }}">
                        </div>
                    </div>

                    <div class="d-flex flex-column" id="listaMenu">
                        <span></span>
                        <div>
                            <ul class="fs-5 text-uppercase fs-5">
                                <li class="p-2"><a href="{{ route('inicio') }}">Inicio</a></li>
                                <li class="p-2"><a href="{{ route('acercaDe') }}">Acerca de</a></li>
                                <li class="p-2"><a href="{{ route('clases') }}">Clases</a></li>
                                <li class="p-2"><a href="{{ route('instructores') }}">Instructores</a></li>
                                <li class="p-2"><a href="{{ route('conversaciones.index') }}">Mensajes</a>
                                    @if (isset($conversacionesSinLeer))
                                        @if ($conversacionesSinLeer['totalMensajes'] !== 0)
                                            <p>Tienes {{ $conversacionesSinLeer['totalMensajes'] }} mensajes de
                                                {{ $conversacionesSinLeer['totalConversaciones'] }} conversaciones
                                                distintas</p>
                                        @endif
                                    @endif
                                </li>

                                @if (isset($paginas) && $paginas->isNotEmpty())
                                    <li class="nav-item dropdown col">
                                        <a class="nav-link dropdown-toggle p-2" data-bs-toggle="dropdown"
                                            href="#" role="button" aria-expanded="false">Más</a>
                                        <ul class="dropdown-menu w-100 text-center">
                                            @foreach ($paginas as $pagina)
                                                <li><a class="dropdown-item estilo-formulario p-2"
                                                        href="{{ route('mostrarPagina', ['pagina' => $pagina->slug]) }}">{{ $pagina->titulo }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            </ul>

                        </div>
                    </div>
                    <div class="w-100 p-2 mb-5">
                        <div>
                            @guest
                                <ul
                                    class="fs-5 w-75 d-flex flex-column gap-4 justify-content-center align-items-center m-auto">
                                    <li
                                        class="w-100 p-4 text-center bg-color-principal rounded-circle border border-1 border-secondary sombra with-transitions">
                                        <a class="fs-5 text-uppercase" href="{{ route('login') }}">Inicio Sesión</a>
                                    </li>
                                    <li
                                        class="w-100 p-4 text-center bg-color-principal rounded-circle border border-1 border-secondary sombra">
                                        <a class="fs-5 text-uppercase" href="{{ route('register') }}">Registro</a>
                                    </li>
                                </ul>
                            @endguest

                            @auth
                                <ul class="fs-5 w-100 d-flex flex-column  text-uppercase">
                                    <li class="w-100 p-3 text-center">{{ Auth::user()->nombre }}
                                        {{ Auth::user()->apellidos }}
                                    </li>
                                    <li class="w-100 p-2 text-center d-flex justify-content-center align-items-center"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="1rem" height="1rem" fill="white" class="bi bi-gear me-1"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0" />
                                            <path
                                                d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z" />
                                        </svg><a
                                            href="{{ Auth::user()->nombre === 'admin' ? route('panel-control') : route('general-informacion') }}">Ajustes</a>
                                    </li>

                                    <form class="formulario-salir" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="boton-salir" type="submit"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="white" class="bi bi-box-arrow-right me-1" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                                                <path fill-rule="evenodd"
                                                    d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                                            </svg>Salir</button>
                                    </form>
                                    </li>
                                </ul>
                            @endauth

                        </div>
                    </div>
                </div>
            </nav>

            <nav class="container-fluid d-block d-md-none bg-color-principal">
                <div class="row   p-2">
                    <div class="col p-4 d-flex justify-content-center align-items-center">
                        <div class="img-fluid imagen-logo w-100 h-auto" style="height:10rem !important"
                            id="imagen-logo" data-url="{{ route('inicio') }}">
                        </div>
                    </div>

                </div>
                <div class="row p-4 justify-content-center align-items-center">
                    <div class="col">
                        <ul class=" row row-cols-5 text-uppercase fs-6">
                            <li class="p-1"><a
                                    class=" border border-1 rounded text-center w-100 d-flex justify-content-center align-items-center p-1 border border-dorado texto-color-titulo"
                                    href="{{ route('inicio') }}">Inicio</a></li>
                            <li class="p-1"><a
                                    class=" border border-1 rounded text-center w-100 d-flex justify-content-center align-items-center p-1 border border-dorado texto-color-titulo"
                                    href="{{ route('acercaDe') }}">Acerca de</a></li>
                            <li class="p-1"><a
                                    class=" border border-1 rounded text-center w-100 d-flex justify-content-center align-items-center p-1 border border-dorado texto-color-titulo"
                                    href="{{ route('clases') }}">Clases</a></li>

                            <li class="p-1"><a
                                    class=" border border-1 rounded text-center w-100 d-flex justify-content-center align-items-center p-1 border border-dorado texto-color-titulo"
                                    href="{{ route('instructores') }}">Instructores</a>
                            </li>

                            <li class="p-1"><a
                                    class=" border border-1 rounded text-center w-100 d-flex justify-content-center align-items-center p-1 border border-dorado texto-color-titulo"
                                    href="{{ route('conversaciones.index') }}">Mensajes</a></li>

                            </li>
                        </ul>
                        @if (isset($paginas) && $paginas->isNotEmpty())
                            <ul class="d-flex flex-row">
                                <li class="nav-item dropdown col">
                                    <a class="nav-link dropdown-toggle p-2" data-bs-toggle="dropdown" href="#"
                                        role="button" aria-expanded="false">Más</a>
                                    <ul class="dropdown-menu w-100 text-center">
                                        @foreach ($paginas as $pagina)
                                            <li><a class="dropdown-item estilo-formulario p-2"
                                                    href="{{ route('mostrarPagina', ['pagina' => $pagina->slug]) }}">{{ $pagina->titulo }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        @endif


                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @guest
                            <ul
                                class="fs-5 w-75 d-flex flex-row p-3 gap-2 justify-content-center align-items-center m-auto">
                                <li
                                    class="w-75 p-2 text-center bg-color-principal rounded-circle border border-1 border-secondary sombra ">
                                    <a class="fs-5 auth text-uppercase" href="{{ route('login') }}">Inicio Sesión</a>
                                </li>
                                <li
                                    class="w-75 p-2 text-center bg-color-principal rounded-circle border border-1 border-secondary sombra">
                                    <a class="fs-5  auth text-uppercase" href="{{ route('register') }}">Registro</a>
                                </li>
                            </ul>
                        @endguest

                        @auth
                            <ul
                                class="fs-5 w-100 d-flex flex-row align-items-center justify-content-center  text-uppercase">
                                <li class="w-100 p-3 text-center">{{ Auth::user()->nombre }}
                                    {{ Auth::user()->apellidos }}
                                </li>
                                <li class="w-100 p-2 text-center"><svg xmlns="http://www.w3.org/2000/svg" width="1rem"
                                        height="1rem" fill="white" class="bi bi-gear me-1" viewBox="0 0 16 16">
                                        <path
                                            d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0" />
                                        <path
                                            d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z" />
                                    </svg><a
                                        href="{{ Auth::user()->nombre === 'admin' ? route('panel-control') : route('general-informacion') }}">Ajustes</a>
                                </li>

                                <li class="w-100 text-center">
                                    <form class=""
                                        action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button
                                            class=""
                                            type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="1rem"
                                                height="1rem" fill="white" class="bi bi-box-arrow-right me-1"
                                                viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                                                <path fill-rule="evenodd"
                                                    d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                                            </svg>Salir</button>
                                    </form>
                                </li>
                            </ul>
                        @endauth
                    </div>
                </div>
            </nav>
        @else
        @endif



        <main class="position-relative container-fluid w-100 p-0 overflow-hidden w-80">
            <div class="row g-0">
                <div class="col g-0">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}

                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}

                        </div>
                    @endif
                    @if (isset($mostrarProducto))
                        @if ($mostrarProducto === true)
                            @yield('mostrarProducto')
                        @endif
                    @else
                        @yield('content')
                    @endif
                </div>
            </div>
        </main>
    </div>

</body>

</html>
