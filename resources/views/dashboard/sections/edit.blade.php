@extends('dashboard.layouts.app')

@section('content')
    <form class="card shadow mb-4" action="{{ route('dashboard.sections.update', $section->id) }}" method="POST"
        enctype="multipart/form-data" id="updateSectionForm">
        @csrf
        @method('PATCH')
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $section->name_ar }}</h6>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="formFile" class="form-label">الصورة</label>
                        <input class="form-control image" type="file" id="formFile" name="img">
                        @error('img')
                            <span class="alert alert-danger">
                                <small class="errorTxt">{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group prev">
                        <img src="{{ asset('storage/' . $section->img) }}" style="width: 100px"
                            class="img-thumbnail preview-formFile" alt="">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="name_ar">اسم القسم بالعربية</label>
                    <input type="text" class="form-control" name="name_ar" autocomplete="name_ar"
                        value="{{ old('name_ar', $section->name_ar) }}" required>
                </div>
                <div class="form-group col-6">
                    <label for="name_en">اسم القسم بالإنجليزية</label>
                    <input type="text" class="form-control" name="name_en" autocomplete="name_en"
                        value="{{ old('name_en', $section->name_en) }}" required>
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </div>
    </form>

    @push('js')
        <script src="{{ asset('admin/js/validation/sectionValidation.js') }}"></script>
        <script src="{{ asset('admin/js/custom/preview-image.js') }}"></script>
    @endpush
@endsection
