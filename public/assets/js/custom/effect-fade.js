$(document).ready(function () {
    $(".section").each(function () {
        $(this).css("opacity","0");
    });

    $(window).scroll(function () {
        var windowBottom = $(this).scrollTop() + $(this).innerHeight();
        $(".section").each(function () {
            /* Check the location of each desired element */
            //   var objectBottom = $(this).offset().top + $(this).outerHeight();
            var objectTop = $(this).offset().top;

            /* If the element is completely within bounds of the window, fade it in */
            if (objectTop + ($(this).outerHeight() / 4) < windowBottom) { //object comes into view (scrolling down)
                if ($(this).css("opacity") == 0) { $(this).fadeTo(500, 1); }
            }
        });
    }).scroll(); //invoke scroll-handler on page-load
});