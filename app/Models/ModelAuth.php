<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    public function Login($email, $password)
    {
        return $this->db->table('tbl_user')
            ->where('username', $email)
            ->where('password', $password)
            ->get()->getRowArray();
    }
}
