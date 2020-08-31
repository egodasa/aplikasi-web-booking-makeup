<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth_User_Model extends CI_Model
{
    public function cek_login()
    {
        $username = set_value('username');
        $password = set_value('password');

        $result = $this->db
            ->where('username', $username)
            ->where('password', $password)
            ->limit(1)
            ->get('tb_pengguna');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return FALSE;
        }
    }
}
