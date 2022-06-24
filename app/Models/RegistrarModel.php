<?php
namespace App\Models;

use CodeIgniter\Model;

class RegistrarModel extends Model
{

    public function insertData($data){

        $User= $this->db->table("t_bitacora");
        $User->insert($data);

        return $this->db->insertID();
    }

}