<?php
/*
    Perić Teodora 0283/18 kreiranje skeleta
*/
namespace App\Controllers;
use App\Models\KorisnikMenadzerModel;
use App\Models\OcenioModel;
use App\Models\SalonModel;
use App\Models\TretmanModel;
use App\Models\OstavioRecenzijuModel;
use App\Models\SadrziModel;
use App\Models\UslugaModel;
use App\Models\RegKorisnikModel;
use CodeIgniter\Config\Factories;

class Korisnik extends BaseController
{
    /*
    Perić Teodora 0283/18 metoda za prikaz stranice Korisnik- početna podrazumeva poziv odgovarajućih view-a.
   */
    protected function prikaz($page,$data){ 
        $data['controller']='Korisnik';
        //linija koja mora da se menja kasnije kad se implementira login
        $data['korisnik']='korisnik1 neki tamo nesto';
        echo view ('sabloni/header_ulogovaniKorisnik');
        echo view("stranice/$page",$data);
        echo view ('sabloni/footer');
    }
    
    
    public function index()
    {   
        $this->prikaz('centar_ulogovaniKorisnik', []);
    }
    
    //Ovo na dole se sve menja, ja sam bzv dodala telo metoda da bih videla da li je sve okej
    public function pregled_salona($offset=null,$vrednost=null){ 
       $this->prikaz('centar_pregled_salona', ['offset'=>$offset,'vrednost'=>$vrednost]);
    }
    public function pregled_usluga(){ 
        $this->prikaz('centar_usluge', []);
    }
    public function logout(){ 
         $this->session->destroy();
         return redirect()->to(site_url('/'));
    }
	
	
    
    public function zakazivanje_tretmana($poruka = null) {
        $this->prikaz('centar_zakazivanjeTretmana_1', ['poruka' => $poruka]);
    }
	
	//Anastasija Volčanovska 0092/2019 fja koja omogucuje izbor usluge pomoću pretrage
    
    public function pretragaPoUslugama() {
        $naziviUsluga = $this->request->getVar('usluge');

        if (empty($naziviUsluga)) {
            return $this->zakazivanje_tretmana('Morate izabrati barem jednu uslugu!');
        }
 
        $uslugaModel = Factories::models('App\Models\UslugaModel');//new UslugaModel();

        $usluge = $uslugaModel->nadjiUslugeSaImenima($naziviUsluga);
        
       
     // return $this->prikaz('usluge',['usluge'=> $naziviUsluga,'poruka'=>'da']);
     $salonModel =Factories::models('App\Models\SalonModel');//new SalonModel();

        $this->session->set('usluge', $naziviUsluga);

        return $this->zakazivanje_tretmana2($salonModel->pronadjiSaloneSaUslugama($usluge));
    }
    //Anastasija Volčanovska 0092/2019 fje koje omogućavaju zakazivanje

    public function zakazivanjeUSalonu() {
        $salon = $this->request->getVar('IdSalon');

        $this->session->set('salon', $salon);

        $usluge = $this->session->get('usluge');

        return $this->zakazivanje_tretmana3($usluge);
    }

    public function zakazivanje_tretmana2($saloni = null) {
        $this->prikaz('centar_zakazivanjeTretmana_2', ['saloni' => $saloni]);
    }

    public function zakazivanje_tretmana3($usluge = null, $greska = null) {
        $this->prikaz('centar_zakazivanjeTretmana_3', ['usluge' => $usluge, 'greska' => $greska]);
    }

    public function zavrsiZakazivanje() {
        $salon = $this->session->get('salon');
        $usluge = $this->session->get('usluge');
        $korisnik = $this->session->get('ulogovaniKorisnik');

        if (empty($korisnik)) {
            return redirect()->to(site_url('Gost'));
        }

        if($korisnik->tipKorisnika == 'A') {
            return redirect()->to(site_url('Administrator'));
        }
        
        if($korisnik->tipKorisnika == 'S') {
            return redirect()->to(site_url('Salon'));
        }
        
        if (empty($salon) || empty($usluge)) {
            return $this->prikaz('centar_ulogovaniKorisnik', []);
        }

        $rasa = $this->request->getVar('rasa');
        $godine = $this->request->getVar('godine');
        $ime = $this->request->getVar('ime');
        $vreme = $this->request->getVar('vreme');
        $velicina = $this->request->getVar('velicina');
        $napomena = $this->request->getVar('napomena');

       /* if (empty($rasa) || empty($godine) || empty($ime) || empty($vreme) || empty($velicina)) {
            return $this->zakazivanje_tretmana3($usluge, 'Morate popuniti polja!');
        }*/
        if (empty($godine)) {
            return $this->zakazivanje_tretmana3($usluge, 'Morate popuniti polje godine!');
        }
        if (empty($ime)) {
            return $this->zakazivanje_tretmana3($usluge, 'Morate popuniti polje ime!');
        }
        if ( empty($vreme)) {
            return $this->zakazivanje_tretmana3($usluge, 'Morate popuniti polje vreme!');
        }
        if (!is_numeric($godine) || ((int) $godine < 0) || ((int) $godine > 30)) {
            return $this->zakazivanje_tretmana3($usluge, 'Neispravne godine!');
        }

        if (strlen($ime) > 45) {
            return $this->zakazivanje_tretmana3($usluge, 'Predugacko ime!');
        }
        
     
            $niz=(str_split($vreme));
            $godina=$niz[0]."".$niz[1]."".$niz[2]."".$niz[3];
            $mesec=$niz[5]."".$niz[6];
            $dan=$niz[8]."".$niz[9];
            $sat=$niz[11]."".$niz[12];
            $minut=$niz[14]."".$niz[15];
         
            $datum1= mktime( $sat,$minut,$mesec,$dan,$godina);
            $datum2=mktime(date("h"),date('i'),date('m'),date('d'),date("Y"));
            if($datum1<=$datum2){ 
                   return $this->zakazivanje_tretmana3($usluge,'Neispravan datum!!');
            }
       
      
        $uslugaModel = Factories::models('App\Models\UslugaModel');//new UslugaModel();
        $uslugeObj = $uslugaModel->nadjiUslugeSaImenima($usluge);

        $tretmanModel = Factories::models('App\Models\TretmanModel');//new TretmanModel();

        $tretmanModel->save([
            'IdSalon' => $salon,
            'rasa' => $rasa,
            'ime' => $ime,
            'velicina' => $velicina,
            'idKorisnik' => $korisnik->IdRK,
            'DatumVreme' => $vreme,
            'brojTelefona' => $korisnik->brojTelefona,
            'uzrast' => $godine,
            'napomena'=> $napomena
        ]);

        $tretmanId = $tretmanModel->getInsertId();

        $sadrziModel = Factories::models('App\Models\sadrziModel');//new SadrziModel();

        foreach ($uslugeObj as $usluga) {
            $sadrziModel->save([
                'IdUsluga' => $usluga->IdUsluga,
                'IdTretman' => $tretmanId
            ]);
        }

        $this->prikaz('uspesno_zakazivanje', []);
    }


    /**
     * Aleksandra Dragojlovic 0409/19 
     * 
     * postavljanje podataka koji se koriste prilikom prikaza stranice za prikaz istorije usluga
     * 
     * @return type
     */
    public function istorija_usluga(){
        
     $uslugeSvihTretmana=array();
     $kolTretmana=array();        
     $uslugeSvihTretmana=[];
     $uslugaModel = Factories::models('App\Models\UslugaModel');//new UslugaModel();
     //$sadrziModel = new SadrziModel();
     $tretmanModel=Factories::models('App\Models\TretmanModel');//new TretmanModel();
     //$korisnikModel=new KorisnikMenadzerModel();
     $korisnik = $this->session->get('ulogovaniKorisnik');
     
     $informacije=$tretmanModel->izlistajIstorijuUsluga($korisnik);
     if($informacije==null) {
         $data['poruka']='Trenutno nema usluga za prikazivanje';
         return $this->prikaz('istorija_usluga_korisnik',$data);
     }
     $data['informacije']=$informacije;
     
     $i=0;
     foreach($informacije as $info){           
         $sveUsluge=$uslugaModel->naziviZaTretman($info->IdTretman);            
         $total=count((array)$sveUsluge);
         foreach($sveUsluge as $usl){
             array_push($uslugeSvihTretmana, $usl->naziv);
             $i++;          
         }
         array_push($kolTretmana, $total);
         
     }
     $data['sveUsluge']=$uslugeSvihTretmana;
     $data['kolTretmana']=$kolTretmana;

     return $this->prikaz('istorija_usluga_korisnik',$data);
     
 }



 /**
     * Aleksandra Dragojlovic 0409/19 
     * 
     * pozivanje funkcije za prikaz stranice
     * koristi se prilikom ocenjivanja salona
     * 
     * @param type $naziv
     * @param type $IdTretman
     * @param type $IdSalon
     */
    public function ocenjivanjePrekoPregledaIstorijeUsluga($naziv=null,$IdTretman=null,$IdSalon=null){
        $data['naziv']=$naziv;
        $data['IdSalon']=$IdSalon;
        $data['IdTretman']=$IdTretman;
        $this->prikaz('ocenjivanje',$data);
        
    }
    /**
     * Aleksandra Dragojlovic 0409/19 
     * 
     * ažuriranje ocene ili dodavanje nove ocene u tabele Ocena i Ocenio
     * koristi se prilikom ocenjivanja salona
     * 
     * @param type $IdSalon
     * @param type $IdTretman
     * @param type $naziv
     * @return type
     */
    public function oceni($IdSalon=null,$IdTretman=null,$naziv=null){
        $korisnik = $this->session->get('ulogovaniKorisnik');
        $ocenio = Factories::models('App\Models\OcenioModel');//new OcenioModel();
        $salon = Factories::models('App\Models\SalonModel');//new SalonModel();
       // $korisnikModel=new KorisnikMenadzerModel();
      
        $novaOcena = $this->request->getVar('ocena');
        
        $IdRK=$korisnik->IdRK;

        $staraOcena = $ocenio->dodajOcenio($IdSalon, $IdTretman, $IdRK, $novaOcena);
        if($staraOcena!=0){
            //postoji stara ocena mora da se aŽurira          
            $salon->azurirajZbirOcena($IdSalon, $staraOcena, $novaOcena);
        }else{
            //korisnik prvi put ocenjuje
            $salon->uvecajZbirOcena($IdSalon, $novaOcena);
            $ocenio->save([
                'IdSalon' => $IdSalon,
                'IdKorisnik' => $IdRK,
                'Ocena' => $novaOcena,
                'IdTretman' => $IdTretman,
            ]);       
        }
        $data['porukaOcena']="Salon je ocenjen sa ".$novaOcena;
        $data['naziv']=$naziv;
        $data['IdSalon']=$IdSalon;
        $data['IdTretman']=$IdTretman;       
        return $this->prikaz('ocenjivanje',$data);
           
    }
    /**
     * Aleksandra Dragojlovic 0409/19 
     * 
     * dodavanje nove recenzije u tabelu Recenzija
     * koristi se prilikom ostavljanja recenzije
     * 
     * @param type $IdSalon
     * @param type $naziv
     * @param type $IdTretman
     * @return type
     */
    public function recenzija($IdSalon=null,$naziv=null,$IdTretman=null){
        //$korisnikModel=new KorisnikMenadzerModel();
        $korisnik = $this->session->get('ulogovaniKorisnik');

        $sadrzaj = $this->request->getVar('recenzija');
        if($sadrzaj==null){
            $data['porukaRecenzija']="Popunite polje Recenzija da bi ostavili recenziju!";
            $data['naziv']=$naziv;
            $data['IdSalon']=$IdSalon;
            $data['IdTretman']=$IdTretman;
            return $this->prikaz('ocenjivanje',$data);   
        }
        $recenzijaModel = Factories::models('App\Models\OstavioRecenzijuModel');//new OstavioRecenzijuModel();
        $recenzijaModel->save([
            'IdKorisnik' => $korisnik->IdRK,
            'IdSalon' => $IdSalon,
            'sadrzaj' => $sadrzaj,
        ]);
        $data['porukaRecenzija']="Ostavili ste recenziju!";
        $data['naziv']=$naziv;
        $data['IdSalon']=$IdSalon;
        $data['IdTretman']=$IdTretman;
        return $this->prikaz('ocenjivanje',$data);
        
    }
    
    /*Pregled usluga i salona*/
     function sisanje(){ 
        $this->prikaz('sisanje',[]);
    }
        function kupanje(){ 
        $this->prikaz('kupanje',[]);
    }
        function ciscenje_usiju(){ 
        $this->prikaz('ciscenje_usiju',[]);
    }    function ciscenje_ociju(){ 
        $this->prikaz('ciscenje_ociju',[]);
    }    function frizura(){ 
        $this->prikaz('frizura',[]);
    }    function sredjivanje_noktiju(){ 
        $this->prikaz('sredjivanje_noktiju',[]);
    }
    function cesljanje(){ 
        $this->prikaz('cesljanje',[]);
    }
    
  function saznajViseOSalonu($idSalon=null,$offset=0){ 
        $regKorisnik=Factories::models('App\Models\RegKorisnikModel');//new RegKorisnikModel();
        $salonModel=Factories::models('App\Models\SalonModel');//new \App\Models\SalonModel();
        $res2=$salonModel->pronadjiSalon($idSalon);
        $res1=$regKorisnik->pronadjiPoIdu($idSalon);
        $this->prikaz('prikaz_konkretnogSalona',['res1'=>$res1,'res2'=>$res2,'offset'=>$offset]);
  }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


