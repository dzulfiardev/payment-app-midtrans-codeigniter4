<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = ['users'];
    protected $primaryKey = ['id'];
    protected $allowedFields = ['email', 'username', 'first_name', 'last_name', 'email', 'address', 'user_image', 'password_hash'];

    public function getUser($id = 0)
    {
        return $this->where(['id' => $id])->first();
    }
}
