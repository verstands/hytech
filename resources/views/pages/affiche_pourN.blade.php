@extends('layout.body')
@section('content')
<div class="col-xl-12 col-lg-12">
    <div class="row">
        <div class="col-md-6">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Somme Pourcentage  en carte visa</div>
                                
                            <div class="h5 mb-0 font-weight-bold text-gray-800">6.36$</div>
                               
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
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Somme Pourcentage  en mobile money</div>
                            
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Fc</div>
                            
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
  </div>
  <div class="row">
  <div class="col-md-6">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Somme Pourcentage  en mobile money</div>
                            
                            <div class="h5 mb-0 font-weight-bold text-gray-800">USD</div>
                            
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-bill-alt "></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
</div>
<br>
<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-percentage"></i> Les Trasanctions pour les pourccentages</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>N°</th>
            <th>Numero transaction</th>
            <th>Company</th>
            <th>z</th>
            <th>Type de Transaction</th>
            <th>Montant</th>
            <th>Devise</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>N°</th>
            <th>Numero transaction</th>
            <th>Company</th>
            <th>z</th>
            <th>Type de Transaction</th>
            <th>Montant</th>
            <th>Devise</th>
          </tr>
        </tfoot>
        <tbody>
          @php
            $i = 1;
          @endphp
          @foreach($afficheN as $afficheNs)
          <tr>
            <th>{{$i++}}</th>
            <td>{{$afficheNs->id_trans}}</td>
            <td>{{$afficheNs->nom}}</td>
            <td>{{$afficheNs->user}}</td>
            <td>{{$afficheNs->montant}}</td>
            @if($afficheNs->id_devise == 'USD')
              <td>{{($afficheNs->montant * $USD) / 100}}</td>
            @elseif($afficheNs->id_devise == 'CDF')
              <td>{{($afficheNs->montant * $CDF) / 100}}</td>
            @endif
            <td>{{$afficheNs->id_devise}}</td>
            
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
@endsection 