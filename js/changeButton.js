function $_GET(param) {
    var vars = {};
    window.location.href.replace( location.hash, '' ).replace(
        /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
        function( m, key, value ) { // callback
            vars[key] = value !== undefined ? value : '';
        }
    );

    if ( param ) {
        return vars[param] ? vars[param] : null;
    }
    return vars;
}

let link = $_GET('filter');




function changeButton(id) {
    if(link == id) {
        document.getElementById(id).classList.add('button--active');
        console.log(id)
    }
}


let buttons = [
    "Projets",
    "Agence",
    "Actualites",
    "Artistes",
    "Institutions",
    "Education",
    "IT",
    "Associations",
    "Cabinets",

]


for (let i = 0; i < buttons.length; i++) {
    changeButton(buttons[i])
}