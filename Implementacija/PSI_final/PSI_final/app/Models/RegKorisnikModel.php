<?php namespace App\Models;

   

use CodeIgniter\Model;
use App\Models\RegKorisnikModel;

class RegKorisnikModel extends Model{
    
    
    protected $table = 'registrovanikorisnik';
    protected $primaryKey = 'IdRK';
    protected $returnType = 'object';
    protected $allowedFields = ['korisnickoIme', 'email', 'tipKorisnika', 'lozinka', 'brojTelefona', 'adresa', 'jeObrisan' , 'jeOdobrenZahtevZaRegistraciju'];
    
     // Aleksandra Dragojlovic 0409/19 koristi se prilikom promene lozinke
    public function nadjiPrekoKorIme($korIme){
        return $this->where('korisnickoIme',$korIme)->where('jeOdobrenZahtevZaRegistraciju',1)->first();
    }
    
    
    
    

}

