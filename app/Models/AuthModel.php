<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table            = 'account';
    protected $primaryKey       = 'username';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;

    public function getDataByUsername($username)
    {
        $builder = $this->db->table($this->table)
            ->where('username', $username)
            ->get();

        if ($builder) {
            return $builder->getFirstRow();
        } else {
            return null;
        }
    }
}
