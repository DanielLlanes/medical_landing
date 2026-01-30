@section('title', ' | Precios de Planes Médicos')
<section class="py-8 py-lg-10 dark__bg-1100 bg-dark">
    <div class="bg-holder overlay overlay-1"
        style="background-image:url({{ Vitx::asset('assets/img/generic/bg-1.jpg') }});background-position: center 20%;">
    </div>
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8 col-xl-7 position-relative">
                <h1 class="text-white fw-light fs-4 fs-sm-5">Planes diseñados para <span class="fw-bold">tu centro de
                        salud</span></h1>
                <p class="lead text-white opacity-75">Interoperabilidad HL7/FHIR y cumplimiento normativo NOM-024.</p>
            </div>
        </div>
    </div>
</section>

<div class="container mt-n6 position-relative z-1">
    <div class="card mb-3 shadow-lg">
        <div class="card-body">
            <div class="row g-0">
                {{-- Cabecera del Switch de Pago --}}
                <div class="col-12 mb-4">
                    <div class="row justify-content-center justify-content-sm-between align-items-center">
                        <div class="col-sm-auto text-center">
                            <h5 class="d-inline-block mb-0">Pago Anual</h5>
                            <span class="badge badge-subtle-success rounded-pill ms-2">Ahorra 25%</span>
                        </div>
                        <div class="col-sm-auto d-flex justify-content-center mt-2 mt-sm-0">
                            <label class="form-check-label me-2" for="planSwitch">Mensual</label>
                            <div class="form-check form-switch mb-0">
                                <input class="form-check-input falcon-dual-switch" id="planSwitch" type="checkbox"
                                    checked="checked" />
                                <label class="form-check-label align-top" for="planSwitch">Anual</label>
                            </div>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger fs-11">
                                <strong>Error detectado:</strong>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            {{-- Si no hay errores de validación pero la sesión tiene un error genérico --}}
                            @if (session('error'))
                                <div class="alert alert-warning fs-11">
                                    {{ session('error') }}
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
                {{-- Renderizado Dinámico de Planes --}}
                @foreach ($plans as $plan)
                    @php
                        $isPro = $plan['slug'] === 'plan_clinica_pro_01';
                        $isHospital = $plan['slug'] === 'plan_hospital_01';
                    @endphp

                    <div class="col-lg-3 border-top border-bottom p-4 text-center {{ $isPro ? 'dark__bg-1000' : '' }}"
                        @if ($isPro) style="background-color: rgba(44, 123, 229, 0.05);" @endif>

                        <h3 class="fw-normal my-0 {{ $isPro ? 'text-primary' : '' }}">{{ $plan['name'] }}</h3>

                        <p class="mt-3 fs-10">
                            @if ($plan['slug'] === 'plan_basico_01')
                                Ideal para médicos que inician o consultorios pequeños.
                            @elseif($plan['slug'] === 'plan_consultorio_01')
                                Para médicos independientes con flujo completo.
                            @elseif($isPro)
                                Interoperabilidad total y facturación integrada.
                            @else
                                Para grupos médicos y hospitales medianos/grandes.
                            @endif
                        </p>

                        <h2 class="fw-medium my-4 {{ $isPro ? 'text-primary' : '' }}">
                            <sup class="fw-normal fs-7 me-1">$</sup>{{ number_format($plan['price'], 0) }}<small
                                class="fs-10 text-700">/ mes</small>
                        </h2>

                        {{-- Botones Dinámicos --}}
                        @if ($isHospital)
                            <a class="btn btn-outline-primary rounded-pill" href="#!">Contactar Ventas</a>
                        @else
                            <button
                                class="btn {{ $isPro ? 'btn-primary' : 'btn-outline-primary' }} rounded-pill open-register-modal"
                                data-bs-toggle="modal" data-bs-target="#register-modal" data-id="{{ $plan['slug'] }}"
                                data-name="{{ $plan['name'] }}">
                                Probar Gratis 14 días
                            </button>
                        @endif

                        <hr class="my-4 opacity-10" />

                        {{-- Lista de Features desde el Array --}}
                        <ul class="list-unstyled text-start mx-auto" style="max-width: 220px;">
                            @foreach ($plan['features'] as $feature)
                                <li class="py-1 fs-10">
                                    <span class="me-2 fas fa-check text-success"></span>{{ $feature }}
                                </li>
                            @endforeach

                            {{-- Feature de límite de usuarios (dinámica) --}}
                            <li class="py-1 fs-10">
                                <span class="me-2 fas fa-check text-success"></span>
                                {{ $plan['limit_users'] >= 999 ? 'Médicos y Usuarios Ilimitados' : 'Hasta ' . $plan['limit_users'] . ($plan['limit_users'] == 1 ? ' Médico usuario' : ' Médicos') }}
                            </li>
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-body-tertiary">
            <h4 class="text-center mb-0">Preguntas Frecuentes</h4>
        </div>
        <div class="card-body">
            {{-- @foreach ($faqs as $faq)
                <h6><a href="#!">{{ $faq['question'] }}<span class="fas fa-caret-right ms-2"></span></a></h6>
                <p class="fs-10 mb-0">{{ $faq['answer'] }}
                </p>
                <hr class="my-3" />
            @endforeach --}}
            <div class="accordion rounded overflow-hidden" id="accordionFaq">
                <div class="row">
                    @foreach ($faqs as $k => $faq)
                        {{-- Aquí aplicamos el 12 para móvil y 6 para escritorio --}}
                        <div class="col-12 col-md-6">
                            <div class="card shadow-none rounded-0 ">
                                <div class="accordion-item border-0 border-0">
                                    <div class="card-header p-0" id="faqAccordionHeading{{ $k }}">
                                        <h6>
                                            <a href="#!" class="text-decoration-none d-flex py-2 px-3"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapseFaqAccordion{{ $k }}"
                                                aria-expanded="false"
                                                aria-controls="collapseFaqAccordion{{ $k }}">

                                                <span class="fas fa-caret-right accordion-icon me-3 mt-1 text-primary"
                                                    data-fa-transform="shrink-2"></span>

                                                <span class="fw-medium font-sans-serif">{{ $faq['question'] }}</span>
                                            </a>
                                        </h6>
                                    </div>
                                    <div class="accordion-collapse collapse"
                                        id="collapseFaqAccordion{{ $k }}"
                                        aria-labelledby="faqAccordionHeading{{ $k }}" {{-- Nota: si quieres que se cierren otros al abrir uno, el data-parent debe ser el ID del contenedor .row --}}
                                        data-bs-parent="#accordionFaq">
                                        <div class="accordion-body p-0">
                                            <div class="card-body pt-2">
                                                <p class="ps-3 fs-10 mb-0">{{ $faq['answer'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-3" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card-footer bg-body-tertiary">
            <div class="row g-3 align-items-center">
                <div class="col-12 col-lg-6 text-center text-lg-start">
                    <h5 class="d-inline-block me-3 mb-0 fs-10 text-700">¿Esta información fue útil?</h5>
                    <button class="btn btn-falcon-default btn-sm">Sí</button>
                    <button class="btn btn-falcon-default btn-sm ms-2">No</button>
                </div>
                <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-end align-items-center">
                    <h5 class="d-inline-block me-3 mb-0 fs-10">¿Necesitas más ayuda?</h5>
                    <button class="btn btn-falcon-default btn-sm">Chatea con nosotros</button>
                </div>
            </div>
        </div>
    </div>

</div>
