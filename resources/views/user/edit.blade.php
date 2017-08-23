@extends("base.main")
@section("content")
    <style>
        .app-user-form {
        }
        .app-user-form > .mdl-card__title {
            color: #fff;
            height: 175px;
            background: url('/assets/images/welcome_card.jpg') center / cover;
        }
        .app-user-form > .mdl-card__supporting-text {
            padding: 1rem 2rem;
        }
    </style>
    <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--4dp">
        <div class="app-user-form mdl-card mdl-cell mdl-cell--12-col">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">{{ strtoupper($user->name) }}</h2>
            </div>
            <div class="mdl-card__supporting-text text-center">
            <form action="{{ url('u') }}" method="POST">
                <input type="hidden" name="_method" value="PUT" />
                <div class="mdl-textfield mdl-textfield--floating-label mdl-js-textfield">
                    <input type="text" id="user__name" name="name" value="{{ $user->name }}" class="mdl-textfield__input" required>
                    <label for="user__name" class="mdl-textfield__label">NOMBRE</label>
                    <span class="mdl-textfield__error">Ingrese el nombre</span>
                </div>
                <br>
                <div class="mdl-textfield mdl-textfield--floating-label mdl-js-textfield">
                    <input type="email" id="user__email" name="email" value="{{ $user->email }}" class="mdl-textfield__input" required>
                    <label for="user__email" class="mdl-textfield__label">EMAIL</label>
                    <span class="mdl-textfield__error">Ingrese el email</span>
                </div>
                <br>
            </form>
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <input type="submit" value="Guardar" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                <form action="{{ url('users/'.$user->id) }}" method="POST">
                    <input type="hidden" name="_method" value="DELETE" />
                    <input type="submit" value="Eliminar" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent">
                </form>
            </div>
        </div>
    </section>
@endsection

@section("scripts")
    <script type="text/javascript">
    </script>
@endsection
