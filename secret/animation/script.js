document.addEventListener('DOMContentLoaded', function() {

    var bunny = document.getElementById('bunny');
    var hand1 = document.getElementById('hand1');
    var hand2 = document.getElementById('hand2');
    var music = document.getElementById('music');
    var krol = document.getElementById('krol');
    var talk = document.getElementById('talk');

    function BunnyRun() {
        var place = 0;
        var inter = setInterval(move, 37);
        function move() {
            if (place != 200) {
                place++;
                bunny.style.marginLeft = place + '%';
            }
            else {
                clearInterval(inter);
            }
        }
    }

    function HandRun() {
        var place = 150;
        var inter = setInterval(move, 25);
        function move() {
            if (place != 40) {
                place = place - 1;
                hand1.style.marginLeft = place + '%';
            }
            else {
                clearInterval(inter);
                setTimeout(function()
                {hand1.style.opacity = 0;}, 1000);
            }          
        }
    }

    function HandGrab() {
        var place = 25;
        var inter = setInterval(move, 37);

        function move() {
            if (place != 150) {
                place++;
                hand2.style.marginLeft = place + '%';
            }
            else {
                clearInterval(inter);
            }          
        }
    }

    function Krol() {
        var place = 85;
        var inter = setInterval(move, 80);

        function move() {
            if (place != 0) {
                place = place - 1;
                krol.style.marginTop = place + '%';
            }
            else {
                clearInterval(inter);
            }          
        }
    }

    function Talk() {
        var opac = 0;
        var inter = setInterval(move, 20);

        function move() {
            if (opac != 1) {
                opac = opac + 0.01;
                talk.style.opacity = opac;
            }
            else {
                clearInterval(inter);
            }          
        }
    }

    function HandOpacity() {
        hand2.style.opacity = 1;
    }

    function Music() {
        music.volume -= 0.8;
        music.play();
    }

    bunny.addEventListener('click', function StartAnim() {
        Music();
        setTimeout(HandRun, 2850);
        setTimeout(HandOpacity, 6600);
        setTimeout(HandGrab, 11300);
        setTimeout(BunnyRun, 11300);
        setTimeout(Krol, 16000);
        setTimeout(Talk, 24000);
        bunny.removeEventListener('click', StartAnim);
    });

});