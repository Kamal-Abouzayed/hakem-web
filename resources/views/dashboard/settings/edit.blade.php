@extends('dashboard.layouts.app')

@section('content')
    <form action="{{ route('dashboard.settings.store') }}" method="POST" class="needs-validation card shadow mb-4"
        enctype="multipart/form-data" novalidate>
        @csrf
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-center text-primary">الإعدادات</h6>
        </div>
        <div class="card-body">

            <div class="row">

                @foreach ($settings as $setting)
                    @if ($setting->type == 'file')
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="price_from">{{ $setting->neckname }}</label>
                                <input type="file" id="{{ $setting->key }}" name="{{ $setting->key }}"
                                    accept="image/png, image/jpeg, image/jpg" class="form-control image" aria-label="Name"
                                    aria-describedby="basic-addon-name" require />
                                <div class="">
                                    @if ($errors->has($setting->key))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group prev">
                                <img src="{{ url('storage/' . $setting->value) }}" style="width: 100px"
                                    class="img-thumbnail preview-{{ $setting->key }}" alt="">
                            </div>
                        </div>
                    @elseif($setting->type == 'text' && $setting->key != 'address')
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="title">{{ $setting->neckname }} </label>
                                <input type="{{ $setting->type }}" id="{{ $setting->key }}" name="{{ $setting->key }}"
                                    value="{{ $setting->value }}" class="form-control image" aria-label="Name"
                                    aria-describedby="basic-addon-name" require />
                                <div class="">
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @elseif($setting->type == 'url')
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="title">{{ $setting->neckname }} </label>
                                <input type="{{ $setting->type }}" id="{{ $setting->key }}" name="{{ $setting->key }}"
                                    value="{{ $setting->value }}" class="form-control image" aria-label="Name"
                                    aria-describedby="basic-addon-name" require />
                                <div class="">
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @elseif($setting->type == 'textarea')
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="title">{{ $setting->neckname }} </label>
                                <textarea name="{{ $setting->key }}" class="form-control" name="{{ $setting->key }}" id="{{ $setting->key }}"
                                    cols="30" rows="10" require>{{ $setting->value }}</textarea>
                                <div class="">
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @elseif($setting->type == 'json')
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="title">{{ $setting->neckname }} </label>
                                @foreach (json_decode($setting->value) as $value)
                                    <div class="row my-2">
                                        <div class="col-md-8">
                                            <input type="text" name="{{ $setting->key }}[]" class="form-control"
                                                value="{{ $value }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <a class="btn btn-danger remove-btn">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="">
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <a class="btn btn-primary add-btn">
                                    <i data-feather='plus'></i>
                                </a>
                            </div>
                        </div>
                    @elseif($setting->type == 'number')
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="title">{{ $setting->neckname }} </label>
                                <input type="{{ $setting->key == 'phone' ? 'text' : $setting->type }}"
                                    id="{{ $setting->key }}" name="{{ $setting->key }}" value="{{ $setting->value }}"
                                    class="form-control {{ $setting->key }}" aria-label="Name"
                                    aria-describedby="basic-addon-name" require />
                                <div class="">
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @elseif($setting->type == 'email')
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="title">{{ $setting->neckname }} </label>
                                <input type="{{ $setting->type }}" id="{{ $setting->key }}" name="{{ $setting->key }}"
                                    value="{{ $setting->value }}" class="form-control image" aria-label="Name"
                                    aria-describedby="basic-addon-name" require />
                                <div class="">
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @elseif($setting->key == 'address')
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">{{ $setting->neckname }} </label>
                                <input type="{{ $setting->type }}" id="{{ $setting->key }}" name="{{ $setting->key }}"
                                    value="{{ $setting->value }}" class="form-control" required />
                                {{-- <div id="map" style="height: 500px"></div> --}}
                            </div>
                        </div>
                    @elseif($setting->key == 'lat')
                        <input type="hidden" name="{{ $setting->key }}" id="{{ $setting->key }}"
                            value="{{ $setting->value }}">
                    @elseif($setting->key == 'lng')
                        <input type="hidden" name="{{ $setting->key }}" id="{{ $setting->key }}"
                            value="{{ $setting->value }}">
                    @endif
                @endforeach
            </div>

            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">تحديث <i data-feather="edit"></i></button>
                </div>
            </div>
        </div>
    </form>
    @push('js')
        {{-- <script src="{{ asset('admin/js/custom/map.js') }}"></script> --}}
        {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdarVlRZOccFIGWJiJ2cFY8-Sr26ibiyY&libraries=places&callback=initAutocomplete&language=ar
                                                                async defer"></script> --}}
        <script src="{{ asset('admin/js/custom/preview-image.js') }}"></script>
        <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
        <script src="{{ asset('admin/js/custom/settingsCkeditor.js') }}"></script>
    @endpush
@endsection
