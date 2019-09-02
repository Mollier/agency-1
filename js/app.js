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




let loader = document.getElementById('loader');
document.addEventListener('DOMContentLoaded', (e) => {
    console.log("DOM entièrement chargé et analysé");
    loader.style.transition = "2s";
  loader.style.opacity = "0";
   loader.style.zIndex = "-10";
    document.body.style.overflowY = "initial";

})


// souris

const cursor = document.querySelector('.cursor');

document.addEventListener('mousemove', (e) => {
    cursor.setAttribute("style", "top: " +(e.pageY + 5) +"px; left: "+(e.pageX + 5)+"px;")
})

document.addEventListener('click', () => {
    cursor.classList.toggle('cursorClick');
    cursor.classList.add('cursor');
})



