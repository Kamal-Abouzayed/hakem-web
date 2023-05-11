@extends('web.auth.layouts.app')

@section('content')
    <section class="login-page">
        <div class="main-container">
            <div class="logo-login">
                <a href="{{ route('web.home') }}">
                    <img src="{{ asset('storage/' . getSetting('logo')) }}" alt="">
                </a>
            </div>
            <h2>{{ $pageTitle }}</h2>

            <div class="form-login-page  form-register-page">
                <form action="{{ route('web.update-profile') }}" method="POST" id="registerForm" autocomplete="off">
                    @csrf
                    @method('PATCH')
                    <div class="row">

                        <input type="hidden" name="id" value="{{ $user->id }}">

                        <div class="col-lg-6">
                            <div class="form-input">
                                <input type="text" placeholder="{{ __('First Name') }}" class="form-control"
                                    name="fname" value="{{ old('fname', $user->fname) }}" required>
                                <i class="bi bi-person"></i>

                            </div>
                            @error('fname')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6">

                            <div class="form-input">
                                <input type="text" placeholder="{{ __('Last Name') }}" class="form-control"
                                    name="lname" value="{{ old('lname', $user->lname) }}" required>
                                <i class="bi bi-person"></i>
                            </div>
                            @error('lname')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div class="form-input arrow-form">
                                <select class="form-select form-control " name="country_id" required>
                                    <option value="">{{ __('Choose Country') }} </option>

                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ old('country_id', $user->country ? $user->country->id : '') == $country->id ? 'selected' : '' }}>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <i class="bi bi-geo-alt"></i>

                            </div>
                            @error('country_id')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div class="form-input">
                                <input type="email" placeholder="{{ __('Email') }}"
                                    value="{{ old('email', $user->email) }}" class="form-control" name="email" required>
                                <i class="bi bi-envelope"></i>
                            </div>
                            @error('email')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div class="form-input">
                                <input type="text" placeholder="{{ __('Phone') }}"
                                    value="{{ old('phone', $user->phone) }}" class="form-control" name="phone">
                                <i class="bi bi-envelope"></i>
                            </div>
                            @error('phone')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- <div class="col-lg-6">
                            <div class="form-input">
                                <input type="password" value="{{ old('password') }}" placeholder="{{ __('Password') }}"
                                    class="form-control" name="password" autocomplete="new-password">
                                <i class="bi bi-lock"></i>
                            </div>
                            @error('password')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div class="form-input">
                                <input type="password" value="{{ old('password_confirmation') }}"
                                    placeholder="{{ __('Password Confirmation') }}" class="form-control"
                                    name="password_confirmation" autocomplete="new-password">
                                <i class="bi bi-lock"></i>
                            </div>
                            @error('password_confirmation')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div> --}}
                        <div class="col-lg-6">
                            <div class="form-input">
                                <input type="date"
                                    value="{{ old('birthday', $user->birthday ? $user->birthday->format('Y-m-d') : '') }}"
                                    placeholder="{{ __('Birthdate (optional*)') }}" class="form-control" name="birthday">
                                <i class="bi bi-calendar-date"></i>
                            </div>
                            @error('birthday')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div class="form-input">
                                <div class="form-input arrow-form">
                                    <select class="form-select form-control " name="gender">
                                        <option value=""> {{ __('Select gender (optional*)') }} </option>
                                        <option value="male"
                                            {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>
                                            {{ __('Male') }} </option>
                                        <option value="female"
                                            {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>
                                            {{ __('Female') }} </option>
                                    </select>
                                    <i class="bi bi-person"></i>
                                </div>
                                @error('gender')
                                    <small class="error">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                    </div>


                    <div class="btn-login">
                        <button>{{ __('Save') }}</button>
                    </div>

                </form>
            </div>

        </div>
    </section>
@endsection
