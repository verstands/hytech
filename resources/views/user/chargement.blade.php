@extends('layout.user')
@section('content')    
<div style="width: 100%;height: 100vh;display: flex;justify-content: center;align-items: center;" >
    <div style="text-align: center;">
        <h3 >PAIEMENT EFFECTUEZ AVEC SUCCES</h3>
        <img src="10355-loading-success.gif" alt="" srcset="">
        <a class="button button-primary btn-user btn-block" href="{{route('user',Crypt::encryptString(session('eglise')))}}">Retour a la page d'accueil</a>
        <i class="fa-fa-pulese-spinner"></i>
    </div>
</div>
<script>
</script>
@endsection