@extends('web.layouts.app')

@section('content')
    <!-- start article-index  ===
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ========= -->
    <section class="article-index mr-section">
        <div class="main-container">
            <div class="main-article-index">
                @forelse ($articles->chunk(3) as $articleChunks)
                    @foreach ($articleChunks as $chunk)
                        {{-- chunk = article --}}
                        @if (
                            $chunk->section->slug == 'medicine-and-health' ||
                                $chunk->section->slug == 'health-and-beauty' ||
                                $chunk->section->slug == 'pregnancy-and-birth')
                            <div class="sub-article-index" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
                                <a href="{{ route('web.article-details', ['sectionSlug' => $chunk->section->slug, 'slug' => $chunk->slug]) }}">
                                    <img src="{{ asset('storage/' . $chunk->img) }}" alt="{{ $chunk->name }}">
                                    <div class="text-article-index">
                                        <h3>{{ $chunk->section->name }}</h3>
                                        <p>{!! strip_tags(Str::limit($chunk->desc, 50)) !!}</p>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                @empty
                    <div class="sub-article-index" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
                        <img src="{{ url('web') }}/images/no-articles.png" alt="">
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- end  article-index  ===
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ========= -->


    <!-- start more-section === -->
    <section class="more-section mr-section">
        <div class="main-container">
            <div class="row">
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
                    <a href="{{ route('web.pregnancy-calculator') }}">
                        <div class="sub-more-section">
                            <div class="img-more-section">
                                <img src="{{ url('web') }}/images/s1.png" alt="">
                            </div>
                            <h2>{{ __('Pregnancy calculator') }}</h2>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
                    <a href="{{ route('web.calorie-calculator') }}">
                        <div class="sub-more-section">
                            <div class="img-more-section">
                                <img src="{{ url('web') }}/images/s2.png" alt="">
                            </div>
                            <h2>{{ __('Calorie calculator') }}</h2>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
                    <a href="{{ route('web.videos') }}">
                        <div class="sub-more-section">
                            <div class="img-more-section">
                                <img src="{{ url('web') }}/images/s3.png" alt="">
                            </div>
                            <h2>{{ __('Videos') }} </h2>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
                    <a href="{{ route('web.all-calculators') }}">
                        <div class="sub-more-section">
                            <div class="img-more-section">
                                <img src="{{ url('web') }}/images/s4.png" alt="">
                            </div>
                            <h2>{{ __('All calculators') }}</h2>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- end more-section === -->


    <!-- start new-article-index === -->
    <section class="new-article-index mr-section">
        <div class="main-container">
            <div class="title-start">
                <h2> {{ __('New in Hakem Web') }} </h2>
                <span></span>
            </div>
            <div class="slider-new-article">
                <div class="owl-carousel owl-theme maincarousel" id="slider-article">
                    @foreach ($articles->chunk(6) as $key => $newChunks)
                        <div class="item">
                            <div class="row">
                                @foreach ($newChunks as $chunk)
                                    {{-- chunk = article --}}
                                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-easing="linear"
                                        data-aos-duration="700">
                                        <a href="{{ route('web.article-details', ['sectionSlug' => $chunk->section->slug, 'slug' => $chunk->slug]) }}">
                                            <div class="sub-slider-new-article">
                                                <div class="img-slider-new-article">
                                                    <img src="{{ asset('storage/' . $chunk->img) }}"
                                                        alt="{{ $chunk->name }}">
                                                </div>
                                                <div class="text-slider-new-article">
                                                    <h3> {{ $chunk->section->name }} ,<span>
                                                            {{ $chunk->created_at }}
                                                        </span></h3>
                                                    <p>{!! strip_tags(Str::limit($chunk->desc, 50)) !!}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- end new-article-index === -->


    <section class="read-article-index mr-section">
        <div class="main-container">
            <div class="title-start">
                <h2>{{ __('Most Read') }}</h2>
                <span></span>
            </div>
            <div class="row">

                @php
                    $mostReadArticles = $articles->sortByDesc('views')->take(6);
                @endphp

                @if ($mostReadArticles->count() > 0)
                    <div class="col-lg-8" data-aos="fade-left" data-aos-easing="linear" data-aos-duration="700">
                        <div class="big-read-article-index">
                            <div class="img-big-article-index">
                                <img src="{{ asset('storage/' . $mostReadArticles->first()->img) }}"
                                    alt="{{ $mostReadArticles->first()->name }}">
                            </div>
                            <div class="text-big-article-index">
                                <h3 class="date-article"> {{ $mostReadArticles->first()->section->name }} , <span>
                                        {{ $mostReadArticles->first()->created_at }}
                                    </span></h3>
                                <h2> {{ $mostReadArticles->first()->name }} </h2>
                                <p>{!! strip_tags(Str::limit($mostReadArticles->first()->desc, 740)) !!}. </p>
                            </div>
                            <a href="{{ route('web.article-details', ['sectionSlug' => $mostReadArticles->first()->section->slug, 'slug' => $mostReadArticles->first()->slug]) }}" class="ctm-link"> {{ __('Read More') }} <i
                                    class="bi bi-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                @endif

                @if ($mostReadArticles->count() > 1)
                    <div class="col-lg-4" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="700">
                        @foreach ($mostReadArticles->slice(1) as $article)
                            <a href="{{ route('web.article-details', ['sectionSlug' => $article->section->slug, 'slug' => $article->slug]) }}">
                                <div class="sub-read-article-index">
                                    <div class="img-read-article-index">
                                        <img src="{{ asset('storage/' . $article->img) }}" alt="{{ $article->name }}">
                                    </div>
                                    <div class="text-read-article-index">
                                        <h3 class="date-article"> {{ $article->section->name }} , <span>
                                                {{ $article->created_at }}
                                            </span></h3>
                                        <p>{!! strip_tags(Str::limit($article->desc, 50)) !!}. </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>


    <section class="read-also-article-index mr-section">
        <div class="main-container">
            <div class="title-start">
                <h2>{{ __('Also read') }}</h2>
                <span></span>
            </div>


            <div class="main-read-also-article">
                @foreach ($articles->sortBy('created_at')->take(5) as $article)
                    {{-- chunk = article --}}
                    <div class="sub-read-also-article" data-aos="fade-down" data-aos-easing="linear"
                        data-aos-duration="700">
                        <a href="{{ route('web.article-details', ['sectionSlug' => $article->section->slug, 'slug' => $article->slug]) }}">
                            <div class="img-read-also-article">
                                <img src="{{ asset('storage/' . $article->img) }}" alt="{{ $article->name }}">
                            </div>
                            <div class="text-read-also-article">
                                <h3 class="date-article"> {{ $article->section->name }} , <span>
                                        {{ $article->created_at }}
                                    </span></h3>
                                <p>{!! strip_tags(Str::limit($article->desc, 50)) !!}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
