@extends('web.layouts.app')

@section('paging')
    <div class="navigation-header">
        <a href="{{ route('web.home') }}"> <i class="bi bi-house-door"></i> {{ __('Home') }} </a>
        <i class="bi bi-chevron-double-left"></i>
        <a href="{{ route('web.section-categories', 'pregnancy-and-birth') }}"> {{ __('Pregnancy and Birth') }} </a>
        <i class="bi bi-chevron-double-left"></i>

        @if ($stage->parent)
            <a
                href="{{ route('web.pregnancy-stage', ['sectionSlug' => request()->sectionSlug, 'slug' => $stage->parent->slug]) }}">
                {{ $stage->parent->name }} </a>
            <i class="bi bi-chevron-double-left"></i>
        @endif

        <span>{{ $stage->name }} </span>
    </div>
@endsection

@section('content')
    <section class="article-details">
        <div class="main-container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="sub-article-details">
                        <div class="img-article-details">
                            <img src="{{ asset('storage/' . $stage->img) }}" alt="">
                        </div>


                        <div class="sections-human-organ-categories" id="toc-element">
                            <h2> {{ __('Page Content') }} :</h2>
                            <ul>
                                {{-- <li><a href="">هذا النص هو </a></li>
                                <li><a href="">هذا النص هو </a></li>
                                <li><a href="">هذا النص هو </a></li>
                                <li><a href="">هذا النص هو </a></li> --}}

                            </ul>
                        </div>

                        <div class="text-article-details">
                            <h3 class="date-article pb-3"> {{ $stage->parent ? $stage->parent->name : $stage->name }}
                                {{-- ,<span>
                                    {{ $stage->created_at }}
                                </span> --}}
                            </h3>
                            <div class="text-details">
                                {!! $stage->desc !!}
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
                    </div>
                </div>


                @include('web.includes.article-side-content')
            </div>
        </div>
    </section>

    @push('js')
        <script src="{{ asset('admin/js/custom/custom-toc.js') }}"></script>
    @endpush
@endsection
