<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>

            <center>
                <h2>Remplisssez ces informations avant la generation du fiche de paie</h2>
            </center>
        <div class="container-contratResume">
        <div class="firstPart">
            <p class="trans">g</p>
            <p>
            <h4>EMP 001 , fiche de paie mois du fevrier 2023</h4>
            </p>
            <p>Prime de rendement : 
                <p><input type="number" name="" id=""></p>
            </p>
            <p>Prime d'ancienete : 
                <p><input type="number" name="" id=""></p>
            </p>
            <p>HS 30% :
                <p><input type="number" name="" id=""></p>
            </p>
            <p>HS 40% : 
                <p><input type="number" name="" id=""></p>
            </p>
            <p>HS 50% : 
                <p><input type="number" name="" id=""></p>    
            </p>
            
            <p>HS 100% : 
                <p><input type="number" name="" id=""></p>    
            </p>
        </div>
        <div class="secondPart">
            <p class="trans">nunn</p>
            <p class="trans">nunn</p>
                <p>Majoration pour heure de nuit :
                    <p><input type="number" name="" id=""></p>
                </p>
                <p>Primes diverse:
                    <p><input type="number" name="" id=""></p>
                </p>
                <p>Rappel sur periode anterieur:
                    <p><input type="number" name="" id=""></p>
                </p>
                <p>Droits de preavie:
                    <p><input type="number" name="" id=""></p>
                </p>
                <p>Indamnites de licencement:
                    <p><input type="number" name="" id=""></p>
                </p>
                <p>Type de virement:
                    <p>
                        <select name="" id="">
                            <option value="">Banquaire</option>
                        </select>
                    </p>
                </p>

            <p class="trans">nunn</p>
        </div>

    </div>
    <p class="trans">nun</p>
    <center><button class="embaucher">generer fiche de paie</button></center>
</body>
</html>