<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\login;
use App\Http\Controllers\dash;
use App\Http\Controllers\Ctrcompany;
use App\Http\Controllers\Ctrtransaction;
use App\Http\Controllers\Ctradministrateur;
use App\Http\Controllers\Ctrdevise;
use App\Http\Controllers\Ctrdon;
use App\Http\Controllers\Ctrpaiement;
use App\Http\Controllers\Ctrpourcentage;
use App\Http\Controllers\Ctradmin;
use App\Http\Controllers\ApiPaiement;
use App\Http\Controllers\callback;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/ss', function () {
    return view('welcome');
});
Route::get('/', [login::class, 'index'])->name('index');
Route::post('/', [login::class, 'login'])->name('login');
Route::get('/dashboad', [dash::class, 'index'])->name('dashboad');
Route::get('/logout', [login::class, 'logout'])->name('logout');
// company
Route::get('/company', [Ctrcompany::class, 'index'])->name('company');
Route::post('/company', [Ctrcompany::class, 'store'])->name('store_company');
Route::get('/view_company', [Ctrcompany::class, 'affiche'])->name('affiche_company');
Route::get('/affichageGenerer', [Ctrcompany::class, 'affichagegenerer'])->name('affichagegenerer');
Route::get('/view_company_des', [Ctrcompany::class, 'affiche_des'])->name('affiche_company_des');
Route::get('/delete_company/{id}', [Ctrcompany::class, 'delete_company'])->name('delete_company');
Route::get('/update_company/{id}', [Ctrcompany::class, 'update_company'])->name('update_company');
Route::get('/update_company_active', [Ctrcompany::class, 'update_company_active'])->name('update_company_active');
Route::get('/active_company/{id}', [Ctrcompany::class, 'active_company'])->name('active_company');
Route::get('/desactive_company/{id}', [Ctrcompany::class, 'desactive_company'])->name('desactive_company');
// fin copany ------------------------------------------------------------------------
Route::get('/trasanction', [Ctrtransaction::class, 'index'])->name('affiche_trasanction');
// aministrateur
Route::get('/administrateur', [Ctradministrateur::class, 'index'])->name('administrateur');
Route::post('/administrateur', [Ctradministrateur::class, 'store'])->name('store');
Route::get('/delete_admin/{id}', [Ctradministrateur::class, 'delete_admin'])->name('delete_admin');
Route::get('/update_admin/{id}', [Ctradministrateur::class, 'update_admin'])->name('update_admin');
Route::get('/update_admin', [Ctradministrateur::class, 'update_admin_active'])->name('update_admin_active');
Route::get('/view_adm', [Ctradministrateur::class, 'affiche'])->name('administrateur_affiche');
Route::get('/profil', [Ctradministrateur::class, 'profil'])->name('profil');
Route::get('/profil_active', [Ctradministrateur::class, 'profil_active'])->name('profil_active');

//fin administrateur
// devise -----------------------------------------------------------------------------
Route::get('/devise', [Ctrdevise::class, 'index'])->name('devise');
Route::post('/devise', [Ctrdevise::class, 'store'])->name('store');
Route::get('/view_devise', [Ctrdevise::class, 'affiche'])->name('affiche_devise');
Route::get('/delete_devise/{id}', [Ctrdevise::class, 'delete_devise'])->name('delete_devise');
Route::get('/update_devise/{id}', [Ctrdevise::class, 'update_devise'])->name('update_devise');
Route::GET('/update_devise', [Ctrdevise::class, 'update_devise_action'])->name('update_devise_action');
// fin devise --------------------------------------------------------------------------
Route::get('/view_don', [Ctrdon::class, 'affiche'])->name('affiche_don');
Route::get('/don', [Ctrdon::class, 'index'])->name('don');
Route::get('/delete_don/{id}', [Ctrdon::class, 'delete_don'])->name('delete_don');
Route::post('/don', [Ctrdon::class, 'store'])->name('store');
Route::get('/update_don/{id}', [Ctrdon::class, 'update_don'])->name('update_don');
Route::get('/update_don_active', [Ctrdon::class, 'update_don_active'])->name('update_don_active');
//paiement------------------------------------------------------------------------------
Route::get('/paiement', [Ctrpaiement::class, 'index'])->name('paiement');
Route::post('/paiement', [Ctrpaiement::class, 'store'])->name('store');
Route::get('/update_paiement/{id}', [Ctrpaiement::class, 'update_paie'])->name('update_paie');
Route::get('/update_paiement_active', [Ctrpaiement::class, 'update_paiement_active'])->name('update_paiement_active');
Route::get('/delete_paie/{id}', [Ctrpaiement::class, 'delete_paie'])->name('delete_paie');
Route::get('/view_payemnt', [Ctrpaiement::class, 'affiche'])->name('affiche_paiement');
//fin de paiement

//Pourcentage---------------------------------------------------------------------------
Route::get('/pourcentage', [Ctrpourcentage::class, 'index'])->name('pourcentage');
Route::post('/pourcentage', [Ctrpourcentage::class, 'store'])->name('store');
Route::get('/view_p', [Ctrpourcentage::class, 'affiche'])->name('affiche_pourcentage');
Route::get('/delete_pour/{id_pou}', [Ctrpourcentage::class, 'delete_pour'])->name('delete_pour');
Route::get('/update_pour/{id_pou}', [Ctrpourcentage::class, 'update_pour'])->name('update_pour');
Route::get('/update_pour', [Ctrpourcentage::class, 'update_pour_active'])->name('update_pour_active');
Route::get('/view_pN', [Ctrpourcentage::class, 'afficheN'])->name('Nos_pourcentage');
// fin pourcentage --------------------------------------------------------------------e
//retrait-------------------------------------------------------------------------------
Route::get('/afiicheRetrait', [dash::class, 'affiche_retrait'])->name('affiche_r');
Route::get('/approuve_retrait', [dash::class, 'approuve_retrait'])->name('approuve_retrait');
Route::get('/approuve_retrait/{id}', [dash::class, 'update_approuve_retrait'])->name('update_approuve_retrait');
//fin retrait ---------------------------------------------------------------------------







//--------------------------------------------------------sous administrateur -----------------------------------
Route::get('/Sadmin', [Ctradmin::class, 'index'])->name('Sadmin');
Route::get('/Stransaction', [Ctradmin::class, 'Stransaction'])->name('Soustransaction');
Route::get('/Sprofil', [Ctradmin::class, 'Sprofil'])->name('Sprofil');
Route::get('/Sprofil_active', [Ctradmin::class, 'Sprofil_active'])->name('Sprofil_active');
Route::get('/logout', [Ctradmin::class, 'logout'])->name('logout');
Route::get('/retrait', [Ctradmin::class, 'retrait'])->name('retrait');
Route::post('/retrait', [Ctradmin::class, 'retrait_active'])->name('retrait_active');
Route::get('/affiche_retrait', [Ctradmin::class, 'affiche_retrait'])->name('affiche_retrait');
Route::get('/approuve', [Ctradmin::class, 'approuve'])->name('approuve');
Route::get('/non_approuve', [Ctradmin::class, 'nonapprouve'])->name('nonapprouve');

//-----------------------------------------------------------user--------------------------------------------
Route::get('/user/{id}', [Ctradmin::class, 'user'])->name('user');
Route::get('/typePaiement/{id}', [Ctradmin::class, 'user2'])->name('user2');
Route::get('/paiementssss/{id}', [Ctradmin::class, 'user3'])->name('user3');
Route::get('/paiementUser/{id}', [Ctradmin::class, 'user4'])->name('user4');
Route::get('/paiementAction', [Ctradmin::class, 'user4_action'])->name('user4_action');
Route::get('/paiements/{id}', [Ctradmin::class, 'user7'])->name('user7');
Route::get('/approve_url', [Ctradmin::class, 'approve_url'])->name('approve_url');
Route::get('/cancel_url', [Ctradmin::class, 'cancel_url'])->name('cancel_url');
Route::get('/callback_url', [Ctradmin::class, 'callback_url'])->name('callback_url');
Route::get('/user8', [Ctradmin::class, 'user8'])->name('user8');
Route::get('/chargement', [Ctradmin::class, 'chargement'])->name('chargement');
Route::get('/api', [ApiPaiement::class, 'index'])->name('api');
Route::get('/chargement', [Ctradmin::class, 'chargement'])->name('chargement');
Route::get('/chargement_ajax/phone={phone}/reference={reference}', [Ctradmin::class, 'chargement_ajax'])->name('chargement_ajax');

Route::get('traitement/reponse', [Apipaiement::class, 'reponse'])->name('reponse');
Route::get('callback/phone={phone}', [callback::class, 'call'])->name('callback');
Route::get('/traitement.ajax/phone={phone},reference={reference}', [callback::class, 'ajax'])->name('ajax');


Route::get('traitement/erreur', [Apipaiement::class, 'error'])->name('ajax_error');
Route::get('/callback_url', [Ctradmin::class, 'callback_url'])->name('callback_url');

Route::get('/mobile', [Ctradmin::class, 'mobile'])->name('mobile');
Route::get('/Sousadmin', [Ctradmin::class, 'Sousadmin'])->name('Sousadmin');
Route::get('/Sousadmin_active', [Ctradmin::class, 'Sousadmin_active'])->name('Sousadmin_active');
Route::get('/Sousadmin_affiche', [Ctradmin::class, 'Sousadmin_affiche'])->name('Sousadmin_affiche');
Route::get('/delete_sousadmin/{id}', [Ctradmin::class, 'delete_sousadmin'])->name('delete_sousadmin');
Route::get('/update_sousadmin/{id}', [Ctradmin::class, 'update_sousadmin'])->name('update_sousadmin');
Route::get('/update_sousadmin_active', [Ctradmin::class, 'update_sousadmin_active'])->name('update_sousadmin_active');
Route::get('/Calcule', [Ctradmin::class, 'calcul'])->name('calcul');

