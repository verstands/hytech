@extends('layout.body')
@section('content')

<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-exchange-alt"></i> Les Trasanctions du retrait</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th>Numero</th>
            <th>Date</th>
            <th>utilisateurs</th>
            <th>Montant</th>
            <th>Devise</th>
            <th>Company</th>
            <th>Statut</th>

          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Numero</th>
            <th>Date</th>
            <th>utilisateurs</th>
            <th>Montant</th>
            <th>Devise</th>
            <th>Company</th>
            <th>Statut</th>
          </tr>
          </tr>
        </tfoot>
        <tbody>
        @php
          $i = 1;
        @endphp
        @foreach($approuve as $affiches):
          <tr>
            <td>{{$i++}}</td>
            <td>{{$affiches->date_retrait}}</td>
            <td>{{$affiches->user}}</td>
            <td>{{$affiches->montant}}</td>
            <td>{{$affiches->type_d}}</td>
            <td>{{$affiches->nom}}</td>
            @if($affiches->statut == 0)
                <td><p style="color:red;">Non approuver</p></td>
            @elseif($affiches->statut == 1)
                <td><p style="color:green;">approuver</p></td>
            @endif
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
@endsection 