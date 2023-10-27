<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginModel extends CI_Model{

    public function cek_level($email){
        $query = $this->db->query("SELECT * FROM users WHERE email = '$email' LIMIT 1");

        if ($query->num_rows() > 0) {
            $row = $query->row();

            $result = array(
                'email' => $row->email,
                'password' => $row->password,
                'nama_user' => $row->fullname,
                'level' => $row->level
            );

            return $result;
        }

        return false;
    }

}

?>