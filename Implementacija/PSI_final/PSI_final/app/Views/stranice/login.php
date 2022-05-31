<?php
// Teodora Peric 0283/18 postavljanje login forme koji je dizajnirao Pavle Stefanovic 0562/18
// Anastasija Volcanovska 0092/19 izmena forme kako bi radila sa backendom
?>

<div class="row divCentar">
    <div class="col-sm-1 " >

    </div>
    <div class="col-sm-10 centar" >
        <div class="sredina">


            <div class="login">
                <form name="login_forma" method="post" action="<?= site_url("$controller/loginObrada") ?>">
                    <table cellpadding="10px">
                        <tr>
                            <td class="porukica1 error" >
                                <?php
                                if (!empty($errors['greska']))
                                    echo $errors['greska'];
                                else
                                    echo "&nbsp;"
                                    ?>
                            </td>
                        </tr>
                        <tr>
                            <td>   <input class="inpt" type="text" name="korime" id="korime" required 
                                          oninvalid="this.setCustomValidity('Morate uneti korisnicko ime!')" oninput="setCustomValidity('')" placeholder="Korisničko ime"/></td>
                        </tr>
                        <tr>
                            <td class="porukica1 error" >
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td>   <input class="inpt" type="password" name="lozinka" id="lozinka" required 
                                          oninvalid="this.setCustomValidity('Morate uneti lozinku!')" oninput="setCustomValidity('')" placeholder="Lozinka"/></td>
                        </tr>
                    </table>

                    <div class="Login_dugme">
                        <button type="submit" class="button2">LOGIN</button><br>
                        <a class="promena" href="<?= site_url("Gost/promenaLozinke") ?>">Promena lozinke</a>
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