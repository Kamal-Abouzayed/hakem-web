@extends('dashboard.layouts.app')

@section('content')
    <form class="card shadow mb-4" action="{{ route('dashboard.ads.update', $ad->id) }}" method="POST"
        enctype="multipart/form-data" id="updateAdForm">
        @csrf
        @method('PATCH')
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $ad->name_ar }}</h6>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-6">
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
                        <img src="{{ asset('storage/' . $ad->img) }}" style="width: 100px"
                            class="img-thumbnail preview-formFile" alt="">
                    </div>

                    @error('img')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group col-6">
                    <label for="link">الرابط</label>
                    <input type="url" class="form-control" name="link" value="{{ old('link', $ad->link) }}" required>

                    @error('link')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="desc_ar">المحتوى بالعربية</label>
                    <textarea class="form-control" name="desc_ar" id="" cols="30" rows="10" required>{{ old('desc_ar', $ad->desc_ar) }}</textarea>

                    @error('desc_ar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="desc_en">المحتوى بالإنجليزية</label>
                    <textarea class="form-control" name="desc_en" id="" cols="30" rows="10" required>{{ old('desc_en', $ad->desc_en) }}</textarea>

                    @error('desc_en')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="btn_text_ar">نص الرابط بالعربية</label>
                    <input type="text" class="form-control" name="btn_text_ar" autocomplete="btn_text_ar"
                        value="{{ old('btn_text_ar', $ad->btn_text_ar) }}" required>

                    @error('btn_text_ar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="btn_text_en">نص الرابط بالإنجليزية</label>
                    <input type="text" class="form-control" name="btn_text_en" autocomplete="btn_text_en"
                        value="{{ old('btn_text_en', $ad->btn_text_en) }}" required>

                    @error('btn_text_en')
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
        <script src="{{ asset('admin/js/validation/adValidation.js') }}"></script>
        <script src="{{ asset('admin/js/custom/preview-image.js') }}"></script>
    @endpush
@endsection
