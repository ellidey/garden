@extends('layouts.master')
@section('title') Категории @endsection
@section('css')
    <link href="assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Админ панель @endslot
        @slot('title') Позиции @endslot
    @endcomponent

    <div class="row">
        <div class="card">
            <div class="card-header">
                <a type="button" href="{{ route('items.create') }}"
                   class="btn btn-success btn-label waves-effect waves-light">
                    <i class="ri-add-box-line label-icon align-middle fs-16 me-2"></i> Добавить
                </a>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">название</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Категория</th>
                    <th scope="col">Создана</th>
                    <th scope="col">Обновлена</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($items as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ mb_strimwidth($item->description, 0, 50, "...") }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>

                        <td>
                            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-edit-2-line"></i></a>
                            <form class="d-inline" method="POST" action="{{route('items.destroy', $item->id) }}"  >
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
