<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{ 

    protected $fillable = [
        'nombre', 'descripcion', 'pasos','id_autor','lista_id','categoria','imagen'
    ];

    public function scopeNombre($query,$nombre)
    {
        return $query->where('nombre', '<=', $nombre);
    }
    public function listaId()
{
    return $this->belongsTo(\App\Lista::class, 'lista_id');
}
public function autorId()
{
    return $this->belongsTo(\App\User::class, 'id_autor');
}
}
