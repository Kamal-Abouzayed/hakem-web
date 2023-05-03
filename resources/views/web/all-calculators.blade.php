@extends('web.layouts.app')

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
                        <button><img src="images/search.png" alt=""></button>
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
                                        <img src="{{ url('web') }}/images/b10.png" alt="{{ __('Calorie calculator') }}">
                                    </div>
                                    <div class="text-sub-calculators">
                                        <h2>{{ __('Calorie calculator') }}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
                            <a href="{{ route('web.calorie-burn-calculator') }}">
                                <div class="sub-calculators">
                                    <div class="img-sub-calculators">
                                        <img src="{{ url('web') }}/images/b10.png" alt="{{ __('Calorie Burn calculator') }}">
                                    </div>
                                    <div class="text-sub-calculators">
                                        <h2>{{ __('Calorie Burn calculator') }}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
                            <a href="{{ route('web.bmi-calculator') }}">
                                <div class="sub-calculators">
                                    <div class="img-sub-calculators">
                                        <img src="{{ url('web') }}/images/b10.png" alt="{{ __('Bmi calculator') }}">
                                    </div>
                                    <div class="text-sub-calculators">
                                        <h2>{{ __('Bmi calculator') }}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
                            <a href="{{ route('web.pregnancy-calculator') }}">
                                <div class="sub-calculators">
                                    <div class="img-sub-calculators">
                                        <img src="{{ url('web') }}/images/b10.png"
                                            alt="{{ __('Calorie calculator') }}">
                                    </div>
                                    <div class="text-sub-calculators">
                                        <h2>{{ __('Pregnancy calculator') }}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
                            <a href="{{ route('web.heart-rate-calculator') }}">
                                <div class="sub-calculators">
                                    <div class="img-sub-calculators">
                                        <img src="{{ url('web') }}/images/b10.png"
                                            alt="{{ __('Heart Rate calculator') }}">
                                    </div>
                                    <div class="text-sub-calculators">
                                        <h2>{{ __('Heart Rate calculator') }}</h2>
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
