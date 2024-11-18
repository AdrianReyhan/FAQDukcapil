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
                            <div class="card-body p-0 d-flex align-items-center">
                                <div class="bg-primary text-white p-4 me-3">
                                    <svg class="icon icon-xl">
                                        <use xlink:href="{{ asset('icons/coreui.svg#cil-bug') }}"></use>
                                    </svg>
                                </div>
                                <div>
                                    <div class="fs-6 fw-semibold text-primary">$1.999,50</div>
                                    <div class="text-body-secondary text-uppercase fw-semibold small">Widget title</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                    <div class="col-12 col-sm-6 col-xl-4 col-xxl-3">
                        <div class="card overflow-hidden">
                            <div class="card-body p-0 d-flex align-items-center">
                                <div class="bg-info text-white p-4 me-3">
                                    <svg class="icon icon-xl">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-laptop"></use>
                                    </svg>
                                </div>
                                <div>
                                    <div class="fs-6 fw-semibold text-info">$1.999,50</div>
                                    <div class="text-body-secondary text-uppercase fw-semibold small">Widget title</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                    <div class="col-12 col-sm-6 col-xl-4 col-xxl-3">
                        <div class="card overflow-hidden">
                            <div class="card-body p-0 d-flex align-items-center">
                                <div class="bg-warning text-white p-4 me-3">
                                    <svg class="icon icon-xl">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-moon"></use>
                                    </svg>
                                </div>
                                <div>
                                    <div class="fs-6 fw-semibold text-warning">$1.999,50</div>
                                    <div class="text-body-secondary text-uppercase fw-semibold small">Widget title</div>
                                </div>
                            </div>
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
