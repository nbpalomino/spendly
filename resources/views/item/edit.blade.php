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
    <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--4dp">
        <div class="app-item-form mdl-card mdl-cell mdl-cell--12-col">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">EDITAR {{ strtoupper($item->name) }}</h2>
            </div>
            <form action="{{ url('items/'.$item->id) }}" method="POST">
                <input type="hidden" name="_method" value="put" />
                <div class="mdl-card__supporting-text text-center">
                    <div class="mdl-selectfield mdl-selectfield--floating-label mdl-js-selectfield">
                      <select class="mdl-selectfield__select" name="group" id="item__group">
                        @foreach($user->groups as $group)
                          <option value="{{ $group->id }}" {{ $group->id == $item->group_id ? 'selected' : ''}} >{{ $group->name }}</option>
                        @endforeach
                      </select>
                      <label for="item__group" class="mdl-selectfield__label">GRUPO</label>
                    </div>
                    <br>
                    <div class="mdl-selectfield mdl-selectfield--floating-label mdl-js-selectfield">
                        <select class="mdl-selectfield__select" name="type" id="item__type" required>
                          <option value=""></option>
                          <option value="0" {{ 0 == $item->type ? 'selected' : ''}}>EGRESO</option>
                          <option value="1" {{ 1 == $item->type ? 'selected' : ''}}>INGRESO</option>
                        </select>
                        <label for="item__type" class="mdl-selectfield__label">TIPO</label>
                        <span class="mdl-selectfield__error">Ingrese el tipo</span>
                    </div>
                    <br>
                    <div class="mdl-textfield mdl-textfield--floating-label mdl-js-textfield">
                        <input type="text" id="item__name" name="name" value="{{ $item->name }}" class="mdl-textfield__input" required>
                        <label for="item__name" class="mdl-textfield__label">TITULO</label>
                        <span class="mdl-textfield__error">Ingrese el nombre</span>
                    </div>
                    <br>
                    <div class="mdl-textfield mdl-textfield--floating-label mdl-js-textfield">
                        <textarea id="item__description" name="description" class="mdl-textfield__input">{{ $item->description }}</textarea>
                        <label for="item__description" class="mdl-textfield__label">DESCRIPCIÓN</label>
                        <span class="mdl-textfield__error">Ingrese la descripción</span>
                    </div>
                    <br>
                    <div class="mdl-textfield mdl-textfield--floating-label mdl-js-textfield">
                        <input type="number" id="item__amount" name="amount" value="{{ $item->amount }}" class="mdl-textfield__input" required step="0.01" min="0">
                        <label for="item__amount" class="mdl-textfield__label">CANTIDAD S/.</label>
                        <span class="mdl-textfield__error">Ingrese la cantidad</span>
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
    </script>
@endsection
