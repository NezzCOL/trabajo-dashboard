const $openClose = document.getElementById('open-close'),
      $aside = document.getElementById('aside');

$openClose.addEventListener('click',()=>{
    $aside.classList.toggle('desplegar');
});

const $openAjustes = document.getElementById('open-ajustes');
const $menuOpciones = document.getElementById('mostrar');

$openAjustes.addEventListener('click', () => {
    const currentDisplay = window.getComputedStyle($menuOpciones).getPropertyValue('display');
    
    if (currentDisplay === 'none') {
        $menuOpciones.style.display = 'block';
    } else {
        $menuOpciones.style.display = 'none';
    }

    window.addEventListener('click', close => {
        if (close.target === currentDisplay) {
            currentDisplay.style.display = 'none'
        }
    });
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

