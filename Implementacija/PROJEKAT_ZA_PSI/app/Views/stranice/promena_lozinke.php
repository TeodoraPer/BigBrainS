<?php
// Teodora Peric 0283/18 i Aleksandra Dragojlovic 0409/19 postavljanje forme za promenu lozinke koji je dizajnirao Pavle Stefanovic 0562/18
// Aleksandra Dragojlovic 0409/19 prilagodjavanje stranice php kodu
?>

<div class="row divCentar">
            <div class="col-sm-1 " >

            </div>
            <div class="col-sm-10 centar" >
              <div class="sredina">
                  
                <div class="promena_lozinke">
                    <form  method="post" class="pomeriNaDole" style="text-align: left !important;" action="<?= site_url("$controller/promenaLozinkeObrada") ?>">
                   
                <table class="text-center tabela" style="margin-top:30px;" cellpadding="5px">
                    <tr >
                        <td>&nbsp;</td>
                        <td  class="porukica error"><?php 
                                                        if(!empty($errors['korIme'])) echo $errors['korIme'];
                                                        else echo "&nbsp;"?></td>
                    </tr>
                    <tr >
                        <td class="desno" >  Korisnicko ime:</td>
                        <td> <input class="inpt1 " type="text" name="korIme" placeholder="Korisnicko ime..." required="" oninvalid="this.setCustomValidity('Morate popuniti ovo polje!')" oninput="setCustomValidity('')" value="<?php  if(isset($poruka)||!empty($errors['korIme'])) echo ""; else echo set_value('korIme') ?>"></td>
                    </tr>
                    

                    <tr >
                        <td>&nbsp;</td>
                        <td  class="porukica error" ><?php 
                                                        if(!empty($errors['staraLoz'])) echo $errors['staraLoz'];
                                                        else echo "&nbsp;"?></td>
                    </tr>
                    <tr>
                        <td class="desno" >Stara lozinka:</td>
                        <td>   <input class="inpt1 " type="password" name="staraLoz" value="" placeholder="Stara lozinka..." required="" oninvalid="this.setCustomValidity('Morate popuniti ovo polje!')" oninput="setCustomValidity('')"></td>
                    </tr>

                    <tr > 
                        <td>&nbsp;</td>
                        <td class="porukica error">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="desno"> Nova lozinka:</td>
                        <td>       <input class="inpt1" type="password" name="novaLoz" placeholder="Nova lozinka..." required="" oninvalid="this.setCustomValidity('Morate popuniti ovo polje!')" oninput="setCustomValidity('')"></td>
                    </tr>

                    <tr > 
                        <td>&nbsp;</td>
                         <td class="porukica error"><?php 
                                                        if(!empty($errors['potvrdaLoz'])) echo $errors['potvrdaLoz'];
                                                        else echo "&nbsp;"?></td>
                    </tr>
                    <tr>
                        <td class="desno"> Potvrda nove lozinke:</td>
                        <td>   <input class="inpt1" type="password" name="potvrdaLoz" placeholder="Potvrda nove lozinke..." required="" oninvalid="this.setCustomValidity('Morate popuniti ovo polje!')" oninput="setCustomValidity('')"></td>
                    </tr>
                   <tr > 
                       <td colspan="2" style="color:green; text-align: left;"><?php if(isset($poruka)) echo $poruka; ?>
                                                        
                    </tr>
                </table>
                     
                <div class="PromenaLozinke_dugme">
                    <button type="submit" class="button1">PROMENI LOZINKU</button></a>
                    
                  
                  </div>
                    </form>
                  </div>
                
                  <br>
      
              
                <hr class="linija">
              </div>
            </div>
            <div class="col-sm-1 " >
             
            </div>
         
        </div>

