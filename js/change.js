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