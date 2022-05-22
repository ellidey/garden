@extends('layouts.master')
@section('title') Категории @endsection
@section('css')
    <link href="assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Админ панель @endslot
        @slot('title') Категории @endslot
    @endcomponent

    <div class="row">
        <div class="card">
            <div class="card-header">
                <a type="button" href="{{ route('categories.create') }}"
                   class="btn btn-success btn-label waves-effect waves-light">
                    <i class="ri-add-box-line label-icon align-middle fs-16 me-2"></i> Добавить
                </a>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">название</th>
                    <th scope="col">Создана</th>
                    <th scope="col">Обновлена</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>{{ $category->updated_at }}</td>

                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-edit-2-line"></i></a>
                            <form class="d-inline" method="POST" action="{{route('categories.destroy', $category->id) }}"  >
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
