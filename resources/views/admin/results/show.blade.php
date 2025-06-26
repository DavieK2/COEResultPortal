@extends('layouts.app')
@section('content')
    <div class="card">

        <div class="card-body">
            <table class="">
                <tr>
                    <th class="tw:pr-6 tw:py-3 tw:text-left tw:text-sm" scope="col">Session:</th>
                    <td class="tw:px-6 tw:py-3 tw:text-left tw:text-sm">{{ $result_data['session']  }}</td>
                </tr>
                <tr>
                    <th class="tw:pr-6 tw:py-3 tw:text-left tw:text-sm" scope="col">Semester:</th>
                    <td class="tw:px-6 tw:py-3 tw:text-left tw:text-sm">{{ $result_data['semester']  }}</td>
                </tr>
                <tr>
                    <th class="tw:pr-6 tw:py-3 tw:text-left tw:text-sm" scope="col">Faculty:</th>
                    <td class="tw:px-6 tw:py-3 tw:text-left tw:text-sm">{{ $result_data['faculty_name']  }}</td>
                </tr>
                <tr>
                    <th class="tw:pr-6 tw:py-3 tw:text-left tw:text-sm" scope="col">Department:</th>
                    <td class="tw:px-6 tw:py-3 tw:text-left tw:text-sm">{{ $result_data['department_name']  }}</td>
                </tr>
                <tr>
                    <th class="tw:pr-6 tw:py-3 tw:text-left tw:text-sm" scope="col">Level:</th>
                    <td class="tw:px-6 tw:py-3 tw:text-left tw:text-sm">{{ $result_data['level']  }}</td>
                </tr>
                <tr>
                    <th class="tw:pr-6 tw:py-3 tw:text-left tw:text-sm" scope="col">Course:</th>
                    <td class="tw:px-6 tw:py-3 tw:text-left tw:text-sm">{{ $result_data['course_name']  }}</td>
                </tr>
            </table>

            <table class="table-auto w-full tw:mt-10 text-right">

                <thead>
                    <tr class="">
                        <td class="px-4 py-4 font-extrabold text-sm text-left tw:bg-gray-200">S/N</td>
                        <td class="py-4 font-extrabold text-sm text-left tw:bg-gray-200">Student Name</td>
                        <td class="py-4 font-extrabold text-sm text-left tw:bg-gray-200">Mat No</td>
                        @foreach ( \App\Models\AssessmentCategory::get() as $item )
                            <td class="py-4 font-extrabold text-sm text-left tw:bg-gray-200">{{ $item->category  }}</td>
                        @endforeach
                        <td class="py-4 font-extrabold text-sm text-left tw:bg-gray-200">Total</td>
                        <td class="py-4 font-extrabold text-sm text-left tw:bg-gray-200">Grade</td>
                        <td class="py-4 font-extrabold text-sm text-left tw:bg-gray-200">Remarks</td>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($results as $index => $result)
                        <tr class="">
                            <td class="px-4 py-4  text-sm text-gray-600 flex flex-row items-center text-left">{{ $index + 1 }}</td>
                            <td class="py-4 text-xs text-gray-600 text-left">{{ $result['student_name'] }}</td>
                            <td class="py-4 text-xs text-gray-600 text-left">{{ $result['mat_no'] }}</td>
                            @foreach ( \App\Models\AssessmentCategory::get() as $item )
                                <td class="py-4 text-xs text-gray-600 text-left">{{ $result['assessments'][$item->category] ?? '-'  }}</td>
                            @endforeach
                            <td class="py-4 text-xs text-gray-600 text-left">{{ $result['total'] }}</td>
                            <td class="py-4 text-xs text-gray-600 text-left">{{ $result['grade'] }}</td>
                            <td class="py-4 text-xs text-gray-600 text-left">{{ $result['remarks'] }}</td>
                        </tr>
                    @empty
                        
                    @endforelse
                    
                </tbody>

            </table>

        </div>
    </div>
@endsection