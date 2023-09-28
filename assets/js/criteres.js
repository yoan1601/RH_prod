function ajoutOption() {
    let nbCriteres = document.getElementById('nbCriteres').value; //string
    let nbOptionsActu = parseInt(document.getElementById('nbOptions').value, 10);

    let ulOptions;
    if(nbOptionsActu == 0) {
        ulOptions = document.createElement('ul');
        ulOptions.id = 'ulOptions'+nbCriteres;
    } else {
        ulOptions = document.getElementById('ulOptions'+nbCriteres);
    }

    incrementeOption();
    let nbOptions = document.getElementById('nbOptions').value; //string

    let new_input_option = document.createElement('input');
    new_input_option.type = 'text';
    new_input_option.name = 'option'+nbCriteres+nbOptions;

    let new_input_coeff = document.createElement('input');
    new_input_coeff.type = 'text';
    new_input_coeff.name = 'coeff'+nbCriteres+nbOptions;

    let divOptionCoeff = document.createElement('div');
    divOptionCoeff.style.display = 'flex';
    divOptionCoeff.style.justifyContent = 'space-evenly';

    divOptionCoeff.appendChild(new_input_option);
    divOptionCoeff.appendChild(new_input_coeff);

    let li = document.createElement('li');
    li.appendChild(divOptionCoeff);

    ulOptions.appendChild(li);

    let div_criteres = document.getElementById("criteres");
    div_criteres.appendChild(ulOptions);

    let ajoutOptionBoutton = document.getElementById('ajoutOption');
    ulOptions.appendChild(ajoutOptionBoutton);

    console.log('nbCriteres '+nbCriteres+' nbOptions '+nbOptions);
}

function incrementeOption() {
    let input_nbOptionsActu = document.getElementById('nbOptions');
    let nbOptions = parseInt(input_nbOptionsActu.value, 10); // Convertir en nombre entier
    input_nbOptionsActu.value = nbOptions + 1 ;
}

function ajoutCritere() {
    reinitNbOptions();
    incrementeCritere();
    let nbOptions = document.getElementById('nbOptions').value;

    let div_criteres = document.getElementById("criteres");
    let nbCriteres = document.getElementById('nbCriteres').value;
    let new_input_critere = document.createElement('input');
    new_input_critere.type = 'text';
    new_input_critere.name = 'critere'+nbCriteres;

    let li = document.createElement('li');
    li.appendChild(new_input_critere);

    let ajoutOptionBoutton = document.getElementById('ajoutOption');
    ajoutOptionBoutton.style.display = 'block';
    // li.appendChild(ajoutOptionBoutton);

    div_criteres.appendChild(li);

    console.log('nbCriteres '+nbCriteres+' nbOptions '+nbOptions);
}

function incrementeCritere() {
    let input_nbCriteresActu = document.getElementById('nbCriteres');
    let nbCriteres = parseInt(input_nbCriteresActu.value, 10); // Convertir en nombre entier
    input_nbCriteresActu.value = nbCriteres + 1 ;
}

function reinitNbOptions() {
    let input_nbOptionsActu = document.getElementById('nbOptions');
    input_nbOptionsActu.value = 0;
}