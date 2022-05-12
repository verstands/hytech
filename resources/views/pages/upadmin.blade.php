@extends('layout.body')
@section('content')
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-user-circle"></i> Modification d'un administrateur pour un company</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <form action="{{route('update_admin_active')}}" method="GET">
            @foreach($resultat as $resultats)
                @csrf
                <input type="hidden" class="form-control" value="{{$resultats->id_admin}}" name="id" placeholder="Login"><br>
                <label for="">Login :</label><br>
                <input type="text" class="form-control" value="{{$resultats->login}}" name="login" placeholder="Login"><br>
                <label for="">Password :</label><br>
                <input type="text" class="form-control" value="{{$resultats->password}}" name="password" placeholder="Password"><br>
                <label for="">Email :</label><br>
                <input type="email" class="form-control" value="{{$resultats->email}}" name="email" placeholder="Email"><br>
                <button class="btn btn-primary">Modifier</button>
            @endforeach
            </form>
        </div>
    </div>
</div>
@endsection