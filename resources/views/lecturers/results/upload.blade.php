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
        <div class="container header-container" style="display: flex; justify-content: center; align-items: center; height: 100px;">
            <div class="logo" style="display: flex; align-items: center;">
                <span>Results Upload</span>
            </div>
        </div>
    </header>

    @if ( session()->has('success') )
        <div id="alert" class="alert alert-success alert-dismissible text-center" role="alert" style="border-radius: 0">
            <button onclick="document.getElementById('alert').style.display = 'none'" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <strong>Results successfully uploaded</strong>
        </div>
    @endif
    
    <div x-data="result" class="mb-5">
        <div class="container boxx">
            <div class="x_panel">
                <div class="x_title"">
                   <p class="text-primary" style="font-size: 1.8rem; font-weight: 800; padding-top: 8px">Upload Result</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('results.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="assessment_category" class="form-label" style="font-size: 1rem; font-weight: 600">Select Assessment Type</label>
                            <select class="form-control" x-on:change="selectSession" name="assessment_category" id="assessment_category">
                                <option value="">Select Assessment Type</option>
                                @foreach (\App\Models\AssessmentCategory::get() as $assessment_category)
                                    <option @selected( old('assessment_category') == $assessment_category->id )  value="{{ $assessment_category->id }}">{{ $assessment_category->category }}</option>
                               @endforeach
                            </select>
                            @error('assessment_category')
                                <div class="mt-2" style="font-size: 12px; color: red">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="session" class="form-label" style="font-size: 1rem; font-weight: 600">Select Session</label>
                            <select class="form-control" x-on:change="selectSession" name="session" id="session">
                                <option value="">Select Session</option>
                                @foreach (\App\Models\AcademicSession::get() as $session)
                                    <option @selected( old('session') == $session->id )  value="{{ $session->id }}">{{ $session->session }}</option>
                               @endforeach
                            </select>
                            @error('session')
                                <div class="mt-2" style="font-size: 12px; color: red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="semester" class="form-label" style="font-size: 1rem; font-weight: 600">Select Semester</label>
                            <select class="form-control" x-on:change="selectSession" name="semester" id="semester">
                                <option value="">Select Semester</option>
                                @foreach (\App\Models\Semester::get() as $semester)
                                    <option @selected( old('semester') == $semester->id )  value="{{ $semester->id }}">{{ $semester->semester }}</option>
                               @endforeach
                            </select>
                            @error('semester')
                                <div class="mt-2" style="font-size: 12px; color: red">{{ $message }}</div>
                            @enderror
                        </div>



                        <div x-show="showFacAndDep">
                            <div class="mb-3">
                                <label for="faculty" class="form-label" style="font-size: 1rem; font-weight: 600">Select Faculty</label>
                                <select class="form-control" id="faculty" name="faculty" required>
                                    <option value="">Select Faculty</option>
                                   @foreach (\App\Models\Faculty::get() as $faculty)
                                        <option @selected( old('faculty') == $faculty->id )  value="{{ $faculty->id }}">{{ $faculty->faculty_name }}</option>     
                                   @endforeach
                                </select>
                                @error('faculty')
                                    <div class="mt-2" style="font-size: 12px; color: red">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <div class="mb-3">
                                <label for="department" class="form-label" style="font-size: 1rem; font-weight: 600">Select Department</label>
                                <select class="form-control" id="department" name="department" required>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="level" class="form-label" style="font-size: 1rem; font-weight: 600">Select Level</label>
                            <select class="form-control" x-on:change="selectSession" name="level" id="level">
                                <option value="">Select Level</option>
                                @foreach (\App\Models\Level::get() as $level)
                                    <option @selected( old('level') == $level->level )  value="{{ $level->level }}">{{ $level->level }}</option>
                               @endforeach
                            </select>
                            @error('level')
                                <div class="mt-2" style="font-size: 12px; color: red">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="course" class="form-label" style="font-size: 1rem; font-weight: 600">Select Course</label>
                            <select class="form-control" x-on:change="selectSession" name="course" id="course">
                                <option value="">Select Course</option>
                                @foreach (\App\Models\Course::get() as $course)
                                    <option @selected( old('course') == $course->id )  value="{{ $course->id }}">{{ $course->course_name}}</option>
                               @endforeach
                            </select>
                            @error('course')
                                <div class="mt-2" style="font-size: 12px; color: red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="file" class="form-label" style="font-size: 1rem; font-weight: 600">Select Upload File</label>
                            <input type="file" class="form-control" id="file" name="file" required>
                        </div>

                       <div>
                            <a href="/templates/RESULT_TEMPLATE.xlsx">Download Result Template</a>
                       </div>
                        <div class="mt-5"> 
                            <button type="submit" style="font-size: 1rem; font-weight: 600" class="btn btn-primary w-100" onclick="event.preventDefault(); event.target.disabled = true; event.target.closest('form').submit()">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>

        let dep = document.getElementById('department');
        let faculty = document.getElementById('faculty');


        if( faculty && faculty.value.length > 0 ){

            window.addEventListener('load', (e) => getDep(faculty.value, dep));
        }

        
        if( faculty ){

            faculty.addEventListener('change', (e) => getDep(e.target.value, dep));
        }

        const getDep = async(fac, department) => {
                res = await fetch("{{ url('/get-departments') }}/"+fac);
                res = await res.json();
                department.innerHTML = '';

                res.departments.forEach((dep) => {
                    let option = document.createElement('option');
                    option.setAttribute('value', dep.id);
                    if( dep.id == "{{ old('department') }}" ){
                        
                        option.setAttribute('selected', dep.id);
                    }
                    let value = document.createTextNode(dep.department_name);
                    option.appendChild(value);
                    department.appendChild(option);
                })
            }
        
    </script>
  </body>
</html>
