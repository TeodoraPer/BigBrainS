<?php namespace App\Models;

   

use CodeIgniter\Model;
use App\Models\TretmanModel;

class TretmanModel extends Model{
    
    
    protected $table = 'tretman';
    protected $primaryKey = 'IdTretman';
    protected $returnType = 'object';
    protected $allowedFields = ['IdSalon', 'rasa','ime','brojTelefona', 'velicina', 'IdKorisnik','jePotvrdjenKrajUsluge','jePotvrdjenaRezervacija','DatumVreme'];
   
 
    
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
    
    

}