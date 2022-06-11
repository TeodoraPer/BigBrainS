<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($poruka)){ 
    echo $poruka;
    }?> <br>
    <?php 
if(isset($usluge)){ 
    echo $poruka;?> <br><?php
}
foreach ($usluge as $usluga){ 
    echo $usluga ?><br> <?php 
  
}?>
<p>Ualuge</p>
