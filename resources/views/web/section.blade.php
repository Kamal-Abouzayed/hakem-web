@extends('web.layouts.app')

@section('content')
    <section class="medicine-health">
        <div class="main-container">
            <div class="title-start">
                <h2>{{ $section->name }}</h2>
                <span></span>
            </div>

            <div class="main-medicine-health">
                <div class="row">

                    @foreach ($categories as $category)
                        <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
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


            @if ($section->slug == 'medicine-and-health')
                @include('web.includes.human-body')
            @elseif ($section->slug == 'pregnancy-and-birth')
                @include('web.includes.pregnancy-stages')
            @endif

        </div>
    </section>
@endsection
