@extends('auth.layout')

@section('content')
    <div class="card-header">Войти</div>
    <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-6 control-label">E-mail</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required
                       autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-6 control-label">Пароль</label>
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif

            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить
                        меня
                    </label>
                </div>

            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Войти
                </button>
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Забыли пароль?
                </a>
                <a class="btn btn-link" href="{{ route('register') }}">
                    Регистрация
                </a>

            </div>
        </form>

    </div>
@endsection
