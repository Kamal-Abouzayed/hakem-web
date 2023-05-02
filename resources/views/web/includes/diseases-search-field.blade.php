<div class="search-two">
    <div class="search-header">
        <form action="{{ route('web.search-diseases', ['sectionSlug' => request()->sectionSlug]) }}" method="GET">
            <input type="text" placeholder="{{ __('Find a disease') }} .. " name="searchTerm" class="form-control">
            <button><img src="{{ url('web') }}/images/search.png" alt=""></button>
        </form>
    </div>

    <p>
        {{ __('The largest encyclopedia of diseases in the Arabic language! Discover the comprehensive encyclopedia of diseases from A to Z. Definition of diseases, their symptoms, diagnosis and methods of treatment, in Web Medicine. The only disease guide for trusted medical information. Here you can search for a disease in both Arabic and English, or search by common diseases, or by category. Enter the name of the disease in the search field') }}
    </p>
</div>
