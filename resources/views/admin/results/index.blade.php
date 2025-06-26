@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-body tw:w-full tw:overflow-x-auto">
            <div class="tw:shadow-md tw:sm:rounded-lg tw:mt-5 tw:font-sans tw:overflow-x-auto">
                <div class="tw:lg:flex lg:flex-row tw:flex tw:flex-col tw:gap-4 tw:w-full">
                    <div class="tw:flex tw:flex-col tw:w-full">
                        <label class="tw:mb-3 tw:font-semibold" for="">Select Session</label>
                        <select class="tw:w-full tw:border tw:border-gray-800 tw:bg-gray-200 py-2 px-3" name="" id="session">
                            @foreach (\App\Models\AcademicSession::get() as $session)

                                <option value="{{ $session->id }}">{{ $session->session }}</option>
                                
                            @endforeach
                        </select>
                    </div>
                    <div class="tw:flex tw:flex-col tw:w-full">
                        <label class="tw:mb-3 tw:font-semibold" for="">Select Semester</label>
                        <select class="tw:w-full tw:border tw:border-gray-800 tw:bg-gray-200 py-2 px-3" name="" id="semester">
                            @foreach (\App\Models\Semester::get() as $semester)

                                <option value="{{ $semester->id }}">{{ $semester->semester }}</option>
                                
                            @endforeach
                        </select>
                    </div>
                    <div class="tw:flex tw:flex-col tw:w-full">
                        <label class="tw:mb-3 tw:font-semibold" for="">Select Level</label>
                        <select class="tw:w-full tw:border tw:border-gray-800 tw:bg-gray-200 py-2 px-3" name="" id="level">
                            @foreach (\App\Models\Level::get() as $level)

                                <option value="{{ $level->id }}">{{ $level->level }}</option>
                                
                            @endforeach
                        </select>
                    </div>
                </div>
                 <div class="tw:lg:flex lg:flex-row tw:flex tw:flex-col tw:gap-4 tw:w-full mt-5">
                    <div class="tw:flex tw:flex-col tw:w-full">
                        <label class="tw:mb-3 tw:font-semibold" for="">Select Faculty</label>
                        <select class="tw:w-full tw:border tw:border-gray-800 tw:bg-gray-200 py-2 px-3" name="" id="faculty">
                            @foreach (\App\Models\Faculty::get() as $faculty)

                                <option value="{{ $faculty->id }}">{{ $faculty->faculty_name }}</option>
                                
                            @endforeach
                        </select>
                    </div>
                    <div class="tw:flex tw:flex-col tw:w-full">
                        <label class="tw:mb-3 tw:font-semibold" for="">Select Department</label>
                        <select class="tw:w-full tw:border tw:border-gray-800 tw:bg-gray-200 py-2 px-3" name="" id="department">
                            
                        </select>
                    </div>
                    <div class="tw:flex tw:flex-col tw:w-full">
                        <label class="tw:mb-3 tw:font-semibold" for="">Select Course</label>
                        <select class="tw:w-full tw:border tw:border-gray-800 tw:bg-gray-200 py-2 px-3" name="" id="course">
                            @foreach (\App\Models\Course::get() as $course)

                                <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="tw:flex tw:gap-4 tw:w-full tw:mt-10">
                    <button type="submit" onclick="event.preventDefault(); getResults()" style="background: black; color: white; padding-block: 0.75rem; padding-inline: 1rem" class="tw:bg-gray-900 tw:text-white tw:text-sm tw:font-semibold tw:px-6 tw:py-3 tw:rounded">Search</button>
                </div>
            </div>
        </div>
    </div>
    

    <div class="tw:w-full" id="results">

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
        

            
        const getResults = async () => {

            const session = document.getElementById('session');
            const semester = document.getElementById('semester');
            const level = document.getElementById('level');
            const faculty = document.getElementById('faculty');
            const department = document.getElementById('department');
            const course = document.getElementById('course');


            const req = await fetch(`/admin/get-results?session=${session.value}&semester=${semester.value}&level=${level.value}&faculty=${faculty.value}&department=${department.value}&course=${course.value}`);


            const res = await req.text();

            document.getElementById('results').innerHTML = res;

        }

    </script>
@endsection
