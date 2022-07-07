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

                $response= ['data' => ["id_bitacora"=> $this->db->insertID(),"estado" => "open"]];  

            }else{

                $response= ["error" => "No se pudo registrar la bitacora error: 500"];
            }
        }else{
            
            $response = $flag;
        }

        return $response;

    }
    public function getCountries(){
       
        $record= $this->db->table("t_pais");
        return $record->get()->getResultArray();
        
    }
    public function getDetalle($id){
       
        $record= $this->db->table("t_detalle_bit");
        $record->select('*');
        $record->join('t_clientes', 't_detalle_bit.id_cliente = t_clientes.id_cliente','inner');
        $record->where(['estado'=> 1,'id_bitacora' => $id]);
        return $record->get()->getResultArray();
        
    }
    public function validateData($id){
       
        $flag= $this->db->table("t_bitacora");
        $flag->select('*');
        $flag->join('t_pais', 't_bitacora.id_pais = t_pais.id_pais','inner');
        $flag->where(['estado' => "open", 'user_id' => $id]);
        $flag->limit(1);

        $result =  $flag->get()->getResultArray();

       if(count($result)>0){

            $response= ['data' => $result[0]];
            
        }else{

            $response = false;
        }

        return $response;
        
    }
    public function saveDetalle($data){
       
        $record= $this->db->table("t_detalle_bit");
        $record->insert($data);
        return $this->db->insertID();

    }

    public function getCustomers(){
       
        $record = $this->db->table("t_clientes");
        return $record->get()->getResultArray();

    }
    public function deleteDetalle($id){
       
        $builder = $this->db->table("t_detalle_bit");
        $builder->set('estado', '0');
        $builder->where('id_detalle', $id);
        if($builder->update()){
            return ['status'=>'ok'];
        }else{
            return ['status'=>'error'];
        }
        

    }
    public function send($id){
       
        $builder = $this->db->table("t_bitacora");
        $builder->set('estado', 'close');
        $builder->where('id_bitacora', $id);
        if($builder->update()){
            return ['status'=>'ok'];
        }else{
            return ['status'=>'error'];
        }
        

    }

}