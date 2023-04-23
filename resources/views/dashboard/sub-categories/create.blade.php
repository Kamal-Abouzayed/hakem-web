@extends('dashboard.layouts.app')

@section('content')
    <form class="card shadow mb-4" action="{{ route('dashboard.sub-categories.store', request()->sectionSlug) }}"
        method="POST" enctype="multipart/form-data" id="createServiceForm">
        @csrf
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $pageTitle }}</h6>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="formFile" class="form-label">الصورة</label>
                        <input class="form-control image" type="file" id="formFile" name="img"
                            accept="image/png, image/jpeg" required>
                        @error('img')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group prev">
                        <img src="" style="width: 100px" class="img-thumbnail preview-formFile" alt="">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-12">
                    <label for="parent_id" class="form-label">القسم الرئيسى</label>
                    <select name="parent_id" class="form-control" id="" required>
                        <option value="">اختر</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('parent_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name_ar }}</option>
                        @endforeach
                    </select>
                    @error('parent_id')
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
                    <label for="desc_ar">المحتوى بالعربية</label>
                    <textarea class="form-control" name="desc_ar" id="" cols="30" rows="10" required>{{ old('desc_ar') }}</textarea>
                    @error('desc_ar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="desc_en">المحتوى بالإنجليزية</label>
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
    </form>

    @push('js')
        <script src="{{ asset('admin/js/validation/serviceValidation.js') }}"></script>
        <script src="{{ asset('admin/js/custom/preview-image.js') }}"></script>
    @endpush
@endsection
