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
        $ocenio=$this->where('IdSalon',$IdSalon)->where('IdKorisnik',$IdKorisnik)->where('IdTretman',$IdTretman)->first();
        
        if($ocenio!=null){
            //vec je ocenjen mora da se promeni ocena i vraca se stara ocena
            $stara = $ocenio->Ocena;
            $data=[
                'Ocena' => $ocena
            ];
            $this->update($ocenio->IdOcenio,$data);
            return $stara;
        }else{
            //nije ocenjen, mora da se doda u ocenio
            return 0;
        }
        
    }

}