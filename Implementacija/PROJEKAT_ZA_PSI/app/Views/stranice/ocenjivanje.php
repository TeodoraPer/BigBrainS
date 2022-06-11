
<div class="row divCentar">

    <div class="col-sm-1"></div>

    <div class="col-sm-10 centar">
        <br>
         <?php echo anchor("$controller/istorija_usluga", "Idi nazad",'class="button3" '); ?>   
        <div class="sredina_0409">
            <div class="ocenjivanje">

                <br>
                 <?php echo "<b>{$naziv}</b>";?>

                <br><br>

                <form action="<?= site_url("$controller/oceni/{$IdSalon}/{$IdTretman}/{$naziv}") ?>" method="post">
                    <table class="sredina_0409">
                        <tr>
                            
                            <td colspan="3" style="color:orange;">
                                <?php
                                    if(isset($porukaOcena))
                                        echo "{$porukaOcena}!";
                                    else echo "&nbsp;";?>
                            </td>
                        </tr>

                        <tr>

                            <td class="redovi" style="text-align: left;" >&nbsp;Ocena</td>
                            <td > 
                                <label class="rating">

                                    <input
                                      class="rating rating--nojs"
                                      max="5"
                                      step="1"
                                      type="range"
                                      value="0"
                                      name="ocena">
                                </label>


                            </td>
                            <td class="redovi3 align-middle" style="display:inline;">
                                <input type="submit" value="Oceni" class="btn btn-warning " id="oceni" style="text-align: right;"> 
                                <div style="display:inline;">&emsp;&emsp;</div>

                            </td>

                        </tr>
                    </table>
                </form>
                <form action="<?= site_url("$controller/recenzija/{$IdSalon}/{$naziv}/{$IdTretman}") ?>" method="post">
                    <table>
                        <tr>
                            
                            <td colspan="3" style="color:orange;"><?php if(isset($porukaRecenzija)) echo "{$porukaRecenzija}!"; 
                                                                        else echo "&nbsp;";?></td>
                        </tr>
                        <tr>

                            <td class="redovi1"  style="text-align: left;">&nbsp;Recenzija</td>
                            <td class="redovi2"><textarea name="recenzija" id="recenzija" cols="30" rows="10" placeholder="Ostavite recenziju..."></textarea></td>
                            <td class=" redovi2" style="text-align: right;"><input type="submit" value="Pošalji" class="btn btn-warning"></td>
                            

                        </tr>
                        
                    </table>
                </form>
            </div>

        </div>
    </div>
    <div class="col-sm-1"></div>
</div>
            


