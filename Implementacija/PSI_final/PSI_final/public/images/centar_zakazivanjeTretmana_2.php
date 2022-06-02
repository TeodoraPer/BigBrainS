<?php ?>

<div class="row divCentar">
    <div class="col-sm-1 " >

    </div>
    <div class="col-sm-10 centar" >
        <form method="post" action="<?= site_url("$controller/zakazivanjeUSalonu") ?>">
            <p class="naslovzaizabrane"><h3><b><i>Saloni za izabrane usluge</i></b></h3></p>
            <?php
            if (!empty($saloni)) {
                $inRow = 0;
                foreach ($saloni as $salon) {
                    $ocena = 0;
                    $ocena_str = "Nema ocena";
                    if($salon->brojOcena > 0){
                        $ocena = floor($salon->ukupanZbirOcena / $salon->brojOcena);
                        $ocena_str = str_repeat("🌟", $ocena);
                    }
                    if($inRow == 0){
                        echo "<div class=\"row\">";
                        
                    }
                    echo "<div class=\"col-sm-5\">";
                    echo "<p class=\"slike12\">{$salon->naziv}&nbsp;&nbsp;&nbsp;  Ocena: &nbsp;{$ocena_str}&nbsp; <br>";
                    echo "<img src=\"/images/{$salon->slika}\" class=\"slika\"><br>";
                    echo "<button class=\"btn btn-light btn-outline-dark dugme2\" type=\"submit\" name=\"IdSalon\" value=\"{$salon->IdSalon}\">Zakaži</button><br></p></div>";
                    
                    if($inRow == 0){
                        $inRow = 1;
                    }
                    else{
                        echo  "</div>";
                        $inRow = 0;
                    }
                }
                if($inRow == 1){
                    echo  "</div>";
                }
            }
            else{
                echo "<i class=\"nema_salona\">Nema salona!</i>";
            }
            ?>
        </form>
    </div>
    <div class="col-sm-1 " >

    </div>
</div>


