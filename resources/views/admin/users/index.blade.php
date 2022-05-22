@extends('layouts.master')
@section('title') Пользователи @endsection
@section('css')
    <link href="assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Админ панель @endslot
        @slot('title') Пользователи @endslot
    @endcomponent

    <div class="row">
        <div class="card">
            <div class="card-header">
                <a type="button" href="{{ route('users.create') }}"
                        class="btn btn-success btn-label waves-effect waves-light">
                    <i class="ri-add-box-line label-icon align-middle fs-16 me-2"></i> Добавить
                </a>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Email</th>
                    <th scope="col">Роль</th>
                    <th scope="col">Верефицирован</th>
                    <th scope="col">Создан</th>
                    <th scope="col">Обновлен</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role_name() }}</td>
                            <td>
                                @if ($user->email_verified_at)
                                    <span class="badge bg-success">Подтвержден</span>
                                @else
                                    <span class="badge bg-danger">Не подтвержден</span>
                                @endif
                            </td>

                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>

                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-edit-2-line"></i></a>
                                <form class="d-inline" method="POST" action="{{route('users.destroy', $user->id) }}"  >
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
