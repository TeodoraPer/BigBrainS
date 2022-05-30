<?php
// Teodora Peric 0283/18 postavljanje hedera za ulogovanog korisnika koji je dizajnirao Pavle Stefanovic 0562/18
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
</head>
<body >
    <div class="container-fluid">
        <div class="row divHeader" >
            <div class="col-sm-12" style="background-color: #FFC7C7;">
              <img class='logo' src="/images/logo2.png">
           
              <nav class="navbar navbar-expand-sm " >
                <div class="btn-group">
                    <button class="dugme2"> <a class="linkNavBar " href="<?= site_url("Korisnik/index")?>">Početna</a></button>
                    <button class="dugme"><a class="linkNavBar" href="<?= site_url("Korisnik/pregled_salona")?>">Pregled salona</a></button>
                    <button class="dugme"><a class="linkNavBar" href="<?= site_url("Korisnik/pregled_usluga")?>">Pregled usluga</a></button>
                    <button class="dugme3"><a class="linkNavBar" href="<?= site_url("Korisnik/zakazivanje_tretmana")?>">Zakazivanje tretmana</a></button>
                    <button class="dugme"><a class="linkNavBar" href="<?= site_url("Korisnik/istorija_usluga")?>">Istorija usluga</a></button>
                    <button class="dugme1"><a class="linkNavBar" href="<?= site_url("Korisnik/logout")?>">Logout</a></button>
                  </div>

              </form>
             </nav>
             <p class="groomRoom">Groom Room</p>
             <p class="ispodLogoa">mesto za vašeg ljubimca</p>
            </div>
            
        </div>
