@extends('layout.body')
@section('content')
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-dollar-sign"></i> Modifier un devise</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <form action="{{route('update_devise_action')}}" method="GET">
                @csrf
                @foreach($resu as  $resus)
                <input type="hidden" class="form-control" name="id" value="{{$resus->id_devise}}" placeholder="Devise"><br>
                <label for="Devise">Devise</label>
                <input type="text" class="form-control" name="devise" value="{{$resus->type_d}}" placeholder="Devise"><br>
                <button class="btn btn-primary">Modifier</button>
                @endforeach
            </form>
        </div>
    </div>
</div>  
@endsection