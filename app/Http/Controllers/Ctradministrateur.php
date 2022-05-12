<?php

namespace App\Http\Controllers;
use App\Models\admin;
use App\Models\eglise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Ctradministrateur extends Controller
{
    public function index(){
         
        if (session('admins') == true) {
            $company = eglise::all();
            return view("pages.administrateur", compact('company'));
        }else{
            return redirect('/');
        }
    }
    
    public function affiche(){
         
        if (session('admins') == true) {
            $administrateur = DB::table('admins')->
            join('eglises', 'eglises.id_eg', '=', 'admins.id_eg')->where('type_admin', '=','2')->
            orderBy('id_admin', 'DESC')->
            select('id_admin', 'eglises.nom', 'login', 'type_admin', 'password', 'email')->
            get();
            return view("pages.affiche_adm", compact('administrateur'));
        }else{
            return redirect('/');
        }
        
    }
    public function store(Request $request){
        if (session('admins') == true) {
            $devise = admin::create([
                'login' => $request->login,
                'password' => $request->password,
                'email' => $request->email,
                'active' => 0,
                'id_eg' => $request->company,
                'type_admin' => 2,
            ]);
        return redirect()->route('administrateur_affiche');
        }else{
            return redirect('/');
        }
       
    }
    public function delete_admin($id_pou)
    {
        if (session('admins') == true) {
            $resu=admin::whereId_admin($id_pou)->delete();
            return redirect()->route('administrateur_affiche');
        }else{
            return redirect('/');
        }
        
    }
    public function update_admin($id_pou)
    {
        if (session('admins') == true) {
            $resultat = DB::table('admins')->join('eglises', 'eglises.id_eg', '=', 'admins.id_eg')->
            where('id_admin', '=', $id_pou)->
            select('login', 'id_admin', 'password', 'eglises.nom','email')->get();
            return view('pages.upadmin', compact('resultat'));
        }else{
            return redirect('/');
        }
      
    }

    public function profil(){
        if (session('admins') == true) {
            $profil = DB::table('admins')->where('email', '=', session('admins'))->
            select('email', 'login', 'password')->get();
            return view('pages.profil', compact('profil'));
        }else{
            return redirect('/');
        }
      
    }
    public function update_admin_active(Request $req){
        if (session('admins') == true) {
            $mod = admin::whereId_admin($req->id)->update(['login' => $req->login, 'password' => $req->password, 'email' => $req->email]);
            return redirect()->route('administrateur_affiche');
        }else{
            return redirect('/');
        }
        
    }
    public function profil_active(Request $req ){
        if (session('admins') == true) {
            $mod = admin::whereEmail(session('admins'))->update(['login' => $req->login, 'password' => $req->password, 'email' => $req->email]);
            session_start();
            session_unset();
            session_destroy();
            return redirect()->route('index');
        }else{
            return redirect('/');
        } 
    }
}
