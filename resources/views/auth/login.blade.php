<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Result Portal</title>

    <link href="{{ asset('/assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <link href="{{ asset('/assets/build/css/custom.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('/assets/css/home.css') }}">

    <style>
        .boxx {
            margin-top: 50px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
  </head>

  <body>

    <header>
        <div class="container header-container" style="display: flex; justify-content: center; align-items: center; height: 100px;">
            <div class="logo" style="display: flex; align-items: center;">
                <span class="uppercase">COE Result Portal</span>
            </div>
        </div>
    </header>

    <div class="mb-5">
        <div class="container boxx">
            <div class="x_panel">
                <div class="x_title"">
                   <p style="font-size: 1.3rem; font-weight: 800; padding-top: 8px">Login</p>
                </div>
                @if (session()->has('error') )
                    <div class="alert alert-danger alert-dismissible " role="alert">
                        <strong>{{ session('error') }}</strong>
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="form_no" class="form-label" style="font-size: 1rem; font-weight: 600">Email</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>


                        <div class="mb-3">
                            <label for="session" class="form-label" style="font-size: 1rem; font-weight: 600">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                      
                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

  </body>
</html>
