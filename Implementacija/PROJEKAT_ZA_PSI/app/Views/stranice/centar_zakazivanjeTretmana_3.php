<?php ?>

<div class="row divCentar">
    <div class="col-sm-1 " >

    </div>
    <div class="col-sm-10 centar" >
           <div class="sredina">
                    <?php
            if (!empty($greska)){
                ?><p class="alert alert-danger" style="margin-left:300px; margin-right: 300px"> <?php echo $greska;?></p><?php }
            else
                echo "&nbsp;"
                ?>
        <form method="post" action="<?= site_url("$controller/zavrsiZakazivanje") ?>">
            <div class="zakazivanje">
             <table class="text-center tabela" style="margin-top:30px;" cellpadding="5px">
                            <tr >
                                <td colspan="2" class="porukica2 error">
                                    &nbsp; <br>  &nbsp;
                                    </td>
                            </tr>
                            <tr >
                                <td class="desno" > Rasa:</td>
                                <td> <select name="rasa"   value="<?php echo set_value("rasa") ?>"  id="rasa" style="width:180px" class="inpt3">
                            <option value="buldog">Buldog</option>
                            <option value="labrador">Labrador</option>
                            <option value="pudlica">Pudlica</option>
                            <option value="si-cu">Ši-cu</option>
                            <option value="bigl">Bigl</option>
                            <option value="civava">Čivava</option>
                            <option value="mesanac">Mešanac</option>
                            <option value="drugo">Drugo</option>
                        </select></td>
                            </tr>
        
                            <tr >
                                <td colspan="2" class="porukica2 error">
                                    &nbsp;<br>  &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td class="desno" >Godine:</td>
                                <td>   <input class="inpt3 " type="text" 
                                           
                                          placeholder="Broj godina"
                                            name="godine"   value="<?php echo set_value("godine") ?>"
                                         ></td>
                            </tr>
        
                            <tr > 
                                <td colspan="2" class="porukica2 error"> 
                                    
                                     &nbsp;<br>  &nbsp;</td>
                            </tr>
                            <tr>
                                <td class="desno"> Ime</td>
                                <td>       <input class="inpt3 " 
                                                   value="<?php echo set_value("ime") ?>"
                                                 name="ime"
                                         
                                             type="text"  placeholder="Ime"
                                            ></td>
                            </tr>
        
                            <tr > 
                                 <td colspan="2" class="porukica2 error">
                                   
                                    &nbsp; <br>   &nbsp; </td>
                            </tr>
                            <tr>
                                <td class="desno"> Datum i vreme:</td>
                                <td>  <input class="inpt3 " 
                                              
                                              type="datetime-local" id="vreme" name="vreme"
                                          ></td>
                            </tr>
        
                            <tr > 
                              <td colspan="2" class="porukica2 error">
                                  &nbsp;<br>&nbsp;</td>
                             </tr>
                             <tr>
                             <td class="desno"> Veličina:</td>
                               <td>   
                                <select name="velicina" class="inpt3" style="width:200px"  value="<?php echo set_value("velicina") ?>"  name="velicina" id="velicina">
                              <option value="M">Mali pas</option>
                            <option value="S">Srednji pas</option>
                            <option value="V">Veliki pas</option>
                        </select>
                               </td>
                              </tr>
        
                              <tr > 
                                <td colspan="2" class="porukica2 error">
                                    <br>  &nbsp; <br></td>
                              </tr>
                            
                          </table>
                <br><br>
                 
                <table class="text-center tabela zakazivanje" style="margin-top:-10px; margin-left:0px; ;  text-align: left" >
                      <tr>
                             
                          <td style="text-align:left; padding-left:10px"> 
                                 <h2 class="desno flavor_text"> &nbsp; &nbsp;Izabrane usluge:</h2>
                                   <input type="checkbox" <?php if (!empty($usluge) && in_array('Šišanje', $usluge)) echo "checked"; ?> disabled="disabled" class="izbor2 zasisanje">&nbsp;Šišanje<br>
                                   <input type="checkbox" <?php if (!empty($usluge) && in_array('Sređivanje noktiju', $usluge)) echo "checked"; ?> disabled="disabled" class="izbor2">&nbsp;Skraćivanje noktiju<br>
                                   <input type="checkbox" <?php if (!empty($usluge) && in_array('Kupanje', $usluge)) echo "checked"; ?> disabled="disabled" class="izbor2">&nbsp;Kupanje<br>
                                   <input type="checkbox" <?php if (!empty($usluge) && in_array('Frizura', $usluge)) echo "checked"; ?> disabled="disabled" class="izbor2">&nbsp;Frizura<br>
                                   <input type="checkbox" <?php if (!empty($usluge) && in_array('Čišćenje očiju', $usluge)) echo "checked"; ?> disabled="disabled" class="izbor2">&nbsp;Čišćenje očiju<br>
                                   <input type="checkbox" <?php if (!empty($usluge) && in_array('Čišćenje ušiju', $usluge)) echo "checked"; ?> disabled="disabled" class="izbor7">&nbsp;Čišćenje ušiju<br>
                        <input type="checkbox" <?php if (!empty($usluge) && in_array('Češljanje', $usluge)) echo "checked"; ?> disabled="disabled" class="izbor8">&nbsp;Češljanje
                   
                              
                              
                              
                        </td>
                              
                        <td> 
                       <h2 class="desno flavor_text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Napomena:</h2><textarea name="napomena" style="margin-top:-10px" id="napomena" cols="30" rows="7" placeholder="Ovde unosite specijalne potrebe/zahteve" class="slike83"></textarea>
                        </td>      
                              
                              
                              
                              </tr>
               </table>
                
            </div>
               <br><br>   <br><br>   <br><br>   <br><br>   <br><br>   <br><br>   <br><br>   <br><br>  <br><br>
         <button class="button6 btn-lg" type="submit" >Zakaži</button>

        </form>       <br><br><br>
    </div>
    </div>
    <div class="col-sm-1 " >

    </div>
</div>
