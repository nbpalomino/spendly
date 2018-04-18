@extends('base.layout')
@section('main')
<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    @include("base.nav")
    <main class="mdl-layout__content background">
        <div class="page-content">
            <div id="app">
                <p>
                    <router-link to="/">Inicio</router-link>
                    <router-link to="/item/new">Crear nuevo</router-link>
                </p>
                <router-view></router-view>
            </div>
        </div>
        @include("base.footer")
    </main>
</div>
@endsection

@section('scripts')
<script src="/assets/js/build.js"></script>
@endsection
