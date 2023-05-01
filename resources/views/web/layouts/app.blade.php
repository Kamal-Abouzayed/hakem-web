@include('web.layouts.header')
<!-- start app ====
        ===============================
        ================================
        ============== --
        -->

<main id="app" class="{{ Route::currentRouteName() != 'web.home' ? 'pg-section' : '' }}">
    @yield('content')
</main>

<!-- end app ====
        =============================
        ==================================
        ==================== -->
@include('web.layouts.footer')
