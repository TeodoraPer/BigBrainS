   
<div class="row divCentar">
    
    <div class="col-sm-1">

    </div>

    <div class="col-sm-10 centar">
        <div class="sredina">
            <br>

            <?php if(isset($poruka)) echo "<div class='poruka0409'>{$poruka}</div>";?>

            <?php
            /**
             * Aleksandra Dragojlović 0409/19
             * 
             * BigBrainS
             */
             if(!empty($informacije)){
                echo "<table  class='table table-striped table-bordered table-responsive table-light text-center'>
                    <tr>
                        <th class='col-sm-1 align-middle'>Ocena</th>
                        <th class='col-sm-2 align-middle'>Salon</th>
                        <th class='col-sm-2 align-middle'>Datum</th>
                        <th class='col-sm-2 align-middle'>Tretman</th>
                        <th class='col-sm-2 align-middle'>Ocenjivanje</th>
                    </tr>";
                $i=0;
                $ukupno=0;

                foreach ($informacije as $informacija) {

                    $kolT=$kolTretmana[$i];
                    $ukKolT=$ukupno+$kolT;
                    $ocena = $informacija->zbirOcena/$informacija->brojOcena;
                    $ocena=number_format($ocena,2);
                    $naziv=$informacija->naziv;
                    $IdTretman = $informacija->IdTretman;

                    echo "<tr><td class='align-middle'>{$ocena}</td><td class='align-middle'>{$informacija->naziv}</td>";

                    $niz=(str_split($informacija->DatumVreme));
                    $godina=$niz[0]."".$niz[1]."".$niz[2]."".$niz[3];
                    $mesec=$niz[5]."".$niz[6];
                    $dan=$niz[8]."".$niz[9];
                    $sat=$niz[11]."".$niz[12];
                    $minut=$niz[14]."".$niz[15];
                    echo "<td class='align-middle'>";
                    echo $mesec."/".$dan."/".$godina." ".$sat.":".$minut;
                    echo "</td>"
                    . "<td class='align-middle'>";

                    for($j=$ukupno;$j<$ukKolT;$j++){
                        echo "{$sveUsluge[$j]}<br>";
                    }
                    $ukupno+=$kolT;

                    echo "</td>";
                    echo "<form action='". site_url("$controller/ocenjivanjePrekoPregledaIstorijeUsluga/{$naziv}/{$IdTretman}/{$informacija->IdSalon}")."' method='post'>";
                    echo "<input type='hidden'>";

                    echo "<td class='align-middle'><button type='submit' class='btn btn-warning btn-sm' name='.{$informacija->IdTretman}.' id='.{$informacija->IdTretman}.'>Oceni i ostavi recenziju</button></td></tr>";
                    echo "</form>";
                    $i++;
                }
                echo '</table>';
             }
            ?>
            <br>
            <hr class="linija">
        </div>
    </div>
    <div class="col-sm-1"></div>
</div>

        
   


