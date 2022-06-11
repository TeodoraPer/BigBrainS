<?php


/**
 * Description of GostControllerTest
 *
 * @author Aleksandra Dragojlovic 2019/0409, ocenjivanje,pregled istorije usluga,pregled usluga i salona,zakazivanje
 * 
 */
namespace App\Controllers;

use CodeIgniter\Test\ControllerTester;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Config\Factories;

class KorisnikControllerTest extends CIUnitTestCase {
   
    use ControllerTester;
    
    public function setUp(): void
    {
        parent::setUp(); 
        $saloni=[
            (object)[
                'IdSalon'=>'1',
                'naziv'=>'Salon1',
                'slika'=>'/web/slika1.png',
                'ponedeljak-petakOD'=>'16:00:00',
                'ponedeljak-petakDO'=>'17:00:00',
            ],
           (object)[
              'IdSalon'=>'2',
                'naziv'=>'Salon2',
                'slika'=>'/web/slika2.png',
                'ponedeljak-petakOD'=>'12:00:00',
                'ponedeljak-petakDO'=>'13:00:00',
            ]
        ];
        $salon=[
            (object)[
                'IdSalon'=>'1',
                'naziv'=>'Salon1',
                'slika'=>'/web/slika1.png',
                'ponedeljak-petakOD'=>'16:00:00',
                'ponedeljak-petakDO'=>'17:00:00',
                
            ]
        ];
        $tretmani=[
            (object)[
                'IdTretman'=>'1',
                'IdSalon'=>'12',
                'rasa'=>'Pudlica',
                'ime'=>'Toto',
                'brojTelefona'=>'+3819034718',
                'velicina'=>'M',
                'IdKorisnik'=>'7',
                'jePotvrdjenKrajUsluge'=>'NULL',
                'jePotvrdjenaRezervacija'=>'1',
                'DatumVreme'=>'2022-07-01T13:00',
                'uzrast'=>'3',
                'napomena'=>'NULL',
                'zbirOcena'=>'10',
                'brojOcena'=>'2',
                'naziv'=>'Naziv',
                
            ]
        ];
        $usluge=[
            (object)[
                'IdUsluga'=>'1',
                'Naziv'=>'Šišanje',
                'naziv'=>'Naziv',
                
            ]
        ];
        $kor=[
            (object)[
                'IdRK'=>'1',
                'korisnickoIme'=>'sara',
                'email'=>'sara@gmail.com',
                'tipKorisnika'=>'K',
                'lozinka'=>'111',
                'jeObrisan'=>'NULL',
                'jeOdobrenZahtevZaRegistraciju'=>'1',
            ]
        ];
        
            $mockves=$this->createMock(\App\Models\SalonModel::class);
            $mockves->method('sviSaloni2')->willReturn($saloni);
            $mockves->method('pronadjiSalon')->willReturn($salon);
            $mockves->method('uvecajZbirOcena')->willReturn(0);
            $mockves->method('azurirajZbirOcena')->willReturn(0);
            $mockves->method('pronadjiSaloneSaUslugama')->willReturn($saloni);
            Factories::injectMock('models','\App\Models\SalonModel',$mockves);
           
            $mockves1=$this->createMock(\App\Models\UslugaModel::class);
            $mockves1->method('naziviZaTretman')->willReturn($usluge);
            $mockves1->method('nadjiUslugeSaImenima')->willReturn($usluge);
            Factories::injectMock('models','\App\Models\UslugaModel',$mockves1);
            
            $mockves2=$this->createMock(\App\Models\TretmanModel::class);
            $mockves2->method('izlistajIstorijuUsluga')->willReturn($tretmani);
            
            Factories::injectMock('models','\App\Models\TretmanModel',$mockves2);
            
            $mockves3=$this->createMock(\App\Models\OcenioModel::class);
            $mockves3->method('dodajOcenio')->willReturn(5);
            Factories::injectMock('models','\App\Models\OcenioModel',$mockves3);
            
            
            $mockves4=$this->createMock(\App\Models\RegKorisnikModel::class);
            $mockves4->method('pronadjiPoIdu')->willReturn($kor);
            Factories::injectMock('models','\App\Models\RegKorisnikModel',$mockves4);
            
            
            
            
            
    } 
    public function test_Korisnik_index(){ 
        $result=$this->controller('\App\Controllers\Korisnik')->
                execute("index"); 
       $this->assertTrue($result->see("Dobrodošli u GroomRoom!",'h2')); 
        
    }
   
    public function test_Korisnik_logout(){ 
     $result=$this->controller('\App\Controllers\Administrator')->
                execute("logout"); 
     //  $_SESSION['ulogovaniKorisnik']=null;
     $result->assertRedirect();
    //$result->assertTrue($result->see("Dobrodošli u GroomRoom!",'h2'));   
       
    }
    public function test_Korisnik_zakazivanje_tretmana($poruka = null) {
        $result=$this->controller('\App\Controllers\Korisnik')->
                execute("zakazivanje_tretmana"); 
       $this->assertTrue($result->see("Dalje",'button')); 
    }
    
    
    public function test_Korisnik_zakazivanje_tretmana2($saloni = null){
        $result=$this->controller('\App\Controllers\Korisnik')->
                execute("zakazivanje_tretmana2"); 
       $this->assertTrue($result->see("Saloni za izabrane usluge",'h2')); 
    }
    public function test_Korisnik_zakazivanje_tretmana3($usluge = null, $greska = null){
        $result=$this->controller('\App\Controllers\Korisnik')->
                execute("zakazivanje_tretmana3"); 
       $this->assertTrue($result->see("Zakaži",'button')); 
    }
    public function test_Korisnik_zavrsiZakazivanje(){
        $result=$this->controller('\App\Controllers\Korisnik')->
                execute("zavrsiZakazivanje"); 
        
        $result->assertRedirect();
        
    }
    public function test_Korisnik_istorija_usluga(){
        $result=$this->controller('\App\Controllers\Korisnik')->
                execute("istorija_usluga"); 
       $this->assertTrue($result->see("Oceni i ostavi recenziju",'button')); 
    }
    public function test_Korisnik_ocenjivanjePrekoPregledaIstorijeUsluga($naziv=null,$IdTretman=null,$IdSalon=null){
        $result=$this->controller('\App\Controllers\Korisnik')->
                execute("ocenjivanjePrekoPregledaIstorijeUsluga"); 
       $this->assertTrue($result->see("Ocena",'td'));
       $this->assertTrue($result->see("Recenzija",'td'));
    
    }
    /*public function test_Korisnik_oceni($IdSalon=null,$IdTretman=null,$naziv=null){
        $result=$this->controller('\App\Controllers\Korisnik')->
                execute("oceni"); 
       $this->assertTrue($result->see("Ocena",'td'));
    }*/
    function test_Korisnik_sisanje(){
        $result=$this->controller('\App\Controllers\Korisnik')->
                execute("sisanje"); 
       $this->assertTrue($result->see("ŠIŠANJE",'h2')); 
    }
    function test_Korisnik_kupanje(){
    
        $result=$this->controller('\App\Controllers\Korisnik')->
                execute("kupanje"); 
       $this->assertTrue($result->see("KUPANJE",'h2'));
    }
    function test_Korisnik_ciscenje_usiju(){ 
        $result=$this->controller('\App\Controllers\Korisnik')->
                execute("ciscenje_usiju"); 
       $this->assertTrue($result->see("ČIŠĆENJE UŠIJU",'h2'));
    }    
    function test_Korisnik_ciscenje_ociju(){ 
        $result=$this->controller('\App\Controllers\Korisnik')->
                execute("ciscenje_ociju"); 
       $this->assertTrue($result->see("ČIŠĆENJE OČIJU",'h2'));
    }    
    function test_Korisnik_frizura(){ 
        $result=$this->controller('\App\Controllers\Korisnik')->
                execute("frizura"); 
       $this->assertTrue($result->see("FRIZURA",'h2'));
    }    
    function test_Korisnik_sredjivanje_noktiju(){ 
        $result=$this->controller('\App\Controllers\Korisnik')->
                execute("sredjivanje_noktiju"); 
       $this->assertTrue($result->see("SREĐIVANJE NOKTIJU",'h2'));
    }
    function test_Korisnik_cesljanje(){ 
        $result=$this->controller('\App\Controllers\Korisnik')->
                execute("cesljanje"); 
       $this->assertTrue($result->see("ČEŠLJANJE",'h2'));
    }
    public function test_Korisnik_recenzija($IdSalon=null,$IdTretman=null,$naziv=null){
        $result=$this->controller('\App\Controllers\Korisnik')->
                execute("recenzija"); 
       $this->assertTrue($result->see("Ocena",'td'));
    }
    /*function test_Korisnik_saznajViseOSalonu($idSalon=null,$offset=0){
        $result=$this->controller('\App\Controllers\Korisnik')->
                execute("saznajViseOSalonu"); 
       $this->assertTrue($result->see("Adresa",'p'));
    }*/
}  