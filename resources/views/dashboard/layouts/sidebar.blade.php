<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <img src="{{ asset('storage/' . getSetting('logo')) }}" width="100px" alt="">
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ isActiveRoute('dashboard.home') }}">
        <a class="nav-link" href="{{ route('dashboard.home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>لوحة التحكم</span></a>
    </li>

    @if (auth()->user()->hasRole('admin'))
        <!-- Nav Item - Employees -->
        <li
            class="nav-item {{ areActiveRoutes(['dashboard.employees.index', 'dashboard.employees.create', 'dashboard.employees.edit']) }}">
            <a class="nav-link" href="{{ route('dashboard.employees.index') }}">
                <i class="fa-solid fa-users"></i>
                <span>الموظفين</span></a>
        </li>

        <!-- Nav Item - Users -->
        <li
            class="nav-item {{ areActiveRoutes(['dashboard.users.index', 'dashboard.users.create', 'dashboard.users.edit']) }}">
            <a class="nav-link" href="{{ route('dashboard.users.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>المستخدمين</span></a>
        </li>
        {{--
        <!-- Nav Item - Sections -->
        <li
            class="nav-item {{ areActiveRoutes(['dashboard.sections.index', 'dashboard.sections.create', 'dashboard.sections.edit']) }}">
            <a class="nav-link" href="{{ route('dashboard.sections.index') }}">
                <i class="fa-solid fa-cubes-stacked"></i>
                <span>الصفحات الرئيسية</span>
            </a>
        </li> --}}
    @endif

    @if (auth()->user()->hasPermissionTo('medicine_and_health'))
        <li
            class="nav-item {{ areActiveRoutes(['dashboard.categories.index', 'dashboard.categories.create', 'dashboard.categories.edit']) && request()->sectionSlug == 'medicine-and-health' ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse"
                data-target="#collapse-medicine-and-health" aria-expanded="true"
                aria-controls="collapse-medicine-and-health">
                <i class="fas fa-fw fa-folder"></i>
                <span>الطب و الصحة</span>
            </a>
            <div id="collapse-medicine-and-health"
                class="{{ request()->sectionSlug == 'medicine-and-health' ? 'collapse show' : 'collapse' }}"
                aria-labelledby="heading-medicine-and-health" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">الأقسام:</h6>
                    <a class="collapse-item {{ areActiveRoutes(['dashboard.categories.index', 'dashboard.categories.create', 'dashboard.categories.edit']) && request()->sectionSlug == 'medicine-and-health' ? 'active' : '' }}"
                        href="{{ route('dashboard.categories.index', 'medicine-and-health') }}">الأقسام</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">المقالات:</h6>
                    <a class="collapse-item {{ areActiveRoutes(['dashboard.articles.index', 'dashboard.articles.create', 'dashboard.articles.edit']) && request()->sectionSlug == 'medicine-and-health' ? 'active' : '' }}"
                        href="{{ route('dashboard.articles.index', 'medicine-and-health') }}">المقالات</a>
                    <h6 class="collapse-header">النصائح:</h6>
                    <a class="collapse-item {{ areActiveRoutes(['dashboard.advices.index', 'dashboard.advices.create', 'dashboard.advices.edit']) && request()->sectionSlug == 'medicine-and-health' ? 'active' : '' }}"
                        href="{{ route('dashboard.advices.index', 'medicine-and-health') }}">النصائح</a>
                </div>
            </div>
        </li>
    @endif

    @if (auth()->user()->hasPermissionTo('health_and_beauty'))
        <li
            class="nav-item {{ areActiveRoutes(['dashboard.categories.index', 'dashboard.categories.create', 'dashboard.categories.edit']) && request()->sectionSlug == 'medicine-and-health' ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse"
                data-target="#collapse-health-and-beauty" aria-expanded="true"
                aria-controls="collapse-health-and-beauty">
                <i class="fas fa-fw fa-folder"></i>
                <span>الصحة و الجمال</span>
            </a>
            <div id="collapse-health-and-beauty"
                class="{{ request()->sectionSlug == 'health-and-beauty' ? 'collapse show' : 'collapse' }}"
                aria-labelledby="heading-health-and-beauty" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">الأقسام:</h6>
                    <a class="collapse-item {{ areActiveRoutes(['dashboard.categories.index', 'dashboard.categories.create', 'dashboard.categories.edit']) && request()->sectionSlug == 'health-and-beauty' ? 'active' : '' }}"
                        href="{{ route('dashboard.categories.index', 'health-and-beauty') }}">الأقسام</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">المقالات:</h6>
                    <a class="collapse-item {{ areActiveRoutes(['dashboard.articles.index', 'dashboard.articles.create', 'dashboard.articles.edit']) && request()->sectionSlug == 'health-and-beauty' ? 'active' : '' }}"
                        href="{{ route('dashboard.articles.index', 'health-and-beauty') }}">المقالات</a>
                    <h6 class="collapse-header">النصائح:</h6>
                    <a class="collapse-item {{ areActiveRoutes(['dashboard.advices.index', 'dashboard.advices.create', 'dashboard.advices.edit']) && request()->sectionSlug == 'health-and-beauty' ? 'active' : '' }}"
                        href="{{ route('dashboard.advices.index', 'health-and-beauty') }}">النصائح</a>
                </div>
            </div>
        </li>
    @endif

    @if (auth()->user()->hasPermissionTo('pregnancy_and_birth'))
        <li
            class="nav-item {{ areActiveRoutes(['dashboard.categories.index', 'dashboard.categories.create', 'dashboard.categories.edit']) && request()->sectionSlug == 'medicine-and-health' ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse"
                data-target="#collapse-pregnancy-and-birth" aria-expanded="true"
                aria-controls="collapse-pregnancy-and-birth">
                <i class="fas fa-fw fa-folder"></i>
                <span>الحمل و الولادة</span>
            </a>
            <div id="collapse-pregnancy-and-birth"
                class="{{ request()->sectionSlug == 'pregnancy-and-birth' ? 'collapse show' : 'collapse' }}"
                aria-labelledby="heading-pregnancy-and-birth" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">الأقسام:</h6>
                    <a class="collapse-item {{ areActiveRoutes(['dashboard.categories.index', 'dashboard.categories.create', 'dashboard.categories.edit']) && request()->sectionSlug == 'pregnancy-and-birth' ? 'active' : '' }}"
                        href="{{ route('dashboard.categories.index', 'pregnancy-and-birth') }}">الأقسام</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">المقالات:</h6>
                    <a class="collapse-item {{ areActiveRoutes(['dashboard.articles.index', 'dashboard.articles.create', 'dashboard.articles.edit']) && request()->sectionSlug == 'pregnancy-and-birth' ? 'active' : '' }}"
                        href="{{ route('dashboard.articles.index', 'pregnancy-and-birth') }}">المقالات</a>
                    <h6 class="collapse-header">النصائح:</h6>
                    <a class="collapse-item {{ areActiveRoutes(['dashboard.advices.index', 'dashboard.advices.create', 'dashboard.advices.edit']) && request()->sectionSlug == 'pregnancy-and-birth' ? 'active' : '' }}"
                        href="{{ route('dashboard.advices.index', 'pregnancy-and-birth') }}">النصائح</a>
                </div>
            </div>
        </li>
    @endif

    @if (auth()->user()->hasPermissionTo('diseases'))
        <li
            class="nav-item {{ areActiveRoutes(['dashboard.categories.index', 'dashboard.categories.create', 'dashboard.categories.edit']) && request()->sectionSlug == 'medicine-and-health' ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-diseases"
                aria-expanded="true" aria-controls="collapse-diseases">
                <i class="fas fa-fw fa-folder"></i>
                <span>الأمراض</span>
            </a>
            <div id="collapse-diseases"
                class="{{ request()->sectionSlug == 'diseases' ? 'collapse show' : 'collapse' }}"
                aria-labelledby="heading-diseases" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">الأقسام:</h6>
                    <a class="collapse-item {{ areActiveRoutes(['dashboard.categories.index', 'dashboard.categories.create', 'dashboard.categories.edit']) && request()->sectionSlug == 'diseases' ? 'active' : '' }}"
                        href="{{ route('dashboard.categories.index', 'diseases') }}">الأقسام</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">المقالات:</h6>
                    <a class="collapse-item {{ areActiveRoutes(['dashboard.articles.index', 'dashboard.articles.create', 'dashboard.articles.edit']) && request()->sectionSlug == 'diseases' ? 'active' : '' }}"
                        href="{{ route('dashboard.articles.index', 'diseases') }}">المقالات</a>
                    <h6 class="collapse-header">النصائح:</h6>
                    <a class="collapse-item {{ areActiveRoutes(['dashboard.advices.index', 'dashboard.advices.create', 'dashboard.advices.edit']) && request()->sectionSlug == 'diseases' ? 'active' : '' }}"
                        href="{{ route('dashboard.advices.index', 'diseases') }}">النصائح</a>
                </div>
            </div>
        </li>
    @endif

    @if (auth()->user()->hasPermissionTo('medicines'))
        <li
            class="nav-item {{ areActiveRoutes(['dashboard.categories.index', 'dashboard.categories.create', 'dashboard.categories.edit']) && request()->sectionSlug == 'medicine-and-health' ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-medicines"
                aria-expanded="true" aria-controls="collapse-medicines">
                <i class="fas fa-fw fa-folder"></i>
                <span>الأدوية</span>
            </a>
            <div id="collapse-medicines"
                class="{{ request()->sectionSlug == 'medicines' ? 'collapse show' : 'collapse' }}"
                aria-labelledby="heading-medicines" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">الأقسام:</h6>
                    <a class="collapse-item {{ areActiveRoutes(['dashboard.categories.index', 'dashboard.categories.create', 'dashboard.categories.edit']) && request()->sectionSlug == 'medicines' ? 'active' : '' }}"
                        href="{{ route('dashboard.categories.index', 'medicines') }}">الأقسام</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">المقالات:</h6>
                    <a class="collapse-item {{ areActiveRoutes(['dashboard.articles.index', 'dashboard.articles.create', 'dashboard.articles.edit']) && request()->sectionSlug == 'medicines' ? 'active' : '' }}"
                        href="{{ route('dashboard.articles.index', 'medicines') }}">المقالات</a>
                    <h6 class="collapse-header">النصائح:</h6>
                    <a class="collapse-item {{ areActiveRoutes(['dashboard.advices.index', 'dashboard.advices.create', 'dashboard.advices.edit']) && request()->sectionSlug == 'medicines' ? 'active' : '' }}"
                        href="{{ route('dashboard.advices.index', 'medicines') }}">النصائح</a>
                </div>
            </div>
        </li>
    @endif

    @if (auth()->user()->hasPermissionTo('calories'))
        <li
            class="nav-item {{ areActiveRoutes(['dashboard.categories.index', 'dashboard.categories.create', 'dashboard.categories.edit']) && request()->sectionSlug == 'medicine-and-health' ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-calories"
                aria-expanded="true" aria-controls="collapse-calories">
                <i class="fas fa-fw fa-folder"></i>
                <span>السعرات الحرارية</span>
            </a>
            <div id="collapse-calories"
                class="{{ request()->sectionSlug == 'calories' ? 'collapse show' : 'collapse' }}"
                aria-labelledby="heading-calories" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">الأقسام:</h6>
                    <a class="collapse-item {{ areActiveRoutes(['dashboard.categories.index', 'dashboard.categories.create', 'dashboard.categories.edit']) && request()->sectionSlug == 'calories' ? 'active' : '' }}"
                        href="{{ route('dashboard.categories.index', 'calories') }}">الأقسام</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">المقالات:</h6>
                    <a class="collapse-item {{ areActiveRoutes(['dashboard.articles.index', 'dashboard.articles.create', 'dashboard.articles.edit']) && request()->sectionSlug == 'calories' ? 'active' : '' }}"
                        href="{{ route('dashboard.articles.index', 'calories') }}">المقالات</a>
                    <h6 class="collapse-header">النصائح:</h6>
                    <a class="collapse-item {{ areActiveRoutes(['dashboard.advices.index', 'dashboard.advices.create', 'dashboard.advices.edit']) && request()->sectionSlug == 'calories' ? 'active' : '' }}"
                        href="{{ route('dashboard.advices.index', 'calories') }}">النصائح</a>
                </div>
            </div>
        </li>
    @endif

    @if (auth()->user()->hasPermissionTo('checkups'))
        <!-- Nav Item - BodySystems -->
        <li
            class="nav-item {{ areActiveRoutes(['dashboard.checkups.index', 'dashboard.checkups.create', 'dashboard.checkups.edit']) }}">
            <a class="nav-link" href="{{ route('dashboard.checkups.index') }}">
                <i class="fa-solid fa-hand-holding-medical"></i>
                <span>الفحوصات</span>
            </a>
        </li>
    @endif

    @if (auth()->user()->hasPermissionTo('vaccinations'))
        <!-- Nav Item - BodySystems -->
        <li
            class="nav-item {{ areActiveRoutes(['dashboard.vaccinations.index', 'dashboard.vaccinations.create', 'dashboard.vaccinations.edit']) }}">
            <a class="nav-link" href="{{ route('dashboard.vaccinations.index') }}">
                <i class="fa-solid fa-syringe"></i>
                <span>التطعيمات</span>
            </a>
        </li>
    @endif

    @if (auth()->user()->hasPermissionTo('body_system'))
        <!-- Nav Item - BodySystems -->
        <li
            class="nav-item {{ areActiveRoutes(['dashboard.body-systems.index', 'dashboard.body-systems.create', 'dashboard.body-systems.edit']) }}">
            <a class="nav-link" href="{{ route('dashboard.body-systems.index') }}">
                <i class="fa-solid fa-x-ray"></i>
                <span>أجهزة جسم الإنسان</span>
            </a>
        </li>
    @endif

    @if (auth()->user()->hasPermissionTo('organs'))
        <!-- Nav Item - Organ -->
        <li
            class="nav-item {{ areActiveRoutes(['dashboard.organs.index', 'dashboard.organs.create', 'dashboard.organs.edit']) }}">
            <a class="nav-link" href="{{ route('dashboard.organs.index') }}">
                <i class="fa-solid fa-lungs"></i>
                <span>أعضاء الجسم</span>
            </a>
        </li>
    @endif

    @if (auth()->user()->hasPermissionTo('pergnancy_stages'))
        <!-- Nav Item - Pregnancy Stages -->
        <li
            class="nav-item {{ areActiveRoutes(['dashboard.pregnancy-stages.index', 'dashboard.pregnancy-stages.create', 'dashboard.pregnancy-stages.edit']) }}">
            <a class="nav-link" href="{{ route('dashboard.pregnancy-stages.index') }}">
                <i class="fa-solid fa-baby"></i>
                <span>مراحل الحمل</span>
            </a>
        </li>
    @endif

    @if (auth()->user()->hasPermissionTo('videos'))
        <!-- Nav Item - Videos -->
        <li
            class="nav-item {{ areActiveRoutes(['dashboard.videos.index', 'dashboard.videos.create', 'dashboard.videos.edit']) }}">
            <a class="nav-link" href="{{ route('dashboard.videos.index') }}">
                <i class="fa-solid fa-video"></i>
                <span>الفيديوهات</span>
            </a>
        </li>
    @endif

    {{--         <!-- Nav Item - Images -->
        <li
            class="nav-item {{ areActiveRoutes(['dashboard.images.index', 'dashboard.images.create', 'dashboard.images.edit']) }}">
            <a class="nav-link" href="{{ route('dashboard.images.index') }}">
                <i class="fa-solid fa-images"></i>
                <span>معرض الصور</span>
            </a>
        </li> --}}

    @if (auth()->user()->hasPermissionTo('ads'))
        <!-- Nav Item - Ads -->
        <li
            class="nav-item {{ areActiveRoutes(['dashboard.ads.index', 'dashboard.ads.create', 'dashboard.ads.edit']) }}">
            <a class="nav-link" href="{{ route('dashboard.ads.index') }}">
                <i class="fa-solid fa-rectangle-ad"></i>
                <span>الإعلانات</span>
            </a>
        </li>
    @endif

    @if (auth()->user()->hasPermissionTo('faqs'))
        <!-- Nav Item - Ads -->
        <li
            class="nav-item {{ areActiveRoutes(['dashboard.faqs.index', 'dashboard.faqs.create', 'dashboard.faqs.edit']) }}">
            <a class="nav-link" href="{{ route('dashboard.faqs.index') }}">
                <i class="fa-solid fa-question"></i>
                <span>الأسئلة الشائعة</span>
            </a>
        </li>
    @endif

    @if (auth()->user()->hasPermissionTo('contacts'))
        <!-- Nav Item - Contacts -->
        <li
            class="nav-item {{ areActiveRoutes(['dashboard.contacts.index', 'dashboard.contacts.create', 'dashboard.contacts.edit']) }}">
            <a class="nav-link" href="{{ route('dashboard.contacts.index') }}">
                <i class="fa-solid fa-message"></i>
                <span>رسائل التواصل</span></a>
        </li>
    @endif

    {{-- <!-- Nav Item - Mail Lists -->
        <li class="nav-item {{ isActiveRoute('dashboard.mail.index') }}">
            <a class="nav-link" href="{{ route('dashboard.mail.index') }}">
                <i class="fa-solid fa-envelope"></i>
                <span>القائمة البريدية</span></a>
        </li> --}}

    @if (auth()->user()->hasPermissionTo('settings'))
        <!-- Nav Item - Settings -->
        <li class="nav-item {{ isActiveRoute('dashboard.settings.create') }}">
            <a class="nav-link" href="{{ route('dashboard.settings.create') }}">
                <i class="fas fa-fw fa-cogs"></i>
                <span>الإعدادات</span></a>
        </li>
    @endif




    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
