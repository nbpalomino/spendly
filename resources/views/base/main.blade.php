@extends('base.layout')
@section('main')
<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    @include("base.nav")
    <main class="mdl-layout__content background">
        <div class="page-content">
            <div id="app">
                <h1>
                    Welcome
                </h1>
                <p>
                    <router-link to="/">Go to Foo</router-link>
                    <router-link to="/item/new">Go to New</router-link>
                </p>
                <router-view></router-view>
            </div>
        </div>
        @include("base.footer")
    </main>
</div>

@endsection
