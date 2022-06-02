<?php
// Teodora Peric 0283/18 postavljanje centra za prikaz infomracija o konkretnom korisniku
?>

        <div class="row divCentar">
            <div class="col-sm-1 " >

            </div>
            <div class="col-sm-10 centar" >
              <div class="sredina">
                  <h2 class="dobrodosliTekst">
                   <?php echo anchor("Administrator/zahtevi_za_registraciju", "Idi nazad",'class="button2"'); ?>
                      Pregled korisnikove forme za registraciju</h2><br><br>
                <?php if(isset($res1)&&isset($res2)){ 
                    if($res1->tipKorisnika!="S"){
                ?>
                <div class="flavor_text">
                    <table class="table table-striped table-bordered"  style="width:50%; margin:auto;">
                        <tr>
                            <td>
                               Ime korisnika 
                            </td>
                            <td>
                                <?= $res2->ime?>
                            </td>
                        </tr>
                         <tr>
                            <td>
                              Prezime korisnika
                            </td>
                            <td>
                               <?= $res2->prezime?>
                            </td>
                        </tr>
                           <tr>
                            <td>
                             Pol korisnika
                            </td>
                            <td>
                             <?php if($res2->pol=="M") echo "Muško"; else echo 'Žensko' ?>
                            </td>
                        </tr>
                          <tr>
                            <td>
                            Tip korisnika:
                            </td>
                            <td>
                           <?php if($res1->tipKorisnika=="A") echo "Menadžer"; else echo 'Korisnik' ?>
                            </td>
                        </tr>
                         <tr>
                            <td>
                            Korisničko ime
                            </td>
                            <td>
                       <?= $res1->korisnickoIme?>
                            </td>
                        </tr>
                          <tr>
                            <td>
                          Email
                            </td>
                            <td>
                    <?= $res1->email?>
                            </td>
                        </tr>
                           <tr>
                            <td>
                         Broj telefona
                            </td>
                            <td>
                 <?= $res1->brojTelefona?>
                            </td>
                        </tr>
                             <tr>
                            <td>
                         Adresa
                            </td>
                            <td>
                <?= $res1->adresa?>
                            </td>
                        </tr>
                    </table>
                   
                    <?php } 
                    else{?>
                    <table class="table table-striped table-bordered" style="width:50%; margin:auto">
                        <tr>
                            <td>
                                Slika
                            </td>
                            <td>
                                   <img src=<?php echo "{$res2->slika}"; ?> style="width:200px" >
                            </td>
                        </tr>
                          <tr>
                            <td>
                               Naziv salona
                            </td>
                            <td>
                                 <?= $res2->naziv?>
                            </td>
                        </tr>
                           <tr>
                            <td>
                            Tip korisnika
                            </td>
                            <td>
                              <?= "Salon"?>
                            </td>
                        </tr>
                          <tr>
                            <td>
                         Korisničko ime
                            </td>
                            <td>
                            <?= $res1->korisnickoIme?>
                            </td>
                        </tr>
                          <tr>
                            <td>
                         Email
                            </td>
                            <td>
                         <?= $res1->email?>
                            </td>
                        </tr>
                          <tr>
                            <td>
                        Broj telefona
                            </td>
                            <td>
                       <?= $res1->brojTelefona?>       </td>
                        </tr>
                           <tr>
                            <td>
                       Adresa
                            </td>
                            <td>
                  <?= $res1->adresa?>    </td>
                        </tr>
                         </tr>
                           <tr>
                            <td>
                    Radno vreme
                            </td>
                            <td><ul>
                         <li>Ponedeljak-Petak:<?php $ovo="ponedeljak-petakOD";$ispisi= str_split($res2->$ovo)  ;
                                $str=$ispisi[0]."".$ispisi[1]."".$ispisi[2]."".$ispisi[3]."".$ispisi[4];
                                echo $str;
                                 ;$ovo="ponedeljak-petakDO" ?> do <?php ;$ispisi= str_split($res2->$ovo)  ;
                                $str=$ispisi[0]."".$ispisi[1]."".$ispisi[2]."".$ispisi[3]."".$ispisi[4];
                                echo $str;?> </li>
                       <?php if($res2->subotaOD!=null){?> <li>Subota:<?php
                           $ispisi= str_split($res2->subotaOD)  ;
                                $str=$ispisi[0]."".$ispisi[1]."".$ispisi[2]."".$ispisi[3]."".$ispisi[4];
                                echo $str;
                           ?> do <?php   $ispisi= str_split($res2->subotaDO)  ;
                                $str=$ispisi[0]."".$ispisi[1]."".$ispisi[2]."".$ispisi[3]."".$ispisi[4];
                                echo $str; ?> </li> <?php }?>
                       <?php if($res2->nedeljaOD!=null){?> <li>Nedelja:<?php   $ispisi= str_split($res2->nedeljaOD)  ;
                                $str=$ispisi[0]."".$ispisi[1]."".$ispisi[2]."".$ispisi[3]."".$ispisi[4];
                                echo $str;?> do <?php    $ispisi= str_split($res2->nedeljaDO)  ;
                                $str=$ispisi[0]."".$ispisi[1]."".$ispisi[2]."".$ispisi[3]."".$ispisi[4];
                                echo $str;?> </li> <?php }?>
                     </ul>
                    </td>
                    </table>
                 
                    
                     
                     
                     <p class="dobrodosliTekst">Usluge</p>
                     <table class="table table-striped table-bordered" style="width:50%; margin:auto">
                         <tr>
                             <td>Naziv</td>
                             <td>Cena za mali pas</td>
                             <td>Cena za srednji pas</td>
                             <td>Cena za veliki pas</td>
                         </tr>
                        <?php $ceneUsluga=new App\Models\CenaUslugeModel(); 
                        $usluge=$ceneUsluga->sveUslugeSalona($res1->IdRK);
                        foreach ($usluge as $usluga){ 
                            $uslugaModel=new \App\Models\UslugaModel();
                            $idUsluga=$usluga->IdUsluga;
                            $nazivUsluge=$uslugaModel->pronadjiNazivPoIdu($idUsluga);
                            $nazivUsluge=$nazivUsluge->Naziv;
                          $str= "<tr> <td>".$nazivUsluge."</td><td>".$usluga->cenaVelikiPas."</td><td>".$usluga->cenaSrednjiPas."</td><td>".$usluga->cenaMaliPas."</td></tr>";
                       echo $str;
                          }
                     ?>
                         <tr><td colspan="4">Kraj</td></tr>
                     </table>
                    
                    <?php }; echo "</br>";echo "</br>";?>
                    
                    
                    
                </div>
             
              </div>
            </div>
            <div class="col-sm-1 " >
             
            </div>
         
        </div>

                <?php if($res1->tipKorisnika!="S") echo view('sabloni/footer');}
                
                ?>
