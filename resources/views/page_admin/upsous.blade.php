@extends('layout.admin')
@section('content')
<div class="container">
    <br>    
    <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-user-circle"></i> Retrait</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <form action="{{route('Sousadmin_active')}}" method="GET">
                @csrf
               @foreach($resu as $resus)
                <select name="eglise" class="form-control">
                    @foreach($eglise as $eglises)
                    <option value="{{$eglises->id_eg}}">{{$eglises->nom}}</option>
                    @endforeach
                </select>
                <input type="hidden" class="form-control" value="{{$resus->id_admin}}" name="id" placeholder="ids"><br>
                <input type="text" class="form-control" value="{{$resus->login}}" name="Login" placeholder="Login"><br>
                <input type="email" class="form-control" value="{{$resus->email}}" name="email" placeholder="email"><br>
                <input type="text" class="form-control" value="{{$resus->password}}" name="password" placeholder="password"><br>
                @endforeach
                <button class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>
</div> 

</div>
 
@endsection