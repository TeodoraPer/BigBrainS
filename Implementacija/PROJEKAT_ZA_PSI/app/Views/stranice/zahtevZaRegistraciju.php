<?php
/**
 * Teodora Peric 0283/18 kreiranje html stranice koja ispisuje da je korisnik poslao uspesno zahtev za registraciju 
 * Funkcionalnost Registracija
 */
?>
   <div class="row divCentar">
            <div class="col-sm-1 " >

            </div>
            <div class="col-sm-10 centar" >
              <div class="sredina">
                  <h2 class="dobrodosliTekst"> <br><br>
                      Poštovani korisniče, možete očekivati potvrdu zahteva za registraciju na mail <u><?php 
                      if(isset($mejl)) echo $mejl?></u> u roku od 24h! 
                  </h2>
                  <br>
                <hr class="linija">
              </div>
            </div>
            <div class="col-sm-1 " >
             
            </div>
         
        </div>

