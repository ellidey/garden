@extends('layouts.master')
@section('title') @lang('translation.order-details') @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Магазин @endslot
@slot('title') Создание заказа @endslot
@endcomponent
<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h5 class="card-title flex-grow-1 mb-0 fw-bold">Заказ</h5>
                </div>
            </div>
            <div class="card-body">
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
                            @foreach($positions as $position)
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
            </div>
        </div><!--end card-->
    </div>

    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h5 class="card-title flex-grow-1 mb-0 fw-bold">Оформление</h5>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('orders.store') }}">
                    @csrf
                    <div class="row mb-4">
                        <div class="input-group"  style="width: 33%">
                        <span class="input-group-text">
                            <i class="ri-user-line"></i>
                        </span>
                            <input name="surname" type="text" class="form-control @error('surname') is-invalid @enderror"
                                   placeholder="Фамилия" value="{{ old('surname') }}" required>
                        </div>
                        <div class="input-group"  style="width: 33%">
                        <span class="input-group-text">
                            <i class="ri-user-2-line"></i>
                        </span>
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   placeholder="Имя" value="{{ old('name') }}" required>
                        </div>
                        <div class="input-group" style="width: 34%">
                        <span class="input-group-text">
                            <i class="ri-user-5-line"></i>
                        </span>
                            <input name="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror"
                                   placeholder="Отчество" value="{{ old('lastname') }}">
                        </div>
                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text">
                            <i class="ri-home-5-line"></i>
                        </span>
                        <input name="address" type="text" class="form-control @error('address') is-invalid @enderror"
                               placeholder="Адрес" value="{{ old('address') }}" required>
                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text">
                            <i class="ri-inbox-line"></i>
                        </span>
                        <input name="index" type="text" class="form-control @error('index') is-invalid @enderror"
                               placeholder="Индекс" value="{{ old('index') }}" required>
                    </div>

                    <button type="submit" class="btn btn-success btn-label waves-effect waves-light mb-4 mt-1">
                        <i class="ri-send-plane-line label-icon align-middle fs-16 me-2"></i>
                        Отправить
                    </button>
                </form>
            </div>
        </div>
    <div>
</div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
