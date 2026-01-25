<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="register-modal-label">
    <div class="modal-dialog mt-6" role="document">
        <div class="modal-content border-0">
            <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
                <div class="position-relative z-1">
                    <h4 class="mb-0 text-white" id="register-modal-label">Registro de Cuenta</h4>
                    <p class="fs-10 mb-0 text-white">Plan seleccionado: <span id="plan-name-display"
                            class="fw-bold text-warning text-uppercase"></span></p>
                </div>
                <div data-bs-theme="dark">
                    <button class="btn-close position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body py-4 px-5">
                <form id="form-register" action="{{ route('landing.register') }}" method="POST">
                    @csrf
                    {{-- Guardamos el ID del plan que se seleccionó --}}
                    <input type="hidden" name="plan_id" id="modal-plan-id" value="{{ old('plan_id') }}">
                    @error('plan_id')
                        <div class="alert alert-danger fs-11 p-2">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <label class="form-label" for="reg-name">Nombre Completo</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            id="reg-name" value="{{ old('name') }}" required />
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="reg-company">Nombre de tu Clínica</label>
                        <input class="form-control @error('company') is-invalid @enderror" type="text" name="company"
                            id="reg-company" value="{{ old('company') }}" required />
                        @error('company')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="reg-email">Email Profesional</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                            id="reg-email" value="{{ old('email') }}" required />
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

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
                            <input class="form-control" type="password" name="password_confirmation" id="reg-confirm"
                                required />
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
        document.addEventListener('DOMContentLoaded', function() {

            /**
             * BLOQUE 1: SINCRONIZACIÓN SERVIDOR -> CLIENTE
             * Aquí Blade inyecta un valor booleano puro (true/false) antes de enviar el archivo.
             * Esto permite que JavaScript sepa si la validación de la API falló sin tener que
             * consultar ninguna sesión directamente.
             */
            const hasErrors = {{ $errors->any() ? 'true' : 'false' }};

            /**
             * BLOQUE 2: PERSISTENCIA DEL ESTADO VISUAL
             * Si hubo errores, el navegador recarga la página. Este bloque se asegura de
             * reabrir el modal automáticamente y restaurar el nombre del plan que el
             * usuario había seleccionado originalmente.
             */
            if (hasErrors) {
                const modalElement = document.getElementById('register-modal');

                if (modalElement) {
                    const registerModal = new bootstrap.Modal(modalElement);
                    registerModal.show();
                }

                const oldPlanId = document.getElementById('modal-plan-id').value;
                const display = document.getElementById('plan-name-display');

                if (oldPlanId && display) {
                    const cleanName = oldPlanId.replace('plan_', '').replace('_01', '').toUpperCase();
                    display.innerText = cleanName;
                }
            }

            /**
             * BLOQUE 3: CONTROL DE EVENTOS POST-REGISTRO
             * Este código solo existirá en el navegador si el controlador de Laravel
             * envió la variable de sesión 'registered'. Si no existe, Laravel borra
             * este bloque completo antes de entregar la página, ahorrando recursos.
             */
            @if (session('registered'))
                // 1. Cerramos el modal primero para liberar el foco
                const modalElement = document.getElementById('register-modal');
                const modalInstance = bootstrap.Modal.getInstance(modalElement);
                if (modalInstance) {
                    modalInstance.hide();
                }

                // 2. Mostramos el mensaje de éxito
                sweetModal({
                    title: '¡Clínica Registrada!',
                    message: '{{ session('message') ?? 'Hemos creado su entorno médico correctamente.' }}',
                    iconType: 'success'
                });
            @endif
        });
    </script>
@endsection
