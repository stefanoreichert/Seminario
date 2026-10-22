---
name: inventario-trazabilidad
description: Proteger stock y lotes de fabricación
---

# Inventario y trazabilidad
- Alcance: producto terminado en depósito, no materias primas ni control de maquinaria.
- Movimientos inmutables: ingreso desde empaque, salida por despacho, devolución aceptada, ajuste autorizado.
- Transacciones de base de datos en operaciones que actualizan reservas y movimientos; bloquear y verificar concurrencia.
- Evitar stock negativo y dobles descuentos; idempotencia al reintentar.
- Diferenciar stock físico, reservado, disponible, pendiente y en proceso (solo información recibida de Producción cuando corresponda).
- Vincular lote/partida al despacho para poder consultar histórico por cliente/producto/lote.
- QR o código individual por par: evolución futura, no requisito obligatorio del MVP según TP Análisis.
