<?php
namespace App\Models;

use CodeIgniter\Model;

class HistoryModel extends Model
{
    
    public function getBitacoras(){
       
        $record = $this->db
        ->table("t_bitacora")
        ->select('t_bitacora.*,t_users.name, t_pais.pais')
        ->join('t_users', 't_bitacora.user_id = t_users.user_id','inner')
        ->join('t_pais', 't_bitacora.id_pais = t_pais.id_pais','inner')
        ->orderBy('id_bitacora', 'DESC');
        return $record->get()->getResultArray();

    }
    public function getOne($id){
       
        $record = $this->db
        ->table("t_bitacora")
        ->select('t_bitacora.*,t_users.name, t_pais.pais')
        ->join('t_users', 't_bitacora.user_id = t_users.user_id','inner')
        ->join('t_pais', 't_bitacora.id_pais = t_pais.id_pais','inner')
        ->where(['id_bitacora' => $id]);
        return $record->get()->getResultArray();

    }
    public function getDetalleById($id){

        $record= $this->db->table("t_detalle_bit");
        $record->select('*');
        $record->join('t_clientes', 't_detalle_bit.id_cliente = t_clientes.id_cliente','inner');
        $record->where(['estado'=> 1,'id_bitacora' => $id]);
        return $record->get()->getResultArray();
        
    }
}