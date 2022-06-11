<?php
use CodeIgniter\Config\Factories;
?>

<div class="row divCentar">
            <div class="col-sm-1 " >
            </div>
            <div class="col-sm-10 centar" >
              <div class="sredina">
                <h2 class="uslugeTekst"> SALONI </h2>
                <div class="row divUsluga" >
                    
                    <?php $salonModel= Factories::models('App\Models\SalonModel');  //new \App\Models\SalonModel(); 
                    if(!isset($offset)) $offset=0;?>
                   
                    <?php 
                    $sviSaloni=$salonModel->sviSaloni(6, intval($offset));
                    
                                   $i=0;
                    foreach ($sviSaloni as $row)
                        {?>
                     <div class="col-sm-4">
                         <div class="card" style="margin-top:50px; background-color: #FFC7C7">
                             <img class="card-img-top" style="width:150px ;display:block; margin:auto;" src=<?php echo "{$row->slika}"; ?>  >
                             <div class="card-body">
                                 <h2 class="card-title"><?=$row->naziv; ?></h2>
                                 <p class="card-text" style="text-align:center"> <?php  $ocena=0; if($row->brojOcena > 0){
                                 $ocena = ($row->ukupanZbirOcena / $row->brojOcena);} 
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
        
                 <?php
                    
                    
                    
                       ?>   
                                 </p>
 <?php   echo anchor("$controller/saznajViseOSalonu/{$row->IdSalon}/{$offset}", "Pogledaj",'class="button2"'); ?>
                  
                             </div>
                             </div>
                     
                  </div>
                        <?php }?>
                   
                  
                </div> <br> <br>
 
              </div>
                     <br>
                     <br>
                     <div style="text-align:center; font-family: 'Spline Sans Mono', monospace;
  color: #595B83; ">
                           <?php $vrednost=$salonModel->brojSalona(); if($vrednost/6>1){
                               
  ?>
                     <ul class="pagination" ><?php $j=$offset-6 ;if($j>=0){ ?>
                            <li class="page-item"><?php   echo anchor("$controller/pregled_salona/{$j}", "Pethodno",'class="page-link"');?></li>
                     <?php }
                       
                         for($i=0;$i<$vrednost/6;$i++){
                             $j=intval($i)*6;
                             ?>
                       
                         <li class="page-item"><?php   echo anchor("$controller/pregled_salona/{$j}", $i+1,'class="page-link"');?></li>
                           <?php }}?> <?php $j=$offset+6 ;if($j>=$vrednost){} else{?>
                            <li class="page-item"><?php   echo anchor("$controller/pregled_salona/{$j}", "Sledeće",'class="page-link"');?></li>
                            <?php }?>
                     </ul>  
                     </div>
            </div>
            <div class="col-sm-1 " >

            </div>
           
        </div>