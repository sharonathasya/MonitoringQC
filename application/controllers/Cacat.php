<?php defined('BASEPATH') or exit('No direct script access allowed');

class cacat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('cacat_m');
    }

    public function index()
    {
        $data['row'] = $this->cacat_m->get();
        $this->template->load('template', 'barang/cacat/cacat_data', $data);
    }

    public function add()
    {
        $cacat = new stdClass();
        $cacat->cacat_id = null;
        $cacat->jenis_cacat = null;
        $cacat->penyebab = null;
        $data = array(
            'page' => 'add',
            'row' => $cacat
        );
        $this->template->load('template', 'barang/cacat/cacat_form', $data);
    }

    public function edit($id)
    {
        $query = $this->cacat_m->get($id);
        if ($query->num_rows() > 0) {
            $cacat = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $cacat
            );
            $this->template->load('template', 'barang/cacat/cacat_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('cacat') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->cacat_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->cacat_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('cacat');
    }

    public function del($id)
    {
        $this->cacat_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('cacat');
    }
}
