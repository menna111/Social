
<!doctype html>
<html lang="en">

@include('backend.layout.header')
<body class="dark-edition">
<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="./assets/img/sidebar-2.jpg">
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                Creative Tim
            </a>
        </div>
        @include('backend.layout.sidebar')
    </div>
    <div class="main-panel">
        <!-- Navbar -->
    @include('backend.layout.navbar')

    <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <!-- your content here -->
                @yield('content')
            </div>
        </div>
{{--        @include('backend.layout.footer')--}}

    </div>
</div>

<!--   Core JS Files   -->
@include('backend.layout.scripts')

</body>
</html>
