<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}" class="brand-link">
            <span class="brand-text fw-light">SIMON SRL</span>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2" aria-label="Navegación principal">
            <ul
                class="nav sidebar-menu flex-column"
                data-lte-toggle="treeview"
                role="menu"
                data-accordion="false"
            >
                <li class="nav-header">INICIO</li>
                <li class="nav-item">
                    <a
                        href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                        @if (request()->routeIs('dashboard')) aria-current="page" @endif
                    >
                        <i class="nav-icon bi bi-speedometer2" aria-hidden="true"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-header">MÓDULOS</li>
                <li class="nav-item {{ request()->routeIs('clientes.*') ? 'menu-open' : '' }}">
                    <a
                        href="#"
                        class="nav-link {{ request()->routeIs('clientes.*') ? 'active' : '' }}"
                        @if (request()->routeIs('clientes.*')) aria-expanded="true" @endif
                    >
                        <i class="nav-icon bi bi-briefcase" aria-hidden="true"></i>
                        <p>
                            Comercial
                            <i class="nav-arrow bi bi-chevron-right" aria-hidden="true"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <span class="nav-link disabled" aria-disabled="true">
                                <i class="nav-icon bi bi-receipt" aria-hidden="true"></i>
                                <p>Pedidos</p>
                            </span>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link disabled" aria-disabled="true">
                                <i class="nav-icon bi bi-tags" aria-hidden="true"></i>
                                <p>Catálogo</p>
                            </span>
                        </li>
                        <li class="nav-item">
                            <a
                                href="{{ route('clientes.index') }}"
                                class="nav-link {{ request()->routeIs('clientes.*') ? 'active' : '' }}"
                                @if (request()->routeIs('clientes.*')) aria-current="page" @endif
                            >
                                <i class="nav-icon bi bi-people" aria-hidden="true"></i>
                                <p>Clientes</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-boxes" aria-hidden="true"></i>
                        <p>
                            Depósito
                            <i class="nav-arrow bi bi-chevron-right" aria-hidden="true"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <span class="nav-link disabled" aria-disabled="true">
                                <i class="nav-icon bi bi-box-seam" aria-hidden="true"></i>
                                <p>Inventario</p>
                            </span>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link disabled" aria-disabled="true">
                                <i class="nav-icon bi bi-truck" aria-hidden="true"></i>
                                <p>Preparación y despachos</p>
                            </span>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link disabled" aria-disabled="true">
                                <i class="nav-icon bi bi-upc-scan" aria-hidden="true"></i>
                                <p>Trazabilidad</p>
                            </span>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <span class="nav-link disabled" aria-disabled="true">
                        <i class="nav-icon bi bi-gear" aria-hidden="true"></i>
                        <p>Producción</p>
                    </span>
                </li>
                <li class="nav-item">
                    <span class="nav-link disabled" aria-disabled="true">
                        <i class="nav-icon bi bi-journal-text" aria-hidden="true"></i>
                        <p>Cuentas corrientes</p>
                    </span>
                </li>
                <li class="nav-item">
                    <span class="nav-link disabled" aria-disabled="true">
                        <i class="nav-icon bi bi-arrow-counterclockwise" aria-hidden="true"></i>
                        <p>Devoluciones</p>
                    </span>
                </li>
                <li class="nav-item">
                    <span class="nav-link disabled" aria-disabled="true">
                        <i class="nav-icon bi bi-bar-chart" aria-hidden="true"></i>
                        <p>Reportes</p>
                    </span>
                </li>
            </ul>
        </nav>
    </div>
</aside>
