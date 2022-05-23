@extends('layouts.master')
@section('title') @lang('translation.product-Details') @endsection
@section('css')
    <link href="assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />

@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Магазин @endslot
        @slot('title')Информация о продукте @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row gx-lg-5">
                        <div class="col-xl-4 col-md-8 mx-auto">
                            <div class="product-img-slider sticky-side-div">
                                <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                                    <div class="swiper-wrapper">
                                        <img src="{{ URL::asset('images/' . $item->image) }}" alt=""
                                             class="img-fluid d-block" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-8">
                            <div class="mt-xl-0 mt-5">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <h4>{{ $item->name }}</h4>
                                    </div>
                                    @if (Auth::user() && Auth::user()->role_id == 1)
                                        <div class="flex-shrink-0">
                                            <div>
                                                <a href="{{ route('items.edit', $item->id) }}"
                                                   class="btn btn-light" data-bs-toggle="tooltip"
                                                   data-bs-placement="top" title="Edit"><i
                                                        class="ri-pencil-fill align-bottom"></i></a>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="p-2 border border-dashed rounded">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-2">
                                                    <div
                                                        class="avatar-title rounded bg-transparent text-success fs-24">
                                                        <i class="ri-money-dollar-circle-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="text-muted mb-1">Цена:</p>
                                                    <h5 class="mb-0">{{ $item->cost }} рублей</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 text-muted">
                                    <h5 class="fs-14">Описание:</h5>
                                    <p>{{ $item->description }}</p>
                                </div>
                            </div>

                            @if (Auth::user())
                                <div class="mt-4 text-muted">
                                    <div>
                                        <h5 class="fs-13 fw-medium text-muted">Default</h5>
                                        <form method="POST" action="{{ route('basket.add', $item->id) }}">
                                            @csrf
                                            <div class="input-step">
                                                <button type="button" class="minus">–</button>
                                                <input name="amount" type="number" class="product-quantity" value="2" min="1" max="100" readonly>
                                                <button type="button" class="plus">+</button>
                                            </div>

                                            <button type="submit" class="btn btn-secondary waves-effect waves-light" style="margin-bottom: 5px">Добавить в карзину</button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
@section('script')
    <script src="{{ URL::asset('assets/js/pages/form-input-spin.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
