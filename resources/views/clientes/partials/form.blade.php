<div class="card mb-4">
    <div class="card-header">
        <h3 class="card-title">{{ $formTitle }}</h3>
    </div>
    <div class="card-body">
        <form data-demo-client-form>
            <div
                class="alert alert-info d-none"
                role="status"
                aria-live="polite"
                data-demo-form-notice
            ></div>

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="commercial-identity" class="form-label">
                        Identificación comercial
                    </label>
                    <input
                        id="commercial-identity"
                        name="commercial_identity"
                        type="text"
                        class="form-control"
                        value="{{ $client['commercial_identity'] ?? '' }}"
                        autocomplete="organization"
                    >
                </div>
                <div class="col-md-6">
                    <label for="cuit" class="form-label">CUIT</label>
                    <input
                        id="cuit"
                        name="cuit"
                        type="text"
                        class="form-control"
                        value="{{ isset($client) ? $client['cuit'] : '' }}"
                        autocomplete="off"
                    >
                </div>
                <div class="col-12">
                    <label for="contacts" class="form-label">Contactos</label>
                    <textarea
                        id="contacts"
                        name="contacts"
                        class="form-control"
                        rows="3"
                        aria-describedby="contacts-help"
                    >{{ isset($client) ? implode("\n", $client['contacts']) : '' }}</textarea>
                    <div id="contacts-help" class="form-text">
                        En esta demostración, cada línea representa un contacto de ejemplo.
                    </div>
                </div>
                <div class="col-12">
                    <label for="delivery-addresses" class="form-label">
                        Direcciones de entrega
                    </label>
                    <textarea
                        id="delivery-addresses"
                        name="delivery_addresses"
                        class="form-control"
                        rows="4"
                        aria-describedby="addresses-help"
                    >{{ isset($client) ? implode("\n", $client['delivery_addresses']) : '' }}</textarea>
                    <div id="addresses-help" class="form-text">
                        Se pueden mostrar varias direcciones, una por línea. No se establecen campos obligatorios.
                    </div>
                </div>
            </div>

            <div class="d-flex flex-wrap gap-2 mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check2 me-1" aria-hidden="true"></i>
                    {{ $formActionLabel }}
                </button>
                <a
                    href="{{ isset($client) ? route('clientes.show', $client['id']) : route('clientes.index') }}"
                    class="btn btn-outline-secondary"
                >
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
