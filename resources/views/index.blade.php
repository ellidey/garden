@extends('layouts.master')
@section('title') Магазин @endsection
@section('css')
<link href="assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Магазин @endslot
@slot('title') Каталог товаров @endslot
@endcomponent

<div class="row">
    @foreach ($items as $item)
        <div class="col-sm-6 col-xl-3">
            <!-- Simple card -->
            <div class="card">
                <div class="overflow-hidden" style="height: 300px;">
                    <img style="min-height: 100%;" class="card-img-top img-fluid" src="{{ URL::asset('images/' . $item->image) }}" alt="Card image cap">
                </div>
                <div class="card-body">
                    <h4 class="card-title mb-2"> {{ $item->name }} </h4>
                    <p class="card-text">{{ mb_strimwidth($item->description, 0, 35, '...') }}</p>
                    <div class="text-end">
                        <a href="{{ route('item', $item->id) }}" class="btn btn-primary">
                            <i class="ri-shopping-cart-2-line"></i>
                             Подробнее
                        </a>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    @endforeach
</div>

@endsection
@section('script')
<!-- apexcharts -->
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/swiper/swiper.min.js')}}"></script>
<!-- dashboard init -->
<script src="{{ URL::asset('/assets/js/pages/dashboard-ecommerce.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
