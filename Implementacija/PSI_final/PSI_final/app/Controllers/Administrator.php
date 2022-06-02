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
    /**
     * Teodora Peric 0283/18 funckionalnost za odobravanje ili odbijanje zahteva za registraciju
     * podrazumeva da se klikom na link zahtevi za reg prikazuje tabela ili poruka da nema vise
     * zahteva
     * @return type
     */
    public function zahtevi_za_registraciju($poruka=null)
    {   
      $regKor = new RegKorisnikModel();   
     
        $data = [
            'users' => $regKor->where('jeOdobrenZahtevZaRegistraciju',NULL)->paginate(6),
            'pager' => $regKor->pager,
            'poruka'=>$poruka
        ];
       $db = \Config\Database::connect();
       $record = $db->table('registrovanikorisnik');
       $record->where('jeOdobrenZahtevZaRegistraciju',NULL);
       $query = $record->get();
       $result = $query->getFirstRow('object');
       if($result!=null){
        
            $data['controller']='Administrator';
         return view ('stranice/paginacijaAdministrator', $data);  
      }          
      return $this->prikaz('admin_ZahtevZaRegistracijuPraznaTabela', ['poruka'=>'Trenutno nema nijednog neobrđenog zahteva!','korisnici'=>null]);
    }
  
    
    /**
     * Teodora Peric 0283/18 odobravanje zahteva za registrsaciju korisniku i ispis poruke o uspesnosti
     * @param @IdRK
     * @return type
     */
    function odobriKorisnika($IdRK)
    { 
      $regKorisnikModel = new RegKorisnikModel();
      $regKorisnikModel->odobriKorisnika($IdRK);
     
      return $this->zahtevi_za_registraciju("Uspešno ste odobrili zahtev korisnika!");
    }
    
    
     /**
     * Teodora Peric 0283/18 odbijanje zahteva za registrsaciju korisniku i ispis poruke o uspesnosti
     * @param @IdRK
     * @return type
     */
    function odbijKorisnika($IdRK)
    { 
      $regKorisnikModel = new RegKorisnikModel();
      $regKorisnikModel->odbijKorisnika($IdRK);
      
      return  $this->zahtevi_za_registraciju("Uspešno ste odbili zahtev korisnika!");
    }
  
    function posaljiMejl(){ 
        $email = \Config\Services::email();
        $config['protocol'] = 'sendmail';
        $config['mailPath'] = '/usr/sbin/sendmail';
        $config['charset']  = 'iso-8859-1';
        $config['wordWrap'] = true;

$email->initialize($config);
$email->setFrom('la.dr.steva@gmail.com', 'Your Name');
$email->setTo('teodoraperic11041999@gmail.com');

$email->setSubject('Email Test');
$email->setMessage('Testing the email class.');

$email->send();
    }
   


}


