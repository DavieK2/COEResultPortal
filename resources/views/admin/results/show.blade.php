<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="./img/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/dashboard/css/style.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>COE Result Portal</title>
</head>

<body class="bg-gray-100">


    <!-- start navbar -->
    <div class="fixed tw:h-20 w-full top-0 z-20 flex flex-row flex-wrap items-center bg-white p-6 border-b border-gray-300">

        <!-- logo -->
        <div class="flex-none w-56 flex flex-row items-center">
            {{-- <img src="img/logo.png" class="w-10 flex-none"> --}}
            <strong class="capitalize ml-1 flex-1">Result Portal</strong>

            <button id="sliderBtn" class="flex-none text-right text-gray-900 hidden md:block">
                <i class="fad fa-list-ul"></i>
            </button>
        </div>
        <!-- end logo -->

        <!-- navbar content toggle -->
        <button id="navbarToggle" class="hidden md:block md:fixed right-0 mr-6">
            <i class="fad fa-chevron-double-down"></i>
        </button>
       
        <div id="navbar" class="animated md:hidden md:fixed md:top-0 md:w-full md:left-0 md:mt-16 md:border-t md:border-b md:border-gray-200 md:p-10 md:bg-white flex-1 pl-3 flex flex-row flex-wrap tw:justify-end items-center md:flex-col md:items-center">
            <div class="flex flex-row-reverse items-center">
                <div class="dropdown relative md:static">

                    <button class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center">
                       
                        <div class="ml-2 capitalize flex ">
                            <h1 class="text-sm text-gray-800 font-semibold m-0 p-0 leading-none">HOD</h1>
                            <i class="fad fa-chevron-down ml-2 text-xs leading-none"></i>
                        </div>
                    </button>

                    <button class="hidden fixed top-0 left-0 z-10 w-full h-full menu-overflow"></button>

                    <div class="text-gray-500 menu hidden md:mt-10 md:w-full rounded bg-white shadow-md absolute z-20 right-0 w-40 mt-5 py-2 animated faster">

                        <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out"
                            href="#">
                            <i class="fad fa-user-times text-xs mr-1"></i>
                            log out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end navbar -->

    <div id="sideBar"
        class="tw:md:fixed bg-white border-r border-gray-300 p-6 tw:w-40 z-30 tw:bottom-0 tw:h-[calc(100vh-5rem)] shadow-xl animated faster tw:overflow-y-auto">


        <!-- sidebar content -->
        <div class="flex flex-col">

            <!-- sidebar toggle -->
            <div class="text-right hidden md:block mb-4">
                <button id="sideBarHideBtn">
                    <i class="fad fa-times-circle"></i>
                </button>
            </div>
            <!-- end sidebar toggle -->

            <p class="uppercase text-xs text-gray-600 mb-4 tracking-wider">home</p>

            <!-- link -->
            <a href="/admin/results"
                class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500 tw:cursor-pointer">
                <i class="fad fa-chart-pie text-xs mr-2"></i>
                Results
            </a>
           

            {{-- <a href="./index-1.html"
                class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
                <i class="fad fa-shopping-cart text-xs mr-2"></i>
                ecommerce dashboard
            </a> --}}
           

        </div>

    </div>


    <!-- strat wrapper -->
    <div
        class="tw:h-[calc(100vh-5rem)] tw:fixed tw:md:right-0 tw:bottom-0 tw:overflow-y-auto tw:w-full tw:md:w-[calc(100vw-10rem)]">
        <div class="h-full flex flex-col flex-wrap">

            <div class="bg-gray-100 flex-1 p-6">

                <div class="tw:flex tw:flex-col tw:w-full">
                    <div class="card">

                        <div class="card-body">
                            <div class="flex tw:flex-col tw:space-y-3">
                                <div class="font-bold text-sm">Session: {{ $result_data->session  }}</div>
                                <div class="font-bold text-sm">Semester: {{ $result_data->semester  }}</div>
                                <div class="font-bold text-sm">Faculty: {{ $result_data->faculty_name  }}</div>
                                <div class="font-bold text-sm">Department: {{ $result_data->department_name  }}</div>
                                <div class="font-bold text-sm">Level: {{ $result_data->level  }}</div>
                                <div class="font-bold text-sm">Course: {{ $result_data->course_name  }}</div>
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
                </div>

            </div>
        </div>
    </div>

    <!-- end wrapper -->

    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{ asset('/assets/dashboard/js/scripts.js') }}"></script>
    <!-- end script -->

</body>

</html>
