@extends('layouts.admin')
@section('title', 'Users')

@section('content')
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">
                Редактировать пользователя
            </div>
        </div>
    </div>

    <div class="content-main__container">
        <form action="{{route('admin.users.update')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$user->id}}">
            <table class="table table-bordered">
                <tr>
                    <td>Имя</td>
                    <td>
                        <input type="text" name="name" value="{{$user->name}}">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td>
                        <input type="email" name="email" value="{{$user->email}}">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Права администратора</td>
                    <td>
                        <input type="checkbox" name="is_admin" @if($user->is_admin) checked @endif>
                    </td>
                </tr>

            </table>
            <br>
            <input type="submit" value="Обновить" class="btn">
        </form>
    </div>
@endsection
