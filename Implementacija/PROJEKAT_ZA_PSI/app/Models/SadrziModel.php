<?php namespace App\Models;

/**
 * Peric Teodora 0283/18
 */   

use CodeIgniter\Model;
use App\Models\SadrziModel;

class SadrziModel extends Model{
    
    
    protected $table = 'sadrzi';
    protected $primaryKey = 'IdSadrzi';
    protected $returnType = 'object';
    
    protected $allowedFields = ['IdTretman', 'IdUsluga'];
   
 
     /**
     * Teodora Peric 0283/18
     */
   function sveUslugeTretmana($IdTr){ 
       
    $db = \Config\Database::connect();
     $record = $db->table('sadrzi');
     $record->where('IdTretman', $IdTr);
     
     $query = $record->get();
     $result = $query->getResult();
     return $result;
}
    

}