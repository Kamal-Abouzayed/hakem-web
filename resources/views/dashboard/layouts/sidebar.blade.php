<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <img src="{{ asset('storage/' . getSetting('logo')) }}" width="150px" alt="">
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @if (auth()->user()->hasRole('admin'))
        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ isActiveRoute('dashboard.home') }}">
            <a class="nav-link" href="{{ route('dashboard.home') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>لوحة التحكم</span></a>
        </li>

        {{-- <!-- Nav Item - Users -->
        <li
            class="nav-item {{ areActiveRoutes(['dashboard.users.index', 'dashboard.users.create', 'dashboard.users.edit']) }}">
            <a class="nav-link" href="{{ route('dashboard.users.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>المستخدمين</span></a>
        </li> --}}

        <!-- Nav Item - Contacts -->
        <li
            class="nav-item {{ areActiveRoutes(['dashboard.contacts.index', 'dashboard.contacts.create', 'dashboard.contacts.edit']) }}">
            <a class="nav-link" href="{{ route('dashboard.contacts.index') }}">
                <i class="fa-solid fa-message"></i>
                <span>رسائل التواصل</span></a>
        </li>

        <!-- Nav Item - Mail Lists -->
        <li
            class="nav-item {{ isActiveRoute('dashboard.mail.index') }}">
            <a class="nav-link" href="{{ route('dashboard.mail.index') }}">
                <i class="fa-solid fa-envelope"></i>
                <span>القائمة البريدية</span></a>
        </li>

        <!-- Nav Item - Settings -->
        <li class="nav-item {{ isActiveRoute('dashboard.settings.create') }}">
            <a class="nav-link" href="{{ route('dashboard.settings.create') }}">
                <i class="fas fa-fw fa-cogs"></i>
                <span>الإعدادات</span></a>
        </li>
    @endif


</ul>
<!-- End of Sidebar -->
