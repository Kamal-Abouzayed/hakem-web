        <!-- start header =====
        ============ -->
        <header class="header active">
            <div class="sub-header" style="background-image: url({{ url('web') }}/images/bg1.png);">
                <div class="main-container">
                    <div class="top-par">
                        <div class="logo">
                            <a href="index.html">
                                <img src="{{ asset('storage/' . getSetting('logo')) }}" alt="">
                            </a>
                        </div>

                        <div class="sub-top-par">
                            <a href="login.html" class="login"> دخول </a>
                            <a href="register.html" class="signin"> تسجيل </a>
                            <div class="language">
                                <a href=""><i class="bi bi-globe"></i> ع </a>
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
                        <h2> , {{ __('Welcome to the Hakeem Web site') }} <br>
                            {{ __('All the information that you can trust') }} .</h2>
                    </div>


                    <div class="search-header">
                        <form action="">
                            <input type="text" placeholder=" ابحث هنا .." class="form-control">
                            <button><img src="{{ url('web') }}/images/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>


            <div class="element mr-section">
                <div class="main-container">
                    <div class="row">

                        @foreach ($homeSections as $section)
                            <div class="col-lg-2" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
                                <a href="medicine-health.html">
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
                </div>
            </div>

        </header>
        <!-- end header =====
        ============== -->
