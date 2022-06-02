<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

//Anastasija Volčanovska 0092/2019 dodala filter za salon

class SalonFilter implements FilterInterface {

    public function before(RequestInterface $request, $arguments = null) {
        $session = session();
       /* if (!$session->has('ulogovaniKorisnik'))
            return redirect()->to(site_url('Gost'));*/

        $korisnik = $session->get('ulogovaniKorisnik');

        if ($korisnik->tipKorisnika == 'A') {
            return redirect()->to(site_url('Administrator'));
        }

        if ($korisnik->tipKorisnika == 'K') {
            return redirect()->to(site_url('Korisnik'));
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {
        // Do something here
    }

}
