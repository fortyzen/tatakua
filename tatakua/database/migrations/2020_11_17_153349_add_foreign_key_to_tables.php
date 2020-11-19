<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bebidas', function (Blueprint $table) {
            //forma 1
            if (Schema::hasColumn('marcas', 'id_marca')) { //si tiene el campo
                $table->dropColumn('id_marca');// borra el campo
                $table->unsignedBigInteger('marca_id'); //crea uno nuevo con el nombre correcto
                $table->foreign('marca_id')->references('id')->on('marcas'); //agrega el foreign key
            }

            /*forma 2 no me gusta porque es muy larga pero es para usar practicar las distintas formas de manipulacion de tablas
            if (Schema::hasColumn('bebidas', 'id_capacidad')) { //si tiene el campo
                $table->unsignedBigInteger('id_capacidad')->change(); //cambiar el tipo de dato
                $table->renameColumn('id_capacidad', 'capacidad_id');//cambiar el nombre
                $table->foreign('capacidad_id')->references('id')->on('capacidad');// agrega el foreign key
            } elseif(Schema::hasColumn('bebidas', 'capacidad_id')) { //si existe el campo ya que en esta tabla yo habia cambiado para probar esto
                //no hace nada
            } else { //si jamas existio el campo para el foreignkey
                $table->unsignedBigInteger('capacidad_id'); //crea el campo
                $table->foreign('capacidad_id')->references('id')->on('capacidad');// agrega el foreign key
            }*/

            if (Schema::hasColumn('marcas', 'id_capacidad')) { //si tiene el campo
                $table->dropColumn('id_capacidad');// borra el campo
                $table->unsignedBigInteger('capacidad_id'); //crea uno nuevo con el nombre correcto
                $table->foreign('capacidad_id')->references('id')->on('capacidad'); //agrega el foreign key
            }
        });

        Schema::table('clientes', function (Blueprint $table) {
            if (Schema::hasColumn('clientes', 'id_tipo_cliente')) { //si tiene el campo
                $table->dropColumn('id_tipo_cliente');// borra el campo
                $table->unsignedBigInteger('tipo_cliente_id'); //crea uno nuevo con el nombre correcto
                $table->foreign('tipo_cliente_id')->references('id')->on('tipo_cliente'); //agrega el foreign key
            }
        });

        Schema::table('empleados', function (Blueprint $table) {
            if (Schema::hasColumn('empleados', 'id_sexo')) { //si tiene el campo
                $table->dropColumn('id_sexo');// borra el campo
                $table->unsignedBigInteger('sexo_id'); //crea uno nuevo con el nombre correcto
                $table->foreign('sexo_id')->references('id')->on('sexo'); //agrega el foreign key
            }
        });

        Schema::table('pedidos_cabecera', function (Blueprint $table) {
            if (Schema::hasColumn('pedidos_cabecera', 'id_cliente')) { //si tiene el campo
                $table->dropColumn('id_cliente');// borra el campo
                $table->unsignedBigInteger('cliente_id'); //crea uno nuevo con el nombre correcto
                $table->foreign('cliente_id')->references('id')->on('clientes'); //agrega el foreign key
            }

            if (Schema::hasColumn('pedidos_cabecera', 'id_pedido_det')) { //si tiene el campo
                $table->dropColumn('id_pedido_det');// borra el campo
                $table->unsignedBigInteger('pedido_det_id'); //crea uno nuevo con el nombre correcto
                $table->foreign('pedido_det_id')->references('id')->on('pedidos_detalle'); //agrega el foreign key
            }
        });

        Schema::table('pedidos_detalle', function (Blueprint $table) {
            if (Schema::hasColumn('pedidos_detalle', 'id_producto')) { //si tiene el campo
                $table->dropColumn('id_producto');// borra el campo
                $table->unsignedBigInteger('producto_id'); //crea uno nuevo con el nombre correcto
                $table->foreign('producto_id')->references('id')->on('productos'); //agrega el foreign key
            }
        });

        Schema::table('productos_principales', function (Blueprint $table) {
            if (Schema::hasColumn('productos_principales', 'id_tipo_prod')) { //si tiene el campo
                $table->dropColumn('id_tipo_prod');// borra el campo
                $table->unsignedBigInteger('tipo_prod_id'); //crea uno nuevo con el nombre correcto
                $table->foreign('tipo_prod_id')->references('id')->on('tipo_producto'); //agrega el foreign key
            }
        });

        Schema::table('proveedores', function (Blueprint $table) {
            if (Schema::hasColumn('proveedores', 'id_marca')) { //si tiene el campo
                $table->dropColumn('id_marca');// borra el campo
                $table->unsignedBigInteger('marca_id'); //crea uno nuevo con el nombre correcto
                $table->foreign('marca_id')->references('id')->on('marcas'); //agrega el foreign key
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bebidas', function (Blueprint $table) {
            $table->dropForeign(['marca_id']);
            $table->dropForeign(['capacidad_id']);
        });

        Schema::table('clientes', function (Blueprint $table) {
            $table->dropForeign(['tipo_cliente_id']);
        });

        Schema::table('empleados', function (Blueprint $table) {
            $table->dropForeign(['sexo_id']);
        });

        Schema::table('pedidos_cabecera', function (Blueprint $table) {
            $table->dropForeign(['pedido_det_id']);
            $table->dropForeign(['cliente_id']);
        });

        Schema::table('pedidos_detalle', function (Blueprint $table) {
            $table->dropForeign(['producto_id']);
        });

        Schema::table('proveedores', function (Blueprint $table) {
            $table->dropForeign(['marca_id']);
        });
    }
}
