<?php defined('BASEPATH') or exit('No direct script access allowed');

class t_material extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['t_material_m', 'material_m', 'supplier_m']);
    }


    public function index()
    {
        $data['row'] = $this->t_material_m->get();
        $this->template->load('template', 'transaksi/t_material/t_material_data', $data);
    }

    public function add()
    {
        $t_material = new stdClass();
        $t_material->t_material_id = null;
        $t_material->date = null;
        $t_material->material_id = null;
        $t_material->supplier_id = null;
        $t_material->panjang = null;
        $t_material->diameter = null;
        $t_material->jumlah = null;
        $t_material->ok = null;
        $t_material->reject = null;
        $t_material->status = null;

        $query_material = $this->material_m->get();
        $query_supplier = $this->supplier_m->get();

        $data = array(
            'page' => 'add',
            'row' => $t_material,
            'material' => $query_material,
            'supplier' => $query_supplier,
        );
        $this->template->load('template', 'transaksi/t_material/t_material_form', $data);
    }

    public function edit($id)
    {
        $query = $this->t_material_m->get($id);
        if ($query->num_rows() > 0) {
            $t_material = $query->row();
            $query_material = $this->material_m->get();
            $query_supplier = $this->supplier_m->get();

            $data = array(
                'page' => 'edit',
                'row' => $t_material,
                'material' => $query_material,
                'supplier' => $query_supplier,
            );
            $this->template->load('template', 'transaksi/t_material/t_material_form', $data);
        } else {
            echo "<script>alert('Data tidak dt_materialukan');";
            echo "window.location='" . site_url('t_material') . "';</script>";
        }
    }

    public function process()
    {
        $config['upload_path']    = './uploads/t_material/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|pdf';
        $config['max_size']       = 2048;
        $config['file_name']      = 't_material-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if ($this->t_material_m->check_t_materialId($post['t_material_id'])->num_rows() > 0) {
                $this->session->set_flashdata('danger', "Kode Transaksi Material Masuk $post[t_material_id] sudah digunakan");
                redirect('t_material/add');
            } else {
                if (@$_FILES['image']['name'] != null) {
                    if ($this->upload->do_upload('image')) {
                        $post['image'] = $this->upload->data('file_name');
                        $this->t_material_m->add($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data berhasil disimpan');
                        }
                        redirect('t_material');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('danger', $error);
                        redirect('t_material');
                    }
                } else {
                    $post['image'] = null;
                    $this->t_material_m->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('t_material');
                }
            }
        } else if (isset($_POST['edit'])) {
            if (@$_FILES['image']['name'] != null) {
                if ($this->upload->do_upload('image')) {

                    $t_material = $this->t_material_m->get($post['id'])->row();
                    if ($t_material->image != null) {
                        $target_file = './uploads/t_material/' . $t_material->image;
                        unlink($target_file);
                    }

                    $post['image'] = $this->upload->data('file_name');
                    $this->t_material_m->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('t_material');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('danger', $error);
                    redirect('t_material');
                }
            } else {
                $post['image'] = null;
                $this->t_material_m->edit($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil disimpan');
                }
                redirect('t_material');
            }
        }
    }

    public function del($id)
    {
        $t_material = $this->t_material_m->get($id)->row();
        if ($t_material->image != null) {
            $target_file = './uploads/t_material/' . $t_material->image;
            unlink($target_file);
        }

        $this->t_material_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('t_material');
    }
}
