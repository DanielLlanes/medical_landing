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
                            <h5 class="d-inline-block mb-0">Planes Médicos</h5>
                            <span class="badge badge-subtle-success rounded-pill ms-2">Ahorro en pago anual</span>
                        </div>
                        <div class="col-sm-auto d-flex justify-content-center mt-2 mt-sm-0">
                            <label class="form-check-label me-2" for="planSwitch">Mensual</label>
                            <div class="form-check form-switch mb-0">
                                <input class="form-check-input falcon-dual-switch" id="planSwitch" type="checkbox" />
                                <label class="form-check-label align-top" for="planSwitch">Anual</label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Renderizado Dinámico de Planes --}}
                @foreach ($plans as $plan)
                    @php
                        $priceMonthly = (float) $plan['price'];
                        $discount = (float) $plan['annual_discount'];
                        $priceYearlyMonthly = $priceMonthly * (1 - $discount);
                        $isRecommended = $plan['is_recommended'] ?? false;
                        $slug = $plan['slug'];
                    @endphp

                    {{-- Contenedor con clase plan-container y data-slug para el JS --}}
                    <div class="col-lg-3 border-top border-bottom p-4 text-center plan-container {{ $isRecommended ? 'dark__bg-1000' : '' }}"
                        data-slug="{{ $slug }}"
                        @if ($isRecommended) style="background-color: rgba(44, 123, 229, 0.05);" @endif>

                        <h3 class="fw-normal my-0 {{ $isRecommended ? 'text-primary' : '' }}">{{ $plan['name'] }}</h3>

                        <p class="mt-3 fs-10 text-muted" style="min-height: 40px;">
                            {{ $plan['description'] ?? 'Solución integral para tu práctica médica.' }}
                        </p>

                        <h2 class="fw-medium my-4 {{ $isRecommended ? 'text-primary' : '' }}">
                            <sup class="fw-normal fs-7 me-1">$</sup>
                            <span class="price-value" data-monthly="{{ number_format($priceMonthly, 0) }}"
                                data-yearly="{{ number_format($priceYearlyMonthly, 0) }}">
                                {{ number_format($priceMonthly, 0) }}
                            </span>
                            <small class="fs-10 text-700" id="period-text-{{ $slug }}">/ mes</small>
                        </h2>

                        {{-- Badge de Ahorro Dinámico --}}
                        <div style="min-height: 25px;">
                            <span class="badge rounded-pill badge-subtle-success d-none"
                                id="savings-{{ $slug }}">
                                Ahorras ${{ number_format($priceMonthly - $priceYearlyMonthly, 0) }} / mes
                            </span>
                        </div>

                        {{-- Botón Dinámico --}}
                        @if ($slug === 'plan_hospital_01')
                            <a class="btn btn-outline-primary rounded-pill mt-3"
                                href="mailto:ventas@medical.test">Contactar Ventas</a>
                        @else
                            <button
                                class="btn {{ $isRecommended ? 'btn-primary' : 'btn-outline-primary' }} rounded-pill mt-3 open-register-modal"
                                data-bs-toggle="modal" data-bs-target="#register-modal" data-id="{{ $slug }}"
                                data-name="{{ $plan['name'] }}">
                                Probar Gratis {{ $plan['trial_days'] }} días
                            </button>
                        @endif

                        <hr class="my-4 opacity-10" />

                        {{-- Lista de Features Dinámica --}}
                        <ul class="list-unstyled text-start mx-auto" style="max-width: 220px;">
                            @foreach ($plan['features'] as $feature)
                                <li class="py-1 fs-10">
                                    <span class="me-2 fas fa-check text-success"></span>{{ $feature }}
                                </li>
                            @endforeach

                            <li class="py-1 fs-10 fw-bold">
                                <span class="me-2 fas fa-user-md text-primary"></span>
                                {{ $plan['limit_users'] >= 999 ? 'Usuarios Ilimitados' : 'Hasta ' . $plan['limit_users'] . ' Médicos' }}
                            </li>

                            <li class="py-1 fs-10">
                                <span class="me-2 fas fa-hdd text-info"></span>
                                {{ $plan['limit_storage_gb'] }} GB de Almacenamiento
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
            <h6><a href="#!">¿Cómo se protegen los datos de salud de mis pacientes?<span
                        class="fas fa-caret-right ms-2"></span></a></h6>
            <p class="fs-10 mb-0">La seguridad es nuestra prioridad. Cumplimos con la
                <strong>NOM-024-SSA3-2012</strong> para el manejo de Expediente Clínico Electrónico. Los datos están
                cifrados con AES-256 y alojados en servidores con certificación SSAE 16 / SOC1, garantizando que solo el
                personal autorizado acceda a la información médica.
            </p>
            <hr class="my-3" />

            <h6><a href="#!">¿Puedo compartir información con otros hospitales o laboratorios?<span
                        class="fas fa-caret-right ms-2"></span></a></h6>
            <p class="fs-10 mb-0">Sí. El sistema está diseñado bajo estándares internacionales <strong>HL7 y
                    FHIR</strong>, lo que permite la interoperabilidad con otros sistemas de salud, facilitando el
                intercambio seguro de expedientes, resultados de laboratorio y órdenes clínicas.</p>
            <hr class="my-3" />

            <h6><a href="#!">¿El sistema cumple con la NOM-004-SSA3-2012 y la NOM-024 actualizada?<span
                        class="fas fa-caret-right ms-2"></span></a></h6>
            <p class="fs-10 mb-0">Sí, cumplimos estrictamente con la NOM-004 (manejo del expediente clínico) y la
                NOM-024-SSA3 (intercambio de información). Nuestro expediente está certificado, con trazabilidad
                completa de accesos y modificaciones.</p>
            <hr class="my-3" />

            <h6><a href="#!">¿Cómo funciona la facturación electrónica CFDI 4.0?<span
                        class="fas fa-caret-right ms-2"></span></a></h6>
            <p class="fs-10 mb-0">Integramos facturación CFDI 4.0 nativa. Genera XML y PDF timbrado automáticamente,
                compatible con SAT, con complementos de pago. Envío directo por correo al paciente en un clic.</p>
            <hr class="my-3" />

            <h6><a href="#!">¿Qué métodos de pago aceptan para la suscripción?<span
                        class="fas fa-caret-right ms-2"></span></a></h6>
            <p class="fs-10 mb-0">Aceptamos tarjetas de crédito/débito principales. Para anuales, factura para
                transferencia o cheque. Mensuales solo con tarjeta.</p>
            <hr class="my-3" />

            <h6><a href="#!">Necesito agregar más médicos, ¿cómo se factura?<span
                        class="fas fa-caret-right ms-2"></span></a></h6>
            <p class="fs-10 mb-0">Aumenta usuarios desde el panel. Ajuste prorrateado automático hasta fin de ciclo.
            </p>
            <hr class="my-3" />

            <h6><a href="#!">¿Puedo importar expedientes de otro software?<span
                        class="fas fa-caret-right ms-2"></span></a></h6>
            <p class="fs-10 mb-0">Sí, con migración masiva (CSV, XML, HL7). Gratuita en planes Clínica Pro y Hospital.
            </p>
            <hr class="my-3" />

            <h6><a href="#!">¿Los precios incluyen impuestos (IVA)?<span
                        class="fas fa-caret-right ms-2"></span></a></h6>
            <p class="fs-10 mb-0">Precios netos. Se aplica IVA al pagar. Emitimos CFDI 4.0 deducible en México.</p>
            <hr class="my-3" />

            <h6><a href="#!">¿Existe versión on-premise (instalación local)?<span
                        class="fas fa-caret-right ms-2"></span></a></h6>
            <p class="fs-10 mb-0">100% nube para actualizaciones automáticas y cumplimiento. No ofrecemos on-premise.
            </p>
            <hr class="my-3" />

            <h6><a href="#!">¿Cuál es la política de reembolso?<span class="fas fa-caret-right ms-2"></span></a>
            </h6>
            <p class="fs-10 mb-0">No reembolsos generales. Cancelación antes de renovación mantiene acceso hasta fin de
                periodo. Posible reembolso completo en primeras 48 horas tras cargo inicial.</p>
            <hr class="my-3" />

            <h6><a href="#!">¿Puedo personalizar recetas, indicaciones y certificados?<span
                        class="fas fa-caret-right ms-2"></span></a></h6>
            <p class="fs-10 mb-0">Sí, 100% personalizables con logo, membrete, firma digital y plantillas por
                especialidad.</p>
            <hr class="my-3" />

            <h6><a href="#!">¿Qué pasa si se va la internet?<span class="fas fa-caret-right ms-2"></span></a>
            </h6>
            <p class="fs-10 mb-0">Modo offline limitado: registra consultas y notas que se sincronizan al reconectar.
            </p>
            <hr class="my-3" />

            <h6><a href="#!">¿Incluye integración con WhatsApp para recordatorios?<span
                        class="fas fa-caret-right ms-2"></span></a></h6>
            <p class="fs-10 mb-0">Sí, WhatsApp Business API para recordatorios, confirmaciones y envío de recetas (con
                consentimiento).</p>
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
