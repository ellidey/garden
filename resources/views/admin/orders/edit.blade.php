@extends('layouts.master')
@section('title') Магазин @endsection
@section('css')
    <link href="assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Админ панель @endslot
        @slot('title') Заказы @endslot
    @endcomponent

    <div class="row d-flex justify-content-center">
        <div class="card col-lg-5">
            <div class="card-header mb-3">
                <span class="fs-15">Обзор заказа</span>
            </div>

            <div class="table-responsive table-card">
                <table class="table table-nowrap align-middle table-borderless mb-0">
                    <thead class="table-light text-muted">
                    <tr>
                        <th scope="col">Детали заказа</th>
                        <th scope="col">Цена</th>
                        <th scope="col" class="text-center">Количество</th>
                        <th scope="col" class="text-end">Стоимость</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->positions as $position)
                        <tr>
                            <td>
                                <div class="d-flex">
                                    <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                        <img src="{{ URL::asset('images/' . $position->item->image) }}" alt="" class="img-fluid d-block">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="fs-15 mt-2"><a href="{{ route('item', $position->item->id) }}" class="link-primary">
                                                {{ $position->item->name }}
                                            </a></h5>
                                    </div>
                                </div>
                            </td>
                            <td class="fs-14">{{ $position->item->cost }}р</td>
                            <td class="fs-14 text-center">{{ $position->amount }}</td>
                            <td class="fw-medium text-end">
                                {{ $position->item->cost * $position->amount }}р
                            </td>
                        </tr>
                    @endforeach

                    <tr class="border-top border-top-dashed">
                        <td colspan="3"></td>
                        <td colspan="2" class="fw-medium p-0">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                <tr class="fs-15 fw-bold">
                                    <td>Всего:</td>
                                    <td class="text-end">{{ $price }} рублей</td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <form method="POST" action="{{ route('orders.update', $order->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @if ($order->confirm)
                    <button type="submit" class="btn btn-danger btn-label waves-effect waves-light mb-4 mt-1">
                        <i class="ri-save-2-line label-icon align-middle fs-16 me-2"></i>
                        Отменить подтверждение
                    </button>
                @else
                    <button type="submit" class="btn btn-success btn-label waves-effect waves-light mb-4 mt-1">
                        <i class="ri-save-2-line label-icon align-middle fs-16 me-2"></i>
                        Подтвердить
                    </button>

                @endif
            </form>
        </div>
    </div>

@endsection

