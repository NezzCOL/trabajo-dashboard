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

const botonInicio = document.querySelector('.text-1');

botonInicio.addEventListener('click', () => {
    const Inicio = '../../../trabajo-dashboard/pagina/pagina-inicio.php';
    window.location.href = Inicio;
});

const botonRegistrarUsuario = document.querySelector('.text-2');

botonRegistrarUsuario.addEventListener('click', () => {
    const RegistrarUsuario = '../../../trabajo-dashboard/pagina/pagina-registro-usuario.php';
    window.location.href = RegistrarUsuario;
});

const fichas = document.querySelector('.text-3');

fichas.addEventListener('click', () => {
    const fichas = '../../../trabajo-dashboard/pagina/registro-fichas.php';
    window.location.href = fichas;
});