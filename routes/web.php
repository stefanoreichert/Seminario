<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'metrics' => [
            [
                'label' => 'Pedidos abiertos',
                'value' => '24',
                'color' => 'text-bg-primary',
                'icon' => 'bi-clipboard2-check',
            ],
            [
                'label' => 'Despachos de hoy',
                'value' => '8',
                'color' => 'text-bg-success',
                'icon' => 'bi-truck',
            ],
            [
                'label' => 'Pares disponibles',
                'value' => '312',
                'color' => 'text-bg-warning',
                'icon' => 'bi-box-seam',
            ],
            [
                'label' => 'Lotes en producción',
                'value' => '5',
                'color' => 'text-bg-danger',
                'icon' => 'bi-gear',
            ],
        ],
        'recentOrders' => [
            [
                'number' => 'PED-DEMO-0142',
                'customer' => 'Calzados del Sur',
                'items' => 'Botín seguridad · Talle 42',
                'status' => 'En preparación',
                'color' => 'text-bg-primary',
            ],
            [
                'number' => 'PED-DEMO-0141',
                'customer' => 'Distribuidora Andina',
                'items' => 'Borcego industrial · Talle 40',
                'status' => 'Pendiente',
                'color' => 'text-bg-warning',
            ],
            [
                'number' => 'PED-DEMO-0140',
                'customer' => 'Protección Laboral SRL',
                'items' => 'Zapato dieléctrico · Talle 43',
                'status' => 'Despacho parcial',
                'color' => 'text-bg-info',
            ],
        ],
    ]);
})->name('dashboard');

$demoClients = [
    'demo-001' => [
        'id' => 'demo-001',
        'commercial_identity' => 'Calzados del Sur',
        'cuit' => '30-00000000-0 (demostración)',
        'contacts' => [
            'Mariana López · contacto comercial de demostración',
            'Canal general · contacto ficticio',
        ],
        'delivery_addresses' => [
            'Av. Ejemplo 1250 · Localidad de demostración',
            'Depósito Central · Calle de muestra 450',
        ],
    ],
    'demo-002' => [
        'id' => 'demo-002',
        'commercial_identity' => 'Distribuidora Andina',
        'cuit' => '30-00000000-1 (demostración)',
        'contacts' => [
            'Sergio Pérez · contacto comercial de demostración',
        ],
        'delivery_addresses' => [
            'Ruta de ejemplo 85 · Localidad de demostración',
        ],
    ],
    'demo-003' => [
        'id' => 'demo-003',
        'commercial_identity' => 'Protección Laboral SRL',
        'cuit' => '30-00000000-2 (demostración)',
        'contacts' => [
            'Laura Gómez · contacto comercial de demostración',
        ],
        'delivery_addresses' => [],
    ],
];

$findDemoClient = static function (string $id) use ($demoClients): array {
    abort_unless(array_key_exists($id, $demoClients), 404);

    return $demoClients[$id];
};

Route::prefix('clientes')
    ->name('clientes.')
    ->group(function () use ($demoClients, $findDemoClient): void {
        Route::get('/', function () use ($demoClients) {
            return view('clientes.index', [
                'clients' => array_values($demoClients),
            ]);
        })->name('index');

        Route::get('/crear', function () {
            return view('clientes.create');
        })->name('create');

        Route::get('/{cliente}/editar', function (string $cliente) use ($findDemoClient) {
            return view('clientes.edit', [
                'client' => $findDemoClient($cliente),
            ]);
        })->name('edit');

        Route::get('/{cliente}', function (string $cliente) use ($findDemoClient) {
            return view('clientes.show', [
                'client' => $findDemoClient($cliente),
            ]);
        })->name('show');
    });
