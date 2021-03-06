<?php namespace App\Models;

/**
 * Peric Teodora 0283/18 
 */ 

use CodeIgniter\Model;
use App\Models\UlugaModel;

class UslugaModel extends Model{
    
    
    protected $table = 'usluga';
    protected $primaryKey = 'IdUsluga';
    protected $returnType = 'object';
    
    protected $allowedFields = ['Naziv'];
	
	
	
    /**
  * Anastasija Volčanovska 0092/19
  */
    public function nadjiUslugeSaImenima($naziviUsluga){  
        return $this->whereIn('Naziv', $naziviUsluga)->findAll();
    }
   
    /**
     * Aleksandra Dragojlovic 0409/19 
     * 
     * pronalaženje naziva usluga, koje su pružene u datom tretmanu
     * koristi se prilikom pregleda usluga
     * 
     * @param type $IdTretman
     * @return type
     */
    public function naziviZaTretman($IdTretman){
        
        $db = \Config\Database::connect();
        $builder = $db->table('usluga');
        $builder->select('naziv');
        $builder->join('sadrzi','sadrzi.IdUsluga=usluga.IdUsluga');
        $builder->where('sadrzi.IdTretman',$IdTretman);
        
        $query = $builder->get();
        $result = $query->getResult();
        return $result;
    }
   /**
    * Teodora Peric 0283/18 dohvatanje Id-a usluge sa zadatim nazivom
    * @param type $naziv
    * @return IdUsluga
    */  
   function pronadjiIdUslugePoNazivu($naziv){ 
    $db = \Config\Database::connect();
    $record = $db->table('usluga');  
    $record->where('Naziv',$naziv);

    $query = $record->get();
    $result = $query->getFirstRow('object');
    return $result;
}

 
   /**
    * Teodora Peric 0283/18 dohvatanje naziva usluge po Id-u
    * @return type $naziv
    * @param IdUsluga
    */  
    function pronadjiNazivPoIdu($IdUsluga){ 
        $db = \Config\Database::connect();
        $record = $db->table('usluga');  
        $record->where('IdUsluga',$IdUsluga);
   
        $query = $record->get();
        $result = $query->getFirstRow('object');
        return $result;
   }
  
public function __get(string $name) {
   parent::__get($name);
}
    

}