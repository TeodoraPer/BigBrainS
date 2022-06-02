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
        <?php
        if(isset($poruka)) echo "<div class='poruka0409'>{$poruka}</div>";
         ?>
        <br>
        <?php
        if(!empty($korisnici)){
            echo "<table class='table table-striped table-bordered table-responsive table-light text-center table-hover'>"
            . "<tr><th class='col-sm-2 '>Ukloni korisnika</th>"
                    . "<th class='col-sm-2 '>Korisničko ime</th>"
                    . "<th class='col-sm-2 '>Kategorija</th></tr>";
        }



        foreach ($korisnici as $korisnik) {
            if($korisnik->tipKorisnika == "S") $tip="Salon";
            if($korisnik->tipKorisnika== "K") $tip="Korisnik";
            echo "<tr ><td >";
            echo anchor("$controller/ukloniKorisnika/{$korisnik->IdRK}", "Ukloni",'class="button2"');
            echo"</td><td >{$korisnik->korisnickoIme}</td>";

            echo "<td>{$tip}</td></tr>";
        }
        ?>

        </table>
        <br>
        <hr class="linija">


    </div>
    <div class="col-sm-1"></div>
</div>
       
   

