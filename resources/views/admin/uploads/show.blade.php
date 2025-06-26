@extends('layouts.app')
@section('content')
    <div class="card">

        <div class="card-body">
            <div class="flex tw:flex-col tw:space-y-3">
                <div class="font-bold text-sm">Session: {{ $result_data->session  }}</div>
                <div class="font-bold text-sm">Semester: {{ $result_data->semester  }}</div>
                <div class="font-bold text-sm">Faculty: {{ $result_data->faculty_name  }}</div>
                <div class="font-bold text-sm">Department: {{ $result_data->department_name  }}</div>
                <div class="font-bold text-sm">Level: {{ $result_data->level  }}</div>
                <div class="font-bold text-sm">Course: {{ $result_data->course_name  }}</div>
                <div class="font-bold text-sm">Assessment: {{ $result_data->category  }}</div>
            </div>

            <table class="table-auto w-full tw:mt-10 text-right">

                <thead>
                    <tr class="">
                        <td class="px-4 py-4 font-extrabold text-sm text-left tw:bg-gray-200">S/N</td>
                        <td class="py-4 font-extrabold text-sm text-left tw:bg-gray-200">Student Name</td>
                        <td class="py-4 font-extrabold text-sm text-left tw:bg-gray-200">Mat No</td>
                        <td class="py-4 font-extrabold text-sm text-left tw:bg-gray-200">Score</td>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($results as $index => $upload)
                        <tr class="">
                            <td class="px-4 py-4  text-sm text-gray-600 flex flex-row items-center text-left">{{ $index + 1 }}</td>
                            <td class="py-4 text-xs text-gray-600 text-left">{{ $upload->student_name }}</td>
                            <td class="py-4 text-xs text-gray-600 text-left">{{ $upload->mat_no }}</td>
                            <td class="py-4 text-xs text-gray-600 text-left">{{ $upload->score }}</td>
                        </tr>
                    @empty
                        
                    @endforelse
                    

                    

                </tbody>

            </table>

        </div>
    </div>
@endsection