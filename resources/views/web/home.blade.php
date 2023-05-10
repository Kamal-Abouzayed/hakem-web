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
                                <a
                                    href="{{ route('web.article-details', ['sectionSlug' => $chunk->section->slug, 'slug' => $chunk->slug]) }}">
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
                                        <a
                                            href="{{ route('web.article-details', ['sectionSlug' => $chunk->section->slug, 'slug' => $chunk->slug]) }}">
                                            <div class="sub-slider-new-article">
                                                <div class="img-slider-new-article">
                                                    <img src="{{ asset('storage/' . $chunk->img) }}"
                                                        alt="{{ $chunk->name }}">
                                                </div>
                                                <div class="text-slider-new-article">
                                                    <h3> {{ $chunk->section->name }} ,<span>
                                                            {{ $chunk->user->full_name }}
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
                                        {{ $mostReadArticles->first()->user->full_name }}
                                    </span></h3>
                                <h2> {{ $mostReadArticles->first()->name }} </h2>
                                <p>{!! strip_tags(Str::limit($mostReadArticles->first()->desc, 740)) !!}. </p>
                            </div>
                            <a href="{{ route('web.article-details', ['sectionSlug' => $mostReadArticles->first()->section->slug, 'slug' => $mostReadArticles->first()->slug]) }}"
                                class="ctm-link"> {{ __('Read More') }} <i class="bi bi-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                @endif

                @if ($mostReadArticles->count() > 1)
                    <div class="col-lg-4" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="700">
                        @foreach ($mostReadArticles->slice(1) as $article)
                            <a
                                href="{{ route('web.article-details', ['sectionSlug' => $article->section->slug, 'slug' => $article->slug]) }}">
                                <div class="sub-read-article-index">
                                    <div class="img-read-article-index">
                                        <img src="{{ asset('storage/' . $article->img) }}" alt="{{ $article->name }}">
                                    </div>
                                    <div class="text-read-article-index">
                                        <h3 class="date-article"> {{ $article->section->name }} , <span>
                                                {{ $article->user->full_name }}
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
                        <a
                            href="{{ route('web.article-details', ['sectionSlug' => $article->section->slug, 'slug' => $article->slug]) }}">
                            <div class="img-read-also-article">
                                <img src="{{ asset('storage/' . $article->img) }}" alt="{{ $article->name }}">
                            </div>
                            <div class="text-read-also-article">
                                <h3 class="date-article"> {{ $article->section->name }} , <span>
                                        {{ $article->user->full_name }}
                                    </span></h3>
                                <p>{!! strip_tags(Str::limit($article->desc, 50)) !!}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @push('js')
        <script>
            var firebaseConfig = {
                apiKey: "AIzaSyC-t8Wt9rFWgN7TK_gqbh3nqUU9k7ZETb8",
                authDomain: "hakemweb.firebaseapp.com",
                projectId: "hakemweb",
                storageBucket: "hakemweb.appspot.com",
                messagingSenderId: "828225928748",
                appId: "1:828225928748:web:4f67a942fd2df47b8a1b89",
                measurementId: "G-21PG21XJNP"
            };

            firebase.initializeApp(firebaseConfig);
            const messaging = firebase.messaging();

            function initFirebaseMessagingRegistration() {
                messaging
                    .requestPermission()
                    .then(function() {
                        return messaging.getToken()
                    })
                    .then(function(token) {
                        console.log(token);

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            url: "{{ route('web.save-token') }}",
                            type: 'POST',
                            data: {
                                token: token
                            },
                            dataType: 'JSON',
                            success: function(response) {
                                // alert('Token saved successfully.');
                            },
                            error: function(err) {
                                console.log('User Chat Token Error' + err);
                            },
                        });

                    }).catch(function(err) {
                        console.log('User Chat Token Error' + err);
                    });
            }

            @if (Auth::check() && Auth::user()->device_token == null)
                // initFirebaseMessagingRegistration();

                Swal.fire({
                    title: "{{ __('Do you allow notifications?') }}",
                    text: "{{ __('We like to send you push notifications to keep you up to date') }}",
                    // icon: "info",
                    imageUrl: "https://hakemweb.com/web/images/notification.png",
                    imageWidth: 250,
                    imageHeight: 250,
                    imageAlt: "Hakem Web",
                    confirmButtonText: "{{ __('Yes') }}",
                    showCancelButton: true,
                    cancelButtonText: "{{ __('No') }}",
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        initFirebaseMessagingRegistration();
                    }
                });
            @else
                Swal.fire({
                    title: "{{ __('Do you allow notifications?') }}",
                    text: "{{ __('We like to send you push notifications to keep you up to date') }}",
                    // icon: "info",
                    imageUrl: "https://hakemweb.com/web/images/notification.png",
                    imageWidth: 250,
                    imageHeight: 250,
                    imageAlt: "Hakem Web",
                    confirmButtonText: "{{ __('Yes') }}",
                    showCancelButton: true,
                    cancelButtonText: "{{ __('No') }}",
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('web.login') }}"
                    }
                });
            @endif

            messaging.onMessage(function(payload) {
                const noteTitle = payload.notification.title;
                const noteOptions = {
                    body: payload.notification.body,
                    icon: payload.notification.icon,
                };
                // new Notification(noteTitle, noteOptions);

            });

            if (Notification.permission === 'granted') {
                navigator.serviceWorker.ready.then(function(registration) {
                    registration.showNotification(noteTitle, noteOptions);
                });
            }
        </script>
    @endpush
@endsection
