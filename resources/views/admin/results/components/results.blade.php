<div class="card tw:mt-10">
        <div class="card-body tw:w-full tw:overflow-x-auto">
            <div class="flex flex-row justify-between items-center">
                <h1 class="tw:font-semibold text-xl">Results</h1>
            </div>

            <div class="tw:shadow-md tw:sm:rounded-lg tw:mt-5 tw:font-sans tw:overflow-x-auto">
                <table class="tw:w-full tw:text-sm tw:text-left tw:text-gray-500">
                    <thead class="tw:text-xs tw:text-gray-700 tw:uppercase tw:bg-gray-200">
                        <tr>
                            <th scope="col" class="tw:lg:px-3 tw:px-3 tw:lg:py-3 tw:py-2 tw:rounded-tl-lg">S/N</th>
                            <th scope="col" class="tw:lg:px-6 tw:px-3 tw:lg:py-3 tw:py-2">Course</th>
                            <th scope="col" class="tw:lg:px-6 tw:px-3 tw:lg:py-3 tw:py-2">Assessments</th>
                            <th scope="col" class="tw:lg:px-6 tw:px-3 tw:lg:py-3 tw:py-2">Session</th>
                            <th scope="col" class="tw:lg:px-6 tw:px-3 tw:lg:py-3 tw:py-2">Semester</th>
                            <th scope="col" class="tw:lg:px-6 tw:px-3 tw:lg:py-3 tw:py-2">Department</th>
                            <th scope="col" class="tw:lg:px-6 tw:px-3 tw:lg:py-3 tw:py-2">Faculty</th>
                            <th scope="col" class="tw:lg:px-6 tw:px-3 tw:lg:py-3 tw:py-2">Level</th>
                            <th scope="col" class="tw:lg:px-6 tw:px-3 tw:lg:py-3 tw:py-2 tw:rounded-tr-lg">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($results as $index => $result)
                            <tr  class="tw:bg-white tw:border-b">
                                <td class="tw:lg:px-3 tw:px-3 tw:lg:py-4 tw:py-2  tw:font-medium tw:text-gray-900 tw:whitespace-nowrap">{{ $index + 1 }}</td>
                                <td class="tw:lg:px-6 tw:px-3 tw:lg:py-4 tw:py-2 ">{{ $result['course_name'] }}</td>
                                <td class="tw:lg:px-6 tw:px-3 tw:lg:py-4 tw:py-2 ">{{ $result['category'] }}</td>
                                <td class="tw:lg:px-6 tw:px-3 tw:lg:py-4 tw:py-2 ">{{ $result['session'] }}</td>
                                <td class="tw:lg:px-6 tw:px-3 tw:lg:py-4 tw:py-2 ">{{ $result['semester'] }}</td>
                                <td class="tw:lg:px-6 tw:px-3 tw:lg:py-4 tw:py-2 ">{{ $result['department_name'] }}</td>
                                <td class="tw:lg:px-6 tw:px-3 tw:lg:py-4 tw:py-2 ">{{ $result['faculty_name'] }}</td>
                                <td class="tw:lg:px-6 tw:px-3 tw:lg:py-4 tw:py-2 ">{{ $result['level'] }}</td>
                                <td class="tw:lg:px-6 tw:px-3 tw:lg:py-4 tw:py-2 ">
                                    <a href="{{ $result['view'] }}"
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