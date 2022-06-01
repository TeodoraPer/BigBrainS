<?php namespace App\Models;

   

use CodeIgniter\Model;
use App\Models\SadrziModel;

class SadrziModel extends Model{
    
    
    protected $table = 'sadrzi';
    protected $primaryKey = 'IdSadrzi';
    protected $returnType = 'object';
    
    protected $allowedFields = ['IdTretman', 'IdUsluga'];
   
 
    
   
    
    
    

}