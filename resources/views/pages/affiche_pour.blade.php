@extends('layout.body')
@section('content')
<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-percentage"></i> Les Pourcentages</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>N°</th>
            <th>Chidffre</th>
            <th>Devise</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>N°</th>
            <th>Chidffre</th>
            <th>Devise</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
          @php
            $i = 1;
          @endphp
          @foreach($tout as $touts)
          <tr>
            <td>{{$i++}}</i></td>
            <td>{{$touts->titre}}</td>
            <td>{{$touts->type_d}}</td>
            <td>
                <a href="{{route('delete_pour',$touts->id_pou)}}" title="supprimer" class="btn btn-danger btn-circle">
                    <i class="fas fa-trash"></i>
                </a>
                <a href="{{route('update_pour',$touts->id_pou)}}" title="modifier" class="btn btn-success btn-circle">
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