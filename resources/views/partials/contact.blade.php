@section('title', ' | Contacto y Soporte Médico')

<section class="py-8 py-lg-10 dark__bg-1100 bg-dark">
    <div class="bg-holder overlay overlay-1"
        style="background-image:url({{ Vitx::asset('assets/img/generic/bg-1.jpg') }});background-position: center 20%;">
    </div>
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8 col-xl-7 position-relative">
                <h1 class="text-white fw-light fs-4 fs-sm-5">Estamos para <span class="fw-bold">apoyarte</span></h1>
                <p class="lead text-white opacity-75">Resuelve tus dudas sobre la implementación de la NOM-024 o solicita
                    una demo personalizada.</p>
            </div>
        </div>
    </div>
</section>

<div class="container mt-n6 position-relative z-1">
    <div class="row g-3">
        <div class="col-lg-8">
            <div class="card shadow-lg mb-3">
                <div class="card-header bg-body-tertiary">
                    <h4 class="mb-0">Envíanos un mensaje</h4>
                </div>
                <div class="card-body p-4 p-sm-5">
                    <form class="needs-validation" novalidate>
                        <div class="row gx-2">
                            <div class="mb-3 col-sm-6">
                                <label class="form-label" for="name">Nombre Completo</label>
                                <input class="form-control" type="text" id="name" required />
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label class="form-label" for="email">Email Profesional</label>
                                <input class="form-control" type="email" id="email" required />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="subject">Asunto</label>
                            <select class="form-select" id="subject" required>
                                <option value="" selected disabled>Selecciona una opción</option>
                                <option value="ventas">Ventas y Planes</option>
                                <option value="soporte">Soporte Técnico</option>
                                <option value="demo">Solicitar Demo</option>
                                <option value="interoperabilidad">Dudas HL7 / FHIR</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="message">Mensaje</label>
                            <textarea class="form-control" id="message" rows="5" required></textarea>
                        </div>
                        <button class="btn btn-primary d-block w-100" type="submit">
                            <span class="fas fa-paper-plane me-2"></span>Enviar mensaje
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-lg mb-3">
                <div class="card-body">
                    <h5 class="mb-3">Información de Contacto</h5>
                    <div class="d-flex mb-3">
                        <span class="fas fa-map-marker-alt text-primary fs-8 me-3"></span>
                        <div class="flex-1">
                            <h6 class="mb-1">Ubicación</h6>
                            <p class="fs-10 mb-0 text-700">Ciudad de México, México<br />Centro de Datos Certificado</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <span class="fas fa-envelope text-primary fs-8 me-3"></span>
                        <div class="flex-1">
                            <h6 class="mb-1">Email</h6>
                            <a class="fs-10 mb-0 text-700" href="mailto:soporte@tu-app.com">soporte@tu-app.com</a>
                        </div>
                    </div>
                    <div class="d-flex">
                        <span class="fab fa-whatsapp text-success fs-8 me-3"></span>
                        <div class="flex-1">
                            <h6 class="mb-1">WhatsApp Business</h6>
                            <p class="fs-10 mb-0 text-700">Lunes a Viernes: 9:00 - 18:00</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card bg-primary dark__bg-1000">
                <div class="card-body">
                    <h5 class="text-white">Cumplimiento Normativo</h5>
                    <p class="text-white opacity-75 fs-10">Nuestros canales de comunicación están protegidos y cumplen
                        con los estándares de privacidad para datos de salud sensibles.</p>
                    <ul class="list-unstyled mb-0">
                        <li class="text-white fs-10 mb-1"><span class="fas fa-check-circle me-2"></span>NOM-024-SSA3
                        </li>
                        <li class="text-white fs-10 mb-1"><span class="fas fa-check-circle me-2"></span>HL7 FHIR Ready
                        </li>
                        <li class="text-white fs-10"><span class="fas fa-check-circle me-2"></span>GDPR & HIPAA
                            Compliant</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
