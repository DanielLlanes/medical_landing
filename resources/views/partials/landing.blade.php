<section class="py-0 overflow-hidden" id="banner" data-bs-theme="light">
    <div class="bg-holder overlay"
        style="background-image:url({{ Vitx::asset('assets/img/generic/bg-1.jpg') }});background-position: center bottom;">
    </div>

    <div class="container">
        <div class="row flex-center pt-8 pt-lg-10 pb-lg-9 pb-xl-0">
            <div class="col-md-11 col-lg-8 col-xl-4 pb-7 pb-xl-9 text-center text-xl-start">
                <a class="btn btn-outline-danger mb-4 fs-10 border-2 rounded-pill" href="#!">
                    <span class="me-2" role="img" aria-label="Health">🏥</span>Interoperabilidad HL7/FHIR
                </a>

                <h1 class="text-white fw-light">Gestión de <br /><span class="typed-text fw-bold"
                        data-typed-text='["expedientes","pacientes","clínicas","recetas"]'></span><br />en la nube</h1>

                <p class="lead text-white opacity-75">La plataforma multi-tenant definitiva para centros de salud.
                    Toma el control total de tus sucursales y garantiza la portabilidad de datos médicos con seguridad
                    de nivel bancario.</p>

                <a class="btn btn-outline-light border-2 rounded-pill btn-lg mt-4 fs-9 py-2"
                    href="{{ route('landing.index') }}">
                    Comenzar ahora<span class="fas fa-chevron-right ms-2" data-fa-transform="shrink-6 down-1"></span>
                </a>
            </div>

            <div class="col-xl-7 offset-xl-1 align-self-end mt-4 mt-xl-0">
                <a class="img-landing-banner rounded" href="{{ route('landing.index') }}">
                    <img class="img-fluid d-dark-none" src="{{ Vitx::asset('assets/img/generic/dashboard-alt.jpg') }}"
                        alt="Panel de Control Médico" />
                    <img class="img-fluid d-light-none"
                        src="{{ Vitx::asset('assets/img/generic/dashboard-alt-dark.png') }}"
                        alt="Panel de Control Médico" />
                </a>
            </div>
        </div>
    </div>
</section>

<section class="py-3 bg-body-tertiary shadow-sm">
    <div class="container">
        <div class="row justify-content-center mb-2">
            <div class="col-auto">
                <small class="text-600 fw-semi-bold text-uppercase ls-1">Cumplimiento y estándares
                    internacionales</small>
            </div>
        </div>
        <div class="row flex-center">
            <div class="col-3 col-sm-auto my-1 my-sm-3 px-x1">
                <img class="landing-cta-img" height="40" src="{{ Vitx::asset('assets/img/logos/b&w/6.png') }}"
                    alt="HL7 Logo" />
            </div>
            <div class="col-3 col-sm-auto my-1 my-sm-3 px-x1">
                <img class="landing-cta-img" height="45" src="{{ Vitx::asset('assets/img/logos/b&w/11.png') }}"
                    alt="Standard 1" />
            </div>
            <div class="col-3 col-sm-auto my-1 my-sm-3 px-x1">
                <img class="landing-cta-img" height="30" src="{{ Vitx::asset('assets/img/logos/b&w/2.png') }}"
                    alt="Standard 2" />
            </div>
            <div class="col-3 col-sm-auto my-1 my-sm-3 px-x1">
                <img class="landing-cta-img" height="30" src="{{ Vitx::asset('assets/img/logos/b&w/4.png') }}"
                    alt="Standard 3" />
            </div>
            <div class="col-3 col-sm-auto my-1 my-sm-3 px-x1">
                <img class="landing-cta-img" height="35" src="{{ Vitx::asset('assets/img/logos/b&w/1.png') }}"
                    alt="Standard 4" />
            </div>
            <div class="col-3 col-sm-auto my-1 my-sm-3 px-x1">
                <img class="landing-cta-img" height="40" src="{{ Vitx::asset('assets/img/logos/b&w/10.png') }}"
                    alt="Standard 5" />
            </div>
            <div class="col-3 col-sm-auto my-1 my-sm-3 px-x1">
                <img class="landing-cta-img" height="40" src="{{ Vitx::asset('assets/img/logos/b&w/12.png') }}"
                    alt="Standard 6" />
            </div>

            {{-- <img src="tu-logo-con-fondo-blanco.jpg"
            style="mix-blend-mode: multiply;"
            class="landing-cta-img"
            height="40"> --}}
            {{-- 1. Aseguradoras (Las que pagan las consultas)
            GNP Seguros (Fundamental en México).

            AXA México (El que intentaste poner, pero búscalo como PNG transparente).

            MetLife México.

            Seguros Monterrey New York Life.

            2. Instituciones y Normativas (Confianza técnica)
            Secretaría de Salud / COFEPRIS (Para el cumplimiento de la NOM-024 del expediente clínico).

            HL7 México (Interoperabilidad).

            IMSS o ISSSTE (Si tu sistema planea conectarse o seguir sus protocolos de referencia).

            <style>
                /* Este filtro convierte cualquier logo negro/color al tono lila/gris de Falcon (#5e6e82) */
                .falcon-logo-filter {
                    filter: invert(43%) sepia(13%) saturate(1031%) hue-rotate(175deg) brightness(92%) contrast(88%);
                    opacity: 0.7;
                    transition: opacity 0.3s;
                }
                .falcon-logo-filter:hover {
                    opacity: 1;
                    filter: none; /* Al pasar el mouse se ve el color real del logo */
                }
                </style>

                <div class="col-3 col-sm-auto my-1 my-sm-3 px-x1">
                    <img class="falcon-logo-filter" height="40" src="{{ Vitx::asset('assets/img/logos/mexico/axa.png') }}" alt="AXA" />
                </div> --}}
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8 col-xl-7 col-xxl-6">
                <h1 class="fs-7 fs-sm-5 fs-md-4">La evolución de la gestión clínica</h1>
                <p class="lead">Diseñado para médicos, optimizado para pacientes. Nuestra plataforma modular se adapta
                    al flujo real de tu consulta.</p>
            </div>
        </div>

        <div class="row flex-center mt-8">
            <div class="col-md col-lg-5 col-xl-4 ps-lg-6">
                <img class="img-fluid px-6 px-md-0"
                    src="{{ Vitx::asset('assets/img/icons/spot-illustrations/50.png') }}" alt="Expediente Clínico" />
            </div>
            <div class="col-md col-lg-5 col-xl-4 mt-4 mt-md-0">
                <h5 class="text-danger"><span class="fas fa-notes-medical me-2"></span>EXPEDIENTE</h5>
                <h3>Historia Clínica Universal</h3>
                <p>Cumple con la <strong>NOM-024</strong> mediante un sistema de expedientes interoperables. Accede al
                    historial completo de tus pacientes desde cualquier dispositivo con seguridad cifrada.</p>
            </div>
        </div>

        <div class="row flex-center mt-7">
            <div class="col-md col-lg-5 col-xl-4 pe-lg-6 order-md-2">
                <img class="img-fluid px-6 px-md-0"
                    src="{{ Vitx::asset('assets/img/icons/spot-illustrations/49.png') }}"
                    alt="Administración Multi-tenant" />
            </div>
            <div class="col-md col-lg-5 col-xl-4 mt-4 mt-md-0">
                <h5 class="text-info"> <span class="fas fa-hospital-user me-2"></span>CONTROL</h5>
                <h3>Gestión Multi-sucursal</h3>
                <p>Administra múltiples clínicas o consultorios desde un solo panel. Controla roles de usuario, agendas
                    compartidas y facturación electrónica de forma centralizada.</p>
            </div>
        </div>

        <div class="row flex-center mt-7">
            <div class="col-md col-lg-5 col-xl-4 ps-lg-6">
                <img class="img-fluid px-6 px-md-0"
                    src="{{ Vitx::asset('assets/img/icons/spot-illustrations/48.png') }}" alt="Receta Electrónica" />
            </div>
            <div class="col-md col-lg-5 col-xl-4 mt-4 mt-md-0">
                <h5 class="text-success"><span class="fas fa-file-prescription me-2"></span>CONECTIVIDAD</h5>
                <h3>Receta Digital e Intercambio</h3>
                <p>Emite recetas electrónicas válidas y comparte información con laboratorios y aseguradoras mediante el
                    estándar <strong>HL7 FHIR</strong>, garantizando la continuidad del cuidado.</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-body-tertiary dark__bg-opacity-50 text-center">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="fs-7 fs-sm-5 fs-md-4">Todo lo que tu clínica necesita</h1>
                <p class="lead">Herramientas listas para usar, diseñadas para elevar la calidad de tu atención
                    médica.</p>
            </div>
        </div>
        <div class="row mt-6">
            <div class="col-lg-4">
                <div class="card card-span h-100">
                    <div class="card-span-img"><span class="fas fa-shield-alt fs-5 text-info"></span></div>
                    <div class="card-body pt-6 pb-4">
                        <h5 class="mb-2">Seguridad de Datos</h5>
                        <p>Toda la información de tus <strong>expedientes</strong> está protegida con cifrado de grado
                            militar y respaldos automáticos diarios en la nube.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-6 mt-lg-0">
                <div class="card card-span h-100">
                    <div class="card-span-img"><span class="fas fa-mobile-alt fs-4 text-success"></span></div>
                    <div class="card-body pt-6 pb-4">
                        <h5 class="mb-2">Acceso Multiplataforma</h5>
                        <p>Consulta agendas, pacientes y reportes desde tu celular, tablet o computadora. Tu consultorio
                            siempre contigo, 24/7.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-6 mt-lg-0">
                <div class="card card-span h-100">
                    <div class="card-span-img"><span class="fas fa-balance-scale fs-3 text-danger"></span></div>
                    <div class="card-body pt-6 pb-4">
                        <h5 class="mb-2">Cumplimiento Normativo</h5>
                        <p>Olvídate de las multas. Nuestro sistema está actualizado con las normativas vigentes (NOM)
                            para el manejo de información en salud.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-200 text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-xl-8">
                <div class="swiper theme-slider"
                    data-swiper='{"autoplay":true,"spaceBetween":5,"loop":true,"loopedSlides":5,"slideToClickedSlide":true}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="px-5 px-sm-6">
                                <p class="fs-sm-8 fs-md-7 fst-italic text-1100">"Desde que implementamos el sistema, el
                                    tiempo de llenado del expediente clínico se redujo a la mitad. La interfaz es tan
                                    intuitiva que mi equipo no necesitó capacitación externa."</p>
                                <p class="fs-9 text-600">- Dr. Alejandro Méndez, Pediatra</p>
                                <img class="w-auto mx-auto"
                                    src="{{ Vitx::asset('assets/img/logos/mexico/hospital-1.png') }}"
                                    alt="Clínica del Sol" height="45"
                                    style="filter: grayscale(100%); opacity: 0.6;" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="px-5 px-sm-6">
                                <p class="fs-sm-8 fs-md-7 fst-italic text-1100">"Lo que más me dio tranquilidad fue el
                                    cumplimiento total con la NOM-024. Puedo compartir información con laboratorios de
                                    forma segura y profesional."</p>
                                <p class="fs-9 text-600">- Dra. Elena Rodríguez, Directora Médica</p>
                                <img class="w-auto mx-auto"
                                    src="{{ Vitx::asset('assets/img/logos/mexico/hospital-2.png') }}"
                                    alt="Centro Médico" height="30"
                                    style="filter: grayscale(100%); opacity: 0.6;" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="px-5 px-sm-6">
                                <p class="fs-sm-8 fs-md-7 fst-italic text-1100">"Administrar tres sucursales era un
                                    caos hasta que migramos aquí. Ahora reviso las agendas y el inventario de cada
                                    clínica desde mi iPad mientras estoy en cirugía."</p>
                                <p class="fs-9 text-600">- Dr. Ricardo Silva, Cirujano General</p>
                                <img class="w-auto mx-auto"
                                    src="{{ Vitx::asset('assets/img/logos/mexico/hospital-3.png') }}"
                                    alt="Hospital Central" height="45"
                                    style="filter: grayscale(100%); opacity: 0.6;" />
                            </div>
                        </div>
                    </div>
                    <div class="swiper-nav">
                        <div class="swiper-button-next swiper-button-white"></div>
                        <div class="swiper-button-prev swiper-button-white"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-dark" data-bs-theme="light">
    <div class="bg-holder overlay"
        style="background-image:url({{ Vitx::asset('assets/img/generic/bg-2.jpg') }});background-position: center top;">
    </div>
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <p class="fs-6 fs-sm-5 text-white">Únete a los más de 500 centros de salud que ya transformaron su
                    gestión con nuestro sistema de <strong>expedientes</strong> inteligentes.</p>

                <a class="btn btn-outline-light border-2 rounded-pill btn-lg mt-4 fs-9 py-2" href="">
                    Comienza tu prueba gratuita </a>

                <div class="mt-3">
                    <small class="text-white opacity-50">Sin tarjetas de crédito · Instalación inmediata para tu
                        clínica</small>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-dark pt-8 pb-4" data-bs-theme="light">
    <div class="container">
        <div class="position-absolute btn-back-to-top bg-dark">
            <a class="text-600" href="#banner" data-bs-offset-top="0">
                <span class="fas fa-chevron-up" data-fa-transform="rotate-45"></span>
            </a>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <h5 class="text-uppercase text-white opacity-85 mb-3">Nuestra Misión</h5>
                <p class="text-600">Transformar la gestión de salud mediante tecnología interoperable, permitiendo que
                    médicos y clínicas se enfoquen en lo más importante: la vida y el bienestar de sus pacientes.</p>
                <div class="icon-group mt-4">
                    <a class="icon-item bg-white text-facebook" href="#!"><span
                            class="fab fa-facebook-f"></span></a>
                    <a class="icon-item bg-white text-twitter" href="#!"><span
                            class="fab fa-twitter"></span></a>
                    <a class="icon-item bg-white text-linkedin" href="#!"><span
                            class="fab fa-linkedin-in"></span></a>
                </div>
            </div>
            <div class="col ps-lg-6 ps-xl-8">
                <div class="row mt-5 mt-lg-0">
                    <div class="col-6 col-md-3">
                        <h5 class="text-uppercase text-white opacity-85 mb-3">Legal</h5>
                        <ul class="list-unstyled">
                            <li class="mb-1"><a class="link-600" href="#!">Aviso de Privacidad</a></li>
                            <li class="mb-1"><a class="link-600" href="#!">Términos y Condiciones</a></li>
                            <li class="mb-1"><a class="link-600" href="#!">Cumplimiento NOM-024</a></li>
                            <li class="mb-1"><a class="link-600" href="#!">Acuerdo de Nivel de Servicio</a>
                            </li>
                            <li class="mb-1"><a class="link-600" href="#!">Contacto</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-3">
                        <h5 class="text-uppercase text-white opacity-85 mb-3">Soluciones</h5>
                        <ul class="list-unstyled">
                            <li class="mb-1"><a class="link-600" href="#!">Expediente Digital</a></li>
                            <li class="mb-1"><a class="link-600" href="#!">Agenda Médica</a></li>
                            <li class="mb-1"><a class="link-600" href="#!">Facturación CFDI</a></li>
                            <li class="mb-1"><a class="link-600" href="#!">Planes y Precios</a></li>
                            <li class="mb-1"><a class="link-600" href="#!">Interoperabilidad HL7</a></li>
                            <li class="mb-1"><a class="link-600" href="#!">Soporte Tenant</a></li>
                        </ul>
                    </div>
                    <div class="col mt-5 mt-md-0">
                        <h5 class="text-uppercase text-white opacity-85 mb-3">Actualizaciones Médicas</h5>
                        <ul class="list-unstyled">
                            <li>
                                <h5 class="fs-9 mb-0"><a class="link-600" href="#!">Nuevos estándares de
                                        interoperabilidad en MX</a></h5>
                                <p class="text-600 opacity-50">Ene 15 &bull; 8min lectura </p>
                            </li>
                            <li>
                                <h5 class="fs-9 mb-0"><a class="link-600" href="#!">Cómo proteger los datos de
                                        tus pacientes</a></h5>
                                <p class="text-600 opacity-50">Ene 5 &bull; 3min lectura &starf;</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
