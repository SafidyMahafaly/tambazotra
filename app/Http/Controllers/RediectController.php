<?php

namespace App\Http\Controllers;

use App\Models\Choix;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Tirage;
class RediectController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $req = DB::select('select role_id from role_user where user_id = ?',[$id]);
        if($req[0]->role_id == 1){
            return view('Admin.index');
        }elseif($req[0]->role_id == 2){
            $sessions = Tirage::last();
            $choix = Choix::where('user_id', Auth::user()->id)
                            ->where('session_id', '')
                            ->first();
            // dd($choix);
            $tirage = Tirage::first();
            return view('Joueur.index',compact('tirage','choix'));
        }
    }
}
