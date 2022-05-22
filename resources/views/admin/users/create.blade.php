@extends('layouts.master')
@section('title') Магазин @endsection
@section('css')
    <link href="assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Админ панель @endslot
        @slot('title') Пользователи @endslot
    @endcomponent

    <div class="row d-flex justify-content-center">
        <div class="card col-lg-5">
            <div class="card-header mb-3">
                <span class="fs-15">Создание пользователя</span>
            </div>
            <form method="POST" action="{{route('users.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text">@</span>
                    <input name="email" type="text" class="form-control @error('email') is-invalid @enderror"
                           placeholder="email адрес" value="{{ old('email') }}">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="ri-user-line"></i>
                    </span>
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                           placeholder="Имя пользователя" value="{{ old('name') }}">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="ri-key-line"></i>
                    </span>
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Пароль">
                </div>
                <div class="input-group mb-1 w-50">
                    <input type="file" class="form-control @error('avatar') is-invalid @enderror"
                           name="avatar" id="input-avatar" required>
                </div>
                <button type="submit" class="btn btn-success btn-label waves-effect waves-light mb-4 mt-1"><i class="ri-save-2-line label-icon align-middle fs-16 me-2"></i> Сохранить</button>
            </form>
        </div>
    </div>

@endsection

