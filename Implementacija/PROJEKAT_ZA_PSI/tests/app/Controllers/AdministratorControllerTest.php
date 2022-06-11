<?php


/**
 * Description of GostControllerTest
 *
 * @author Teodora
 */
namespace App\Controllers;
use CodeIgniter\Test\ControllerTester;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Config\Factories;

class AdministratorControllerTest extends CIUnitTestCase {
   
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
                'brojOcena'=>'1',
                'ukupanZbirOcena'=>'2'
            ],
           (object)[
              'IdSalon'=>'2',
                'naziv'=>'Salon2',
                'slika'=>'/web/slika2.png',
                'ponedeljak-petakOD'=>'12:00:00',
                'ponedeljak-petakDO'=>'13:00:00',
                'brojOcena'=>'1',
                'ukupanZbirOcena'=>'4'
            ]
        ];
        $salon= (object)[
              'IdSalon'=>'2',
                'naziv'=>'Salon2',
                'slika'=>'/web/slika2.png',
                'ponedeljak-petakOD'=>'12:00:00',
                'ponedeljak-petakDO'=>'13:00:00',
                'brojOcena'=>'1',
                'ukupanZbirOcena'=>'4'
            ];
                
    
            $mockves=$this->createMock(\App\Models\SalonModel::class);
            $mockves->method('sviSaloni2')->willReturn($saloni);
            $mockves->method('sviSaloni')->willReturn($saloni);
            $mockves->method('brojSalona')->willReturn(4);
               $mockves->method('pronadjiSalon')->willReturn($salon);
            Factories::injectMock('models','\App\Models\SalonModel',$mockves);
            
        
           
              $korisnik=(object)[
               'IdRK'=>'1',
               'korisnickoIme'=>'korisnik1',
               'email'=>"kor1@gmail.com",
               'tipKorisnika'=>'S',
               'brojTelefona'=>"+381612629855",
               'lozinka'=>'1230',
               'adresa'=>'adrsa1',
               'jeObrisan'=>0,
               'jeOdobrenZahtevZaRegistraciju'=>1
           ] ;
            
           $mockRegKorisnik=$this->createMock(\App\Models\RegKorisnikModel::class);
           $mockRegKorisnik->method('pronadji')->willReturn($korisnik);
            $mockRegKorisnik->method('nadjiKorisnike')->willReturn(null);
             $mockRegKorisnik->method('obrisiKorisnika')->willReturn(true);
           $mockRegKorisnik->method('pronadjiPoIdu')->willReturn($korisnik);
            $mockRegKorisnik->method('odobriKorisnika')->willReturn(true);
        

            Factories::injectMock('models','\App\Models\RegKorisnikModel',$mockRegKorisnik);
            
            
            $usluge=[
                (object)[
                    'IdSalon'=>"1",
                    'IdUsluga'=>'1',
                    'cenaVelikiPas'=>3000,
                    'cenaSrednjiPas'=>200,
                    'cenaMaliPas'=>1
                ]
            ];
               $mockUsl=$this->createMock(\App\Models\CenaUslugeModel::class);
             $mockUsl->method('sveUslugeSalona')->willReturn($usluge);
        ;
                Factories::injectMock('models','\App\Models\CenaUslugeModel',$mockUsl); 
          
                
             $usl=
                (object)[
                    
                    'IdUsluga'=>'1',
                    'Naziv'=>'Kupanje'
                ];
            
               $mockUsl1=$this->createMock(\App\Models\UslugaModel::class);
             $mockUsl1->method('pronadjiNazivPoIdu')->willReturn($usl);
                Factories::injectMock('models','\App\Models\UslugaModel',$mockUsl1); 
          
                
    } 
    //Index
    public function test_Administrator_index(){ 
        $result=$this->controller('\App\Controllers\Administrator')->
                execute("index"); 
       $this->assertTrue($result->see("Dobrodošli u GroomRoom administratore!",'h2')); 
    }
    
     /**
     * Funkcionalnost pregled usluga
     */
      public function test_Administrator_pregledUsluga(){ 
        $result=$this->controller('\App\Controllers\Administrator')->
                execute("pregled_usluga"); 
       $this->assertTrue($result->see("USLUGE",'h2')); 
       $this->assertTrue($result->see("Šišanje",'span')); 
       $this->assertTrue($result->see("Kupanje",'span')); 
       $this->assertTrue($result->see("Češljanje",'span')); 
       $this->assertTrue($result->see("Čišćenje ušiju",'span')); 
       $this->assertTrue($result->see("Frizura",'span')); 
       $this->assertTrue($result->see("Sređivanje noktiju",'span'));       
    }
    
    /**
     * Funkcionalnost pregled salona
     */
     public function test_pregledSalona(){ 
        $result=$this->controller('\App\Controllers\Administrator')->
                execute("pregled_salona"); 
       $this->assertTrue($result->see("SALONI",'h2')); 
       $this->assertTrue($result->see("Salon1",'h2')); 
       $this->assertTrue($result->see("Salon2",'h2'));     
    }
    
    /**
     * Funkcionalnost logout
     */
     public function test_odjavljivanje(){ 
     $result=$this->controller('\App\Controllers\Administrator')->
                execute("logout"); 
     //  $_SESSION['ulogovaniKorisnik']=null;
     $result->assertRedirect();
    // $result->assertTrue($result->see("Dobrodošli u GroomRoom!",'h2'));  
    }
    
    /**
     * Funcionalnost brisanje naloga
     */
     public function test_brisanjeNaloga(){ 
     $result=$this->controller('\App\Controllers\Administrator')->
                execute("brisanje_naloga"); 
    $this->assertTrue($result->see("Trenutno nema neuklonjenih registrovanih naloga!",'p')); 
    }
    
      /**
     * Funcionalnost brisanje naloga
     */
     public function test_brisanjeNalogaSaK(){ 
         
               $korisnici=[(object)[
               'IdRK'=>'1',
               'korisnickoIme'=>'korisnik1',
               'email'=>"kor1@gmail.com",
               'tipKorisnika'=>'A',
               'brojTelefona'=>"+381612629855",
               'lozinka'=>'1230',
               'adresa'=>'adrsa1',
               'jeObrisan'=>0,
               'jeOdobrenZahtevZaRegistraciju'=>1
           ],
                  (object)['IdRK'=>'3',
               'korisnickoIme'=>'korisnik3',
               'email'=>"kor31@gmail.com",
               'tipKorisnika'=>'A',
               'brojTelefona'=>"+381612623855",
               'lozinka'=>'1230',
               'adresa'=>'adrsa1',
               'jeObrisan'=>0,
               'jeOdobrenZahtevZaRegistraciju'=>1
                  ]] ;
            $mockRegKorisnik=$this->createMock(\App\Models\RegKorisnikModel::class);
            $mockRegKorisnik->method('nadjiKorisnike')->willReturn($korisnici);
            Factories::injectMock('models','\App\Models\RegKorisnikModel',$mockRegKorisnik);
            
           
           $result=$this->controller('\App\Controllers\Administrator')->
                execute("brisanje_naloga"); 
          // $result->assertTrue($result->see("Ukloni korisnika",'<th>')); 
           $this->assertFalse($result->see("Trenutno nema neuklonjenih registrovanih naloga!",'p')); 
    }
    
    
       public function myProvider()
    {
        $data =  [
            [1]
        ];
        return $data;
    }
    
    /**
     * Funckionalnost brisanje naloga
     * @dataProvider myProvider
     */
    public function test_brisanjeNK2($a) {
          $result=$this->controller('\App\Controllers\Administrator')->
          execute('ukloniKorisnika', $a);
          $mockAdmin=$this->createMock(\App\Controllers\Administrator::class);
          $mockAdmin->method('brisanje_naloga')->willReturn("Porukica");
          Factories::injectMock('models','\App\Controllers\Administrator',$mockAdmin);
           $this->assertEquals("Porukica", $mockAdmin->brisanje_naloga());  
    }
    
    /**
     * Funckionalnost odobavanje zahteva za registraciju
     */
    public function test_odobrReg1(){ 
         $korisnici=[(object)[
               'IdRK'=>'1',
               'korisnickoIme'=>'korisnik1',
               'email'=>"kor1@gmail.com",
               'tipKorisnika'=>'A',
               'brojTelefona'=>"+381612629855",
               'lozinka'=>'1230',
               'adresa'=>'adrsa1',
               'jeObrisan'=>0,
               'jeOdobrenZahtevZaRegistraciju'=>0
           ],
                  (object)['IdRK'=>'3',
               'korisnickoIme'=>'korisnik3',
               'email'=>"kor31@gmail.com",
               'tipKorisnika'=>'A',
               'brojTelefona'=>"+381612623855",
               'lozinka'=>'1230',
               'adresa'=>'adrsa1',
               'jeObrisan'=>0,
               'jeOdobrenZahtevZaRegistraciju'=>0
                  ]] ;
          $mockRegKorisnik=$this->createMock(\App\Models\RegKorisnikModel::class);
          $mockRegKorisnik->method('jeOdobrenZahtevZaRegistraciju')->willReturn($korisnici);
          $mockRegKorisnik->method('sviKojimaNijeOdobren')->willReturn(null);
          $result=$this->controller('\App\Controllers\Administrator')->
             execute("zahtevi_za_registraciju"); 
           $this->assertTrue($result->see("Trenutno nema nijednog neobrađenog zahteva!",'h2')); 
    }
    
       /**
     * Funckionalnost odobavanje zahteva za registraciju
     */
    public function test_odobrRe2(){ 
         $korisnici=[(object)[
               'IdRK'=>'1',
               'korisnickoIme'=>'korisnik1',
               'email'=>"kor1@gmail.com",
               'tipKorisnika'=>'A',
               'brojTelefona'=>"+381612629855",
               'lozinka'=>'1230',
               'adresa'=>'adrsa1',
               'jeObrisan'=>0,
               'jeOdobrenZahtevZaRegistraciju'=>0
           ],
                  (object)['IdRK'=>'3',
               'korisnickoIme'=>'korisnik3',
               'email'=>"kor31@gmail.com",
               'tipKorisnika'=>'A',
               'brojTelefona'=>"+381612623855",
               'lozinka'=>'1230',
               'adresa'=>'adrsa1',
               'jeObrisan'=>0,
               'jeOdobrenZahtevZaRegistraciju'=>0
                  ]] ;
          $mockRegKorisnik=$this->createMock(\App\Models\RegKorisnikModel::class);
          $mockRegKorisnik->method('jeOdobrenZahtevZaRegistraciju')->willReturn($korisnici);
          $n1=1;
          $mockRegKorisnik->method('sviKojimaNijeOdobren')->willReturn($n1);
          $result=$this->controller('\App\Controllers\Administrator')->
             execute("zahtevi_za_registraciju"); 
           $this->assertTrue($result->see("Trenutno nema nijednog neobrađenog zahteva!",'h2')); 
    }
    
     /**
      * @dataProvider myProvider
     * Funckionalnost odobavanje zahteva za registraciju
     */
    public function test_oddobriK($a){ 
           $mockAdmin=$this->createMock(\App\Controllers\Administrator::class);
          $mockAdmin->method('zahtevi_za_registraciju')->willReturn("Porukica");
          $result=$this->controller('\App\Controllers\Administrator')->
             execute("odobriKorisnika",$a); 
            $this->assertEquals("Porukica", $mockAdmin->zahtevi_za_registraciju());  
    }
    
      
     /**
      * @dataProvider myProvider
     * Funckionalnost odobavanje zahteva za registraciju
     */
    public function test_odbijK($a){ 
           $mockAdmin=$this->createMock(\App\Controllers\Administrator::class);
          $mockAdmin->method('zahtevi_za_registraciju')->willReturn("Porukica");
          $result=$this->controller('\App\Controllers\Administrator')->
             execute("odbijKorisnika",$a); 
            $this->assertEquals("Porukica", $mockAdmin->zahtevi_za_registraciju());  
    }
    
         public function myProvider2()
    {
               $saloni=
            (object)[
                'IdSalon'=>'1',
                'naziv'=>'Salon1',
                'slika'=>'/web/slika1.png',
                'ponedeljak-petakOD'=>'16:00:00',
                'ponedeljak-petakDO'=>'17:00:00',
                 'subotaOD'=>'13:00:00',
                 'subotaDO'=>'17:00:00',
                 'nedeljaOD'=>'13:00:00',
                 'nedeljaDO'=>'17:00:00',
                'brojOcena'=>'1',
                'ukupanZbirOcena'=>'2'
            ];
                 $korisnik=(object)[
               'IdRK'=>'1',
               'korisnickoIme'=>'korisnik1',
               'email'=>"kor1@gmail.com",
               'tipKorisnika'=>'S',
               'brojTelefona'=>"+381612629855",
               'lozinka'=>'1230',
               'adresa'=>'adrsa1',
               'jeObrisan'=>0,
               'jeOdobrenZahtevZaRegistraciju'=>1
           ] ;
             
             
             
             
        $data =  [
            [$korisnik,$saloni]
        ];
        return $data;
    }
    
    
   /**
      * @dataProvider myProvider2
     * Funckionalnost odobavanje zahteva za registraciju
     */
    public function test_prikaziOvo($a,$b){ 
         
          $result=$this->controller('\App\Controllers\Administrator')->
             execute("prikaziOvo",$a,$b); 
            //$this->assertEquals("Porukica", $mockAdmin->zahtevi_za_registraciju());  
         
           $this->assertTrue($result->see("Pregled korisnikove forme za registraciju",'h2')); 
    }
    
    
       
    public function test_sisanje(){
        $result=$this->controller('\App\Controllers\Administrator')->
             execute("sisanje");
        $this->assertTrue($result->see("ŠIŠANJE",'h2'));
    } 
    
    public function test_kupanje(){
        $result=$this->controller('\App\Controllers\Administrator')->
             execute("kupanje");
        $this->assertTrue($result->see("KUPANJE",'h2'));
    } 
    
     public function test_ciscenje_usiju(){
        $result=$this->controller('\App\Controllers\Administrator')->
             execute("ciscenje_usiju");
        $this->assertTrue($result->see("ČIŠĆENJE UŠIJU",'h2'));
    } 
    
    public function test_ciscenje_ociju(){
        $result=$this->controller('\App\Controllers\Administrator')->
             execute("ciscenje_ociju");
        $this->assertTrue($result->see("ČIŠĆENJE OČIJU",'h2'));
    } 
    
    public function test_frizura(){
        $result=$this->controller('\App\Controllers\Administrator')->
             execute("frizura");
        $this->assertTrue($result->see("FRIZURA",'h2'));
    } 
    
     public function test_sredjivanje_noktiju(){
        $result=$this->controller('\App\Controllers\Administrator')->
             execute("sredjivanje_noktiju");
        $this->assertTrue($result->see("SREĐIVANJE NOKTIJU",'h2'));
    } 
    public function test_cesljanje(){
        $result=$this->controller('\App\Controllers\Administrator')->
             execute("cesljanje");
        $this->assertTrue($result->see("ČEŠLJANJE",'h2'));
    } 
    
    
    
  public function myProvider3()
    {     
        $data =  [
            [1]
        ];
        return $data;
    }
    
    /**
      * @dataProvider myProvider3
     * Funckionalnost odobavanje zahteva za registraciju
     */
    public function test_SaznajVise($a){ 
         
          $result=$this->controller('\App\Controllers\Administrator')->
             execute("sredjivanje_noktiju");
        $this->assertTrue($result->see("SREĐIVANJE NOKTIJU",'h2'));
    }
    
}
