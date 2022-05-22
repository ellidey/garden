@extends('layouts.master')
@section('title') Магазин @endsection
@section('css')
    <link href="assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Админ панель @endslot
        @slot('title') Позиции @endslot
    @endcomponent

    <div class="row d-flex justify-content-center">
        <div class="card col-lg-5">
            <div class="card-header mb-3">
                <span class="fs-15">Создание категории</span>
            </div>
            <form method="POST" action="{{ route('items.update', $item->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="ri-pencil-line"></i>
                    </span>
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                           placeholder="Название" value="{{ $item->name }}">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="ri-pencil-line"></i>
                    </span>
                    <input name="cost" type="number" class="form-control @error('cost') is-invalid @enderror"
                           placeholder="Цена" value="{{ $item->cost }}">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Описание</span>
                    <textarea name="description" class="form-control"
                              aria-label="With textarea" rows="5">{{ $item->description }}</textarea>
                </div>
                <div class="input-group mb-3 w-50">
                    <select name="category_id" class="form-select form-select-sm fs-14 mb-3 d-inline">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected($item->category_id == $category->id)>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-1 w-50">
                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                           name="image" id="input-avatar">
                </div>
                <button type="submit" class="btn btn-success btn-label waves-effect waves-light mb-4 mt-1">
                    <i class="ri-save-2-line label-icon align-middle fs-16 me-2"></i>
                    Сохранить
                </button>
            </form>
        </div>
    </div>

@endsection

