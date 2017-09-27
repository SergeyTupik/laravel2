@extends('layouts.app')

@section('content')
    @if (request()->has('data') and request()->filled('data'))
        <div class="row">
            <a href="{{ url('/user/albums') }}" class="btn btn-primary ml-1"><< Назад</a>
            <div class="col-12 main_title">
                <h1>Ваш результат по запросу "{{ request('data') }}"</h1>
            </div>
        </div>
        <div class="row">
            @foreach($tracks as $track)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail align_center">
                        <img src="{{ $track['image'][2]['#text'] }}" alt="" class="img-fluid img-thumbnail img-size">
                        <div class="caption">
                            <h5><a href="{{ ($track['url']) }}">{{ ($track['name']) }}</a></h5>
                            <p>Исполнитель: {{ $track['artist'] }} </p>
                            <p>Прослушано {{ $track['listeners'] }} раз</p>
                            <p><a href="{{ ($track['url']) }}" class="btn btn-primary" role="button">Подробнее</a>
                                <a href="#" class="btn btn-primary" role="button">В избранное</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <h2 class="mb">Чтобы найти интересующий вас трек по названию, воспользуйтесь поиском
            ниже:</h2>

        @include('partials.searchform')

    @endif
@endsection
