<?php 
/**
 * Peric Teodora 0283/18
 * Funkcionalnost Odobravanje rezervacije
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GroomRoom</title>
    <link rel="icon" href="/images/icon.png?v=2">
    <link rel="stylesheet" href="/fajlovi/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Spline+Sans+Mono:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Sacramento&family=Spline+Sans+Mono:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Signika+Negative:wght@300;400&display=swap" rel="stylesheet">

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body >
    <div class="container-fluid">
        <div class="row divHeader" >
            <div class="col-sm-12" style="background-color: #FFC7C7;">
              <img class='logo' src="/images/logo2.png">
           
              <nav class="navbar navbar-expand-sm " >
                 <form class="form-inline" style="display:inline ;">
                  <div class="btn-group">
                    <button class="dugme2"> <a class="linkNavBar " href="<?= site_url("Salon/index")?>">Po??etna</a></button>
                    <button class="dugme"><a class="linkNavBar" href="<?= site_url("Salon/pregled_salona")?>">Pregled salona</a></button>
                    <button class="dugme"><a class="linkNavBar" href="<?= site_url("Salon/pregled_usluga")?>">Pregled usluga</a></button>
                    <button class="dugme3"><a class="linkNavBar" href="<?= site_url("Salon/zahtevi_za_rezervaciju")?>">Zahtevi za rezervaciju</a></button>
                    <button class="dugme3"><a class="linkNavBar" href="<?= site_url("Salon/potvrda_kraja_usluge")?>">Potvrda kraja usluge</a></button>
                    <button class="dugme1"><a class="linkNavBar" href="<?= site_url("Salon/logout")?>">Logout</a></button>
                  </div>

              </form>
             </nav>
             <p class="groomRoom">Groom Room</p>
             <p class="ispodLogoa">mesto za va??eg ljubimca</p>
            </div>
            
        </div>
        
        
      <div class="row divCentar">
    
    <div class="col-sm-1">

    </div>
    <div class="col-sm-10 centar">
        <h2 class="dobrodosliTekst" style="font-size:16pt">
        <?php
         echo "Tabela sa zahtevima za rezervaciju"
         ?>
            <br></h2>
       <table class='table table-striped table-bordered table-light text-center table-hover' style="width:70%; margin:auto">
       
          <tr>
            <th class='col-sm-2 '>Rasa</th>
            <th class='col-sm-2 '>Velicina</th>
            <th class='col-sm-2 '>Ime</th>
            <th class='col-sm-2 '>Datim i vreme</th>
           <th class='col-sm-2 '>Broj telefona</th>
           <th class='col-sm-2 '>Odobri</th>
            <th class='col-sm-2 '>Odbij</th>
              <th class='col-sm-2 '>Saznaj vi??e o rezervaciji</th>
          </tr>
      
          <?php if($tretmani): ?>
          <?php foreach($tretmani as $tretman): 
              if($tretman->jePotvrdjenaRezervacija!=NULL) continue;
              ?>
          <tr>
            <td><?php echo $tretman->rasa;?></td>
            <td><?php if($tretman->velicina=="M") echo "Mala";
             if($tretman->velicina=="V") echo "Velika";
              if($tretman->velicina=="S") echo "Srednja";
            ?></td>
            <td><?php echo $tretman->ime;?></td>
            <td> <?php 
            $niz=(str_split($tretman->DatumVreme));
            $godina=$niz[0]."".$niz[1]."".$niz[2]."".$niz[3];
            $mesec=$niz[5]."".$niz[6];
            $dan=$niz[8]."".$niz[9];
            $sat=$niz[11]."".$niz[12];
            $minut=$niz[14]."".$niz[15];
            echo $mesec."/".$dan."/".$godina." ".$sat.":".$minut;
            ?></td>
            <td><?php echo $tretman->brojTelefona; ?></td>
            <td><?php   echo anchor("$controller/odobriRezervaciju/{$tretman->IdTretman}", "Odobri",'class="button2"');?></td>
            <td><?php   echo anchor("$controller/odbijRezervaciju/{$tretman->IdTretman}", "Odbij",'class="button2"'); ?></td>
          <td><?php   echo anchor("$controller/saznajViseORezervaciji/{$tretman->IdTretman}", "Saznaj",'class="button2"'); ?></td>
          </tr>
          <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
        <br><br>
      <!-- Pagination --> 
     <div class="d-flex justify-content-end flavor_text">
          Izaberi broj strane:&nbsp;
        <?php if ($pager) :?>
        <?php $pagi_path='Salon/zahtevi_za_rezervaciju'; ?>
        <?php $pager->setPath($pagi_path); ?>
        <?= 
       
        $pager->links() ?>
        <?php endif ?>
      </div>
        
       <?php if(isset($poruka)) echo "<p class='alert alert-success' style='font-size:14pt; margin-right:300px;margin-left:300px; text-align:center'>".$poruka."</p>"; ?>
        <br>
        <hr class="linija">

   

    </div>
    <div class="col-sm-1"></div>
</div>

        <div class="row divFuter">
          <div class="col-sm-12">
            <div style="background-color:#F6F6F6;">
              <h2 class="dobrodosliTekst">Preporu??eni saloni</h2>
              <p class="flavor_text">Izaberite jedan od salona iz na??e preporuke!
              </p>
            <div class="scrollmenu">
                  <?php 
                  $salonModel=new \App\Models\SalonModel();
                  $sviSaloni=$salonModel->sviSaloni2();
                  foreach($sviSaloni as $salon){
                  ?>
                  <img class="salon_slika"  src=<?php echo "{$salon->slika}"; ?>><?php }?>
               
                  
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
                  <p class="copyright">?? 2022 GroomRoom. All rights reserved.</p>
                </div>

          </div>
      </div>
       


    
      
    </div>
</body>
</html>