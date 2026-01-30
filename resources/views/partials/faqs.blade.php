@section('title', ' | Preguntas Frecuentes')

<section class="py-8 py-lg-10 dark__bg-1100 bg-dark">
    <div class="bg-holder overlay overlay-1"
        style="background-image:url({{ Vitx::asset('assets/img/generic/bg-2.jpg') }});background-position: center 20%;">
    </div>
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8 col-xl-7 position-relative">
                <h1 class="text-white fw-light fs-4 fs-sm-5">Preguntas <span class="fw-bold">Frecuentes</span></h1>
                <p class="lead text-white opacity-75">Resolvemos tus dudas técnicas sobre nuestra plataforma médica y
                    cumplimiento normativo.</p>
            </div>
        </div>
    </div>
</section>

<div class="container mt-n6 position-relative z-1">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg mb-4">
                <div class="card-header bg-body-tertiary">
                    <h4 class="text-center mb-0">Centro de ayuda</h4>
                </div>
                <div class="card-body p-4 p-sm-5">
                    <div class="accordion rounded overflow-hidden" id="accordionFaq">
                        <div class="row">
                            @foreach ($faqs as $k => $faq)
                                {{-- Aquí aplicamos el 12 para móvil y 6 para escritorio --}}
                                <div class="col-12 col-md-6">
                                    <div class="card shadow-none rounded-0 ">
                                        <div class="accordion-item border-0 border-0">
                                            <div class="card-header p-0" id="faqAccordionHeading{{ $faq['code'] }}">
                                                <h6>
                                                    <a href="#!" class="text-decoration-none d-flex py-2 px-3"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseFaqAccordion{{ $faq['code'] }}"
                                                        aria-expanded="false"
                                                        aria-controls="collapseFaqAccordion{{ $faq['code'] }}">

                                                        <span
                                                            class="fas fa-caret-right accordion-icon me-3 mt-1 text-primary"
                                                            data-fa-transform="shrink-2"></span>

                                                        <span
                                                            class="fw-medium font-sans-serif">{{ $faq['question'] }}</span>
                                                    </a>
                                                </h6>
                                            </div>
                                            <div class="accordion-collapse collapse"
                                                id="collapseFaqAccordion{{ $faq['code'] }}"
                                                aria-labelledby="faqAccordionHeading{{ $faq['code'] }}"
                                                {{-- Nota: si quieres que se cierren otros al abrir uno, el data-parent debe ser el ID del contenedor .row --}} data-bs-parent="#accordionFaq">
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
                <div
                    class="card-footer bg-body-tertiary d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <p class="mb-3 mb-md-0 fs-10 text-700 italic">¿Tienes más preguntas? Chatea con un experto.</p>
                    <a href="https://wa.me/521XXXXXXXXXX" class="btn btn-success btn-sm">
                        <span class="fab fa-whatsapp me-2"></span>Soporte vía WhatsApp
                    </a>
                </div>
            </div>

            <div class="card bg-primary dark__bg-1000">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-9 text-center text-md-start">
                            <h5 class="text-white">Interoperabilidad Garantizada</h5>
                            <p class="text-white opacity-75 fs-10 mb-0">Nuestro sistema está diseñado bajo los
                                estándares HL7 y la NOM-024-SSA3-2012, asegurando que tus expedientes sean válidos en
                                todo el país.</p>
                        </div>
                        <div class="col-md-3 text-center mt-3 mt-md-0">
                            <span class="fas fa-shield-alt text-white fs-4"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
