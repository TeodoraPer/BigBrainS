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

}

