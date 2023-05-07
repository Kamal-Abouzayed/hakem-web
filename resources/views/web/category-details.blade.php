@extends('web.layouts.app')

@section('paging')
    <div class="navigation-header">
        <a href="{{ route('web.home') }}"> <i class="bi bi-house-door"></i> {{ __('Home') }} </a>
        <i class="bi bi-chevron-double-left"></i>
        <a href="{{ route('web.section-categories', $category->section->slug) }}"> {{ $category->section->name }} </a>
        <i class="bi bi-chevron-double-left"></i>
        <span>{{ $category->name }} </span>
    </div>
@endsection

@section('content')
    @if (request()->sectionSlug == 'medicine-and-health')
        @include('web.pages.medicine-and-health')
    @elseif (request()->sectionSlug == 'diseases')
        @include('web.pages.diseases')
    @elseif (request()->sectionSlug == 'calories')
        @include('web.pages.calories')
    @else
        @include('web.pages.health-and-beauty')
    @endif
@endsection
