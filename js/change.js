// deuxieme menu
let link = document.getElementById('link');
let arrow_right = document.getElementById('arrow_right');
let arrow_left = document.getElementById('arrow_left');
let pronom = document.getElementById('pronom');

let compteur = 1;
pronom.innerHTML = '<div class="appear"><span>Je</span> <span class="menu_second menu_second--subText">suis client / un Baï-Bao </span></div> ';
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


link.setAttribute('href', links[0]);
//
let stop = false;

function autoChange() {
    setInterval(() => {
        if (pronom.innerHTML === pronoms[5]) {
             stop = true;
            console.log('stop');
        } else {
            compteur++;
            console.log(compteur - 1)
            pronom.innerHTML = pronoms[compteur - 1];
            link.setAttribute('href', links[compteur - 1])
        }
    }, 4000);
}

if(stop === false) {
    autoChange();
}

function click() {
    arrow_right.addEventListener("click", () => {
        if(pronom.innerHTML !== pronoms[5]) {
            compteur++;
            console.log(compteur - 1)
            pronom.innerHTML = pronoms[compteur - 1];
            link.setAttribute('href', links[compteur - 1])
        }
    })
    arrow_left.addEventListener("click", () => {
        if(pronom.innerHTML !== pronoms[0]) {
            compteur--;
            console.log(compteur - 1)
            pronom.innerHTML = pronoms[compteur - 1];
            link.setAttribute('href', links[compteur - 1])
        }
    })

}

click();