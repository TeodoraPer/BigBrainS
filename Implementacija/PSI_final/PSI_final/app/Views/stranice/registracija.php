<?php
// Teodora Peric 0283/18 forma za registraciju html, js, jQuery
// Teodora Peric 0283/18 dodat php 
?>
   <div class="row divCentar">
            <div class="col-sm-1 " >

            </div>
            <div class="col-sm-10 centar" >
              <div class="sredina">
              
                   
                        <p style="font-size:18pt">Izaberite tip korisnika</p>
                        <input type="radio" name="tip" id="korisnikRadioButton" checked="checked" ><label for="korisnikRadioButton">&nbsp;Korisnik</label>
                        &nbsp;&nbsp; 
                        <input type="radio" name="tip" id="salonRadioButton" ><label for="salonRadioButton">&nbsp;Salon</label>
                        &nbsp;&nbsp; 
                        <input type="radio" name="tip" id="menadzerRadioButton"  ><label for="menadzerRadioButton">&nbsp;Menadžer</label>

         <?php if(isset($poruka)) echo "<p class='porukica3 alert' role='alert'>$poruka</p><br>"; ?>

                            
            <!--Ovo je forma za korisnika-->
            <div class="registracija" id="korisnik">
                     <form  name="korisnikovaForma" enctype= "multipart/form-data" action="<?= site_url("Gost/registracijaSubmitKorisnik") ?>" method="post" >
                        <table class="text-center tabela" style="margin-top:30px;" cellpadding="5px">
                            <tr >
                                <td colspan="2" class="porukica2 error">
                                     <?php if(!empty($errors['imeKorisnik'])) 
                                          echo $errors['imeKorisnik'];?>&nbsp;
                                    </td>
                            </tr>
                            <tr >
                                <td class="desno" > Ime:</td>
                                <td> <input class="inpt3 " type="text"   name="imeKorisnik"  value="<?php if(isset($resetujSve)||!empty($errors['imeKorisnik'])) echo "" ;else echo set_value("imeKorisnik") ?>"
                                           placeholder="Ime" ></td>
                            </tr>
        
                            <tr >
                                <td colspan="2" class="porukica2 error">
                                      <?php if(!empty($errors['prezimeKorisnik'])) 
                                          echo $errors['prezimeKorisnik']; else echo " "
                                     ?>&nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td class="desno" >Prezime:</td>
                                <td>   <input class="inpt3 " type="text" placeholder="Prezime" name="prezimeKorisnik"  value="<?php if(isset($resetujSve)||!empty($errors['prezimeKorisnik'])) echo ""; else echo set_value('prezimeKorisnik') ?>"
                                          ></td>
                            </tr>
        
                            <tr > 
                                <td colspan="2" class="porukica2 error"> 
                                    <?php if(!empty($errors['korisnickoImeKorisnik'])) 
                                          echo $errors['korisnickoImeKorisnik']; else echo " "
                                     ?>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="desno"> Korisničko ime</td>
                                <td>       <input class="inpt3 " type="text"  placeholder="Korisničko ime" name="korisnickoImeKorisnik"  
                                                  value="<?php if((isset($resetuj)&& str_contains($resetuj,'korisnickoImeKorisnik')) ||isset($resetujSve)||(!empty($errors['korisnickoImeKorisnik'])))
                                                  echo ""; else echo set_value('korisnickoImeKorisnik') ?>"
                                            ></td>
                            </tr>
        
                            <tr > 
                                 <td colspan="2" class="porukica2 error">
                                     <?php if(!empty($errors['emailKorisnik'])) 
                                          echo $errors['emailKorisnik']; else echo " "
                                     ?>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="desno"> Email:</td>
                                <td>   <input class="inpt3 " type="text" placeholder="email@gmail.com" name="emailKorisnik"  value="<?php if((isset($resetuj)&& str_contains($resetuj,'emailKorisnik')) ||isset($resetujSve)
                                        ||(!empty($errors['emailKorisnik'])))
                                                  echo ""; else echo set_value('emailKorisnik') ?>"
                                          ></td>
                            </tr>
        
                            <tr > 
                              <td colspan="2" class="porukica2 error">
                                <?php if(!empty($errors['brojTelefonaKorisnik'])) 
                                          echo $errors['brojTelefonaKorisnik']; else echo " "
                                     ?>&nbsp;</td>
                             </tr>
                             <tr>
                             <td class="desno"> Broj telefona:</td>
                               <td>   <input class="inpt3 " type="text" placeholder="+381" name="brojTelefonaKorisnik"  value="<?php if((isset($resetuj)&& str_contains($resetuj,'brojTelefonaKorisnik')) ||isset($resetujSve)||(!empty($errors['brojTelefonaKorisnik'])))
                                                  echo ""; else echo set_value('brojTelefonaKorisnik') ?>"
                                          ></td>
                              </tr>
        
                              <tr > 
                                <td colspan="2" class="porukica2 error">
                                  <?php if(!empty($errors['adresaKorisnik'])) 
                                          echo $errors['adresaKorisnik']; else echo " "
                                     ?>&nbsp;</td>
                              </tr>
                              <tr>
                                 <td class="desno"> Adresa:</td>
                               <td>   <input class="inpt3 " type="text" placeholder="Adresa" name="adresaKorisnik"  value="<?php if(isset($resetujSve)||!empty($errors['adresaKorisnik'])) echo ""; else echo set_value('adresaKorisnik') ?>"
                                            ></td>
                              </tr>
        
                              <tr > 
                              <td colspan="2" class="porukica2 error">&nbsp;</td>
                             </tr>
                              <tr>
                                 <td class="desno"> Pol:</td>
                                <td style="text-align:left;"> 
                                    <input style="margin-left: -80px;" type="radio" id="m1" name="polKorisnik" value="M" checked>
                                 <label for="m1">&nbsp;M</label>&nbsp;&nbsp;&nbsp;&nbsp;
                              <input type="radio" id="z1 "name="polKorisnik" value="Ž"> 
                                 <label for="z1">&nbsp;Ž</label></td>
                             </tr>
        
                        <tr > 
                          <td colspan="2" class="porukica2 error">
                          <?php if(!empty($errors['lozinkaKorisnik'])) 
                                          echo $errors['lozinkaKorisnik']; else echo " "
                                     ?>&nbsp;
                          </td>
                         </tr>
                           <tr>
                              <td class="desno"> Lozinka:</td>
                             <td>   <input class="inpt3 " type="password" placeholder="Lozinka"  name="lozinkaKorisnik"  value="<?php if(isset($resetujSve)||!empty($errors['lozinkaKorisnik'])) echo set_value("");?>"
                                         ></td>
                           </tr>
        
             
                            <tr > 
                              <td colspan="2" class="porukica2 error" > 
                                  <?php if(!empty($errors['potvrdaLozinkeKorisnik'])) 
                                          echo $errors['potvrdaLozinkeKorisnik']; else echo " "
                                     ?>&nbsp;</td>
                                </tr>
                             <tr>
                              <td class="desno"> Potvrda lozinke:</td>
                             <td>   <input class="inpt3 " type="password" placeholder="Potvrda lozinke" name="potvrdaLozinkeKorisnik"  value="<?php if(isset($resetujSve)||!empty($errors['potvrdaLozinkeKorisnik']))echo set_value("");?>"
                                            ></td>
                              </tr>
                           
                          </table>
                             
                         <br><br>
                        <div class="PromenaLozinke_dugme">
                            <button type="submit"  name="submitKorisnik" class="button1">ZAVRŠI REGISTRACIJU</button>
                            <button type="submit" class="button1" name="resetKorisnik"  formnovalidate id="resetujFormuKorisnik"    >RESETUJ FORMU</button>
                          </div>
                    </form>
                    </div>
                 
  <!--Ovo je forma za menadzera-->
            <div class="registracija" id="menadzer">
                     <form  name="menadzerovaForma" enctype= "multipart/form-data" action="<?= site_url("Gost/registracijaSubmitMenadzer") ?>" method="post" >
                        <table class="text-center tabela" style="margin-top:30px;" cellpadding="5px">
                            <tr >
                                <td colspan="2" class="porukica2 error">
                                     <?php if(!empty($errorsMenadzer['imeMenadzer'])) 
                                          echo $errorsMenadzer['imeMenadzer'];?>&nbsp;
                                    </td>
                            </tr>
                            <tr >
                                <td class="desno" > Ime:</td>
                                <td> <input class="inpt3 " type="text"   name="imeMenadzer"  value="<?php if(isset($resetujSveM)||!empty($errorsMenadzer['imeMenadzer'])) echo "" ;else echo set_value("imeMenadzer") ?>"
                                           placeholder="Ime" ></td>
                            </tr>
        
                            <tr >
                                <td colspan="2" class="porukica2 error">
                                      <?php if(!empty($errorsMenadzer['prezimeMenadzer'])) 
                                          echo $errorsMenadzer['prezimeMenadzer']; else echo " "
                                     ?>&nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td class="desno" >Prezime:</td>
                                <td>   <input class="inpt3 " type="text" placeholder="Prezime" name="prezimeMenadzer"  value="<?php if(isset($resetujSveM)||!empty($errorsMenadzer['prezimeMenadzer'])) echo ""; else echo set_value('prezimeMenadzer') ?>"
                                          ></td>
                            </tr>
        
                            <tr > 
                                <td colspan="2" class="porukica2 error"> 
                                    <?php if(!empty($errorsMenadzer['korisnickoImeMenadzer'])) 
                                          echo $errorsMenadzer['korisnickoImeMenadzer']; else echo " "
                                     ?>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="desno"> Korisničko ime</td>
                                <td>       <input class="inpt3 " type="text"  placeholder="Korisničko ime" name="korisnickoImeMenadzer"  
                                                  value="<?php if((isset($resetuj)&& str_contains($resetuj,'korisnickoImeMenadzer')) ||isset($resetujSveM)||(!empty($errorsMenadzer['korisnickoImeMenadzer'])))
                                                  echo ""; else echo set_value('korisnickoImeMenadzer') ?>"
                                            ></td>
                            </tr>
        
                            <tr > 
                                 <td colspan="2" class="porukica2 error">
                                     <?php if(!empty($errorsMenadzer['emailMenadzer'])) 
                                          echo $errorsMenadzer['emailMenadzer']; else echo " "
                                     ?>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="desno"> Email:</td>
                                <td>   <input class="inpt3 " type="text" placeholder="email@gmail.com" name="emailMenadzer"  value="<?php if((isset($resetuj)&& str_contains($resetuj,'emailMenadzer')) ||isset($resetujSveM)
                                        ||(!empty($errorsMenadzer['emailMenadzer'])))
                                                  echo ""; else echo set_value('emailMenadzer') ?>"
                                          ></td>
                            </tr>
        
                            <tr > 
                              <td colspan="2" class="porukica2 error">
                                <?php if(!empty($errorsMenadzer['brojTelefonaMenadzer'])) 
                                          echo $errorsMenadzer['brojTelefonaMenadzer']; else echo " "
                                     ?>&nbsp;</td>
                             </tr>
                             <tr>
                             <td class="desno"> Broj telefona:</td>
                               <td>   <input class="inpt3 " type="text" placeholder="+381" name="brojTelefonaMenadzer"  value="<?php if((isset($resetuj)&& str_contains($resetuj,'brojTelefonaMenadzer')) ||isset($resetujSveM)||(!empty($errorsMenadzer['brojTelefonaMenadzer'])))
                                                  echo ""; else echo set_value('brojTelefonaMenadzer') ?>"
                                          ></td>
                              </tr>
        
                              <tr > 
                                <td colspan="2" class="porukica2 error">
                                  <?php if(!empty($errorsMenadzer['adresaMenadzer'])) 
                                          echo $errorsMenadzer['adresaMenadzer']; else echo " "
                                     ?>&nbsp;</td>
                              </tr>
                              <tr>
                                 <td class="desno"> Adresa:</td>
                               <td>   <input class="inpt3 " type="text" placeholder="Adresa" name="adresaMenadzer" 
                                             value="<?php if(isset($resetujSveM)||!empty($errorsMenadzer['adresaMenadzer'])) echo ""; else echo set_value('adresaMenadzer') ?>"
                                            ></td>
                              </tr>
        
                              <tr > 
                              <td colspan="2" class="porukica2 error">&nbsp;</td>
                             </tr>
                              <tr>
                                 <td class="desno"> Pol:</td>
                                <td style="text-align:left;"> 
                                    <input style="margin-left: -80px;" type="radio" id="m1" name="polMenadzer" value="M" checked>
                                 <label for="m1">&nbsp;M</label>&nbsp;&nbsp;&nbsp;&nbsp;
                              <input type="radio" id="z1 "name="polMenadzer" value="Ž"> 
                                 <label for="z1">&nbsp;Ž</label></td>
                             </tr>
        
                        <tr > 
                          <td colspan="2" class="porukica2 error">
                          <?php if(!empty($errorsMenadzer['lozinkaMenadzer'])) 
                                          echo $errorsMenadzer['lozinkaMenadzer']; else echo " "
                                     ?>&nbsp;
                          </td>
                         </tr>
                           <tr>
                              <td class="desno"> Lozinka:</td>
                             <td>   <input class="inpt3 " type="password" placeholder="Lozinka"  name="lozinkaMenadzer"  value="<?php if(isset($resetujSveM)||!empty($errorsMenadzer['lozinkaMenadzer'])) echo set_value("");?>"
                                         ></td>
                           </tr>
        
             
                            <tr > 
                              <td colspan="2" class="porukica2 error" > 
                                  <?php if(!empty($errorsMenadzer['potvrdaLozinkeMenadzer'])) 
                                          echo $errorsMenadzer['potvrdaLozinkeMenadzer']; else echo " "
                                     ?>&nbsp;</td>
                                </tr>
                             <tr>
                              <td class="desno"> Potvrda lozinke:</td>
                             <td>   <input class="inpt3 " type="password" placeholder="Potvrda lozinke" name="potvrdaLozinkeMenadzer"  value="<?php if(isset($resetujSveM)||!empty($errorsMenadzer['potvrdaLozinkeMenadzer'])) echo set_value("");?>"
                                            ></td>
                              </tr>
                           
                          </table>
                             
                         <br><br>
                        <div class="PromenaLozinke_dugme">
                            <button type="submit"  name="submitMenadzer" class="button1">ZAVRŠI REGISTRACIJU</button>
                            <button type="submit" class="button1" name="resetMenadzer"  formnovalidate id="resetujFormuMenadzer"    >RESETUJ FORMU</button>
                          </div>
                    </form>
                    </div>
                 


                    <!--Ovo je forma za salon-->
               <div class="" id="salon">
                        <form name="salonovaForma" enctype= "multipart/form-data" action="<?= site_url("Gost/registracijaSubmitSalon") ?>" method="post">
                            <div class="registracijaSalon" style="margin-left:120px" >
                            <table class="text-center tabela" style="margin-top:30px; margin-left: 15px; text-align: left;"  cellpadding="5px">
                                <tr >
                                    <td colspan="2" class="porukica2 error">
                                        <?php if(!empty($errorsSalon['nazivSalon'])) 
                                          echo $errorsSalon['nazivSalon']; else echo " "
                                     ?>&nbsp;</td>
                                </tr>
                                <tr >
                                    <td class="desno" > Naziv:</td>
                                    <td> <input class="inpt3 " type="text" placeholder="Naziv" name="nazivSalon" 
                                                value="<?php if(isset($resetujSveS)||!empty($errorsSalon['nazivSalon'])) echo "" ;else echo set_value("nazivSalon") ?>"></td>
                                </tr>
        
                                <tr > 
                                    <td colspan="2" class="porukica2 error"> <?php if(!empty($errorsSalon['korisnickoImeSalon'])) 
                                          echo $errorsSalon['korisnickoImeSalon']; else echo " "
                                     ?>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="desno"> Korisničko ime</td>
                                    <td>       <input class="inpt3 " type="text"   placeholder="Korisničko ime" 
                                                     name="korisnickoImeSalon" 
                                                     value="<?php if((isset($resetuj)&& str_contains($resetuj,'korisnickoImeSalon')) 
                                                             ||isset($resetujSveS)||(!empty($errorsSalon['korisnickoImeSalon'])))
                                                  echo ""; else echo set_value('korisnickoImeSalon') ?>"
                                                      ></td>
                                </tr>
            
                                <tr > 
                                     <td colspan="2" class="porukica2 error">
                                         <?php if(!empty($errorsSalon['emailSalon'])) 
                                          echo $errorsSalon['emailSalon']; else echo " "
                                     ?>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="desno"> Email:</td>
                                    <td>   <input class="inpt3 " type="text" placeholder="email@gmail.com" name="emailSalon"
                                                  value="<?php if((isset($resetuj)&& str_contains($resetuj,'emailSalon')) 
                                                             ||isset($resetujSveS)||(!empty($errorsSalon['emailSalon'])))
                                                  echo ""; else echo set_value('emailSalon') ?>"
                                                    
                                                  ></td>
                                </tr>
            
                                <tr > 
                                  <td colspan="2" class="porukica2 error">
                                     <?php if(!empty($errorsSalon['brojTelefonaSalon'])) 
                                          echo $errorsSalon['brojTelefonaSalon']; else echo " "
                                     ?>&nbsp;
                                      </td>
                                 </tr>
                                 <tr>
                                 <td class="desno"> Broj telefona:</td>
                                   <td>   <input class="inpt3 " type="text" placeholder="+381"
                                                 name="brojTelefonaSalon"
                                                    value="<?php if((isset($resetuj)&& str_contains($resetuj,'brojTelefonaSalon')) 
                                                             ||isset($resetujSveS)||(!empty($errorsSalon['brojTelefonaSalon'])))
                                                  echo ""; else echo set_value('brojTelefonaSalon') ?>"
                                                 ></td>
                                  </tr>
            
                                  <tr > 
                                    <td colspan="2" class="porukica2 error">  <?php if(!empty($errorsSalon['adresaSalon'])) 
                                          echo $errorsSalon['adresaSalon']; else echo " "
                                     ?>&nbsp;</td>
                                  </tr>
                                  <tr>
                                     <td class="desno"> Adresa:</td>
                                     <td>   <input class="inpt3" type="text" placeholder="Adresa" name="adresaSalon" 
                                                        value="<?php if(isset($resetujSveS)||!empty($errorsSalon['adresaSalon'])) echo ""; else echo set_value('adresaSalon') ?>"
                                                   ></td>
                                  </tr>

                            <tr > 
                              <td colspan="2" class="porukica2 error"> <?php if(!empty($errorsSalon['lozinkaSalon'])) 
                                          echo $errorsSalon['lozinkaSalon']; else echo " "
                                     ?>&nbsp;</td>
                             </tr>
                               <tr>
                                  <td class="desno"> Lozinka:</td>
                                 <td>   <input class="inpt3 " type="password" placeholder="Lozinka" name="lozinkaSalon" value="<?php if(isset($resetujSveS)||!empty($errorsSalon['lozinkaSalon'])) echo set_value("");?>"></td>
                               </tr>
            
                                <tr > 
                                  <td colspan="2" class="porukica2 error"><?php if(!empty($errorsSalon['potvrdaLozinkeSalon'])) 
                                          echo $errorsSalon['potvrdaLozinkeSalon']; else echo " "
                                     ?>&nbsp;</td>
                                    </tr>
                                 <tr>
                                  <td class="desno"> Potvrda lozinke</td>
                                 <td>   <input class="inpt3 " type="password" placeholder="Potvrda lozinke" name="potvrdaLozinkeSalon"value="<?php if(isset($resetujSveS)||!empty($errorsSalon['potvrdaLozinkeSalon'])) echo set_value("");?>"></td>
                                  </tr>
                              </table>

                            </div>

                            <div class="registracijaSalon2"  id="salon2" style="margin-left: 120px; margin-top:-18px;" >
                                <table class="text-center tabela" style="margin-top:30px;" cellpadding="5px">
                                    <tr >
                                        <td colspan="2" class="porukica2 error">
                                            <?php if(!empty($errorsSalon['img'])) 
                                          echo $errorsSalon['img']; else echo " "
                                     ?>&nbsp;
                                        </td>
                                    </tr>
                                    <tr >
                                        <td colspan="2" class="desno" > <h2 style="font-size:12pt; ">Dodaj sliku: </h2>
                                          
                                         <div class="dodajSliku" style="margin-right:200px ;">
                                                <label id="idlabel" for="inputTag" >
                                                  Select Image <br/>
                                                  <i class="fa fa-2x fa-camera"></i>
                                                  <input id="inputTag" type="file" name="img" style="height: 300px" 
                                                             value="<?php if(isset($resetujSveS)||!empty($errorsSalon['img'])) echo ""; else echo set_value('img') ?>"
                                                         
                                                         />
                                                  <br/>
                                                  <span id="imageName"></span>
                                                </label>
                                              </div></td>
                                      
                                    </tr>
                                </table>
                                <br></div>
                                
                            <div class="registracijaSalon3" style="margin-left:  540px; margin-top: -610px" id="salon2">
                                <h2 style="font-size:12pt; text-align:left; padding-top: 30px; margin-left:10px">Radno vreme:</h2>
                                <table class="text-center tabela" style="margin-top:-15px; margin-left: 15px;" cellpadding="5px">
                                    <tr > 
                                        <td colspan="2" class="porukica2 error"> 
                                            <?php if(!empty($errorsSalon['ponPetakOd'])) 
                                          echo $errorsSalon['ponPetakOd']; else echo " ";
                                          
                                     ?>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align:left;">Ponedeljak-Petak <input class="inpt2 "type="time"  id="od" placeholder="OD" 
                                                                                                         name="ponPetakOd"   value="<?php if(isset($resetujSveS)||!empty($errorsSalon['ponPetakOd'])) echo ""; else echo set_value('ponPetakOd') ?>">
                                         &nbsp;&nbsp; Do  <input class="inpt2 "type="time" value="<?php if(isset($resetujSveS)||!empty($errorsSalon['ponPetakOd'])) echo ""; else echo set_value('ponPetakDo') ?>" id="do"  placeholder="DO" name="ponPetakDo"></td>
                                    </tr>
                                    
                                     <tr > 
                                        <td colspan="2" class="porukica2 error"> 
                                            <?php if(!empty($errorsSalon['subotaOd'])) 
                                          echo $errorsSalon['subotaOd']; else echo " ";
                                          
                                     ?>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="desno">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Subota&nbsp;<input class="inpt2 "type="time"   placeholder="OD" name="subotaOd">
                                         &nbsp;&nbsp; Do  <input class="inpt2 "type="time"   placeholder="DO" name="subotaDo"></td>
                                    </tr>
                
                                    
                                       <tr > 
                                        <td colspan="2" class="porukica2 error"> 
                                            <?php if(!empty($errorsSalon['nedeljaOd'])) 
                                          echo $errorsSalon['nedeljaOd']; else echo " ";
                                         
                                     ?>&nbsp;</td>
                                    </tr>
                                   <tr>
                                       <td colspan="2" class="desno">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nedelja <input class="inpt2 "type="time"   placeholder="OD" name="nedeljaOd">
                                        &nbsp;&nbsp; Do  <input class="inpt2 "type="time"   placeholder="DO" name="nedeljaDo"></td>
                                   </tr>
                                 
                                   
                                  </table>
    

                                </div>
                                <div class="" style="margin-left:  540px; margin-top: 30px" id="salon2">
                               
                                    <table class="tabela registracijaSalon4" style="margin-left:2px; margin-top:-15px; text-align: left;" cellpadding="7px"  id="dodavanjeUslugaTabela">
                                        <tr>
                                            <td colspan="4">     <h2 style="font-size:12pt; text-align:left; padding-top: 10px; margin-left:10px">Cene:</h2></td>
                                        </tr>
                                    
                                            <tr style=" position: relative;
                                            top: -19px;">
                                                <td>&nbsp; Izbor usluga</td>
                                                <td>Mali pas <br>(do 2kg)</td>
                                                <td>Srednji pas (2kg-10kg) </td>
                                                <td>Veliki pas (preko 10kg)</td>
                                            </tr>
                                            
                                            <tr style=" position: relative;
                                            top: -25px; left:10px" id="red0">
                                                <td  id="ubaciPrvo0">
                                                <select class="inpt4" name="izborUsluga0" style=" width: 220px;" id="izborUsluga0" >
                                                    <option name="nista0" id="nista0" value="izaberi">Izaberite uslugu</option>
                                                    <option  name="opcija0_0" id="opcija0_0">Šišanje</option>
                                                    <option name="opcija0_1" id="opcija0_1">Ćišćenje ušiju</option>
                                                    <option name="opcija0_2" id="opcija0_2">Kupanje</option>
                                                    <option name="opcija0_3" id="opcija0_3">Frizura</option>
                                                    <option name="opcija0_4" id="opcija0_4">Čišćenje očiju</option>
                                                    <option name="opcija0_5" id="opcija0_5">Sređivanje noktiju</option>
                                                    <option name="opcija0_6" id="opcija0_6">Češljanje </option>
                                                </select>
                                            
                                                </td>
                                                <td id="ubaciDrugo0">
                                                    <input type="number" class="inpt4" id="cena0_0" name="cena0_0" placeholder="RSD" min="0" >
                                                 </td>
                                                <td id="ubaciTrece0"> <input class="inpt4" id="cena0_1" type="number" name="cena0_1" placeholder="RSD" min="0" ></td>
                                                 <td id="ubaciCetvrto0" class="menjajTabela">
                                                     <input type="number"  class="inpt4" id="cena0_2" name="cena0_2" placeholder="RSD" min="0" >
                                                 </td>
                                            </tr>
                                   
                                       
                                      </table>
                                                <div class="porukica error">  <?php if(!empty($errorsSalon['usluga0'])) 
                                          echo $errorsSalon['usluga0']; else echo " "
                                     ?>&nbsp;
                                            </div>
    
                                
                                    </div>
                                    <br>
                                    <div style="margin-left:460px ; margin-top: 30px;">
                                        <input type="button" class="button3"  id="dugmeZaUslugu" onclick="dodajUsluguSalonaPriRegistraciji()" value="Dodaj uslugu">
                                        <input type="button" class="button3" id="dugmeZaUkloniUslugu"  onclick="sakrijRed()" value="Ukloni uslugu">
                                        <div ><font color='red' id="porukaUslugeGreska">
                                            </font></div>
                                        <div class="porukica error">  <?php if(!empty($errorsSalon['ispravnostUsluge'])) 
                                          echo $errorsSalon['ispravnostUsluge']; else echo " "
                                     ?>&nbsp;</div>
                                    </div>
                                    <br>  <br> 
                                    <div class="PromenaLozinke_dugme">
                                        <button type="submit" class="button1" name="submitSalon" onclick="kliknuoRegistracijaSalon()">ZAVRŠI REGISTRACIJU</button>
                                        <button type="submit" class="button1"  name="resetSalon" formnovalidate id="resetujFormuSalon" >RESETUJ FORMU</button>
                                      </div>   
                                    <input type="hidden" id="daLiJeSveIspravnoKodUsluga" name="daLiJeSveIspravnoKodUsluga">
                                      <input type="hidden" name="loseVremePonPetak">
                                      
                                      <input type="hidden" name="izborUslugaS0" id="izborUslugaS0">
                                  <input type="hidden" name="izborUslugaS1" id="izborUslugaS1">
                                  <input type="hidden" name="izborUslugaS2" id="izborUslugaS2">
                                  <input type="hidden" name="izborUslugaS3" id="izborUslugaS3">
                                  <input type="hidden" name="izborUslugaS4" id="izborUslugaS4">
                                  <input type="hidden" name="izborUslugaS5" id="izborUslugaS5">
                                  <input type="hidden" name="izborUslugaS6" id="izborUslugaS6">
                                  
                                  
                                  <input type="hidden" name="cenaS0_0" id="cenaS0_0">
                                  <input type="hidden" name="cenaS0_1" id="cenaS0_1">
                                  <input type="hidden" name="cenaS0_2" id="cenaS0_2">
                                  <input type="hidden" name="cenaS1_0" id="cenaS1_0">
                                  <input type="hidden" name="cenaS1_1" id="cenaS1_1">
                                  <input type="hidden" name="cenaS1_2" id="cenaS1_2">
                                  <input type="hidden" name="cenaS2_0" id="cenaS2_0">

                                  <input type="hidden" name="cenaS2_1" id="cenaS2_1">
                                  <input type="hidden" name="cenaS2_2" id="cenaS2_2">
                                  <input type="hidden" name="cenaS3_0" id="cenaS3_0">
                                  <input type="hidden" name="cenaS3_1" id="cenaS3_1">
                                  <input type="hidden" name="cenaS3_2" id="cenaS3_2">
                                  <input type="hidden" name="cenaS4_0" id="cenaS4_0">
                                  <input type="hidden" name="cenaS4_1" id="cenaS4_1">

                                  <input type="hidden" name="cenaS4_2" id="cenaS4_2">
                                  <input type="hidden" name="cenaS5_0" id="cenaS5_0">
                                  <input type="hidden" name="cenaS5_1" id="cenaS5_1">
                                  <input type="hidden" name="cenaS5_2" id="cenaS5_2">
                                  <input type="hidden" name="cenaS6_0" id="cenaS6_0">
                                  <input type="hidden" name="cenaS6_1" id="cenaS6_1">
                                  <input type="hidden" name="cenaS6_2" id="cenaS6_2">
                                  
                       </form>
                     
                       
                      
                    </div>



                  <br><br><br><br><br><br>
                <hr class="linija">
              </div>
            </div>
            <div class="col-sm-1 " >
            </div>
         
        </div>