        <!-- start header =====
        ============ -->
        <header class="header active">
            <div class="sub-header" style="background-image: url({{ url('web') }}/images/bg1.png);">
                <div class="main-container">
                    <div class="top-par">
                        <div class="logo">
                            <a href="{{ route('web.home') }}">
                                <img src="{{ asset('storage/' . getSetting('logo')) }}" alt="">
                            </a>
                        </div>

                        <div class="sub-top-par">

                            @auth
                                {{-- <div>{{ auth()->user()->fname . ' ' . auth()->user()->lname }}</div> --}}
                                <a href="{{ route('web.profile') }}" class="login"> {{ __('Profile') }} </a>
                                <a href="{{ route('web.logout') }}" class="login"> {{ __('Logout') }} </a>
                                @role('admin')
                                    <a href="{{ route('dashboard.home') }}" class="signin"> {{ __('Dashboard') }} </a>
                                    @elserole('employee')
                                    <a href="{{ route('dashboard.home') }}" class="signin"> {{ __('Dashboard') }} </a>
                                @endrole
                            @else
                                <a href="{{ route('web.login') }}" class="login"> {{ __('Login') }} </a>
                                <a href="{{ route('web.register') }}" class="signin"> {{ __('Register') }} </a>
                            @endauth
                            <div class="language">

                                @if (app()->getLocale() == 'ar')
                                    <a href="{{ route('language', 'en') }}"><i class="bi bi-globe"></i> en </a>
                                @else
                                    <a href="{{ route('language', 'ar') }}"><i class="bi bi-globe"></i> ع </a>
                                @endif

                            </div>

                            <div class="menu-div">
                                <div class="content" id="times-ican">
                                    <a href="#" title="Navigation menu" class="navicon" aria-label="Navigation">
                                        <span class="navicon__item"></span>
                                        <span class="navicon__item"></span>
                                        <span class="navicon__item"></span>
                                        <span class="navicon__item"></span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="title-page">
                        <h2>{!! getSetting('main_desc', app()->getLocale()) !!}</h2>
                    </div>


                    @include('web.includes.articles-search-field')

                </div>
            </div>


            <div class="element mr-section">
                <div class="main-container">
                    <div class="row">

                        @foreach ($homeSections as $section)
                            <div class="col-lg-2" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
                                <a href="{{ route('web.section-categories', $section->slug) }}">
                                    <div class="sub-element">
                                        <div class="img-element">
                                            <img src="{{ asset('storage/' . $section->img) }}" alt="">
                                        </div>
                                        <h2> {{ $section->name }} </h2>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                        <div class="col-lg-2" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
                            <a href="" id="menu-e">
                                <div class="sub-element">
                                    <div class="img-element">
                                        <img src="{{ url('web') }}/images/e6.png" alt="">
                                    </div>
                                    <h2>{{ __('All Categories') }}</h2>
                                </div>
                            </a>
                        </div>
                    </div>
                    @yield('paging')
                </div>
            </div>



        </header>
        <!-- end header =====
        ============== -->
