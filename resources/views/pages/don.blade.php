@extends('layout.body')
@section('content')
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-shopping-cart"></i> Ajouter un don</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <form action="" method="POST">
            @csrf
                <input type="text" class="form-control" name="nom" placeholder="Nom"><br>
                <label >Company</label>
                <select name="company" id="" class="form-control">
                    @foreach($company as $companys):
                    <option value="{{$companys->id_eg}}">{{$companys->nom}}</option>
                    @endforeach
                </select><br>
                <button class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
</div>  
@endsection