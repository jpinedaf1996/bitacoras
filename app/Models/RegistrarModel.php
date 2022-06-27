<?php
namespace App\Models;

use CodeIgniter\Model;

class RegistrarModel extends Model
{
    
    public function insertData($data){

        $flag = $this->validateData($data["user_id"]);

        if(  $flag == false  ){

            $record= $this->db->table("t_bitacora");
            $record->insert($data);

            if($this->db->insertID() > 0 ){

                $response= ['data' => ["id"=> $this->db->insertID(),"estado" => "open"]];  

            }else{

                $response= ["error" => "No se pudo registrar la bitacora error: 500"];
            }
        }else{
            
            $response = $flag;
        }

        return $response;

    }
    public function getDataById($id){
       

        $record= $this->db->table("t_bitacora");
        $record->where(['id_bitacora' => $id]);

        return $record->get()->getResultArray();
        
    }
    public function validateData($id){
       
        $flag= $this->db->table("t_bitacora");
        $flag->select('estado,id_bitacora,fecha');
        $flag->where(['estado' => "open"]);
        $flag->where(['user_id' => $id]);
        $flag->limit(1);

        $result =  $flag->get()->getResultArray();

        if(count($result)>0){

            $response= ['data' => $result[0]];
            
        }else{

            $response = false;
        }

        return $response;
        
    }

}