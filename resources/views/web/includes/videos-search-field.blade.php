<div class="search-two">
    <div class="search-header">
        <form action="{{ route('web.search-videos') }}" method="POST">
            @csrf
            <input type="text" placeholder=" {{ __('Search in videos') }} .." name="searchTerm" class="form-control">
            <button><img src="{{ url('web') }}/images/search.png" alt=""></button>
        </form>
    </div>
</div>
