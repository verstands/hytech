@extends('layout.body')
@section('content')
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-user-circle"></i> Creation d'un administrateur pour un company</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <label for="">Nom de la company</label>
                <select name="company" class="form-control">
                    @foreach($company as $companys)
                    <option value="{{$companys->id_eg}}">{{$companys->nom}}</option>
                    @endforeach
                </select><br>
                <input type="text" class="form-control" name="login" placeholder="Login"><br>
                <input type="password" class="form-control" name="password" placeholder="Password"><br>
                <input type="email" class="form-control" name="email" placeholder="Email"><br>
                <button class="btn btn-primary">Creer</button>
            </form>
        </div>
    </div>
</div>  
@endsection