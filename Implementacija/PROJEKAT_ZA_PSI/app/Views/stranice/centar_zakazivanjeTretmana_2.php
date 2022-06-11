<?php ?>

<div class="row divCentar">
    <div class="col-sm-1 " >

    </div>
    <div class="col-sm-10 centar" >
             <h2 class="dobrodosliTekst">Saloni za izabrane usluge</h2>
        <form method="post" action="<?= site_url("$controller/zakazivanjeUSalonu") ?>">
             <?php  
            if (!empty($saloni)) {
                $inRow = 0;
                foreach ($saloni as $salon) {?>
                  <div class="col-sm-4" style="margin-bottom: 30px">
              <div class="card" style="text-align:center; background-color:  #FFC7C7; font-family: 'Spline Sans Mono', monospace;
     color:#595B83; ">
                             <img class="card-img-top" style="width:150px ;display:block; margin:auto;" src=<?php echo "{$salon->slika}"; ?>  >
                             <div class="card-body">
                                 <h2 class="card-title"><?=$salon->naziv; ?></h2>
                                 <p class="card-text" style="text-align:center"> <?php  $ocena=0; if($salon->brojOcena > 0){
                                 $ocena = ($salon->ukupanZbirOcena / $salon->brojOcena);} 
                        ?>  <p style="text-align:center; margin-left: 125px">
                               <label class="  rating">
                                    <input
                                      class="rating rating--nojs"
                                      max="5"
                                      step="0.1"
                                      type="range"
                                      value=<?=$ocena?>
                                       disabled="disabled">
                                </label>
                                 </p>
                        <button class="button4" type="" name="IdSalon" value=<?=$salon->IdSalon?>>Zakaži</button>
             
                             </div>
                             </div>
              </div>            
                       <?php         }
              
              
                                 }
            else{
                echo "<p class='alert alert-danger' style='margin-left:300px; margin-right:300px; margin-top:20px; text-align:center'>Nema salona!</p>";
            }
            ?>
           
         
        </form>
             <br><br><br>
    </div>
    <div class="col-sm-1 " >

    </div>
</div>


