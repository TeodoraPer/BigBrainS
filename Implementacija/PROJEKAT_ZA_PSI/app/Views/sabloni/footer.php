<?php
// Teodora Peric 0283/18 postavljanje futera koji je dizajnirao Pavle Stefanovic 0562/18
use CodeIgniter\Config\Factories;
?>

        <div class="row divFuter">
          <div class="col-sm-12">
            <div style="background-color:#F6F6F6;">
              <h2 class="dobrodosliTekst">Preporučeni saloni</h2>
              <p class="flavor_text">Izaberite jedan od salona iz naše preporuke!
              </p>
             <div class="scrollmenu">
                  <?php 
                  $salonModel=Factories::models('App\Models\SalonModel');  //new \App\Models\SalonModel();
                  $sviSaloni=$salonModel->sviSaloni2();
                 if($sviSaloni!=null){
                  foreach($sviSaloni as $salon){
                  ?>
                  <img class="salon_slika"  src=<?php echo "{$salon->slika}"; ?>><?php }}?>
               
                  
                </div>
                <br>


                <div class="Kontakt">
                  <p class="subtitle">Kontaktirajte nas!</p>
                  <a href="mailto:groomroom@email.com"><button type="button" class="button">KONTAKT</button></a>
                </div>
                <br>
            </div>
              
                <div class="footer">
                  <a href="https://www.facebook.com/"><img class="socials" src="/images/facebook.png" ></a>
                  <a href="https://www.instagram.com/"><img class= "socials" src="/images/instagram.png"></a>
                  <a href="https://twitter.com/kanyewest"><img class="socials" src="/images/twitter.png"></a>
                  <p class="copyright">© 2022 GroomRoom. All rights reserved.</p>
                </div>

          </div>
      </div>
       


    
      
    </div>
</body>
</html>