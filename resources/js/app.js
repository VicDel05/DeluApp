import './bootstrap';

    const fechaSistemaInput = document.getElementById('fecha_venta');
    fechaSistemaInput.value = new Date().toISOString().slice(0, 10);
    //console.log(fechaSistemaInput.value);