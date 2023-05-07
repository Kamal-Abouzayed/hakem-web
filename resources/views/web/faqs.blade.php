@extends('web.layouts.app')

@section('paging')
    <div class="navigation-header">
        <a href="{{ route('web.home') }}"> <i class="bi bi-house-door"></i> {{ __('Home') }} </a>
        <i class="bi bi-chevron-double-left"></i>
        <span>{{ __('Questions and Answers') }} </span>
    </div>
@endsection

@section('content')
    <section class="q-A mr-section">
        <div class="main-container">
            <div class="title-start">
                <h2>{{ $pageTitle }}</h2>
                <span></span>
            </div>

            <div class="more-q-A-datails">

                <ul>

                    @foreach ($faqs as $faq)
                        <li>
                            <a href="{{ route('web.faq-details', $faq->slug) }}">
                                <img src="{{ url('web') }}/images/arrow.png" alt="">
                                {{ $faq->question }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                {{-- <div class="btn-more-q-A text-center" style="margin: 50px 0 ; text-align: center;">
                    <a href="" class="ctm-link"> قراءة المزيد <i class="bi bi-arrow-left"></i></a>
                </div> --}}
            </div>

        </div>
    </section>
@endsection
