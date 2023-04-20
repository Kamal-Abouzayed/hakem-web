@extends('dashboard.layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h4 class="card-title text-primary">{{ $contact->name }}</h4>
            <a href="mailto:{{ $contact->email }}" class="card-subtitle text-muted mb-2">{{ $contact->email }}</a>
        </div>
        <div class="card-body">
            <p class="card-text">{{ $contact->msg }}</p>
            <a href="{{ route('dashboard.contacts.reply', $contact->id) }}" class="btn btn-outline-primary">الرد</a>
        </div>
        @php
            \Carbon\Carbon::setLocale('ar');
        @endphp
        <div class="card-footer text-muted text-left">{{ $contact->created_at->diffForHumans() }}</div>
    </div>
@endsection
