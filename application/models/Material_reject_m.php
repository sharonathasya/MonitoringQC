<?php defined('BASEPATH') or exit('No direct script access allowed');

class material_reject_m extends CI_Model
{

    public function getByTransaksi($id = null)
    {
    	$this->db->select('cacat_masuk.*, jenis_cacat.jenis_cacat, jenis_cacat.penyebab');
        $this->db->from('cacat_masuk');
        $this->db->join('jenis_cacat', 'cacat_masuk.cacat_id = jenis_cacat.cacat_id');

    	// $this->db->from('cacat_gudang');
        if ($id != null) {
            $this->db->where('t_material_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
    	$this->db->select('cacat_masuk.*, jenis_cacat.jenis_cacat, jenis_cacat.penyebab');
        $this->db->from('cacat_masuk');
        $this->db->join('jenis_cacat', 'cacat_masuk.cacat_id = jenis_cacat.cacat_id');

    	// $this->db->from('cacat_gudang');
        if ($id != null) {
            $this->db->where('material_reject_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getLaporanRejectMaterial($id = null)
    {
        $this->db->select('t_material.*, b_material.name as material_name, supplier.name as supplier_name');
        $this->db->from('t_material');
        $this->db->join('b_material', 'b_material.material_id = t_material.material_id');
        $this->db->join('supplier', 'supplier.supplier_id = t_material.supplier_id');            
        if ($this->input->post('filter') != null || $this->input->post('cetak') != null) {
            $post = $this->input->post();
            // var_dump($post); die;
            if ($post['bulan'] != '' && $post['tahun'] != '') {
                $th_bln = $post['tahun'] . '-'.$post['bulan'];
                $this->db->like('t_material.date', $th_bln);
            }else if($post['bulan'] == '' && $post['tahun'] != ''){
                $this->db->where('YEAR(date)', $post['tahun']);
            }else if($post['bulan'] != '' && $post['tahun'] == ''){            
                $this->db->where('MONTH(date)', $post['bulan']);
            }

            if ($post['material'] != '') {
                $this->db->where('t_material.material_id', $post['material']);
            }
        }
        if ($id != null) {
            $this->db->where('t_material_id', $id);
        }
        $this->db->where('t_material.status', 1);
        $this->db->order_by('t_material_id', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            't_material_id' => $post['t_material_id'],
            'cacat_id' => $post['cacat_id'],
            'jumlah_reject' => $post['jumlah_cacat']
        ];
        $this->db->insert('cacat_masuk', $params);
    }

    public function edit()
    {
        $post = $this->input->post();
        $params = [
            'cacat_id' => $post['cacat_id'],
            'jumlah_reject' => $post['jumlah_cacat']
        ];
        $this->db->where('material_reject_id', $post['material_reject_id']);
        $this->db->update('cacat_masuk', $params);
    }

    public function del($id)
    {
        $this->db->where('material_reject_id', $id);
        $this->db->delete('cacat_masuk');
    }    
}
