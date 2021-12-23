<?php defined('BASEPATH') or exit('No direct script access allowed');

class t_material_m extends CI_Model
{

    public function get_b_material()
    {
        return $query = $this->db->get('b_material');
    }

    public function get($id = null)
    {
        $this->db->select('t_material.*, b_material.name as material_name, supplier.name as supplier_name');
        $this->db->from('t_material');
        $this->db->join('b_material', 'b_material.material_id = t_material.material_id');
        $this->db->join('supplier', 'supplier.supplier_id = t_material.supplier_id');
        if ($id != null) {
            $this->db->where('t_material_id', $id);
        }
        $this->db->order_by('t_material_id', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            't_material_id' => $post['t_material_id'],
            'date' => $post['t_material_date'],
            'material_id' => $post['material'],
            'supplier_id' => $post['supplier'],
            'panjang' => $post['panjang'],
            'diameter' => $post['diameter'],
            'jumlah' => $post['jumlah'],
            'ok' => $post['ok'],
            'reject' => $post['reject'],
            // 'status' => $post['status'],
            'image' => $post['image'],
        ];
        $this->db->insert('t_material', $params);
    }

    public function edit($post)
    {
        $params = [
            't_material_id' => $post['t_material_id'],
            // 'date' => $post['t_material_date'],
            'material_id' => $post['material'],
            'supplier_id' => $post['supplier'],
            'panjang' => $post['panjang'],
            'diameter' => $post['diameter'],
            'jumlah' => $post['jumlah'],
            'ok' => $post['ok'],
            'reject' => $post['reject'],
            // 'status' => $post['status'],
            'updated' => date('Y-m-d H:i:s')
        ];
        if ($post['image'] != null) {
            $params['image'] = $post['image'];
        }
        $this->db->where('t_material_id', $post['id']);
        $this->db->update('t_material', $params);
    }

    function check_t_materialId($code, $id = null)
    {
        $this->db->from('t_material');
        $this->db->where('t_material_id', $code);
        if ($id != null) {
            $this->db->where('t_material_id !=', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('t_material_id', $id);
        $this->db->delete('t_material');
    }


    public function getmaterial($id = null)
    {
        $q = "";
        $query;
        if ((isset($_POST['filter']) && $_POST['date1'] != '' && $_POST['date2'] != '') ||
            (isset($_POST['cetak']) && $_POST['date1'] != '' && $_POST['date2'] != '')
        ) {
            // Menangkap $_POST data
            $post = $_POST;
            // Menyusun query pengambilan data dengan kondisi BETWEEN, menyeleksi diantara dua tanggal
            $q = "SELECT t_material.*, b_material.name as material_name, supplier.name as supplier_name FROM t_material JOIN b_material ON b_material.material_id = t_material.material_id JOIN supplier ON supplier.supplier_id = t_material.supplier_id WHERE t_material.date BETWEEN '" . $post['date1'] . "' AND '" . $post['date2'] . "'";
            if ($post['material'] != '') {
                $q .= " AND t_material.material_id='" . $post['material'] . "'";
                // echo "<br>IF material not empty<br><br>";
            }
            $query = $this->db->query($q);
        } else if (
            (isset($_POST['cetak']) && $_POST['date1'] == '' && $_POST['date2'] == '' && $_POST['material'] != '') || (isset($_POST['cetak']) && $_POST['date1'] == '' && $_POST['date2'] == '' && $_POST['material'] != '')
        ) {
            // Menangkap $_POST data
            $post = $_POST;
            // Menyusun query pengambilan data dengan kondisi WHERE yang biasa, ambil data 1 barang, disemua periode
            $q = "SELECT t_material.*, b_material.name as material_name, supplier.name as supplier_name FROM t_material JOIN b_material ON b_material.material_id = t_material.material_id JOIN supplier ON supplier.supplier_id = t_material.supplier_id WHERE  t_material.material_id='" . $post['material'] . "'";
            // echo "ID not null, tanggal null<br>";
            $query = $this->db->query($q);
        } else {
            $this->db->select('t_material.*, b_material.name as material_name, supplier.name as supplier_name');
            $this->db->from('t_material');
            $this->db->join('b_material', 'b_material.material_id = t_material.material_id');
            $this->db->join('supplier', 'supplier.supplier_id = t_material.supplier_id');
            if ($id != null) {
                $this->db->where('t_material.material_id', $id);
            }
            if (isset($_POST['material']) && $_POST['material'] != '' && !isset($_POST['reset'])) {
                $this->db->where('t_material.material_id', $_POST['material']);
            }
            $this->db->order_by('t_material_id', 'desc');
            $query = $this->db->get();
        }
        return $query;
    }

    public function get_material_pagination($limit = null, $start = null)
    {
        $post = $this->session->userdata('search');
        $this->db->select('t_material.*, b_material.name as material_name, supplier.name as supplier_name');
        $this->db->from('t_material');
        $this->db->join('b_material', 'b_material.material_id = t_material.material_id');
        $this->db->join('supplier', 'supplier.supplier_id = t_material.supplier_id');
        if (!empty($post['date1']) && !empty($post['date2'])) {
            $this->db->where("t_material.date BETWEEN '$post[date1]' AND '$post[date2]'");
        }
        if (!empty($post['material'])) {
            if ($post['material'] == 'null') {

                $this->db->where("t_material.material_id", $post['material']);
            }
        }

        $this->db->limit($limit, $start);
        $this->db->order_by('t_material_id', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function getmaterial_json($id = null)
    {        
        // SELECT cacat_masuk.t_material_id, t_material.date, jenis_cacat.jenis_cacat, jenis_cacat.penyebab, SUM(cacat_masuk.jumlah_reject) from t_material JOIN cacat_masuk ON t_material.t_material_id = cacat_masuk.t_material_id join jenis_cacat ON cacat_masuk.cacat_id = jenis_cacat.cacat_id WHERE MONTH(t_material.date) = '08' AND YEAR(t_material.date) = '2021' AND t_material.material_id='2' GROUP BY cacat_masuk.cacat_id
        $q = "SELECT b_material.name as nama_material, cacat_masuk.t_material_id, t_material.date, jenis_cacat.jenis_cacat, jenis_cacat.penyebab, SUM(cacat_masuk.jumlah_reject) as jumlah_reject from t_material JOIN cacat_masuk ON t_material.t_material_id = cacat_masuk.t_material_id join jenis_cacat ON cacat_masuk.cacat_id = jenis_cacat.cacat_id JOIN b_material on t_material.material_id = b_material.material_id";
        $query = [];
        if (isset($_POST['filter'])) {
            $post = $_POST;  
        }else{
            $post['bulan'] = '';
            $post['tahun'] = '';
            $post['material'] = '';
        }
        if ((isset($_POST['filter']) && $_POST['bulan'] != '' && $_POST['tahun'] != '')) {        
            $q .= " WHERE MONTH(t_material.date) = '$post[bulan]' AND YEAR(t_material.date) = '$post[tahun]'";
        }
        if ($post['material'] != '') {
            $q.=" AND t_material.material_id='".$post['material']."'";
        }
        $q.=" GROUP BY cacat_masuk.cacat_id";
        $query['q_text'] = $q;
        $query['res'] = $this->db->query($q);
        return $query;
    }

    public function getmaterial_detail()
    {
    }
}
