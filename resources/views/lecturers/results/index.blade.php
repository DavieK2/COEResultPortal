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
            max-width: 1500px;
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
                    <div class="row align-items-center justify-content-between">
                       <div class="col-md-6">
                            <p class="text-primary px-4" style="font-size: 1.8rem; font-weight: 800; padding-top: 8px">Uploads</p>
                       </div>
                       
                       <div class="col-md-6">
                            <a class="btn btn-primary float-right" href="{{ route('upload') }}">Upload Result</a>
                       </div>
                       
                    </div>
                </div>
                <div class="card-body">
                        <table class="table table-bodered">
                            <thead>
                                <th>S/N</th>
                                <th>FACULTY</th>
                                <th>DEPARTMENT</th>
                                <th>SESSION</th>
                                <th>SEMESTER</th>
                                <th>LEVEL</th>
                                <th>COURSE</th>
                                <th>CATEGORY</th>
                            </thead>
                            <tbody>
                                @forelse ( $uploads as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item['faculty_name']}}</td>
                                        <td>{{ $item['department_name'] }}</td>
                                        <td>{{ $item['session']}}</td>
                                        <td>{{ $item['semester']}}</td>
                                        <td>{{ $item['level']}}</td>
                                        <td>{{ $item['course_name']}}</td>
                                        <td>{{ $item['category']}}</td>
                                    </tr>
                                @empty
                                    <p style="font-size: 1rem; font-weight: 600" class="text-center">No result Uploaded yet</p>
                                @endforelse
                            </tbody>
                        </table>
                    
                </div>
            </div>
        </div>
    </div>
</body>

</html>
