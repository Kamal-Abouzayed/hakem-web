@extends('dashboard.layouts.app')

@section('content')
    <form class="form form-vertical dropzone" id="myDropzone" action="{{ route('dashboard.images.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf

        <div class="card-header d-flex justify-content-between py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $pageTitle }}</h6>

            <a class="btn btn-outline-primary" href="{{ route('dashboard.images.index') }}">معرض الصور
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>
    </form>

    {{-- <form class="card shadow mb-4" action="{{ route('dashboard.videos.store') }}" method="POST"
        enctype="multipart/form-data" id="createVideoForm">
        @csrf
        <div class="card-header d-flex justify-content-between py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $pageTitle }}</h6>

            <a class="btn btn-outline-primary" href="{{ route('dashboard.images.index') }}">معرض الصور
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="form-group col-12">
                    <label for="url">الرابط</label>
                    <input type="url" class="form-control" name="url" autocomplete="url" value="{{ old('url') }}"
                        required>

                    @error('url')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="name_ar">العنوان بالعربية</label>
                    <input type="text" class="form-control" name="name_ar" autocomplete="name_ar"
                        value="{{ old('name_ar') }}" required>

                    @error('name_ar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="name_en">العنوان بالإنجليزية</label>
                    <input type="text" class="form-control" name="name_en" autocomplete="name_en"
                        value="{{ old('name_en') }}" required>

                    @error('name_en')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="desc_ar">الإجابة بالعربية</label>
                    <textarea class="form-control" name="desc_ar" id="" cols="30" rows="10" required>{{ old('desc_ar') }}</textarea>

                    @error('desc_ar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="desc_en">الإجابة بالإنجليزية</label>
                    <textarea class="form-control" name="desc_en" id="" cols="30" rows="10" required>{{ old('desc_en') }}</textarea>

                    @error('desc_en')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </div>
    </form> --}}

    @push('css')
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    @endpush

    @push('js')
        <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

        <script src="{{ asset('admin/js/validation/imageValidation.js') }}"></script>
        <script src="{{ asset('admin/js/custom/preview-image.js') }}"></script>
        <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
        <script src="{{ asset('admin/js/custom/ckeditor.js') }}"></script>
    @endpush
@endsection
