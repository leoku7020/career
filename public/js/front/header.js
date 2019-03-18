$(document).ready(function () {
    
    // index header
    $(window).on("scroll", function () {
        if ($(window).scrollTop() > 50) {
            $(".header.index, .mobile_header").addClass("shrink");
        } else {
            $(".header.index, .mobile_header").removeClass("shrink");

        }
    });
    
    // mobile menu modal
    var modalWindow = document.getElementById('mobile-menu-modal');

    document.addEventListener('click', function (ev) {

        if (ev.target.classList.contains('mobile_menu_btn')) {
            modalWindow.classList.add('active');
        }

        if (ev.target.classList.contains('button-close')) {
            modalWindow.classList.remove('active');
        }

    });

})

