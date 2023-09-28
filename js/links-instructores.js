const inicio = document.querySelector('.pagina-inst-1');

inicio.addEventListener('click', () => {
    const inicio = '../../trabajo-dashboard/instructor/Aprendices.php';
    window.location.href = inicio;
});

const asistencias = document.querySelector('.pagina-inst-2');

asistencias.addEventListener('click', () => {
    const asistencias = '../../trabajo-dashboard/instructor/registro-asistencias.php';
    window.location.href = asistencias;
});