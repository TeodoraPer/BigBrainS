<?php
/**
 *  Perić Teodora 0283/18 funkcionalnost Odobravanje zahteva za registraciju
 *  Aleksandra Dragojlovic 0409/19
 */
namespace App\Controllers;
use App\Models\RegKorisnikModel;
use CodeIgniter\Config\Factories;
class Administrator extends BaseController
{
    /**
    *Perić Teodora 0283/18 metoda za prikaz stranice Administrator- 
    * početna podrazumeva poziv odgovarajućih view-a.
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
    
      public function pregled_salona($offset=null,$vrednost=null)
    {   
      $this->prikaz('centar_pregled_salona', ['offset'=>$offset,'vrednost'=>$vrednost]);
    }
      public function pregled_usluga()
    {   
       $this->prikaz('centar_usluge', []);
    }
    
      public function logout()
    {   
        $this->session->destroy();
         return redirect()->to(site_url('/'));
    }
      


    /**
     * Aleksandra Dragojlovic 0409/19
     * Funkcionalnost uklanjanje naloga
     */
    public function brisanje_naloga($poruka=null){
      $regKor = Factories::models('App\Models\RegKorisnikModel'); //new RegKorisnikModel();
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
      $RegKorisnikModel = Factories::models('App\Models\RegKorisnikModel'); //new RegKorisnikModel();
      $korisnik =$RegKorisnikModel->pronadji($IdRK); //$RegKorisnikModel->where('IdRK',$IdRK)->first();
      if($korisnik->jeObrisan == 0){
          $RegKorisnikModel->obrisiKorisnika($IdRK);
          return $this->brisanje_naloga('Uspešno ste uklonili korisnika!');
      }
      return $this->brisanje_naloga();
  }
   
      /**
     * Teodora Peric 0283/18 funckionalnost za odobravanje ili odbijanje zahteva za registraciju
     * podrazumeva da se klikom na link zahtevi za reg prikazuje tabela ili poruka da nema vise
     * zahteva
     * Funkcionalnost Obrada zahteva za registraciju
     * @return type
     */
    public function zahtevi_za_registraciju($poruka=null)
    {   
      $regKor = Factories::models('App\Models\RegKorisnikModel'); //new RegKorisnikModel();   
     
        $data = [
            'users' => $regKor->jeOdobrenZahtevZaRegistraciju(),//$regKor->where('jeOdobrenZahtevZaRegistraciju',NULL)->paginate(6),
            'pager' => $regKor->pager,
            'poruka'=>$poruka
        ];
      /* $db = \Config\Database::connect();
       $record = $db->table('registrovanikorisnik');
       $record->where('jeOdobrenZahtevZaRegistraciju',NULL);
       $query = $record->get();
       $result = $query->getFirstRow('object');*/
        $result=$regKor->sviKojimaNijeOdobren();
       if($result!=null){
        
            $data['controller']='Administrator';
         return view ('stranice/paginacijaAdministrator', $data);  
      }          
      return $this->prikaz('admin_ZahtevZaRegistracijuPraznaTabela', ['poruka'=>$poruka,'korisnici'=>null]);
    }
  
    
    /**
     * Teodora Peric 0283/18 odobravanje zahteva za registrsaciju korisniku i ispis poruke o uspesnosti
     * Funkcionalnost Obrada zahteva za registraciju
     * @param @IdRK
     * @return type
     */
    function odobriKorisnika($IdRK)
    { 
      $regKorisnikModel =Factories::models('App\Models\RegKorisnikModel');// new RegKorisnikModel();
      $regKorisnikModel->odobriKorisnika($IdRK);
     $email= $regKorisnikModel->pronadjiPoIdu($IdRK)->email;
      $poruka="Uspešno ste odobrili zahtev. "."<a href='mailto:".$email."?subject=Registracija&body=Odobren zahtev!'>Obavesti i korisnika!</a>";
      return $this->zahtevi_za_registraciju($poruka);
    }
    
    
     /**
     * Teodora Peric 0283/18 odbijanje zahteva za registrsaciju korisniku i ispis poruke o uspesnosti
      * Funkcionalnost Obrada zahteva za registraciju
     * @param @IdRK
     * @return type
     */
    function odbijKorisnika($IdRK)
    { 
      $regKorisnikModel =Factories::models('App\Models\RegKorisnikModel');// new RegKorisnikModel();
      $regKorisnikModel->odbijKorisnika($IdRK);
      $email= $regKorisnikModel->pronadjiPoIdu($IdRK)->email;
      $poruka="Uspešno ste odbili zahtev. "."<a href='mailto:".$email."?subject=Registracija&body=Odbijen zahtev!'>Obavesti i korisnika!</a>";
      return  $this->zahtevi_za_registraciju($poruka);
    }
  
    
    /**
     * Teodora Peric 0283/18 prikupljanje vise informacija o konkretnom korisniku
     * Funkcionalnost Obrada zahteva za registraciju
     * @param type $IdRK
     */
    function saznajVise($IdRK){ 
          $regKorisnikModel =Factories::models('App\Models\RegKorisnikModel');// new RegKorisnikModel();
          $db = \Config\Database::connect();
          $record= $db->table('registrovanikorisnik');
          $record->where('IdRK',$IdRK);
          $query = $record->get();
          $result = $query->getFirstRow('object');
          if($result->tipKorisnika=="S"){
            $db = \Config\Database::connect();
            $record= $db->table('salon');
            $record->where('IdSalon',$IdRK);
            $query = $record->get();
            $result2 = $query->getFirstRow('object'); 
            } 
            else{ 
             $db = \Config\Database::connect();
            $record= $db->table('korisnikmenadzer');
            $record->where('IdRK',$IdRK);
            $query = $record->get();
            $result2 = $query->getFirstRow('object'); 
              }
             return $this->prikaziOvo($result,$result2);
    }
    
    /**
     * Funkcija za prikaz informacija o korisniku
     * @param type $res1
     * @param type $res2
     */
        function prikaziOvo($res1,$res2){ 
            $data=[
                'res1'=>$res1,
                'res2'=>$res2
            ];
        $data['controller']='Administrator';
        echo view ('sabloni/header_administrator');
        echo view("stranice/prikazi_konkretnog_korisnika_za_registraciju",$data);
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
        $regKorisnik=Factories::models('App\Models\RegKorisnikModel');//new RegKorisnikModel();
        $salonModel=Factories::models('App\Models\SalonModel');//new \App\Models\SalonModel();
        $res2=$salonModel->pronadjiSalon($idSalon);
        $res1=$regKorisnik->pronadjiPoIdu($idSalon);
        $this->prikaz('prikaz_konkretnogSalona',['res1'=>$res1,'res2'=>$res2,'offset'=>$offset]);
  }
    
    
}


