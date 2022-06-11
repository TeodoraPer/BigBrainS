<?php
/*
    Perić Teodora 0283/18 funkcionalnost Odobravanje rezervacije
   */
namespace App\Controllers;
use App\Models\KorisnikMenadzerModel;
use App\Models\OcenioModel;
use App\Models\SalonModel;
use App\Models\TretmanModel;
use App\Models\OstavioRecenzijuModel;
use App\Models\SadrziModel;
use App\Models\UslugaModel;
use App\Models\RegKorisnikModel;
use CodeIgniter\Config\Factories;

class Salon extends BaseController
{
    /*
    Perić Teodora 0283/18 metoda za prikaz stranice Salon- početna podrazumeva poziv odgovarajućih view-a.
   */
    protected function prikaz($page,$data){ 
        $data['controller']='Salon';
        //linija koja mora da se menja kasnije kad se implementira login
       // $data['salon']='salon1 neki tamo nesto';
        echo view ('sabloni/header_salon');
        echo view("stranice/$page",$data);
        echo view ('sabloni/footer');
    }
    
     
    public function index()
    {   
        $this->prikaz('centar_salon', []);
    }
     //Ovo na dole se sve menja, ja sam bzv dodala telo metoda da bih videla da li je sve okej
    public function pregled_salona($offset=null,$vrednost=null){ 
     $this->prikaz('centar_pregled_salona', ['offset'=>$offset,'vrednost'=>$vrednost]);
    }
    public function pregled_usluga(){ 
         $this->prikaz('centar_usluge', []);
    }
    public function logout(){ 
        $this->session->destroy();
        return redirect()->to(site_url('/'));
    }
    
	
	//Anastasija Volčanovska 0092/2019 fje za potvrdu kraja usluge (prikaz i sama potvrda)

    public function potvrda_kraja_usluge_prikaz($tretmani = null, $korisnici = null,$poruka=null) {
        $this->prikaz('centar_potvrdaUspesnosti', ['tretmani' => $tretmani, 'korisnici' => $korisnici,'poruka'=>$poruka]);
    }

    public function potvrda_kraja_usluge($poruka=null) {
        $korisnik = $this->session->get('ulogovaniKorisnik');

        if (empty($korisnik)) {
            return redirect()->to(site_url('Gost'));
        }

        $tretmanModel = Factories::models('App\Models\TretmanModel');

        $tretmani = $tretmanModel->tretmaniZaSalon($korisnik->IdRK);

        $korisnici = [];
       //$korisnikModel = new RegKorisnikModel();
        $korisnikModel = Factories::models('App\Models\RegKorisnikModel');

        foreach ($tretmani as $tretman) {
            if (empty($korisnici[$tretman->idKorisnik])) {
                $korisnici[$tretman->idKorisnik] = $korisnikModel->nadjiPrekoId($tretman->idKorisnik);
            }
        }
       
        return $this->potvrda_kraja_usluge_prikaz($tretmani, $korisnici,$poruka);
    }

    public function obradiTretman() {
        $akcija = $this->request->getVar('akcija');

        $akcija = explode('!', $akcija);

        $tretmanModel = Factories::models('App\Models\TretmanModel');

        if ($akcija[0] == 'potvrdi') {
            $tretmanModel->update($akcija[1], ['jePotvrdjenKrajUsluge' => 1]);
            $poruka="Uspešno ste potvrdili završetak usluge!";
            //MAIL
        } else {
            $tretmanModel->update($akcija[1], ['jePotvrdjenKrajUsluge' => 0]);
             $poruka="Uspešno ste potvrdili završetak usluge!";
        }

        return $this->potvrda_kraja_usluge($poruka);
    }

    public function zakazivanje_za_rezervaciju() {
        $this->prikaz('centar_salon', []);
    }

    /**
     * Teodora Peric 0283/18 obrada funkcionalnosti odobri zahtev za rezervaciju 
     * koja podrazumeva setovanje flega jePotvrdjenaRezervacija u tabeli Tretman
     */
    public function zahtevi_za_rezervaciju($poruka=null){ 
     //$tretmani = new TretmanModel();   
     $tretmani = Factories::models('App\Models\TretmanModel');
     $korisnik=$this->session->get('ulogovaniKorisnik');
        $data = [
            'tretmani' => $tretmani->tretmaniZaZahteve($korisnik),
            'pager' => $tretmani->pager,
            'poruka'=>$poruka
        ];
       $result = $tretmani->zaRezervaciju($korisnik);

       if($result!=null){
            $data['controller']='Salon';
         return view ('stranice/paginacijaOdobravanjeRezervacije', $data);  
      }          
      return $this->prikaz('salon_ZahtevZaRezervacijuPrazno', ['poruka'=>$poruka,'korisnici'=>null]);
    }
    
    /**
     * Teodora Peric 0283/18 odobravanje zahteva za rezervaciju i ispis poruke o uspesnosti
     * @param @IdRK
     * @return type
     */
    function odobriRezervaciju($IdTretman=null)
    { 
      $tretmanModel = Factories::models('App\Models\TretmanModel');
      $tretmanModel->odobriRezervaciju($IdTretman);
       $email=$tretmanModel->dohvatiEmailKorisnika($IdTretman);
      $poruka="Uspešno ste odobrili rezervaciju"."<a href='mailto:".$email."?subject=Rezervacija&body=Odobren zahtev!'>Obavesti i korisnika!</a>";
      return  $this->zahtevi_za_rezervaciju($poruka);
    }
    
    
     /**
     * Teodora Peric 0283/18 odbijanje zahteva za rezervaciju i ispis poruke o uspesnosti
     * @param @IdRK
     * @return type
     */
    function odbijRezervaciju($IdTretman)
    { 
        //$tretmanModel = new TretmanModel();
        $tretmanModel=Factories::models('App\Models\TretmanModel');
        $tretmanModel->odbijRezervaciju($IdTretman);
        
        $email=$tretmanModel->dohvatiEmailKorisnika($IdTretman);
        $poruka="Uspešno ste odbili rezervaciju"."<a href='mailto:".$email."?subject=Rezervacija&body=Odbijen zahtev!'>Obavesti i korisnika!</a>";
      return  $this->zahtevi_za_rezervaciju($poruka);
    }
    
    /**
     * Teodora Peric 0283/18 prikaz vise informacija o konkretnoj rezervaicji
     * Funkcionalnost odobravanje rezervacije
     */
    function saznajViseORezervaciji($IdTretman=null){ 
         $data=[
                'res1'=>$IdTretman
            ];
        $data['controller']='Salon';
        echo view ('sabloni/header_salon');
        echo view("stranice/prikazi_konkretne_rezervacije",$data);
    }
	
/**
 * 
 */
    function sisanje(){ 
        $this->prikaz('sisanje',[]);
    }
        function kupanje(){ 
        $this->prikaz('kupanje',[]);
    }
        function ciscenje_usiju(){ 
        $this->prikaz('ciscenje_usiju',[]);
    }    function ciscenje_ociju(){ 
        $this->prikaz('ciscenje_ociju',[]);
    }    function frizura(){ 
        $this->prikaz('frizura',[]);
    }    function sredjivanje_noktiju(){ 
        $this->prikaz('sredjivanje_noktiju',[]);
    }
    function cesljanje(){ 
        $this->prikaz('cesljanje',[]);
    }
    
  function saznajViseOSalonu($idSalon,$offset=0){ 
        //$regKorisnik=new RegKorisnikModel();
        $regKorisnik=Factories::models('App\Models\RegKorisnikModel');
        //$salonModel=new \App\Models\SalonModel();
        $salonModel=Factories::models('App\Models\RegKorisnikModel');
        $res2=$salonModel->pronadjiSalon($idSalon);
        $res1=$regKorisnik->pronadjiPoIdu($idSalon);
        $this->prikaz('prikaz_konkretnogSalona',['res1'=>$res1,'res2'=>$res2,'offset'=>$offset]);
  }
    
    	
    
}




/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




