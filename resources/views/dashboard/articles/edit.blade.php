@extends('dashboard.layouts.app')

@section('content')
    <form class="card shadow mb-4"
        action="{{ route('dashboard.articles.update', ['sectionSlug' => request()->sectionSlug, 'article' => $article->slug]) }}"
        method="POST" enctype="multipart/form-data" id="updateArticleForm">
        @csrf
        @method('PATCH')
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $article->name_ar }}</h6>
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
                        <img src="{{ asset('storage/' . $article->img) }}" style="width: 100px"
                            class="img-thumbnail preview-formFile" alt="">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-12">
                    <label for="category_id">القسم</label>

                    <select name="category_id" class="form-control" id="">
                        <option value="">اختر</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            @if (request()->sectionSlug == 'diseases')
                <div class="row">
                    <div class="form-group col-12">
                        <label for="medicine_id">الأدوية</label>
                        <select name="medicine_id[]" class="form-control" id="" multiple required>
                            {{-- <option value="">اختر</option> --}}
                            @foreach ($medicines as $medicine)
                                <option value="{{ $medicine->id }}"
                                    {{ old('medicine_id') == $medicine->id || $article->medicines->contains('id', $medicine->id) ? 'selected' : '' }}>
                                    {{ $medicine->name }}</option>
                            @endforeach
                        </select>

                        @error('medicine_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="form-group col-6">
                    <label for="name_ar">العنوان بالعربية</label>
                    <input type="text" class="form-control" name="name_ar" autocomplete="name_ar"
                        value="{{ old('name_ar', $article->name_ar) }}" required>

                    @error('name_ar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="name_en">العنوان بالإنجليزية</label>
                    <input type="text" class="form-control" name="name_en" autocomplete="name_en"
                        value="{{ old('name_en', $article->name_en) }}" required>

                    @error('name_en')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="desc_ar">المحتوى بالعربية</label>
                    <textarea class="form-control" name="desc_ar" id="desc_ar" cols="30" rows="10">{{ old('desc_ar', $article->desc_ar) }}</textarea>
                    @error('desc_ar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="desc_en">المحتوى بالإنجليزية</label>
                    <textarea class="form-control" name="desc_en" id="desc_en" cols="30" rows="10">{{ old('desc_en', $article->desc_en) }}</textarea>
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
        <script src="{{ asset('admin/js/validation/articleValidation.js') }}"></script>
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
