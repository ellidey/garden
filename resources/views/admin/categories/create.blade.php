@extends('layouts.master')
@section('title') Магазин @endsection
@section('css')
    <link href="assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Админ панель @endslot
        @slot('title') Категории @endslot
    @endcomponent

    <div class="row d-flex justify-content-center">
        <div class="card col-lg-5">
            <div class="card-header mb-3">
                <span class="fs-15">Создание категории</span>
            </div>
            <form method="POST" action="{{ route('categories.store') }}">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="ri-pencil-line"></i>
                    </span>
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                           placeholder="Название" value="{{ old('name') }}">
                </div>
                <button type="submit" class="btn btn-success btn-label waves-effect waves-light mb-4 mt-1">
                    <i class="ri-save-2-line label-icon align-middle fs-16 me-2"></i>
                    Сохранить
                </button>
            </form>
        </div>
    </div>

@endsection

