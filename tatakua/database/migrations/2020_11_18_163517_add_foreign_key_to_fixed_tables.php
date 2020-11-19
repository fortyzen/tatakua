<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToFixedTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::table('bebidas', function (Blueprint $table) {
            $table->foreign('proveedor_id')->references('id')->on('proveedores');
        });
        Schema::table('tortas', function (Blueprint $table) {
            $table->foreign('proveedor_id')->references('id')->on('proveedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::table('bebidas', function (Blueprint $table) {
            $table->dropForeign(['proveedor_id']);
        });
        Schema::table('tortas', function (Blueprint $table) {
            $table->dropForeign(['proveedor_id']);
        });
    }
}
