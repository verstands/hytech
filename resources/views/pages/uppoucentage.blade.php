@extends('layout.body')
@section('content')
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-percentage"></i> Modifier un poucentage</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <form action="{{route('update_pour_active')}}" method="GET">
                @csrf
                @foreach($resu as $resus)
                <input type="hidden" name="id" class="form-control" placeholder="Pourcentage" value="{{$resus->id_pou}}"><br>
                <label for="">Pourcentage : </label><br>
                <input type="number" name="titre" class="form-control" placeholder="Pourcentage" value="{{$resus->titre}}"><br>
                <label for="">Devise  choisi:</label>
                <h5>{{$resus->type_d}}</h5>
                <label for="">Choisir un Devise </label>
                <select name="devise" class="form-control">
                    @foreach($devise as $devises)
                    <option value="{{$devises->id_devise}}">{{$devises->type_d}}</option>
                    @endforeach
                </select><br>

                <button class="btn btn-primary">Modifier</button>
                @endforeach
            </form>
        </div>
    </div>
</div>  
@endsection