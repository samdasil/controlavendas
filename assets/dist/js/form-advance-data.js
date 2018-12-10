/*Form advanced Init*/
$(document).ready(function() {
    "use strict";

    /* Select2 Init*/
    $(".select2").select2();

    /* Switchery Init*/
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    $('.js-switch-1').each(function() {
        new Switchery($(this)[0], $(this).data());
    });


});