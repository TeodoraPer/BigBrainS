<?php namespace App\Models;

   

use CodeIgniter\Model;
use App\Models\OstavioRecenzijuModel;

class OstavioRecenzijuModel extends Model{
    
    
    protected $table = 'ostaviorecenziju';
    protected $primaryKey = 'IdRecenzija';
    protected $returnType = 'object';
    
    protected $allowedFields = ['IdKorisnik', 'IdSalon', 'sadrzaj'];
   

}