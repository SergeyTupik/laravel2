@extends('layouts.app')

@section('content')
    @if (request()->has('data') and request()->filled('data'))
        <div class="row">
            <a href="{{ url('/user/albums') }}" class="btn btn-primary ml-1"><< Назад</a>
            <div class="col-12 main_title">
                <h1 class="align_center">Ваш результат по запросу "{{ request('data') }}"</h1>
            </div>
        </div>
        <div class="row">
            @foreach($artists as $artist)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail align_center">
                        <img src="{{ $artist['image'][2]['#text'] }}" alt="" class="img-fluid img-thumbnail img-size">
                        <div class="caption">
                            <h5><a href="{{ ($artist['url']) }}">{{ ($artist['name']) }}</a></h5></p>
                            <p><a href="{{ ($artist['url']) }}" class="btn btn-primary" role="button">Подробнее</a>
                                <a href="#" class="btn btn-primary" role="button">В избранное</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <h2 class="mb">Чтобы найти интересующего вас исполнителя, воспользуйтесь формой поиска ниже:</h2>

        @include('partials.searchform')

    @endif
@endsection
