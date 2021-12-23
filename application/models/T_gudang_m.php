<?php defined('BASEPATH') or exit('No direct script access allowed');

class t_gudang_m extends CI_Model
{

    public function get_b_material()
    {
        return $query = $this->db->get('b_material');
    }

    public function get($id = null)
    {
        $this->db->select('t_gudang.*, b_material.name as material_name');
        $this->db->from('t_gudang');
        $this->db->join('b_material', 'b_material.material_id = t_gudang.material_id');
        if ($this->input->post('filter') != null || $this->input->post('cetak') != null) {
            $post = $this->input->post();
            // var_dump($post); die;
            if ($post['bulan'] != '' && $post['tahun'] != '') {
                $th_bln = $post['tahun'] . '-'.$post['bulan'];
                $this->db->like('t_gudang.date', $th_bln);
            }else if($post['bulan'] == '' && $post['tahun'] != ''){
                $this->db->where('YEAR(date)', $post['tahun']);
            }else if($post['bulan'] != '' && $post['tahun'] == ''){            
                $this->db->where('MONTH(date)', $post['bulan']);
            }

            if ($post['material'] != '') {
                $this->db->where('t_gudang.material_id', $post['material']);
            }
        }
        if ($id != null) {
            $this->db->where('t_gudang_id', $id);
        }
        $this->db->order_by('t_gudang_id', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function getForLaporan($id = null)
    {
        $this->db->select('t_gudang.*, b_material.name as material_name');
        $this->db->from('t_gudang');
        $this->db->join('b_material', 'b_material.material_id = t_gudang.material_id');
        if ($this->input->post('filter') != null || $this->input->post('cetak') != null) {
            $post = $this->input->post();
            // var_dump($post); die;
            if ($post['bulan'] != '' && $post['tahun'] != '') {
                $th_bln = $post['tahun'] . '-'.$post['bulan'];
                $this->db->like('t_gudang.date', $th_bln);
            }else if($post['bulan'] == '' && $post['tahun'] != ''){
                $this->db->where('YEAR(date)', $post['tahun']);
            }else if($post['bulan'] != '' && $post['tahun'] == ''){            
                $this->db->where('MONTH(date)', $post['bulan']);
            }

            if ($post['material'] != '') {
                $this->db->where('t_gudang.material_id', $post['material']);
            }
        }
        if ($id != null) {
            $this->db->where('t_gudang_id', $id);
        }
        $this->db->where('t_gudang.status', 1);
        $this->db->order_by('t_gudang_id', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            't_gudang_id' => $post['t_gudang_id'],
            'date' => $post['t_gudang_date'],
            'no_lot' => $post['no_lot'],
            'material_id' => $post['material'],
            'jumlah_masalah' => $post['jumlah_masalah'],
            'status' => $post['status'],
        ];
        $this->db->insert('t_gudang', $params);
    }

    public function edit($post)
    {
        $params = [
            't_gudang_id' => $post['t_gudang_id'],
            'date' => $post['t_gudang_date'],
            'no_lot' => $post['no_lot'],
            'material_id' => $post['material'],
            'jumlah_masalah' => $post['jumlah_masalah'],
            'status' => $post['status'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('t_gudang_id', $post['id']);
        $this->db->update('t_gudang', $params);
    }


    function check_t_gudangId($code, $id = null)
    {
        $this->db->from('t_gudang');
        $this->db->where('t_gudang_id', $code);
        if ($id != null) {
            $this->db->where('t_gudang_id !=', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('t_gudang_id', $id);
        $this->db->delete('t_gudang');
    }

    public function getGudang_json($id = null)
    {
        // SELECT cacat_gudang.t_gudang_id, t_gudang.date, jenis_cacat.jenis_cacat, jenis_cacat.penyebab, SUM(cacat_gudang.jumlah_cacat) from t_gudang JOIN cacat_gudang ON t_gudang.t_gudang_id = cacat_gudang.t_gudang_id join jenis_cacat ON cacat_gudang.cacat_id = jenis_cacat.cacat_id WHERE MONTH(t_gudang.date) = '08' AND YEAR(t_gudang.date) = '2021' AND t_gudang.material_id='2' GROUP BY cacat_gudang.cacat_id
        $q = "SELECT b_material.name as nama_material, cacat_gudang.t_gudang_id, t_gudang.date, jenis_cacat.jenis_cacat, jenis_cacat.penyebab, SUM(cacat_gudang.jumlah_cacat) as jumlah_cacat from t_gudang JOIN cacat_gudang ON t_gudang.t_gudang_id = cacat_gudang.t_gudang_id join jenis_cacat ON cacat_gudang.cacat_id = jenis_cacat.cacat_id JOIN b_material on t_gudang.material_id = b_material.material_id";
        $query = [];
        if (isset($_POST['filter'])) {
            $post = $_POST;  
        }else{
            $post['bulan'] = '';
            $post['tahun'] = '';
            $post['material'] = '';
        }
        if ((isset($_POST['filter']) && $_POST['bulan'] != '' && $_POST['tahun'] != '')) {        
            $q .= " WHERE MONTH(t_gudang.date) = '$post[bulan]' AND YEAR(t_gudang.date) = '$post[tahun]'";
        }
        if ($post['material'] != '') {
            $q.=" AND t_gudang.material_id='".$post['material']."'";
        }
        $q.=" GROUP BY cacat_gudang.cacat_id";
        $query['q_text'] = $q;
        $query['res'] = $this->db->query($q);
        return $query;
    }
}
