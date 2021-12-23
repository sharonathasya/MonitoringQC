<?php
defined('BASEPATH') or exit('No direct script access allowed');

class model_laporan extends CI_Model
{


    public function gettahun()
    {

        $query = $this->db->query("SELECT YEAR(date) AS tahun FROM t_material GROUP BY YEAR(date) ORDER BY YEAR(date) ASC");

        return $query->result();
    }

    public function getmaterial()
    {
        $query = $this->db->query(" SELECT * FROM b_material ORDER BY name ASC");

        return $query->result();
    }

    public function getsupplier()
    {
        $query = $this->db->query(" SELECT * FROM supplier ORDER BY name ASC");

        return $query->result();
    }

    public function getdatauser()
    {
        $query = $this->db->query(" SELECT * FROM user ORDER BY username ASC");

        return $query->result();
    }

    public function filterbytanggal1($tanggalawal, $tanggalakhir)
    {

        $query = $this->db->query("SELECT * from t_material where date BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY date ASC ");

        return $query->result();
    }
    public function filterbytanggal($where)
    {

        $query = $this->db->get_where('t_material', $where);

        return $query->result();
    }

    public function filterbybulan($tahun1, $bulanawal, $bulanakhir)
    {

        $query = $this->db->query("SELECT * from t_material where YEAR(date) = '$tahun1' and MONTH(date) BETWEEN '$bulanawal' and '$bulanakhir' ORDER BY date ASC ");

        return $query->result();
    }

    public function filterbytahun($tahun2)
    {

        $query = $this->db->query("SELECT * from t_material where YEAR(date) = '$tahun2'  ORDER BY date ASC ");

        return $query->result();
    }

    public function filterbytahun2($where)
    {

        $query = $this->db->get_where('t_material', $where);

        return $query->result();
    }
}

/* End of file Barang_model.php */
/* Location: ./application/models/Barang_model.php */