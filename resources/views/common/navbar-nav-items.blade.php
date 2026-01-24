<div class="container"><a class="navbar-brand" href="../index.html"><span
            class="text-white dark__text-white">{{ env('APP_NAME') }}</span></a>
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarStandard"
        aria-controls="navbarStandard" aria-expanded="false" aria-label="Toggle navigation"><span
            class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse scrollbar" id="navbarStandard">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item d-flex align-items-center me-2">
                <div class="dropdown theme-control-dropdown landing-drop"><a
                        class="nav-link d-flex align-items-center dropdown-toggle fa-icon-wait pe-1" href="#"
                        role="button" id="themeSwitchDropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><span class="d-none d-lg-block"><span class="fas fa-sun"
                                data-theme-dropdown-toggle-icon="light"></span><span class="fas fa-moon"
                                data-theme-dropdown-toggle-icon="dark"></span><span class="fas fa-adjust"
                                data-theme-dropdown-toggle-icon="auto"></span></span><span class="d-lg-none">Switch
                            theme</span></a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-caret border py-0 mt-1"
                        aria-labelledby="themeSwitchDropdown">
                        <div class="bg-white dark__bg-1000 rounded-2 py-2">
                            <button class="dropdown-item link-600 d-flex align-items-center gap-2" type="button"
                                value="light" data-theme-control="theme"><span class="fas fa-sun"></span>Light<span
                                    class="fas fa-check dropdown-check-icon ms-auto text-600"></span></button>
                            <button class="dropdown-item link-600 d-flex align-items-center gap-2" type="button"
                                value="dark" data-theme-control="theme"><span class="fas fa-moon"
                                    data-fa-transform=""></span>Dark<span
                                    class="fas fa-check dropdown-check-icon ms-auto text-600"></span></button>
                            <button class="dropdown-item link-600 d-flex align-items-center gap-2" type="button"
                                value="auto" data-theme-control="theme"><span class="fas fa-adjust"
                                    data-fa-transform=""></span>Auto<span
                                    class="fas fa-check dropdown-check-icon ms-auto text-600"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('landing.index') }}">Inicio</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" {{ route('landing.plans') }} href="#!">Planes</a>
            </li>

            <li class="nav-item"><a class="nav-link" href="#!" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">Blog</a></li>

            <li class="nav-item"><a class="nav-link" href="#!" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">Registrate</a></li>
        </ul>
    </div>
</div>
