<?php
/**
 * @author BigBrainS tim
 */
?>
<div class="row divCentar">
    
    <div class="col-sm-1">

    </div>
    <div class="col-sm-10 centar">
        <br>
        <h2 class="dobrodosliTekst" style="font-size:16pt">
        <?php
         echo "Tabela sa zahtevima za uklanjanje"
         ?></h2>
        <br>
        <?php
        if(!empty($korisnici)){
          ?> 
        <table class='table table-striped table-bordered table-light text-center table-hover' style="width:70%; margin:auto">
             <tr><th class='col-sm-2 text-center'>Ukloni korisnika</th>
                   <th class='col-sm-2 text-center'>Korisničko ime</th>
                    <th class='col-sm-2 text-center'>Kategorija</td></tr>
        


        <?php 
        foreach ($korisnici as $korisnik) {$tip="";
            if($korisnik->tipKorisnika == "S") $tip="Salon";
            if($korisnik->tipKorisnika== "K") $tip="Korisnik";
            echo "<tr ><td >";
            echo anchor("$controller/ukloniKorisnika/{$korisnik->IdRK}", "Ukloni",'class="button2"');
            echo"</td><td >{$korisnik->korisnickoIme}</td>";

            echo "<td>{$tip}</td></tr>";
        }}
        ?>

        </table>
        <br>
        <?php if(isset($poruka)) echo "<p class='alert alert-success' style='font-size:14pt; margin-right:300px;margin-left:300px; text-align:center'>".$poruka."</p>"; ?>
        <hr class="linija">


    </div>
    <div class="col-sm-1"></div>
</div>
       
   

