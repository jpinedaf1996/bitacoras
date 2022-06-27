<?php

namespace App\Controllers;

use DateTime;

class RecordController extends BaseController
{
    public function registro()
    {
       // $this->load->helper('cookie');
    //delete_cookie("id");

        return view('registro');
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

    public function add()
    {
        
        if(!isset($_COOKIE["estado"]) and $_COOKIE["estado"] != 'open'){
            
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

            if(!isset($response["error"])){
                helper("cookie");
                    set_cookie("id", $response["data"]["id"]);  
                    set_cookie("estado", $response["data"]["estado"]); 
            } 
      
        } else{

            $response = ['data' => ['error' => 'Ya existe una bitacora abierta']];

        }
        
        echo json_encode($response);
        

    }
    
    
}
