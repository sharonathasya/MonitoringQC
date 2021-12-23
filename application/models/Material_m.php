<?php defined('BASEPATH') or exit('No direct script access allowed');

class material_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('b_material.*, supplier.name as supplier_name');
        $this->db->from('b_material');
        $this->db->join('supplier', 'supplier.supplier_id = b_material.supplier_id');
        if ($id != null) {
            $this->db->where('b_material.material_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'name' => $post['material_name'],
            'supplier_id' => $post['supplier'],
        ];
        $this->db->insert('b_material', $params);
    }

    public function edit($post)
    {
        $params = [
            'name' => $post['material_name'],
            'supplier_id' => $post['supplier'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('material_id', $post['id']);
        $this->db->update('b_material', $params);
    }

    public function del($id)
    {
        $this->db->where('material_id', $id);
        $this->db->delete('b_material');
    }
}
