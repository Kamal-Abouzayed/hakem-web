@extends('web.layouts.app')

@section('paging')
    <div class="navigation-header">
        <a href="{{ route('web.home') }}"> <i class="bi bi-house-door"></i> {{ __('Home') }} </a>
        <i class="bi bi-chevron-double-left"></i>
        <span>{{ $pageTitle }} </span>
    </div>
@endsection

@section('content')
    <section class="medicine-health">
        <div class="main-container">
            <div class="title-start">
                <h2>{{ $pageTitle }}</h2>
                <span></span>
            </div>


            {{-- @include('web.includes.calories-search-field') --}}



            <div class="main-calories">
                <div class="row">
                    @foreach ($vaccinations as $vaccination)
                        <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
                            <a href="{{ route('web.vaccination-details', $vaccination->slug) }}">
                                <div class="sub-health-beaut">
                                    <div class="img-health-beaut">
                                        <img src="{{ asset('storage/' . $vaccination->img) }}"
                                            alt="{{ $vaccination->name }}">
                                    </div>
                                    <div class="text-health-beaut">
                                        <h2>{{ $vaccination->name }}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
