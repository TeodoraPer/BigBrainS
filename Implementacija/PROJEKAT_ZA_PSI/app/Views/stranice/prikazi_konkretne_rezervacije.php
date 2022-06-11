<?php
// Teodora Peric 0283/18 postavljanje centra za prikaz infomracija o konkretnom korisniku
//funckionalnost Odobravanje rezervacije
?>

        <div class="row divCentar">
            <div class="col-sm-1 " >

            </div>
            <div class="col-sm-10 centar" >
                <br>
                 <?php echo anchor("Salon/zahtevi_za_rezervaciju", "Idi nazad",'class="button4"'); ?>
              <div class="sredina">
                <h2 class="dobrodosliTekst"> 
                     
                    Pregled korisnikove forme za rezervaciju</h2>
                <?php if(isset($res1)) 
                { $tretmanModel=new \App\Models\TretmanModel();
                
                   $tretman=$tretmanModel->dohvatiTretman($res1);
                   ?><br>
                <div class="flavor_text">
                    <table class="table table-striped table-bordered" style="width: 50%;color: #595B83;
                          
                             font-family: 'Spline Sans Mono', monospace !important;margin:auto">
                        <tr>
                            <td>
                                Salon
                            </td>
                            <td>
                                <?php 
                      $salonModel=new \App\Models\SalonModel;
                      $result=$salonModel->pronadjiSalon($tretman->IdSalon);
                             echo $result->naziv;?>
                            </td>
                        </tr>
                         <tr>
                            <td>
                                Korisnik
                            </td>
                            <td>
                               <?php $korisnikModel=new App\Controllers\Salon(); 
                             $korisnikModel=new \App\Models\KorisnikMenadzerModel;
                      $result=$korisnikModel->pronadjiKorisnika($tretman->idKorisnik);
                                echo $result->ime;?>
                            </td>
                        </tr>
                         <tr>
                            <td>
                                Broj telefona korisnika
                            </td>
                            <td>
                               <?= $tretman->brojTelefona?>
                            </td>
                        </tr>
                         <tr>
                            <td>
                               Datum i vreme
                            </td>
                            <td>
                              <?php 
            $niz=(str_split($tretman->DatumVreme));
            $godina=$niz[0]."".$niz[1]."".$niz[2]."".$niz[3];
            $mesec=$niz[5]."".$niz[6];
            $dan=$niz[8]."".$niz[9];
            $sat=$niz[11]."".$niz[12];
            $minut=$niz[14]."".$niz[15];
            echo $mesec."/".$dan."/".$godina." ".$sat.":".$minut;
            ?>
                            </td>
                        </tr>
                        
                    </table>
                    <h2 class="dobrodosliTekst">Podaci o ljubimcu</h2>
                    <table class="table table-striped table-bordered" style="width:50%; margin:auto">
                                <tr><td>
                                        Ime ljubimca
                                    </td>
                                    <td>
                                        <?=$tretman->ime?>
                                    </td>
                                </tr>
                                  <tr><td>
                                       Rasa
                                    </td>
                                    <td>
                                       <?=$tretman->rasa?>
                                    </td>
                                </tr>
                                 <tr><td>
                                       Veličina
                                    </td>
                                    <td>
                                     <?php if($tretman->velicina=="M") echo "Mala";
             if($tretman->velicina=="V") echo "Velika";
              if($tretman->velicina=="S") echo "Srednja";
            ?>
                                    </td>
                                </tr>
                    </table>
                <p class="dobrodosliTekst" style='font-size: 14pt'>Usluge tretmana</p>
                     <table class="table table-striped table-bordered" style="width:50%; margin:auto">
                         <tr>
                           
                        <?php $sadrziModel=new App\Models\SadrziModel(); 
                        $usluge=$sadrziModel->sveUslugeTretmana($res1);
                        foreach ($usluge as $usluga){ 
                            $uslugaModel=new \App\Models\UslugaModel();
                            $idUsluga=$usluga->IdUsluga;
                            $nazivUsluge=$uslugaModel->pronadjiNazivPoIdu($idUsluga);
                            $nazivUsluge=$nazivUsluge->Naziv;
                          $str= " <td>".$nazivUsluge."</td>";
                       echo $str;
                          }
                     ?></tr>
                       
                     </table>
                    
               <?php }; echo "</br>";echo "</br>";?>
              <p  style='font-size: 14pt;  '>Napomena</p>
              <div class="text-center"  style="margin-left:370px; margin-right: 370px; background-color: white;
                   min-height: 80px; border-radius: 10px; padding-top: 10px;
                   ">
              <?php if($tretman->napomena!=NULL)
              echo $tretman->napomena; else echo 'Nema napomene'
              ?></div>
                </div>
             
              </div>
            </div>
            <div class="col-sm-1 " >
             
            </div>
         
        </div>

<?php  echo view('sabloni/footer');?>
