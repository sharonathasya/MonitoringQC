<?php defined('BASEPATH') or exit('No direct script access allowed');

class L_material extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['t_material_m', 'material_m', 'supplier_m']);
    }

    public function l_material()
    {
        $this->load->model('material_m');

        if (isset($_POST['filter'])) {
            $post = $this->input->post(null, TRUE);
            $this->session->set_userdata('search', $post);
        } else {
            $post = $this->session->userdata('search');
        }

        if (isset($_POST['reset'])) {
            $this->session->unset_userdata('search');
        }

        $data['row'] = $this->t_material_m->getmaterial();
        $data['post'] = $post;
        $this->template->load('template', 'laporan/laporan_material', $data);
    }
}
