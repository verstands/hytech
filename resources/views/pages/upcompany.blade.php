@extends('layout.body')
@section('content')
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-calendar"></i> modification d'une entreprise</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <form action="{{route('update_company_active')}}" method="GET" enctype="multipart/form-data">
                @foreach($resu as  $resus)
                @csrf
                <label for="">Nom company</label><br>
                <input type="hidden" class="form-control" name="id" value="{{$resus->id_eg}}" placeholder="Nom de la company"><br>
                <input type="text" class="form-control" name="company" value="{{$resus->nom}}" placeholder="Nom de la company"><br>
                <label for="">Telephone :</label><br>
                <input type="number" class="form-control" name="tel" value="{{$resus->tel}}" placeholder="Numero de telephone"><br>
                <label for="Nom du retrait">Nom du retrait</label>
                <input type="text" class="form-control" name="nomre" value="{{$resus->nomre}}" placeholder="Nom du retrait"><br>
                <label for="">Description</label><br>
                <textarea name="des" id="" cols="30" rows="" class="form-control">{{$resus->des}}</textarea><br>
                @endforeach
                <button class="btn btn-primary">Modifer</button>
            </form>
        </div>
    </div>
</div>

      
@endsection