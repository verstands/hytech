@extends('layout.user')
@section('content')
    <body id="page-top">
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 style="color:white" class="mt-0">Mobile money</h2>
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
                        <form id="contactForm" action="{{route('user4_action')}}" method="GET">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" name="phone" type="number" placeholder="Enter your name..." name="phone" />
                                <label for="name">Téléphone : Exemple - 243XXXXXXXXX</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Un nom est requis.</div>
                            </div>

                           <h5 style="color:white"><center>Selectionnez ou inserez le montant que vous aimeriez offrir</center></h5>
                            
                                <a href="#" onclick="cinq();" id="quinze">15</a>
                                <a href="#" onclick="vingtsinque();" id="vingtsinque">25</a>
                                <a href="#" onclick="cinqante();" id="cinqante">50</a>
                                <a href="#" onclick="cent();" id="cent">100</a>
                                <a href="#" onclick="cinqcent();" id="cinqcent">500</a>
                                <a href="#" onclick="mille();" id="mille">1000</a>
                                <a href="#" onclick="autre();"id="autre">Autre</a>
                                <div></div>
                                <br>
                                <div></div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputs" name="amount"  type="number" id="inputs" placeholder="20"  />
                                <label for="email">Montant</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" value="MOB{{$ref}}" name="reference"  type="hidden" id="inputs" placeholder="20"  />
                                <label for="text">reference</label>
                            </div>
                            
                            <div class="form-floating mb-3">  
                                <select name="devise" id="" class="form-control">
                                @foreach($devise as $devises)
                                    <option value="{{$devises->type_d}}">{{$devises->type_d}}</option>
                                @endforeach            
                                </select>
                                <label for="text">Devise</label>
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