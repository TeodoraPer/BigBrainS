<?php namespace App\Models;


use CodeIgniter\Model;

class CenaModel extends Model{
    
    
    protected $table = 'cenausluge';
    protected $primaryKey = 'IdCenaUsluge';
    protected $returnType = 'object';
    protected $allowedFields = ['IdCenaUsluge', 'IdSalon', 'IdUsluga', 'cenaVelikiPas', 'cenaSrednjiPas', 'cenaMaliPas'];
    

    public function nadjiSalone($idUsl){        
        return $this->where('IdUsluga', $idUsl)->findAll();
    }
}
