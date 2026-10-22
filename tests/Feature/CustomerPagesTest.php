<?php

namespace Tests\Feature;

use Tests\TestCase;

class CustomerPagesTest extends TestCase
{
    public function test_client_list_shows_demo_records_and_navigation_actions(): void
    {
        $response = $this->get(route('clientes.index'));

        $response
            ->assertOk()
            ->assertSee('Datos ficticios para demostración.')
            ->assertSee('Calzados del Sur')
            ->assertSee('30-00000000-0 (demostración)')
            ->assertSee(route('clientes.create'))
            ->assertSee(route('clientes.show', 'demo-001'))
            ->assertSee(route('clientes.edit', 'demo-001'))
            ->assertSee('data-client-search', false)
            ->assertSee('data-client-address-filter', false)
            ->assertSee('data-client-row', false);
    }

    public function test_client_create_form_uses_documented_fields_without_required_fields(): void
    {
        $response = $this->get(route('clientes.create'));

        $response
            ->assertOk()
            ->assertSee('Identificación comercial')
            ->assertSee('CUIT')
            ->assertSee('Contactos')
            ->assertSee('Direcciones de entrega')
            ->assertSee('data-demo-client-form', false)
            ->assertDontSee(' required', false)
            ->assertSee(route('clientes.index'));
    }

    public function test_client_edit_and_detail_pages_render_demo_values_and_navigation(): void
    {
        $editResponse = $this->get(route('clientes.edit', 'demo-001'));

        $editResponse
            ->assertOk()
            ->assertSee('value="Calzados del Sur"', false)
            ->assertSee('Mariana López')
            ->assertSee('Depósito Central')
            ->assertSee('data-demo-client-form', false);

        $detailResponse = $this->get(route('clientes.show', 'demo-001'));

        $detailResponse
            ->assertOk()
            ->assertSee('Información comercial')
            ->assertSee('Contactos de demostración')
            ->assertSee('Direcciones de entrega de demostración')
            ->assertSee('Av. Ejemplo 1250')
            ->assertSee(route('clientes.edit', 'demo-001'))
            ->assertSee(route('clientes.index'));
    }

    public function test_unknown_demo_client_returns_not_found(): void
    {
        $this->get(route('clientes.show', 'desconocido'))->assertNotFound();
        $this->get(route('clientes.edit', 'desconocido'))->assertNotFound();
    }
}
