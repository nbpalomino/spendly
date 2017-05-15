@extends("base.main")
@section("content")
    <style>
        .app-item-form {
        }
        .app-item-form > .mdl-card__title {
            color: #fff;
            height: 175px;
            background: url('https://getmdl.io/assets/demos/welcome_card.jpg') center / cover;
        }
        .app-item-form > .mdl-card__supporting-text {
            padding: 1rem 2rem;
        }
    </style>
    <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
        <div class="app-item-form mdl-card mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">REGISTRO DE EGRESOS</h2>
            </div>
            <form action="{{ url('items') }}" method="POST">
                <div class="mdl-card__supporting-text">
                    <div class="mdl-textfield mdl-textfield--floating-label mdl-js-textfield">
                        <input type="text" id="item__name" name="name" class="mdl-textfield__input">
                        <label for="item__name" class="mdl-textfield__label">Nombre</label>
                        <span class="mdl-textfield__error">Ingrese el nombre</span>
                    </div>
                    <br>
                    <div class="mdl-textfield mdl-textfield--floating-label mdl-js-textfield">
                        <textarea id="item__description" name="description" class="mdl-textfield__input"></textarea>
                        <label for="item__description" class="mdl-textfield__label">Descripción</label>
                        <span class="mdl-textfield__error">Ingrese la Descripción</span>
                    </div>
                    <div class="mdl-textfield mdl-textfield--floating-label mdl-js-textfield">
                        <input type="text" id="item__amount" name="amount" class="mdl-textfield__input">
                        <label for="item__amount" class="mdl-textfield__label">Cantidad S/</label>
                        <span class="mdl-textfield__error">Ingrese la Cantidad</span>
                    </div>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <input type="submit" value="Guardar" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                </div>
            </form>
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
