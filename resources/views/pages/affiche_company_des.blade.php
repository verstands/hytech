@extends('layout.body')
@section('content')
<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-calendar"></i> Les company desactivées</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Identifiant</th>
            <th>Nom</th>
            <th>Logo</th>
            <th>Lien</th>
            <th>Description</th>
            <th>Telephone</th>
            <th>Active</th>
            <th>Nom du retrait</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>N°</th>
            <th>Nom</th>
            <th>Logo</th>
            <th>Lien</th>
            <th>Description</th>
            <th>Telephone</th>
            <th>Active</th>
            <th>Nom du retrait</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
          @php
            $i = 1;
          @endphp
          @foreach($company as $companys)
          <tr>
            <td>{{$i++}}</td>
            <td>{{$companys->nom}}</td>
            <td><img src="img/image_company/{{$companys->logo}}" alt="" width="100" height="60"></td>
            <td><a href="{{route('user',Crypt::encryptString($companys->id_eg))}}">{{route('user',Crypt::encryptString($companys->id_eg))}}</a></td>
            <td>{{$companys->des}}</td>
            <td>{{$companys->tel}}</td>
            <td>{{$companys->active}}</td>
            <td>{{$companys->nomre}}</td>
            <td>
                <a href="{{route('delete_company',$companys->id_eg)}}" title="supprimer" class="btn btn-danger btn-circle">
                    <i class="fas fa-trash"></i>
                </a>
                <a href="{{route('update_company',$companys->id_eg)}}" title="modifier" class="btn btn-success btn-circle">
                    <i class="fas fa-exchange-alt"></i>
                </a>
                <a href="{{route('active_company',$companys->id_eg)}}" title="activer" class="btn btn-success ">
                    Activer
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