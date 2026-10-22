---
name: laravel-adaptadores
description: Implementar adaptadores Laravel sin contaminar dominio
---

# Laravel como framework exterior
- Eloquent Models pertenecen a infraestructura y no son entidades del dominio.
- HTTP Controllers, Form Requests, Policies y Resources son adaptadores de entrada.
- Los casos de uso reciben comandos/DTO y contratos, no Request ni modelos Eloquent.
- Repositorios concretos implementan interfaces definidas en Application/Domain según necesidad.
- Providers enlazan implementaciones con puertos.
- Migraciones conservan claves foráneas, índices, unicidad y restricciones de integridad.
- No cambiar dependencias, versión PHP/Laravel o estructura real sin inspeccionar composer.json y árbol del repositorio.
