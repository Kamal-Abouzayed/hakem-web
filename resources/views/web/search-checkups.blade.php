@extends('web.layouts.app')

@section('paging')
    <div class="navigation-header">
        <a href="{{ route('web.home') }}"> <i class="bi bi-house-door"></i> {{ __('Home') }} </a>
        <i class="bi bi-chevron-double-left"></i>
        <span>{{ __('Search Results') }} </span>
    </div>
@endsection

@section('content')
    <!-- start diseases  ===== -->
    <section class="diseases">
        <div class="main-container">
            <div class="title-start">
                <h2>{{ __('Search Results') }}</h2>
                <span></span>
            </div>

            <div class="main-diseases">
                <div class="row">

                    @forelse ($articles as $article)
                        <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
                            <a href="{{ route('web.checkup-details', $article->slug) }}">
                                <div class="sub-health-beaut">
                                    <div class="img-health-beaut">
                                        <img src="{{ asset('storage/' . $article->img) }}" alt="{{ $article->name }}">
                                    </div>
                                    <div class="text-health-beaut">
                                        <h2>{{ $article->name }}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>

                    @empty
                        <div class="col-12">
                            <p class="text-center text-bold text-danger">{{ __('No Data Found') }}</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </section>

    <!-- end diseases  ===== -->
@endsection
