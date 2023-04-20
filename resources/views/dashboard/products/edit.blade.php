@extends('dashboard.layouts.app')

@section('content')
    <form class="card shadow mb-4" action="{{ route('dashboard.products.update', $product->id) }}" method="POST"
        enctype="multipart/form-data" id="updateProductForm">
        @csrf
        @method('PATCH')
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $product->title_ar }}</h6>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="form-group col-6">
                    <label for="title_ar">إسم المنتج بالعربية</label>
                    <input type="text" class="form-control" name="title_ar" autocomplete="title_ar"
                        value="{{ old('title_ar', $product->title_ar) }}" required>
                </div>
                <div class="form-group col-6">
                    <label for="title_en">إسم المنتج بالإنجليزية</label>
                    <input type="text" class="form-control" name="title_en" autocomplete="title_en"
                        value="{{ old('title_en', $product->title_en) }}" required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="price">سعر المنتج</label>
                    <input type="number" min="0" class="form-control" name="price" autocomplete="price"
                        value="{{ old('price', $product->price) }}" required>
                </div>
                <div class="form-group col-6">
                    <label for="discount">قيمة الخصم</label>
                    <input type="number" min="0" class="form-control" name="discount" autocomplete="discount"
                        value="{{ old('discount', $product->discount) }}">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="desc_ar">وصف المنتج بالعربية</label>
                    <textarea class="form-control" name="desc_ar" id="" cols="30" rows="10" required>{{ old('desc_ar', $product->desc_ar) }}</textarea>
                </div>
                <div class="form-group col-6">
                    <label for="desc_en">وصف المنتج بالإنجليزية</label>
                    <textarea class="form-control" name="desc_en" id="" cols="30" rows="10" required>{{ old('desc_en', $product->desc_en) }}</textarea>
                </div>
            </div>

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
                        <img src="{{ asset('storage/' . $product->image) }}" style="width: 100px"
                            class="img-thumbnail preview-formFile" alt="">
                    </div>
                </div>
            </div>


            <div>
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </div>
    </form>

    @push('js')
        <script src="{{ asset('admin/js/validation/productValidation.js') }}"></script>
        <script src="{{ asset('admin/js/custom/preview-image.js') }}"></script>
    @endpush
@endsection
