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
