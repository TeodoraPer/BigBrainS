<?php
namespace App\Models;
use CodeIgniter\Model;

/**
 * 
 *
 * @author Teodora Peric 0283/18
 */
class CenaUslugeModel  extends Model {
     protected $table    = 'cenausluge';
     protected $primaryKey = 'IdCenaUsluge';
     protected $returnType = 'object';
     protected $allowedFields = ['IdSalon','IdUsluga','cenaVelikiPas','cenaSrednjiPas','cenaMaliPas' ];
        
     /**
      * Insertovanje u tabelu cenaUsluga
      * @param type $idSalon
      * @param type $idUsluga
      * @param type $cenaVeliki
      * @param type $cenaMali
      * @param type $cenaSrednji
      */
    function ubaciCeneZaUsluguSalona($idSalon,$idUsluga,$cenaVeliki,$cenaMali,$cenaSrednji){ 
           $db = \Config\Database::connect();
                 $record=$this->db->table('cenausluge');
                 $data1 = [
                  'IdSalon'=>$idSalon,
                  'IdUsluga'=>$idUsluga,
                  'cenaVelikiPas'=>$cenaVeliki,
                  'cenaMaliPas'=>$cenaMali,
                  'cenaSrednjiPas'=>$cenaSrednji
                   ];
                 $record->insert($data1);
    }
   
}
