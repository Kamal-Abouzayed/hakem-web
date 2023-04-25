@extends('dashboard.layouts.app')

@section('content')
    <form class="card shadow mb-4" action="{{ route('dashboard.organs.update', $organ->slug) }}" method="POST"
        enctype="multipart/form-data" id="updateOrganForm">
        @csrf
        @method('PATCH')
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $organ->name_ar }}</h6>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="formFile" class="form-label">الصورة</label>
                        <input class="form-control image" type="file" id="formFile" name="img"
                            accept="image/png, image/jpeg">
                        @error('img')
                            <span class="alert alert-danger">
                                <small class="errorTxt">{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group prev">
                        <img src="{{ asset('storage/' . $organ->img) }}" style="width: 100px"
                            class="img-thumbnail preview-formFile" alt="">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-12">
                    <label for="body_system_id">القسم</label>

                    <select name="body_system_id" class="form-control" id="">
                        <option value="">اختر</option>
                        @foreach ($bodySystems as $bodySystem)
                            <option value="{{ $bodySystem->id }}"
                                {{ old('body_system_id', $organ->body_system_id) == $bodySystem->id ? 'selected' : '' }}>
                                {{ $bodySystem->name }}</option>
                        @endforeach
                    </select>

                    @error('body_system_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="name_ar">العنوان بالعربية</label>
                    <input type="text" class="form-control" name="name_ar" autocomplete="name_ar"
                        value="{{ old('name_ar', $organ->name_ar) }}" required>

                    @error('name_ar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="name_en">العنوان بالإنجليزية</label>
                    <input type="text" class="form-control" name="name_en" autocomplete="name_en"
                        value="{{ old('name_en', $organ->name_en) }}" required>

                    @error('name_en')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="desc_ar">المحتوى بالعربية</label>
                    <textarea class="form-control" name="desc_ar" id="desc_ar" cols="30" rows="10">{{ old('desc_ar', $organ->desc_ar) }}</textarea>
                    @error('desc_ar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="desc_en">المحتوى بالإنجليزية</label>
                    <textarea class="form-control" name="desc_en" id="desc_en" cols="30" rows="10">{{ old('desc_en', $organ->desc_en) }}</textarea>
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
        <script src="{{ asset('admin/js/custom/preview-image.js') }}"></script>
        <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
        <script src="{{ asset('admin/js/custom/ckeditor.js') }}"></script>
        <script src="{{ asset('admin/js/validation/organValidation.js') }}"></script>
    @endpush
@endsection
