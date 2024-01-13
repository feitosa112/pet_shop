
    window.onscroll = function() { myFunction() };

    var navbar = document.getElementById("myNavbar");

    function myFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            navbar.style.backgroundColor = "#333";  // Prilagodite boju pozadine prema vašim potrebama
        } else {
            navbar.style.backgroundColor = "transparent";
        }
    }

