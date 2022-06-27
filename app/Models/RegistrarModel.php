<?php
namespace App\Models;

use CodeIgniter\Model;

class RegistrarModel extends Model
{
    
    public function insertData($data){
       
        $record= $this->db->table("t_bitacora");
            $record->insert($data);

            if($this->db->insertID() > 0 ){

                $response= ['data' => ["id"=> $this->db->insertID(),"estado"=>"open"]];
                
            }else{
                $response= ["error" => "No se pudo registrar la bitacora error: 500"];
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
        $flag->select('estado,id_bitacora');
        $flag->where(['estado' => "open"]);
        $flag->where(['user_id' => $id]);
        $flag->limit(1);

        $result =  $flag->get()->getResultArray();

        if($result[0]['estado'] != 'open'){

            $response = $result;

        }else{

            $response= ['data' => ["id"=> $result[0]['id_bitacora'] ,'estado'=>$result[0]['estado'] ]];
        }

        return $response;
        
    }

}