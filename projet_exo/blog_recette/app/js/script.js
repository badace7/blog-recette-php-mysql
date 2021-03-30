let element = document.querySelector(".navbar-link").style;
let headerSize = document.querySelector(".navbar").style;
let buttonCo = document.querySelector("#button-connexion").style;
let buttonIn = document.querySelector("#button-inscription").style;
let buttonParametre = document.querySelector("#param").style;



const burgerMenu = () => {
    
    let off = element.display == "none";
    let on = element.display == "flex";

    if (off) {
        // Si navbar non affichée, permet affichage de celle-ci avec les propriétés ci-dessous.
        element.display = "flex";
        element.flexDirection = "column";
        headerSize.height = "16.5rem";
        headerSize.transition = "all 0.15s ease";
        buttonCo.display = "flex";
        buttonCo.justifyContent = "center";
        buttonCo.marginRight = "-2rem";
        if(hide == false) {
            buttonIn.display ="flex";
            buttonIn.justifyContent = "center";
            buttonIn.marginRight = "-2rem";
        }

        if(hide == true) {
            buttonParametre.display ="flex";
            buttonParametre.justifyContent = "center";
            buttonParametre.marginRight = "-2rem";
        }

    } else if (on) {
        // Si navbar affichée, permet de la cachée avec les propriétés ci-dessous.
        element.display = "none";
        headerSize.height = "5.5rem";
        buttonCo.display = "none";
        // buttonIn.display ="none";
    }

}

const whileEvent = (query) => {

    let resolutionInferieurTablette = query.matches;


    if (resolutionInferieurTablette) {
        // Si la résolution est inférieur à 770px cache la navbar, boutons connexion et inscription.
        element.display = "none";
        buttonCo.display = "none";
        buttonIn.display = "none";
        

    } else {
        // Si la résolution est supérieur à 770px affiche la navbar avec les propiétées d'une tablette.
        element.display = "inline-block";
        headerSize.height = "5.5rem";
        buttonCo.display = "none";
        buttonIn.display = "none";
        buttonParametre.display = "none";
        
    } 
}

let query = window.matchMedia("(max-width: 770px)"); // Défini un média query avec max-width à 770px
whileEvent(query);                                  // Appelle la fonction permettant d'appliquer la condition du média query
query.addEventListener("change", whileEvent); // Permet de définir les propriétés suite au changement de résolution




const inputCheck = () => {

    let inputChecked = document.getElementById("affichePassword");
    let password = document.getElementById("password");
    let passwordConfirm = document.getElementById("passwordConfirm");


    if (inputChecked.checked == true) {
        password.type = "text";
        passwordConfirm.type = "text";

    } else if (inputChecked.checked == false) {
        password.type = "password";
        passwordConfirm.type = "password";
    }

}

let inputIngredient = document.getElementById('input-ingredient');
let addIngredient = document.getElementById('addIngredient');
let removeIngredient = document.getElementById('removeIngredient');

const ajouterIngredient = () => {
    // let inputElement = inputIngredient.getElementsByTagName('input');
    // let n = 1;
    let addInput = document.createElement('input');
    addInput.setAttribute('type', 'text');
    addInput.setAttribute('name', 'ingredient[]');
    addInput.setAttribute('class', 'input-ingredient');
    addInput.setAttribute('placeholder', 'ingrédient');
    inputIngredient.appendChild(addInput);
}


const retirerIngredient = () => {
    let inputElement = inputIngredient.getElementsByTagName('input');
    if(inputElement.length > 1) {
        inputIngredient.removeChild(inputElement[(inputElement.length) -1]);
    }
}


let inputUstensile = document.getElementById('input-ustensile');
let addUstensile = document.getElementById('addUstensile');
let removeUstensile = document.getElementById('removeUstensile');

const ajouterUstensile = () => {
    // let inputElement = inputUstensile.getElementsByTagName('input');
    // let n = 1;
    let addInput = document.createElement('input');
    addInput.setAttribute('type', 'text');
    addInput.setAttribute('name', 'ustensile[]');
    addInput.setAttribute('class', 'input-ustensile');
    addInput.setAttribute('placeholder', 'ustensile');
    inputUstensile.appendChild(addInput);
}


const retirerUstensile = () => {
    let inputElement = inputUstensile.getElementsByTagName('input');
    if(inputElement.length > 1) {
        inputUstensile.removeChild(inputElement[(inputElement.length) -1]);
    }
}

const checkPassword = () => {
    let pass = document.getElementById('password').value;
    let passConf2 = document.getElementById('passwordConfirm').value;
    let inscription = document.getElementById('buttonIns');
    
    if(pass != passConf2) {
        inscription.setAttribute('disabled', 'true');

    } else {
        inscription.removeAttribute('disabled');
    }
    
    
}

let passConf = document.getElementById('passwordConfirm');

if (passConf != null) {
    passConf.addEventListener('change', checkPassword);
}