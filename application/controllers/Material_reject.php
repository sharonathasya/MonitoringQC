<?php defined('BASEPATH') or exit('No direct script access allowed');

class material_reject extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['material_reject_m', 't_material_m', 'cacat_m']);
    }


    // public function index()
    // {
    //     $data = "";
    //     $this->template->load('template', 'reject/material_reject_data', $data);
    // }

    public function view($id)
    {
        $this_kode = $id;
        $thisproblem = $this->t_material_m->get($this_kode);
        $detail_problem = $this->material_reject_m->getByTransaksi($this_kode);
        $data = array(
            'this_kode' => $this_kode,
            'thisproblem' => $thisproblem->row_array(),
            'jenis_cacat' => $this->cacat_m->get()->result_array(),
            'detail_problem' => $detail_problem->result_array()
        );
        $this->template->load('template', 'reject/material_reject_data', $data);
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if ($_POST['event'] == 'add') {
            $this->material_reject_m->add($post);
        } else if ($_POST['event'] == 'edit') {
            $this->material_reject_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('material_reject/view/' . $post['t_material_id']);
    }

    public function del($id, $t_material_id)
    {
        $this->material_reject_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }else{
            $this->session->set_flashdata('success', 'Data gagal dihapus');            
        }
        redirect('material_reject/view/' . $t_material_id);
    }

    public function get_det_JSON()
    {
        $this_id = $this->input->post('id');
        $thiscacat = $this->material_reject_m->get($this_id);
        echo json_encode($thiscacat->row_array());        
    }
}
