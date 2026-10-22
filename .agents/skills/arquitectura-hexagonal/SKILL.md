---
name: arquitectura-hexagonal
description: Implementar y revisar funcionalidades Laravel siguiendo arquitectura hexagonal; consultar antes de crear, modificar o refactorizar funcionalidad.
---

# Arquitectura hexagonal obligatoria

## Límites de capas

- **Domain**: entidades, objetos de valor, invariantes, reglas y servicios puros. No depende de Laravel, Eloquent, HTTP, SQL ni infraestructura.
- **Application**: casos de uso, comandos/DTOs y puertos requeridos por cada caso de uso. Depende del dominio y de abstracciones propias, nunca de implementaciones externas.
- **Infrastructure**: adaptadores de persistencia Eloquent y de servicios externos; implementa los puertos internos.
- **Presentation**: adaptadores de entrada. Los controladores y componentes Livewire validan o traducen la entrada, llaman casos de uso y presentan respuestas.
- Las dependencias siempre apuntan hacia adentro. Registrar implementaciones en Service Providers e inyectarlas mediante contratos.
- No colocar lógica de negocio en controladores, vistas, componentes Livewire ni modelos Eloquent. Mantener Eloquent y objetos HTTP fuera de Domain y Application.

## Estructura y procedimiento

Organizar módulos nuevos en `app/Modules/<Modulo>/{Domain,Application,Infrastructure}`. Mantener los adaptadores HTTP en `app/Http/`, y las rutas y Service Providers en las ubicaciones Laravel existentes. Adaptar la ubicación de Presentation a la estructura real; no imponer una reorganización global.

1. Leer `AGENTS.md`, esta skill y las skills relevantes; revisar requisitos y código existente.
2. Identificar el módulo, caso de uso, reglas y requisitos afectados; señalar supuestos y conflictos.
3. Implementar reglas e invariantes en Domain.
4. Orquestar el caso de uso en Application y definir allí los puertos externos que necesite. Un contrato pertenece a Domain solo cuando expresa una abstracción propia del dominio.
5. Implementar los puertos mediante adaptadores en Infrastructure.
6. Conectar puertos y adaptadores con inyección y Service Providers.
7. Probar invariantes y casos de uso; verificar integración de adaptadores cuando corresponda.
8. Revisar que Domain/Application no dependan del framework y que todas las dependencias apunten hacia las capas internas.

No crear carpetas vacías ni abstracciones sin necesidad concreta. No imponer repositorios genéricos, migraciones destructivas ni cambios de arquitectura sin ADR y aprobación explícita.
