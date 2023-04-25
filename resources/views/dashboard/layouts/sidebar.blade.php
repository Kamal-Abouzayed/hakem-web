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

        <!-- Nav Item - Sections -->
        <li
            class="nav-item {{ areActiveRoutes(['dashboard.sections.index', 'dashboard.sections.create', 'dashboard.sections.edit']) }}">
            <a class="nav-link" href="{{ route('dashboard.sections.index') }}">
                <i class="fa-solid fa-cubes-stacked"></i>
                <span>الصفحات الرئيسية</span>
            </a>
        </li>

        @foreach ($sections as $section)
            <li
                class="nav-item {{ areActiveRoutes(['dashboard.categories.index', 'dashboard.categories.create', 'dashboard.categories.edit', 'dashboard.sub-categories.index', 'dashboard.sub-categories.create', 'dashboard.sub-categories.edit']) && request()->sectionSlug == $section->slug ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse"
                    data-target="#collapse-{{ $section->slug }}" aria-expanded="true"
                    aria-controls="collapse-{{ $section->slug }}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>{{ $section->name }}</span>
                </a>
                <div id="collapse-{{ $section->slug }}"
                    class="{{ request()->sectionSlug == $section->slug ? 'collapse show' : 'collapse' }}"
                    aria-labelledby="heading-{{ $section->slug }}" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">الأقسام:</h6>
                        <a class="collapse-item {{ areActiveRoutes(['dashboard.categories.index', 'dashboard.categories.create', 'dashboard.categories.edit']) && request()->sectionSlug == $section->slug ? 'active' : '' }}"
                            href="{{ route('dashboard.categories.index', $section->slug) }}">الأقسام
                            الرئيسية</a>
                        <a class="collapse-item {{ areActiveRoutes(['dashboard.sub-categories.index', 'dashboard.sub-categories.create', 'dashboard.sub-categories.edit']) && request()->sectionSlug == $section->slug ? 'active' : '' }}"
                            href="{{ route('dashboard.sub-categories.index', $section->slug) }}">الأقسام الفرعية</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">المقالات:</h6>
                        <a class="collapse-item {{ areActiveRoutes(['dashboard.articles.index', 'dashboard.articles.create', 'dashboard.articles.edit']) && request()->sectionSlug == $section->slug ? 'active' : '' }}"
                            href="{{ route('dashboard.articles.index', $section->slug) }}">المقالات</a>
                    </div>
                </div>
            </li>
        @endforeach

        <!-- Nav Item - BodySystems -->
        <li
            class="nav-item {{ areActiveRoutes(['dashboard.body-systems.index', 'dashboard.body-systems.create', 'dashboard.body-systems.edit']) }}">
            <a class="nav-link" href="{{ route('dashboard.body-systems.index') }}">
                <i class="fa-solid fa-x-ray"></i>
                <span>أجهزة جسم الإنسان</span>
            </a>
        </li>

        <!-- Nav Item - Organ -->
        <li
            class="nav-item {{ areActiveRoutes(['dashboard.organs.index', 'dashboard.organs.create', 'dashboard.organs.edit']) }}">
            <a class="nav-link" href="{{ route('dashboard.organs.index') }}">
                <i class="fa-solid fa-lungs"></i>
                <span>أعضاء الجسم</span>
            </a>
        </li>

        <!-- Nav Item - Ads -->
        <li
            class="nav-item {{ areActiveRoutes(['dashboard.ads.index', 'dashboard.ads.create', 'dashboard.ads.edit']) }}">
            <a class="nav-link" href="{{ route('dashboard.ads.index') }}">
                <i class="fa-solid fa-rectangle-ad"></i>
                <span>الإعلانات</span>
            </a>
        </li>

        <!-- Nav Item - Contacts -->
        <li
            class="nav-item {{ areActiveRoutes(['dashboard.contacts.index', 'dashboard.contacts.create', 'dashboard.contacts.edit']) }}">
            <a class="nav-link" href="{{ route('dashboard.contacts.index') }}">
                <i class="fa-solid fa-message"></i>
                <span>رسائل التواصل</span></a>
        </li>

        <!-- Nav Item - Mail Lists -->
        <li class="nav-item {{ isActiveRoute('dashboard.mail.index') }}">
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
