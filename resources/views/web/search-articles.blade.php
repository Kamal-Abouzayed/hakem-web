@extends('web.layouts.app')

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
                        @php
                            $section = App\Models\Section::find($article->section_id);
                        @endphp

                        <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
                            <a
                                href="{{ route('web.article-details', ['sectionSlug' => $section->slug, 'slug' => $article->slug]) }}">
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
