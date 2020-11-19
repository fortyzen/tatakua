<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Bebida extends Model{
    use HasFactory;
    //use SoftDeletes; //para el softdelete

    protected $table = 'bebidas';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'descripcion', 'precio', 'cant_actual', 'cant_minima', 'marca_id', 'created_at', 'updated_at'];

    //modelo polimorfico
    public function getProductos(){
        /*
        si o si segundo atributo en morphMany tiene que llamarse 'producto' ya se
        tiene que linkear con el nombre de la tabla 'productos' y el metodo producto
        en el modelo Producto
        */
        return $this->morphMany('App\Models\Producto', 'producto');
    }
}
