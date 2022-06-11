<?php


/**
 * Description of GostControllerTest
 *
 * Pavle Stefanovic 0562/18
 * Teodora Peric 0283/18
 */
namespace App\Controllers;

use CodeIgniter\Test\ControllerTester;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Config\Factories;

class GostControllerTest extends CIUnitTestCase {
   
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
            $mockves=$this->createMock(\App\Models\SalonModel::class);
            $mockves->method('sviSaloni2')->willReturn($saloni);
            $mockves->method('sviSaloni')->willReturn($saloni);
            $mockves->method('brojSalona')->willReturn(4);
            Factories::injectMock('models','\App\Models\SalonModel',$mockves);
            
            
            /**
             * loginobrada korisnickoImePostoji
             */
            
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
             $mockReg=$this->createMock(\App\Models\RegKorisnikModel::class);
            $mockReg->method('nadjiPrekoKorIme')->willReturn($korisnik);
            Factories::injectMock('models','\App\Models\RegKorisnikModel',$mockReg);
           
    } 
    
    public function test_Gost_index(){ 
        $result=$this->controller('\App\Controllers\Gost')->
                execute("index"); 
       $this->assertTrue($result->see("Dobrodošli u GroomRoom!",'h2')); 
    }
        
       
    public function test_sisanje(){
        $result=$this->controller('\App\Controllers\Gost')->
             execute("sisanje");
        $this->assertTrue($result->see("ŠIŠANJE",'h2'));
    } 
    
    public function test_kupanje(){
        $result=$this->controller('\App\Controllers\Gost')->
             execute("kupanje");
        $this->assertTrue($result->see("KUPANJE",'h2'));
    } 
    
     public function test_ciscenje_usiju(){
        $result=$this->controller('\App\Controllers\Gost')->
             execute("ciscenje_usiju");
        $this->assertTrue($result->see("ČIŠĆENJE UŠIJU",'h2'));
    } 
    
    public function test_ciscenje_ociju(){
        $result=$this->controller('\App\Controllers\Gost')->
             execute("ciscenje_ociju");
        $this->assertTrue($result->see("ČIŠĆENJE OČIJU",'h2'));
    } 
    
    public function test_frizura(){
        $result=$this->controller('\App\Controllers\Gost')->
             execute("frizura");
        $this->assertTrue($result->see("FRIZURA",'h2'));
    } 
    
     public function test_sredjivanje_noktiju(){
        $result=$this->controller('\App\Controllers\Gost')->
             execute("sredjivanje_noktiju");
        $this->assertTrue($result->see("SREĐIVANJE NOKTIJU",'h2'));
    } 
    public function test_cesljanje(){
        $result=$this->controller('\App\Controllers\Gost')->
             execute("cesljanje");
        $this->assertTrue($result->see("ČEŠLJANJE",'h2'));
    } 
    
    /**
     * Funkcionalnost pregled usluga
     */
      public function test_Administrator_pregledUsluga(){ 
        $result=$this->controller('\App\Controllers\Gost')->
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
        $result=$this->controller('\App\Controllers\Gost')->
                execute("pregled_salona"); 
       $this->assertTrue($result->see("SALONI",'h2')); 
       $this->assertTrue($result->see("Salon1",'h2')); 
       $this->assertTrue($result->see("Salon2",'h2'));     
    }
    
      /**
     * Funkcionalnost login
     */
      public function test_login(){ 
        $result=$this->controller('\App\Controllers\Gost')->
                execute("login"); 
       $this->assertTrue($result->see("Login",'button'));  
    }
    
      /**
     * Funkcionalnost registracija
     */
      public function test_reg(){ 
        $result=$this->controller('\App\Controllers\Gost')->
                execute("registracija"); 
       $this->assertTrue($result->see("Izaberite tip korisnika",'p'));  
    }
    /*
     * loginObrada korisnicko ime ne postoji
     */
    public function test_loginObrada1(){ 
         $mockReg=$this->createMock(\App\Models\RegKorisnikModel::class);
            $mockReg->method('nadjiPrekoKorIme')->willReturn(null);
            Factories::injectMock('models','\App\Models\RegKorisnikModel',$mockReg);
          $result=$this->controller('\App\Controllers\Gost')->
                execute("loginObrada"); 
       $this->assertTrue($result->see("Korisnik ne postoji!",'td'));  
    }
    
     /*
     * loginObrada je obrisan
     */
    public function test_loginObrada2(){ 
        
              $korisnik=(object)[
               'IdRK'=>'1',
               'korisnickoIme'=>'korisnik1',
               'email'=>"kor1@gmail.com",
               'tipKorisnika'=>'S',
               'brojTelefona'=>"+381612629855",
               'lozinka'=>'1230',
               'adresa'=>'adrsa1',
               'jeObrisan'=>1,
               'jeOdobrenZahtevZaRegistraciju'=>1
           ] ;
         $mockReg=$this->createMock(\App\Models\RegKorisnikModel::class);
            $mockReg->method('nadjiPrekoKorIme')->willReturn($korisnik);
            Factories::injectMock('models','\App\Models\RegKorisnikModel',$mockReg);
          $result=$this->controller('\App\Controllers\Gost')->
                execute("loginObrada"); 
       $this->assertTrue($result->see("Korisnik je obrisan!",'td'));  
    }
    
       /*
     * loginObrada pogresna lozinka
     */
    public function test_loginObrada3(){ 
  
        
              $korisnik=(object)[
               'IdRK'=>'1',
               'korisnickoIme'=>'korisnik1',
               'email'=>"kor1@gmail.com",
               'tipKorisnika'=>'S',
               'brojTelefona'=>"+381612629855",
               'lozinka'=>'12344',
               'adresa'=>'adrsa1',
               'jeObrisan'=>0,
               'jeOdobrenZahtevZaRegistraciju'=>1
           ] ;
              
         $mockReg=$this->createMock(\App\Models\RegKorisnikModel::class);
            $mockReg->method('nadjiPrekoKorIme')->willReturn($korisnik);
            Factories::injectMock('models','\App\Models\RegKorisnikModel',$mockReg);
          $result=$this->controller('\App\Controllers\Gost')->
                execute("loginObrada"); 
       $this->assertTrue($result->see("Pogrešna lozinka!",'td'));  
      
    }
     /*
     * loginObrada uspesno
     */
    public function test_loginObrada4(){ 
     
              $korisnik=(object)[
               'IdRK'=>'1',
               'korisnickoIme'=>'korisnik1',
               'email'=>"kor1@gmail.com",
               'tipKorisnika'=>'S',
               'brojTelefona'=>"+381612629855",
               'lozinka'=>'',
               'adresa'=>'adrsa1',
               'jeObrisan'=>0,
               'jeOdobrenZahtevZaRegistraciju'=>1
           ] ;
              
         $mockReg=$this->createMock(\App\Models\RegKorisnikModel::class);
            $mockReg->method('nadjiPrekoKorIme')->willReturn($korisnik);
            Factories::injectMock('models','\App\Models\RegKorisnikModel',$mockReg);
          $result=$this->controller('\App\Controllers\Gost')->
                execute("loginObrada"); 
       $this->assertFalse($result->see("Pogrešna lozinka!",'td'));  
        $result->assertRedirect();
    }
    
     /*
     * Funkcionalnost promena lozinke
     */
    public function test_prLozinke(){ 
  
          $result=$this->controller('\App\Controllers\Gost')->
                execute("promenaLozinke"); 
       $this->assertTrue($result->see("PROMENI LOZINKU",'button'));  
       
    }
    
     /*
     *promenaLozinkeObrada korisnik ne postoji
     */
    public function test_prLozObrada1(){ 
    $mockReg=$this->createMock(\App\Models\RegKorisnikModel::class);
            $mockReg->method('nadjiPrekoKorIme')->willReturn(null);
            Factories::injectMock('models','\App\Models\RegKorisnikModel',$mockReg);
          $result=$this->controller('\App\Controllers\Gost')->
                execute("promenaLozinkeObrada"); 
       $this->assertTrue($result->see("Korisnik ne postoji!",'td'));  
       
    }
    
     /*
     * promenaLozinkeObrada je obrisan
     */
    public function test_prLozObrada2(){ 
        
              $korisnik=(object)[
               'IdRK'=>'1',
               'korisnickoIme'=>'korisnik1',
               'email'=>"kor1@gmail.com",
               'tipKorisnika'=>'S',
               'brojTelefona'=>"+381612629855",
               'lozinka'=>'1230',
               'adresa'=>'adrsa1',
               'jeObrisan'=>1,
               'jeOdobrenZahtevZaRegistraciju'=>1
           ] ;
         $mockReg=$this->createMock(\App\Models\RegKorisnikModel::class);
            $mockReg->method('nadjiPrekoKorIme')->willReturn($korisnik);
            Factories::injectMock('models','\App\Models\RegKorisnikModel',$mockReg);
          $result=$this->controller('\App\Controllers\Gost')->
                execute("promenaLozinkeObrada"); 
       $this->assertTrue($result->see("Korisnik ne postoji!",'td'));  
    }
    
       /*
     * promenaLozinkeObrada  pogresna lozinka
     */
    public function test_prLozObrada3(){ 
        
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
         $mockReg=$this->createMock(\App\Models\RegKorisnikModel::class);
            $mockReg->method('nadjiPrekoKorIme')->willReturn($korisnik);
            Factories::injectMock('models','\App\Models\RegKorisnikModel',$mockReg);
          $result=$this->controller('\App\Controllers\Gost')->
                execute("promenaLozinkeObrada"); 
       $this->assertTrue($result->see("Neispravna vrednost stare lozinke!",'td'));  
    }
      /*
     * promenaLozinkeObrada  
     */
    public function test_prLozObrada5(){ 
    
    $_POST['korime']='korisnik1';
    $_POST['staraLoz']='1230';
    $_POST['novaLoz']='123456';
    $_POST['potvrdaLoz']='123456';
    \CodeIgniter\Config\Services::injectMock('request',$this->request);
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
         $mockReg=$this->createMock(\App\Models\RegKorisnikModel::class);
            $mockReg->method('nadjiPrekoKorIme')->willReturn($korisnik);
            Factories::injectMock('models','\App\Models\RegKorisnikModel',$mockReg);
          $result=$this->controller('\App\Controllers\Gost')->
                execute("promenaLozinkeObrada"); 
           $this->assertFalse($result->see("Nova lozinke i potvrda nisu iste!",'td'));  
             $this->assertFalse($result->see("Korisnik ne postoji!",'td'));  
    }
    /**
     * registracija uspesno
     */
    public function test_poslatZahtev(){ 
        $_SESSION['trenutniMejlZaSlanjePotvrdeORegistraciji']='kor1@gmail.com';
         \CodeIgniter\Config\Services::injectMock('session',$this->session);
        $result=$this->controller('\App\Controllers\Gost')->
                execute("poslatZahtevZaRegistraciju"); 
           $this->assertTrue($result->see("Poštovani korisniče, možete očekivati potvrdu zahteva za registraciju na mail",'h2'));  
    }
    
    
    
    public function myProvider1()
    {     
        $data =  [
            ["10:20:00","10:40:00"]
        ];
        return $data;
    }
    
    /**
      * @dataProvider myProvider1
     * 
     * proveri vreme funkcija kod registracije salona
     */
     
  /*  public function test_proveriVreme($a,$b){ 
         
          $result=$this->controller('\App\Controllers\Gost')->
             execute("proveriVreme",$a,$b);
        $this->assertFalse($result);
    }*/
    /**
     * Registracija Korisnik reset
     */
   public function test_RK1(){ 
     $_POST['resetKorisnik']='reset';
   
    \CodeIgniter\Config\Services::injectMock('request',$this->request);
          $result=$this->controller('\App\Controllers\Gost')->
             execute("registracijaSubmitKorisnik");
          $this->assertTrue($result->see("Izaberite tip korisnika",'p'));  
           $this->assertFalse($result->see("Unesite Ime!",'td')); 
            $this->assertFalse($result->see("Unesite Prezime!",'td')); 
                $this->assertFalse($result->see("Unesite Potvrdu lozinke!",'td')); 
    }
    
   /**
     * Registracija Korisnik broj telefona neispravan
     */
 public function test_RK2(){ 
       $_POST['submitKorisnik']='submit';
      $_POST['brojTelefonaKorisnik']='reset';
   
    \CodeIgniter\Config\Services::injectMock('request',$this->request);
          $result=$this->controller('\App\Controllers\Gost')->
             execute("registracijaSubmitKorisnik"); 
      $this->assertFalse($result->see("Unesite ispravno Broj telefona!",'td')); 
          
    }
    
        
   /**
     * Registracija Korisnik email neispravan
     */
   public function test_RK3(){ 
      $_POST['submitKorisnik']='submit';
      $_POST['emailKorisnik']='reset';
   
    \CodeIgniter\Config\Services::injectMock('request',$this->request);
          $result=$this->controller('\App\Controllers\Gost')->
             execute("registracijaSubmitKorisnik"); 
      $this->assertFalse($result->see("Unesite ispravno Email!",'td')); 
          
    }
    
     /**
     * Registracija Korisnik potvrda lozinke se ne poklapa sa lozinkom
     */
   public function test_RK4(){ 
      $_POST['submitKorisnik']='submit';
      
   
    \CodeIgniter\Config\Services::injectMock('request',$this->request);
          $result=$this->controller('\App\Controllers\Gost')->
             execute("registracijaSubmitKorisnik"); 
      $this->assertFalse($result->see("Potvrda lozinke se ne poklapa <br> sa lozinkom!",'td')); 
          
    }
    
    
    
    
    
    
    
        /**
     * Registracija Korisnik reset
     */
   public function test_RS1(){ 
     $_POST['resetSalon']='reset';
   
    \CodeIgniter\Config\Services::injectMock('request',$this->request);
          $result=$this->controller('\App\Controllers\Gost')->
             execute("registracijaSubmitSalon");
         
           $this->assertFalse($result->see("Unesite Naziv!",'td')); 
                $this->assertFalse($result->see("Unesite Potvrdu lozinke!",'td')); 
    }
        /**
     * Registracija Korisnik reset
     */
  public function test_RM1(){ 
     $_POST['resetMenadzer']='reset';
   
    \CodeIgniter\Config\Services::injectMock('request',$this->request);
          $result=$this->controller('\App\Controllers\Gost')->
             execute("registracijaSubmitMenadzer");
       
           $this->assertFalse($result->see("Unesite Ime!",'td')); 
            $this->assertFalse($result->see("Unesite Prezime!",'td')); 
                $this->assertFalse($result->see("Unesite Potvrdu lozinke!",'td')); 
    }
     /**
     * Registracija Korisnik broj telefona neispravan
     */
 public function test_RM2(){ 
       $_POST['submitMenadzer']='submit';
      $_POST['brojTelefonaMenadzer']='reset';
   
    \CodeIgniter\Config\Services::injectMock('request',$this->request);
          $result=$this->controller('\App\Controllers\Gost')->
             execute("registracijaSubmitMenadzer"); 
      $this->assertFalse($result->see("Unesite ispravno Broj telefona!",'td')); 
          
    }
    
        
   /**
     * Registracija Korisnik email neispravan
     */
   public function test_RM3(){ 
    $_POST['submitMenadzer']='submit';
      $_POST['emailMenadzer']='reset';
   
    \CodeIgniter\Config\Services::injectMock('request',$this->request);
          $result=$this->controller('\App\Controllers\Gost')->
             execute("registracijaSubmitMenadzer"); 
      $this->assertFalse($result->see("Unesite ispravno Email!",'td')); 
          
    }
    
     /**
     * Registracija Korisnik potvrda lozinke se ne poklapa sa lozinkom
     */
   public function test_RM4(){ 
    $_POST['submitMenadzer']='submit';
      
   
    \CodeIgniter\Config\Services::injectMock('request',$this->request);
          $result=$this->controller('\App\Controllers\Gost')->
             execute("registracijaSubmitMenadzer"); 
      $this->assertFalse($result->see("Potvrda lozinke se ne poklapa <br> sa lozinkom!",'td')); 
          
    }
}
