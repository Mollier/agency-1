let tiri = document.querySelector('#tiri');

let audio = new Audio('./assets/tiri.mp4');
tiri.addEventListener('click', () => {

    audio.play();


});