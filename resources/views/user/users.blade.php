@extends('layout.user')
@section('content')
        <section class="min-vh-100 d-flex bg-primary align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6 justify-content-center">
                        <div class="card bg-primary shadow-soft border-light p-4">
                        <div class="card-header text-center pb-0">
                             @foreach($affichage as $affichages)
                                <img src="/img/image_company/{{$affichages->logo}}" alt="" width="200" height="120">  
                            </div>
                            <div class="card-header text-center pb-0">
                                <h2 class="h4">{{$affichages->nom}}</h2>  
                            </div>
                            <div class="card-header text-center pb-0">
                                <p class="h6">{{$affichages->des}}</p>  
                            </div>
                            @endforeach
                            <div class="card-body">
                                <form action="#" class="mt-4">
                                    <div class="form-group">
                                    </div>
                                    <a type="submit" class="btn btn-block btn-primary">Sign in</a>
                                </form>
                                
                                <div class="d-block d-sm-flex justify-content-center align-items-center mt-4">
                                    <span class="font-weight-normal">
                                    <hr>
                                        <a href="#" class="font-weight-bold">By electrapps</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection 