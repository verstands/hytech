<?php

namespace App\Http\Controllers;

use App\Models\devise;
use App\Models\pourcentage;
use App\Models\company;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class Ctrpourcentage extends Controller
{
    public function index()
    {
        if (session('admins') == true) {
           $devise = devise::all();
            return view("pages.pourcentage", compact('devise')); 
        }else{
            return redirect('/');
        }
        
    }

    public function affiche()
    {
        if (session('admins') == true) {
           $tout = DB::table('pourcentages')->join('devises', 'devises.id_devise', '=', 'pourcentages.id_devise')->
            orderBy('id_pou','DESC')->
            select('titre','devises.type_d', 'id_pou')->
            get();
            return view("pages.affiche_pour", compact('tout')); 
        }else{
            return redirect('/');
        }
        
    }
    
    public function afficheN(){
        if (session('admins') == true) {
            $afficheN = DB::table('transactions')->join('eglises', 'eglises.id_eg', '=', 'transactions.id_eg')->orderBy('id_trans', 'DESC')->select('id_trans', 'user', 'eglises.nom', 'montant',  'id_devise')->get();
            $reqUSD = DB::table('pourcentages')->where('id_devise', 2)->select('titre')->get();
            $reqCDF = DB::table('pourcentages')->where('id_devise', 1)->select('titre')->get();
            foreach($reqUSD as $reqUSDs):
                $USD = $reqUSDs->titre;
            endforeach;
            foreach($reqCDF as $reqCDFs):
                $CDF = $reqCDFs->titre;
            endforeach;
             
            $mobile = DB::select("SELECT  SUM('montant') as usddd FROM transactions WHERE id_devise = 'USD' AND id_paiement = 6 ");
            foreach($mobile as $mobiles):
                $mobs = $mobiles->usddd;
            endforeach;
              
            
            return view("pages.affiche_pourN", compact('afficheN', 'USD', 'CDF'));
        }else{
            return redirect('/');
        }
        
    }
    public function store(Request $request){
        if (session('admins') == true) {
            $pourcentage = pourcentage::create([
            'titre' => $request->titre,
            'id_devise' => $request->devise
            ]);
            return redirect()->route('affiche_pourcentage');
        }else{
            return redirect('/');
        }
        
    }


    public function delete_pour($id_pou)
    {
        if (session('admins') == true) {
           $resu=pourcentage::whereId_pou($id_pou)->delete();
            return redirect()->route('affiche_pourcentage'); 
        }else{
            return redirect('/');
        }
        
    }

    public function update_pour($id_pou)
    {
        if (session('admins') == true) {
            $devise = devise::all();
            $resu = DB::table('pourcentages')->join('devises', 'devises.id_devise', '=', 'pourcentages.id_devise')->
            where('id_pou', '=', $id_pou)->
            select('titre', 'type_d', 'id_pou')->get();
            return view("pages.uppoucentage", compact('resu', 'devise'));
        }else{
            return redirect('/');
        }
        
    }
    public function update_pour_active(Request $request)
    {
        if (session('admins') == true) {
            $resultat = pourcentage::whereId_pou($request->id)->update(['titre' => $request->titre, 'id_devise' => $request->devise]);
            return redirect()->route('affiche_pourcentage');
        }else{
            return redirect('/');
        }
        
    }


    public function eglise(){
            return view("user.user");
    }
    
}
