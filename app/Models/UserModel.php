<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    public function getUser($data){

        $User= $this->db->table("t_users");
        $User->where(['user'=>$data]);

        return $User->get()->getResultArray();
    }
    public function saveData($data){

        $record= $this->db->table("t_users");
        $record->insert($data);

        return $this->db->insertID();

    }
}