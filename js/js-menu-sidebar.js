const $openClose = document.getElementById('open-close');
const $aside = document.getElementById('aside');

$openClose.addEventListener('click', () => {
    $aside.classList.toggle('desplegar');
});

const $openAjustes = document.getElementById('open-ajustes');
const $menuOpciones = document.getElementById('mostrar');

$openAjustes.addEventListener('click', (e) => {
    e.stopPropagation();
    $menuOpciones.style.display = $menuOpciones.style.display === 'block' ? 'none' : 'block';
});

document.addEventListener('click', (e) => {
    if (!$menuOpciones.contains(e.target) && e.target !== $openAjustes) {
        $menuOpciones.style.display = 'none';
    }
});

const botonRegistrarUsuario = document.querySelector('.text-1');

botonRegistrarUsuario.addEventListener('click', () => {
    const RegistrarUsuario = '../../trabajo-dashboard/paginas-coordinador/pagina-registro-usuario.php';
    window.location.href = RegistrarUsuario;
});

const fichas = document.querySelector('.text-2');

fichas.addEventListener('click', () => {
    const fichas = '../../trabajo-dashboard/paginas-coordinador/registro-fichas.php';
    window.location.href = fichas;
});

const programas = document.querySelector('.text-3');

programas.addEventListener('click', () => {
    const programas = '../../trabajo-dashboard/paginas-coordinador/registro-programa.php';
    window.location.href = programas;
});

const instructor = document.querySelector('.text-4');

instructor.addEventListener('click', () => {
    const instructor = '../../trabajo-dashboard/paginas-coordinador/registro-instructor.php';
    window.location.href = instructor;
});

const aprendiz = document.querySelector('.text-5');

aprendiz.addEventListener('click', () => {
    const aprendiz = '../../trabajo-dashboard/paginas-coordinador/registro-aprendiz.php';
    window.location.href = aprendiz;
});