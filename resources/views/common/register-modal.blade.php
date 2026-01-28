<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="register-modal-label">
    <div class="modal-dialog mt-6" role="document">
        <div class="modal-content border-0">
            <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
                <div class="position-relative z-1">
                    <h4 class="mb-0 text-white" id="register-modal-label">Registro de Cuenta</h4>
                    <p class="fs-10 mb-0 text-white">
                        Plan seleccionado: <span id="plan-name-display"
                            class="fw-bold text-warning text-uppercase"></span>
                        <span class="mx-1">|</span>
                        Facturación: <span id="billing-period-display"
                            class="fw-bold text-info text-uppercase">MENSUAL</span>
                    </p>
                </div>
                <div data-bs-theme="dark">
                    <button class="btn-close position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
            </div>

            <div class="modal-body py-4 px-5">
                {{-- Alertas de Sistema y Plan (Se mantienen igual) --}}
                @if (session('error'))
                    <div class="alert alert-danger border-2 d-flex align-items-center fs-11" role="alert">
                        <div class="bg-danger me-2 icon-item"><span class="fas fa-times-circle text-white fs-10"></span>
                        </div>
                        <p class="mb-0 flex-1"><strong>Error de Sistema:</strong> {{ session('error') }}</p>
                    </div>
                @endif

                <form id="form-register" action="{{ route('landing.register') }}" method="POST"
                    class="needs-validation">
                    @csrf
                    <input type="hidden" name="plan_id" id="modal-plan-id" value="{{ old('plan_id') }}">
                    <input type="hidden" name="billing_period" id="modal-billing-period"
                        value="{{ old('billing_period', 'monthly') }}">

                    {{-- Nombre Completo --}}
                    <div class="mb-3">
                        <label class="form-label" for="reg-name">Nombre Completo</label>
                        <input
                            class="form-control @error('name') is-invalid @elseif(old('name')) is-valid @enderror"
                            type="text" name="name" id="reg-name" value="{{ old('name') }}" required />
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <div class="valid-feedback">¡Se ve bien!</div>
                        @enderror
                    </div>

                    {{-- Nombre de la Clínica --}}
                    <div class="mb-3">
                        <label class="form-label" for="reg-company">Nombre de tu Clínica</label>
                        <input
                            class="form-control @error('company') is-invalid @elseif(old('company')) is-valid @enderror"
                            type="text" name="company" id="reg-company" value="{{ old('company') }}" required />
                        @error('company')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <div class="valid-feedback">Excelente nombre.</div>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label class="form-label" for="reg-email">Email Profesional</label>
                        <input
                            class="form-control @error('email') is-invalid @elseif(old('email')) is-valid @enderror"
                            type="email" name="email" id="reg-email" value="{{ old('email') }}" required />
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <div class="valid-feedback">Usaremos este email para tu expediente.</div>
                        @enderror
                    </div>

                    {{-- Contraseñas --}}
                    <div class="row gx-2">
                        <div class="col-sm-6 mb-3">
                            <label class="form-label" for="reg-password">Contraseña</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password"
                                name="password" id="reg-password" required />
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label class="form-label" for="reg-confirm">Confirmar</label>
                            <input class="form-control @if (old('password') && !$errors->has('password')) is-valid @endif"
                                type="password" name="password_confirmation" id="reg-confirm" required />
                        </div>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="reg-terms" required checked />
                        <label class="form-check-label fs-10 text-600" for="reg-terms">
                            Al registrarte, confirmas que aceptas los términos.
                        </label>
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-primary d-block w-100 mt-3" type="submit">
                            <span class="fas fa-user-plus me-2"></span>Crear mi cuenta médica
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const planSwitch = document.getElementById('planSwitch');
            const priceElements = document.querySelectorAll('.price-value');
            const registerModalElement = document.getElementById('register-modal');
            const form = document.getElementById('form-register');
            const planIdInput = document.getElementById('modal-plan-id');
            const hiddenPeriodInput = document.getElementById('modal-billing-period');
            const planNameDisplay = document.getElementById('plan-name-display');
            const billingPeriodDisplay = document.getElementById('billing-period-display');
            const submitBtn = form?.querySelector('button[type="submit"]');

            // --- 1. ACTUALIZACIÓN DE PRECIOS ---
            const updatePricingUI = (isYearly) => {
                if (hiddenPeriodInput) hiddenPeriodInput.value = isYearly ? 'yearly' : 'monthly';
                priceElements.forEach(el => {
                    const planCard = el.closest('.plan-container');
                    if (!planCard) return;
                    const slug = planCard.getAttribute('data-slug');
                    el.innerText = isYearly ? el.getAttribute('data-yearly') : el.getAttribute(
                        'data-monthly');
                    const periodText = document.getElementById(`period-text-${slug}`);
                    if (periodText) periodText.innerText = isYearly ? '/ mes anual' : '/ mes';
                    const badge = document.getElementById(`savings-${slug}`);
                    if (badge) isYearly ? badge.classList.remove('d-none') : badge.classList.add(
                        'd-none');
                });
            };

            if (planSwitch) {
                planSwitch.addEventListener('change', () => updatePricingUI(planSwitch.checked));
            }

            // --- 2. VALIDACIÓN EN TIEMPO REAL (Lógica Falcon/Bootstrap) ---
            if (form) {
                const inputs = form.querySelectorAll('input:not([type="hidden"]):not([type="checkbox"])');

                inputs.forEach(input => {
                    const handleValidation = () => {
                        if (input.value.trim() !== '') {
                            if (input.checkValidity()) {
                                input.classList.replace('is-invalid', 'is-valid') || input.classList
                                    .add('is-valid');
                            } else {
                                input.classList.replace('is-valid', 'is-invalid') || input.classList
                                    .add('is-invalid');
                            }
                        } else {
                            input.classList.remove('is-valid', 'is-invalid');
                        }
                    };

                    input.addEventListener('input', handleValidation);
                    input.addEventListener('blur', handleValidation);
                });

                // --- 3. MANEJO DEL SUBMIT (SPINNER FALCON) ---
                form.addEventListener('submit', (e) => {
                    if (!form.checkValidity()) {
                        e.preventDefault();
                        e.stopPropagation();
                        form.classList.add('was-validated');
                        return;
                    }

                    if (submitBtn) {
                        submitBtn.disabled = true;
                        // Estructura oficial de Falcon para spinners en botones
                        submitBtn.innerHTML = `
                        <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                        Procesando Registro...
                    `;
                    }
                });
            }

            // --- 4. APERTURA DEL MODAL (LIMPIEZA TOTAL) ---
            document.querySelectorAll('.open-register-modal').forEach(button => {
                button.addEventListener('click', () => {
                    if (form) {
                        form.reset();
                        form.classList.remove('was-validated');
                        form.querySelectorAll('.is-invalid, .is-valid').forEach(i => i.classList
                            .remove('is-invalid', 'is-valid'));
                        if (submitBtn) {
                            submitBtn.disabled = false;
                            submitBtn.innerHTML =
                                '<span class="fas fa-user-plus me-2"></span>Crear mi cuenta médica';
                        }
                    }

                    // Sincronización de Plan
                    const planSlug = button.getAttribute('data-id');
                    const planName = button.getAttribute('data-name');
                    const isYearly = planSwitch ? planSwitch.checked : false;

                    if (planIdInput) planIdInput.value = planSlug;
                    if (planNameDisplay) planNameDisplay.innerText = planName;
                    if (hiddenPeriodInput) hiddenPeriodInput.value = isYearly ? 'yearly' :
                    'monthly';

                    if (billingPeriodDisplay) {
                        billingPeriodDisplay.innerText = isYearly ? 'ANUAL' : 'MENSUAL';
                        billingPeriodDisplay.className =
                            `fw-bold text-uppercase ${isYearly ? 'text-info' : 'text-light'}`;
                    }

                    // Limpiar alertas previas de la API
                    registerModalElement.querySelectorAll('.alert').forEach(alert => alert
                .remove());
                });
            });

            // --- 5. RE-APERTURA POR ERRORES DE SERVIDOR ---
            @if ($errors->any() || session('error'))
                const modalInstance = new bootstrap.Modal(registerModalElement);
                modalInstance.show();

                const oldPeriod = "{{ old('billing_period') }}";
                if (oldPeriod && planSwitch) {
                    planSwitch.checked = (oldPeriod === 'yearly');
                    updatePricingUI(planSwitch.checked);
                }
            @endif

            // --- 6. ÉXITO (SWEET ALERT) ---
            @if (session('registered'))
                if (form) form.reset();
                sweetModal({
                    title: '¡Clínica Registrada!',
                    message: 'Hemos recibido su solicitud. Por seguridad, debe confirmar su correo para activar su expediente.',
                    iconType: 'success'
                });
            @endif
        });
    </script>
@endsection
