<?php


use CodeIgniter\Config\Factories;
// Pavle Stefanovic 0562/18
?>

        <div class="row divFuter">
          <div class="col-sm-12">
            <div style="background-color:#F6F6F6;">
              <h2 class="dobrodosliTekst">Preporučeni saloni</h2>
              <p class="flavor_text">Izaberite jedan od salona!
              </p>
              <div class="scrollmenu">
                  <?php 
                  $salonModel= Factories::models('App\Models\SalonModel');      /*new \App\Models\SalonModel();*/
                  $sviSaloni=$salonModel->sviSaloni2();
                  if($sviSaloni!=null){
                  foreach($sviSaloni as $salon){
                  ?>
                  <img class="salon_slika"  src=<?php echo "{$salon->slika}"; ?>><?php }}?>
               
                  
                </div>
                <br>


                <div class="Kontakt">
                  <p class="subtitle">Kontaktirajte nas!</p>
                 <button type="button" class="button" id="klikni">KONTAKT</button>
                   <div id="message"></div>
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