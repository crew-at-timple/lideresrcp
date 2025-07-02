/**
 * TIMPLE - main.js
 * @author Timple
 */

(function($) {

    /* Slider */

    if ($('.compromiso--grid_slider').length){
        $('.compromiso--grid_slider').slick({
            variableWidth: true,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            infinite:true
        });
    }

    /* Back button */

    $(document).ready(function() {
        // Selecciona el botón por su clase y añade un 'click' listener
        $('.btn-back-js').on('click', function() {
            history.back(); // Esto hace que el navegador retroceda una página en el historial
        });
    });


    /* Boostrap Tooltip for Avatars */

    // En tu archivo js/main.js o un script dedicado después de cargar Bootstrap JS
    document.addEventListener('DOMContentLoaded', function() {
        // Selecciona todos los elementos que tienen el atributo data-bs-toggle="tooltip"
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));

        // Itera sobre ellos e inicializa un nuevo objeto Tooltip para cada uno
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });

    /* Manejo del formulario */

    $('form').on('submit', function(e) {
        var $form = $(this);
        var $submit = $form.find('input[type="submit"]');

        if ($submit.prop('disabled')) {
            e.preventDefault();
            return false; // ya se envió
        }

        $submit.prop('disabled', true);
        $submit.val('Enviando...');
    });

})(jQuery);
