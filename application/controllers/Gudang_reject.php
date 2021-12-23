<?php defined('BASEPATH') or exit('No direct script access allowed');

class gudang_reject extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['gudang_reject_m', 't_gudang_m', 'cacat_m']);
    }


    public function view($id)
    {
        $this_kode = $id;
        $thisproblem = $this->t_gudang_m->get($this_kode);
        $detail_problem = $this->gudang_reject_m->getByGudang($this_kode);
        $data = array(
            'this_kode' => $this_kode,
            'thisproblem' => $thisproblem->row_array(),
            'jenis_cacat' => $this->cacat_m->get()->result_array(),
            'detail_problem' => $detail_problem->result_array()
        );
        // print_r($data['detail_problem']); die;
        $this->template->load('template', 'reject/gudang_reject_data', $data);
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if ($_POST['event'] == 'add') {
            $this->gudang_reject_m->add($post);
        } else if ($_POST['event'] == 'edit') {
            $this->gudang_reject_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('gudang_reject/view/' . $post['t_gudang_id']);
    }

    public function del($id, $t_gudang_id)
    {
        $this->gudang_reject_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }else{
            $this->session->set_flashdata('success', 'Data gagal dihapus');            
        }
        redirect('gudang_reject/view/' . $t_gudang_id);
    }

    public function get_det_JSON()
    {
        $this_id = $this->input->post('id');
        $thiscacat = $this->gudang_reject_m->get($this_id);
        echo json_encode($thiscacat->row_array());        
    }
}
