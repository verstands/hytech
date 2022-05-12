<?php

namespace App\Http\Controllers;
use App\Models\transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\retrait;
use App\Models\devise;
use Illuminate\Support\Facades\Session;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class dash extends Controller
{
    public function index(){
      if (session('admins') == true) {
        $d = Session::get('admins');
        $date = date('Y-m-d');
        $annee = date('Y');
        $janvier = DB::select("SELECT COUNT(*) as date_t FROM transactions WHERE date_t BETWEEN '$annee-01-01' AND '$annee-01-31' ");
        $fervier = DB::select("SELECT COUNT(*) as date_t FROM transactions WHERE date_t BETWEEN '$annee-02-01' AND '$annee-02-28' ");
        $mars = DB::select("SELECT COUNT(*) as date_t FROM transactions WHERE date_t BETWEEN '$annee-03-01' AND '$annee-03-31' ");
        $avril = DB::select("SELECT COUNT(*) as date_t FROM transactions WHERE date_t BETWEEN '$annee-04-01' AND' $annee-04-30' ");
        $mai = DB::select("SELECT COUNT(*) as date_t FROM transactions WHERE date_t BETWEEN '$annee-05-01' AND '$annee-05-31' ");
        $juin = DB::select("SELECT COUNT(*) as date_t FROM transactions WHERE date_t BETWEEN '$annee-06-01' AND '$annee-06-30' ");
        $juillet = DB::select("SELECT COUNT(*) as date_t FROM transactions WHERE date_t BETWEEN '$annee-07-01' AND '$annee-07-31' ");
        $aout = DB::select("SELECT COUNT(*) as date_t FROM transactions WHERE date_t BETWEEN '$annee-08-01' AND '$annee-08-31' ");
        $septembre = DB::select("SELECT COUNT(*) as date_t FROM transactions WHERE date_t BETWEEN '$annee-09-01' AND '$annee-09-30' ");
        $octobre = DB::select("SELECT COUNT(*) as date_t FROM transactions WHERE date_t BETWEEN '$annee-10-01' AND '$annee-10-31' ");
        $novembre = DB::select("SELECT COUNT(*) as date_t FROM transactions WHERE date_t BETWEEN '$annee-11-01' AND '$annee-11-31' ");
        $decembre = DB::select("SELECT COUNT(*) as date_t FROM transactions WHERE date_t BETWEEN '$annee-12-01' AND' $annee-12-31' ");
        
        $pourcentageUSD = DB::table('pourcentages')->
        where('id_devise', '=', 2)->
        select('titre')->get();

        $pourcentageCDF = DB::table('pourcentages')->
        where('id_devise', '=', 1)->
        select('titre')->get();
              
        
        $affiche = DB::table('transactions')->
        join('paiements', 'paiements.id_paiement', '=', 'transactions.id_paiement')->
        join('dons', 'dons.id_off', '=', 'transactions.id_off')->
        join('eglises', 'eglises.id_eg', '=', 'transactions.id_eg')->
        orderBy('id_trans', 'DESC')->
        select('id_trans', 'user', 'montant', 'id_devise', 'eglises.nom', 'paiements.type_p', 'dons.type_off', 'date_t')->
        get();
        
        
        
        $sommes_tot = DB::table('transactions')->where('id_devise', "USD")->sum('montant');
        $sommes_totcdf = DB::table('transactions')->where('id_devise', "CDF")->sum('montant');
        
        $id_eg = DB::select('SELECT COUNT(*) as id_eg FROM eglises');
        $user = DB::select('SELECT COUNT(*) as user FROM transactions');
        $transT = DB::select("SELECT COUNT(*) as transT FROM transactions WHERE date_t = '.$date.' ");
        $trans = DB::select("SELECT COUNT(*) as trans FROM transactions ");
        $retrait = DB::select("SELECT SUM(montant) as retrait FROM retraits WHERE id_devise = 2 ");
        $retraitCDF = DB::select("SELECT SUM(montant) as retrait FROM retraits  WHERE id_devise = 1");
        $admin = DB::select("SELECT COUNT(*) as admin FROM admins WHERE type_admin = 2 ");
        $paiement = DB::select("SELECT COUNT(*) as paiement FROM paiements ");
        $don = DB::select("SELECT COUNT(*) as dons FROM dons ");
        $sous_admin = DB::select("SELECT *  FROM admins, eglises WHERE admins.id_eg = eglises.id_eg AND admins.type_admin = '2' AND admins.active = '1' ");
        
       
        return view("pages.dashboad", compact('affiche', 'id_eg', 'user', 'transT', 'trans', 'admin', 'paiement', 'sous_admin', 'janvier', 'fervier', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'decembre', 'sommes_tot', 'retrait','sommes_totcdf', 'don', 'pourcentageCDF', 'pourcentageUSD', 'retraitCDF'));
      }else{
         return redirect('/');
      }
    }


    public function affiche_retrait(){
      if (session('admins') == true) {
          $approuve = DB::table('retraits')->
          join('devises', 'devises.id_devise', '=',  'retraits.id_devise')->
          join('eglises', 'eglises.id_eg', '=', 'retraits.id_eg')->
          orderBy('id_retrait', 'DESC')->
          select('id_retrait', 'user','retraits.statut', 'date_retrait','montant','devises.type_d', 'eglises.nom')->get();
          return view('pages.affiche_approuve', compact('approuve'));
       }else{
           return redirect('/');
       } 
    }

    public function approuve_retrait(){
      if (session('admins') == true) {
          $approuve = DB::table('retraits')->
          join('devises', 'devises.id_devise', '=',  'retraits.id_devise')->
          join('eglises', 'eglises.id_eg', '=', 'retraits.id_eg')->
          where('statut', 0)->
          orderBy('id_retrait', 'DESC')->
          select('id_retrait', 'user','retraits.statut', 'date_retrait','montant','devises.type_d', 'eglises.nom')->get();
          return view('pages.apporuve', compact('approuve'));
       }else{
           return redirect('/');
       } 
    }
    
    public function update_approuve_retrait(Request $req){
      if (session('admins') == true) {
          $mod = retrait::whereId_retrait($req->id)->update(['statut' => 1]);
          return redirect()->route('affiche_r');
      }else{
          return redirect('/');
      }
      
  }
}
