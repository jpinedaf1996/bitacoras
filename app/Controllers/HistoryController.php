<?php

namespace App\Controllers;

use DateTime;

class HistoryController extends BaseController
{
    public $model=null;

    function __construct() {
        $this->model =  new \App\Models\HistoryModel();
    }

    public function history()
    {
        return view('historial');
    }
    public function getBitacoras()
    {
        header('Content-Type: application/json');

        $response = $this->model->getBitacoras();
        echo json_encode(['data'=> $response]);   
    }
    public function getOne($id)
    {
        
        //header('Content-Type: application/json');
        $response = $this->model
        ->getOne($id);
        
        return view('bitacora',$response[0]);
        
    }

    public function getDetalleById($id)
    {
        header('Content-Type: application/json');
        $response = $this->model
        ->getDetalleById($id);
        echo json_encode($response);
        
    }
  
}
