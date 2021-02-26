

const burgerMenu = () => {

    let element = document.querySelector(".navbar-link").style;
    let headerSize = document.querySelector(".navbar").style;
    let buttonCo = document.querySelector("#button-connexion").style;
    let buttonIn = document.querySelector("#button-inscription").style;

    if (element.display == "none") {
        element.display = "flex";
        element.flexDirection = "column";
        headerSize.height = "16.5rem";
        headerSize.transition = "all 0.15s ease";
        buttonCo.display = "flex";
        buttonCo.justifyContent = "center";
        buttonCo.marginRight = "-2rem";
        buttonIn.display ="flex";
        buttonIn.justifyContent = "center";
        buttonIn.marginRight = "-2rem";

        

    } else if  (element.display == "flex") {
        element.display = "none";
        headerSize.height = "5.5rem";
        buttonCo.display = "none";
        buttonIn.display ="none";
    }

}

const whileEvent = (query) => {

    let element = document.querySelector(".navbar-link").style;
    let headerSize = document.querySelector(".navbar").style;
    let buttonCo = document.querySelector("#button-connexion").style;
    let buttonIn = document.querySelector("#button-inscription").style;


    if (query.matches) {
        element.display = "none";
        buttonCo.display = "none";

    } else {
        element.display = "inline-block";
        headerSize.height = "5.5rem";
        buttonCo.display = "none";
        buttonIn.display ="none";
    } 
}

let query = window.matchMedia("(max-width: 770px)");
whileEvent(query);
query.addEventListener("change", whileEvent);