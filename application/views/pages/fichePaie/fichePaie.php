<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>
    <div class="fiche-paie-container">
        <center><h2>Fiche de paie</h2></center>
        <center><h2>Arrete au 31/08/2023</h2></center>
        
        <div class="entete-paie">
             <div class="first-entete">
                <p>Nom et prenoms:Rakoto Be</p>
                <p>Matricule :120emp</p>
                <p>Fonction:Mpitolona</p>
                <p>N CNaPS</p>
                <p>Date d'embauche:01-10-2023</p>
                <p>Anciennete:12 ans 5mois et 10jours</p>
             </div>
             <div class="second-entete">
                <p>Classification :HC</p>
                <p>Salaie de base :400 000.40Ar</p>
                <p>Taux journaliere:123 000.00Ar</p>
                <p>Taux horraires:23 000 Ar</p>
                <p>Indice:17 660.00Ar</p>
             </div>
        </div>

        <div class="container-exel">
             <table border=1>
                <tr>
                     <center>
                     <td>Designations</td>
                     <td>Nombre</td>
                     <td>Taux</td>
                     <td>Montant</td>
                     </center>
                </tr>
                <tr>
                  <td>Salaire du 01/06/2023 au 01/07/2023</td>
                  <td>1mois</td>
                  <td>136 908</td>
                  <td>400 000</td> 
               </tr>
               <tr>
                  <td>Absence deductibles</td>
                  <td></td>
                  <td>136 114</td>
                  <td></td>
               </tr>
               <tr>
                  <td>Prime de rendement</td>
                  <td></td>
                  <td></td>
                  <td></td>
               </tr>
               <tr>
                  <td>Prime d'anciennete</td>
                  <td></td>
                  <td></td>
                  <td></td>
               </tr>
               <tr>
                  <td>Heure suplementaire majore de 30%</td>
                  <td></td>
                  <td>425278957</td>
                  <td></td>
               </tr>
               <tr>
                  <td>Heure suplementaire majore de 40%</td>
                  <td></td>
                  <td>425278957</td>
                  <td></td>
               </tr>
               <tr>
                  <td>Heure suplementaire majore de 50%</td>
                  <td></td>
                  <td>425278957</td>
                  <td></td>
               </tr>
               <tr>
                  <td>Heure suplementaire majore de 100%</td>
                  <td></td>
                  <td>425278957</td>
                  <td></td>
               </tr>
               <tr>
                  <td>Majoration pour heure de nuit</td>
                  <td></td>
                  <td></td>
                  <td></td>
               </tr>
               <tr>
                  <td>Prime diverse</td>
                  <td></td>
                  <td></td>
                  <td></td>
               </tr>
               <tr>
                  <td>Rappel sur periode anterieur</td>
                  <td></td>
                  <td></td>
                  <td></td>
               </tr>
               <tr>
                  <td>Droits de conge</td>
                  <td></td>
                  <td>4534534</td>
                  <td></td>
               </tr>
               <tr>
                  <td>Droits de preavie</td>
                  <td></td>
                  <td>345345</td>
                  <td></td>
               </tr>
               <tr>
                  <td>Indemnites de licencement</td>
                  <td></td>
                  <td>345345345</td>
                  <td></td>
               </tr>
                  <td></td>
                  <td></td>
                  <td class="salaire">Salire brute</td>
                  <td class="salaire">400 000</td>
                  </div>
             </table>
             <p class="trans">n</p>
             <table border=1>
               <tr>
                  <td>Retenue CNaPS 1%</td>
                  <td></td>
                  <td>20 000</td>
               </tr>
               <tr>
                  <td>Retenue sanitaire</td>
                  <td></td>
                  <td>3172381</td>
               </tr>
               <tr>
                  <td>Tranche IRSA INF 350 000</td>
                  <td></td>
                  <td></td>
               </tr>
               <tr>
                  <td>Tranche IRSA I de 350 000 a 400000 </td>
                  <td>5%</td>
                  <td>25000</td>
               </tr>
               <tr>
                  <td>Tranche IRSA I de 400 000 a 500000 </td>
                  <td>10%</td>
                  <td>25000</td>
               </tr>               <tr>
                  <td>Tranche IRSA I de 500 000 a 600000 </td>
                  <td>15%</td>
                  <td>25000</td>
               </tr>
               <tr>
                  <td>Tranche IRSA SUP 600 000</td>
                  <td>20%</td>
                  <td>25000</td>
               </tr>
               <tr>
                  <td><h3>TOTAL IRSA</h3></td>
                  <td></td>
                  <td>439480938</td>
               </tr>
               <tr>
                  <td></td>
                  <td></td>
                  <td></td>
               </tr>
               <tr>
                  <td></td>
                  <td><h3>Total des revenues</h3></td>
                  <td><h3>381102831</h3></td>
               </tr>
               <tr>
                  <td></td>
                  <td>Avance</td>
                  <td>47284</td>
               </tr>
               <tr>
                  <td></td>
                  <td></td>
                  <td></td>
               </tr>
               <tr>
                  <td></td>
                  <td><h3>Net a payer</h3></td>
                  <td class="salaire">4 048749</td>
               </tr>
             </table>
        </div>

      <div class="final">
         <p>Avantage en nature:</p>
         <p>Deduction IRSA:</p>
         <p>Montant possible: 4 000 709</p>
      </div>
      
      <p class="trans">n</p>

      <div class="entete-paie">
         <center>
         <div>
         <p>Mode de payement:Virement</p>
         <p>Employeur</p>
         </div>
         </center>
         <div>
            <center>
            <p class="trans">n</p>
            <p>Employe(e)</p>
            </center>
         </div>
      </div>

     </div>
   
     <p class="trans">
      ns
     </p>
      <p><center><button class="embaucher">Exporter PDF</button></center></p>     
</body>
</html>
