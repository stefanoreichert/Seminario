---
name: pedidos-mayoristas
description: Implementar pedidos y despachos parciales
---

# Casos de uso de pedidos mayoristas
- Registrar/consultar/modificar nota de pedido, evitando duplicados por identificador de origen + número según la regla que se confirme.
- Permitir varios ítems en una operación y validar cantidades positivas, catálogo y variantes.
- Mantener trazabilidad de cambios, actor y fecha; no borrar historia comercial.
- Estados y transiciones deben modelarse explícitamente después de confrontar relevamiento y decisiones del equipo.
- Permitir preparación y entrega parcial: pendiente = solicitado - despachado válido (considerar devoluciones por separado).
- Prohibir el despacho sin autorización comercial explícita.
- Probar duplicidad, rechazos, transición inválida, concurrentes y entrega parcial.
