let menu = document.getElementById('menu');
let menuClose = document.getElementById('menu-close');
let arrow = document.getElementById('arrow');
let arrow2 = document.getElementById('arrow2');
let arrow3 = document.getElementById('arrow3');
let link = document.getElementById('link');
menu.addEventListener('click', () => {
    menuClose.classList.toggle('menu-open');
    arrow.classList.toggle('menu__bar--open');
    arrow2.classList.toggle('menu__bar--open');
    arrow3.classList.toggle('menu__bar--open');
});

// deuxieme menu

let arrow_right = document.getElementById('arrow_right');
let arrow_left = document.getElementById('arrow_left');
let pronom = document.getElementById('pronom');

let compteur = 1;
let pronoms = [
    '<div class="appear"><span>Je</span> <span class="menu_second menu_second--subText">suis client / un Baï-Bao </span></div> ',
    '<div class="appear"><span>Tu</span><span class="menu_second menu_second--subText">souhaites nous rejoindre ? </span></div>',
    '<div class="appear"><span>Il/elle</span> <span class="menu_second menu_second--subText">travaille chez nous </span></div>',
    '<div class="appear"><span>Nous</span> <span class="menu_second menu_second--subText">sommes polyvalents</span></div>',
    '<div class="appear"><span>Vous</span> <span class="menu_second menu_second--subText">avez une question ? un projet ? une idée ?</span></div>',
    '<div class="appear_last"><span>Ils/elles</span> <span class="menu_second menu_second--subText">nous font confiance</span></div>'
];

let links = [
    'profile/',
    'contact.php',
    'team.php',
    'services.php',
    'contact.php',
    'realisations.php'
]

function change() {
    pronom.innerHTML = pronoms[0];
    link.setAttribute('href', links[0]);
    arrow_right.addEventListener('click', () => {
        compteur++;

        if (pronom.innerHTML === pronoms[5]) {
            console.log('stop')
        } else {
            pronom.innerHTML = pronoms[compteur - 1];
            link.setAttribute('href', links[compteur - 1]);
        }
    })

    // left
    arrow_left.addEventListener('click', () => {
        compteur--;
        console.log(compteur);

        if (pronom.innerHTML === pronoms[0]) {
            console.log('stop')
        } else {
            pronom.innerHTML = pronoms[compteur - 1];
            link.setAttribute('href', links[compteur - 1])
        }
    })

}
change();

// 

function autoChange() {
    setInterval(() => {
        if (pronom.innerHTML === pronoms[5]) {
            console.log('stop');
        } else {
            compteur++;

            console.log(compteur - 1)
            pronom.innerHTML = pronoms[compteur - 1];
            link.setAttribute('href', links[compteur - 1])
        }

    }, 4000);
}

autoChange();


