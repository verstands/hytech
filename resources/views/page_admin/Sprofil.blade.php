@extends('layout.sous_admin')
@section('content')
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-shopping-cart"></i> Profil</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
        <center>
                <i class="fa fa-user-circle" style="font-size:100px;"></i>
                </center>
            <form action="{{route('SSprofil_active')}}" method="GET">
            @csrf
              @foreach($profil as $profils)
                <label for="">Ancien mot de passe</label>
                <input type="password" class="form-control" value="" name="apassword" ><br>
                <label for="">Login</label><br>
                <input type="text" class="form-control" value="{{$profils->login}}" name="login" placeholder="Nom"><br>
                <label for="">Password</label><br>
                <input type="text" class="form-control" value="{{sha1($profils->password)}}" name="password" placeholder="Nom"><br>
                <label for="">Email</label><br>
                <input type="email" class="form-control"  value="{{$profils->email}}" name="email" placeholder="Nom"><br>
                <button class="btn btn-primary">Modifier</button>
            @endforeach
            </form>
        </div>
    </div>
</div>  
@endsection