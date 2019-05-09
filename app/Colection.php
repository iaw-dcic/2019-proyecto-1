<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Element;

class Colection extends Model
{
    protected $fillable = [
        'name', 'description', 'user_id','estado' 
    ];


    static public function findPublics(){
        
        return Colection::where('estado',1)->get();

    }

    public function findColection($id){
        $c = Colection::where('id', $id)->get();
        return $c[0];
    }

    public function findElementos(){
        return Element::where('colection_id', $this->id)->get();
    }

    public function findColecForUser($id){
        return Colection::where('user_id', $id)->get();
    }

    public function existe($id){
        try{
            $c = $this->findColection($id);
            
            if(is_null($c)){
                return false;
            }else{
                return true;
            }
        }catch(Exception $e){
            return false;
        }
    }
}
