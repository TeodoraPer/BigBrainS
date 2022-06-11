<?php ?>

<div class="row divCentar">
    <div class="col-sm-1">

    </div>
    <div class="col-sm-10 centar">
         <?php
         if (!empty($tretmani)) {?> <br>
           <h2 class="dobrodosliTekst" style="font-size:16pt">
        <?php
         echo "Tabela sa zahtevima"
         ?>
            <br></h2>
        <form method="post" action="<?= site_url("$controller/obradiTretman") ?>">
           <table class='table table-striped table-bordered table-light text-center table-hover' style="width:70%; margin:auto;  text-align: center; vertical-align: central;
                  font-size:13pt;">
                <tr >
                    <th class="col-sm-2 text-center" >Korisničko Ime</th>
                    <th class="col-sm-2 text-center">Datum i Vreme Rezervacije</th>
                    <th class="col-sm-2 text-center" colspan="2">Potvrdi uspešan kraj usluge</th>
                </tr>
               
<?php
                    foreach ($tretmani as $tretman) {
                        echo "<tr style='vertical-align:center'>";
                        $korIme = "";
                        if (!empty($korisnici) && !empty($korisnici[$tretman->idKorisnik])) {
                            $korIme = $korisnici[$tretman->idKorisnik]->korisnickoIme;
                        }
                        echo "<td><br>{$korIme}</td>";
                         $niz=(str_split($tretman->DatumVreme));
                         $godina=$niz[0]."".$niz[1]."".$niz[2]."".$niz[3];
                          $mesec=$niz[5]."".$niz[6];
                          $dan=$niz[8]."".$niz[9];
                          $sat=$niz[11]."".$niz[12];
                             $minut=$niz[14]."".$niz[15];
                          
                        echo "<td><br>".$mesec."/".$dan."/".$godina." ".$sat.":".$minut."</td>";
                        echo "<td><button class=\"button2\" type=\"submit\" name=\"akcija\" value=\"potvrdi!{$tretman->IdTretman}\">Potvrdi</button></td>
                    <td><button class=\"button2\" type=\"submit\" name=\"akcija\" value=\"odbij!{$tretman->IdTretman}\">Odbij</button></td>";
                        echo "</tr>";
                    }
                
                ?>

            </table>
        </form>
        <br>
                <?php }
              
                if (empty($tretmani)) {?> <br>
                <h2 class="dobrodosliTekst">Trenutno nema nijednog neobrađenog zahteva!
     
            </h2>  <br>
        <hr class="linija">
         
        <br>
         <?php }
        if (isset($poruka)) { echo "<p class='alert alert-success' style='font-size:14pt; margin-right:300px;margin-left:300px; text-align:center'>".$poruka."</p>"; 
      
        }
        ?>
       
    </div>
    <div class="col-sm-1 ">

    </div>
</div>