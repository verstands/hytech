@extends('layout.admin')
@section('content')
<div class="col-xl-12 col-lg-12">
    <div class="row">
        <div class="col-md-6">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Somme total  en USD</div>
                              @foreach($tot_usd as $tot_usds)
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$tot_usds->usdsomme}}$</div>
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
                            @foreach($tot_cdf as $tot_cdfs)
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$tot_cdfs->usdsomme}} Fc</div>
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
    </div>
    </div>

<div class="container-fluid">
<a href="" class="btn btn-primary col-md-2" onclick="imprimer('sectionAimprimer')">Imprimer</a>
<br><br>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-exchange-alt"></i> Les Trasanctions</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive" id="sectionAimprimer">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th>Numero</th>
            <th>Date</th>
            <th>utilisateurs</th>
            <th>Montant</th>
            <th>Devise</th>
            <th>Company</th>
            <th>Type de paiment</th>
            <th>Type de paiement</th>
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
            <th>Type de paiment</th>
            <th>Type de paiement</th>
          </tr>
          </tr>
        </tfoot>
        <tbody>
        @php
          $i = 1;
        @endphp
        @foreach($affiche as $affiches)
          <tr>
            <td>{{$i++}}</td>
            <td>{{$affiches->date_t}}</td>
            <td>{{$affiches->user}}</td>
            <td>{{$affiches->montant}}</td>
            <td>{{$affiches->id_devise}}</td>
            <td>{{$affiches->nom}}</td>
            <td>{{$affiches->type_p}}</td>
            <td>{{$affiches->type_off}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  
</div>

</div>
<script>
    function imprimer(divName) {
        var printContents = document.getElementById(divName).innerHTML;    
        var originalContents = document.body.innerHTML;      
        document.body.innerHTML = printContents;     
        window.print();     
        document.body.innerHTML = originalContents;
    }
</script>
@endsection 