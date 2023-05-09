@extends('web.layouts.app')

@section('paging')
    <div class="navigation-header">
        <a href="{{ route('web.home') }}"> <i class="bi bi-house-door"></i> {{ __('Home') }} </a>
        <i class="bi bi-chevron-double-left"></i>
        <span>{{ $section->name }} </span>
    </div>
@endsection

@section('content')
    <section
        class="medicine-health {{ $section->slug == 'pregnancy-and-birth' ? 'pregnancy-section' : ($section->slug == 'medicine-and-health' ? 'health-section' : ($section->slug == 'health-and-beauty' ? 'beauty-section' : ($section->slug == 'diseases' ? 'disease-section' : ($section->slug == 'medicines' ? 'medicine-section' : 'calories-section')))) }}">
        <div class="main-container">
            <div class="title-start">
                <h2>{{ $section->name }}</h2>
                <span></span>
            </div>

            @if ($section->slug == 'calories')
                @include('web.includes.calories-search-field')

                <div class="main-calories">
                    <div class="title-main-calories">
                        <h2> <img src="images/arrow.png" alt=""> {{ __('Categories of nutrients') }} : </h2>
                    </div>
                    <div class="row">
                        @foreach ($categories as $category)
                            <div class="col-lg-4 col-sm-6">
                                <div class="sub-calories">
                                    <a
                                        href="{{ route('web.category-details', ['sectionSlug' => request()->sectionSlug, 'slug' => $category->slug]) }}">
                                        {{ $category->name }} </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="main-medicine-health">
                    <div class="row">

                        @foreach ($categories as $category)
                            <div class="col-lg-3"
                                data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
                                <a
                                    href="{{ route('web.category-details', ['sectionSlug' => request()->sectionSlug, 'slug' => $category->slug]) }}">
                                    <div class="sub-medicine-health">
                                        <img src="{{ asset('storage/' . $category->img) }}" alt="{{ $category->name }}">
                                        <div class="text-medicine-health">
                                            <h2> {{ $category->name }} </h2>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            @endif



            @if ($section->slug == 'medicine-and-health')
                @include('web.includes.human-body')
            @elseif ($section->slug == 'pregnancy-and-birth')
                <div class="clac-section mr-section">
                    <div class="title-start">
                        <h2>{{ __('Pregnancy calculators') }}</h2>
                        <span></span>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <a href="{{ route('web.pregnancy-calculator') }}">
                                <div class="sub-clac-section">
                                    <div class="img-clac-section">
                                        <img src="{{ url('web') }}/images/trolley.png" alt="" />
                                    </div>
                                    <h2> {{ __('Date Of Birth') }} </h2>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="{{ route('web.ovulation-period-calculator') }}">
                                <div class="sub-clac-section">
                                    <div class="img-clac-section">
                                        <img src="{{ url('web') }}/images/stopwatch.png" alt="" />
                                    </div>
                                    <h2> {{ __('Ovulation period') }} </h2>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-3">
                            <a href="{{ route('web.baby-development-calculator') }}">
                                <div class="sub-clac-section">
                                    <div class="img-clac-section">
                                        <img src="{{ url('web') }}/images/baby-boy.png" alt="" />
                                    </div>
                                    <h2> {{ __('Baby Development') }} </h2>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-3">
                            <a href="{{ route('web.baby-growth-calculator') }}">
                                <div class="sub-clac-section">
                                    <div class="img-clac-section">
                                        <img src="{{ url('web') }}/images/toys.png" alt="" />
                                    </div>
                                    <h2> {{ __('Baby growth calculator') }} </h2>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-12">

                            <div class="all-calc-btn">

                                <a href="{{ route('web.all-calculators') }}"> {{ __('All calculators') }} <i
                                        class="bi bi-chevron-left"></i> </a>
                            </div>

                        </div>
                    </div>
                </div>

                @include('web.includes.pregnancy-stages')
            @elseif ($section->slug == 'health-and-beauty')
                <div class="clac-section mr-section health-calcs">
                    <div class="title-start">
                        <h2>{{ __('Health Calculators') }}</h2>
                        <span></span>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <a href="{{ route('web.bmi-calculator') }}">
                                <div class="sub-clac-section">
                                    <div class="img-clac-section">
                                        <img src="{{ url('web') }}/images/weight.png" alt="" />
                                    </div>
                                    <h2> {{ __('Body Mass Index (BMI) Calculator') }} </h2>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="{{ route('web.calorie-calculator') }}">
                                <div class="sub-clac-section">
                                    <div class="img-clac-section">
                                        <img src="{{ url('web') }}/images/calories-calculator.png" alt="" />
                                    </div>
                                    <h2> {{ __('Calculate the calorie level you need') }} </h2>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-3">
                            <a href="{{ route('web.heart-rate-calculator') }}">
                                <div class="sub-clac-section">
                                    <div class="img-clac-section">
                                        <img src="{{ url('web') }}/images/stopwatch-heart.png" alt="" />
                                    </div>
                                    <h2> {{ __('Preferred heart rate calculator') }} </h2>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-3">
                            <a href="{{ route('web.calorie-burn-calculator') }}">
                                <div class="sub-clac-section">
                                    <div class="img-clac-section">
                                        <img src="{{ url('web') }}/images/cutlery.png" alt="" />
                                    </div>
                                    <h2> {{ __('Calorie burn calculator') }} </h2>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-12">

                            <div class="all-calc-btn">

                                <a href="{{ route('web.all-calculators') }}"> {{ __('All calculators') }} <i
                                        class="bi bi-chevron-left"></i> </a>
                            </div>

                        </div>
                    </div>
                </div>
            @endif

        </div>
    </section>
@endsection
