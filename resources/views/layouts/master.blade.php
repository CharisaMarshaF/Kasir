{{-- @include('layouts.css')
    <!-- END: Head -->
    <body class="main">
        <!-- BEGIN: Mobile Menu -->
        @include('layouts.sidebar')
        <!-- END: Mobile Menu -->
        <!-- BEGIN: Top Bar -->
        @include('layouts.header')

        <!-- END: Top Bar -->
        <div class="wrapper">
            <div class="wrapper-box">
                <!-- BEGIN: Side Menu -->
                @include('layouts.nav')

                <!-- END: Side Menu -->
                <!-- BEGIN: Content -->
                <div class="content">
                    @yield('content')
                </div>
                <!-- END: Content -->
            </div>
        </div>
        <!-- BEGIN: Dark Mode Switcher-->
        
        <!-- END: Dark Mode Switcher-->

        <!-- BEGIN: JS Assets-->
@include('layouts.js')
<script>
    function preview(selector, temporaryFile, width = 200)  {
        $(selector).empty();
        $(selector).append(`<img src="${window.URL.createObjectURL(temporaryFile)}" width="${width}">`);
    }
</script>
@stack('scripts') --}}



@stack('css')

@include('layouts.css')


<body class="">
    @include('layouts.nav')
    <div class="main-content">
        @include('layouts.header')
        <!-- Header -->
        @yield('content')
    </div>

    @include('layouts.js')
    <script>
        function preview(selector, temporaryFile, width = 200) {
            $(selector).empty();
            $(selector).append(`<img src="${window.URL.createObjectURL(temporaryFile)}" width="${width}">`);
        }
    </script>
    @stack('scripts')