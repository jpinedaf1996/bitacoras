<?php
namespace App\Models;

use CodeIgniter\Model;

class RegistarModel extends Model
{
    public function getUser($data){
        $User= $this->db->table("t_users");
        $User->where($data);

        return $User->get()->getResultArray();
    }
    public function InsertRecord($data){
        $User= $this->db->table("t_bitacora");
        $User->insert($data);

        return $this->db->insertID();
    }
}