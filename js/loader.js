function loader() {

    let loader = document.getElementById('loader');
    document.addEventListener('DOMContentLoaded', (e) => {
        console.log("DOM entièrement chargé et analysé");
        loader.style.transition = "2s";
        loader.style.opacity = "0";
        loader.style.zIndex = "-10";
        document.body.style.overflowY = "initial";

    })
}


loader();