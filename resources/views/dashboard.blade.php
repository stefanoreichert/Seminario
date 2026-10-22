@extends('layouts.admin')

@section('page-title', 'Resumen operativo')
@section('breadcrumb', 'Dashboard')

@section('content')
    <div class="alert alert-info" role="status">
        <i class="bi bi-info-circle me-1" aria-hidden="true"></i>
        Datos ficticios de demostración. No representan operaciones reales de SIMON SRL.
    </div>

    <div class="row">
        @foreach ($metrics as $metric)
            <div class="col-lg-3 col-6">
                <div class="small-box {{ $metric['color'] }}">
                    <div class="inner">
                        <h3>{{ $metric['value'] }}</h3>
                        <p>{{ $metric['label'] }}</p>
                    </div>
                    <i class="small-box-icon bi {{ $metric['icon'] }}" aria-hidden="true"></i>
                    <span class="small-box-footer">Resumen de ejemplo</span>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Pedidos recientes de demostración</h3>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th scope="col">Referencia</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Artículo</th>
                                    <th scope="col">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recentOrders as $order)
                                    <tr>
                                        <td>{{ $order['number'] }}</td>
                                        <td>{{ $order['customer'] }}</td>
                                        <td>{{ $order['items'] }}</td>
                                        <td>
                                            <span class="badge {{ $order['color'] }}">
                                                {{ $order['status'] }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-body-secondary">
                    Registros ilustrativos; el módulo de pedidos aún no está conectado.
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Módulos del sistema</h3>
                </div>
                <div class="card-body">
                    <p class="text-body-secondary">
                        Esta pantalla muestra la estructura visual inicial del sistema.
                    </p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Comercial
                            <span class="badge text-bg-secondary rounded-pill">En preparación</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Depósito y trazabilidad
                            <span class="badge text-bg-secondary rounded-pill">En preparación</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Producción y reportes
                            <span class="badge text-bg-secondary rounded-pill">En preparación</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
