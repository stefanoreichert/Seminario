<?php

namespace Tests\Feature;

use Tests\TestCase;

class DashboardTest extends TestCase
{
    public function test_dashboard_renders_adminlte_layout_and_demo_data(): void
    {
        $response = $this->get('/dashboard');

        $response
            ->assertOk()
            ->assertSee('SIMON SRL')
            ->assertSee('Resumen operativo')
            ->assertSee('Pedidos recientes de demostración')
            ->assertSee('PED-DEMO-0142')
            ->assertSee('Datos ficticios de demostración.')
            ->assertSee('app-sidebar', false)
            ->assertSee('small-box', false)
            ->assertSee('adminlte-', false);
    }
}
