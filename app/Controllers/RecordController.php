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
    public function deleteDetalle()
    {
        
        $model =  new \App\Models\RegistrarModel();
        $response = $model->deleteDetalle($this->request->getPost("id_detalle"));
        echo json_encode(['data'=> $response]);
        
    }
    public function send()
    {
        
        $model =  new \App\Models\RegistrarModel();
        $response = $model->send($this->request->getPost("id_bitacora"));
        echo json_encode(['data'=> $response]);
        
    }
    public function deleteBitacora()
    {
        
        $model =  new \App\Models\RegistrarModel();
        $response = $model->deleteBitacora($this->request->getPost("id_bitacora"));
        echo json_encode(['data'=> $response]);
        
    }
    public function getDataToForm()
    {
        
        $model =  new \App\Models\RegistrarModel();
        $response = $model->getDataToForm();
        echo json_encode(['data'=> $response]);
        
    }


    public function getDetalle()
    {
        $id = $this->request->getPost("id_bitacora");
        $model =  new \App\Models\RegistrarModel();
        $response = $model->getDetalle($id);
        echo json_encode(['data'=> $response]);
        
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
        $validation = service("validation");
        $validation->setRules([
            'dispositivo' => ['label' => 'dispositivo', 'rules' => 'required'],
            'id_bitacora' => ['label' => 'id_bitacora', 'rules' => 'required'],
            'comentario' => ['label' => 'comentario', 'rules' => 'required'],
            'razon' => ['label' => 'razon', 'rules' => 'required'],
            'desc' => ['label' => 'desc', 'rules' => 'required'],
        ]);

        if(!$validation->withRequest($this->request)->run()){
            echo json_encode(['errors'=>$validation->getErrors()]);
        }else{
            $data = [
                'tecnologia' => $this->request->getPost("tecnologia"),
                'id_bitacora' => $this->request->getPost("id_bitacora"),
                'id_origen' => $this->request->getPost("origen"),
                'categoria' => $this->request->getPost("categoria"),
                'dispositivo' => $this->request->getPost("dispositivo"),
                'id_cliente' => $this->request->getPost("cliente"),
                'criticidad' =>  $this->request->getPost("criticidad"),
                'comentario' => $this->request->getPost("comentario"),
                'desc' => $this->request->getPost("desc"),
                'reportado' => $this->request->getPost("reportado"),
                'razon' => $this->request->getPost("razon"),
            ];
            
            $model =  new \App\Models\RegistrarModel();
            $response = $model->saveDetalle($data);
            
            echo json_encode($response);
        }    
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
