<div class="col-lg-4">
    <div class="more-article-details">
        <div class="title-related-topics">
            <h2>{{ __('Related Topics') }}</h2>
        </div>
        @foreach ($relatedContent->take(5) as $content)
            <a
                href="{{ route('web.article-details', ['sectionSlug' => $content->section->slug, 'slug' => $content->slug]) }}">
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


    <div class="more-q-A-datails">
        <div class="title-related-topics">
            <h2>{{ __('Questions and Answers') }}</h2>
        </div>
        <ul>

            @foreach ($faqs->take(4) as $faq)
                <a href="{{ route('web.faq-details', $faq->slug) }}">
                    <div class="sub-more-questions">
                        <p>{{ $faq->question }}</p>
                    </div>
                </a>
            @endforeach
        </ul>
    </div>


    <div class="more-article-details">
        <div class="title-related-topics">
            <h2>{{ __('Most Read') }}</h2>
        </div>

        @php
            $mostReadArticles = $allArticles->sortByDesc('views')->take(5);
        @endphp

        @foreach ($mostReadArticles as $mostReadArticle)
            <a
                href="{{ route('web.article-details', ['sectionSlug' => $mostReadArticle->section->slug, 'slug' => $mostReadArticle->slug]) }}">
                <div class="sub-read-article-index">
                    <div class="img-read-article-index">
                        <img src="{{ asset('storage/' . $mostReadArticle->img) }}" alt="">
                    </div>
                    <div class="text-read-article-index">
                        <h3 class="date-article"> {{ $mostReadArticle->section->name }} ,<span>
                                {{ $mostReadArticle->created_at }}
                            </span></h3>
                        <p>{!! strip_tags(Str::limit($mostReadArticle->desc, 50)) !!}</p>
                    </div>
                </div>
            </a>
        @endforeach

    </div>

    {{-- <div class="more-article-details">
        <div class="title-related-topics">
            <h2>{{ __('New in Hakem Web') }}</h2>
        </div>

        @php
            $newArticles = $allArticles
                ->where('section_id', '!=', $section->id)
                ->sortByDesc('id')
                ->take(5);
        @endphp

        @foreach ($newArticles as $newArticle)
            <a
                href="{{ route('web.article-details', ['sectionSlug' => $newArticle->section->slug, 'slug' => $newArticle->slug]) }}">
                <div class="sub-read-article-index">
                    <div class="img-read-article-index">
                        <img src="{{ asset('storage/' . $newArticle->img) }}" alt="">
                    </div>
                    <div class="text-read-article-index">
                        <h3 class="date-article"> {{ $newArticle->section->name }} ,<span>
                                {{ $newArticle->created_at }}
                            </span></h3>
                        <p>{!! strip_tags(Str::limit($newArticle->desc, 50)) !!}</p>
                    </div>
                </div>
            </a>
        @endforeach

    </div> --}}

    @if (request()->sectionSlug == 'diseases')

        @if ($article->medicines->isNotEmpty())
            <div class="more-article-details">
                <div class="title-related-topics">
                    <h2>{{ __('Related medications') }}</h2>
                </div>

                @foreach ($article->medicines as $medicines)
                    <a
                        href="{{ route('web.article-details', ['sectionSlug' => $medicines->section->slug, 'slug' => $medicines->slug]) }}">
                        <div class="sub-read-article-index">
                            <div class="img-read-article-index">
                                <img src="{{ asset('storage/' . $medicines->img) }}" alt="">
                            </div>
                            <div class="text-read-article-index">
                                <h3 class="date-article"> {{ $medicines->section->name }} ,<span>
                                        {{ $medicines->created_at }}
                                    </span></h3>
                                <p>{!! strip_tags(Str::limit($medicines->desc, 50)) !!}</p>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>

        @endif

        @if ($article->organs->isNotEmpty())
            <div class="more-article-details">
                <div class="title-related-topics">
                    <h2>{{ __('Related organs') }}</h2>
                </div>

                @foreach ($article->organs as $organ)
                    <a
                        href="{{ route('web.organ-details', ['sectionSlug' => 'medicine-and-health', 'slug' => $organ->slug]) }}">
                        <div class="sub-read-article-index">
                            <div class="img-read-article-index">
                                <img src="{{ asset('storage/' . $organ->img) }}" alt="">
                            </div>
                            <div class="text-read-article-index">
                                <h3 class="date-article"> {{ __('Medicine and Health') }} ,<span>
                                        {{ $organ->created_at }}
                                    </span></h3>
                                <p>{!! strip_tags(Str::limit($organ->desc, 50)) !!}</p>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        @endif

    @endif

    @if (request()->sectionSlug == 'medicine-and-health')

        @if ($article->diseases->isNotEmpty())
            <div class="more-article-details">
                <div class="title-related-topics">
                    <h2>{{ __('Related diseases') }}</h2>
                </div>

                @foreach ($article->diseases as $disease)
                    <a
                        href="{{ route('web.article-details', ['sectionSlug' => $disease->section->slug, 'slug' => $disease->slug]) }}">
                        <div class="sub-read-article-index">
                            <div class="img-read-article-index">
                                <img src="{{ asset('storage/' . $disease->img) }}" alt="">
                            </div>
                            <div class="text-read-article-index">
                                <h3 class="date-article"> {{ $disease->section->name }} ,<span>
                                        {{ $disease->created_at }}
                                    </span></h3>
                                <p>{!! strip_tags(Str::limit($disease->desc, 50)) !!}</p>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        @endif

    @endif

    @if (request()->sectionSlug == 'medicines' && $article->diseases->isNotEmpty())
        <div class="more-article-details">
            <div class="title-related-topics">
                <h2>{{ __('Related diseases') }}</h2>
            </div>

            @foreach ($article->diseases as $disease)
                <a
                    href="{{ route('web.article-details', ['sectionSlug' => $disease->section->slug, 'slug' => $disease->slug]) }}">
                    <div class="sub-read-article-index">
                        <div class="img-read-article-index">
                            <img src="{{ asset('storage/' . $disease->img) }}" alt="">
                        </div>
                        <div class="text-read-article-index">
                            <h3 class="date-article"> {{ $disease->section->name }} ,<span>
                                    {{ $disease->created_at }}
                                </span></h3>
                            <p>{!! strip_tags(Str::limit($disease->desc, 50)) !!}</p>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
    @endif



</div>
