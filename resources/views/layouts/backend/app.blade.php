<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{asset('assets/admin/fonts/feather/feather.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/libs/highlight.js/styles/vs2015.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/libs/quill/dist/quill.core.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/libs/dataTables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/libs/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/libs/flatpickr/dist/flatpickr.min.css')}}">

    <!-- Theme CSS -->

    <link rel="stylesheet" href="{{asset('assets/admin/css/theme.min.css')}}" id="stylesheetLight">

    <link rel="stylesheet" href="{{asset('assets/admin/css/theme-dark.min.css')}}" id="stylesheetDark">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.css') }}">

    @stack('css')
    <style>
        body {
            display: none;
        }
    </style>

    <script>
        var colorScheme = (localStorage.getItem('dashkitColorScheme')) ? localStorage.getItem('dashkitColorScheme') : 'light';
    </script>


    <title>Passward</title>
</head>

<body>
    {{-- Include Notifications Panel --}}
    @include('layouts.backend.notifications')
    {{-- Include Sidebar --}}
    @include('layouts.backend.sidebar')

    {{-- Create Sidebar --}}
    @yield('content')

    <!-- JAVASCRIPT
    ================================================== -->
    <!-- Libs JS -->
    <script src="{{asset('assets/admin/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/admin/libs/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('assets/admin/libs/chart.js/Chart.extension.min.js')}}"></script>
    <script src="{{asset('assets/admin/libs/highlightjs/highlight.pack.min.js')}}"></script>
    <script src="{{asset('assets/admin/libs/flatpickr/dist/flatpickr.min.js')}}"></script>
    <script src="{{asset('assets/admin/libs/jquery-mask-plugin/dist/jquery.mask.min.js')}}"></script>
    <script src="{{asset('assets/admin/libs/list.js/dist/list.min.js')}}"></script>
    <script src="{{asset('assets/admin/libs/quill/dist/quill.min.js')}}"></script>
    <script src="{{asset('assets/admin/libs/dropzone/dist/min/dropzone.min.js')}}"></script>
    <script src="{{asset('assets/admin/libs/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/admin/libs/dataTables/datatables.min.js')}}"></script>

    <!-- Theme JS -->
    <script src="{{asset('assets/admin/js/theme.min.js')}}"></script>

    <script src="{{ asset('assets/admin/js/custom.js')}}"></script>
    <script src="{{ asset('assets/admin/js/toastr.js')}}"></script>

    @stack('scripts')

</body>

</html>
