@extends('web.layouts.app')

@section('content')
    <section class="terms">
        <div class="main-container">
            <div class="title-start">
                <h2>{{ $pageTitle }} </h2>
                <span></span>
            </div>

            <div class="text-details">
                {!! getSetting('terms_of_use', app()->getLocale()) !!}
            </div>

        </div>
    </section>
@endsection
