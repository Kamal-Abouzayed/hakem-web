<div class="search-two">
    <div class="search-header">
        <form action="{{ route('web.search-calories', request()->sectionSlug) }}">
            <input type="text" placeholder="{{ __('Example: bananas, chicken seasoning, eggs') }} .." name="searchTerm"
                class="form-control">
            <button><img src="{{ url('web') }}/images/search.png" alt=""></button>
        </form>
    </div>

    <p>{{ __('Enter the name of the food item to find its nutritional and calorie value') }} .</p>
</div>
