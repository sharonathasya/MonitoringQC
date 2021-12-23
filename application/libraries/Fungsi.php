<?php

class Fungsi
{
    protected $ci;

    function __construct()
    {
        $this->ci = &get_instance();
    }

    function user_login()
    {
        $this->ci->load->model('user_m');
        $user_id = $this->ci->session->userdata('userid');
        $user_data = $this->ci->user_m->get($user_id)->row();
        return $user_data;
    }

    public function count_material()
    {
        $this->ci->load->model('material_m');
        return $this->ci->material_m->get()->num_rows();
    }

    public function count_product()
    {
        $this->ci->load->model('product_m');
        return $this->ci->product_m->get()->num_rows();
    }

    public function count_supplier()
    {
        $this->ci->load->model('supplier_m');
        return $this->ci->supplier_m->get()->num_rows();
    }

    public function count_cacat()
    {
        $this->ci->load->model('cacat_m');
        return $this->ci->cacat_m->get()->num_rows();
    }

    public function count_customer()
    {
        $this->ci->load->model('customer_m');
        return $this->ci->customer_m->get()->num_rows();
    }

    public function count_user()
    {
        $this->ci->load->model('user_m');
        return $this->ci->user_m->get()->num_rows();
    }
}
