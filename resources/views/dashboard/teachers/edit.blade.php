@extends('dashboard.layouts.app')

@section('content')
    <form class="card shadow mb-4" action="{{ route('dashboard.features.update', $feature->id) }}" method="POST"
        enctype="multipart/form-data" id="updateFeatureForm">
        @csrf
        @method('PATCH')
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $feature->title_ar }}</h6>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="formFile" class="form-label">الصورة</label>
                        <input class="form-control image" type="file" id="formFile" name="image">
                        @error('image')
                            <span class="alert alert-danger">
                                <small class="errorTxt">{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group prev">
                        <img src="{{ asset('storage/' . $feature->image) }}" style="width: 100px" class="img-thumbnail preview-formFile" alt="">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="title_ar">العنوان بالعربية</label>
                    <input type="text" class="form-control" name="title_ar" autocomplete="title_ar"
                        value="{{ old('title_ar', $feature->title_ar) }}" required>
                </div>
                <div class="form-group col-6">
                    <label for="title_en">العنوان بالإنجليزية</label>
                    <input type="text" class="form-control" name="title_en" autocomplete="title_en"
                        value="{{ old('title_en', $feature->title_en) }}" required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="desc_ar">المحتوى بالعربية</label>
                    <textarea class="form-control" name="desc_ar" id="" cols="30" rows="10" required>{{ old('desc_ar', $feature->desc_ar) }}</textarea>
                </div>
                <div class="form-group col-6">
                    <label for="desc_en">المحتوى بالإنجليزية</label>
                    <textarea class="form-control" name="desc_en" id="" cols="30" rows="10" required>{{ old('desc_en', $feature->desc_en) }}</textarea>
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </div>
    </form>

    @push('js')
        <script src="{{ asset('admin/js/validation/featureValidation.js') }}"></script>
        <script src="{{ asset('admin/js/custom/preview-image.js') }}"></script>
    @endpush
@endsection
