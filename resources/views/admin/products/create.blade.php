@extends('layouts.admin')
@section('title', 'Products')

@section('content')
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">
                Добавить товар
            </div>
        </div>
    </div>

    <div class="content-main__container">
        <form action="{{route('admin.products.add')}}" method="post" enctype="multipart/form-data">
            @csrf
            <table class="table table-bordered">
                <tr>
                    <td>Категория</td>
                    <td>
                        <select name="category_id">
                            <option disabled>Выберите категорию</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">
                                    {{$category->name}}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
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
                    <td>Цена</td>
                    <td>
                        <input type="text" name="price">

                        @error('price')
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
                <tr>
                    <td>Картинка</td>
                    <td>
                        <input name="image" type="file"/>

                        @error('image')
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
