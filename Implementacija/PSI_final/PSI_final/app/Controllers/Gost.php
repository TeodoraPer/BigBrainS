<?php

// Aleksandra Dragojlovic 0409/19 funkcionalnost promena lozinke

namespace App\Controllers;

use App\Models\RegKorisnikModel;
use App\Models\KorisnikMenadzerModel;

class Gost extends BaseController { 


      /*Perić Teodora 0283/18 
    metoda za prikaz stranice Gosta podrazumeva poziv odgovarajućih view-a.
   */
  protected function prikaz($page,$data,$isRegistration=null){ 
    $data['controller']='Gost';
    if($isRegistration==null)
      echo view ('sabloni/header_gost',$data);
    else 
        echo view ('sabloni/header_registracija',$data);
    echo view("stranice/$page",$data);
    echo view ('sabloni/footer');
}

 /**Perić Teodora 0283/18 
metoda koja se očitava pri pristupu aplikaciji sa URL-om: localhost:8080, urađene su 
promene u klasi Routes da bi se ovo omogućilo
*/

    /* Perić Teodora 0283/18 
      metoda koja se očitava pri pristupu aplikaciji sa URL-om: localhost:8080, urađene su
      promene u klasi Routes da bi se ovo omogućilo
     */

    public function index() {

        $this->prikaz('promena_lozinke', []);
    }

    public function pregled_salona() {
        $this->prikaz('centar_gost', []);
    }

    public function pregled_usluga() {
        $this->prikaz('centar_gost', []);
    }

    //Anastasija Volcanovska 0092/19
    public function login($poruka = null) {
        $this->prikaz('login', ['poruka' => $poruka]);
    }
     /**
     * Teodora Peric 0283/18 prikaz registracije podrazumeva prikaz novog hedera
     */
    public function registracija($poruka=null,$reset=null){
        
        $this->prikaz('registracija',['poruka'=>$poruka, 'resetuj'=>$reset],"registracija");
    
}
 /**
     * Registracija Teodora Perić 0283/18
    */
    public function registracijaSubmitKorisnik(){ 
        /**
    * provera da li se kliknulo na dugme reset ili ne
   */
      if(!isset($_POST['submitKorisnik'])&&!isset($_POST['resetKorisnik']))
           return; 
       if(isset($_POST['resetKorisnik'])) { 
           $resetujSve="resetujSve";
           $this->prikaz('registracija',['resetujSve'=>$resetujSve],"registracija");
         return;
       }
          
         if(!$this->validate(['imeKorisnik'=>'required|min_length[1]|max_length[45]',
           'prezimeKorisnik'=>'required|min_length[1]|max_length[45]',
           'korisnickoImeKorisnik'=>'required|min_length[1]|max_length[45]',
           'emailKorisnik'=>'required|valid_email|min_length[3]|max_length[45]',
           'brojTelefonaKorisnik'=>'required|regex_match[/^\+381[0-9]{8,9}$/]',
           'adresaKorisnik'=>'required|min_length[1]|max_length[45]',
           'lozinkaKorisnik'=>'required|min_length[1]|max_length[45]',
           'potvrdaLozinkeKorisnik'=>'required|min_length[1]|max_length[45]'
           ])){ 
           $nizGresaka=$this->validator->getErrors();
                    if(isset($nizGresaka['imeKorisnik'])) $nizGresaka['imeKorisnik']="Unesite Ime!";
                    if(isset($nizGresaka['prezimeKorisnik'])) $nizGresaka['prezimeKorisnik']="Unesite Prezime!";
                    if(isset($nizGresaka['korisnickoImeKorisnik'])) $nizGresaka['korisnickoImeKorisnik']="Unesite Korisničko ime!";
                    if(isset($nizGresaka['emailKorisnik'])) $nizGresaka['emailKorisnik']="Unesite ispravno Email!";  
                    if(isset($nizGresaka['brojTelefonaKorisnik'])) $nizGresaka['brojTelefonaKorisnik']="Unesite ispravno Broj telefona!";
                    if(isset($nizGresaka['adresaKorisnik'])) $nizGresaka['adresaKorisnik']="Unesite Adresu!";
                    if(isset($nizGresaka['lozinkaKorisnik'])) $nizGresaka['lozinkaKorisnik']="Unesite Lozinku!";
                    if(isset($nizGresaka['potvrdaLozinkeKorisnik'])) $nizGresaka['potvrdaLozinkeKorisnik']="Unesite Potvrdu lozinke!";
                             return $this->prikaz('registracija',['errors'=>$nizGresaka],"registracija");
        
       }
     
         /**
         * proverava se da li se lozinka i potvrda lozinke poklapaju
         */
       if(strcmp($this->request->getPost('lozinkaKorisnik'),$this->request->getPost('potvrdaLozinkeKorisnik'))!=0){ 
            $nizGresaka['potvrdaLozinkeKorisnik']="Potvrda lozinke se ne poklapa <br> sa lozinkom!";
            return $this->prikaz('registracija',['errors'=>$nizGresaka],"registracija");
       }
       
       /**
         * proverava se da li je korisnicko ime jedinstveno u sistemu, ako nije, ispisuje se poruka o gresci
         */
       $registrovaniKorisnikModel=new RegKorisnikModel();
       $korisnik=$registrovaniKorisnikModel->pronadjiRegKorisnikaPoParametru("korisnickoIme",$this->request->getVar('korisnickoImeKorisnik'));
       if($korisnik!=null){ 
           $resetuj="korisnickoImeKorisnik";
           return $this->registracija('Korisničko ime nije jedinstveno u sistemu. Unesite novo korisničko ime!',$resetuj);
       }
       
        /**
         * proverava se da li je email jedinstven u sistemu, ako nije, ispisuje se poruka o gresci
         */
       $email=$registrovaniKorisnikModel->pronadjiRegKorisnikaPoParametru("email",$this->request->getVar('emailKorisnik'));
         if($email!=null){ 
           $resetuj="emailKorisnik";
           return $this->registracija('Email nije jedinstven u sistemu. Unesite novi email!',$resetuj);
       }
       /**
         * proverava se da li je broj telefona jedinstven u sistemu, ako nije, ispisuje se poruka o gresci
         */
       $brojTel=$registrovaniKorisnikModel->pronadjiRegKorisnikaPoParametru("brojTelefona",$this->request->getVar('brojTelefonaKorisnik'));
         if($brojTel!=null){ 
           $resetuj="brojTelefonaKorisnik";
           return $this->registracija('Broj telefona nije jedinstven u sistemu. Unesite novi broj telefona!',$resetuj);
       }
          /**
         *uspesno registrovanje koje podrazumeva ubacivanje entiteta u tabele registrovaniKorisnik i korisnikMenadzer
         */
    
       $registrovaniKorisnikModel->ubaciKorisnika($this->request);
       $this->session->set('trenutniMejlZaSlanjePotvrdeORegistraciji', $this->request->getVar('emailKorisnik'));
       return redirect()->to(site_url('Gost/poslatZahtevZaRegistraciju'));
   }
   
   
   
    public function registracijaSubmitMenadzer()
    { 
        /**
       * provera da li se kliknulo na dugme reset ili ne
       */
      if(!isset($_POST['submitMenadzer'])&&!isset($_POST['resetMenadzer']))
           return; 
       if(isset($_POST['resetMenadzer'])) { 
           $resetujSveM="resetujSve";
         $this->prikaz('registracija',['resetujSveM'=>$resetujSveM],"registracija");
         return;
        //  return redirect()->to(site_url("Gost/registracija"));
       }
      
         if(!$this->validate(['imeMenadzer'=>'required|min_length[1]|max_length[45]',
           'prezimeMenadzer'=>'required|min_length[1]|max_length[45]',
           'korisnickoImeMenadzer'=>'required|min_length[1]|max_length[45]',
           'emailMenadzer'=>'required|valid_email|min_length[3]|max_length[45]',
           'brojTelefonaMenadzer'=>'required|regex_match[/^\+381[0-9]{8,9}$/]',
           'adresaMenadzer'=>'required|min_length[1]|max_length[45]',
           'lozinkaMenadzer'=>'required|min_length[1]|max_length[45]',
           'potvrdaLozinkeMenadzer'=>'required|min_length[1]|max_length[45]'
           ])){ 
           $nizGresaka=$this->validator->getErrors();
                    if(isset($nizGresaka['imeMenadzer'])) $nizGresaka['imeMenadzer']="Unesite Ime!";
                    if(isset($nizGresaka['prezimeMenadzer'])) $nizGresaka['prezimeMenadzer']="Unesite Prezime!";
                    if(isset($nizGresaka['korisnickoImeMenadzer'])) $nizGresaka['korisnickoImeMenadzer']="Unesite Korisničko ime!";
                    if(isset($nizGresaka['emailMenadzer'])) $nizGresaka['emailMenadzer']="Unesite ispravno Email!";  
                    if(isset($nizGresaka['brojTelefonaMenadzer'])) $nizGresaka['brojTelefonaMenadzer']="Unesite ispravno Broj telefona!";
                    if(isset($nizGresaka['adresaMenadzer'])) $nizGresaka['adresaMenadzer']="Unesite Adresu!";
                    if(isset($nizGresaka['lozinkaMenadzer'])) $nizGresaka['lozinkaMenadzer']="Unesite Lozinku!";
                    if(isset($nizGresaka['potvrdaLozinkeMenadzer'])) $nizGresaka['potvrdaLozinkeMenadzer']="Unesite Potvrdu lozinke!";
                             return $this->prikaz('registracija',['errorsMenadzer'=>$nizGresaka],"registracija");
        
       }
     
         /**
         * proverava se da li se lozinka i potvrda lozinke poklapaju
         */
       if(strcmp($this->request->getPost('lozinkaMenadzer'),$this->request->getPost('potvrdaLozinkeMenadzer'))!=0){ 
            $nizGresaka['potvrdaLozinkeMenadzer']="Potvrda lozinke se ne poklapa <br> sa lozinkom!";
            return $this->prikaz('registracija',['errorsMenadzer'=>$nizGresaka],"registracija");
       }
       
       /**
         * proverava se da li je korisnicko ime jedinstveno u sistemu, ako nije, ispisuje se poruka o gresci
         */
       $registrovaniKorisnikModel=new RegKorisnikModel();
       $korisnik=$registrovaniKorisnikModel->pronadjiRegKorisnikaPoParametru("korisnickoIme",$this->request->getVar('korisnickoImeMenadzer'));
       if($korisnik!=null){ 
           $resetuj="korisnickoImeMenadzer";
           return $this->registracija('Korisničko ime nije jedinstveno u sistemu. Unesite novo korisničko ime!',$resetuj);
       }
       
       /**
         * proverava se da li je email jedinstven u sistemu, ako nije, ispisuje se poruka o gresci
        */
       $email=$registrovaniKorisnikModel->pronadjiRegKorisnikaPoParametru("email",$this->request->getVar('emailMenadzer'));
         if($email!=null){ 
           $resetuj="emailMenadzer";
           return $this->registracija('Email nije jedinstven u sistemu. Unesite novi email!',$resetuj);
       }
       /**
         * proverava se da li je broj telefona jedinstven u sistemu, ako nije, ispisuje se poruka o gresci
         */
       $brojTel=$registrovaniKorisnikModel->pronadjiRegKorisnikaPoParametru("brojTelefona",$this->request->getVar('brojTelefonaMenadzer'));
         if($brojTel!=null){ 
           $resetuj="brojTelefonaMenadzer";
           return $this->registracija('Broj telefona nije jedinstven u sistemu. Unesite novi broj telefona!',$resetuj);
       }
          
       /**
         *uspesno registrovanje koje podrazumeva ubacivanje entiteta u tabele registrovaniKorisnik i korisnikMenadzer
       */
       $registrovaniKorisnikModel->ubaciMenadzer($this->request);
       $this->session->set('trenutniMejlZaSlanjePotvrdeORegistraciji', $this->request->getVar('emailMenadzer'));
       return redirect()->to(site_url('Gost/poslatZahtevZaRegistraciju'));
   }
   
    public function registracijaSubmitSalon(){ 
    /**
    * provera da li se kliknulo na dugme reset ili ne
     * 
   */
     
      if(!isset($_POST['submitSalon'])&&!isset($_POST['resetSalon']))
           return; 
       if(isset($_POST['resetSalon'])) { 
           $resetujSveS="resetujSveS";
           $this->prikaz('registracija',['resetujSveS'=>$resetujSveS],"registracija");
           return;
       }
         /**
      * provera da li je slika lepo ucitana
          * 
      */
       
        $file = $_FILES['img'];
           $fileName = $_FILES['img']['name'];
           $fileTmpName = $_FILES['img']['tmp_name'];
           $fileSize = $_FILES['img']['size'];
           $fileError = $_FILES['img']['error'];
           $fileType = $_FILES['img']['type'];
           $fileExt = explode('.',$fileName);
           $fileActualExtension = strtolower(end($fileExt));
           $allowed = array('jpg','png','jpeg','jfif');

       
         if(!$this->validate(['nazivSalon'=>'required|min_length[1]|max_length[45]',
           'korisnickoImeSalon'=>'required|min_length[1]|max_length[45]',
           'emailSalon'=>'required|valid_email|min_length[3]|max_length[45]',
           'brojTelefonaSalon'=>'required|regex_match[/^\+381[0-9]{8,9}$/]',
           'adresaSalon'=>'required|min_length[1]|max_length[45]',
           'lozinkaSalon'=>'required|min_length[1]|max_length[45]',
           'potvrdaLozinkeSalon'=>'required|min_length[1]|max_length[45]',
            'ponPetakOd'=>'required',
             'ponPetakDo'=>'required'
             
           ])){ 
           $nizGresaka=$this->validator->getErrors();
                    if(isset($nizGresaka['nazivSalon'])) $nizGresaka['nazivSalon']="Unesite Ime!";
                    if(isset($nizGresaka['korisnickoImeSalon'])) $nizGresaka['korisnickoImeSalon']="Unesite Korisničko ime!";
                    if(isset($nizGresaka['emailSalon'])) $nizGresaka['emailSalon']="Unesite ispravno Email!";  
                    if(isset($nizGresaka['brojTelefonaSalon'])) $nizGresaka['brojTelefonaSalon']="Unesite ispravno Broj telefona!";
                    if(isset($nizGresaka['adresaSalon'])) $nizGresaka['adresaSalon']="Unesite Adresu!";
                    if(isset($nizGresaka['lozinkaSalon'])) $nizGresaka['lozinkaSalon']="Unesite Lozinku!";
                    if(isset($nizGresaka['potvrdaLozinkeSalon'])) $nizGresaka['potvrdaLozinkeSalon']="Unesite Potvrdu lozinke!";
                    if(isset($nizGresaka['ponPetakOd'])||isset($nizGresaka['ponPetakDo'])) $nizGresaka['ponPetakOd']="Morate postaviti radno vreme ponedeljak-petak ispravno!";
                  //  if(isset($_POST['daLiJeSveIspravnoKodUsluga'])&&$_POST['daLiJeSveIspravnoKodUsluga']=='N')  
                        $nizGresaka['usluga0']="Morate popuniti informacije o uslugama!";
                    if(($file == null)) {
                        $nizGresaka['img']="Izaberite sliku!";
                         }
                   if(!in_array( $fileActualExtension,$allowed) )
                          $nizGresaka['img']="Izaberite sliku!";
                   if(!($fileError===0) )
                             $nizGresaka['img']="Izaberite sliku!";
                   if(($_POST['subotaOd']==null&&$_POST['subotaDo']!=null)||($_POST['subotaDo']==null&&$_POST['subotaOd']!=null))   
                   $nizGresaka['subotaOd']="Morate postaviti radno vreme za subotu ispravno!";
                   if(($_POST['nedeljaOd']==null&&$_POST['nedeljaDo']!=null)||($_POST['nedeljaDo']==null&&$_POST['nedeljaOd']!=null)) 
                   $nizGresaka['nedeljaOd']="Morate postaviti radno vreme za nedelju ispravno!";
                     /**
                      * Provera za vreme rada subota
                      * 
                     */   
                   if($_POST['subotaOd']!=null&&$_POST['subotaDo']!=null){ 
                     if($this->proveriVreme($_POST['subotaOd'], $_POST['subotaDo'])){
                     {   $nizGresaka['subotaOd']="Morate postavitiradno vreme za subotu ispravno!"; 
                     }}
                      
                     }
                     /**
                       * Provera za vreme rada nedelju
                      * 
                    */          
                 if($_POST['nedeljaOd']!=null&&$_POST['nedeljaDo']!=null){ 
                     if($this->proveriVreme($_POST['nedeljaOd'], $_POST['nedeljaDo'])){
                     {   $nizGresaka['nedeljaOd']="Morate postavitiradno vreme za nedelju ispravno!";   
                     }} 
                       
                     }
                       /**
                      * Provera za vreme rada ponedeljak-petak
                        * 
                     */   
                  if($_POST['ponPetakOd']!=null&&$_POST['ponPetakDo']!=null){ 
                     if($this->proveriVreme($_POST['ponPetakOd'], $_POST['ponPetakDo'])){
                     {   $nizGresaka['ponPetakOd']="Morate postavitiradno vreme ponedeljak-petak ispravno!";   
                     }} 
                  } 
                  return $this->prikaz('registracija',['errorsSalon'=>$nizGresaka],"registracija");
           }
                           
          /**
                   }
             /**
                      * Provera za vreme rada subota
                      * 
                     */   
                   if($_POST['subotaOd']!=null&&$_POST['subotaDo']!=null){ 
                     if($this->proveriVreme($_POST['subotaOd'], $_POST['subotaDo'])){
                     {   $nizGresaka['subotaOd']="Morate postavitiradno vreme za subotu ispravno!"; 
                        $nizGresaka['usluga0']="Morate ponovo popuniti informacije o uslugama!!";
                        return $this->prikaz('registracija',['errorsSalon'=>$nizGresaka],"registracija");
                     }}
                    
                     }
                     /**
                       * Provera za vreme rada nedelju
                      * 
                    */          
                 if($_POST['nedeljaOd']!=null&&$_POST['nedeljaDo']!=null){ 
                     if($this->proveriVreme($_POST['nedeljaOd'], $_POST['nedeljaDo'])){
                     {   $nizGresaka['nedeljaOd']="Morate postavitiradno vreme za nedelju ispravno!";  
                        $nizGresaka['usluga0']="Morate ponovo popuniti informacije o uslugama!!";
                         return $this->prikaz('registracija',['errorsSalon'=>$nizGresaka],"registracija");
                     }} 
                     }
                       /**
                      * Provera za vreme rada ponedeljak-petak
                        * 
                     */   
                  if($_POST['ponPetakOd']!=null&&$_POST['ponPetakDo']!=null){ 
                     if($this->proveriVreme($_POST['ponPetakOd'], $_POST['ponPetakDo'])){
                     {   $nizGresaka['ponPetakOd']="Morate postavitiradno vreme ponedeljak-petak ispravno!";   
                        $nizGresaka['usluga0']="Morate ponovo popuniti informacije o uslugama!!";
                          return $this->prikaz('registracija',['errorsSalon'=>$nizGresaka],"registracija");
                     }} 
                  }
                           
          /**
           * provera da li su usluge ispravno unete
           */         
          if(isset($_POST['daLiJeSveIspravnoKodUsluga'])&&$_POST['daLiJeSveIspravnoKodUsluga']=='N')  { 
                $nizGresaka['usluga0']="Morate ponovo popuniti informacije o uslugama!!";
                return $this->prikaz('registracija',['errorsSalon'=>$nizGresaka],"registracija");
          }
          /**
         * proverava se da li se lozinka i potvrda lozinke poklapaju
           * 
         */
       if(strcmp($this->request->getPost('lozinkaSalon'),$this->request->getPost('potvrdaLozinkeSalon'))!=0){ 
               $nizGresaka['usluga0']="Morate ponovo popuniti informacije o uslugama!";
            $nizGresaka['potvrdaLozinkeSalon']="Potvrda lozinke se ne poklapa <br> sa lozinkom!";
            return $this->prikaz('registracija',['errorsSalon'=>$nizGresaka],"registracija");
       }
       
       /**
         * proverava se da li je korisnicko ime jedinstveno u sistemu, ako nije, ispisuje se poruka o gresci
        * 
         */
       $registrovaniKorisnikModel=new RegKorisnikModel();
       $korisnik=$registrovaniKorisnikModel->pronadjiRegKorisnikaPoParametru("korisnickoIme",$this->request->getVar('korisnickoImeSalon'));
       if($korisnik!=null){ 
           $nizGresaka['usluga0']="Morate ponovo popuniti informacije o uslugama!";
           $poruka='Korisničko ime nije jedinstveno u sistemu. Unesite novo korisničko ime!';
           $resetuj="korisnickoImeSalon";
           return $this->prikaz('registracija',['errorsSalon'=>$nizGresaka,'poruka'=>$poruka, 'resetuj'=>$resetuj],"registracija");
       }
       
        /**
         * proverava se da li je email jedinstven u sistemu, ako nije, ispisuje se poruka o gresci
         * 
         */
       $email=$registrovaniKorisnikModel->pronadjiRegKorisnikaPoParametru("email",$this->request->getVar('emailSalon'));
         if($email!=null){ 
           $nizGresaka['usluga0']="Morate ponovo popuniti informacije o uslugama!";
           $poruka='Email nije jedinstven u sistemu. Unesite novi email!';
           $resetuj="emailSalon";
            return $this->prikaz('registracija',['errorsSalon'=>$nizGresaka,'poruka'=>$poruka, 'resetuj'=>$resetuj],"registracija");
       }
       /**
         * proverava se da li je broj telefona jedinstven u sistemu, ako nije, ispisuje se poruka o gresci
        * 
         */
       $brojTel=$registrovaniKorisnikModel->pronadjiRegKorisnikaPoParametru("brojTelefona",$this->request->getVar('brojTelefonaSalon'));
         if($brojTel!=null){ 
           $nizGresaka['usluga0']="Morate ponovo popuniti informacije o uslugama!";
           $poruka='Broj telefona nije jedinstven u sistemu. Unesite novi broj telefona!';
           $resetuj="brojTelefonaSalon";
           return $this->prikaz('registracija',['errorsSalon'=>$nizGresaka,'poruka'=>$poruka, 'resetuj'=>$resetuj],"registracija");
       }
       
         /**
          * generisanje path-a za ubacenu sliku
          */
           $fileNameNew = uniqid('',true)."."."$fileActualExtension";
           $fileDestination = "web/".$fileNameNew;
           move_uploaded_file($fileTmpName,$fileDestination);
           $path = "/web/".$fileNameNew;
      
        
       /**
        * ubacivanje Salona u bazu
        */
       $registrovaniKorisnikModel->ubaciSalon($this->request,$path);
      $this->session->set('trenutniMejlZaSlanjePotvrdeORegistraciji', $this->request->getVar('emailSalon'));
       return redirect()->to(site_url('Gost/poslatZahtevZaRegistraciju'));
       
  }
     
   function proveriVreme($prvi,$drugi){ 
       
       $time1= explode(":", $prvi);
           $vreme1=((int)$time1[0])*60+(int)$time1[1];
           $time2= explode(":", $drugi);
           $vreme2=((int)$time2[0])*60+(int)$time2[1];   
           if($vreme1>=$vreme2){ return true;} 
          return false;
   }
   
   
   /**
    * Teodora Peric 0283/18
    *stranica koja prikazuje da je uspesno poslat zahtev za registraciju
    *  */
   function poslatZahtevZaRegistraciju(){
         $this->prikaz('zahtevZaRegistraciju', ['mejl'=>$_SESSION['trenutniMejlZaSlanjePotvrdeORegistraciji']]);
   }

    /**
     * Aleksandra Dragojlovic 0409/19
     * 
     * Funkcionalnost promena lozinke
     * 
     * 
     */
    public function promenaLozinke($poruka=null){
        
        return $this->prikaz('promena_lozinke', ['poruka'=>$poruka]);
     
    }
    /**
     * Aleksandra Dragojlovic 0409/19
     * Funkcionalnost promena lozinke
     * 
     */
    public function promenaLozinkeObrada(){

        $korIme=$this->request->getVar('korIme');
        $staraLoz=$this->request->getVar('staraLoz');
        $novaLoz=$this->request->getVar('novaLoz');
        $potvrdaLoz=$this->request->getVar('potvrdaLoz');
        $regKorisnikModel=new RegKorisnikModel();
        
        $regKorisnik=$regKorisnikModel->nadjiPrekoKorIme($korIme);
        
        if($regKorisnik==null)
            
            return $this->prikaz('promena_lozinke',['errors'=>['korIme'=>"Korisnik ne postoji!"]]);
        if($regKorisnik->jeObrisan!=0 && $regKorisnik->jeObrisan!=NULL){
            return $this->prikaz('promena_lozinke',['errors'=>['korIme'=>"Korisnik ne postoji!"]]);
        }
        if(($regKorisnik->lozinka)!=$staraLoz)
            return $this->prikaz('promena_lozinke',['errors'=>['staraLoz'=>"Neispravna vrednost stare lozinke!"]]);
        if($novaLoz!=$potvrdaLoz){
          return $this->prikaz('promena_lozinke',['errors'=>['potvrdaLoz'=>"Nova lozinke i potvrda nisu iste!"]]);

        }
        
   
        $upit_data = [
            'lozinka' => $novaLoz
        ];
        $regKorisnikModel->update($regKorisnik->IdRK, $upit_data);
        
        return $this->promenaLozinke("Lozinka je uspešno promenjena!");

    }

    //Anastasija Volcanovska 0092/19 funkcionalnost login
    public function loginObrada() {
        $ime = $this->request->getVar('korime');
        $lozinka = $this->request->getVar('lozinka');
        $regKorisnikModel = new RegKorisnikModel();

        $korisnik = $regKorisnikModel->nadjiPrekoKorIme($ime);

        if ($korisnik == null) {
            return $this->prikaz('login', ['errors' => ['greska' => 'Korisnik ne postoji!']]);
        }
        /*if ($korisnik->jeOdobrenZahtevZaRegistraciju == NULL || $korisnik->jeOdobrenZahtevZaRegistraciju == 0) {
            return $this->login('Korisniku jos uvek nije odobren zahtev za registraciju!');
        }*/
        if ($korisnik->jeObrisan == 1) {
            return $this->prikaz('login', ['errors' => ['greska' => 'Korisnik je obrisan!']]);
        }
        if ($korisnik->lozinka != $lozinka) {
            return $this->prikaz('login', ['errors' => ['greska' => 'Pogresna lozinka!']]);
        }

        $this->session->set('ulogovaniKorisnik', $korisnik);
        switch ($korisnik->tipKorisnika) {
            case 'A': return redirect()->to(site_url('Administrator'));
                break;
            case 'K': return redirect()->to(site_url('Korisnik'));
                break;
            case 'S': return redirect()->to(site_url('Salon'));
                break;
        }
    }

}
