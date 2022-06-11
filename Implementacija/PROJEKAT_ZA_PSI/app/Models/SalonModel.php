<?php
namespace App\Models;
use CodeIgniter\Model;

/**
 * @author Teodora Peric 0283/18
 */
class SalonModel  extends Model {
     protected $table    = 'salon';
     protected $primaryKey = 'IdSalon';
     protected $returnType = 'object';
     protected $allowedFields = ['naziv', 'slika', 'ponedeljak-petakOD', 'ponedeljak-petakDO', 'subotaOD', 'subotaDO', 'nedeljaOD' , 'nedeljaDO', 'brojOcena', 'ukupanZbirOcena', 'brojUsluga'];
        
    /** Teodora Peric 0283/18
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
       
        /** Teodora Peric 0283/18
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
    

    /**
     * Teodora Peric 0283/18
     * */
    function izvuciSliku($id){ 
        $db = \Config\Database::connect();
        $record = $db->table('salon');  
        $record->where('IdSalon',$id);

        $query = $record->get();
        $result = $query->getFirstRow('object');
        return $result;
    }

    /**
     * Aleksandra Dragojlovic 0409/19 
     * 
     * beleženje u bazi nove ocene salona
     * koristi se prilikom ocenjivanja salona
     * 
     * @param type $IdSalon
     * @param type $novaOcena
     */
   public function uvecajZbirOcena($IdSalon,$novaOcena){
        
        $salon=$this->find($IdSalon);
        $data = array(
            'brojOcena' => $salon->brojOcena+1,
            'ukupanZbirOcena' => $salon->ukupanZbirOcena+$novaOcena
        );
        
        $this->update($IdSalon,$data);
    }
    
    /**
     * Aleksandra Dragojlovic 0409/19 
     * 
     * beleženje u bazi izmenu ocene salona
     * koristi se prilikom ocenjivanja salona
     * 
     * @param type $IdSalon
     * @param type $staraOcena
     * @param type $novaOcena
     */

    public function azurirajZbirOcena($IdSalon,$staraOcena,$novaOcena){
        $salon=$this->find($IdSalon);
        $data = array(
            
            'ukupanZbirOcena' => $salon->ukupanZbirOcena-$staraOcena+$novaOcena
        );
        $this->update($IdSalon,$data);
        
        
    }
     /**
     * Teodora Peric 0283/18 pronalazak salona po Id-u
     * @param $IdSalon
     */
    function pronadjiSalon($IdSalon){ 
      
        $db = \Config\Database::connect();
        $record = $db->table('salon');
        $record->where('IdSalon', $IdSalon);
        
        $query = $record->get();
        $result = $query->getFirstRow('object');
        return $result;
    }
	
	/**
     * Anastasija Volčanovska tražimo salone po uslugama
     * @param $IdSalon
     */
	 
	public function pronadjiSaloneSaUslugama($usluge){
        $cenaModel=new CenaModel();
        $saloniKonacno=array();
        $j=0;
        $i=0;
        foreach($usluge as $usluga){
            $saloni=$cenaModel->nadjiSalone($usluga->IdUsluga);
            if ($i==0){
                foreach($saloni as $salon){
                    $saloniKonacno[$j]=$salon->IdSalon;
                    $j++;
                }
                $i++;
            }else{
                $ima=array();
                $k=0;
                foreach($saloni as $salon){                   
                    if (in_array($salon->IdSalon,$saloniKonacno)){
                        $ima[$k]=$salon->IdSalon;
                    $k++;
                    }                  
                }
                $saloniKonacno=$ima;
            }
        }
        
        if(empty($saloniKonacno)){
            return array();
        }
        
        return $this->whereIn('IdSalon', $saloniKonacno)->findAll();
    }
    
   /**
     * Teodora Peric 0283/18
     */
   function sviSaloni($x,$y=0){ 
      $db = \Config\Database::connect();
    
        $record = $db->table('salon');
        
       $record->join('registrovanikorisnik','salon.IdSalon=registrovanikorisnik.IdRK');
       $record->select('*');
    
    $record->where('registrovanikorisnik.jeOdobrenZahtevZaRegistraciju',1);
     $record->where('registrovanikorisnik.jeObrisan',NULL);
      
      $record->orWhere('registrovanikorisnik.jeObrisan',0);  $record->limit($x,$y);
        $query = $record->get();
        $result = $query->getResult();
        return $result;
    
}
 /**
     * Teodora Peric 0283/18
     */
   function sviSaloni2(){ 
      $db = \Config\Database::connect();
    
        $record = $db->table('salon');
        
       $record->join('registrovanikorisnik','salon.IdSalon=registrovanikorisnik.IdRK');
       $record->select('*');
    
    $record->where('registrovanikorisnik.jeOdobrenZahtevZaRegistraciju',1);
     $record->where('registrovanikorisnik.jeObrisan',NULL);
      
      $record->orWhere('registrovanikorisnik.jeObrisan',0);  
        $query = $record->get();
        $result = $query->getResult();
        return $result;
    
}
/**
 * Teodora Peric
 * 0283/18
 */
function brojSalona(){ 
     $db = \Config\Database::connect();
    $record = $db->table('salon');
   $record->join('registrovanikorisnik','salon.IdSalon=registrovanikorisnik.IdRK');
    $record->select('*');
    $record->where('registrovanikorisnik.jeOdobrenZahtevZaRegistraciju',1);
     $record->where('registrovanikorisnik.jeObrisan',NULL);
      
      $record->orWhere('registrovanikorisnik.jeObrisan',0); 
     
    $query = $record->get();$i=0;
    $result = $query->getResult();
    foreach($result as $row){ 
        $i++;
    }
    return $i;
}
}
