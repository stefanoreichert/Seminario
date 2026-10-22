@extends('layouts.admin')

@section('page-title', 'Registrar cliente')
@section('breadcrumb', 'Registrar')

@section('content')
    <div class="alert alert-warning" role="status">
        <i class="bi bi-info-circle me-1" aria-hidden="true"></i>
        Formulario visual de demostración. No se guardará información.
    </div>

    @include('clientes.partials.form', [
        'formTitle' => 'Datos comerciales',
        'formActionLabel' => 'Mostrar confirmación de demostración',
        'client' => null,
    ])
@endsection
