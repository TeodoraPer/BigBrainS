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
        $data['salon']='salon1 neki tamo nesto';
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
    public function zakazivanje_za_rezervaciju(){ 
         $this->prikaz('centar_salon', []);
    }
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




