@extends('layout.body')
@section('content')
<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-calendar"></i> Les administrateurs</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>N°</th>
            <th>Id</th>
            <th>Company</th>
            <th>Login</th>
            <th>Type administrateur</th>
            <th>Password</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
             <th>N°</th>
            <th>Id</th>
            <th>Company</th>
            <th>Login</th>
            <th>Type administrateur</th>
            <th>Password</th>
            <th>Email</th>
            <th>Action</th>    
          </tr>
        </tfoot>
        <tbody>
          @php
            $i = 1;
          @endphp
          @foreach($administrateur as $companys):
          <tr>
            <td>{{$i++}}</td>
            <td>{{$companys->id_admin}}</td>
            <td>{{$companys->nom}}</td>
            <td>{{$companys->login}}</td>
            <td>{{$companys->type_admin}}</td>
            <td>{{$companys->password}}</td>
            <td>{{$companys->email}}</td>
            <td>
                <a href="{{route('delete_admin',$companys->id_admin)}}" title="supprimer" class="btn btn-danger btn-circle">
                    <i class="fas fa-trash"></i>
                </a>
                <a href="{{route('update_admin',$companys->id_admin)}}" title="modifier" class="btn btn-success btn-circle">
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