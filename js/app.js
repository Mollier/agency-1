let menu = document.getElementById('menu');
let menuClose = document.getElementById('menu-close');
let arrow = document.getElementById('arrow');
let arrow2 = document.getElementById('arrow2');
let arrow3 = document.getElementById('arrow3');

menu.addEventListener('click', () => {
    menuClose.classList.toggle('menu-open');
    arrow.classList.toggle('menu__bar--open');
    arrow2.classList.toggle('menu__bar--open');
    arrow3.classList.toggle('menu__bar--open');
});
