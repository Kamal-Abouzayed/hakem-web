<div class="search-two">
    <div class="search-header">
        <form action="{{ route('web.search-articles') }}" method="GET">
            <input type="text" placeholder=" {{ __('Search Here') }} .." name="searchTerm" class="form-control">
            <button><img src="{{ url('web') }}/images/search.png" alt=""></button>
        </form>
    </div>
</div>
