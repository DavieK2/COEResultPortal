<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>

    <!-- Bootstrap -->
    <link href="{{ asset('/assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('/assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('/assets/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('/assets/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('/assets/build/css/custom.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">

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

    {{-- @include('includes.header-two') --}}
    <div class="mb-5">
        <div class="container boxx">
            <div class="x_panel">
                <div class="x_title"">
                   <p style="font-size: 1.3rem; font-weight: 800; padding-top: 8px">Upload Result</p>
                </div>
                <div class="card-body">
                    <form>
                    
                        <div class="mb-3">
                            <label for="form_no" class="form-label" style="font-size: 1rem; font-weight: 600">Enter Form Number</label>
                            <input type="text" class="form-control" id="form_no" required>
                        </div>


                        <div class="mb-3">
                            <label for="session" class="form-label" style="font-size: 1rem; font-weight: 600">Select Session</label>
                            <select class="form-control" name="session">
                                {{-- @foreach (\App\Models\Session::get() as $session)
                                    <option value="{{ $session->id }}">{{ $session->session }}</option>
                               @endforeach --}}
                            </select>
                        </div>

                       
    
                      
                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary w-100">Proceed</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

  </body>
</html>
