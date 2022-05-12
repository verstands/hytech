<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\devise;
use App\Models\admin;
use App\Models\retrait;
use App\Models\eglise;
use App\Models\transaction;
use App\Models\don;
use app\Http\Controllers\callback;
use App\Models\administrateur;
use Illuminate\Support\Str;

class Ctradmin extends Controller
{
    public function index(){
        
        if (session('sous') == true) {
              
            $session = session('sous');

            $date = date('Y-m-d');
            $annee = date('Y');
            $janvier = DB::select("SELECT COUNT(*) as date_t FROM transactions, admins WHERE admins.id_eg = transactions.id_eg AND admins.email = '$session' AND date_t BETWEEN '$annee-01-01' AND '$annee-01-31'");
            $fervier = DB::select("SELECT COUNT(*) as date_t FROM transactions, admins WHERE admins.id_eg = transactions.id_eg AND admins.email = '$session' AND date_t BETWEEN '$annee-02-01' AND '$annee-02-28' ");
            $mars = DB::select("SELECT COUNT(*) as date_t FROM transactions, admins WHERE admins.id_eg = transactions.id_eg AND admins.email = '$session' AND date_t BETWEEN '$annee-03-01' AND '$annee-03-31' ");
            $avril = DB::select("SELECT COUNT(*) as date_t FROM transactions, admins WHERE admins.id_eg = transactions.id_eg AND admins.email = '$session' AND date_t BETWEEN '$annee-04-01' AND' $annee-04-30' ");
            $mai = DB::select("SELECT COUNT(*) as date_t FROM transactions, admins WHERE admins.id_eg = transactions.id_eg AND admins.email = '$session' AND date_t BETWEEN '$annee-05-01' AND '$annee-05-31' ");
            $juin = DB::select("SELECT COUNT(*) as date_t FROM transactions, admins WHERE admins.id_eg = transactions.id_eg AND admins.email = '$session' AND date_t BETWEEN '$annee-06-01' AND '$annee-06-30' ");
            $juillet = DB::select("SELECT COUNT(*) as date_t FROM transactions, admins WHERE admins.id_eg = transactions.id_eg AND admins.email = '$session' AND date_t BETWEEN '$annee-07-01' AND '$annee-07-31' ");
            $aout = DB::select("SELECT COUNT(*) as date_t FROM transactions, admins WHERE admins.id_eg = transactions.id_eg AND admins.email = '$session' AND date_t BETWEEN '$annee-08-01' AND '$annee-08-31' ");
            $septembre = DB::select("SELECT COUNT(*) as date_t FROM transactions, admins WHERE admins.id_eg = transactions.id_eg AND admins.email = '$session' AND date_t BETWEEN '$annee-09-01' AND '$annee-09-30' ");
            $octobre = DB::select("SELECT COUNT(*) as date_t FROM transactions, admins WHERE admins.id_eg = transactions.id_eg AND admins.email = '$session' AND date_t BETWEEN '$annee-10-01' AND '$annee-10-31' ");
            $novembre = DB::select("SELECT COUNT(*) as date_t FROM transactions, admins WHERE admins.id_eg = transactions.id_eg AND admins.email = '$session' AND date_t BETWEEN '$annee-11-01' AND '$annee-11-31' ");
            $decembre = DB::select("SELECT COUNT(*) as date_t FROM transactions, admins WHERE admins.id_eg = transactions.id_eg AND admins.email = '$session' AND date_t BETWEEN '$annee-12-01' AND' $annee-12-31' ");

           
            $date = date('Y-m-d');
            $user = DB::select("SELECT COUNT(*) as user FROM transactions, eglises, admins WHERE transactions.id_eg = eglises.id_eg AND  admins.id_eg = eglises.id_eg AND admins.email = '$session' ");
            $trans_today = DB::select("SELECT COUNT(*) as today FROM transactions, eglises, admins WHERE transactions.id_eg = eglises.id_eg AND admins.email = '$session' AND transactions.date_t = '$date' ");
            $trans = DB::select("SELECT COUNT(*) as trans FROM transactions, eglises, admins WHERE transactions.id_eg = eglises.id_eg  AND admins.id_eg = eglises.id_eg AND admins.email = '$session'");
            $retrait = DB::select("SELECT COUNT(*) as retrait FROM retraits, eglises, admins WHERE retraits.id_eg = eglises.id_eg AND  admins.id_eg = eglises.id_eg AND admins.email = '$session'");
            $retraitUSD = DB::select("SELECT COUNT(*) as usd FROM retraits, eglises WHERE retraits.id_eg = eglises.id_eg AND retraits.user= '$session' ");
            $retraitCDF = DB::select("SELECT COUNT(*) as cdf FROM retraits, eglises WHERE retraits.id_eg = eglises.id_eg AND retraits.user= '$session' ");
            
            $tot_usd =  DB::select("SELECT SUM(montant) as usdsomme FROM admins, transactions, eglises WHERE transactions.id_eg = eglises.id_eg AND  admins.email ='$session' AND transactions.id_devise = 'USD' ");
            $tot_cdf =  DB::select("SELECT SUM(montant) as usdsomme FROM admins, transactions, eglises WHERE transactions.id_eg = eglises.id_eg AND  admins.email ='$session' AND transactions.id_devise = 'CDF' ");

            $sommeUSD = DB::table('transactions')->join('devises', 'devises.id_devise', '=', 'transactions.id_devise')->
            join('eglises', 'eglises.id_eg', '=', 'transactions.id_eg')->
            join('dons', 'dons.id_off', '=', 'transactions.id_off')->
            join('admins', 'admins.id_eg', '=', 'transactions.id_eg')->
            join('paiements', 'paiements.id_paiement', '=', 'transactions.id_paiement')->
            where('transactions.id_devise', 1)->where('admins.email', '=', session('sous'))->sum('montant');
            
            $sommesCDF =  $sommeUSD = DB::table('transactions')->join('devises', 'devises.id_devise', '=', 'transactions.id_devise')->
            join('eglises', 'eglises.id_eg', '=', 'transactions.id_eg')->
            join('dons', 'dons.id_off', '=', 'transactions.id_off')->
            join('admins', 'admins.id_eg', '=', 'transactions.id_eg')->
            join('paiements', 'paiements.id_paiement', '=', 'transactions.id_paiement')->
            where('transactions.id_devise', 1)->where('admins.email', '=', session('sous'))->sum('montant');

            //DB::table('eglises')->join('admins',  'admins.id_eg', '=', 'eglises.id_eg')->
            //where('admins.email', '=', session('sous'))->update(['eglises.sommeusd' =>  $sommesCDF]);

            $somme = DB::table('eglises')->join('admins',  'admins.id_eg', '=', 'eglises.id_eg')->
            where('admins.email', '=', session('sous'))->
            select('sommeusd', 'sommecdf')->get();

            $transaction = DB::table('transactions')->
            join('devises', 'devises.id_devise', '=',  'transactions.id_devise')->
            join('eglises', 'eglises.id_eg', '=', 'transactions.id_eg')->
            join('dons', 'dons.id_off', '=', 'transactions.id_off')->
            join('admins', 'admins.id_eg', '=', 'eglises.id_eg')->
            join('paiements', 'paiements.id_paiement','=',  'transactions.id_paiement')->where('admins.email', '=', session('sous'))->
            orderBy('id_trans', 'DESC')->
            select('id_trans', 'user', 'montant', 'devises.type_d', 'eglises.nom', 'dons.type_off', 'paiements.type_p','date_t')->get();

            $reqUSD = devise::whereType_d('USD')->first();
            $reqCDF = devise::whereType_d('CDF')->first();
            $affiche_dashboard = DB::table('transactions')->
            join('eglises', 'eglises.id_eg', '=', 'transactions.id_eg')->
            join('dons', 'dons.id_off', '=', 'transactions.id_off')->
            join('admins', 'admins.id_eg', '=', 'eglises.id_eg')->
            join('paiements', 'paiements.id_paiement','=',  'transactions.id_paiement')->where('admins.email', '=', session('sous'))->
            orderBy('id_trans', 'DESC')->
            select('id_trans', 'user', 'montant', 'transactions.id_devise',  'eglises.nom', 'dons.type_off', 'paiements.type_p','date_t')->get();

            $sous_admin = DB::select("SELECT *  FROM administrateurs, eglises WHERE administrateurs.id_eg = eglises.id_eg AND administrateurs.type_admin = '2' AND administrateurs.active = '1' ");

            return view("page_admin.index", compact('sous_admin','user', 'trans_today', 'trans', 'transaction', 'sommeUSD', 'somme',  'retraitUSD','retraitCDF', 'retrait', 'tot_usd', 'tot_cdf', 'janvier', 'fervier', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'decembre', 'affiche_dashboard'));
        }else{
                return redirect('/');
        }
    }
    public function Stransaction(){
        if (session('sous') == true) {
            $session = session('sous');
            $reqUSD = devise::whereType_d('USD')->first();
            $reqCDF = devise::whereType_d('CDF')->first();
            $affiche = DB::table('transactions')->
            join('eglises', 'eglises.id_eg', '=', 'transactions.id_eg')->
            join('dons', 'dons.id_off', '=', 'transactions.id_off')->
            join('admins', 'admins.id_eg', '=', 'eglises.id_eg')->
            join('paiements', 'paiements.id_paiement','=',  'transactions.id_paiement')->where('admins.email', '=', session('sous'))->
            orderBy('id_trans', 'DESC')->
            select('id_trans', 'user', 'montant', 'transactions.id_devise',  'eglises.nom', 'dons.type_off', 'paiements.type_p','date_t')->get();

            $tot_usd =  DB::select("SELECT SUM(montant) as usdsomme FROM admins, transactions, paiements, dons, eglises WHERE transactions.id_eg = eglises.id_eg AND transactions.id_paiement = paiements.id_paiement AND transactions.id_off = dons.id_off AND  admins.email ='$session' AND transactions.id_devise = 'USD' ");
            $tot_cdf =  DB::select("SELECT SUM(montant) as usdsomme FROM admins, transactions, paiements, dons, eglises WHERE transactions.id_eg = eglises.id_eg AND transactions.id_paiement = paiements.id_paiement AND transactions.id_off = dons.id_off AND  admins.email ='$session' AND transactions.id_devise = 'CDF' ");

            return view("page_admin.t", compact('affiche', 'reqUSD', 'reqCDF', 'tot_usd', 'tot_cdf'));
        }else{
            return redirect('/');

        }
    }

    public function user($id){
        $decrypt = Crypt::decryptString($id);
        if ($id == true) {
            $affichage = DB::select("SELECT * FROM eglises WHERE id_eg = '$decrypt' AND lien = '1' ");
            if ($affichage == true) {
                $don = DB::select("SELECT * FROM dons, eglises WHERE dons.id_eg = eglises.id_eg AND dons.id_eg = '$decrypt' ");
                session_start();
                Session::put('eglise', $decrypt);
                return view("user.user", compact('affichage', 'don'));
            }else{
                dd('lien invalid');
            }
        }else{
            return redirect();
        }
    }
    
    public function Sprofil(){
        if (session('sous') == true) {
            $profil = DB::table('admins')->where('email', '=', session('sous'))->
            select('email', 'login', 'password')->get();
            return view('page_admin.profil', compact('profil'));
        }else{
            return redirect('/');
        }
      
    }

    public function Sprofil_active(Request $req ){
        if (session('sous') == true) {
            $ancien_pwd = admin::whereEmail(session('sous'))->wherePassword($req->apassword)->first();
            if($ancien_pwd == true){
                $mod = admin::whereEmail(session('sous'))->update(['login' => $req->login, 'password' => $req->password, 'email' => $req->email, 'active' => 0]);
                session_start();
                session_unset();
                session_destroy();
                return redirect()->route('index');
            }else{
                return redirect()->route('Sprofil');
            }
            
        }else{
            return redirect('/');
        } 
    }
    public function user2($id){
        $decrypt = Crypt::decryptString($id);
        $eglise = session('eglise');
        if(isset($id)){
            $affichage = DB::select("SELECT * FROM eglises WHERE id_eg = '$eglise' ");
            $paiement = DB::select("SELECT * FROM paiements, eglises WHERE paiements.id_eg = eglises.id_eg AND paiements.id_eg = '$eglise' ");
            Session::put('don', $decrypt);
            return view("user.user2", compact('affichage', 'paiement'));
        }else{
            
        }
    }
    public function user3($id){
        $decrypt = Crypt::decryptString($id);
        $eglise =  session('eglise');
        $affichage = DB::select("SELECT * FROM eglises WHERE id_eg = '$eglise' ");
        $devise = devise::all();
        return view('user.user3', compact('affichage', 'devise'));
    }
    public function user4($id){
        $decrypt = Crypt::decryptString($id);
        $eglise =  session('eglise');
        $affichage = DB::select("SELECT * FROM eglises WHERE id_eg = '$eglise' ");
        $devise = devise::all();
        $ref = Str::random(5);
        return view('user.user4', compact('affichage', 'devise','ref'));
    }

    public function user7($id){
        $decrypt = Crypt::decryptString($id);
        $eglise =  session('eglise');
        $affichage = DB::select("SELECT * FROM eglises WHERE id_eg = '$eglise' ");
        $devise = devise::all();
        Session::put('paiement', $decrypt);
        return view('user.user7', compact('affichage', 'devise'));

    }
    
    public function logout(){
        session_start();
        admin::whereEmail(session('sous'))->update(['active' => 0]);
		session_unset();
		session_destroy();
        return redirect()->route('index');
    }
    public function retrait(){
        if (session('sous') == true) {
            $devise = devise::all();
            $somme = DB::table('eglises')->join('admins',  'admins.id_eg', '=', 'eglises.id_eg')->
            where('admins.email', '=', session('sous'))->
            select('sommeusd', 'sommecdf')->get();
            return view('page_admin.retrait', compact('devise', 'somme'));
         }else{
             return redirect('/');
         }
    }
    public function affiche_retrait(){
        if (session('sous') == true) {
            $affiche = DB::table('retraits')->
            join('devises', 'devises.id_devise', '=',  'retraits.id_devise')->
            join('eglises', 'eglises.id_eg', '=', 'retraits.id_eg')->
            orderBy('id_retrait', 'DESC')->
            select('id_retrait', 'user', 'date_retrait','montant','devises.type_d', 'eglises.nom')->get();

            return view('page_admin.affiche_retrait', compact('affiche'));
         }else{
             return redirect('/');
         }
    }
    public function retrait_active(Request $request){
        if (session('sous') == true) {
            $date = date('Y-m-d');
            $somme = DB::table('eglises')->join('admins',  'admins.id_eg', '=', 'eglises.id_eg')->
            where('admins.email', '=', session('sous'))->
            select('sommeusd', 'nom', 'eglises.id_eg', 'sommecdf')->get();
            foreach( $somme as $sommes):
                if($sommes->sommeusd > 0 && $request->devise == 2){
                    $add = $sommes->sommeusd - $request->montant;
                    $devise = retrait::create([
                        'user' => session('sous'),
                        'montant' => $request->montant,
                        'id_devise' => $request->devise,
                        'date_retrait' => $date,
                        'id_eg' => $sommes->id_eg,
                        'statut' => 0
                    ]);
                    eglise::whereId_eg($sommes->id_eg)->update(['sommeusd' => $add]);
                    return redirect()->route('affiche_retrait');
                }elseif($sommes->sommecdf > 0 && $request->devise == 1){
                    $add = $sommes->sommecdf - $request->montant;
                    $devise = retrait::create([
                        'user' => session('sous'),
                        'montant' => $request->montant,
                        'id_devise' => $request->devise,
                        'date_retrait' => $date,
                        'id_eg' => $sommes->id_eg,
                        'statut' => 0
                    ]);
                    eglise::whereId_eg($sommes->id_eg)->update(['sommecdf' => $add]);
                    return redirect()->route('affiche_retrait');
                }
            endforeach;
         }else{
             return redirect('/');
         }

    }
    public function approuve(){
        if (session('sous') == true) {
            $approuve = DB::table('retraits')->
            join('devises', 'devises.id_devise', '=',  'retraits.id_devise')->
            join('eglises', 'eglises.id_eg', '=', 'retraits.id_eg')->
            where('statut', 1)->where('user',session('sous'))->
            orderBy('id_retrait', 'DESC')->
            select('id_retrait', 'user','statut', 'date_retrait','montant','devises.type_d', 'eglises.nom')->get();

            $approuve_somme = DB::table('retraits')->
            join('devises', 'devises.id_devise', '=',  'retraits.id_devise')->
            join('eglises', 'eglises.id_eg', '=', 'retraits.id_eg')->
            where('statut', 1)->where('user',session('sous'))->
            where('retraits.id_devise', 2)->
            sum('montant');

            $approuve_sommeCDF = DB::table('retraits')->
            join('devises', 'devises.id_devise', '=',  'retraits.id_devise')->
            join('eglises', 'eglises.id_eg', '=', 'retraits.id_eg')->
            where('statut', 1)->where('user',session('sous'))->
            where('retraits.id_devise', 1)->
            sum('montant');
            return view('page_admin.approuve', compact('approuve', 'approuve_somme', 'approuve_sommeCDF'));
         }else{
             return redirect('/');
         } 
    }


    
    public function nonapprouve(){
        if (session('sous') == true) {
            $approuve = DB::table('retraits')->
            join('devises', 'devises.id_devise', '=',  'retraits.id_devise')->
            join('eglises', 'eglises.id_eg', '=', 'retraits.id_eg')->
            where('statut', 0)->where('user',session('sous'))->
            orderBy('id_retrait', 'DESC')->
            select('id_retrait', 'user','statut', 'date_retrait','montant','devises.type_d', 'eglises.nom')->get();
            return view('page_admin.nonapprouve', compact('approuve'));
         }else{
             return redirect('/');
         } 
    }

    public function approve_url(Request $req){
        $date = date('Y-m-d');
        
        
        $somme = DB::table('eglises')->join('transactions',  'transactions.id_eg', '=', 'eglises.id_eg')->
        where('transactions.id_eg', '=', session('eglise'))->
        select('sommeusd', 'nom', 'eglises.id_eg', 'sommecdf')->get();
        foreach( $somme as $sommes):
            if(session('currency') == "USD"){
                $add = $sommes->sommeusd + session('amount');
                $devise = transaction::create([
                    'user' => session('user'),
                    'montant' => session('amount'),
                    'id_devise' => session('currency'),
                    'id_eg' => session('eglise'),
                    'id_off' => session('don'),
                    'id_paiement' => session('paiement'),
                    'date_t' => $date
                ]);
                eglise::whereId_eg($sommes->id_eg)->update(['sommeusd' => $add]);
                return view('user.response');
            }
        endforeach;
    }

    public function cancel_url(){
        return view('user.erreur');
    }
    public function callback_url(){
        return view('user.callback');
    }
    public function user8(Request $req){
        session_start();
        $eglise =  session('eglise');
        $user = $req->phone;
        $amount = $req->amount;
        $ref = Str::random(5);
        $currency = $req->currency;
        $affichage = DB::select("SELECT * FROM eglises WHERE id_eg = '$eglise' ");
        Session::put('user', $req->phone);
        Session::put('currency', $req->currency);
        Session::put('amount', $req->amount);
        Session::put('authorization', $req->authorization);
        Session::put('merchant', $req->merchant);
        Session::put('callback_url', $req->callback_url);
        Session::put('approve_url', $req->approve_url);
        Session::put('cancel_url', $req->cancel_url);
        Session::put('decline_url', $req->decline_url);
        Session::put('description', $req->description);
        return view('user.user8', compact('affichage', 'user', 'amount', 'currency','ref'));
        //return redirect("https://cardpayment.flexpay.cd/v1/pay?phone=".session('user')."&amount=".session('amount')."&reference=".$req->reference."&description=".$req->description."&devise=".session('currency')."&authorization=".session('authorization')."&merchant=".session('merchant')."&callback_url=".session('callback_url')."&approve_url=".session('approve_url')."&cancel_url=".session('cancel_url')."&decline_url=".session('decline_url')."&description=".session('description'));
       //https://frobill.cloud/pay/pages/pay_file/getAwayCard.php?phone=0896854120&amount=20&reference=PAYCARDnhuqF&description=PAYCARDKtB5k&devise=USD
       
    }
    public function chargement(){
        return view('chargement');
    }

    public function user4_action(Request $request){
        session_start();
        $msg='';
        function str_rount($leng){
            $string = 'azertyuioplkhfdsqwxcvbnAZERTYUIOPLKQSHDGFVBNCVCB123456789';
            return 'PAY'.substr(str_shuffle(str_repeat($string, $leng)), 0,$leng);
        }
        if(isset($_GET['reference'],$_GET['phone'],$_GET['amount'], $_GET['devise'])){
            if(!empty($_GET['reference']) && !empty($_GET['phone']) && !empty($_GET['amount']) && !empty($_GET['devise'])){
                $msg="<i style='text-align: center;font-size:60px;color:white' class='fa fa-sync fa-pulse '></i> <br/><p style = 'color:white'>Confirmation de paiement en cours...
                Vous avez 200 secondes pour confirmer le paiement sur votre téléphone</p>";
                $reference= trim(htmlspecialchars($_GET['reference']));
                $phone= trim(htmlspecialchars($_GET['phone']));
                $devise= trim(htmlspecialchars($_GET['devise']));
                $amount= trim(htmlspecialchars($_GET['amount']));
                Session::put('devise', $request->devise);
                Session::put('amount', $request->amount);
                Session::put('phone', $request->phone);
                $data = array(
                    "merchant" => 'HYTECH',
                    "type" => 1,
                    "phone"=>$phone,
                    "reference" => $reference,
                    "amount" => $amount,
                    "currency" => $devise,
                    "callbackUrl" => 'https://electrapps.com/api_pay/callback.php?phone='.$phone,
                   );
                   
                   $data = json_encode($data);
                   $gateway = "http://41.243.7.46:3006/api/rest/v1/paymentService";
                   $ch = curl_init();
                   curl_setopt($ch, CURLOPT_URL, $gateway);
                   curl_setopt($ch, CURLOPT_POST, true);
                   curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: application/json","Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJcL2xvZ2luIiwicm9sZXMiOlsiTUVSQ0hBTlQiXSwiZXhwIjoxNzEwNTA2NTM5LCJzdWIiOiI2M2E5ZjIyNGFhNjZjYTE2MDAxNGIxMThhNmUxYTRmMyJ9.o3nE2CeD6pICOWMmfeoUYRmpZ0YxpeiX1QxlezJnb1Q")); 
                   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                   curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                   curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
                   $response = curl_exec($ch);
                   if(curl_errno($ch)) {
                    $msg = 'Une erreur lors du traitement de votre requête';
                    
                   }else {
                    curl_close($ch);
                    $jsonRes = json_decode($response);
                    $code = $jsonRes->code;
                    if ($code != "0") {
                        return view('user.user6');
                    
                    }else{
                        $message = $jsonRes->message;
                        $orderNumber = $jsonRes->orderNumber;
                        return view('user.user6', compact('phone', 'reference'));
                        }
                    }                       
                             
            }
        }   
    }

    public function chargement_ajax($phone, $reference){
        return view('user.traitement.ajax', compact('phone', 'reference'));
    }
    
      /*  public function mobile(){
        $date = date('Y-m-d');
        $devise = transaction::create([
            'user' => session('phone'),
            'montant' => session('amount'),
            'id_devise' => session('devise'),
            'id_eg' => session('eglise'),
            'id_off' => session('don'),
            'id_paiement' => session('paiement'),
            'date_t' => $date
        ]);
        return view('user.response');;
    }*/
    public function mobile(){
        $somme = DB::table('eglises')->join('transactions',  'transactions.id_eg', '=', 'eglises.id_eg')->
        where('transactions.id_eg', '=', session('eglise'))->
        select('sommeusd', 'nom', 'eglises.id_eg', 'sommecdf')->get();
        foreach( $somme as $sommes):
            if(session('devise') == "USD"){
                $add = session('amount');
                $date = date('Y-m-d');
                $devise = transaction::create([
                    'user' => session('phone'),
                    'montant' => session('amount'),
                    'id_devise' => session('devise'),
                    'id_eg' => session('eglise'),
                    'id_off' => session('don'),
                    'id_paiement' => session('paiement'),
                    'date_t' => $date,
                ]);
                eglise::whereId_eg($sommes->id_eg)->update(['sommeusd' => $add]);
                 return redirect()->route("chargement");
            }elseif(session('devise') == "CDF"){
                $add = session('amount');
                $date = date('Y-m-d');
                $devise = transaction::create([
                    'user' => session('phone'),
                    'montant' => session('amount'),
                    'id_devise' => session('devise'),
                    'id_eg' => session('eglise'),
                    'id_off' => session('don'),
                    'id_paiement' => session('paiement'),
                    'date_t' => $date
                ]);
                eglise::whereId_eg($sommes->id_eg)->update(['sommecdf' => $add]);
                return redirect()->route("chargement");
            }
        endforeach;
    }

    
   public function Sousadmin(){
        $session = session('sous');
        $eglise = DB::select("SELECT * FROM eglises, admins WHERE eglises.id_eg = admins.id_eg AND admins.email = '$session' ");
        return view('page_admin.utilisateur', compact('eglise'));
    }
    public function Sousadmin_active(Request $req){
        $devise = administrateur::create([
            'login' => $req->Login,
            'type_admin' => 2,
            'password' => $req->password,
            'email' => $req->email,
            'active' => 0,
            'id_eg' => $req->eglise,
            'admin' => session('sous')
        ]); 
       return redirect()->route("Sousadmin_affiche");
    }

    public function Sousadmin_affiche(){
        if (session('sous') == true) {
            $sous_admin = DB::table('administrateurs')->
            join('admins', 'admins.id_eg', '=', 'administrateurs.id_eg')->
            where('administrateurs.admin', '=', session('sous'))->
            select('administrateurs.login', 'administrateurs.password', 'administrateurs.email',  'administrateurs.id_admin')->
            get();
            return view('page_admin.affiche_sous', compact('sous_admin'));
        }else{
            return redirect('/');
        }      
    }
    public function delete_sousadmin($id){
        if (session('sous') == true) {
            $resu=administrateur::whereId_admin($id)->delete();
            return redirect()->route("Sousadmin_affiche");
         }else{
          return redirect('/');
         }
    }
    
    public function update_sousadmin($id){
        if (session('sous') == true) {
            $session = session('sous');
            $eglise = DB::select("SELECT * FROM eglises, admins WHERE eglises.id_eg = admins.id_eg AND admins.email = '$session' ");
            $resu = DB::table('administrateurs')->
            where('id_admin', '=',$id)->
            select('email', 'login', 'password', 'id_admin')->get();
            return view('page_admin.upsous', compact('eglise', 'resu'));

         }else{
          return redirect('/');
         }
    }
    public function update_sousadmin_active(Request $req){
        if (session('sous') == true) {
            $mod = administrateur::whereId_admin($req->id)->update(['email' => $req->email, 'password' => $req->password, 'login' => $req->login, 'id_eg' => $req->eglise]);
            return redirect()->route('Sousadmin_affiche');

         }else{
          return redirect('/'); 
         }
    }
    public function sous_admin_transaction(){
        if (session('sous_sous') == true) {
            $session = session('sous_sous');
            $reqUSD = devise::whereType_d('USD')->first();
            $reqCDF = devise::whereType_d('CDF')->first();
            $affiche = DB::table('transactions')->
            join('eglises', 'eglises.id_eg', '=', 'transactions.id_eg')->
            join('dons', 'dons.id_off', '=', 'transactions.id_off')->
            join('administrateurs', 'administrateurs.id_eg', '=', 'eglises.id_eg')->
            join('admins', 'admins.email', '=', 'administrateurs.admin')->
            join('paiements', 'paiements.id_paiement','=',  'transactions.id_paiement')
            ->where('administrateurs.email', '=', session('sous_sous'))->
            orderBy('id_trans', 'DESC')->
            select('id_trans', 'user', 'montant', 'transactions.id_devise',  'eglises.nom', 'dons.type_off', 'paiements.type_p','date_t','date_ts')->get();

            $tot_usd =  DB::select("SELECT SUM(montant) as usdsomme FROM administrateurs, transactions, paiements, dons, eglises WHERE transactions.id_eg = eglises.id_eg AND transactions.id_paiement = paiements.id_paiement AND transactions.id_off = dons.id_off AND  administrateurs.email ='$session' AND transactions.id_devise = 'USD' ");
            $tot_cdf =  DB::select("SELECT SUM(montant) as usdsomme FROM administrateurs, transactions, paiements, dons, eglises WHERE transactions.id_eg = eglises.id_eg AND transactions.id_paiement = paiements.id_paiement AND transactions.id_off = dons.id_off AND  administrateurs.email ='$session' AND transactions.id_devise = 'CDF' ");

            return view("page_admin.Stransaction", compact('affiche', 'reqUSD', 'reqCDF', 'tot_usd', 'tot_cdf'));
        }else{
            return redirect('/');

        }
    }
    public function SSprofil(){
        if (session('sous_sous') == true) {
            $profil = DB::table('administrateurs')->where('email', '=', session('sous_sous'))->
            select('email', 'login', 'password')->get();
            return view('page_admin.Sprofil', compact('profil'));
        }else{
            return redirect('/');
        }
      
    }
    public function SSprofil_active(Request $req ){
        if (session('sous_sous') == true) {
            $ancien_pwd = administrateur::whereEmail(session('sous_sous'))->wherePassword($req->apassword)->first();
            if($ancien_pwd == true){
                $mod = administrateur::whereEmail(session('sous_sous'))->update(['login' => $req->login, 'password' => $req->password, 'email' => $req->email, 'active' => 0]);
                session_start();
                session_unset();
                session_destroy();
                return redirect('/');
            }else{
                return redirect()->route('SSprofil');
            }
            
        }else{
            return redirect('/');
        } 
    }
    public function Slogout(){
        session_start();
        administrateur::whereEmail(session('sous_sous'))->update(['active' => 0]);
        session_unset();
        session_destroy();
        return redirect()->route('index');
    }
    public function calcul(){
        $don = DB::table('dons')->join('eglises', 'eglises.id_eg', '=', 'dons.id_eg')->
        join('admins',  'admins.id_eg', '=', 'eglises.id_eg')->
        where('admins.email', '=', session('sous'))->
        select('type_off')->
        get();

        $date = date('Y-m-d');

        return view('page_admin.calcule', compact('don'));
    }
    
}
