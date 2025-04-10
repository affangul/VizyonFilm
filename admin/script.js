function toggleMenu() {
    var menu = document.getElementById("menu");
    var content = document.getElementById("content");
    if (menu.classList.contains("menu-hidden")) {
        menu.classList.remove("menu-hidden");
        content.style.marginLeft = "250px";
        localStorage.setItem('menuOpen', 'true');
    } else {
        menu.classList.add("menu-hidden");
        content.style.marginLeft = "0";
        localStorage.setItem('menuOpen', 'false');
    }
}

document.addEventListener('DOMContentLoaded', function () {
    var menuOpen = localStorage.getItem('menuOpen');
    var menu = document.getElementById("menu");
    var content = document.getElementById("content");
    if (menuOpen === 'false') {
        menu.classList.add("menu-hidden");
        content.style.marginLeft = "0";
    } else {
        menu.classList.remove("menu-hidden");
        content.style.marginLeft = "250px";
    }
});

document.querySelector('form').addEventListener('submit', function() {
    var menu = document.getElementById("menu");
    if (menu.classList.contains("menu-hidden")) {
        localStorage.setItem('menuOpen', 'false');
    } else {
        localStorage.setItem('menuOpen', 'true');
    }
});
