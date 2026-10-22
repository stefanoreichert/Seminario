@extends('layouts.admin')

@section('page-title', 'Detalle de cliente')
@section('breadcrumb', 'Detalle')

@section('content')
    <div class="alert alert-warning" role="status">
        <i class="bi bi-info-circle me-1" aria-hidden="true"></i>
        Información comercial y direcciones ficticias para demostración.
    </div>

    <div class="d-flex flex-wrap gap-2 mb-3">
        <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1" aria-hidden="true"></i>
            Volver al listado
        </a>
        <a href="{{ route('clientes.edit', $client['id']) }}" class="btn btn-primary">
            <i class="bi bi-pencil me-1" aria-hidden="true"></i>
            Editar demostración
        </a>
    </div>

    <div class="row">
        <div class="col-lg-5">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Información comercial</h3>
                </div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-5">Identificación comercial</dt>
                        <dd class="col-sm-7">{{ $client['commercial_identity'] }}</dd>

                        <dt class="col-sm-5">CUIT</dt>
                        <dd class="col-sm-7">{{ $client['cuit'] }}</dd>

                        <dt class="col-sm-5">Referencia</dt>
                        <dd class="col-sm-7">{{ $client['id'] }}</dd>
                    </dl>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Contactos de demostración</h3>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($client['contacts'] as $contact)
                        <li class="list-group-item">
                            <i class="bi bi-person-lines-fill me-2 text-body-secondary" aria-hidden="true"></i>
                            {{ $contact }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Direcciones de entrega de demostración</h3>
                    <div class="card-tools">
                        <span class="badge text-bg-secondary">
                            {{ count($client['delivery_addresses']) }} direcciones
                        </span>
                    </div>
                </div>
                @if (count($client['delivery_addresses']) > 0)
                    <ul class="list-group list-group-flush">
                        @foreach ($client['delivery_addresses'] as $address)
                            <li class="list-group-item">
                                <i class="bi bi-geo-alt me-2 text-body-secondary" aria-hidden="true"></i>
                                {{ $address }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="card-body text-body-secondary">
                        Este registro ficticio no incluye direcciones de entrega de ejemplo.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
