<?php

namespace App\Http\Controllers;
use App\Models\transaction;
use App\Models\eglise;
use App\Models\devise;
use App\Models\don;
use App\Models\paiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Ctrtransaction extends Controller
{
    
    public function index(){
        if (session('admins') == true) {
            $sommes_tot = DB::table('transactions')->where('id_devise', "USD")->sum('montant');
            $sommes_totcdf = DB::table('transactions')->where('id_devise', "CDF")->sum('montant');
            $affiche = DB::table('transactions')->
            join('paiements', 'paiements.id_paiement', '=', 'transactions.id_paiement')->
            join('dons', 'dons.id_off', '=', 'transactions.id_off')->
            join('eglises', 'eglises.id_eg', '=', 'transactions.id_eg')->
            orderBy('id_trans', 'DESC')->
            select('id_trans', 'user', 'montant', 'id_devise', 'eglises.nom', 'paiements.type_p', 'dons.type_off', 'date_t')->
            get();
            return view("pages.transaction", compact('affiche', 'sommes_tot', 'sommes_totcdf'));
        }else{
            return redirect('/');
        }
    }
}
