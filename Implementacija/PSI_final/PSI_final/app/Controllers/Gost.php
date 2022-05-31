<?php

// Aleksandra Dragojlovic 0409/19 funkcionalnost promena lozinke

namespace App\Controllers;

use App\Models\RegKorisnikModel;
use App\Models\KorisnikMenadzerModel;

class Gost extends BaseController { /* Perić Teodora 0283/18 
  metoda za prikaz stranice Gosta podrazumeva poziv odgovarajućih view-a.
 */

    protected function prikaz($page, $data) {
        $data['controller'] = 'Gost';

        echo view('sabloni/header_gost', $data);
        echo view("stranice/$page", $data);
        echo view('sabloni/footer');
    }

    /* Perić Teodora 0283/18 
      metoda koja se očitava pri pristupu aplikaciji sa URL-om: localhost:8080, urađene su
      promene u klasi Routes da bi se ovo omogućilo
     */

    public function index() {

        $this->prikaz('promena_lozinke', []);
    }

    public function pregled_salona() {
        $this->prikaz('centar_gost', []);
    }

    public function pregled_usluga() {
        $this->prikaz('centar_gost', []);
    }

    //Anastasija Volcanovska 0092/19
    public function login($poruka = null) {
        $this->prikaz('login', ['poruka' => $poruka]);
    }

    public function registracija() {

        $this->prikaz('centar_gost', []);
    }

    //Registracija Teodora Perić 0283/18
    public function registracijaSubmitKorisnik() {
        
    }

    public function registracijaSubmitMenadzer() {
        
    }

    public function registracijaSubmitSalon() {
        
    }

    // Aleksandra Dragojlovic 0409/19
    public function promenaLozinke($poruka = null) {

        return $this->prikaz('promena_lozinke', ['poruka' => $poruka]);
    }

    // Aleksandra Dragojlovic 0409/19
    public function promenaLozinkeObrada() {

        $korIme = $this->request->getVar('korIme');
        $staraLoz = $this->request->getVar('staraLoz');
        $novaLoz = $this->request->getVar('novaLoz');
        $potvrdaLoz = $this->request->getVar('potvrdaLoz');
        $regKorisnikModel = new RegKorisnikModel();

        $regKorisnik = $regKorisnikModel->nadjiPrekoKorIme($korIme);

        if ($regKorisnik == null)
            return $this->prikaz('promena_lozinke', ['errors' => ['korIme' => "Korisnik ne postoji!"]]);
        if ($regKorisnik->jeObrisan != 0 && $regKorisnik->jeObrisan != NULL) {
            return $this->prikaz('promena_lozinke', ['errors' => ['korIme' => "Korisnik ne postoji!"]]);
        }
        if (($regKorisnik->lozinka) != $staraLoz)
            return $this->prikaz('promena_lozinke', ['errors' => ['staraLoz' => "Neispravna vrednost stare lozinke!"]]);
        if ($novaLoz != $potvrdaLoz) {
            return $this->prikaz('promena_lozinke', ['errors' => ['potvrdaLoz' => "Nova lozinke i potvrda nisu iste!"]]);
        }


        $upit_data = [
            'lozinka' => $novaLoz
        ];
        $regKorisnikModel->update($regKorisnik->IdRK, $upit_data);

        return $this->promenaLozinke("Lozinka je uspešno promenjena!");
    }

    //Anastasija Volcanovska 0092/19
    public function loginObrada() {
        $ime = $this->request->getVar('korime');
        $lozinka = $this->request->getVar('lozinka');
        $regKorisnikModel = new RegKorisnikModel();

        $korisnik = $regKorisnikModel->nadjiPrekoKorIme($ime);

        if ($korisnik == null) {
            return $this->prikaz('login', ['errors' => ['greska' => 'Korisnik ne postoji!']]);
        }
        /*if ($korisnik->jeOdobrenZahtevZaRegistraciju == NULL || $korisnik->jeOdobrenZahtevZaRegistraciju == 0) {
            return $this->login('Korisniku jos uvek nije odobren zahtev za registraciju!');
        }*/
        if ($korisnik->jeObrisan == 1) {
            return $this->prikaz('login', ['errors' => ['greska' => 'Korisnik je obrisan!']]);
        }
        if ($korisnik->lozinka != $lozinka) {
            return $this->prikaz('login', ['errors' => ['greska' => 'Pogresna lozinka!']]);
        }

        $this->session->set('ulogovaniKorisnik', $korisnik);
        switch ($korisnik->tipKorisnika) {
            case 'A': return redirect()->to(site_url('Administrator'));
                break;
            case 'K': return redirect()->to(site_url('Korisnik'));
                break;
            case 'S': return redirect()->to(site_url('Salon'));
                break;
        }
    }

}
