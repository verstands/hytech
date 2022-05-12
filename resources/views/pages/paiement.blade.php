@extends('layout.body')
@section('content')
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-money-bill-alt"></i> Ajouter un paiement</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <form action=""  method="POST">
            @csrf
                <input type="text" class="form-control" name="nom" placeholder="Nom"><br>
                <input type="text" class="form-control" name="icon" placeholder="Icon font-awesome"><br>
                <input type="text" class="form-control" name="lien" placeholder="Lien"><br>
                <label for="">Company</label><br>
                <select name="company" class="form-control">
                    <label for="">Company</label>
                    @foreach($company as $companys):
                    <option value="{{$companys->id_eg}}">{{$companys->nom}}</option>
                    @endforeach
                </select><br>
                <label for="">Lien vers le un site : 0</label><br>
                <label for="">Lien vers le une page : 1</label>
                <select name="tlien" id="" class="form-control">
                    <label >Company</label>
                    <option value="0">0</option>
                    <option value="1">1</option>
                </select><br>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
</div>  
@endsection