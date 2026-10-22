
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1. ROLES
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50)->unique();
            $table->string('descripcion', 255)->nullable();
            $table->timestamps();
        });

        // 2. AGREGAR ROL A USERS
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id');

            $table->foreign('role_id', 'fk_users_roles')
                ->references('id')
                ->on('roles')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
        });

        // 3. VENDEDORES
        Schema::create('vendedores', function (Blueprint $table) {
            $table->increments('id_vendedor');
            $table->string('prefijo_vendedor', 20);
            $table->string('nombre_vendedor', 150);
            $table->string('direccion', 255)->nullable();
            $table->string('correo_electronico', 254)->nullable();
            $table->timestamps();
        });

        // 4. ZONAS
        Schema::create('zonas', function (Blueprint $table) {
            $table->increments('id_zona');
            $table->string('nombre_zona', 100);
            $table->string('prefijo_zona', 20);
            $table->unsignedInteger('id_vendedor');
            $table->timestamps();

            $table->foreign('id_vendedor', 'fk_zonas_vendedores')
                ->references('id_vendedor')->on('vendedores')
                ->restrictOnDelete()->cascadeOnUpdate();
        });

        // 5. CLIENTES
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id_cliente');
            $table->string('nombre_apellido', 150);
            $table->string('razon_social', 150)->nullable();
            $table->string('dni_cuit', 20);
            $table->string('direccion_entrega', 255);
            $table->string('direccion_fiscal', 255)->nullable();
            $table->string('correo_electronico', 254)->nullable();
            $table->string('telefono', 30)->nullable();
            $table->string('codigo_postal', 10)->nullable();
            $table->timestamps();
        });

        // 6. TIPOS DE NOTAS
        Schema::create('tipos_notas', function (Blueprint $table) {
            $table->increments('id_tipo_nota');
            $table->text('descripcion');
            $table->timestamps();
        });

        // 7. METODOS DE DESPACHO
        Schema::create('metodos_despacho', function (Blueprint $table) {
            $table->increments('id_metodo_despacho');
            $table->string('empresa_transporte', 150);
            $table->string('contacto', 100)->nullable();
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });

        // 8. DESPACHOS
        Schema::create('despachos', function (Blueprint $table) {
            $table->increments('id_despacho');
            $table->integer('numero_remito')->unique();
            $table->date('fecha_despacho');
            $table->string('estado', 30)->default('Pendiente');
            $table->unsignedInteger('id_metodo_despacho');
            $table->timestamps();

            $table->foreign(
                'id_metodo_despacho',
                'fk_despachos_metodos'
            )->references('id_metodo_despacho')
                ->on('metodos_despacho')
                ->restrictOnDelete()->cascadeOnUpdate();
        });

        // 9. NOTAS DE PEDIDO
        Schema::create('notas_pedido', function (Blueprint $table) {
            $table->increments('id_nota');
            $table->unsignedInteger('id_zona');
            $table->unsignedInteger('id_tipo_nota');
            $table->unsignedInteger('id_cliente');
            $table->unsignedInteger('id_despacho')->nullable();
            $table->date('fecha_pedido');
            $table->string('lista_precios', 50);
            $table->string('estado_pedido', 30)->default('Pendiente');
            $table->string('condicion_pedido', 100)->nullable();
            $table->timestamps();

            $table->foreign('id_zona', 'fk_notas_zonas')
                ->references('id_zona')->on('zonas')
                ->restrictOnDelete()->cascadeOnUpdate();

            $table->foreign('id_tipo_nota', 'fk_notas_tipos')
                ->references('id_tipo_nota')->on('tipos_notas')
                ->restrictOnDelete()->cascadeOnUpdate();

            $table->foreign('id_cliente', 'fk_notas_clientes')
                ->references('id_cliente')->on('clientes')
                ->restrictOnDelete()->cascadeOnUpdate();

            $table->foreign('id_despacho', 'fk_notas_despachos')
                ->references('id_despacho')->on('despachos')
                ->nullOnDelete()->cascadeOnUpdate();
        });

        // 10. ARTICULOS
        Schema::create('articulos', function (Blueprint $table) {
            $table->increments('id_articulo');
            $table->string('modelo', 100);
            $table->string('color', 50);
            $table->integer('talle');
            $table->timestamps();
        });

        // 11. DETALLES DE PEDIDO
        Schema::create('detalles_pedido', function (Blueprint $table) {
            $table->increments('id_detalle_pedido');
            $table->unsignedInteger('id_nota_pedido');
            $table->unsignedInteger('id_articulo');
            $table->integer('cantidad')->default(1);
            $table->string('estado_pedido', 30)->default('Pendiente');
            $table->timestamps();

            $table->foreign('id_nota_pedido', 'fk_detped_notas')
                ->references('id_nota')->on('notas_pedido')
                ->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreign('id_articulo', 'fk_detped_articulos')
                ->references('id_articulo')->on('articulos')
                ->restrictOnDelete()->cascadeOnUpdate();
        });

        // 12. DETALLES DE DESPACHO
        Schema::create('detalles_despacho', function (Blueprint $table) {
            $table->increments('id_detalle_despacho');
            $table->unsignedInteger('id_despacho');
            $table->unsignedInteger('id_detalle_pedido');
            $table->integer('cantidad_despachada');
            $table->timestamps();

            $table->foreign('id_despacho', 'fk_detdesp_despacho')
                ->references('id_despacho')->on('despachos')
                ->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreign('id_detalle_pedido', 'fk_detdesp_detped')
                ->references('id_detalle_pedido')->on('detalles_pedido')
                ->restrictOnDelete()->cascadeOnUpdate();
        });

        // 13. LOTES DE FABRICACION
        Schema::create('lotes_fabricacion', function (Blueprint $table) {
            $table->increments('id_lote_fabricacion');
            $table->integer('numero_lote');
            $table->date('fecha_fabricacion');
            $table->string('categoria', 50);
            $table->timestamps();
        });

        // 14. STOCKS
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id_stock');
            $table->unsignedInteger('id_lote_fabricacion');
            $table->unsignedInteger('id_articulo');
            $table->integer('cantidad')->default(0);
            $table->dateTime('fecha_hora')->useCurrent();
            $table->timestamps();

            $table->foreign('id_lote_fabricacion', 'fk_stock_lote')
                ->references('id_lote_fabricacion')->on('lotes_fabricacion')
                ->restrictOnDelete()->cascadeOnUpdate();

            $table->foreign('id_articulo', 'fk_stock_articulo')
                ->references('id_articulo')->on('articulos')
                ->restrictOnDelete()->cascadeOnUpdate();
        });

        // 15. MOVIMIENTOS DE STOCK
        Schema::create('movimientos_stock', function (Blueprint $table) {
            $table->increments('id_movimiento_stock');
            $table->string('tipo_movimiento', 30);
            $table->unsignedInteger('id_det_despacho')->nullable();
            $table->unsignedInteger('id_stock');
            $table->integer('cantidad');
            $table->timestamps();

            $table->foreign('id_det_despacho', 'fk_movstock_detdesp')
                ->references('id_detalle_despacho')->on('detalles_despacho')
                ->nullOnDelete()->cascadeOnUpdate();

            $table->foreign('id_stock', 'fk_movstock_stock')
                ->references('id_stock')->on('stocks')
                ->restrictOnDelete()->cascadeOnUpdate();
        });

        // ROLES INICIALES
        DB::table('roles')->insert([
            [
                'nombre' => 'Administrador',
                'descripcion' => 'Acceso completo al sistema',
            ],
            [
                'nombre' => 'Ventas',
                'descripcion' => 'Gestion de clientes y pedidos',
            ],
            [
                'nombre' => 'Deposito',
                'descripcion' => 'Gestion de stock y despachos',
            ],
            [
                'nombre' => 'Produccion',
                'descripcion' => 'Gestion de lotes de fabricacion',
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('movimientos_stock');
        Schema::dropIfExists('detalles_despacho');
        Schema::dropIfExists('stocks');
        Schema::dropIfExists('detalles_pedido');
        Schema::dropIfExists('notas_pedido');
        Schema::dropIfExists('despachos');
        Schema::dropIfExists('lotes_fabricacion');
        Schema::dropIfExists('articulos');
        Schema::dropIfExists('metodos_despacho');
        Schema::dropIfExists('tipos_notas');
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('zonas');
        Schema::dropIfExists('vendedores');

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('fk_users_roles');
            $table->dropColumn('role_id');
        });

        Schema::dropIfExists('roles');
    }
};
