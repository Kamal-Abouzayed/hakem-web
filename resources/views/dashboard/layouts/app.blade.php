@include('dashboard.layouts.header')


<!-- Main Content -->
<div id="content">

    @include('dashboard.layouts.navbar')

    <div class="container-fluid">
        @yield('content')
    </div>
</div>
<!-- End of Main Content -->

@include('dashboard.layouts.footer')
