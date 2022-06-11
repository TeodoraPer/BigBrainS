<?php
/**
 * @author Teodora Peric 0283/18
 * funckionalnost Odobravanje zahteva za registraciju
 */
?>
<div class="row divCentar">
    
    <div class="col-sm-1">

    </div>
    <div class="col-sm-10 centar">
        <br>
        <h2 class="dobrodosliTekst">Trenutno nema nijednog neobrađenog zahteva!
      
            <br></h2>
      
             <?php if(isset($poruka)) echo "<p class='alert alert-success' style='font-size:14pt; margin-right:300px;margin-left:300px; text-align:center'>".$poruka."</p>"; ?>
       
        <br>
        <hr class="linija">


    </div>
    <div class="col-sm-1"></div>
</div>
       
   

