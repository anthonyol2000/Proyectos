jQuery(document).ready( $ =>  {
    $('.site-header .menu-principal .menu').slicknav({
        // Opciones de 'slivnav' para modificar la ubicacion 
        label: '',
        appendTo: '.site-header'
    });

    // Agregar Slider
    if($('.listado-testimoniales').length > 0 ) {
        $('.listado-testimoniales').bxSlider({
            auto: true, 
            mode: 'fade', 
            controls: false
        });
    }
});

// agrega posición fija en el header al hacer scroll
window.onscroll = () => {
    const scroll = window.scrollY;

    
    const headerNav = document.querySelector('.barra-navegacion');
    const documentBody = document.querySelector('body');

    // si la cantidad de scroll es mayor a, agregar una clase
    if(scroll > 300) {
        headerNav.classList.add('fixed-top');
        documentBody.classList.add('ft-activo');
    } else {
        documentBody.classList.remove('ft-activo');
        headerNav.classList.remove('fixed-top');
    }
}