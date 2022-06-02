<?php
namespace App\Models;
use CodeIgniter\Model;

/**
 * 
 *
 * @author Teodora Peric 0283/18
 */
class SalonModel  extends Model {
     protected $table    = 'salon';
     protected $primaryKey = 'IdSalon';
     protected $returnType = 'object';
     protected $allowedFields = ['naziv','slika','ponedeljak-petakOD','ponedeljak-petakDO','subotaOD','subotaDO','nedeljaOD'
         ,'nedeljaDO','brojOcena','ukupanZbirOcena','brojUsluga'];
        
    /**
     * Inserotvanje u tabelu Salon uz ubacivanje u tabelu CenaUsluga za svaku od izabranih usluga
     * @param type $id
     * @param type $data
     * @param type $path
     */
    function ubaciSalon($id,$data,$path){ 
           $db = \Config\Database::connect();
         $record=$this->db->table('salon');
                 $data1 = [
                  'IdSalon'=>$id,
                  'naziv'=>trim($data->getVar('nazivSalon')),
                  'slika'=>$path,
                  'ponedeljak-petakOD'=>$data->getVar('ponPetakOd'),
                  'ponedeljak-petakDO'=>$data->getVar('ponPetakDo'),
                  'brojOcena'=>0,
                  'ukupanZbirOcena'=>0,
                  'brojUsluga'=>0,
                   'subotaOd'=>($data->getVar('subotaOd')!=null)?$data->getVar('subotaOd'):null,
                   'subotaDo'=>($data->getVar('subotaDo')!=null)?$data->getVar('subotaOd'):null,
                   'nedeljaOd'=>($data->getVar('nedeljaOd')!=null)?$data->getVar('nedeljaOd'):null,
                   'nedeljaDo'=>($data->getVar('nedeljaDo')!=null)?$data->getVar('nedeljaDo'):null,
                   
                   ];
       
        /**
         * proveravamo koliko ima usluga i za svaku uslugu ubacujemo cene u tabelu cenaUsluga 
         */
        $record->insert($data1);
        
        $uslugaModel=new UslugaModel();
        $cenaUslugeModel=new CenaUslugeModel();
        $i=0;
       {  
            $naziv1='izborUslugaS0';
            $izbor=($data->getVar($naziv1));
            if($izbor!=""){
            $naziv1='cenaS0_0';
            $cenaMali=($data->getVar( $naziv1));
             $naziv1='cenaS0_1';
            $cenaSrednji=($data->getVar( $naziv1));
             $naziv1='cenaS0_2';
            $cenaVeliki=($data->getVar( $naziv1)); 
            $idUsluga=$uslugaModel->pronadjiIdUslugePoNazivu($izbor)->IdUsluga;
            $cenaUslugeModel->ubaciCeneZaUsluguSalona($id, $idUsluga, $cenaVeliki, $cenaMali, $cenaSrednji);
            }
           $naziv1='izborUslugaS1';
            $izbor=($data->getVar($naziv1));
            if($izbor!=""){
            $naziv1='cenaS1_0';
            $cenaMali=($data->getVar( $naziv1));
             $naziv1='cenaS1_1';
            $cenaSrednji=($data->getVar( $naziv1));
             $naziv1='cenaS1_2';
            $cenaVeliki=($data->getVar( $naziv1)); 
            $idUsluga=$uslugaModel->pronadjiIdUslugePoNazivu($izbor)->IdUsluga;
            $cenaUslugeModel->ubaciCeneZaUsluguSalona($id, $idUsluga, $cenaVeliki, $cenaMali, $cenaSrednji);
                }
             $naziv1='izborUslugaS2';
            $izbor=($data->getVar($naziv1));
            if($izbor!=""){
            $naziv1='cenaS2_0';
            $cenaMali=($data->getVar( $naziv1));
             $naziv1='cenaS2_1';
            $cenaSrednji=($data->getVar( $naziv1));
             $naziv1='cenaS2_2';
            $cenaVeliki=($data->getVar( $naziv1)); 
            $idUsluga=$uslugaModel->pronadjiIdUslugePoNazivu($izbor)->IdUsluga;
            $cenaUslugeModel->ubaciCeneZaUsluguSalona($id, $idUsluga, $cenaVeliki, $cenaMali, $cenaSrednji);
            }
             $naziv1='izborUslugaS3';
            $izbor=($data->getVar($naziv1));
            if($izbor!=""){
            $naziv1='cenaS3_0';
            $cenaMali=($data->getVar( $naziv1));
             $naziv1='cenaS3_1';
            $cenaSrednji=($data->getVar( $naziv1));
             $naziv1='cenaS3_2';
            $cenaVeliki=($data->getVar( $naziv1)); 
            $idUsluga=$uslugaModel->pronadjiIdUslugePoNazivu($izbor)->IdUsluga;
            $cenaUslugeModel->ubaciCeneZaUsluguSalona($id, $idUsluga, $cenaVeliki, $cenaMali, $cenaSrednji);
            }
             $naziv1='izborUslugaS4';
            $izbor=($data->getVar($naziv1));
            if($izbor!=""){
            $naziv1='cenaS4_0';
            $cenaMali=($data->getVar( $naziv1));
             $naziv1='cenaS4_1';
            $cenaSrednji=($data->getVar( $naziv1));
             $naziv1='cenaS4_2';
            $cenaVeliki=($data->getVar( $naziv1)); 
            $idUsluga=$uslugaModel->pronadjiIdUslugePoNazivu($izbor)->IdUsluga;
            $cenaUslugeModel->ubaciCeneZaUsluguSalona($id, $idUsluga, $cenaVeliki, $cenaMali, $cenaSrednji);
            }
             $naziv1='izborUslugaS5';
            $izbor=($data->getVar($naziv1));
            if($izbor!=""){
            $naziv1='cenaS5_0';
            $cenaMali=($data->getVar( $naziv1));
             $naziv1='cenaS5_1';
            $cenaSrednji=($data->getVar( $naziv1));
             $naziv1='cenaS5_2';
            $cenaVeliki=($data->getVar( $naziv1)); 
            $idUsluga=$uslugaModel->pronadjiIdUslugePoNazivu($izbor)->IdUsluga;
            $cenaUslugeModel->ubaciCeneZaUsluguSalona($id, $idUsluga, $cenaVeliki, $cenaMali, $cenaSrednji);
            }
             $naziv1='izborUslugaS6';
            $izbor=($data->getVar($naziv1));
            if($izbor!=""){
            $naziv1='cenaS6_0';
            $cenaMali=($data->getVar( $naziv1));
             $naziv1='cenaS6_1';
            $cenaSrednji=($data->getVar( $naziv1));
             $naziv1='cenaS6_2';
            $cenaVeliki=($data->getVar( $naziv1)); 
            $idUsluga=$uslugaModel->pronadjiIdUslugePoNazivu($izbor)->IdUsluga;
            $cenaUslugeModel->ubaciCeneZaUsluguSalona($id, $idUsluga, $cenaVeliki, $cenaMali, $cenaSrednji);
            }
    }
    
}

        function izvuciSliku($id){ 
             $db = \Config\Database::connect();
         $record = $db->table('salon');  
        $record->where('IdSalon',$id);
   
        $query = $record->get();
        $result = $query->getFirstRow('object');
        return $result;
        }


            }
