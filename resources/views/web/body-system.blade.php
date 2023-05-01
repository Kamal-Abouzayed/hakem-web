@extends('web.layouts.app')

@section('content')
    <section class="human-organ-categories">
        <div class="main-container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="sub-human-organ-categories">
                        <div class="img-human-organ-categories">
                            <img src="{{ asset('storage/' . $bodySystem->img) }}" alt="">
                        </div>
                        <div class="text-human-organ-categories">
                            <h2>{{ $bodySystem->name }} </h2>
                            {!! $bodySystem->desc !!}
                        </div>

                        <div class="sections-human-organ-categories">
                            <h2> {{ __('Body System Organs') }} :</h2>
                            <ul>
                                @foreach ($bodySystem->organs as $organ)
                                    <li><a href=""> {{ $organ->name }} </a></li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- <div class="video-text">
                            <iframe width="100%" height="500" src="https://www.youtube.com/embed/C0DPdy98e4c"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div> --}}
                    </div>
                </div>


                <div class="col-lg-4">

                    <div class="more-questions">
                        <div class="title-related-topics">
                            <h2>{{ __('Questions and Answers') }}</h2>
                        </div>

                        @foreach ($faqs->take(3) as $faq)
                            <a href="q&a-details.html">
                                <div class="sub-more-questions">
                                    <p>{{ $faq->question }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>


                    <div class="more-article-details">
                        <div class="title-related-topics">
                            <h2>{{ __('Related Topics') }}</h2>
                        </div>

                        @foreach ($relatedContent->take(5) as $content)
                            <a href="">
                                <div class="sub-read-article-index">
                                    <div class="img-read-article-index">
                                        <img src="{{ asset('storage/' . $content->img) }}" alt="">
                                    </div>
                                    <div class="text-read-article-index">
                                        <h3 class="date-article"> {{ $content->section->name }} ,<span>
                                                {{ $content->created_at }}
                                            </span></h3>
                                        <p>{!! strip_tags(Str::limit($content->desc, 50)) !!}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
