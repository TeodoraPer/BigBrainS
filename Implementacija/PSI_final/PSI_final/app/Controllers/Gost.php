<?php

namespace App\Controllers;
use App\Models\RegistrovaniKorisnikModel;
use App\Models\KorisnikMenadzerModel;


class Gost extends BaseController
{   /*Perić Teodora 0283/18 
    metoda za prikaz stranice Gosta podrazumeva poziv odgovarajućih view-a.
   */
    protected function prikaz($page,$data){ 
        $data['controller']='Gost';
     
        echo view ('sabloni/header_gost',$data);
        echo view("stranice/$page",$data);
        echo view ('sabloni/footer');
    }
    
     /*Perić Teodora 0283/18 
    metoda koja se očitava pri pristupu aplikaciji sa URL-om: localhost:8080, urađene su 
    promene u klasi Routes da bi se ovo omogućilo
   */
    public function index()
    {   
        
       $this->prikaz('promena_lozinke',[]);
    }
    
    public function pregled_salona(){ 
         $this->prikaz('centar_gost', []);
    }
    public function pregled_usluga(){ 
         $this->prikaz('centar_gost', []);
    }
    public function login(){ 
         $this->prikaz('login', []);
    }
    public function registracija(){
        
              $this->prikaz('centar_gost',[]);
        
    }
    
    //Registracija Teodora Perić 0283/18
    public function registracijaSubmitKorisnik(){ 
       
    }
    
    
    
     public function registracijaSubmitMenadzer(){ 
     
    }
    
     public function registracijaSubmitSalon(){ 
      
    }
    
}
