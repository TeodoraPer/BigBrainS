<?php ?>

<div class="row divCentar">
    <div class="col-sm-1 " >

    </div>
    <div class="col-sm-10 centar" >
        <form method="post" action="<?= site_url("$controller/zavrsiZakazivanje") ?>">
            <table class="text-left" style="width: 100%;">
                <tr>
                    <td><label for="rasa" class="slike13">Rasa&nbsp;&nbsp;</label><select name="rasa" id="rasa">
                            <option value="buldog">Buldog</option>
                            <option value="labrador">Labrador</option>
                            <option value="pudlica">Pudlica</option>
                            <option value="si-cu">Ši-cu</option>
                            <option value="bigl">Bigl</option>
                            <option value="civava">Čivava</option>
                            <option value="mesanac">Mešanac</option>
                            <option value="drugo">Drugo</option>
                        </select></td>
                    <td><label for="usluge" class="usluge uslugensv">Izabrane usluge<br><br></label>

                        
                    </td>
                </tr>
                <tr>
                    <td><label for="godine" class="slike13">Godine&nbsp;&nbsp;</label>
                        <input type="text" name="godine" placeholder="Broj godina"></td>
                    <td>
                        <input type="checkbox" <?php if (!empty($usluge) && in_array('sisanje', $usluge)) echo "checked"; ?> disabled="disabled" class="izbor2 zasisanje">&nbsp;Šišanje</td>
                </tr>
                <tr>
                    <td><label for="ime" class="slike23">Ime&nbsp;&nbsp;</label>
                        <input type="text" name="ime" placeholder="Ime"></td>
                    </td>
                    <td>
                        <input type="checkbox" <?php if (!empty($usluge) && in_array('nokti', $usluge)) echo "checked"; ?> disabled="disabled" class="izbor2">&nbsp;Skraćivanje noktiju
                        </td>
                </tr>
                <tr>
                    <td> <label for="vreme" class="slike33">Datum i vreme&nbsp;&nbsp;&nbsp;</label>
                        <input type="datetime-local" id="vreme" name="vreme" placeholder=""></td>
                    <td><input type="checkbox" <?php if (!empty($usluge) && in_array('kupanje', $usluge)) echo "checked"; ?> disabled="disabled" class="izbor2">&nbsp;Kupanje
                        </td>

                </tr>
                <tr>
                    <td><label for="velicina" class="slike43">Veličina&nbsp;&nbsp;</label>
                        <select name="velicina" name="velicina" id="velicina">
                            <option value="mali">Mali pas</option>
                            <option value="srednji">Srednji pas</option>
                            <option value="veliki">Veliki pas</option>
                        </select>
                    </td>
                    <td><input type="checkbox" <?php if (!empty($usluge) && in_array('frizura', $usluge)) echo "checked"; ?> disabled="disabled" class="izbor2">&nbsp;Frizura
                        </td>
                </tr>
                <tr>
                    <td><label for="napomena" class="slike53">Napomena&nbsp;&nbsp;</label><textarea name="napomena" id="napomena" cols="23" rows="2" placeholder="Ovde unosite specijalne potrebe/zahteve" class="slike83"></textarea></td>
                    <td>
                        <input type="checkbox" <?php if (!empty($usluge) && in_array('oci', $usluge)) echo "checked"; ?> disabled="disabled" class="izbor2">&nbsp;Čišćenje očiju<br>
                        <input type="checkbox" <?php if (!empty($usluge) && in_array('ciscenje_usiju', $usluge)) echo "checked"; ?> disabled="disabled" class="izbor7">&nbsp;Čišćenje ušiju<br>
                        <input type="checkbox" <?php if (!empty($usluge) && in_array('cesljanje', $usluge)) echo "checked"; ?> disabled="disabled" class="izbor8">&nbsp;Češljanje
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><button class="btn btn-light btn-outline-dark dugme33" type="submit">Zakaži</button></td>

                </tr>

                <tr>
                    <td colspan="2" class="porukica2 error">
                        <?php
                        if (!empty($greska))
                            echo $greska;
                        else
                            echo "&nbsp;"
                            ?>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="col-sm-1 " >

    </div>
</div>
