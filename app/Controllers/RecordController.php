<?php

namespace App\Controllers;

use DateTime;

class RecordController extends BaseController
{
    public function registro()
    {
        

        return view('registro');
    }

    public function Countries()
    {
        
        $model =  new \App\Models\RegistrarModel();
        $response = $model->getCountries();
        echo json_encode(['data'=> $response]);
        
    }

    public function getDetalle()
    {
        
        $model =  new \App\Models\RegistrarModel();
        $response = $model->getDetalle();
        echo json_encode(['data'=> $response]);
        
    }


    public function getRecordById($id)
    {
        
        $model =  new \App\Models\RegistrarModel();
        $response = $model->getDataById($id);
        echo json_encode($response);
        
    }

    public function statusValidate()
    {
        
        $data = [
            "user_id" => session('userId'),   
        ];
        $model =  new \App\Models\RegistrarModel();
        $response = $model->validateData($data);
        
        echo json_encode($response);
        
    }
    public function addDetalle ()
    {
        $tegnologia = $this->request->getPost("tegnologia");
        $producto = $this->request->getPost("producto");
        $cliente = $this->request->getPost("cliente");
        $criticidad = $this->request->getPost("criticidad");
        $comentario = $this->request->getPost("comentario");
        $restablecio = $this->request->getPost("restablecio");
        $reportado = $this->request->getPost("reportado");
        $razon = $this->request->getPost("razon");

        $data = [
            'tegnologia' => $this->request->getPost("tegnologia"),
            'id_bitacora' => $this->request->getPost("id_bitacora"),
            'producto' => $this->request->getPost("producto"),
            'id_cliente' => $this->request->getPost("cliente"),
            'criticidad' => $this->request->getPost("criticidad"),
            'comentario' => $this->request->getPost("comentario"),
            'alertado' => $this->request->getPost("restablecio"),
            'reportado' => $this->request->getPost("reportado"),
            'razon' => $this->request->getPost("razon"),
        ];
        
        $model =  new \App\Models\RegistrarModel();
        $response = $model->saveDetalle($data);
        
        echo json_encode($response);
        
    }

    public function add()
    {
        
            $date= $this->request->getPost("fecha");
            $schedule= $this->request->getPost("turno");
            $descripcion= "Comentarios pendientes de actulizar";
            $country= $this->request->getPost("pais");

            $data = [
                "fecha" => $date,
                "user_id" => session('userId'),
                "turno" => $schedule,
                "descripcion" => $descripcion,
                "id_pais" => $country
            ];
            
            $model =  new \App\Models\RegistrarModel();
            $response = $model->insertData($data);
        
            echo json_encode($response);
        

    }
    
    
}
