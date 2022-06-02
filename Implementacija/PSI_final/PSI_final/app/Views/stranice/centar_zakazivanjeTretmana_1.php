<?php ?>

<div class="row divCentar">
    <div class="col-sm-1 " >

    </div>
    <div class="col-sm-10 centar" >
        <div class="sredina">                 
            <form method="post" action="<?= site_url("$controller/pretragaPoUslugama") ?>">

                <br>
                <label for = "slika1" class = "slike1"><i>Šišanje<br></i><input type = "checkbox" name="usluge[]" value="sisanje" class = "cekbox"></label>
                <img src = "/images/sisanje.png" name = "slika1" class = "slika" id = "slika1">

                <label for = "slika2" class = "slike2"><i>Čišćenje ušiju<br></i><input type = "checkbox" name="usluge[]" value="ciscenje_usiju" class = "cekbox2"></label>
                <img src = "/images/usi.png" name = "slika2" class = "slika" id = "slika2"><br>

                <label for = "slika3" class = "slike3"><i>Kupanje<br></i><input type = "checkbox" name="usluge[]" value="kupanje" class = "cekbox3"></label>
                <img src = "/images/kupanje.png" name = "slika3" class = "slika" id = "slika3">

                <label for = "slika4" class = "slike4"><i>Frizura<br></i><input type = "checkbox" name="usluge[]" value="frizura" class = "cekbox"></label>
                <img src = "/images/frizura.png" name = "slika4" class = "slika" id = "slika4">

                <label for = "slika5" class = "slike5"><i>Čišćenje očiju<br></i><input type = "checkbox" name="usluge[]" value="oci" class = "cekbox"></label>
                <img src = "/images/oci.png" name = "slika5" class = "slika" id = "slika5"><br>

                <label for = "slika6" class = "slike6"><i>Sređivanje noktiju<br></i><input type = "checkbox" name="usluge[]" value="nokti" class = "cekbox6"></label>
                <img src = "/images/nokti.png" name = "slika6" class = "slika" id = "slika6">

                <label for = "slika7" class = "slike7"><i>Češljanje<br></i><input type = "checkbox" name="usluge[]" value="cesljanje" class = "cekbox7"></label>
                <img src = "/images/cesljanje.png" name = "slika7" class = "slika" id = "slika7">
                <button class = "btn btn-light btn-outline-dark dugme dugmedalje" type="submit">Dalje</button>
                <p class="porukica2 error" >
                    <?php
                    if (!empty($poruka))
                        echo $poruka;
                    else
                        echo "&nbsp;"
                        ?>
                </p>
            </form>
        </div>
    </div>
    <div class="col-sm-1 " >

    </div>
</div>
