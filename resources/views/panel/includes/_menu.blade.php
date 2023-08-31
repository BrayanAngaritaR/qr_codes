<nav class="nav">
    <div>
        <div class="nav_brand">
            <ion-icon name="menu-outline" class="nav_toggle" id="nav-toggle"></ion-icon>
            <a href="#" class="nav_logo">
                <img src="https://bepro.digital/assets/img/bepro_digital_logo_white.webp" width="70" />
            </a>
        </div>
    </div>
    <ul>
        <li>
            <a href="{{ route('dashboard') }}" class="nav_link {{ Route::is('dashboard') ? 'active' : '' }}">
                <ion-icon name="home-outline" class="nav_icon"></ion-icon>
                <span class="nav_name">Panel</span>
            </a>
        </li>
        <li>
            <a href="{{ route('panel.qr.index') }}" class="nav_link {{ Route::is('panel.qr.index') ? 'active' : '' }}">
                <ion-icon name="qr-code-outline" class="nav_icon"></ion-icon>
                <span class="nav_name">Mis QR</span>
            </a>
        </li>
        <li>
            <a href="{{ route('panel.settings.index') }}"
                class="nav_link {{ Route::is('panel.settings.index') ? 'active' : '' }}">
                <ion-icon name="settings-outline" class="nav_icon"></ion-icon>
                <span class="nav_name">Configuración</span>
            </a>
        </li>
    </ul>
    <a href="{{ route('logout') }}"
        onclick="event.preventDefault(); 
      document.getElementById('logout-form').submit();" class="nav_link">
        <ion-icon name="log-out-outline" class="nav_icon"></ion-icon>
        <span class="nav_name">Salir</span>
    </a>

    <form id="logout-form" method="POST" action="{{ route('logout') }}" class="d-none">
        @csrf
    </form>
</nav>
