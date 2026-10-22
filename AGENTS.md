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

## Arquitectura hexagonal obligatoria

- Toda funcionalidad nueva debe seguir arquitectura hexagonal.
- Antes de modificar código, leer:
  .agents/skills/arquitectura-hexagonal/SKILL.md
- Domain: entidades, objetos de valor, reglas de negocio y contratos.
  No depende de Laravel, Eloquent, HTTP ni infraestructura.
- Application: casos de uso y DTOs. Depende de Domain y de interfaces,
  nunca de implementaciones de infraestructura.
- Infrastructure: persistencia Eloquent e integraciones externas.
  Implementa los contratos definidos en las capas internas.
- Los controladores y componentes Livewire son adaptadores de entrada:
  validan la entrada, llaman casos de uso y presentan la respuesta.
- No colocar reglas de negocio ni consultas Eloquent en controladores,
  vistas o componentes Livewire.
- Registrar las implementaciones de interfaces en Service Providers.
- No cambiar estas reglas para simplificar una tarea.
- Antes de finalizar, revisar las dependencias entre capas e informar
  cualquier incumplimiento.
