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
                <span class="fs-15">Редактирование пользователя</span>
            </div>
            <form method="POST" action="{{route('users.update', $user->id) }}" >
                @csrf
                @method('PUT')
                <div class="input-group mb-3">
                    <span class="input-group-text">@</span>
                    <input name="email" type="text" class="form-control" placeholder="email адрес" value="{{ $user->email }}">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="ri-user-line"></i>
                    </span>
                    <input name="name" type="text" class="form-control" placeholder="Имя пользователя" value="{{ $user->name }}">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="ri-key-line"></i>
                    </span>
                    <input name="password" type="password" class="form-control" placeholder="Пароль">
                </div>
                <div class="input-group mb-1 w-50">
                    <select name="role_id" class="form-select form-select-sm fs-14 mb-3 d-inline">
                        <option value="0" @selected($user->role_id == 0)>Пользователь</option>
                        <option value="1" @selected($user->role_id == 1)>Администратор</option>
                        <option value="2" @selected($user->role_id == 2)>Оператор</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success btn-label waves-effect waves-light mb-4 mt-1"><i class="ri-save-2-line label-icon align-middle fs-16 me-2"></i> Сохранить</button>
            </form>
        </div>
    </div>

@endsection

