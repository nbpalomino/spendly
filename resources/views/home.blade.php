@extends("base.main")
@section("content")
    <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
        <div class="mdl-cell mdl-cell--4-col mdl-cell--12-col-tablet mdl-color--teal-100 mdl-color-text--white">
            <i class="material-icons">play_circle_filled</i>
        </div>
        <div class="mdl-card mdl-cell mdl-cell--8-col mdl-cell--12-col-tablet">
            <div class="mdl-card__title">
                <h3 class="mdl-card__title-text">BIENVENID@</h3>
            </div>
            <div class="mdl-card__supporting-text">
                @foreach($user->groups as $group)
                    <span>Dinero disponible en <strong>{{ $group->name }}</strong> hasta el momento.</span>
                    <span class="mdl-chip mdl-color--{{ $group->total() > 0 ? 'green' : 'red' }}-A700 mdl-color-text--white">
                        <span class="mdl-chip__text text-success"  style="font-size: 2rem;">S/. {{ $group->total() }}</span>
                    </span>
                    <ul class="mdl-list">
                        @foreach($group->balances as $item)
                            <li class="mdl-list__item mdl-list__item--two-line">
                                <span class="mdl-list__item-primary-content">
                                    <i class="material-icons mdl-list__item-icon">shopping_basket</i>
                                    <span><a href="{{ url('items/'.$item->id.'/edit') }}">{{ $item->item->name }}</a></span>
                                    <span class="mdl-list__item-sub-title">{{ $item->item->description }}</span>
                                </span>
                                <span class="mdl-list__item-secondary-content">
                                    <span class="mdl-chip mdl-color-text--white mdl-color--{{ $item->isPositive() ? 'green' : 'red' }}-400">
                                        <span class="mdl-chip__text">S/. {{ $item->isPositive() ? '' : '-' }}{{ $item->item->mount }}</span>
                                    </span>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                    <hr>
                @endforeach
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
            cta: 'Agregar nuevos items'
        }
    });
    console.dir(App);
</script>
@endsection
