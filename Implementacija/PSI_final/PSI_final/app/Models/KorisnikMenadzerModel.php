<?php
namespace App\Models;
use CodeIgniter\Model;

/**
 * 
 *
 * @author Teodora Peric 0283/18
 */
class KorisnikMenadzerModel  extends Model {
     protected $table    = 'korisnikmenadzer';
     protected $primaryKey = 'IdRK';
     protected $returnType = 'object';
     protected $allowedFields = ['ime','prezime','pol' ];
        
    /** Teodora Peric 0283/18
     * Insertovanje u tablelu korisnik menadzer 
     * @param type $id
     * @param type $data
     */
    function ubaciKorisnika($id,$data){ 
        //   $db = \Config\Database::connect();
         $record=$this->db->table('korisnikmenadzer');
                 $data1 = [
                  'IdRK'=>$id,
                  'ime'=>trim($data->getVar('imeKorisnik')),
                  'prezime'=>trim($data->getVar('prezimeKorisnik')),
                  'pol'=>trim($data->getVar('polKorisnik'))
                   ];
          $record->insert($data1);
    }
     /** Teodora Peric 0283/18
     * Insertovanje u tablelu korisnik menadzer 
     * @param type $id
     * @param type $data
     */
     function ubaciMenadzera($id,$data){ 
          //   $db = \Config\Database::connect();
         $record=$this->db->table('korisnikmenadzer');
                 $data1 = [
                  'IdRK'=>$id,
                  'ime'=>trim($data->getVar('imeMenadzer')),
                  'prezime'=>trim($data->getVar('prezimeMenadzer')),
                  'pol'=>trim($data->getVar('polMenadzer'))
                   ];
          $record->insert($data1);
    }
     /**
     * Teodora Peric 0283/18
     */
    function pronadjiKorisnika($IdK){ 
        $db = \Config\Database::connect();
       $record = $db->table('korisnikmenadzer');
       $record->where('IdRK', $IdK);
       
       $query = $record->get();
       $result = $query->getFirstRow('object');
       return $result;
   }
}
