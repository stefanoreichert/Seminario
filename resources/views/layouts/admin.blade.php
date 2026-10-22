<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="color-scheme" content="light">

        <title>{{ $title ?? 'SIMON SRL | Panel de gestión' }}</title>

        @vite(['resources/css/adminlte.css', 'resources/js/adminlte.js'])
    </head>
    <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
        <div class="app-wrapper">
            @include('layouts.partials.navbar')
            @include('layouts.partials.sidebar')

            <main class="app-main">
                <div class="app-content-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="mb-0">@yield('page-title', 'Panel de gestión')</h3>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-end">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Inicio</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        @yield('breadcrumb', 'Panel')
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="app-content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
            </main>

            @include('layouts.partials.footer')
        </div>
    </body>
</html>
