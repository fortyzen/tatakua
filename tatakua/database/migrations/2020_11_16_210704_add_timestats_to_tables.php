<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestatsToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::table('bebidas', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('capacidad', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('clientes', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('empleados', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('marcas', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('pedidos_cabecera', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('pedidos_detalle', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('productos_principales', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('proveedores', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('sexo', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('tipo_cliente', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('tipo_producto', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('tipo_usuario', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('tortas', function (Blueprint $table) {
            $table->timestamps();
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
            $table->dropColumn(['created_at','updated_at']);
        });

        Schema::table('capacidad', function (Blueprint $table) {
            $table->dropColumn(['created_at','updated_at']);
        });

        Schema::table('clientes', function (Blueprint $table) {
            $table->dropColumn(['created_at','updated_at']);
        });

        Schema::table('empleados', function (Blueprint $table) {
            $table->dropColumn(['created_at','updated_at']);
        });

        Schema::table('marcas', function (Blueprint $table) {
            $table->dropColumn(['created_at','updated_at']);
        });

        Schema::table('pedidos_cabecera', function (Blueprint $table) {
            $table->dropColumn(['created_at','updated_at']);
        });

        Schema::table('pedidos_detalle', function (Blueprint $table) {
            $table->dropColumn(['created_at','updated_at']);
        });

        Schema::table('productos_principales', function (Blueprint $table) {
            $table->dropColumn(['created_at','updated_at']);
        });

        Schema::table('proveedores', function (Blueprint $table) {
            $table->dropColumn(['created_at','updated_at']);
        });

        Schema::table('sexo', function (Blueprint $table) {
            $table->dropColumn(['created_at','updated_at']);
        });

        Schema::table('tipo_cliente', function (Blueprint $table) {
            $table->dropColumn(['created_at','updated_at']);
        });

        Schema::table('tipo_producto', function (Blueprint $table) {
            $table->dropColumn(['created_at','updated_at']);
        });

        Schema::table('tipo_usuario', function (Blueprint $table) {
            $table->dropColumn(['created_at','updated_at']);
        });

        Schema::table('tortas', function (Blueprint $table) {
            $table->dropColumn(['created_at','updated_at']);
        });
    }
}
