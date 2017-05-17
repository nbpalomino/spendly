@extends("base.main")
@section("content")
    <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--4dp">
        <div class="mdl-cell mdl-cell--12-col mdl-card">
            <div class="mdl-card__title">
              <div class="mdl-selectfield mdl-selectfield--floating-label mdl-js-selectfield center text-center">
                <select class="mdl-selectfield__select" name="group" id="group">
                  @foreach($user->groups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                  @endforeach
                </select>
                <label for="item__type" class="mdl-selectfield__label text-center">MI GRUPO</label>
              </div>
            </div>
            <div class="mdl-card__supporting-text">
                @foreach($user->groups as $group)
                  <div class="text-center">
                    <span>Dinero disponible:</span>
                    <span class="mdl-chip mdl-color--{{ $group->total() > 0 ? 'green' : 'red' }}-A700 mdl-color-text--white" style="vertical-align:middle;">
                        <span class="mdl-chip__text text-success"  style="font-size: 2rem;">S/. {{ $group->total() }}</span>
                    </span>
                  </div>
                    <ul class="mdl-list">
                        @foreach($group->items as $item)
                            <li class="mdl-list__item mdl-list__item--two-line mdl-shadow--2dp">
                                <span class="mdl-list__item-primary-content">
                                    <i class="material-icons mdl-list__item-icon">shopping_basket</i>
                                    <span><a href="{{ url('items/'.$item->id.'/edit') }}">{{ $item->name }}</a></span>
                                    <span class="mdl-list__item-sub-title">{{ $item->description }}</span>
                                </span>
                                <span class="mdl-list__item-secondary-content">
                                    <span class="mdl-chip mdl-color-text--white mdl-color--{{ $item->isPositive() ? 'green' : 'red' }}-400">
                                        <span class="mdl-chip__text">S/. {{ $item->amount }}</span>
                                    </span>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                @endforeach
            </div>
            <!-- <div class="mdl-card__actions mdl-card--border text-center"></div> -->
        </div>
    </section>
    <a href="{{ url('items/create') }}" class="floating-fab mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--accent">
      <i class="material-icons">add</i>
    </a>
@endsection

@section("scripts")
<script type="text/javascript">
</script>
@endsection
