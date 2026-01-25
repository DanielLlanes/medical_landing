/**
 * UI Notifications Component for Medical API
 * Integrates Bootstrap 5 + Falcon Theme Styles
 */

function sweetModal(options = {}) {
    // Valores por defecto mejorados
    const defaultOptions = {
        title: '¿Confirmar acción?',
        message: '',
        cancelButtonText: 'Cerrar',
        confirmButtonText: 'Aceptar',
        iconType: 'success', // success, error, warning, info
        callbackFunction: null,
        type: '', // 'delete' o 'confirm' para mostrar el botón de acción
        id: null,
        code: null,
        modalSize: '400px'
    };

    const iconMappings = {
        warning: { icon: 'fas fa-exclamation-triangle', bg: 'bg-warning' },
        error:   { icon: 'fas fa-times', bg: 'bg-danger' },
        success: { icon: 'fas fa-check', bg: 'bg-success' },
        info:    { icon: 'fas fa-info', bg: 'bg-info' },
    };

    const merged = { ...defaultOptions, ...options };
    const { icon, bg } = iconMappings[merged.iconType] || iconMappings['success'];

    const modalHTML = `
      <div class="modal fade" id="sweet-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: ${merged.modalSize}">
          <div class="modal-content border-0 shadow-lg">
            <div class="modal-body p-0">
                <div class="row justify-content-center pt-5">
                    <div class="${bg} rounded-circle d-flex align-items-center justify-content-center animate__animated animate__pulse animate__infinite"
                         style="width: 100px; height: 100px">
                        <span class="${icon} text-white" style="font-size: 3.5rem"></span>
                    </div>
                </div>
                <div class="text-center p-4">
                    <h4 class="mb-2 fw-bold">${merged.title}</h4>
                    ${merged.message ? `<p class="text-700 mb-0">${merged.message}</p>` : ''}
                </div>
            </div>
            <div class="modal-footer justify-content-center border-top-0 pb-4">
                <button class="btn btn-sm btn-outline-secondary px-4 rounded-pill" type="button" data-bs-dismiss="modal">${merged.cancelButtonText}</button>
                ${merged.type === 'delete' || merged.type === 'confirm' ?
                    `<button class="btn btn-sm btn-primary accept-button px-4 rounded-pill shadow-sm" type="button">${merged.confirmButtonText}</button>`
                    : ''}
            </div>
          </div>
        </div>
      </div>`;

    document.body.insertAdjacentHTML('beforeend', modalHTML);

    // Inicialización nativa de Bootstrap 5
    const modalElement = document.getElementById('sweet-modal');
    const bsModal = new bootstrap.Modal(modalElement);
    bsModal.show();

    // Lógica del botón de aceptar
    const acceptBtn = modalElement.querySelector('.accept-button');
    if (acceptBtn && merged.callbackFunction) {
        acceptBtn.addEventListener('click', function () {
            merged.callbackFunction(merged.id, merged.code);
            bsModal.hide();
        });
    }

    // Limpieza del DOM al cerrar
    modalElement.addEventListener('hidden.bs.modal', function () {
        this.remove();
    });
}

function sweetToast(options = {}) {
    const defaultOptions = {
        title: 'Notificación',
        message: '',
        iconType: 'success',
        id: 'toast-' + Math.floor(Math.random() * 10000),
        duration: 6000
    };

    const iconMappings = {
        warning: { icon: 'fas fa-exclamation-circle', bg: 'bg-warning' },
        error:   { icon: 'fas fa-times-circle', bg: 'bg-danger' },
        success: { icon: 'fas fa-check-circle', bg: 'bg-success' },
        info:    { icon: 'fas fa-info-circle', bg: 'bg-info' },
    };

    const merged = { ...defaultOptions, ...options };
    const { icon, bg } = iconMappings[merged.iconType] || iconMappings['success'];

    // Asegurar contenedor de Toasts
    let container = document.querySelector(".toast-container");
    if (!container) {
        container = document.createElement('div');
        container.className = "toast-container position-fixed bottom-0 end-0 p-3";
        container.style.zIndex = "1100";
        document.body.appendChild(container);
    }

    const toastHTML = `
        <div class="toast show bg-white shadow-lg border-0" role="alert" id="${merged.id}" data-bs-autohide="true">
            <div class="toast-header bg-body-tertiary border-bottom-0">
                <div class="${bg} rounded-circle d-flex align-items-center justify-content-center me-2 animate__animated animate__fadeIn"
                     style="width: 1.2rem; height: 1.2rem">
                    <span class="${icon} text-white" style="font-size: 0.7rem"></span>
                </div>
                <strong class="me-auto text-dark">${merged.title}</strong>
                <small class="text-600">ahora</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body py-3">
                ${merged.message}
            </div>
        </div>`;

    container.insertAdjacentHTML('beforeend', toastHTML);

    const element = document.getElementById(merged.id);
    const bsToast = new bootstrap.Toast(element, {
        delay: merged.duration,
        autohide: true
    });

    element.addEventListener('hidden.bs.toast', () => element.remove());
    bsToast.show();
}

// uso
// @if(session('registered'))
//     sweetModal({
//         title: '¡Clínica Registrada!',
//         message: 'Hemos creado su entorno médico correctamente. Revise su correo para confirmar.',
//         iconType: 'success'
//     });
// @endif
// @if(session('registered'))
//     sweetToast({
//         title: 'Registro Exitoso',
//         message: 'Bienvenido, Dr. {{ old('name') }}. Revise su email.',
//         iconType: 'success'
//     });
// @endif
