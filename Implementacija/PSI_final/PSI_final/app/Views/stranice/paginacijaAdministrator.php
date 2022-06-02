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
                    <button class="dugme2"> <a class="linkNavBar " href="<?= site_url("Administrator/index")?>">Početna</a></button>
                    <button class="dugme"><a class="linkNavBar" href="<?= site_url("Administrator/pregled_salona")?>">Pregled salona</a></button>
                    <button class="dugme"><a class="linkNavBar" href="<?= site_url("Administrator/pregled_usluga")?>">Pregled usluga</a></button>
                    <button class="dugme"><a class="linkNavBar" href="<?= site_url("Administrator/brisanje_naloga")?>">Brisanje naloga</a></button>
                    <button class="dugme3"><a class="linkNavBar" href="<?= site_url("Administrator/zahtevi_za_registraciju")?>">Zahtevi za registraciju</a></button>
                    <button class="dugme1"><a class="linkNavBar" href="<?= site_url("Administrator/logout")?>">Logout</a></button>
                  </div>

              </form>
             </nav>
             <p class="groomRoom">Groom Room</p>
             <p class="ispodLogoa">mesto za vašeg ljubimca</p>
            </div>
            
        </div>
        
        
      <div class="row divCentar">
    
    <div class="col-sm-1">

    </div>
    <div class="col-sm-10 centar">
        <h2 class="dobrodosliTekst" style="font-size:16pt">
        <?php
         echo "Tabela sa zahtevima za registraciju"
         ?>
            <br></h2>
       <table class='table table-striped table-bordered table-light text-center table-hover'>
       
          <tr>
            <th class='col-sm-2 '>Odobri</th>
            <th class='col-sm-2 '>Odbij</th>
            <th class='col-sm-2 '>Korisničko ime</th>
            <th class='col-sm-2 '>Tip korisnika</th>
          </tr>
      
          <?php if($users): ?>
          <?php foreach($users as $user): 
              if($user->jeOdobrenZahtevZaRegistraciju!=NULL) continue;
              ?>
          <tr>
            <td><?php   echo anchor("$controller/odobriKorisnika/{$user->IdRK}", "Odobri",'class="button2"');?></td>
            <td><?php   echo anchor("$controller/odbijKorisnika/{$user->IdRK}", "Odbij",'class="button2"'); ?></td>
            <td><?php echo $user->korisnickoIme;?></td>
            <td><?php echo $user->tipKorisnika; ?></td>
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
        <?php $pagi_path='Administrator/zahtevi_za_registraciju'; ?>
        <?php $pager->setPath($pagi_path); ?>
        <?= 
       
        $pager->links() ?>
        <?php endif ?>
      </div>
        
       <?php if(isset($poruka)) echo "<p class='alert alert-success' style='font-size:18pt; margin-right:300px;margin-left:300px; text-align:center'>".$poruka."</p>"; ?>
        <br>
        <hr class="linija">

   

    </div>
    <div class="col-sm-1"></div>
</div>

        <div class="row divFuter">
          <div class="col-sm-12">
            <div style="background-color:#F6F6F6;">
              <h2 class="dobrodosliTekst">Preporučeni saloni</h2>
              <p class="flavor_text">Izaberite jedan od salona iz naše preporuke!
              </p>
              <div class="scrollmenu">
                  <img class="salon_slika" src="/images/salon1.png">
                  <img class="salon_slika" src="/images/salon2.png">
                  <img class="salon_slika" src="/images/salon3.png">
                  <img class="salon_slika" src="/images/salon4.png">
                  <img class="salon_slika" src="/images/salon5.png">
                  <img class="salon_slika" src="/images/salon6.png">
                  <img class="salon_slika" src="/images/salon7.png">
                  <img class="salon_slika" src="/images/salon8.png">
                  
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