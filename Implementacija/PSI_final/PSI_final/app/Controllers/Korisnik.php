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
    
    public function zakazivanje_tretmana(){ 
         $this->prikaz('centar_ulogovaniKorisnik', []);
    }

    /**
     * Aleksandra Dragojlovic 0409/19 
     * 
     * postavljanje podataka koji se koriste prilikom prikaza stranice za prikaz istorije usluga
     * 
     * @return type
     */
    public function istorija_usluga(){
        
     $uslugeSvihTretmana=array();
     $kolTretmana=array();        
     $uslugeSvihTretmana=[];
     $uslugaModel = new UslugaModel();
     $sadrziModel = new SadrziModel();
     $tretmanModel=new TretmanModel();
     $korisnikModel=new KorisnikModel();
     $korisnik = $this->session->get('korisnik');
     
     $informacije=$tretmanModel->izlistajIstorijuUsluga($korisnik);
     if($informacije==null) {
         $data['poruka']='Trenutno nema usluga za prikazivanje';
         return $this->prikaz('istorija_usluga_korisnik',$data);
     }
     $data['informacije']=$informacije;
     
     $i=0;
     foreach($informacije as $info){           
         $sveUsluge=$uslugaModel->naziviZaTretman($info->IdTretman);            
         $total=count((array)$sveUsluge);
         foreach($sveUsluge as $usl){
             array_push($uslugeSvihTretmana, $usl->naziv);
             $i++;          
         }
         array_push($kolTretmana, $total);
         
     }
     $data['sveUsluge']=$uslugeSvihTretmana;
     $data['kolTretmana']=$kolTretmana;

     return $this->prikaz('istorija_usluga_korisnik',$data);
     
 }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


