@extends('layouts.app')

@section('content')

    @if (request()->has('data') and request()->filled('data'))
        <div class="row">
            <a href="{{ url('/user/albums') }}" class="btn btn-primary ml-1"><< Назад</a>
            <div class="col-12 main_title">
                <h1 class="align_center">Tоп прослушанных альбомов пользователя {{ request('data') }}</h1>
            </div>
        </div>
        <div class="row">
            @foreach($albums as $key=>$album)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail align_center">
                        <img src="{{ $album['image'][2]['#text'] }}" alt="" class="img-fluid img-thumbnail img-size">
                        <div class="caption">
                            <h5>{{  ($album['name'])  }}</h5>
                            <p>Исполнитель: <a
                                        href="{{ $album['artist']['url'] }}">{{ ($album['artist']['name']) }} </a>
                            </p>
                            <p>Количество прослушиваний: {{ ($album['playcount']) }}</p>
                            <p><a href="{{ ($album['url']) }}" class="btn btn-primary" role="button">Подробнее</a>
                                <a href="#" class="btn btn-primary" role="button">В избранное</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else

        <h2 class="mb">Чтобы посмотреть топ прослушанных альбомов пользователя Last.FM , воспользуйтесь поиском ниже:</h2>

        @include('partials.searchform')

    @endif

@endsection
