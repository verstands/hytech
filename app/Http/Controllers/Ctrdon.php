<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\don;
use Illuminate\Support\Facades\DB;
use App\Models\eglise;

class Ctrdon extends Controller
{
    public function index(){
        if (session('admins') == true) {
            $company = eglise::all();
            return view("pages.don",compact('company'));
        }else{
            return redirect('/');
        }
        
    }
    
    public function affiche(){
        if (session('admins') == true) {
             $don = DB::table('dons')->join('eglises',  'eglises.id_eg','=', 'dons.id_eg')->
            select('id_off', 'type_off', 'eglises.nom')->get();
            return view("pages.affiche_don", compact('don'));
        }else{
            return redirect('/');
        }
       
    }
    public function store(Request $request){
        if (session('admins') == true) {
            $devise = don::create([
            'type_off' => $request->nom,
            'id_eg' => $request->company
            ]);
            return redirect()->route('affiche_don');
        }else{
            return redirect('/');
        }
       
    }
    public function delete_don($id_pou)
    {
        if (session('admins') == true) {
              $resu=don::whereId_off($id_pou)->delete();
             return redirect()->route('affiche_don');
        }else{
            return redirect('/');
        }
       
    }
    public function update_don($id_pou)
    {
        if (session('admins') == true) {
            $company = eglise::all();
            $resu = DB::table('dons')->
            join('eglises', 'dons.id_eg', '=', 'eglises.id_eg')->
            where('id_off', '=',$id_pou)->
            select('id_off', 'type_off', 'eglises.nom')->get();
            return view('pages.updon', compact('resu', 'company'));
        }else{
            return redirect('/');
        }
       
    }
    public function update_don_active(Request $req){
        if (session('admins') == true) {
            $mod = don::whereId_off($req->id_off)->update(['type_off' => $req->nom, 'id_eg' => $req->company]);
            return redirect()->route('affiche_don');
        }else{
            return redirect('/');
        }
        
    }
}
