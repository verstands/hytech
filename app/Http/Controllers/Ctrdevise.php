<?php

namespace App\Http\Controllers;
use App\Models\devise;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class Ctrdevise extends Controller
{
    public function index(){
        if (session('admins') == true) {
            return view("pages.devise"); 
        }else{
            return redirect('/');
        }
       
    }
    
    public function affiche(){
        if (session('admins') == true) {
            $resultat=devise::all(); 
            return view("pages.affiche_devise", compact('resultat'));
        }else{
            return redirect('/');
        }
       
    }
    
    public function store(Request $request){
        if (session('admins') == true) {
           $devise = devise::create([
            'type_d' => $request->devise
            ]);
            return redirect()->route('affiche_devise')->with('status', 'la devise a ete ajouter avec success');
        }else{
            return redirect('/');
        }
        
    }

    public function delete_devise($id_pou)
    {
        if (session('admins') == true) {
           $resu=devise::whereId_devise($id_pou)->delete();
            return redirect()->route('affiche_devise');
        }else{
            return redirect('/');
        }
        
    }
    public function update_devise($id_pou){
        if (session('admins') == true) {
            $resu = DB::table('devises')->where('id_devise', '=',$id_pou)->
            select('type_d', 'id_devise')->get();
            return view('pages.updevise', compact('resu'));
        }else{
            return redirect('/');
        }
       
    }

    public function update_devise_action(Request $req){
        if (session('admins') == true) {
            $mod = devise::whereId_devise($req->id)->update(['type_d' => $req->devise]);
            return redirect()->route('affiche_devise');
        }else{
            return redirect('/');
        }
        
    }
}
