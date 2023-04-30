@extends('dashboard.layouts.app')

@section('content')
    <form class="card shadow mb-4" action="{{ route('dashboard.videos.update', $video->slug) }}" method="POST"
        enctype="multipart/form-data" id="updatevideoForm">
        @csrf
        @method('PATCH')
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $video->name_ar }}</h6>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="form-group col-12">
                    <label for="url">الرابط</label>
                    <input type="url" class="form-control" name="url" autocomplete="url"
                        value="{{ old('url', $video->url) }}" required>

                    @error('url')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="name_ar">العنوان بالعربية</label>
                    <input type="text" class="form-control" name="name_ar" autocomplete="name_ar"
                        value="{{ old('name_ar', $video->name_ar) }}" required>

                    @error('name_ar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="name_en">العنوان بالإنجليزية</label>
                    <input type="text" class="form-control" name="name_en" autocomplete="name_en"
                        value="{{ old('name_en', $video->name_en) }}" required>

                    @error('name_en')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="desc_ar">الإجابة بالعربية</label>
                    <textarea class="form-control" name="desc_ar" id="desc_ar" cols="30" rows="10" required>{{ old('desc_ar', $video->desc_ar) }}</textarea>

                    @error('desc_ar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="desc_en">الإجابة بالإنجليزية</label>
                    <textarea class="form-control" name="desc_en" id="desc_en" cols="30" rows="10" required>{{ old('desc_en', $video->desc_en) }}</textarea>

                    @error('desc_en')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </div>
    </form>

    @push('js')
        <script src="{{ asset('admin/js/validation/videoValidation.js') }}"></script>
        <script src="{{ asset('admin/js/custom/preview-image.js') }}"></script>
        {{-- <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
        <script src="{{ asset('admin/js/custom/ckeditor.js') }}"></script> --}}

        <script>
            $(document).ready(function() {
                $('#desc_ar').summernote({
                    lang: 'ar-Eg'
                });
                $('#desc_en').summernote({
                    lang: 'en-US'
                });
            });
        </script>
    @endpush
@endsection
