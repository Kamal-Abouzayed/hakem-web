@extends('web.layouts.app')

@section('paging')
    <div class="navigation-header">
        <a href="{{ route('web.home') }}"> <i class="bi bi-house-door"></i> {{ __('Home') }} </a>
        <i class="bi bi-chevron-double-left"></i>
        <a href="{{ route('web.faqs') }}"> {{ __('Questions and Answers') }} </a>
        <i class="bi bi-chevron-double-left"></i>
        <span>{{ $faq->question }} </span>
    </div>
@endsection

@section('content')
    <section class="q-A-datails">
        <div class="main-container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="sub-q-A-datails">
                        <div class="question">
                            <h2> {{ __('Question') }} : </h2>
                            <h3>{{ $faq->question }}</h3>
                        </div>
                        <div class="answer">
                            <h2> {{ __('Answer') }} : </h2>
                            <h3>{!! $faq->answer !!}</h3>
                        </div>
                    </div>


                    <div class="share-article">
                        <h3><i class="bi bi-share"></i> {{ __('Share') }} : </h3>

                        {!! $share !!}

                        {{-- <ul>
                            <li><a href=""><img src="images/facebook-logo.png" alt=""></a></li>
                            <li><a href=""><img src="images/twitter.png" alt=""></a></li>
                            <li><a href=""><img src="images/instagram.png" alt=""></a></li>
                            <li><a href=""><img src="images/Snapchat.png" alt=""></a></li>
                        </ul> --}}
                    </div>



                    <div class="more-q-A-datails">
                        <div class="title-start">
                            <h2>{{ __('Questions and Answers') }}</h2>
                            <span></span>
                        </div>
                        <ul>

                            @foreach ($faqs->take(4) as $faq)
                                <li>
                                    <a href="{{ route('web.faq-details', $faq->slug) }}">
                                        <img src="{{ url('web') }}/images/arrow.png" alt="">
                                        {{ $faq->question }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="btn-more-q-A-datails">
                            <a href="{{ route('web.faqs') }}" class="ctm-link"> {{ __('Read More') }}<i
                                    class="bi bi-arrow-left"></i></a>
                        </div>
                    </div>

                </div>


                @include('web.includes.faqs-side-content')
            </div>
        </div>
    </section>

    @push('js')
        <script src="{{ asset('admin/js/custom/custom-toc.js') }}"></script>
    @endpush
@endsection
