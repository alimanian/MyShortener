import Alpine from 'alpinejs'
import Swal from 'sweetalert2';
import QRCodeStyling from 'qr-code-styling';
import {Chart, registerables} from 'chart.js';

window.Alpine = Alpine
Alpine.start()
window.Swal = Swal;
Chart.register(...registerables);


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

window.generateQrCode = (link, id) => {
    const canvas = document.querySelector(`#${id}`);
    canvas.innerHTML = '';
    (new QRCodeStyling({
        width: 200,
        height: 200,
        data: link
    })).append(canvas);
};

window.downloadQrCode = (id) => {
    document.querySelector(`#qr-download-${id}`).href = document.querySelector(`#qr-code-${id} > canvas`).toDataURL("image/png");
};


window.addEventListener('chartjs', event => {
    let {label, keys, values} = event.detail;
    const canvas = document.getElementById('statisticsChart');
    if (window.chartjs !== undefined)
        window.chartjs.destroy();

    window.chartjs = new Chart(canvas, {
        type: 'bar',
        data: {
            labels: keys,
            datasets: [{
                label: label,
                data: values,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
