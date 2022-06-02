<?php namespace App\Models;

   

use CodeIgniter\Model;
use App\Models\TretmanModel;

class TretmanModel extends Model{
    
    
    protected $table = 'tretman';
    protected $primaryKey = 'IdTretman';
    protected $returnType = 'object';
    protected $allowedFields = ['IdSalon', 'rasa', 'ime', 'velicina', 'idKorisnik', 'jePotvrdjenKrajUsluge', 'jePotvrdjenaRezervacija', 'DatumVreme', 'brojTelefona', 'uzrast', 'napomena'];
   
 
    
    /**
     * Aleksandra Dragojlovic 0409/19 
     * 
     * dohvatanje podataka o tretmanima datog korisnika
     * koristi se prilikom pregleda usluga
     * 
     * @param type $korisnik
     * @return type
     */
    public function izlistajIstorijuUsluga($korisnik){
        $db = \Config\Database::connect();
        $builder = $db->table('tretman');
        $builder->join('salon','salon.IdSalon=tretman.IdSalon');
        $builder->select('salon.naziv as naziv');
        $builder->select('salon.IdSalon as IdSalon');
        $builder->select('tretman.IdTretman');
        $builder->select('salon.brojOcena as brojOcena');
        $builder->select('salon.ukupanZbirOcena as zbirOcena');
        $builder->select('tretman.DatumVreme');
        $builder->where('IdKorisnik',$korisnik->IdRK);
        $query = $builder->get();
        $result = $query->getResult();
        return $result;
        
    }
         /**
     * Teodora Peric 0283/18
     * 
     * odobravanje zahteva za rezervaciju
     * 
   */
  function odobriRezervaciju($IdTretman){
    $db = \Config\Database::connect();
    $record = $db->table('tretman');
          
    $record->where('IdTretman',$IdTretman);
    $query = $record->get();
    $result = $query->getFirstRow('object');
    if($result->jePotvrdjenaRezervacija==NULL){ 
        $result->jePotvrdjenaRezervacija=1;
        $this->postaviJeOdobrenZahtevZaRezervaciju($IdTretman,1);
       
    }
 }
 
/**
 * Teodora Peric 0283/18
 * 
 * odbijanje registracije konkretnom korisniku
 * 
*/
 function odbijRezervaciju($IdTretman){ 
    $db = \Config\Database::connect();
    $record = $db->table('tretman');
          
    $record->where('IdTretman',$IdTretman);
    $query = $record->get();
    $result = $query->getFirstRow('object');
    if($result->jePotvrdjenaRezervacija==NULL){ 
        $result->jePotvrdjenaRezervacija=0;
        $this->postaviJeOdobrenZahtevZaRezervaciju($IdTretman,0);
        return "Uspešno ste odbili zahtev korisnika!";
    }
 }
 
 /**
  * Teodora Peric 0283/18 postavljanje flega jeOdobrenZahtevZaRegistraciju na 1 ili 0
  * @param type $IdRK
  * @param type $vrednost
  */
 function postaviJeOdobrenZahtevZaRezervaciju($IdTretman,$vrednost){
    $data = [
       'jePotvrdjenaRezervacija' => $vrednost
    ];
    $db = \Config\Database::connect();
    $recorder = $db->table('tretman');
    $recorder->where('IdTretman', $IdTretman);
    $recorder->update($data);
     
 }
 
 /**
  * Dohvatanje tremtana po Id-u
  */
 function dohvatiTretman($IdTr){ 
     
    $db = \Config\Database::connect();
    $record = $db->table('tretman');
    $record->where('IdTretman', $IdTr);
    
    $query = $record->get();
    $result = $query->getFirstRow('object');
    return $result;
 }

 /**
  * Teodora Peric 0283/18
  */
 function dohvatiEmailKorisnika($IdTr){ 
     $tr=$this->dohvatiTretman($IdTr);
     $regKorModel=new RegKorisnikModel();
     $email=$regKorModel->pronadjiPoIdu($tr->idKorisnik)->email;
     return $email;
     
 }
    /**
  * Anastasija Volčanovska 0092/19
  */
  public function tretmaniZaSalon($idSalon){
        return $this->where('IdSalon', $idSalon)->where('jePotvrdjenKrajUsluge', NULL)->findAll();
    }

}