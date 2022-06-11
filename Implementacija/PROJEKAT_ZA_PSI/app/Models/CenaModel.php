<?php namespace App\Models;


use CodeIgniter\Model;

class CenaModel extends Model{
    
    
    protected $table = 'cenausluge';
    protected $primaryKey = 'IdCenaUsluge';
    protected $returnType = 'object';
    protected $allowedFields = ['IdCenaUsluge', 'IdSalon', 'IdUsluga', 'cenaVelikiPas', 'cenaSrednjiPas', 'cenaMaliPas'];
    

 
    public function nadjiSalone($idUsl){    
      $db = \Config\Database::connect();
       $record = $db->table('cenausluge');
       $record->join('registrovanikorisnik','cenausluge.IdSalon=registrovanikorisnik.IdRK');
       $record->select('*');
       $record->where('IdUsluga',$idUsl);
        $record->where('registrovanikorisnik.jeOdobrenZahtevZaRegistraciju',1);
        $record->where('registrovanikorisnik.jeObrisan',NULL);
         $record->orWhere('registrovanikorisnik.jeObrisan',0);
       
        $query = $record->get();
        $result = $query->getResult();
        return $result;
    }
}
