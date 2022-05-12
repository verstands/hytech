@extends('layout.admin')
@section('content')
   <div class="container">
    <form action="" method="POST">
        <label for="">Recherche par date</label>
        <input type="date" class="form-control col-md-6" >
    </form>
   </div>
   <br>
   <div class="container">
        <div class="row">
          @foreach($don as $dons)
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$dons->type_off}}</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">200</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-exchange-alt fa-2x"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection