const formulaire = document.querySelector('#envoyer_blog');

formulaire.addEventListener('submit', async(e)=>{
    // e.preventDefault();
    // Create the XMLHttpRequest object.
    const xhr = new XMLHttpRequest();
    // Initialize the request
    xhr.open("GET", 'http://localhost/KanteCo-Hydro/index.php/AdministrationHydroGroup/sendmail', true);
    // Send the request
    xhr.send();
    // Fired once the request completes successfully 
    xhr.onreadystatechange  = function(e) {
        // Check if the request was a success
        if (this.readyState === XMLHttpRequest.DONE) {
            // Get and convert the responseText into JSON
            var response = JSON.parse(xhr.responseText);
            alert(response);
        }
    }

})