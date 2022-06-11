<?php


/**
 * Description of GostControllerTest
 *
 * @author Anastasija Volčanovska testiranje kontrolera Salon 0092/2019
 */
namespace App\Controllers;

use CodeIgniter\Test\ControllerTester;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Config\Factories;

class SalonControllerTest extends CIUnitTestCase {
   
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
        
        $korisnici=[
            (object)[
                'IdRK'=>'1',
                'korisnickoIme'=>'sara',
                'tipKorisnika'=>'K',
                'lozinka'=>'Sara123',
                'brojTelefona'=>'+3816656721',
                'adresa'=>'Dalmatinska 41',
                'jeObrisan'=>'NULL',
                'jeOdobrenZahtevZaRegistraciju'=>'1',

            ]
        ];
        
        $tretmani=[
            (object)[
                'IdTretman'=>'1',
                'IdSalon'=>'12',
                'rasa'=>'Pudlica',
                'ime'=>'Toto',
                'brojTelefona'=>'+3816656721',
                'velicina'=>'M',
                'idKorisnik'=>'7',
                'jePotvrdjenKrajUsluge'=>'NULL',
                'jePotvrdjenaRezervacija'=>'NULL',
                'DatumVreme'=>'2021-04-02T12:12',
                'uzrast'=>'14',
                'napomena'=>'NULL',

            ]
        ];
         $email='neko@gmail.com';
     
            $mockves=$this->createMock(\App\Models\SalonModel::class);
            $mockves->method('sviSaloni2')->willReturn($saloni);
            Factories::injectMock('models','\App\Models\SalonModel',$mockves);

        
            $mockves=$this->createMock(\App\Models\TretmanModel::class);
            $mockves->method('tretmaniZaSalon')->willReturn($saloni);
            Factories::injectMock('models','\App\Models\SalonModel',$mockves);
            
             
            $mockves=$this->createMock(\App\Models\RegKorisnikModel::class);
            $mockves->method('nadjiPrekoId')->willReturn($korisnici);
            Factories::injectMock('models','\App\Models\RegKorisnikModel',$mockves);
            
            $mockves=$this->createMock(\App\Models\TretmanModel::class);
            $mockves->method('update')->willReturn(true);
            Factories::injectMock('models','\App\Models\TretmanModel',$mockves);
            
            $mockves=$this->createMock(\App\Models\TretmanModel::class);
            $mockves->method('tretmaniZaZahteve')->willReturn($tretmani);
            Factories::injectMock('models','\App\Models\TretmanModel',$mockves);
            
  
            $mockves->method('zaRezervaciju')->willReturn($tretmani);
            Factories::injectMock('models','\App\Models\TretmanModel',$mockves);
            
            $mockves->method('odobriRezervaciju')->willReturn($tretmani);
            Factories::injectMock('models','\App\Models\TretmanModel',$mockves);
            
            $mockves->method('dohvatiEmailKorisnika')->willReturn($email);
            Factories::injectMock('models','\App\Models\TretmanModel',$mockves);
            
            
           
    } 
    public function test_Salon_index(){ 
        $result=$this->controller('\App\Controllers\Salon')->
                execute("index"); 
       $this->assertTrue($result->see("Dobrodošli u GroomRoom!",'h2')); 
        
    }
    
    public function test_potvrdaKrajaUsluge(){
        $result=$this->controller('\App\Controllers\Salon')->
                execute("potvrda_kraja_usluge");
        $this->assertTrue(true); 
    }
    
    
    public function test_potvrda_kraja_usluge_prikaz(){
        $result=$this->controller('\App\Controllers\Salon')->
                execute("potvrda_kraja_usluge_prikaz");
        $this->assertTrue($result->see("mesto za vašeg ljubimca",'p'));
    }
    
    public function test_zakazivanjeZaRezervaciju(){
        $result=$this->controller('\App\Controllers\Salon')->
                execute("zakazivanje_za_rezervaciju");
        $this->assertTrue($result->see("Dobrodošli u GroomRoom!",'h2'));
    }
    
    
    public function test_sisanje(){
        $result=$this->controller('\App\Controllers\Salon')->
             execute("sisanje");
        $this->assertTrue($result->see("ŠIŠANJE",'h2'));
    } 
    
    public function test_kupanje(){
        $result=$this->controller('\App\Controllers\Salon')->
             execute("kupanje");
        $this->assertTrue($result->see("KUPANJE",'h2'));
    } 
    
     public function test_ciscenje_usiju(){
        $result=$this->controller('\App\Controllers\Salon')->
             execute("ciscenje_usiju");
        $this->assertTrue($result->see("ČIŠĆENJE UŠIJU",'h2'));
    } 
    
    public function test_ciscenje_ociju(){
        $result=$this->controller('\App\Controllers\Salon')->
             execute("ciscenje_ociju");
        $this->assertTrue($result->see("ČIŠĆENJE OČIJU",'h2'));
    } 
    
    public function test_frizura(){
        $result=$this->controller('\App\Controllers\Salon')->
             execute("frizura");
        $this->assertTrue($result->see("FRIZURA",'h2'));
    } 
    
     public function test_sredjivanje_noktiju(){
        $result=$this->controller('\App\Controllers\Salon')->
             execute("sredjivanje_noktiju");
        $this->assertTrue($result->see("SREĐIVANJE NOKTIJU",'h2'));
    } 
    public function test_cesljanje(){
        $result=$this->controller('\App\Controllers\Salon')->
             execute("cesljanje");
        $this->assertTrue($result->see("ČEŠLJANJE",'h2'));
    } 
    
    
    
    
}
