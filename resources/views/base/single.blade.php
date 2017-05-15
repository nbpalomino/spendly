@extends('base.layout')
@section('main')
<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout">
    <main id="App" class="mdl-layout__content background">
        <div class="page-content mdl-grid">
            @yield("content")<!-- Your content goes here -->
        </div>
    </main>
</div>
@endsection