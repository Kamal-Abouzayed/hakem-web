@extends('web.layouts.app')

@section('paging')
    <div class="navigation-header">
        <a href="{{ route('web.home') }}"> <i class="bi bi-house-door"></i> {{ __('Home') }} </a>
        <i class="bi bi-chevron-double-left"></i>
        <span>{{ __('All calculators') }} </span>
    </div>
@endsection

@section('content')
    <!-- start all-calculators  ===== -->
    <section class="all-calculators">
        <div class="main-container">
            <div class="title-start">
                <h2>{{ __('All calculators') }} </h2>
                <span></span>
            </div>

            {{-- <div class="search-two">
                <div class="search-header">
                    <form action="">
                        <input type="text" placeholder=" ابحث في الحاسبات الطبية .." class="form-control">
                        <button><img src="images/search.jpg" alt=""></button>
                    </form>
                </div>
            </div> --}}


            <div class="main-calculators">
                <div class="main-container">
                    <div class="row">

                        <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
                            <a href="{{ route('web.calorie-calculator') }}">
                                <div class="sub-calculators">
                                    <div class="img-sub-calculators">
                                        <img src="{{ url('web') }}/images/calorie.jpg"
                                            alt="{{ __('Calculate the calorie level you need') }}">
                                    </div>
                                    <div class="text-sub-calculators">
                                        <h2>{{ __('Calculate the calorie level you need') }}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
                            <a href="{{ route('web.calorie-burn-calculator') }}">
                                <div class="sub-calculators">
                                    <div class="img-sub-calculators">
                                        <img src="{{ url('web') }}/images/calorie-burn.jpg"
                                            alt="{{ __('Calorie burn calculator') }}">
                                    </div>
                                    <div class="text-sub-calculators">
                                        <h2>{{ __('Calorie burn calculator') }}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
                            <a href="{{ route('web.bmi-calculator') }}">
                                <div class="sub-calculators">
                                    <div class="img-sub-calculators">
                                        <img src="{{ url('web') }}/images/bmi.jpg"
                                            alt="{{ __('Body Mass Index (BMI) Calculator') }}">
                                    </div>
                                    <div class="text-sub-calculators">
                                        <h2>{{ __('Body Mass Index (BMI) Calculator') }}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
                            <a href="{{ route('web.pregnancy-calculator') }}">
                                <div class="sub-calculators">
                                    <div class="img-sub-calculators">
                                        <img src="{{ url('web') }}/images/pregnancy.jpg"
                                            alt="{{ __('Date Of Birth') }}">
                                    </div>
                                    <div class="text-sub-calculators">
                                        <h2>{{ __('Date Of Birth') }}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
                            <a href="{{ route('web.heart-rate-calculator') }}">
                                <div class="sub-calculators">
                                    <div class="img-sub-calculators">
                                        <img src="{{ url('web') }}/images/heart-rate.jpg"
                                            alt="{{ __('Preferred heart rate calculator') }}">
                                    </div>
                                    <div class="text-sub-calculators">
                                        <h2>{{ __('Preferred heart rate calculator') }}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
                            <a href="{{ route('web.heart-rate-calculator') }}">
                                <div class="sub-calculators">
                                    <div class="img-sub-calculators">
                                        <img src="{{ url('web') }}/images/OvulationTool.jpg"
                                            alt="{{ __('Ovulation period') }}">
                                    </div>
                                    <div class="text-sub-calculators">
                                        <h2>{{ __('Ovulation period') }}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
                            <a href="{{ route('web.heart-rate-calculator') }}">
                                <div class="sub-calculators">
                                    <div class="img-sub-calculators">
                                        <img src="{{ url('web') }}/images/baby_development.jpg"
                                            alt="{{ __('Baby Development') }}">
                                    </div>
                                    <div class="text-sub-calculators">
                                        <h2>{{ __('Baby Development') }}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
                            <a href="{{ route('web.heart-rate-calculator') }}">
                                <div class="sub-calculators">
                                    <div class="img-sub-calculators">
                                        <img src="{{ url('web') }}/images/KidGrowth.jpg"
                                            alt="{{ __('Baby growth calculator') }}">
                                    </div>
                                    <div class="text-sub-calculators">
                                        <h2>{{ __('Baby growth calculator') }}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>




        </div>
    </section>

    <!-- end all-calculators  ===== -->
@endsection
