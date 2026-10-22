---
name: arquitectura-hexagonal
description: Implementar y revisar funcionalidades Laravel siguiendo arquitectura hexagonal. Usar al crear o modificar código del proyecto.
---

# Arquitectura del proyecto

Organizar cada módulo en:
- app/Modules/<Modulo>/Domain/
- app/Modules/<Modulo>/Application/
- app/Modules/<Modulo>/Infrastructure/

Mantener los adaptadores HTTP en app/Http/.
Mantener las rutas y Service Providers en las carpetas de Laravel.

## Procedimiento

1. Leer AGENTS.md y revisar el código existente.
2. Identificar el módulo y el caso de uso.
3. Implementar reglas de negocio en Domain.
4. Orquestar el caso de uso en Application.
5. Definir contratos para persistencia o servicios externos.
6. Implementar esos contratos en Infrastructure.
7. Conectar interfaces e implementaciones mediante inyección.
8. Mantener Eloquent y objetos HTTP fuera de Domain y Application.
9. Probar las reglas de negocio y el caso de uso; verificar
   la integración de los adaptadores cuando corresponda.
10. Revisar que las dependencias apunten hacia las capas internas.

No crear carpetas vacías ni abstracciones sin una necesidad concreta.
No reorganizar todo el proyecto sin que la tarea lo requiera.
