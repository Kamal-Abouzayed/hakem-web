@extends('web.layouts.app')

@section('content')
    <section class="videos">
        <div class="main-container">
            <div class="title-start">
                <h2>{{ __('Videos') }} </h2>
                <span></span>
            </div>

            @include('web.includes.videos-search-field')

            <div class="main-videos">
                <div class="main-container">
                    <div class="row">

                        @forelse ($videos as $video)
                            @php
                                $url = $video->url;
                                $url_components = parse_url($url);
                                if (array_key_exists('query', $url_components)) {
                                    parse_str($url_components['query'], $params);
                                    $key = $params['v'];
                                } else {
                                    $key = str_replace('/', '', $url_components['path']);
                                }
                            @endphp

                            <div class="col-lg-4">
                                <a href="{{ route('web.video-details', $video->slug) }}">
                                    <div class="sub-videos">
                                        <div class="img-sub-videos">
                                            <img src="http://img.youtube.com/vi/{{ $key }}/mqdefault.jpg"
                                                width="100px" alt="{{ $video->name }}">
                                        </div>
                                        <div class="text-sub-videos">
                                            <h2>{{ $video->name }}</h2>
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

        </div>
    </section>
@endsection
