@extends('layouts.master')
@section('title') Заказы @endsection
@section('css')
    <link href="assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Админ панель @endslot
        @slot('title') Заказы @endslot
    @endcomponent

    <div class="row">
        <div class="card">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Фамилия</th>
                    <th scope="col">Отчество</th>
                    <th scope="col">Адрес</th>
                    <th scope="col">Индекс</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Создан</th>
                    <th scope="col">Изменен</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <th scope="row">{{ $order->id }}</th>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->surname }}</td>
                        <td>{{ $order->lastname }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->index }}</td>
                        <td>
                            @if ($order->confirm)
                                <span class="badge bg-success">Подтвержден</span>
                            @else
                                <span class="badge bg-danger">Не подтвержден</span>
                            @endif
                        </td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->updated_at }}</td>

                        <td>
                            <a href="{{ route('orders.edit', $order->id) }}"
                               class="btn btn-primary btn-icon waves-effect waves-light"
                            >
                                <i class="ri-edit-2-line"></i>
                            </a>
                            <form class="d-inline" method="POST" action="{{route('orders.destroy', $order->id) }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-delete-bin-5-line"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
