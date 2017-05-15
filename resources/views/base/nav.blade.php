<header class="mdl-layout__header mdl-layout__header--scroll">
    <div class="mdl-layout__header-row">
        <!-- Title -->
        <a href="{{ url('/') }}" class="mdl-layout-title">{{ $who }}</a>
        <!-- Add spacer, to align navigation to the right -->
        <div class="mdl-layout-spacer"></div>
        <!-- Navigation. We hide it in small screens. -->
        <nav class="mdl-navigation mdl-layout--large-screen-only">
            <a class="mdl-navigation__link" href="{{ url('login') }}">Login</a>
            <a class="mdl-navigation__link" href="{{ url('logout') }}">Logout</a>
            <a class="mdl-navigation__link" href="{{ url('version') }}">About us</a>
        </nav>
    </div>
</header>
<div class="mdl-layout__drawer">
    <span class="mdl-layout-title">{{ $who }}</span>
    <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="{{ url('login') }}">Login</a>
        <a class="mdl-navigation__link" href="{{ url('logout') }}">Logout</a>
        <a class="mdl-navigation__link" href="{{ url('version') }}">About us</a>
    </nav>
</div>