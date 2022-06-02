<?php

/**
 * Teodora Peric 0283/18
 */
/**
 * Anastasija Volčanovska 
 */
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class GostFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session=session();
        if(!$session->has('trenutniMejlZaSlanjePotvrdeORegistraciji'))
            return redirect()->to(site_url('Gost/registracija'));
		if ($session->has('ulogovaniKorisnik')) {

            $korisnik = $session->get('ulogovaniKorisnik');

            if ($korisnik->tipKorisnika == 'A') {
                return redirect()->to(site_url('Administrator'));
            }

            if ($korisnik->tipKorisnika == 'K') {
                return redirect()->to(site_url('Korisnik'));
            }
            
            if ($korisnik->tipKorisnika == 'S') {
                return redirect()->to(site_url('Salon'));
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
       
    }
}