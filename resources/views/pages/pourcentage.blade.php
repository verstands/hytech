@extends('layout.body')
@section('content')
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-percentage"></i> Ajouter un poucentage</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <input type="number" name="titre" class="form-control" placeholder="Pourcentage"><br>
                <label for="">Devise : </label><br>
                <select name="devise" class="form-control">
                    @foreach($devise as $devises)
                    <option value="{{$devises->id_devise}}">{{$devises->type_d}}</option>
                    @endforeach
                </select><br>

                <button class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
</div>  
@endsection