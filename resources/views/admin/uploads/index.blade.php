@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body tw:w-full tw:overflow-x-auto">
            <div class="flex flex-row justify-between items-center">
                <h1 class="tw:font-semibold text-xl">Uploaded Results</h1>
            </div>

            <div class="tw:shadow-md tw:sm:rounded-lg tw:mt-5 tw:font-sans tw:overflow-x-auto">
                <table class="tw:w-full tw:text-sm tw:text-left tw:text-gray-500">
                    <thead class="tw:text-xs tw:text-gray-700 tw:uppercase tw:bg-gray-200">
                        <tr>
                            <th scope="col" class="tw:lg:px-3 tw:px-3 tw:lg:py-3 tw:py-2 tw:rounded-tl-lg">S/N</th>
                            <th scope="col" class="tw:lg:px-6 tw:px-3 tw:lg:py-3 tw:py-2">Course</th>
                            <th scope="col" class="tw:lg:px-6 tw:px-3 tw:lg:py-3 tw:py-2">Type</th>
                            <th scope="col" class="tw:lg:px-6 tw:px-3 tw:lg:py-3 tw:py-2">Session</th>
                            <th scope="col" class="tw:lg:px-6 tw:px-3 tw:lg:py-3 tw:py-2">Semester</th>
                            <th scope="col" class="tw:lg:px-6 tw:px-3 tw:lg:py-3 tw:py-2">Department</th>
                            <th scope="col" class="tw:lg:px-6 tw:px-3 tw:lg:py-3 tw:py-2">Faculty</th>
                            <th scope="col" class="tw:lg:px-6 tw:px-3 tw:lg:py-3 tw:py-2">Level</th>
                            <th scope="col" class="tw:lg:px-6 tw:px-3 tw:lg:py-3 tw:py-2">Uploaded By</th>
                            <th scope="col" class="tw:lg:px-6 tw:px-3 tw:lg:py-3 tw:py-2">Upload Date</th>
                            <th scope="col" class="tw:lg:px-6 tw:px-3 tw:lg:py-3 tw:py-2 tw:rounded-tr-lg">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($uploads as $index => $upload)
                            <tr  class="tw:bg-white tw:border-b">
                                <td class="tw:lg:px-3 tw:px-3 tw:lg:py-4 tw:py-2  tw:font-medium tw:text-gray-900 tw:whitespace-nowrap">{{ $index + 1 }}</td>
                                <td class="tw:lg:px-6 tw:px-3 tw:lg:py-4 tw:py-2 ">{{ $upload->course_name }}</td>
                                <td class="tw:lg:px-6 tw:px-3 tw:lg:py-4 tw:py-2 ">{{ $upload->category }}</td>
                                <td class="tw:lg:px-6 tw:px-3 tw:lg:py-4 tw:py-2 ">{{ $upload->session }}</td>
                                <td class="tw:lg:px-6 tw:px-3 tw:lg:py-4 tw:py-2 ">{{ $upload->semester }}</td>
                                <td class="tw:lg:px-6 tw:px-3 tw:lg:py-4 tw:py-2 ">{{ $upload->department_name }}</td>
                                <td class="tw:lg:px-6 tw:px-3 tw:lg:py-4 tw:py-2 ">{{ $upload->faculty_name }}</td>
                                <td class="tw:lg:px-6 tw:px-3 tw:lg:py-4 tw:py-2 ">{{ $upload->level }}</td>
                                <td class="tw:lg:px-6 tw:px-3 tw:lg:py-4 tw:py-2 ">{{ $upload->submitted_by }}</td>
                                <td class="tw:lg:px-6 tw:px-3 tw:lg:py-4 tw:py-2 ">{{ $upload->submitted_at }}</td>
                                <td class="tw:lg:px-6 tw:px-3 tw:lg:py-4 tw:py-2 ">
                                    <a href="{{ route('officials.results.show', ['id' => $upload->result_id]) }}"
                                        class="tw:font-medium tw:text-blue-600 tw:dark:text-blue-500 tw:hover:underline">
                                        View
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr class="tw:bg-white">
                                <td colspan="11" class="tw:px-6 tw:py-4 tw:text-center tw:text-gray-500">No uploads found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>




        </div>
    </div>
@endsection
