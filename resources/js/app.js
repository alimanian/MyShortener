import Alpine from 'alpinejs'
import Swal from 'sweetalert2';
window.Alpine = Alpine

Alpine.start()

window.Swal = Swal;

window.addEventListener('swal-message', event => {
    let {type, title, text, confirmText, cancelText, confirmRoute} = event.detail;
    Swal.fire({
        icon: type,
        title: title,
        text: text,
        showConfirmButton: confirmText !== '',
        showCancelButton: cancelText !== '',
        confirmButtonText: confirmText,
        cancelButtonText: cancelText,
        timer: confirmText === '' ? 7000 : 0,
    }).then((result) => {
        if (result.isConfirmed) {
            if (confirmRoute !== '')
                location.replace(confirmRoute);
        }
    });
});
window.addEventListener('swal-toast', event => {
    let {type, title, text, reload} = event.detail;
    Swal.fire({
        toast: true,
        position: 'top-end',
        timerProgressBar: true,
        icon: type,
        title: title,
        text: text,
        showConfirmButton: false,
        showCloseButton: true,
        timer: 7000,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        },
        willClose: () => {
            if (reload) location.reload();
        }
    });
});
