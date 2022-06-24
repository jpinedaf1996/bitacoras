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
        //$Date= $this->request->getPost("fecha");
        //$Schedule= $this->request->getPost("turno");
        $descripcion= "Esta es una nota de prueba";
        //$Country= $this->request->getPost("pais");

        $data = [
            
            "user_id" => 1,
            "turno" => "Primer turno",
            "descripcion" => $descripcion,
            "pais" => 1
        ];

        $model = model('RegistrarModel::class');
        $model->insertData($data);
/*
        $date= $this->request->getPost("fecha");
        $schedule= $this->request->getPost("turno");
        $descripcion= "Esta es una nota de prueba";
        $Country= $this->request->getPost("pais");

        $data = [
            "fecha" => $date,
            "user_id" => 1,
            "turno" => $schedule,
            "descripcion" => $descripcion,
            "pais" => $Country
        ];
*/
    }
    
    
}
