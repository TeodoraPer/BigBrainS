<?php
/*
    Perić Teodora 0283/18
   */
namespace App\Controllers;

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
    public function pregled_salona(){ 
         $this->prikaz('centar_salon', []);
    }
    public function pregled_usluga(){ 
         $this->prikaz('centar_salon', []);
    }
    public function logout(){ 
         $this->prikaz('centar_salon', []);
    }
    public function potvrda_kraja_usluge(){ 
         $this->prikaz('centar_salon', []);
    }
    /**
     * Teodora Peric 0283/18 obrada funkcionalnosti odobri zahtev za rezervaciju 
     * koja podrazumeva setovanje flega jePotvrdjenaRezervacija u tabeli Tretman
     */
    public function zahtevi_za_rezervaciju($poruka=null){ 
     $tretmani = new TretmanModel();   
     
        $data = [
            'tretmani' => $tretmani->where('jePotvrdjenaRezervacija',NULL)->paginate(6),
            'pager' => $tretmani->pager,
            'poruka'=>$poruka
        ];
       $db = \Config\Database::connect();
       $record = $db->table('tretman');
       $record->where('jePotvrdjenaRezervacija',NULL);
       $query = $record->get();
       $result = $query->getFirstRow('object');
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
    function odobriRezervaciju($IdTretman)
    { 
      $tretmanModel = new TretmanModel();
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
        $tretmanModel = new TretmanModel();
        $tretmanModel->odbijRezervaciju($IdTretman);
        
        $email=$tretmanModel->dohvatiEmailKorisnika($IdTretman);
        $poruka="Uspešno ste odbili rezervaciju"."<a href='mailto:".$email."?subject=Rezervacija&body=Odbijen zahtev!'>Obavesti i korisnika!</a>";
      return  $this->zahtevi_za_rezervaciju($poruka);
    }
    
    /**
     * Teodora Peric 0283/18 prikaz vise informacija o konkretnoj rezervaicji
     */
    function saznajViseORezervaciji($IdTretman){ 
         $data=[
                'res1'=>$IdTretman
            ];
        $data['controller']='Salon';
        echo view ('sabloni/header_salon');
        echo view("stranice/prikazi_konkretne_rezervacije",$data);
    }
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




