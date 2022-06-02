<?php namespace App\Models;

   

use CodeIgniter\Model;
use App\Models\RegKorisnikModel;

class RegKorisnikModel extends Model{
    
    
    protected $table = 'registrovanikorisnik';
    protected $primaryKey = 'IdRK';
    protected $returnType = 'object';
    protected $allowedFields = ['korisnickoIme', 'email', 'tipKorisnika', 'lozinka', 'brojTelefona', 'adresa', 'jeObrisan' , 'jeOdobrenZahtevZaRegistraciju'];
    
    /**
     * Aleksandra Dragojlovic 0409/19 
     * 
     * pronalaženje korisnika preko korisničkog imena,
     * koristi se prilikom promene lozinke
     * 
     * @param $korIme
     * @return object
     */
    public function nadjiPrekoKorIme($korIme){
        $db = \Config\Database::connect();
        $builder = $db->table('registrovanikorisnik');
        $builder->select('*');         
        $builder->where('korisnickoIme',$korIme);
        $builder->where('jeOdobrenZahtevZaRegistraciju',1);
        $query = $builder->get();
        $result = $query->getFirstRow('object');
        return $result;
    }
    
    /**
     * Aleksandra Dragojlovic 0409/19 
     * 
     * pronalaženje korisnika, koja mogu da se uklone
     * koristi se prilikom uklanjanja naloga
     * 
     * 
     */
    public function nadjiKorisnike(){
        
        $db = \Config\Database::connect();
        $builder = $db->table('registrovanikorisnik');
        $builder->select('*');         
        $builder->where('jeObrisan',0);
        $builder->where('tipKorisnika !=','a');
        $builder->where('jeOdobrenZahtevZaRegistraciju',1);
        
        $builder->orwhere('jeObrisan',NULL);
        $builder->where('tipKorisnika !=','a');
        $builder->where('jeOdobrenZahtevZaRegistraciju',1);
        $query = $builder->get();
        $result = $query->getResult();
        return $result;
        
    }
    /**
     * Aleksandra Dragojlovic 0409/19 
     * 
     * ažuriranje flega jeObrisan,
     * koristi se prilikom uklanjanja naloga
     * 
     * @param $IdRK
     */
    public function obrisiKorisnika($IdRK){
        
        $data = [
           'jeObrisan' => 1
        ];
        $db = \Config\Database::connect();
        $builder = $db->table('registrovanikorisnik');
        $builder->where('IdRK', $IdRK);
        $builder->update($data);
    }
   
      /**
     * Teodora Peric 0283/18
     * 
     * provera da li vrednost $parametar postoji u tabeli u koloni koja predstavlja
       * promenljivu $vrednost
     * @object
    
     */
    public function pronadjiRegKorisnikaPoParametru($parametar, $vrednost){
        $db = \Config\Database::connect();
       $record = $db->table('registrovanikorisnik');
       $record->select('*');         
       $record->where($parametar,$vrednost);
  
       $query = $record->get();
       $result = $query->getResult();
       return $result;
   }
   
     /**
      *  Teodora Peric 0283/18
      * 
      * ubacivanje korisnika u tabelu KorisnikMenadzer i registrovaniKorisnik
    
      * @param type $data
      */
     function ubaciKorisnika($data){ 
         $db = \Config\Database::connect();
         $record =$this->db->table('registrovanikorisnik');
         $data1 = [
             'korisnickoIme'=>trim($data->getVar('korisnickoImeKorisnik')),
             'email'=>trim($data->getVar('emailKorisnik')),
             'tipKorisnika'=>'K',
             'lozinka'=>trim($data->getVar('lozinkaKorisnik')),
             'brojTelefona'=>trim($data->getVar('brojTelefonaKorisnik')),
             'adresa'=>trim($data->getVar('adresaKorisnik'))
               ];

                $record->insert($data1);
                $id=$this->db->insertID();
               
               $korisnikMenadzer=new KorisnikMenadzerModel();
              $korisnikMenadzer->ubaciKorisnika($id,$data);
           }
           
  /**
    * Teodora Peric 0283/18
    * 
    * ubacivanje korisnika u tabelu KorisnikMenadzer i registrovaniKorisnik
    * 
  */
     function ubaciMenadzer($data){ 
         $db = \Config\Database::connect();
         $record =$this->db->table('registrovanikorisnik');
         $data1 = [
             'korisnickoIme'=>trim($data->getVar('korisnickoImeMenadzer')),
             'email'=>trim($data->getVar('emailMenadzer')),
             'tipKorisnika'=>'A',
             'lozinka'=>trim($data->getVar('lozinkaMenadzer')),
             'brojTelefona'=>trim($data->getVar('brojTelefonaMenadzer')),
             'adresa'=>trim($data->getVar('adresaMenadzer'))
               ];

                $record->insert($data1);
                $id=$this->db->insertID();
               
               $korisnikMenadzer=new KorisnikMenadzerModel();
               $korisnikMenadzer->ubaciMenadzera($id,$data);
           }
           
    /**
    * Teodora Peric 0283/18
    * 
    * ubacivanje salona u tabelu Salon i registrovaniKorisnik
    * 
  */
      function ubaciSalon($data,$path){ 
           $db = \Config\Database::connect();
           $record =$this->db->table('registrovanikorisnik');
           $data1 = [
             'korisnickoIme'=>trim($data->getVar('korisnickoImeSalon')),
             'email'=>trim($data->getVar('emailSalon')),
             'tipKorisnika'=>'S',
             'lozinka'=>trim($data->getVar('lozinkaSalon')),
             'brojTelefona'=>trim($data->getVar('brojTelefonaSalon')),
             'adresa'=>trim($data->getVar('adresaSalon'))
               ];
            $record->insert($data1);
            $id=$this->db->insertID();
        
            $salonModel=new SalonModel();
            $salonModel->ubaciSalon($id,$data,$path);
    }
    
}

