@extends('layout.user')
@section('content')    
<div style="width: 100%;height: 100vh;display: flex;justify-content: center;align-items: center;" >
    <div style="text-align: center;">
        <h3 >PAIEMENT EFFECTUEZ AVEC SUCCES</h3>
        <form action="/chargement" id="contactForm">
        <img src="10355-loading-success.gif" alt="" srcset="">
        <a class="button button-primary btn-user btn-block" href="">Retour a la page d'accueil</a>
        </form>
    </div>
</div>
<script>
    window.addEventListener('load',()=>{
        document.querySelector('#contactForm').submit()
    })
</script>
@endsection