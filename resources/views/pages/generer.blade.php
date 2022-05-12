@extends('layout.body')
@section('content')

<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-calendar"></i> Generer un lien</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <select class="form-control" name="lien">
                    @foreach($e as $es)
                    <option value="{{$es->id_eg}}">{{$es->nom}}</option>
                    @endforeach
                </select><br>
                <button class="btn btn-primary">Generer</button>
            </form>
        </div>
    </div>
</div>
      
@endsection