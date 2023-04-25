@extends('dashboard.layouts.app')

@section('content')
    <form class="card shadow mb-4" action="{{ route('dashboard.pregnancy-stages.update', $stage->slug) }}" method="POST"
        enctype="multipart/form-data" id="updateStageForm">
        @csrf
        @method('PATCH')
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $stage->name_ar }}</h6>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="formFile" class="form-label">الصورة</label>
                        <input class="form-control image" type="file" id="formFile" name="img"
                            accept="image/png, image/jpeg">
                        @error('img')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group prev">
                        <img src="{{ asset('storage/' . $stage->img) }}" style="width: 100px"
                            class="img-thumbnail preview-formFile" alt="">
                    </div>
                </div>
            </div>

            @if ($stage->parent_id != null)
                <div class="row">
                    <div class="form-group col-12">
                        <label for="parent_id" class="form-label">المرحلة</label>
                        <select name="parent_id" class="form-control" id="" required>
                            <option value="">اختر</option>
                            @foreach ($parentStages as $parentStage)
                                <option value="{{ $parentStage->id }}"
                                    {{ old('parent_id', $stage->parent_id) == $parentStage->id ? 'selected' : '' }}>
                                    {{ $parentStage->name_ar }}</option>
                            @endforeach
                        </select>
                        @error('parent_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            @endif


            <div class="row">
                <div class="form-group col-6">
                    <label for="name_ar">العنوان بالعربية</label>
                    <input type="text" class="form-control" name="name_ar" autocomplete="name_ar"
                        value="{{ old('name_ar', $stage->name_ar) }}" required>
                    @error('name_ar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="name_en">العنوان بالإنجليزية</label>
                    <input type="text" class="form-control" name="name_en" autocomplete="name_en"
                        value="{{ old('name_en', $stage->name_en) }}" required>
                    @error('name_en')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="desc_ar">المحتوى بالعربية</label>
                    <textarea class="form-control" name="desc_ar" id="" cols="30" rows="10" required>{{ old('desc_ar', $stage->desc_ar) }}</textarea>
                    @error('desc_ar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="desc_en">المحتوى بالإنجليزية</label>
                    <textarea class="form-control" name="desc_en" id="" cols="30" rows="10" required>{{ old('desc_en', $stage->desc_en) }}</textarea>
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
        <script src="{{ asset('admin/js/validation/stageValidation.js') }}"></script>
        <script src="{{ asset('admin/js/custom/preview-image.js') }}"></script>
        <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
        <script src="{{ asset('admin/js/custom/ckeditor.js') }}"></script>
    @endpush
@endsection
