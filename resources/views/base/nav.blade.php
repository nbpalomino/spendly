<header class="mdl-layout__header mdl-layout__header--scroll">
    <div class="mdl-layout__header-row">
        <!-- Title -->
        <span class="mdl-layout-title">{{ $who or 'Spendly' }}</span>
        <!-- Add spacer, to align navigation to the right -->
        <div class="mdl-layout-spacer"></div>
        <!-- Navigation. We hide it in small screens. -->
        <nav class="mdl-navigation mdl-layout--large-screen-only">
            <a class="mdl-navigation__link" href="{{ url('login') }}">Login</a>
            <a class="mdl-navigation__link" href="{{ url('logout') }}">Logout</a>
            <a class="mdl-navigation__link" href="{{ url('about') }}">About us</a>
        </nav>
    </div>
</header>
<div class="mdl-layout__drawer">
    <span class="mdl-layout-title">{{ $who or 'Spendly' }}</span>
    <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="{{ url('login') }}">Login</a>
        <a class="mdl-navigation__link" href="{{ url('logout') }}">Logout</a>
        <a class="mdl-navigation__link" href="{{ url('about') }}">About us</a>
    </nav>
</div>