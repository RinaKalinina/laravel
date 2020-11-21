@extends('layouts.admin')
@section('title', 'Products')

@section('content')
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">
                Добавить категорию
            </div>
        </div>
    </div>

    <div class="content-main__container">
        <form action="{{route('admin.categories.add')}}" method="post">
            @csrf
            <table class="table table-bordered">
                <tr>
                    <td>Название</td>
                    <td>
                        <input type="text" name="name">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Описание</td>
                    <td>
                    <textarea type="text" name="description"
                              style="width: 250px; height: 100px;"></textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </td>
                </tr>
            </table>
            <br>
            <input type="submit" value="Добавить" class="btn">
        </form>
    </div>

@endsection
