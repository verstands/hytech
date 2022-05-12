@extends('layout.body')
@section('content')
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-calendar"></i> Creation d'une entreprise</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <form action="{{route('store_company')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" class="form-control" name="company" placeholder="Nom de la company"><br>
                <input type="number" class="form-control" name="tel" placeholder="Numero de telephone"><br>
                <input type="text" class="form-control" name="nomre" placeholder="Nom du retrait"><br>
                <textarea name="des" id="" cols="30" rows="" class="form-control">Decription</textarea><br>
                <label for="">Telecharger un Logo</label>
                <input type="file"  name="logo" class="form-control"><br>
                <button class="btn btn-primary">Creer</button>
            </form>
        </div>
    </div>
</div>

      
@endsection