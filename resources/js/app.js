import './bootstrap';
    // document.getElementById('nav-toggle').addEventListener('click', () => {
    //     const navContent = document.getElementById('nav-content');
    //     navContent.classList.toggle('hidden');
    // });
    const navToggle = document.getElementById('nav-toggle');
    const navContent = document.getElementById('nav-content');

    navToggle.addEventListener('click', () => {
        navContent.classList.toggle('hidden');
    });

    const fechaSistemaInput = document.getElementById('fecha_venta');
    fechaSistemaInput.value = new Date().toISOString().slice(0, 10);
    console.log(fechaSistemaInput.value);
    //toISOString().slice(0, 10); devuelve la fecha en formato UTC (Coordinated Universal Time)