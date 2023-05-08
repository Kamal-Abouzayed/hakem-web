@extends('dashboard.layouts.app')

@section('content')
    {{-- <div class="text-center">
        {!! \App\Traits\Intro::introduction() !!}
    </div> --}}

    <!-- Content Row -->


    @if (auth()->user()->hasRole('admin'))
        <div class="col-12 mb-4">
            <div class="card">
                <div class="col-12 card-header text-center py-2" style="font-size: 30px;">
                    عام
                </div>

                <div class="card-body row">
                    <!-- users -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-right-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-l font-weight-bold text-uppercase mb-1">
                                            <a class="text-primary" href="{{ route('dashboard.users.index') }}">
                                                المستخدمين
                                            </a>

                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-users fa-2x" style="color: #5277e5;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- videos -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-right-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-l font-weight-bold text-uppercase mb-1">
                                            <a class="text-success" href="{{ route('dashboard.videos.index') }}">
                                                الفيديوهات
                                            </a>

                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $videos }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-video fa-2x" style="color: #1cc88a;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <!-- images -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-right-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-l font-weight-bold text-uppercase mb-1">
                                        <a class="text-danger" href="{{ route('dashboard.images.index') }}">
                                            معرض الصور
                                        </a>
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $images }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa-solid fa-images fa-2x" style="color: #e74a3b;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                    <!-- ads -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-right-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-l font-weight-bold text-uppercase mb-1">
                                            <a class="text-warning" href="{{ route('dashboard.ads.index') }}">
                                                الإعلانات
                                            </a>
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $adsCount }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-rectangle-ad fa-2x" style="color: #f6c23e;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- employees -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-right-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-l font-weight-bold text-uppercase mb-1">
                                            <a class="text-primary" href="{{ route('dashboard.employees.index') }}">
                                                الموظفين
                                            </a>

                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $employees }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-users fa-2x" style="color: #5277e5;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- visitors -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-right-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-l font-weight-bold text-uppercase mb-1">
                                            <a class="text-success" href="">
                                                زيارات الموقع
                                            </a>

                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $visitors }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-eye-low-vision fa-2x" style="color: #1cc88a;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        @foreach ($sections as $section)
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="col-12 card-header text-center py-2" style="font-size: 30px;">
                        {{ $section->name }}
                    </div>

                    <div class="card-body row">
                        <!-- main categories -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-right-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-l font-weight-bold text-uppercase mb-1">
                                                <a class="text-primary"
                                                    href="{{ route('dashboard.categories.index', ['sectionSlug' => $section->slug]) }}">
                                                    الأقسام الرئيسية
                                                </a>

                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ count($section->categories->where('parent_id', null)) }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-cubes fa-2x" style="color: #5277e5;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- articles -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-right-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-l font-weight-bold text-uppercase mb-1">
                                                <a class="text-danger"
                                                    href="{{ route('dashboard.articles.index', ['sectionSlug' => $section->slug]) }}">
                                                    المقالات
                                                </a>

                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ count($section->articles) }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-newspaper fa-2x" style="color: #e74a3b"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- advices -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-right-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-l font-weight-bold text-uppercase mb-1">
                                                <a class="text-warning"
                                                    href="{{ route('dashboard.advices.index', ['sectionSlug' => $section->slug]) }}">
                                                    النصائح
                                                </a>

                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ count($section->advices) }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-quote-right fa-2x" style="color: #f6c23e"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="col-12 mb-4">

            <h1 class="text-center">{{ __('Welcome') . ' ' . auth()->user()->full_name }}</h1>

        </div>
    @endif
@endsection
