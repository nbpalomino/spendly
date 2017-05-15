@extends('base.layout')
@section('main')
<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    @include("base.nav")
    <main id="App" class="mdl-layout__content background">
        <div class="page-content">
            @yield("content")<!-- Your content goes here -->
        </div>
        @include("base.footer")
    </main>
</div>

@endsection