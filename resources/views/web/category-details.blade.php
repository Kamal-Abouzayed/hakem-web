@extends('web.layouts.app')

@section('content')
    @if (request()->sectionSlug == 'medicine-and-health')
        @include('web.pages.medicine-and-health')
    @else
        @include('web.pages.health-and-beauty')
    @endif
@endsection
