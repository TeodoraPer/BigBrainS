<?php namespace App\Models;

   

use CodeIgniter\Model;
use App\Models\OcenioModel;

class OcenioModel extends Model{
    
    
    protected $table = 'ocenio';
    protected $primaryKey = 'IdOcenio';
    protected $returnType = 'object';
    protected $allowedFields = ['IdKorisnik', 'IdSalon', 'Ocena','IdTretman'];
    
 
    /**
     * Aleksandra Dragojlovic 0409/19 
     * 
     * ažuriranje ocene u tabeli Ocenio ili detektovanje da treba dodati u tabelu Ocenio novu ocenu
     * koristi se prilikom ocenjivanje salona
     * 
     * @param type $IdSalon
     * @param type $IdTretman
     * @param type $IdKorisnik
     * @param type $ocena
     * @return int
     */
    public function dodajOcenio($IdSalon,$IdTretman,$IdKorisnik,$ocena){ 
        $db = \Config\Database::connect();
        $builder = $db->table('ocenio');
        $builder->select('*');         
        $builder->where('IdSalon',$IdSalon);
        $builder->where('IdKorisnik',$IdKorisnik);
        $builder->where('IdTretman',$IdTretman);        
        $query = $builder->get();
        $ocenio = $query->getFirstRow('object');
        if($ocenio!=null){
            //vec je ocenjen mora da se promeni ocena i vraca se stara ocena
            $stara = $ocenio->Ocena;
            $data=[
                'Ocena' => $ocena
            ];            
            $builder1 = $db->table('ocenio');
            $builder1->where('IdOcenio', $ocenio->IdOcenio);
            $builder1->update($data);
            return $stara;
        }else{
            //nije ocenjen, mora da se doda u ocenio
            return 0;
        }
        
    }

}