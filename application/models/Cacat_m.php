<?php defined('BASEPATH') or exit('No direct script access allowed');

class cacat_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('jenis_cacat');
        if ($id != null) {
            $this->db->where('cacat_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'cacat_id' => $post['cacat_id'],
            'jenis_cacat' => $post['jenis_cacat'],
            'penyebab' => $post['penyebab'],
        ];
        $this->db->insert('jenis_cacat', $params);
    }

    public function edit($post)
    {
        $params = [
            'cacat_id' => $post['cacat_id'],
            'jenis_cacat' => $post['jenis_cacat'],
            'penyebab' => $post['penyebab'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('cacat_id', $post['id']);
        $this->db->update('jenis_cacat', $params);
    }

    public function del($id)
    {
        $this->db->where('cacat_id', $id);
        $this->db->delete('jenis_cacat');
    }
}
