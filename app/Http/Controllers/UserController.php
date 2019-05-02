<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Item;
use App\Lista;

class UserController extends Controller
{
    /**Index se va a referir a nuestro modulo de usuario, cuya logica va a estar encapsulada en UserController  */
    public function index(){

        //usoEloquentModel para obtener la tabla de usuarios
        $lists = Lista::orderBy('created_at','desc')->get();

        //A la vista le paso un arreglo asociativo, donde cada fila va a ser (llave,valor)
        return view('users.index', [
            'lists' => $lists,
        ]);
    }

    /**Muestra el detalle del usuario. */
    public function show(User $user){
        $user = User::find($user->id);
        if($user == null){
            return response()->view('errors.404',[],404);
        }
        else{
            return view('users.show', [
                'user'=> $user,
            ]);
        }
    }

    public function create(){
         if(auth()->user()!=null)
            return view('users.create');
         else
            return back();
    }
    public function createItem(){
        return view('users.createItem');
    }

    public function storeItem(Request $request){


        $data = request()->all();
        $lista= Lista::orderby('list_id','desc')->first();
        if(count($request->nombre_club) > 0){
            foreach($request->nombre_club as $item=>$v){
                $data2=array(
                    // 'nombre_club'
                    'nombre_club' => $request->nombre_club[$item],
                    'nombre_estadio' => $request->nombre_estadio[$item],
                    'capacidad_estadio' => $request->capacidad_estadio[$item],
                    'pais' => $request->pais[$item],
                    'list_id' => $lista->list_id,

                );
                Item::create($data2);
            }
        }
        return redirect()->route('users.index');
    }




    public function store(){
        /**Recibimos los datos del formulario */
        $data = request()->all();

        $list = Lista::create([
            'name' => $data['name'],
            'isPublic' => true,
        ]);

        $lista= Lista::where('name','=',$list->name)->first();

        /**Redirecciono al usuario a detalles */
        return view('users.createItem',[
            'lista' => $lista,
        ]);

    }

    public function edit(User $user){
        return view('users.edit', ['user' => $user]);
    }

    public function update(User $user){
        $data = request()->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),], //En la busqueda me tiene que ignorar el mail actual del usuario.
            'password' => '',
        ]);

        if($data['password'] != null){
            $data['password'] = bcrypt($data['password']);
        }else{
            //Usamos unset para quitar el indice password del array asociativo de la variable data
            unset($data['password']);
        }


        $user->update($data);

        return redirect("usuarios/{$user->id}");
        // return redirect()->route('users.show', [
        //     'user' => $user->id
        // ]);
    }

    public function destroy(User $user){
        $user->delete();

        return redirect()->route('users.index');
    }
}
