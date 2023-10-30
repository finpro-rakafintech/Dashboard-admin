<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
    public function getUsers() {
        $query = $this->db->get('users');
        return $query;
    }

}


?>