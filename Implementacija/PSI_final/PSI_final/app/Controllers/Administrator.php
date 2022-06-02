<?php
/*
    Perić Teodora 0283/18
   */
namespace App\Controllers;
use App\Models\RegKorisnikModel;

class Administrator extends BaseController
{
    /*
    Perić Teodora 0283/18 metoda za prikaz stranice Administrator- početna podrazumeva poziv odgovarajućih view-a.
   */
    protected function prikaz($page,$data){ 
        $data['controller']='Administrator';
        //linija koja mora da se menja kasnije kad se implementira login
        $data['administrator']='administrator1';
        echo view ('sabloni/header_administrator');
        echo view("stranice/$page",$data);
        echo view ('sabloni/footer');
    }
    
    
    public function index()
    {   
        $this->prikaz('centar_administrator', []);
    }
    
      public function pregled_salona()
    {   
        $this->prikaz('centar_administrator', []);
    }
      public function pregled_usluga()
    {   
        $this->prikaz('centar_administrator', []);
    }
    
      public function logout()
    {   
        $this->prikaz('centar_administrator', []);
    }
      public function zahtevi_za_registraciju()
    {   
        $this->prikaz('centar_administrator', []);
    }


    /**
     * Aleksandra Dragojlovic 0409/19
     * Funkcionalnost uklanjanje naloga
     */
    public function brisanje_naloga($poruka=null){
      $regKor = new RegKorisnikModel();
      $korisnici = $regKor->nadjiKorisnike();
      if($korisnici != null){
          return $this->prikaz('uklanjanje_naloga', ['poruka'=>$poruka,'korisnici'=>$korisnici]);
      }          
      return $this->prikaz('uklanjanje_naloga', ['poruka'=>'Trenutno nema neuklonjenih registrovanih naloga!','korisnici'=>$korisnici]);
  }
  
  /**
   * Aleksandra Dragojlovic 0409/19
   * Funkcionalnost uklanjanje naloga
   */
  public function ukloniKorisnika($IdRK){
      $RegKorisnikModel = new RegKorisnikModel();
      $korisnik = $RegKorisnikModel->where('IdRK',$IdRK)->first();
      if($korisnik->jeObrisan == 0){
          $RegKorisnikModel->obrisiKorisnika($IdRK);
          return $this->brisanje_naloga('Uspešno ste uklonili korisnika!');
      }
      return $this->brisanje_naloga();
  }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


