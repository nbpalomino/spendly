@extends("base.main")
@section("content")
    <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
        <div class="mdl-card mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
            <header class="mdl-card__title">
                <h2 class="mdl-card__title-text">NUEVO REGISTRO</h2>
            </header>
            <div class="mdl-card__supporting-text">
                <form action="{{ url('items/store') }}" method="POST">
                    <div class="mdl-textfield mdl-textfield--floating-label mdl-js-textfield ">
                        <input type="text" id="item__name" name="item__name" class="mdl-textfield__input" pattern="[A-Z,a-z, ]*">
                        <label for="item__name" class="mdl-textfield__label">Nombre</label>
                        <span class="mdl-textfield__error">Ingrese el nombre</span>
                    </div>
                    <div class="mdl-textfield mdl-textfield--floating-label mdl-js-textfield">
                        <input type="password" id="password" name="password" class="mdl-textfield__input">
                        <label for="password" class="mdl-textfield__label">Password</label>
                    </div>
                    <input type="submit" value="Sign in" class="mdl-button mdl-js-button mdl-button--accent mdl-button--raised mdl-js-ripple-effect">
                </form>
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <a href="#" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">@{{ cta }}</a>
            </div>
        </div>
    </section>
@endsection

@section("scripts")
    <script type="text/javascript">
        var App = new Vue({
            el: '#App',
            data: {
                cta: 'Ver cursos!!'
            }
        });
        console.dir(App);
    </script>
@endsection
