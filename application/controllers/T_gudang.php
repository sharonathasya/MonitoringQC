<?php defined('BASEPATH') or exit('No direct script access allowed');

class t_gudang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['t_gudang_m', 'material_m']);
    }


    public function index()
    {
        $data['row'] = $this->t_gudang_m->get();
        $this->template->load('template', 'transaksi/t_gudang/t_gudang_data', $data);
    }

    public function add()
    {
        $t_gudang = new stdClass();
        $t_gudang->t_gudang_id = null;
        $t_gudang->date = null;
        $t_gudang->no_lot = null;
        $t_gudang->material_id = null;
        $t_gudang->jumlah_masalah = null;
        $t_gudang->jumlah_status = null;
        $t_gudang->status = null;

        $query_material = $this->material_m->get();

        $data = array(
            'page' => 'add',
            'row' => $t_gudang,
            'material' => $query_material,
        );
        $this->template->load('template', 'transaksi/t_gudang/t_gudang_form', $data);
    }

    public function edit($id)
    {
        $query = $this->t_gudang_m->get($id);
        if ($query->num_rows() > 0) {
            $t_gudang = $query->row();
            $query_material = $this->material_m->get();

            $data = array(
                'page' => 'edit',
                'row' => $t_gudang,
                'material' => $query_material,
            );
            $this->template->load('template', 'transaksi/t_gudang/t_gudang_form', $data);
        } else {
            echo "<script>alert('Data tidak dt_gudangukan');";
            echo "window.location='" . site_url('t_gudang') . "';</script>";
        }
    }

    public function process()
    {
        $config['upload_path']    = './uploads/t_gudang/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|pdf';
        $config['max_size']       = 2048;
        $config['file_name']      = 't_gudang-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if ($this->t_gudang_m->check_t_gudangId($post['t_gudang_id'])->num_rows() > 0) {
                $this->session->set_flashdata('danger', "Kode Transaksi gudang Masuk $post[t_gudang_id] sudah digunakan");
                redirect('t_gudang/add');
            } else {
                if (@$_FILES['image']['name'] != null) {
                    if ($this->upload->do_upload('image')) {
                        $post['image'] = $this->upload->data('file_name');
                        $this->t_gudang_m->add($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data berhasil disimpan');
                        }
                        redirect('t_gudang');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('danger', $error);
                        redirect('t_gudang');
                    }
                } else {
                    $post['image'] = null;
                    $this->t_gudang_m->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('t_gudang');
                }
            }
        } else if (isset($_POST['edit'])) {
            if (@$_FILES['image']['name'] != null) {
                if ($this->upload->do_upload('image')) {

                    $t_gudang = $this->t_gudang_m->get($post['id'])->row();
                    if ($t_gudang->image != null) {
                        $target_file = './uploads/t_gudang/' . $t_gudang->image;
                        unlink($target_file);
                    }

                    $post['image'] = $this->upload->data('file_name');
                    $this->t_gudang_m->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('t_gudang');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('danger', $error);
                    redirect('t_gudang');
                }
            } else {
                $post['image'] = null;
                $this->t_gudang_m->edit($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil disimpan');
                }
                redirect('t_gudang');
            }
        }
    }

    public function del($id)
    {
        $t_gudang = $this->t_gudang_m->get($id)->row();
        if ($t_gudang->image != null) {
            $target_file = './uploads/t_gudang/' . $t_gudang->image;
            unlink($target_file);
        }

        $this->t_gudang_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('t_gudang');
    }
}
