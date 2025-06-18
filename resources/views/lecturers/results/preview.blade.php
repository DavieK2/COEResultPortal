<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>COE Result Portal</title>

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
        <div class="container header-container"
            style="display: flex; justify-content: center; align-items: center; height: 100px;">
            <div class="logo" style="display: flex; align-items: center;">
                <a href="/uploads" style="color: white">Results Upload</a>
            </div>
        </div>
    </header>


    <div x-data="result" class="mb-5">
        <div class="container boxx">
            <div class="x_panel">
                <div class="x_title" style="border: none">
                    <p class="text-primary" style="font-size: 1.8rem; font-weight: 800; padding-top: 8px">Preview</p>
                </div>
                <div class="card-body">
                    @if ( count( $data['upload-error-rows'] ) > 0 )

                        <p style="font-size: 1.2rem; font-weight: 800; ">Error Rows</p>
                        <table class="table table-bodered">
                            <thead>
                                <th>S/N</th>
                                <th>STUDENT NAME</th>
                                <th>MAT NO</th>
                                <th>SCORE</th>
                            </thead>
                            <tbody>
                                @foreach ( $data['upload-error-rows'] as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item['STUDENT_NAME']}}</td>
                                        <td>{{ $item['MAT_NO']}}</td>
                                        <td>{{ $item['SCORE'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <br>
                        <br>     
                    @endif
                    @if ( count( $data['valid-uploads'] ) > 0 )
                        <p style="font-size: 1.2rem; font-weight: 800; ">Valid Rows</p>
                        <table class="table table-bodered">
                            <thead>
                                <th>S/N</th>
                                <th>STUDENT NAME</th>
                                <th>MAT NO</th>
                                <th>SCORE</th>
                            </thead>
                            <tbody>
                                @foreach ( $data['valid-uploads'] as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item['STUDENT_NAME']}}</td>
                                        <td>{{ $item['MAT_NO']}}</td>
                                        <td>{{ $item['SCORE'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
            <br>
            <br>
            <div class="row align-items-center justify-content-center">
               @if (  count( $data['upload-error-rows'] ) > 0 )

                    <a class="btn btn-primary" href="{{ route('upload') }}">Re-upload</a>

               @else
                    <form action="{{ route('results.upload') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">Complete Upload</button>
                    </form>
               @endif

               
            </div>
            <br>
            <br>
        </div>
    </div>
</body>

</html>
