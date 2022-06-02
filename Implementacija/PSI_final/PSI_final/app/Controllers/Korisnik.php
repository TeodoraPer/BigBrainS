<?php
/*
    Perić Teodora 0283/18
   */
namespace App\Controllers;
use App\Models\KorisnikMenadzerModel;
use App\Models\OcenioModel;
use App\Models\SalonModel;
use App\Models\TretmanModel;
use App\Models\OstavioRecenzijuModel;
use App\Models\SadrziModel;
use App\Models\UslugaModel;

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
     $korisnikModel=new KorisnikMenadzerModel();
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



 /**
     * Aleksandra Dragojlovic 0409/19 
     * 
     * pozivanje funkcije za prikaz stranice
     * koristi se prilikom ocenjivanja salona
     * 
     * @param type $naziv
     * @param type $IdTretman
     * @param type $IdSalon
     */
    public function ocenjivanjePrekoPregledaIstorijeUsluga($naziv,$IdTretman,$IdSalon){
        $data['naziv']=$naziv;
        $data['IdSalon']=$IdSalon;
        $data['IdTretman']=$IdTretman;
        $this->prikaz('ocenjivanje',$data);
        
    }
    /**
     * Aleksandra Dragojlovic 0409/19 
     * 
     * ažuriranje ocene ili dodavanje nove ocene u tabele Ocena i Ocenio
     * koristi se prilikom ocenjivanja salona
     * 
     * @param type $IdSalon
     * @param type $IdTretman
     * @param type $naziv
     * @return type
     */
    public function oceni($IdSalon,$IdTretman,$naziv){
        $ocenio = new OcenioModel();
        $salon = new SalonModel();
        $korisnikModel=new KorisnikMenadzerModel();
      
        $novaOcena = $this->request->getVar('ocena');
        $korisnik = $this->session->get('korisnik');

        $staraOcena = $ocenio->dodajOcenio($IdSalon, $IdTretman, $korisnik->IdRK, $novaOcena);
        if($staraOcena!=0){
            //postoji stara ocena mora da se aŽurira          
            $salon->azurirajZbirOcena($IdSalon, $staraOcena, $novaOcena);
        }else{
            //korisnik prvi put ocenjuje
            $salon->uvecajZbirOcena($IdSalon, $novaOcena);
            $ocenio->save([
                'IdSalon' => $IdSalon,
                'IdKorisnik' => $korisnik->IdRK,
                'Ocena' => $novaOcena,
                'IdTretman' => $IdTretman,
            ]);       
        }
        $data['porukaOcena']="Salon je ocenjen sa ".$novaOcena;
        $data['naziv']=$naziv;
        $data['IdSalon']=$IdSalon;
        $data['IdTretman']=$IdTretman;       
        return $this->prikaz('ocenjivanje',$data);
           
    }
    /**
     * Aleksandra Dragojlovic 0409/19 
     * 
     * dodavanje nove recenzije u tabelu Recenzija
     * koristi se prilikom ostavljanja recenzije
     * 
     * @param type $IdSalon
     * @param type $naziv
     * @param type $IdTretman
     * @return type
     */
    public function recenzija($IdSalon,$naziv,$IdTretman){
        $korisnikModel=new KorisnikMenadzerModel();
        $korisnik = $this->session->get('korisnik');

        $sadrzaj = $this->request->getVar('recenzija');
        if($sadrzaj==null){
            $data['porukaRecenzija']="Popunite polje Recenzija da bi ostavili recenziju!";
            $data['naziv']=$naziv;
            $data['IdSalon']=$IdSalon;
            $data['IdTretman']=$IdTretman;
            return $this->prikaz('ocenjivanje',$data);   
        }
        $recenzijaModel = new OstavioRecenzijuModel();
        $recenzijaModel->save([
            'IdKorisnik' => $korisnik->IdRK,
            'IdSalon' => $IdSalon,
            'sadrzaj' => $sadrzaj,
        ]);
        $data['porukaRecenzija']="Ostavili ste recenziju!";
        $data['naziv']=$naziv;
        $data['IdSalon']=$IdSalon;
        $data['IdTretman']=$IdTretman;
        return $this->prikaz('ocenjivanje',$data);
        
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


