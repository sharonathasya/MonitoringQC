<?php
class Laporanpdf extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
    }

    function index()
    {
        $pdf = new FPDF('p', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage('');
        // setting jenis font yang akan digunakan

        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 7, 'Laporan Jadwal Produski', 0, 1, 'C');
        $pdf->Ln();
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->image('assets/bootstrap/img/hino.png', 8, 8, -1000, 'C');
        $pdf->Cell(190, 7, 'PT Baneex Indonesia', 0, 1, 'C');
        $pdf->Cell(190, 7, 'Kawasan Industri Kota Bukit Indah, Jalan Damar, Blok D1 No.1, Dangdeur, Purwakarta, Kabupaten Purwakarta, Jawa Barat', 0, 1, 'C');
        $pdf->Ln();

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->setmargins(20.5, 15.5);
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(30, 6, 'Model', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Suffix', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Kebutuhan', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Lot No', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Tanggal Produksi', 1, 0, 'C');
        $pdf->SetFont('Arial', '', 10);

        $qa = $this->db->get('ccr')->result();
        $pdf->Ln();
        //untuk nambah space
        foreach ($qa as $row) {
            $pdf->Cell(30, 6, $row->model, 1, 0, 'C');
            $pdf->Cell(30, 6, $row->suffix, 1, 0, 'C');
            $pdf->Cell(35, 6, $row->kebutuhan, 1, 0, 'C');
            $pdf->Cell(35, 6, $row->lot_no, 1, 0, 'C');
            $pdf->Cell(35, 6, $row->tgl_produksi, 1, 0, 'C');
            $pdf->Ln();
        }
        $pdf->Output('');
    }
}
