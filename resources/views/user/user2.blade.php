@extends('layout.user')
@section('content')
    <body id="page-top">
        @foreach($affichage as $affichages)
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">
                     <img src="/img/image_company/{{$affichages->logo}}" alt="" width="100" height="70">  
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#about">A propos</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        @endforeach 
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">Choisissez votre méthode de paiement</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">{{$affichages->des}}</p>
                        @foreach($paiement as $paiements)
                        
                            @if($paiements->type_lien == 1)
                              <div class="d-grid"><a href="{{route($paiements->lien_p, Crypt::encryptString($paiements->id_paiement))}}" class="btn btn-primary btn-xl" id="submitButton" type="submit"><i class="{{$paiements->icon}}"></i>{{$paiements->type_p}}</a></div>
                            @elseif($paiements->type_lien == 0)
                            <div class="d-grid"><a href="{{route($paiements->lien_p)}}" class="btn btn-primary btn-xl" id="submitButton" type="submit"><i class="{{$paiements->icon}}"></i>{{$paiements->type_p}}</a></div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>       
        </header>   
@endsection