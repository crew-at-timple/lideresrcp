/**
 * TIMPLE - main.js
 * @author Timple
 */

(function($) {
    if ($('.compromiso--grid_slider').length){
        $('.compromiso--grid_slider').slick({
            variableWidth: true,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            infinite:false
          });
    }

})(jQuery);
