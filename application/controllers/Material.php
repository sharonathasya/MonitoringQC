<?php defined('BASEPATH') or exit('No direct script access allowed');

class material extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['material_m', 'supplier_m']);
    }

    public function index()
    {
        $data['row'] = $this->material_m->get();
        $this->template->load('template', 'barang/material/material_data', $data);
    }

    public function add()
    {
        $material = new stdClass();
        $material->material_id = null;
        $material->name = null;
        $material->supplier_id = null;

        $query_supplier = $this->supplier_m->get();

        $data = array(
            'page' => 'add',
            'row' => $material,
            'supplier' => $query_supplier,
        );
        $this->template->load('template', 'barang/material/material_form', $data);
    }

    public function edit($id)
    {
        $query = $this->material_m->get($id);
        if ($query->num_rows() > 0) {
            $material = $query->row();
            $query_supplier = $this->supplier_m->get();

            $data = array(
                'page' => 'edit',
                'row' => $material,
                'supplier' => $query_supplier,
            );
            $this->template->load('template', 'barang/material/material_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('material') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->material_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->material_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('material');
    }

    public function del($id)
    {
        $this->material_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('material');
    }
}
