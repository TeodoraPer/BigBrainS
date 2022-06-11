<?php
// Teodora Peric 0283/18 postavljanje hedera za gosta koji je dizajnirao Pavle Stefanovic 0562/18
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
   <script>
    
$(document).ready(function(){ 

$("#klikni").click(function(e){     
var pageURL = $(location).attr("href");
if(pageURL=="http://localhost:8080/"||pageURL=="http://localhost:8080/index.php/"){
       $.ajax({
type:'POST',
url:"Gost/poruka",
data:{},
success:function(result,status,xhr){        
$('#message').html(result);},
error:function(xhr,status,error){ 

           $("#message").html(error);
       }

       })

        }
else{ 
   $.ajax({
type:'POST',
url:"poruka",
data:{},
success:function(result,status,xhr){        
$('#message').html(result);},
error:function(xhr,status,error){ 

           $("#message").html(error);
       }

       })

        };
})   
    
})
    </script>
</head>
<body >
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
                   <button class="dugme" name="registracijaLink"><a class="linkNavBar" href="<?= site_url("Gost/registracija")?>">Registracija</a></button>
                   <button class="dugme1" name="loginLink"><a class="linkNavBar" href="<?= site_url("Gost/login")?>"">Login</a></button>
                  </div>

              </form>
             </nav>
             <p class="groomRoom">Groom Room</p>
             <p class="ispodLogoa">mesto za vašeg ljubimca</p>
            </div>
            
        </div>