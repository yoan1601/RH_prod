let ajouter=document.getElementById("ajoutAvantage");
let avantages=document.getElementById("avantages");
let nbAvantages=0;
ajouter.addEventListener("click", function(){
    nbAvantages+=1;
    let p_elem=document.createElement("p");
    let nom_avant=document.createElement("input");
    nom_avant.type="text";
    nom_avant.placeholder="Avantage";
    nom_avant.name="nom_avantage"+nbAvantages;
    nom_avant.required=true;
    let prix=document.createElement("input");
    prix.type="number";
    prix.placeholder="Valeur en Ariary";
    prix.name="prix_avantage"+nbAvantages;
    prix.required=true;
    p_elem.appendChild(nom_avant);
    p_elem.appendChild(prix);
    avantages.appendChild(p_elem);
});