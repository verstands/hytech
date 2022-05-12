<?php

namespace App\Http\Controllers;
use App\Models\eglise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class Ctrcompany extends Controller
{
    public function index(){
        $e = DB::select("SELECT * FROM eglises");
        return view("pages.company", compact('e'));
    }

    public function affiche(){
        $company = DB::select("SELECT * FROM eglises WHERE lien = 1");
        return view("pages.affiche_company", compact('company'));
    }

   
    public function affiche_des(){
        $company = DB::select("SELECT * FROM eglises WHERE lien = 0");
        return view("pages.affiche_company_des", compact('company'));
    }

    public function generer(Request $req){
        $resultat = eglise::whereId_eg($req->lien)->update(['lien' => 1]);
        return redirect()->route('affiche_company');
    }
    public function store(Request $request){
        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $name = $image->getClientOriginalName();
            $image->move(public_path().'/img/image_company/', $name);
            $devise = eglise::create([
                'nom' => $request->company,
                'logo' => $name,
                'active' => 1,
                'lien' => 1,
                'des' => $request->des,
                'tel' => $request->tel,
                'sommeusd' => 0,
                'sommecdf' => 0,
                'nomre' => $request->nomre
            ]);
        }
        return redirect()->route('affiche_company')->with('status', 'la devise a ete ajouter avec success');
    }

    public function affichagegenerer(){
        $e = DB::select("SELECT * FROM eglises");
        return view('pages.generer', compact('e'));
    }

    public function delete_company($id_pou)
    {
        if (session('admins') == true) {
           $resu=eglise::whereId_eg($id_pou)->delete();
            return redirect()->route('affiche_company');
        }else{
            return redirect('/');
        }
        
    }
    public function update_company($id_pou)
    {
        if (session('admins') == true) {
            $resu = DB::table('eglises')->where('eglises.id_eg', '=', $id_pou)->
            select('id_eg', 'nom', 'logo', 'des', 'tel','nomre')->get();
            return view('pages.upcompany', compact('resu'));
        }else{
            return redirect('/');
        }
        
    }

    public function update_company_active(Request $req){
        if (session('admins') == true) {
            if($req->hasFile('logo')){
                $mod = eglise::whereId_eg($req->id)->update(['nom' => $req->company, 'tel' => $req->tel, 'des' => $req->des, 'nomre' => $req->nomre]);    
                    return redirect()->route('affiche_company');
            }else{
                $mod = eglise::whereId_eg($req->id)->update(['nom' => $req->company, 'tel' => $req->tel, 'des' => $req->des, 'nomre' => $req->nomre]);    
                    return redirect()->route('affiche_company'); 
            }
        }else{
            return redirect('/');
        }
    }
    
    public function active_company($id){
        if (session('admins') == true) {
            
                $mod = eglise::whereId_eg($id)->update(['lien' => '1']);    
                    return redirect()->route('affiche_company');
        }else{
            return redirect('/');
        }
    }
    public function desactive_company($id){
        if (session('admins') == true) {
            
                $mod = eglise::whereId_eg($id)->update(['lien' => '0']);    
                    return redirect()->route('affiche_company');
        }else{
            return redirect('/');
        }
    }
   
    
}
