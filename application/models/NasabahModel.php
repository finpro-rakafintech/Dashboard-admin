<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NasabahModel extends CI_Model
{
    public function getJumlahNasabah()
    {
        $query = $this->db->query("SELECT COUNT(*) AS total_nasabah FROM nasabah");
        $result = $query->row();

        return $result->total_nasabah;
    }

    public function getNasabah()
    {
        return $this->db->get('nasabah');
    }

    public function searchUser($query)
    {
        $this->db->select('user_id, fullname');
        $this->db->like('user_id', $query);
        $this->db->where_not_in('user_id', $this->getUsedUserIds());
        $result = $this->db->get('user');

        return $result->result();
    }

    public function getUsedUserIds()
    {
        $used_user_ids = $this->db->select('user_id')->get('nasabah')->result_array();
        return array_column($used_user_ids, 'user_id');
    }

    public function get_add($get_input)
    {
        $data = array(
            'firstname' => $get_input['firstname'],
            'lastname' => $get_input['lastname'],
            'phone_number' => $get_input['phone_number'],
            'no_kredit' => $get_input['no_kredit'],
            'npwp' => $get_input['npwp'],
            'nik' => $get_input['nik'],
            'user_id' => $get_input['user_id'],
            'income' => $get_input['income'],
            'outcome' => $get_input['outcome']
        );

        $this->db->where($data);
        $query = $this->db->get('nasabah');

        if ($query->num_rows() > 0) {
            return 0;
        } else {
            $this->db->insert('nasabah', $data);
            return 1;
        }
    }

    public function get_edit($get_edit)
    {
        $cek_id = array(
            'nasabah_id' => $get_edit['nasabah_id']
        );

        $data = array(
            'firstname' => $get_edit['firstname'],
            'lastname' => $get_edit['lastname'],
            'phone_number' => $get_edit['phone_number'],
            'no_kredit' => $get_edit['no_kredit'],
            'npwp' => $get_edit['npwp'],
            'nik' => $get_edit['nik'],
            'user_id' => $get_edit['user_id'],
            'income' => $get_edit['income'],
            'outcome' => $get_edit['outcome']
        );

        $this->db->where($cek_id);
        $query = $this->db->get('nasabah');

        if ($query->num_rows() > 0) {
            $this->db->set($data);
            $this->db->where($cek_id);
            $this->db->update('nasabah');
            return 1;
        } else {
            $this->db->update('nasabah', $data);
            return 0;
        }
    }

    public function get_delete($id_nasabah)
    {
        $cek['nasabah_id']	= $id_nasabah;

		$this->db->where($cek);
		$query = $this->db->get('nasabah');

		if($query->num_rows() > 0){
			$this->db->where($cek);
			$this->db->delete('nasabah');
			return 1;
		}else{
			return 0;
		}
    }
}
