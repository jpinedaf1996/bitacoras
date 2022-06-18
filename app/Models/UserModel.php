<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    public function getUser($data){
        $User= $this->db->table("t_users");
        $User->where($data);

        return $User->get()->getResultArray();
    }
}