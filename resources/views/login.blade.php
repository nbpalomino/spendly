@extends("base.single")
@section("content")
    <div class="mdl-cell mdl-cell--4-offset">
    <div class="mdl-card mdl-shadow--4dp">
        <div class="mdl-card__title">
            <h1 class="mdl-card__title-text">LOGIN</h1>
        </div>
        <!-- <div class="mdl-card__media"></div> -->
        <div class="mdl-card__supporting-text">
            <form action="{{ url('login') }}" method="POST">
                <div class="mdl-textfield mdl-textfield--floating-label mdl-js-textfield ">
                    <input type="email" id="email" name="email" class="mdl-textfield__input">
                    <label for="email" class="mdl-textfield__label"> Email</label>
                    <span class="mdl-textfield__error">Ingrese email valido</span>
                </div>
                <div class="mdl-textfield mdl-textfield--floating-label mdl-js-textfield">
                    <input type="password" id="password" name="password" class="mdl-textfield__input">
                    <label for="password" class="mdl-textfield__label">Password</label>
                </div>
                <input type="submit" value="Sign in" class="mdl-textfield--full-width mdl-button mdl-js-button mdl-button--accent mdl-button--raised mdl-js-ripple-effect">
            </form>
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <a href="{{ url('password-recovery') }}">Recover my password</a>
        </div>
    </div>
    </div>
@endsection
