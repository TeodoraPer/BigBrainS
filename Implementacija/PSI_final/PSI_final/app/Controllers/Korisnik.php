<?php
/*
    Perić Teodora 0283/18
   */
namespace App\Controllers;

class Korisnik extends BaseController
{
    /*
    Perić Teodora 0283/18 metoda za prikaz stranice Korisnik- početna podrazumeva poziv odgovarajućih view-a.
   */
    protected function prikaz($page,$data){ 
        $data['controller']='Korisnik';
        //linija koja mora da se menja kasnije kad se implementira login
        $data['korisnik']='korisnik1 neki tamo nesto';
        echo view ('sabloni/header_ulogovaniKorisnik');
        echo view("stranice/$page",$data);
        echo view ('sabloni/footer');
    }
    
    
    public function index()
    {   
        $this->prikaz('centar_ulogovaniKorisnik', []);
    }
    
    //Ovo na dole se sve menja, ja sam bzv dodala telo metoda da bih videla da li je sve okej
    public function pregled_salona(){ 
         $this->prikaz('centar_ulogovaniKorisnik', []);
    }
    public function pregled_usluga(){ 
         $this->prikaz('centar_ulogovaniKorisnik', []);
    }
    public function logout(){ 
         $this->prikaz('centar_ulogovaniKorisnik', []);
    }
    public function istorija_usluga(){ 
         $this->prikaz('centar_ulogovaniKorisnik', []);
    }
    public function zakazivanje_tretmana(){ 
         $this->prikaz('centar_ulogovaniKorisnik', []);
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


