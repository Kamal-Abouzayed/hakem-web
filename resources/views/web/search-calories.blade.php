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

            @include('web.includes.calories-search-field')

            <div class="main-calories">
                <div class="row">

                    @forelse ($articles as $article)
                        @php
                            $section = App\Models\Section::find($article->section_id);
                        @endphp

                        <div class="col-lg-4">
                            <div class="sub-calories">
                                <a
                                    href="{{ route('web.article-details', ['sectionSlug' => $section->slug, 'slug' => $article->slug]) }}">
                                    {{ $article->name }} </a>
                            </div>
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
