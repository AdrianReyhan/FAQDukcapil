@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Dashboard') }}
        </div>
        <div class="card-body">
            <!-- Row for additional statistics cards -->
            <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1006">
                <div class="row g-4">
                    <div class="col-12 col-sm-6 col-xl-4 col-xxl-3">
                        <div class="card overflow-hidden">
                            <a href="{{ route('categories.index') }}">
                                <div class="card-body p-0 d-flex align-items-center">
                                    <div class="bg-primary text-white p-4 me-3">
                                        <svg class="icon icon-xl">
                                            <use xlink:href="{{ asset('icons/coreui.svg#cil-newspaper') }}"></use>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="fs-6 fw-semibold text-primary">{{ $categoryCount }}</div>
                                        <div class="text-body-secondary text-uppercase fw-semibold small">Kategori</div>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                    <!-- /.col-->
                    <div class="col-12 col-sm-6 col-xl-4 col-xxl-3">
                        <div class="card overflow-hidden">
                            <a href="{{ route('articles.index') }}">

                                <div class="card-body p-0 d-flex align-items-center">
                                    <div class="bg-info text-white p-4 me-3">
                                        <svg class="icon icon-xl">
                                            <use xlink:href="{{ asset('icons/coreui.svg#cil-description') }}"></use>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="fs-6 fw-semibold text-info">{{ $articleCount }}</div>
                                        <div class="text-body-secondary text-uppercase fw-semibold small">Artikel</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- /.col-->
                    <div class="col-12 col-sm-6 col-xl-4 col-xxl-3">
                        <div class="card overflow-hidden">
                            <a href="{{ route('tags.index') }}">
                                <div class="card-body p-0 d-flex align-items-center">
                                    <div class="bg-warning text-white p-4 me-3">
                                        <svg class="icon icon-xl">
                                            <use xlink:href="{{ asset('icons/coreui.svg#cil-tag') }}"></use>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="fs-6 fw-semibold text-warning">{{ $tagCount }}</div>
                                        <div class="text-body-secondary text-uppercase fw-semibold small">Tag</div>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                    <!-- /.col-->
                    <div class="col-12 col-sm-6 col-xl-4 col-xxl-3">
                        <div class="card overflow-hidden">
                            <div class="card-body p-0 d-flex align-items-center">
                                <div class="bg-danger text-white p-4 me-3">
                                    <svg class="icon icon-xl">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                                    </svg>
                                </div>
                                <div>
                                    <div class="fs-6 fw-semibold text-danger">$1.999,50</div>
                                    <div class="text-body-secondary text-uppercase fw-semibold small">Widget title</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                </div>
            </div>
        </div>
    </div>
@endsection
