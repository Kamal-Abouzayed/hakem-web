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

    <div class="img-ads">

        @if ($ads->isNotEmpty())

            @foreach ($ads as $ad)
                <a href="{{ $ad->link }}">
                    <img src="{{ asset('storage/' . $ad->img) }}" alt="">
                </a>
            @endforeach
        @else
            <a href="">
                <img src="{{ url('web') }}/images/Ads.png" alt="">
            </a>
        @endif

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

        @foreach ($mostReadArticles as $article)
            <a
                href="{{ route('web.article-details', ['sectionSlug' => $article->section->slug, 'slug' => $article->slug]) }}">
                <div class="sub-read-article-index">
                    <div class="img-read-article-index">
                        <img src="{{ asset('storage/' . $article->img) }}" alt="">
                    </div>
                    <div class="text-read-article-index">
                        <h3 class="date-article"> {{ $article->section->name }} ,<span>
                                {{ $article->user->full_name }}
                            </span></h3>
                        <p>{!! strip_tags(Str::limit($article->desc, 50)) !!}</p>
                    </div>
                </div>
            </a>
        @endforeach

    </div>

    <div class="more-article-details">
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

    </div>

</div>
