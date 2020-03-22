<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
   
        <title>Laravel</title>
        <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script type="text/javascript">
        var APP_URL = '{{ URL::to('/') }}';
        </script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>


    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Login Page
                </div>
          

                    <form id="loginform">
                    <div class="form-group input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>   
                      <input type="email" id="email" class="form-control">
                      
                    </div>
                    <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                         <input type="password" id="password" class="form-control">
    
                    </div>
                    <div class="form-group">
                    <button id="loginbtn" class="form-control btn btn-default">Login</button>
                   </div>
                   <div class="form-group">
                    <button id="registerbtn" class="form-control btn btn-default">Register</button>
                   </div>
                    <div class="col-lg-12"  id="divResult1" style="overflow: auto; border: 1px solid transparent;
                    border-radius: 4px;"></div>
                    </form>
                  
                <div class="links">
                    <a href="{{ URL::to('/login') }}">Login</a>
                </div>
            </div>
        </div>
        <script>
  $(document).ready(function() {


$('#registerbtn').click(function(e){
             
    e.preventDefault();
    $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

             var email    = $.trim($("#email").val());
             var password = $.trim($("#password").val());
                     alert(email);
                      
                      $.ajax({
                        url: "{{ url('/registerData') }}",
                          type:'POST',
                          data:{'email':email,'password':password},
                          success: function(response){

                                console.log(response);
                         
                              },
                              error: function(xhr, textStatus, error) {
                                console.log(xhr.statusText);
                                console.log(textStatus);
                                console.log(error);
                              }
                          })
                
                 });//update view in modal
 
                });
    </script>
    </body>
</html>
