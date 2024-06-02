window.addEventListener('load', function() {

    var menu = document.getElementById('menu');

    document.getElementById('style-menu').addEventListener('click', function() {
        if (menu.style.visibility == "visible") {
            menu.style.visibility = "hidden"
        } else {
            menu.style.visibility = "visible"
        };
    });

});