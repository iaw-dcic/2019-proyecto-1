<?php
namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Item;
use App\Lista;
use App\Authenticator;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('show');
    }

    public function edit(User $user){
        $this->authorize('pass',$user);

        return view('users.edit', ['user' => $user]);
    }



    public function twofactorP (Request $request){
        // La validacion la hago con boostrap en la vista
        $user= User::where('email',$request->email)->first();
        $authenticator = new Authenticator();
        $checkresult = $authenticator->verifyCode($user->semilla,$request->token,0);
        $login = new LoginController();
        if($checkresult)
            return redirect('home');
        else
            return $login->logout();
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
            if($user['activar2F']=='on'){
                $data['activar2F']=true;
                $authenticator = new Authenticator();
                $secret =$authenticator->generateRandomSecret();
                $QR = $authenticator->getQR('futboleros',$secret);
                //aca podria mandarle toda la info necesaria para el qr
                $user->update($data);

                return view('users.viewKey',[
                    'QR' => $QR,
                    'key' => $secret,
                    'user' => $user
                ]);
            }
            else{
               $data['activar2F']=false;
               $data['semilla']='0';
               $user->update($data);

               return redirect('home');
            }

    }

    public function storeKey($id,Request $request){
        $user = User::where('id',$id)->first();
        $data['semilla']=$request['k'];
        $user->update($data);
        return redirect('home');
    }
    public function show($id){
        $user = User::where('id',$id)->first();
        $listas= Lista::where('user_id',$id)->get();
        $items= Item::all();
        return view('users.show',[
            'user' => $user,
            'lists' => $listas,
            'items' => $items,
        ]);
    }

}
