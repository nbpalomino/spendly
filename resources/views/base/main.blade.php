@extends('base.layout')
@section('main')
<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    @include("base.nav")
    <main class="mdl-layout__content background">
        <div class="page-content">
            <div id="app"></div>
            @include("base.footer")
        </div>
    </main>
</div>

@endsection
