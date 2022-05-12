@extends('layout.user')
@section('content')
@foreach($affichage as $affichages)
    <body id="page-top">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">
                     <img src="/img/image_company/{{$affichages->logo}}" alt="" width="100" height="100">  
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="about">A propos</a></li>
                        <li class="nav-item"><a class="nav-link" href="services">Services</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">{{$affichages->nom}}</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">{{$affichages->des}}</p>
                        @foreach($don as $dons)
                        <div class="d-grid"><a href="{{route('user2',Crypt::encryptString($dons->id_off))}}" class="btn btn-primary btn-xl" id="submitButton" type="submit">{{$dons->type_off}}</a></div>
                        @endforeach
                    </div>
                </div>
            </div>       
        </header>   
@endforeach 
@endsection