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
            <div class="news-list__container">
                @forelse($news as $item)
                <div class="news-list__item">
                    <div class="news-list__item__thumbnail">
                        <img src="{{ asset("storage/news/$item->cover") }}">
                    </div>
                    <div class="news-list__item__content">
                        <div class="news-list__item__content__news-title">
                            {{ $item->name }}
                        </div>
                        <div class="news-list__item__content__news-date">
                            {{ date('d.m.Y', strtotime($item->created_at)) }}
                        </div>
                        <div class="news-list__item__content__news-content">
                            {{ $item->description }}
                        </div>
                    </div>
                    <div class="news-list__item__content__news-btn-wrap">
                        <a href="{{ route('news.show', $item) }}"
                           class="btn btn-brown">Подробнее</a>
                    </div>
                </div>
                @empty
                    <p>Новости не найдены</p>
                @endforelse
            </div>
        </div>

        {{ $news->links() }}
    </div>
@endsection
