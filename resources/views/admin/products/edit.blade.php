@extends('layouts.admin')
@section('title', 'Products')

@section('content')
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">
                Редактировать товар
            </div>
        </div>
    </div>

    <div class="content-main__container">
        <form action="{{route('admin.products.update')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$product->id}}">
            <table class="table table-bordered">
                <tr>
                    <td>Категория</td>
                    <td>
                        <select name="category_id">
                            <option disabled>Выберите категорию</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                        @if($category->id === $product->category->id) selected @endif>
                                    {{$category->name}}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Название</td>
                    <td>
                        <input type="text" name="name" value="{{$product->name}}">

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
                        <input type="text" name="price" value="{{$product->price}}">

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
                              style="width: 250px; height: 100px;">{{$product->description}}
                    </textarea>

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
                        @if($product->img)
                            <img src="{{$product->getImg()}}" alt="">
                            <input type="hidden" name="imageName" value="{{$product->img}}">
                        @endif
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
            <input type="submit" value="Обновить" class="btn">
        </form>
    </div>
@endsection
