@extends('dashboard.layouts.app')

@section('content')
    <div class="card shadow mb-4">

        <div class="card-header">
            <h4 class="card-title text-primary">إرسال رد للعميل</h4>
        </div>
        <div class="card-body">
            <form class="form form-vertical" id="replyForm" action="{{ route('dashboard.contacts.sendReply', $contact->id) }}"
                method="POST">
                @csrf

                <input type="hidden" value="{{ $contact->email }}" name="email">

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <textarea class="form-control" name="reply" cols="30" rows="10" required></textarea>
                            @error('reply')
                                <span class="alert alert-danger">
                                    <small class="errorTxt">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-primary">إرسال</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
