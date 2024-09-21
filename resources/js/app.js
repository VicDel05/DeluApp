import './bootstrap';

document.getElementById('nav-toggle').addEventListener('click', () => {
    const navContent = document.getElementById('nav-content');
    navContent.classList.toggle('hidden');
});

const fechaSistemaInput = document.getElementById('fecha_venta');
fechaSistemaInput.value = new Date().toLocaleDateString();
//toISOString().slice(0, 10); devuelve la fecha en formato UTC (Coordinated Universal Time)