<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Hy_tech</title>
  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
</head>
<body id="page-top">
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Hy_tech                                                                                                                                                                                                                                                       </div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="{{route('dashboad')}}">
      <i class="fas fa-home"></i>
      <span>Dashboard</span></a>
  </li>
  <hr class="sidebar-divider">
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#entreprise" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-calendar"></i>
      <span>Création d'un entreprise</span>
    </a>
    <div id="entreprise" class="collapse" aria-labelledby="headingentreprise" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('company')}}">Ajouter une entreprise</a>
        <a class="collapse-item" href="{{route('affiche_company')}}">Afficher les entreprise</a>
        <a class="collapse-item" href="{{route('affiche_company_des')}}">Afficher les entreprise <br >desactivées</a>
      </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('affiche_trasanction')}}">
      <i class="fas fa-exchange-alt"></i>
      <span>Transaction</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admin" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-users"></i>
      <span>Les administrateur</span>
    </a>
    <div id="admin" class="collapse" aria-labelledby="headingadmin" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('administrateur')}}">Ajouter un administrateur</a>
        <a class="collapse-item" href="{{route('administrateur_affiche')}}">Afficher un administrateur</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#devise" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-dollar-sign"></i>
      <span>Les Devises</span>
    </a>
    <div id="devise" class="collapse" aria-labelledby="headingdevise" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('devise')}}">Ajouter une devise</a>
        <a class="collapse-item" href="{{route('affiche_devise')}}">Afficher des devises</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#don" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-shopping-cart"></i>
      <span>Type des Dons</span>
    </a>
    <div id="don" class="collapse" aria-labelledby="headingdon" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('don')}}">Ajouter un don</a>
        <a class="collapse-item" href="{{route('affiche_don')}}">Afficher des dons</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-money-bill-alt"></i>
      <span>Type des paiements</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-3 collapse-inner rounded">
        <a class="collapse-item" href="{{route('paiement')}}">Ajouter un paiement</a>
        <a class="collapse-item" href="{{route('affiche_paiement')}}">Afficher des paiements</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pour" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-percentage"></i>
      <span>Les Pourcentages</span>
    </a>
    <div id="pour" class="collapse" aria-labelledby="headingpour" data-parent="#accordionSidebar">
      <div class="bg-white py-3 collapse-inner rounded">
        <a class="collapse-item" href="{{route('pourcentage')}}">Ajouter un pourcentage</a>
        <a class="collapse-item" href="{{route('affiche_pourcentage')}}">Afficher des pourcentage</a>
        <a class="collapse-item" href="{{route('Nos_pourcentage')}}">Afficher Nos pourcentage</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#retrait" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-exchange-alt"></i>
      <span>Les retraits</span>
    </a>
    <div id="retrait" class="collapse" aria-labelledby="headingretrait" data-parent="#accordionSidebar">
      <div class="bg-white py-3 collapse-inner rounded">
        <a class="collapse-item" href="{{route('affiche_r')}}">Afficher les retraits</a>
        <a class="collapse-item" href="{{route('approuve_retrait')}}">Approver un retrait</a>
      </div>
    </div>
  </li>
</ul>
<div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{session('admins')}}</span>
                <i class="fa fa-user-circle"  style="font-size:30px;"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{route('profil')}}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="{{route('logout')}}">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Se deconnecter
                </a>
              </div>
            </li>

          </ul>

        </nav>
    @yield('content')
</div>
</div></div>
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
  <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
  <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>
  <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; Your Website 2021 - {{ date('Y')}}</span>
      </div>
    </div>
  </footer>
</body>
</html>