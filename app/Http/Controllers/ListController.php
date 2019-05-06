<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Item;
use App\Lista;


class ListController extends Controller
{
    /**Index se va a referir a nuestro modulo de usuario, cuya logica va a estar encapsulada en UserController  */
    public function index(){
        if(auth()->user()!=null){

            //usoEloquentModel para obtener la tabla de listas
            $lists = Lista::orderBy('created_at','desc')->get();

            $items = Item::all();

            //A la vista le paso un arreglo asociativo, donde cada fila va a ser (llave,valor)
            return view('users.index', [
                'lists' => $lists,
                'user' => auth()->user(),
                'items' => $items,
            ]);
        }else {
            return back();
        }
    }

    public function showListas(){
        if(auth()->user()!=null){
            $user = auth()->user();
            //usoEloquentModel para obtener la tabla de listas
            $lists = Lista::where('user_id',$user->id)->get();


            $items = Item::all();

            //A la vista le paso un arreglo asociativo, donde cada fila va a ser (llave,valor)
            return view('users.showListas', [
                'lists' => $lists,
                'user' => auth()->user(),
                'items' => $items,
            ]);
        }else {
            return back();
        }
    }


    public function create(){
         if(auth()->user()!=null)
            return view('users.create');
         else
            return back();
    }
    public function createItem(){
        if(auth()->user()!=null)
            return view('users.createItem');
        else {
            return back();
        }
    }

    public function storeItem(Request $request){


        $data = request()->all();
        $lista= Lista::orderby('id','desc')->first();
        if(count($request->nombre_club) > 0){
            foreach($request->nombre_club as $item=>$v){
                $data2=array(
                    // 'nombre_club'
                    'nombre_club' => $request->nombre_club[$item],
                    'nombre_estadio' => $request->nombre_estadio[$item],
                    'capacidad_estadio' => $request->capacidad_estadio[$item],
                    'pais' => $request->pais[$item],
                    'list_id' => $lista->id,

                );
                Item::create($data2);
            }
        }
        return redirect()->route('users.index');
    }



    public function store(){
        /**Recibimos los datos del formulario */
        $data = request()->all();
        $user = auth()->user();

        $list = Lista::create([
            'name' => $data['name'],
            'isPublic' => true,
            'user_id' => $user->id,
        ]);

        $lista= Lista::where('name','=',$list->name)->first();

        /**Redirecciono al usuario a detalles */
        return view('users.createItem',[
            'lista' => $lista,
        ]);

    }

    public function editLista($id){
        if(auth()->user()!=null){
           $list = Lista::where('id',$id)->first();
           return view('users.editLista',[
               'list' => $list,
           ]
        );}
        else
           return back();
   }

   public function updateLista($id){
       $list->update(request()->validate([
           'name' => 'required',
       ]));
      return redirect()->route('users.showListas');
   }

    public function destroy($id){
        if(auth()->user()!=null){
            $items = Item::where('list_id',$id)->delete();

            $list = Lista::where('id',$id)->first();
            $list->delete();
            return redirect()->route('users.showListas')->with('message', 'La lista'.$list->name.' ha sido borrada de forma exitosa');
        }else {
            return back();
        }
    }


    public function edit(User $user){
        return view('users.edit', ['user' => $user]);
    }


}
