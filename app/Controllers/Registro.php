<?php

namespace App\Controllers;

use CodeIgniter\Session\Session;

class Registro extends BaseController
{
    public function registro()
    {
        return view('registro');
    }
    public function add()
    {
        $user= $this->request->getPost("user");
        $password= $this->request->getPost("password");

        $obj = new RegistrarModel();
    }
    
    
}
