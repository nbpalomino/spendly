@extends("base.single")
@section("content")
    <div class="mdl-cell mdl-cell--4-offset">
        <div class="mdl-card mdl-shadow--4dp">
            <div class="mdl-card__title">
                <h1 class="mdl-card__title-text">{{ $title }}</h1>
            </div>
            <!-- <div class="mdl-card__media"></div> -->
            <div class="mdl-card__supporting-text">
                <!-- TODO: mejorar error handling -->
                @if(!empty($status))
                    <div>
                        {{ $message }}
                    </div>
                @endif
                <form action="{{ url('users') }}" method="POST">
                    <div class="mdl-textfield mdl-textfield--floating-label mdl-js-textfield ">
                        <input type="text" id="name" name="name" class="mdl-textfield__input">
                        <label for="name" class="mdl-textfield__label"> Nombre</label>
                        <span class="mdl-textfield__error">Ingrese su nombre</span>
                    </div>
                    <div class="mdl-textfield mdl-textfield--floating-label mdl-js-textfield ">
                        <input type="email" id="email" name="email" class="mdl-textfield__input">
                        <label for="email" class="mdl-textfield__label"> Email</label>
                        <span class="mdl-textfield__error">Ingrese email valido</span>
                    </div>
                    <div class="mdl-textfield mdl-textfield--floating-label mdl-js-textfield">
                        <input type="password" id="password" name="password" class="mdl-textfield__input">
                        <label for="password" class="mdl-textfield__label">Password</label>
                    </div>
                    <input type="submit" value="Registrarse" class="mdl-textfield--full-width mdl-button mdl-js-button mdl-button--accent mdl-button--raised mdl-js-ripple-effect">
                </form>
            </div>
        </div>
    </div>
@endsection
