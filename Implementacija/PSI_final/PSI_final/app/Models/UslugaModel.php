<?php namespace App\Models;

   

use CodeIgniter\Model;
use App\Models\UlugaModel;

class UslugaModel extends Model{
    
    
    protected $table = 'usluga';
    protected $primaryKey = 'IdUsluga';
    protected $returnType = 'object';
    
    protected $allowedFields = ['naziv'];
   
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
        
    

}