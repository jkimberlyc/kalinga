var nav = document.getElementById('navbar'); // Identify target
var rightNav = document.querySelectorAll('.right');

window.addEventListener('scroll', function (event) { // To listen for event
    event.preventDefault();

    if (window.scrollY <= 20) { // Just an example
        nav.style.backgroundColor = 'transparent'; // or default color

        for (let i = 0; i < rightNav.length; i++) {
            rightNav[i].classList.add('text-white');
        }
    } else {
        nav.style.backgroundColor = '#fff';
        nav.style.transition = "0.2s ease-in-out"

        for (let i = 0; i < rightNav.length; i++) {
            rightNav[i].classList.remove('text-white');
        }
    }
});

var toggler = document.querySelector('.navbar-toggler');
// var profile = document.querySelector('.profile');
// var notif = document.querySelector('.notification');

toggler.addEventListener('click', () => {
    if (!toggler.classList.contains("collapsed")) {
        nav.classList.add("bg-white")
        // profile.innerHTML = "Profile"
        // notif.innerHTML = "Notifications"

        for (let i = 0; i < rightNav.length; i++) {
            rightNav[i].classList.remove('text-white');
        }
    } else {
        nav.classList.remove("bg-white")
    }
})

const mediaQuery = window.matchMedia('(min-width: 768px)');

mediaQuery.addListener(() => {
    // Check if the media query is true
    if (mediaQuery.matches) {
        nav.classList.remove("bg-white")
        nav.classList.add("collapsed")

        for (let i = 0; i < rightNav.length; i++) {
            rightNav[i].classList.add('text-white');
        }
        // profile.innerHTML = "<i class='bx bx-user-circle fs-4'></i>";
        // notif.innerHTML = "<i class='bx bx-bell fs-4'></i>";
    } else {
        document.querySelector(".navbar-collapse").classList.remove("show")
    }
})
