@extends('dashboard.layouts.app')

@section('content')
    <form class="card shadow mb-4" action="{{ route('dashboard.faqs.store') }}" method="POST" enctype="multipart/form-data"
        id="createFaqForm">
        @csrf
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $pageTitle }}</h6>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="form-group col-6">
                    <label for="question_ar">السؤال بالعربية</label>
                    <input type="text" class="form-control" name="question_ar" autocomplete="question_ar"
                        value="{{ old('question_ar') }}" required>

                    @error('question_ar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="question_en">السؤال بالإنجليزية</label>
                    <input type="text" class="form-control" name="question_en" autocomplete="question_en"
                        value="{{ old('question_en') }}" required>

                    @error('question_en')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="answer_ar">الإجابة بالعربية</label>
                    <textarea class="form-control" name="answer_ar" id="" cols="30" rows="10" required>{{ old('answer_ar') }}</textarea>

                    @error('answer_ar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="answer_en">الإجابة بالإنجليزية</label>
                    <textarea class="form-control" name="answer_en" id="" cols="30" rows="10" required>{{ old('answer_en') }}</textarea>

                    @error('answer_en')
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
        <script src="{{ asset('admin/js/validation/faqValidation.js') }}"></script>
        <script src="{{ asset('admin/js/custom/preview-image.js') }}"></script>
        <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
        <script src="{{ asset('admin/js/custom/faqCkeditor.js') }}"></script>
    @endpush
@endsection
