@extends('layouts.admin')
@section('title', 'Products')

@section('content')
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">
                Редактировать категорию
            </div>
        </div>
    </div>

    <div class="content-main__container">
        <form action="{{route('admin.categories.update')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$category->id}}">
            <table class="table table-bordered">
                <tr>
                    <td>Название</td>
                    <td>
                        <input type="text" name="name" value="{{$category->name}}">

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
                              style="width: 250px; height: 100px;">{{$category->description}}
                    </textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
            </table>
            <br>
            <input type="submit" value="Обновить" class="btn">
        </form>
    </div>
@endsection
