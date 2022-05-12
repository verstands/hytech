@extends('layout.admin')
@section('content')

<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-exchange-alt"></i> Les sous administrateur</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th>Numero</th>
            <th>Login</th>
            <th>Password</th>
            <th>Email</th>
            <th>Statut</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Numero</th>
            <th>Login</th>
            <th>Password</th>
            <th>Email</th>
            <th>Statut</th>
          </tr>
          </tr>
        </tfoot>
        <tbody>
        @php
          $i = 1;
        @endphp
        @foreach($sous_admin as $affiches):
          <tr>
            <td>{{$i++}}</td>
            <td>{{$affiches->login}}</td>
            <td>{{$affiches->password}}</td>
            <td>{{$affiches->email}}</td>
            <td>
                <a href="{{route('delete_sousadmin',$affiches->id_admin)}}" title="supprimer" class="btn btn-danger btn-circle">
                    <i class="fas fa-trash"></i>
                </a>
                <a href="{{route('update_sousadmin',$affiches->id_admin)}}" title="modifier" class="btn btn-success btn-circle">
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