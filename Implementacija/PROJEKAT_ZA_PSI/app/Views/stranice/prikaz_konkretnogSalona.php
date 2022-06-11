<?php
// Teodora Peric 0283/18 postavljanje centra za prikaz infomracija o konkretnom korisniku

use CodeIgniter\Config\Factories;
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <div class="row divCentar">
            <div class="col-sm-1 " >

            </div>
            <div class="col-sm-10 centar" ><br>
                  <?php echo anchor("$controller/pregled_salona/{$offset}", "Idi nazad",'class="button4" '); ?>      
              <div class="sredina">
             
          
       <div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm" style=" border-radius: 10px">
            <div class="card-header text-center" style="background-color:#FFF8E6; border-radius: 10px">
               <img src=<?php echo "{$res2->slika}"; ?> style="width:200px"  align="bottom">
           <h3><i class='fas fa-paw'></i> <?= $res2->naziv?> </h3>
             <?php  $ocena=0; if($res2->brojOcena > 0){
                                 $ocena = ($res2->ukupanZbirOcena / $res2->brojOcena);} 
                        ?>  <p style="text-align:center; margin-left:90px  ">
                            <label class="rating" >
                                    <input style="background-color:#FFF8E6 "
                                      class="rating rating--nojs" 
                                      max="5"
                                      step="0.1"
                                      type="range"
                                      value=<?=$ocena?>
                                       disabled="disabled">
                                </label>
        
                  <p class="mb-0"><strong class="pr-1" style="margin-top:10px"> <i class='fas fa-map-marker-alt'></i> Adresa:</strong><?= $res1->adresa?></p>
          </div>
          <div class="card-body">
      <?php $email=$res1->email;
             $p="";
              if($controller=='Gost')$p='Gost';
              if($controller=="Korisnik")$p='Korisnik';
              if($controller=='Administrator')$p='Admin';
              if($controller=='Salon')$p='Salon';
                $poruka="<a href='mailto:".$email."?subject=".$p."'>".$email."</a>";
              ?>
               <p class="mb-0"><strong class="pr-1" ><i class='fas fa-phone-square'></i> Broj telefona:</strong><?= $res1->brojTelefona?></p>
              <p class="mb-0"><strong class="pr-1" >&#128231; Email:</strong><?= $poruka?></p>
           
          </div>
         
        </div>
      </div>
      <div class="col-lg-8">
          
        <div class="card shadow-sm" style="background-color:#FFF8E6; border-radius: 10px">
          <div class="card-header bg-transparent border-0 " style="background-color:#FFF8E6">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Usluge</h3>
          </div>
          <div class="card-body pt-0">
              
              <table class="table table-bordered bg-white" style="margin-top:20px;font-family: 'Spline Sans Mono', monospace;
  color: #595B83;
  font-size: 12pt;">
                <tr>
                    <td>Naziv</td>
                    <td>Cena veliki pas</td>
                    <td>Cena srednji pas</td>
                    <td>Cena mali pas</td>
                </tr>
                   <?php $ceneUsluga=Factories::models('App\Models\CenaUslugeModel');//new App\Models\CenaUslugeModel(); 
                        $usluge=$ceneUsluga->sveUslugeSalona($res1->IdRK);
                        foreach ($usluge as $usluga){ 
                            $uslugaModel=Factories::models('App\Models\UslugaModel');//new \App\Models\UslugaModel();
                            $idUsluga=$usluga->IdUsluga;
                            $nazivUsluge=$uslugaModel->pronadjiNazivPoIdu($idUsluga);
                            $nazivUsluge=$nazivUsluge->Naziv;
                          $str= "<tr> <td>".$nazivUsluge."</td><td>".$usluga->cenaVelikiPas." <small>RSD</small></td><td>".$usluga->cenaSrednjiPas." <small>RSD</small></td><td>".$usluga->cenaMaliPas." <small>RSD</small></td></tr>";
                       echo $str;
                          }
                     ?>
            </table>
          </div>
        </div>
          <div style="height: 26px"></div>
        <div class="card shadow-sm" style="background-color:#FFF8E6; border-radius: 10px">
          <div class="card-header bg-transparent border-0">
              <h3 class="mb-0" style="margin-bottom:20px">&#128467; Radno vreme</h3>
          </div>
            <div class="card-body pt-0" style="margin-top:10px">
            <ul style="list-style-position: inside">
                <li style="margin-top:10px">Ponedeljak-Petak:<?php $ovo="ponedeljak-petakOD";$ispisi= str_split($res2->$ovo)  ;
                                $str=$ispisi[0]."".$ispisi[1]."".$ispisi[2]."".$ispisi[3]."".$ispisi[4];
                                echo $str;
                                 ;$ovo="ponedeljak-petakDO" ?> do <?php ;$ispisi= str_split($res2->$ovo)  ;
                                $str=$ispisi[0]."".$ispisi[1]."".$ispisi[2]."".$ispisi[3]."".$ispisi[4];
                                echo $str;?> </li>
                       <?php if($res2->subotaOD!=null){?> <li style="margin-top:10px">Subota:<?php
                           $ispisi= str_split($res2->subotaOD)  ;
                                $str=$ispisi[0]."".$ispisi[1]."".$ispisi[2]."".$ispisi[3]."".$ispisi[4];
                                echo $str;
                           ?> do <?php   $ispisi= str_split($res2->subotaDO)  ;
                                $str=$ispisi[0]."".$ispisi[1]."".$ispisi[2]."".$ispisi[3]."".$ispisi[4];
                                echo $str; ?> </li> <?php }?>
                       <?php if($res2->nedeljaOD!=null){?> <li style="margin-top:10px">Nedelja:<?php   $ispisi= str_split($res2->nedeljaOD)  ;
                                $str=$ispisi[0]."".$ispisi[1]."".$ispisi[2]."".$ispisi[3]."".$ispisi[4];
                                echo $str;?> do <?php    $ispisi= str_split($res2->nedeljaDO)  ;
                                $str=$ispisi[0]."".$ispisi[1]."".$ispisi[2]."".$ispisi[3]."".$ispisi[4];
                                echo $str;?> </li> <?php }?>
                     </ul>
          </div>
        </div>
      </div>
        
    </div>
      <div class="row" style="margin-top: -100px">
          <div class="col-sm-12" style="margin-top:100px">
              <h2 class="dobrodosliTekst">Reviews</h2> 
            <?php $recModel=new App\Models\OstavioRecenzijuModel(); 
                
                   $db = \Config\Database::connect();
                   $record = $db->table('ostaviorecenziju');
                    $record->where('IdSalon', $res1->IdRK);
    
                   $query = $record->get();
                  $result = $query->getResult();
             if($result){
              foreach($result as $rec){ 
                 ?>
               <p class="flavor_text" 
                    style="width:1000px; margin:auto; background-color: #FFF8E6 ; border-radius: 10px; margin-top: 10px; margin-bottom: 50px;" class="flavor_text">
                  <?php   $regKorisnikModel=new \App\Models\RegKorisnikModel();
                  $korisnik=$regKorisnikModel->nadjiPrekoId($rec->IdKorisnik);
                   $db = \Config\Database::connect();
                   $record = $db->table('ocenio');
                    $record->where('IdSalon', $res1->IdRK);
                     $record->where("IdKorisnik",$rec->IdKorisnik);
                   $query = $record->get();
                  $result = $query->getFirstRow('object');
                  
                  if($result){$ocena=$result->Ocena;} else {$ocena=0;}?>   <label class="rating" style="text-align: center; background-color: #FFF8E6" > <?=$korisnik->korisnickoIme;?>
                                    <input style="background-color:#FFF8E6; display: inline "
                                      class="rating rating--nojs" 
                                      max="5"
                                      step="0.5"
                                      type="range"
                                      value=<?=$ocena?>
                                       disabled="disabled">
                                </label>
                  <?php 
                  ?> <br><p class="" style="width:1000px;  word-wrap: break-word;  padding: 10px 60px 10px 60px; border:solid 2px orange; margin:auto; background-color: white ; border-radius: 10px; margin-top:-70px" class="flavor_text">
                  <?=$rec->sadrzaj?> </p> <br><br> </p>
              <?php
               }}
             else{ 
                 ?>
               <div 
                    >Nema ostavljenih recenzija za dati salon</div>
              <?php
             }
              ?>
          </div>
      </div>`
  </div>
</div>            
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                </div>
              </div>
            
            <div class="col-sm-1 " >
             
            </div>
         
        </div>

