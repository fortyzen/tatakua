<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model{
    use HasFactory;
    //use SoftDeletes; //para el softdelete

    protected $table = 'productos';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'producto_id', 'producto_type', 'created_at', 'updated_at'];

    //modelos polimorficos
    /*
    si o si este metodo tiene que llamarse 'producto' ya se tiene que linkear con el
    nombre de la tabla 'productos'
    */
    public function producto(){
        return $this->morphTo();
    }
}
