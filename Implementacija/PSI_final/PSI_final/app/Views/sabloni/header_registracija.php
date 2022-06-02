<?php
// Teodora Peric 0283/18 heder za registraciju html, js, jQuery
// Teodora Peric 0283/18 dodat php 
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

<script src="https://use.fontawesome.com/3a2eaf6206.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="/fajlovi/java_novo.js"></script>
</head>
<body id="#body" onload="dodajSveUsluge()" >
    <div class="container-fluid">
        <div class="row divHeader" >
            <div class="col-sm-12" style="background-color: #FFC7C7;">
              <img class='logo' src="/images/logo2.png">
           
              <nav class="navbar navbar-expand-sm " >
                <form class="form-inline" style="display:inline ;">
                  <div class="btn-group">
                    <button class="dugme2"> <a class="linkNavBar " href="<?= site_url("Gost/index")?>">Početna</a></button>
                   <button class="dugme"><a class="linkNavBar" href="<?= site_url("Gost/pregled_salona")?>">Pregled salona</a></button>
                   <button class="dugme"><a class="linkNavBar" href="<?= site_url("Gost/pregled_usluga")?>">Pregled usluga</a></button>
                   <button class="dugme"><a class="linkNavBar" href="<?= site_url("Gost/registracija")?>">Registracija</a></button>
                   <button class="dugme1"><a class="linkNavBar" href="<?= site_url("Gost/login")?>"">Login</a></button>
                  </div>

              </form>
             </nav>
             <p class="groomRoom">Groom Room</p>
             <p class="ispodLogoa">mesto za vašeg ljubimca</p>
            </div>
            
        </div>
      