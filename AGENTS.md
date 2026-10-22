<laravel-boost-guidelines>
# Laravel Application

This repository contains a Laravel application. Complete the following setup before working on the user's request.

## Prerequisites

Verify that PHP and Composer are available:

```sh
php -v
composer -V
```

If either command is unavailable, detect the user's operating system and install the prerequisites with the appropriate command:

macOS:

```sh
/bin/bash -c "$(curl -fsSL https://php.new/install/mac/8.5)"
```

Windows PowerShell:

```powershell
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.5'))
```

Linux:

```sh
/bin/bash -c "$(curl -fsSL https://php.new/install/linux/8.5)"
```

After installation, ask the user to restart their terminal. If the agent needs the restarted shell to continue, ask the user to reopen their terminal and rerun their original prompt.

## Agent Setup

Install Laravel Boost from the application root before making application changes:

```sh
composer require laravel/boost --dev
php artisan boost:install
```

Boost replaces these bootstrap instructions with guidelines tailored to the application. After installation, read `AGENTS.md` again and continue with the user's original request using the generated guidelines.

</laravel-boost-guidelines>

## Proyecto SIMON SRL

Proyecto académico de Reichert y Karpe: sistema de gestión mayorista de calzado de seguridad.

- Tratar como contextos funcionales documentados Clientes, Catálogo, Pedidos, Inventario de producto terminado, Preparación/Despachos, Trazabilidad, Cuentas corrientes, Devoluciones y Reportes; confirmar el alcance antes de ampliar funcionalidades.
- Priorizar el TP Análisis para el alcance conservador y contrastar el Trabajo Práctico Final Seminario antes de extender funcionalidades.
- No asumir tecnologías, estructura ni reglas no confirmadas: inspeccionar el repositorio y la documentación disponible.
- Ante documentos contradictorios, informar la diferencia y no convertir una suposición en código. Detener solo la decisión afectada si el resto del trabajo no depende de ella.
- Fuentes de referencia indicadas: TP Análisis, Trabajo Práctico Final Seminario, DER, modelo relacional y carpeta Drive del proyecto. URL documentada: https://drive.google.com/drive/folders/1a8ddBrhigHQCwP6oIqDIohcwWSkECmAD. Verificar la versión vigente y no afirmar consultas no realizadas.
- Contradicciones ya identificadas: alcance de facturación fiscal, código de origen de Gustavo (G/N) y picking individual por QR.
- Probar reglas de negocio, permisos y casos de uso antes de afirmar que funcionan.

## Uso obligatorio de skills por Codex

Antes de implementar, modificar o refactorizar funcionalidad:

1. Leer esta guía y `.agents/skills/flujo-codex/SKILL.md`.
2. Revisar los nombres y descripciones en `.agents/skills/` y leer el `SKILL.md` de cada skill relevante para la tarea.
3. Usar siempre `arquitectura-hexagonal`; sumar las skills de dominio, adaptadores Laravel, pedidos, inventario, clientes/cobranzas, trazabilidad y calidad según el cambio.
4. Aplicar los requisitos funcionales, no funcionales, reglas de negocio y límites documentados; describir conflictos y decisiones pendientes.

## Arquitectura hexagonal obligatoria

- Toda funcionalidad nueva o modificada debe respetar Ports & Adapters. No cambiar la arquitectura existente sin ADR y aprobación explícita.
- **Domain**: entidades, objetos de valor, invariantes, reglas y servicios puros. No depende de Laravel, Eloquent, HTTP, SQL ni infraestructura.
- **Application**: casos de uso, comandos/DTOs y puertos requeridos por esos casos de uso. Depende del dominio y de abstracciones internas, nunca de implementaciones de infraestructura.
- **Infrastructure**: adaptadores de persistencia (incluido Eloquent) e integraciones externas que implementan los puertos internos.
- **Presentation**: controladores, componentes Livewire y otros adaptadores de entrada que validan/traducen solicitudes, llaman casos de uso y presentan respuestas.
- Las dependencias apuntan hacia adentro. Resolver implementaciones mediante inyección y Service Providers.
- Prohibido colocar lógica de negocio en controladores, vistas, componentes Livewire o modelos Eloquent; mantener HTTP y Eloquent fuera de Domain y Application.
- Usar `app/Modules/<Modulo>/{Domain,Application,Infrastructure}` cuando corresponda; mantener adaptadores HTTP en `app/Http/` y seguir la estructura Laravel existente. No imponer reorganizaciones globales ni crear carpetas vacías.
- Antes de finalizar, comprobar los límites entre capas y reportar cualquier incumplimiento inevitable.
