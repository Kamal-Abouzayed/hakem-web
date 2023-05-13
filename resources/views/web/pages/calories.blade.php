<!-- start diseases  ===== -->
<section class="calories">
    <div class="main-container">
        <div class="title-start">
            <h2>{{ $category->name }}</h2>
            <span></span>
        </div>

        @include('web.includes.calories-search-field')

        <div class="main-calories">
            <div class="title-main-calories">
                <h2> <img src="{{ url('web') }}/images/arrow.png" alt="">
                    {{ __('Find out the calories and nutritional values of the') . ' ' . $category->name }} :
                </h2>
            </div>
            <div class="row">

                <div class="col-lg-12">
                    <p class="category-desc">
                        {!! $category->desc !!}
                    </p>
                </div>

                @foreach ($category->articles as $article)
                    <div class="col-lg-3">
                        <div class="sub-calories">
                            <a
                                href="{{ route('web.article-details', ['sectionSlug' => request()->sectionSlug, 'slug' => $article->slug]) }}">
                                {{ $article->name }} </a>
                        </div>
                    </div>
                @endforeach


                @include('web.includes.advices')
            </div>
        </div>


    </div>
</section>
