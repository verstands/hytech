  @extends('layout.login')
  @section('login')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <div>
                        @if(isset($message))
                          <div>{{$message}}</div>
                        @endif
                    </div>
                    <h1 class="h4 text-gray-900 mb-4">Se connecter</h1>
                  </div>
                  <form class="user" method="POST">
                    @csrf
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email...">
                    </div>
                    <div class="form-group">
                      <input type="password"  name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password...">
                    </div>
                    <div class="form-group">
                      
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                   
                   
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim rem provident porro deserunt illum mollitia odio placeat non vero, assumenda praesentium qui! Numquam neque, modi velit beatae praesentium dolores mollitia!/a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection