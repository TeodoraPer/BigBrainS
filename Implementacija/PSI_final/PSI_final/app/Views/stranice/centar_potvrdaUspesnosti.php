<?php ?>

<div class="row divCentar">
    <div class="col-sm-2 centar">

    </div>
    <div class="col-sm-8 centar">
        <form method="post" action="<?= site_url("$controller/obradiTretman") ?>">
            <table class="table table-striped table-bordered table-responsive table-light text-center tabela1">
                <tr class="table-primary">
                    <th>Korisničko Ime</th>
                    <th>Datum i Vreme Rezervacije</th>
                    <th colspan="2">Potvrdi uspešan kraj usluge</th>
                </tr>
                <?php
                if (!empty($tretmani)) {

                    foreach ($tretmani as $tretman) {
                        echo "<tr>";
                        $korIme = "";
                        if (!empty($korisnici) && !empty($korisnici[$tretman->idKorisnik])) {
                            $korIme = $korisnici[$tretman->idKorisnik]->korisnickoIme;
                        }
                        echo "<td>{$korIme}</td>";
                        echo "<td>{$tretman->DatumVreme}</td>";
                        echo "<td><button class=\"btn btn-light btn-outline-dark dugme2\" type=\"submit\" name=\"akcija\" value=\"potvrdi!{$tretman->IdTretman}\">Potvrdi</button></td>
                    <td><button class=\"btn btn-light btn-outline-dark dugme2\" type=\"submit\" name=\"akcija\" value=\"odbij!{$tretman->IdTretman}\">Odbij</button></td>";
                        echo "</tr>";
                    }
                }
                ?>

            </table>
        </form>
        <?php
        if (empty($tretmani)) {
            echo "<i class=\"nema_salona\">Nema tretmana!</i>";
        }
        ?>
    </div>
    <div class="col-sm-2 centar">

    </div>
</div>