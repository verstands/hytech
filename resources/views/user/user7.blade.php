@extends('layout.user')
@section('content')
    <body id="page-top">
        @foreach($affichage as $affichages)
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">
                     <img src="/img/image_company/{{$affichages->logo}}" alt="" width="100" height="70">  
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#about">A propos</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        @endforeach 
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">Banque</h2>
                        <hr class="divider" />
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        
                        <form id="contactForm" action="/user8" method="get">
                            <!-- Name input-->
                            
                            <input type="hidden" name="authorization" value="Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJcL2xvZ2luIiwicm9sZXMiOlsiTUVSQ0hBTlQiXSwiZXhwIjoxNzEwNTA2NTM5LCJzdWIiOiI2M2E5ZjIyNGFhNjZjYTE2MDAxNGIxMThhNmUxYTRmMyJ9.o3nE2CeD6pICOWMmfeoUYRmpZ0YxpeiX1QxlezJnb1Q"/>
                            <input type="hidden" name="merchant" value="HYTECH"/>
                            <input type="hidden" name="callback_url" value="{{route('callback_url')}}"/>
                            <input type="hidden" name="approve_url" value="{{route('approve_url')}}"/>
                            <input type="hidden" name="cancel_url" value="{{route('cancel_url')}}"/>
                            <input type="hidden" name="decline_url" value="{{route('cancel_url')}}"/>
                            <input type="hidden" name="description" value="CHAPELLE"/>
                              
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" name="phone" type="number" placeholder="Enter your name..." name="phone" />
                                <label for="name">Telephone</label>
                                
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>

                           <h5 style="color:white"><center>Selectionnez ou inserez le montant que vous aimeriez offrir</center></h5>
                            
                                <a href="#" onclick="cinq();" id="quinze">15</a>
                                <a href="#" onclick="vingtsinque();" id="vingtsinque">25</a>
                                <a href="#" onclick="cinqante();" id="cinqante">50</a>
                                <a href="#" onclick="cent();" id="cent">100</a>
                                <a href="#" onclick="cinqcent();" id="cinqcent">500</a>
                                <a href="#" onclick="mille();" id="mille">1000</a>
                                <a href="#" onclick="autre();"id="autre">Autre</a>
                                <br>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputs" name="amount" value="<?= isset($amount) ? $amount :'' ?>"  type="number" id="inputs" placeholder="20"  />
                                <label for="email">Montant</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" value="CHAPELLE0SD52" name="reference"  type="hidden" id="inputs" placeholder="20"  />
                                <label for="email">reference</label>
                            </div>
                            
                            <div class="form-floating mb-3">  
                                <select name="currency" id="" class="form-control">
                                   
                                    <option value="USD">USD</option>

                                </select>
                            </div>
                            <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton" type="submit">Payez maintenant</button></div>
                        </form>
                    </div>
                </div>
                        </div>
                    </div>
                </div>
            </div>       
        </header>  
        <script>

        window.addEventListener('load',()=>{
            document.querySelector('#form').submit()
        })
    </script>
        <script src="{{asset('css_user/js/api.js')}}"></script>

        <script type="text/javascript">
    function cinq(){
      document.getElementById("inputs").value = "15";
    }
    function vingtsinque(){
      document.getElementById("inputs").value = "25";
    }
    function cinqante(){
      document.getElementById("inputs").value = "50";
    }
    function cent(){
      document.getElementById("inputs").value = "100";
    }
    function cinqcent(){
      document.getElementById("inputs").value = "500";
    }
    function mille(){
      document.getElementById("inputs").value = "1000";
    }
    function autre(){
      document.getElementById("inputs").value = '';
    }
</script> 
@endsection