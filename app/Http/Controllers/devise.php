<?php

namespace App\Http\Controllers;
use App\Models\devise;
use Illuminate\Http\Request;
class Ctrdevise extends Controller
{
    public function index(){
        return view("pages.devise");
    }
    
    public function affiche(){
        return view("pages.affiche_devise");
    }
    public function store(Request $request){
        $devise = devise::create([
            'type_d' => $request->devise
        ]);
    }
    public function delete_devise($id_pou)
    {
        $resu=devise::whereId_devise($id_pou)->delete();
        return redirect()->route('affiche_paiement');
    }
}
