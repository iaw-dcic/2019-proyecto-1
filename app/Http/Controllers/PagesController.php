<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\lista;
use App\User;
use App\goal;

class PagesController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getHome()
    {
        $users = User::all();
        $paquetes = []; 
        $user_auth = Auth::user();
        $id_reg = null;
        if($user_auth != null)
            $id_reg = $user_auth->id;
        $i = 0;
        foreach ($users as $user) {
            if ($user->id != $id_reg) {
                $listas = lista::where([
                    ['public', '=', 1],
                    ['user_id', '=', $user->id]
                ])->get();
                $paquetes[$i] = [$user, $listas];
                $i = $i + 1;
            }
        }

        return view('home', ['paquetes' => $paquetes]);
    }


    public function getOtherProfile(User $user)
    {
        return view('Profile/otherProfile', compact('user'));
    }

    public function getOtherList(Lista $lista)
    {
        $user = User::findOrFail($lista->user_id);
        $goals = goal::where('lista_id', $lista->id)->get();

        return view('otherList', compact('lista', 'goals','user'));
    }

    public function getSettings()
    {
        return view('Profile\settings');
    }

    public function getReadme() {
        return view('readme');
    }
}
