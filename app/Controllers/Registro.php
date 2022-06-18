<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Session\Session;

class Registro extends BaseController
{
    public function registro()
    {
        return view('registro');
    }
    
    
}
