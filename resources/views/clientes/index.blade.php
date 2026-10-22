@extends('layouts.admin')

@section('page-title', 'Clientes')
@section('breadcrumb', 'Clientes')

@section('content')
    <div class="alert alert-warning" role="status">
        <i class="bi bi-info-circle me-1" aria-hidden="true"></i>
        Datos ficticios para demostración. El buscador y el filtro operan solo sobre esta lista local.
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">Listado de clientes</h3>
            <div class="card-tools">
                <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-person-plus me-1" aria-hidden="true"></i>
                    Registrar cliente
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-md-7">
                    <label for="client-search" class="form-label">Buscar</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-search" aria-hidden="true"></i>
                        </span>
                        <input
                            id="client-search"
                            class="form-control"
                            type="search"
                            placeholder="Identificación comercial, CUIT o contacto"
                            autocomplete="off"
                            data-client-search
                        >
                    </div>
                </div>
                <div class="col-md-5">
                    <label for="client-address-filter" class="form-label">Direcciones de entrega</label>
                    <select id="client-address-filter" class="form-select" data-client-address-filter>
                        <option value="all">Todos los registros</option>
                        <option value="with-address">Con direcciones en la demostración</option>
                        <option value="without-address">Sin direcciones en la demostración</option>
                    </select>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th scope="col">Identificación comercial</th>
                            <th scope="col">CUIT</th>
                            <th scope="col">Contactos de demostración</th>
                            <th scope="col">Direcciones</th>
                            <th scope="col" class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            @php
                                $searchableText = implode(' ', [
                                    $client['commercial_identity'],
                                    $client['cuit'],
                                    implode(' ', $client['contacts']),
                                ]);
                            @endphp
                            <tr
                                data-client-row
                                data-client-search-text="{{ mb_strtolower($searchableText) }}"
                                data-client-has-address="{{ count($client['delivery_addresses']) > 0 ? 'true' : 'false' }}"
                            >
                                <td>
                                    <a
                                        href="{{ route('clientes.show', $client['id']) }}"
                                        class="fw-semibold text-decoration-none"
                                    >
                                        {{ $client['commercial_identity'] }}
                                    </a>
                                </td>
                                <td>{{ $client['cuit'] }}</td>
                                <td>
                                    <span class="badge text-bg-secondary">
                                        {{ count($client['contacts']) }} contactos ficticios
                                    </span>
                                </td>
                                <td>{{ count($client['delivery_addresses']) }}</td>
                                <td class="text-end text-nowrap">
                                    <a
                                        href="{{ route('clientes.show', $client['id']) }}"
                                        class="btn btn-outline-secondary btn-sm"
                                        aria-label="Ver {{ $client['commercial_identity'] }}"
                                        title="Ver detalle"
                                    >
                                        <i class="bi bi-eye" aria-hidden="true"></i>
                                    </a>
                                    <a
                                        href="{{ route('clientes.edit', $client['id']) }}"
                                        class="btn btn-outline-primary btn-sm"
                                        aria-label="Editar {{ $client['commercial_identity'] }}"
                                        title="Editar demostración"
                                    >
                                        <i class="bi bi-pencil" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        <tr data-client-empty class="d-none">
                            <td colspan="5" class="text-center text-body-secondary py-4">
                                No hay coincidencias en estos datos de demostración.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-body-secondary">
            <span data-client-result-count>{{ count($clients) }}</span>
            registros de demostración
        </div>
    </div>
@endsection
