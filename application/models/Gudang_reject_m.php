<?php defined('BASEPATH') or exit('No direct script access allowed');

class gudang_reject_m extends CI_Model
{

    public function getByGudang($id = null)
    {
    	$this->db->select('cacat_gudang.*, jenis_cacat.jenis_cacat, jenis_cacat.penyebab');
        $this->db->from('cacat_gudang');
        $this->db->join('jenis_cacat', 'cacat_gudang.cacat_id = jenis_cacat.cacat_id');

    	// $this->db->from('cacat_gudang');
        if ($id != null) {
            $this->db->where('t_gudang_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
    	$this->db->select('cacat_gudang.*, jenis_cacat.jenis_cacat, jenis_cacat.penyebab');
        $this->db->from('cacat_gudang');
        $this->db->join('jenis_cacat', 'cacat_gudang.cacat_id = jenis_cacat.cacat_id');

    	// $this->db->from('cacat_gudang');
        if ($id != null) {
            $this->db->where('gudang_cacat_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            't_gudang_id' => $post['t_gudang_id'],
            'cacat_id' => $post['cacat_id'],
            'jumlah_cacat' => $post['jumlah_cacat']
        ];
        $this->db->insert('cacat_gudang', $params);
    }

    public function edit()
    {
        $post = $this->input->post();
        $params = [
            'cacat_id' => $post['cacat_id'],
            'jumlah_cacat' => $post['jumlah_cacat']
        ];
        $this->db->where('gudang_cacat_id', $post['gudang_cacat_id']);
        $this->db->update('cacat_gudang', $params);
    }

    public function del($id)
    {
        $this->db->where('gudang_cacat_id', $id);
        $this->db->delete('cacat_gudang');
    }    
}
