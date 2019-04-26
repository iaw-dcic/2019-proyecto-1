<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    protected $fillable = [
        'titulo', 'descripcion', 'public'
    ];

    public function games(){
        return $this->hasMany(Juego::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function addGame($name,$genre,$company,$release_date){
       
        $this->games()->create(compact(['name' => $name,
        'genre' => $genre,
        'company' => $company,
        'release_date' => $release_date]));
       
        return Juego::create([
            'list_id' => $this->id,
            
        ]);
    }
}
