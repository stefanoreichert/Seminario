---
name: dominio-simon
description: Modelar el negocio de SIMON SRL sin inventar reglas
---

# Dominio SIMON SRL
Contexto: fabricante y mayorista de calzado de seguridad. Usuarios: Ventas (Sandra, Gustavo y fábrica/Nadia), Administración (Nadia), Depósito (Claudia), Producción (Pablo), Gerencia (Mirta/Damián).
Contextos: Clientes, Catálogo, Pedidos, Inventario de producto terminado, Preparación/Despachos, Trazabilidad, Cuentas corrientes, Devoluciones y Reportes.
- Nota de pedido con origen, número, cliente, renglones por modelo/color/talle/cantidad.
- Registrar pedidos pendientes y despachos parciales sin perder saldo.
- Registrar ingreso desde empaque, egreso por despacho, reservas/compromisos sin confundir existencias físicas con disponibles.
- Asociar lotes/partidas a unidades o cantidades despachadas con trazabilidad recuperable.
- Autorización administrativa obligatoria antes de salida del depósito.
- No inventar reglas impositivas, importes, estados ni plazos de garantía; verificar en documentación vigente.
- Detectar discrepancia documental: código de origen de Gustavo figura como G en algunos pasajes y N en otros; no codificar hasta validar.
