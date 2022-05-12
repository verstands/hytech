@extends('layout.body')
@section('content')
<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-money-bill-alt"></i> Les Paiement</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>N°</th>
            <th>Numero  de  paiement</th>
            <th>Nom</th>
            <th>Company</th>
            <th>Icon</th>
            <th>Lien</th>
            <th>Type de lien</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>N°</th>
            <th>Numero de paiement</th>
            <th>Nom</th>
            <th>Company</th>
            <th>Icon</th>
            <th>Lien</th>
            <th>Type de lien</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
         @php
            $i = 1;
          @endphp
          @foreach($paiement as $paiements):
          <tr>
            <td>{{$i++}}</td>
            <td>{{$paiements->id_paiement}}</td>
            <td>{{$paiements->type_p}}</td>
            <td>{{$paiements->nom}}</td>
            <td>{{$paiements->icon}}</td>
            <td>{{$paiements->lien_p}}</td>
            <td>{{$paiements->type_lien}}</td>
            <td>
                <a href="{{route('delete_paie',$paiements->id_paiement)}}" title="supprimer" class="btn btn-danger btn-circle">
                    <i class="fas fa-trash"></i>
                </a>
                <a href="{{route('update_paie',$paiements->id_paiement)}}" title="modifier" class="btn btn-success btn-circle">
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