@extends('layouts.app')
@section('title', 'All News')

@section('content')
    <div class="content-middle">
        <div class="content-head__container">
            <div class="content-head__title-wrap">
                <div class="content-head__title-wrap__title bcg-title">Новости</div>
            </div>
            @include('elements.search')
        </div>
        <div class="content-main__container">
            <div class="news-block content-text">
                <h3 class="content-text__title">
                    {{ $newsItem->name }}
                </h3>
                <img src="{{ asset("storage/news/$newsItem->cover") }}"
                     alt="Image" class="alignleft img-news">
                <div>
                    {{ $newsItem->content }}
                </div>

            </div>
        </div>
    </div>
    @include('elements.content.bottom')
@endsection
