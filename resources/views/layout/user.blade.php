<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>HYTECH</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css_user/css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('css_user/css/fontawesome.css')}}" rel="stylesheet" />
        <style>
        .button {
          display: inline-block;
          font-weight: 400;
          color: #cf5331;
          text-align: center;
          vertical-align: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;
          background-color: transparent;
          border: 1px solid transparent;
          padding: 0.375rem 0.75rem;
          font-size: 2rem;
          line-height: 1.5;
          border-radius: 0.2rem;
          transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        .button.button-primary {
            color: #fff; 
        }
        .button-primary {
          color: #fff;
          background-color: #cf5331;
          border-color: #cf5331;
        }

        .button-primary:hover {
          color: #fff;
          background-color: #cf5350;
          border-color: #cf5350;
        }

        .button-primary:focus, .button-primary.focus {
          box-shadow: 0 0 0 0.2rem rgba(105, 136, 228, 0.5);
        }

        .button-primary.disabled, .button-primary:disabled {
          color: #fff;
          background-color: #4e73df;
          border-color: #4e73df;
        }

        .button-primary:not(:disabled):not(.disabled):active, .button-primary:not(:disabled):not(.disabled).active,
        .show > .button-primary.dropdown-toggle {
          color: #fff;
          background-color: #2653d4;
          border-color: #244ec9;
        }

        .button-primary:not(:disabled):not(.disabled):active:focus, .button-primary:not(:disabled):not(.disabled).active:focus,
        .show > .button-primary.dropdown-toggle:focus {
          box-shadow: 0 0 0 0.2rem rgba(105, 136, 228, 0.5);
        }
        .button-user {
          font-size: 0.8rem;
          border-radius: 10rem;
          padding: 0.75rem 1rem;
        }
        a{
            text-decoration: none;
            margin: 10px;
        }

    </style>
    </head>
    @yield('content')

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('css_user/js/scripts.js')}}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
