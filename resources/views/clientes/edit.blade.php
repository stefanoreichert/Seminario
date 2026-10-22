@extends('layouts.admin')

@section('page-title', 'Editar cliente')
@section('breadcrumb', 'Editar')

@section('content')
    <div class="alert alert-warning" role="status">
        <i class="bi bi-info-circle me-1" aria-hidden="true"></i>
        Datos ficticios para demostración. Los cambios no se guardarán.
    </div>

    @include('clientes.partials.form', [
        'formTitle' => 'Editar datos comerciales de demostración',
        'formActionLabel' => 'Mostrar confirmación de demostración',
        'client' => $client,
    ])
@endsection
