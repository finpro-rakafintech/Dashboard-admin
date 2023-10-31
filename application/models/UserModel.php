<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
    public function getUsers() {
        $query = $this->db->get('users');
        return $query;
    }

    public function get_add($get_input)
    {
        $data = array(
            'fullname' => $this->input->post('fullname'),
            'birthdate' => $this->input->post('birthdate'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'level' => $this->input->post('level')
        );

        $this->db->where($data);
        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            return 0;
        } else {
            $this->db->insert('users', $data);
            return 1;
        }
    }

    public function get_edit($get_edit)
    {
        $cek_id = array(
            'user_id' => $get_edit['user_id']
        );

        $data = array(
            'email' => $get_edit['email'],
            'password' => $get_edit['password'],
            'fullname' => $get_edit['fullname'],
            'birthdate' => $get_edit['birthdate'],
            'level' => $get_edit['level'],
        );

        $this->db->where($cek_id);
        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            $this->db->set($data);
            $this->db->where($cek_id);
            $this->db->update('users');
            return 1;
        } else {
            $this->db->update('users', $data);
            return 0;
        }
    }

    public function get_delete($id_user)
    {
        $cek['user_id'] = $id_user;

        $this->db->where($cek);
        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            $this->db->where($cek);
            $this->db->delete('users');
            return 1;
        } else {
            return 0;
        }
    }

}


?>