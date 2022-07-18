<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            @guest
            {{ config('app.name', 'Laravel') }}
            @else
            <span style="font-size: 14px">{{ Auth::user()->role->display_name ?? '' }}</span>
            @endguest
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link @if ($sub == 'beranda') {{ 'active' }} @endif" href="#"><i class="fa fa-home"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($sub == 'faq') {{ 'active' }} @endif" href="#"><i class="fa fa-question-circle-o"></i> FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($sub == 'about') {{ 'active' }} @endif" href="#"><i class="fa fa-info"></i> Tentang Kami</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle @if ($page == 'login' || $page == 'registrasi') {{ 'active' }} @endif" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa fa-lock"></i> Masuk / Daftar <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('login') }}">
                                <i class="fa fa-unlock mr-1"></i> Login
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <i class="fa fa-sign-in mr-1"></i> Registrasi
                            </a>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>