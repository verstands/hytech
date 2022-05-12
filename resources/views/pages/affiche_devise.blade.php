@extends('layout.body')
@section('content')
<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-dollar-sign"></i> Les devises</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
             <th>N°</th>
            <th>code</th>
            <th>Nom</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>N°</th>
            <th>code</th>
            <th>Nom</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
          @php
            $i = 1;
          @endphp
          @foreach($resultat as $resultats):
          <tr>
            <td>{{$i++}}</td>
            <td>{{$resultats->id_devise}}</td>
            <td>{{$resultats->type_d}}</td>
            <td>
                <a href="{{route('delete_devise',$resultats->id_devise)}}" title="supprimer" class="btn btn-danger btn-circle">
                    <i class="fas fa-trash"></i>
                </a>
                <a href="{{route('update_devise',$resultats->id_devise)}}" title="modifier" class="btn btn-success btn-circle">
                    <i class="fas fa-exchange-alt"></i>
                </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
@endsection 