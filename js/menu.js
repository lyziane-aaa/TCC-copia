$(document).ready(function() {
    //Apresentar ou ocultar menu
    $('.sidebar-toggle').on('click', function() {
        $('.main-sidebar').toggleClass('toggled');
        $('.container-fluid').toggleClass('muda');

    })

    //Carregar o submenu já aberto
    var active = $('.main-sidebar .active');
    if (active.length && active.parent('.collapse').length) {
        var parent = active.parent('.collapse');
        parent.prev('a').attr('aria-expanded', true);
        parent.addClass('show');
    }
})