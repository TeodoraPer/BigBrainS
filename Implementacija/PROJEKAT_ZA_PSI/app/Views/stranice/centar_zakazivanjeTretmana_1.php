<?php ?>

<div class="row divCentar">
    <div class="col-sm-1 " >

    </div>
    <div class="col-sm-10 centar" >
        <div class="sredina">  <p class="porukica2 error" > <br>
                    <?php
                    if (!empty($poruka))
                        echo "<p class='alert alert-danger' style='margin-left:300px; margin-right:300px'>".$poruka."</p>";
                    else
                        echo "&nbsp;"
                        ?>
                </p>               
            <form method="post" action="<?= site_url("$controller/pretragaPoUslugama") ?>">

                 <div class="row divUsluga" style="margin-top:-50px">
                  
                  <div class="col-sm-4" style="margin-left:-20px" >
                      <div class="usluga" style="background-color: #FFC7C7; border-radius: 10px; width:275px; ">                       
                        <img class="car-img-top" src="/images/sisanje.png" class="usluga_slika" style="width: 150px" id="slika1">
                        <span class="card-title text-center flavor_text"  > Šišanje&nbsp;<input type = "checkbox" name="usluge[]" value="Šišanje" class = "cekbox"></span>
                          
                            </div> 
                        <div class="usluga" style="background-color: #FFC7C7; border-radius: 10px ; width:275px;margin-top:-80px">
                       
                        <img class="car-img-top" src="/images/kupanje.png" class="usluga_slika" style="width: 150px" id="slika3">
                        <span class="card-title text-center flavor_text"  >  Kupanje&nbsp;<input type = "checkbox" name="usluge[]" value="Kupanje" class = "cekbox3"></span>
                          
                       </div> 
                       <div class="usluga" style="background-color: #FFC7C7; border-radius: 10px ; width:300px;margin-top:-80px">
                       
                        <img class="car-img-top" src="/images/cesljanje.png" class="usluga_slika" style="width: 150px" id="slika7">
                        <span class="card-title text-center flavor_text"  > Češljanje&nbsp;<input type = "checkbox" name="usluge[]" value="Češljanje" class = "cekbox7"></span>
                       </div> 
                 
                  </div>
                <div class="col-sm-4"  style="margin-left:-40px">
                        <div class="usluga" style="background-color: #FFC7C7; border-radius: 10px; width:345px">
                       
                        <img class="car-img-top" src="/images/usi.png" class="usluga_slika" style="width: 150px" id="slika2">
                        <span class="card-title text-center flavor_text"  >Čišćenje ušiju&nbsp;<input type = "checkbox" name="usluge[]" value="Čišćenje ušiju" class = "cekbox2"></span>
                          
                            </div> 
                        <div class="usluga" style="background-color: #FFC7C7; border-radius: 10px ; width:275px;margin-top:-80px">
                       
                        <img class="car-img-top" src="/images/frizura.png" class="usluga_slika" style="width: 150px" id="slika4">
                        <span class="card-title text-center flavor_text"  >  Frizura&nbsp;<input type = "checkbox" name="usluge[]" value="Frizura" class = "cekbox"></span>
                          
                      
                       </div> 
                      
                           <div class="usluga" style="background-color: #FFC7C7; border-radius: 10px; width:395px;margin-top:-80px">
                       
                        <img class="car-img-top" src="/images/nokti.png" class="usluga_slika" style="width: 150px" id="slika6">
                        <span class="card-title text-center flavor_text"  >  Sređivanje noktiju&nbsp;<input type = "checkbox" name="usluge[]" value="Sređivanje noktiju" class = "cekbox6"></span>
                          
                       </div> 
                    
                    
                    
                    
                    
                    
                    </div>
                    <div class="col-sm-1" style="margin-left:-20px">
                 
                         <div  style="background-color: #FFC7C7; border-radius: 10px; width:295px ;min-height: 100px;
                                                            text-align: left;
                                                                margin: 50px;
                                                                 margin-bottom: 110px;  width:355px; margin-top:230px ">
                       
                           <img class="car-img-top" src="/images/oci.png" class="usluga_slika" style="width: 150px" id="slika5">
                            <span class="card-title text-center flavor_text"  > Čišćenje očiju&nbsp;<input type = "checkbox" name="usluge[]" value="Čišćenje očiju" class = "cekbox"></span>
                          
                            </div> 
                      
                       </div> 
             
                     </div> 
                    
                <button class = "button6 btn-lg" style="margin-top: -100px" type="submit">Dalje</button>
                
            </form>
        </div>
    </div>
    <div class="col-sm-1 " >

    </div>
</div>
