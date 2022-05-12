@extends('layout.user')
@section('content')      
<center>
<div style="text-align: center;">
 <img src="https://electrapps.com/api_pay/assets/img/loading.jpeg" alt="" style="width: 100px;">
<h2>Confirmation du paiement en cours... Vous avez 60 secondes pour confirmer le paiement sur votre téléphone</h2>
 <img src="https://electrapps.com/api_pay/assets/img/phone.png" alt="" style="width: 100px;">
</div>
</center>             
<script>
    const traitement = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "https://electrapps.com/api_pay/traitement.ajax.php?phone={{$phone}}&reference={{$reference}}");
    xhr.addEventListener("readystatechange", () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            let reponse = xhr.response;
            if (reponse.success === 1) {
                document.location="{{route('mobile')}}";
            }
            if(reponse.success === 2){
                document.location="{{route('cancel_url')}}";
            }
                console.log(reponse);
        }
    });
    xhr.responseType = "json";
    xhr.send();
    

    }
    window.addEventListener("load",()=>{
            setInterval(()=>{
                traitement()
        },1000)
    })
</script>
         
@endsection