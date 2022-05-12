<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\paiement;
use App\Models\eglise;
use Illuminate\Support\Facades\DB;
class Ctrpaiement extends Controller
{
    
    public function index(){
        if (session('admins') == true) {
            $company = eglise::all();
            return view("pages.paiement", compact('company'));
        }else{
            return redirect('/');
        }
        
    }
    
    public function affiche(){
        if (session('admins') == true) {
             $paiement = DB::table('paiements')->join('eglises', 'eglises.id_eg', '=', 'paiements.id_eg')->
            select('id_paiement',  'type_p','nom', 'icon','lien_p', 'type_lien')->get();
            return view("pages.affiche_paiement",compact('paiement'));
        }else{
            return redirect('/');
        }
       
    }

    public function store(Request $request){
        if (session('admins') == true) {
            $devise = paiement::create([
            'type_p' => $request->nom,
            'icon' => $request->icon,
            'lien_p' => $request->lien,
            'id_eg' => $request->company,
            'type_lien' => $request->tlien
            ]);
            return redirect()->route('affiche_paiement');
        }else{
            return redirect('/');
        }
        
    }
    public function delete_paie($id_pou)
    {
        if (session('admins') == true) {
             $resu=paiement::whereId_paiement($id_pou)->delete();
            return redirect()->route('affiche_paiement');
        }else{
            return redirect('/');
        }
       
    }

    public function update_paie($id_pou)
    {
        if (session('admins') == true) {
            $company = eglise::all();
            $resu = DB::table('paiements')->
            join('eglises', 'eglises.id_eg', '=', 'paiements.id_eg')->
            where('paiements.id_paiement', '=', $id_pou)->
            select('type_p', 'id_paiement', 'eglises.nom', 'icon', 'lien_p', 'type_lien')->get();
            return view('pages.uppaie', compact('resu', 'company'));
        }else{
            return redirect('/');
        }
       
    }
    public function update_paiement_active(Request $req){
        if (session('admins') == true) {
            $mod = paiement::whereId_paiement($req->id)->update(['type_p' => $req->nom, 'icon' => $req->icon, 'lien_p' => $req->icon, 'id_eg' => $req->company, 'type_lien' => $req->tlien]);
            return redirect()->route('affiche_paiement');
        }else{
            return redirect('/');
        }
        
    }
}
