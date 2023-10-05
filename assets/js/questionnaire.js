function disableSave() {
    let bouttonSave = document.getElementById("soumission");
    bouttonSave.disabled = true;
  }
  
  function ajoutReponse(appendAjoutBoutton = true) {
    let nbQuestions = document.getElementById("nbQuestions").value; //string
    let nbReponsesActu = parseInt(document.getElementById("nbReponses").value, 10);
  
    let ulReponses;
    if (nbReponsesActu == 0) {
      ulReponses = document.createElement("ul");
      ulReponses.id = "ulReponses" + nbQuestions;
      ulReponses.className = 'rep';

      let p = document.createElement('p');
      p.appendChild(ulReponses);
    } else {
      ulReponses = document.getElementById("ulReponses" + nbQuestions);
    }
  
    incrementeReponse();
    let nbReponses = document.getElementById("nbReponses").value; //string
  
    let new_input_check = document.createElement("input");
    new_input_check.type = "checkbox";
    new_input_check.name = "check" + nbQuestions + nbReponses;

    let new_input_reponse = document.createElement("input");
    new_input_reponse.type = "text";
    new_input_reponse.name = "reponse" + nbQuestions + nbReponses;
    new_input_reponse.placeholder = 'reponse possible '+nbReponses;
    new_input_reponse.style.width = '10vw';
    new_input_reponse.setAttribute("required", '');
  
    let divCheckReponse = document.createElement("div");
    divCheckReponse.style.display = "flex";
    divCheckReponse.style.alignItems = "center";
    // divCheckReponse.style.width = "50%";
    // divCheckReponse.style.justifyContent = "space-evenly";
  
    divCheckReponse.appendChild(new_input_check);
    divCheckReponse.appendChild(new_input_reponse);
  
    let li = document.createElement("li");
    li.className = 'ans';
    li.appendChild(divCheckReponse);
  
    ulReponses.appendChild(li);

    let div_Questions = document.getElementById("questions");

    div_Questions.appendChild(ulReponses);

    // console.log(appendAjoutBoutton);
  
    if(appendAjoutBoutton) {
      let ajoutReponseBoutton = document.getElementById("ajoutReponse");
      ulReponses.appendChild(ajoutReponseBoutton);
      // console.log('test '+appendAjoutBoutton);  
    }

    // console.log(appendAjoutBoutton);
    
    console.log("nbQuestions " + nbQuestions + " nbReponses " + nbReponses);
  }
  
  function incrementeReponse() {
    let input_nbReponsesActu = document.getElementById("nbReponses");
    let nbReponses = parseInt(input_nbReponsesActu.value, 10); // Convertir en nombre entier
    input_nbReponsesActu.value = nbReponses + 1;
  }
  
  function ajoutQuestion() {
    reinitNbReponses();
    incrementeQuestion();
    let nbReponses = document.getElementById("nbReponses").value;
  
    let div_Questions = document.getElementById("questions");
    let nbQuestions = document.getElementById("nbQuestions").value;

    let p = document.createElement('p');

    let new_input_question = document.createElement("input");
    new_input_question.type = "text";
    new_input_question.name = "question" + nbQuestions;
    new_input_question.placeholder = 'question '+nbQuestions;
    new_input_question.setAttribute("required", '');

    let new_input_coeff = document.createElement("input");
    new_input_coeff.type = "number";
    new_input_coeff.name = "coeff" + nbQuestions;
    new_input_coeff.placeholder = 'coefficient';
    new_input_coeff.min = 0;
    new_input_coeff.setAttribute("required", '');

    // let divQuestionCoeff = document.createElement("div");
    // divQuestionCoeff.style.display = "flex";
    // divQuestionCoeff.style.justifyContent = "space-evenly";
  
    // divQuestionCoeff.appendChild(new_input_question);
    // divQuestionCoeff.appendChild(new_input_coeff);

    p.appendChild(new_input_question);
    p.appendChild(new_input_coeff);

    div_Questions.appendChild(p);
  
    // let li = document.createElement("li");
    // li.appendChild(divQuestionCoeff);
    // li.appendChild(div_Questions);
  
    let ajoutReponseBoutton = document.getElementById("ajoutReponse");
    ajoutReponseBoutton.style.display = "block";
    // li.appendChild(ajoutReponseBoutton);
  
    // div_Questions.appendChild(li);
  
    console.log("nbQuestions " + nbQuestions + " nbReponses " + nbReponses);
  
    let bouttonSave = document.getElementById("soumission");
    bouttonSave.disabled = false;
  
    ajoutReponse(false);
  }
  
  function incrementeQuestion() {
    let input_nbQuestionsActu = document.getElementById("nbQuestions");
    let nbQuestions = parseInt(input_nbQuestionsActu.value, 10); // Convertir en nombre entier
    input_nbQuestionsActu.value = nbQuestions + 1;
  }
  
  function reinitNbReponses() {
    let input_nbReponsesActu = document.getElementById("nbReponses");
    input_nbReponsesActu.value = 0;
  }
  
  window.addEventListener("onload", disableSave());
  