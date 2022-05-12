@extends('layout.admin')
@section('content')
<div class="container">
<div class="col-xl-12 col-lg-12">
    <div class="row">
        <div class="col-md-6">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Somme total  en USD</div>
                                @foreach($somme as $sommes)
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$sommes->sommeusd}} $</div>
                                @endforeach
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-bill-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Somme total  en CDF</div>
                            @foreach($somme as $sommes)
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$sommes->sommecdf}} Fc</div>
                            @endforeach
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-bill-alt "></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>    
    <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-user-circle"></i> Retrait</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <form action="{{route('retrait_active')}}" method="POST">
                @csrf
                <input type="number" class="form-control" name="montant" placeholder="montant"><br>
                <select name="devise" class="form-control">
                    @foreach($devise as $devises)
                    <option value="{{$devises->id_devise}}">{{$devises->type_d}}</option>
                    @endforeach
                </select><br>
                <button class="btn btn-primary">Effectuer</button>
            </form>
        </div>
    </div>
</div> 

</div>
 
@endsection