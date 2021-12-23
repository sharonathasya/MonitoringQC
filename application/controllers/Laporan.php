<?php defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['t_material_m', 'material_m', 'cacat_m', 'material_reject_m', 'supplier_m', 't_gudang_m', 'gudang_reject_m']);
    }

    public function l_material()
    {
        $this->load->model('material_m');

        if (isset($_POST['filter'])) {
            $post = $this->input->post(null, TRUE);
            $this->session->set_userdata('search', $post);
        } else {
            $post = $this->session->userdata('search');
            $post['filter'] = '';
            $post['bulan'] = '';
            $post['tahun'] = '';
            $post['material'] = '';
        }

        if (isset($_POST['reset'])) {
            $post['reset'] = 'reset';
            $this->session->unset_userdata('search');
        }

        $data['b_material'] = $this->t_material_m->get_b_material();
        $data['row'] = $this->material_reject_m->getLaporanRejectMaterial();
        $data['post'] = $post;
        if (isset($_POST['cetak'])) {
            $data['post'] = $_POST;            
            $this->load->view('laporan/cetak_laporan_material', $data);
        } else {
            $this->template->load('template', 'laporan/laporan_material', $data);
        }
    }

    public function l_gudang()
    {
        if (isset($_POST['filter'])) {
            $post = $this->input->post(null, TRUE);
            $this->session->set_userdata('search', $post);
        } else {
            $post = $this->session->userdata('search');
            $post['filter'] = '';
            $post['date1'] = '';
            $post['date2'] = '';
            $post['product'] = '';
        }

        if (isset($_POST['reset'])) {
            $post['reset'] = 'reset';
            $this->session->unset_userdata('search');
        }

        // Check this
        $data['b_material'] = $this->t_material_m->get_b_material();        
        $data['row'] = $this->t_gudang_m->get();
        $data['post'] = $post;
        // var_dump($data['row']->result_array()); die;
        if (isset($_POST['cetak'])) {
            $data['post'] = $_POST;            
            $this->load->view('laporan/cetak_laporan_masalah', $data);
        } else {
            // $this->template->load('template', 'laporan/laporan_material', $data);
            $this->template->load('template', 'laporan/laporan_masalah_gudang', $data);
        }
        // 
    }

    public function l_qc()
    {        
        // $data['b_produksi'] = $this->t_gudang_m->get_b_produksi();
        $data['b_material'] = $this->t_material_m->get_b_material();
        $this->template->load('template', 'laporan/laporan_qc', $data);
        // SELECT cacat_masuk.t_material_id, jenis_cacat.jenis_cacat, jenis_cacat.penyebab, SUM(cacat_masuk.jumlah_reject) from cacat_masuk join jenis_cacat ON cacat_masuk.cacat_id = jenis_cacat.cacat_id GROUP BY cacat_masuk.cacat_id
    }

    public function cetak_grafik_bahanbaku()
    {
        $post = null;
        $data['b_material'] = $this->t_material_m->get_b_material();
        $data['material'] = $this->material_m->get($_POST['material'])->row_array();
        $data['row'] = $this->t_material_m->getmaterial();
        $data['post'] = $_POST;
        $this->load->view('laporan/cetak_grafik_bahanbaku', $data);
    }

    public function cetak_grafik_gudang()
    {
        $post = null;
        $data['b_material'] = $this->t_material_m->get_b_material();
        $data['material'] = $this->material_m->get($_POST['material'])->row_array();
        $data['row'] = $this->t_material_m->getmaterial();
        $data['post'] = $_POST;
        $this->load->view('laporan/cetak_grafik_gudang', $data);
    }

    public function getDetailRejectOk_material()
    {
        // Check this
        $data['row'] = $this->t_material_m->getmaterial_json()['res']->result_array();
        $data['q'] = $this->t_material_m->getmaterial_json()['q_text'];
        $data['cacat'] = $this->cacat_m->get()->result_array();
        $data['post'] = $_POST;
        echo json_encode($data);        
    }

    public function getDetailRejectOk_gudang()
    {
        // Check this
        $data['row'] = $this->t_gudang_m->getGudang_json()['res']->result_array();
        $data['q'] = $this->t_gudang_m->getGudang_json()['q_text'];
        $data['post'] = $_POST;
        echo json_encode($data);
    }
}
