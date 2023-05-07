@extends('web.layouts.app')

@section('paging')
    <div class="navigation-header">
        <a href="{{ route('web.home') }}"> <i class="bi bi-house-door"></i> {{ __('Home') }} </a>
        <i class="bi bi-chevron-double-left"></i>
        <span>{{ $pageTitle }} </span>
    </div>
@endsection

@section('content')
    <section class="aboutus">
        <div class="main-container">
            <div class="title-start">
                <h2>{{ $pageTitle }} </h2>
                <span></span>
            </div>

            <div class="img-aboutus">
                <img src="{{ url('web') }}/images/bg1.png" alt="">
            </div>
            <div class="text-details">
                {!! getSetting('about', app()->getLocale()) !!}
            </div>

        </div>
    </section>
@endsection
