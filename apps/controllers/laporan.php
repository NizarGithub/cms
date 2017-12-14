<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
        $this->tabel->_table = "MTahun";
        $data['tahun'] = $this->tabel->find_all();
        $this->tabel->_table = "MBulan";
        $data['bulan'] = $this->tabel->find_all();
        $this->tabel->_table = "MDok";
        $data['dokHD'] = $this->tabel->find_where(array('IdParent' => '99'));
        $data['dokHKD'] = $this->tabel->find_where(array('IdParent' => '98'));

        $this->tabel->_table = "MProv";
        if ($this->session->userdata('shped_prov') != null && $this->session->userdata('shped_prov') != "") {
            $data['prov'] = $this->tabel->find_where(array('KodeProv' => $this->session->userdata('shped_prov')));
            $this->tabel->_table = "MKab";
            if ($this->session->userdata('shped_kab') != null && $this->session->userdata('shped_kab') != "")
                $kab = $this->tabel->find_where(array('KodeProv' => $this->session->userdata('shped_prov')
                    , 'KodeKab' => $this->session->userdata('shped_kab')));
            else
                $kab = $this->tabel->find_where(array('KodeProv' => $this->session->userdata('shped_prov')));
        }
        else {
            $data['prov'] = $this->tabel->find_all();
            $this->tabel->_table = "MKab";
            $kab = $this->tabel->find_all();
        }

        $kabByProv = array();
        if (is_array($data['prov']) && count($data['prov']) > 0) {
            foreach ($data['prov'] as $p) {
                $kabByProv[$p->KodeProv] = array_values(array_filter($kab, function ($element) use ($p) {
                            return isset($element->KodeProv) && $element->KodeProv == $p->KodeProv;
                        }));
            }
        }

        $data['title'] = "Laporan";
        $data['page'] = "laporan";
        $data['kabByProv'] = $kabByProv;
        $this->load->view('page', $data);
    }

    public function action($act) {
        $index = 1;
        if ($act == "setKec") {
            $param = $this->input->post('param');
            $this->tabel->_table = "MKec";
            $data['kec'] = $this->tabel->find_where(array('KodeProv' => $param['KodeProv'], 'KodeKab' => $param['KodeKab']));
            echo json_encode($data);
        }
        if ($act == "setKom") {
            $param = $this->input->post('param');
            $data = $this->tabel->SelectDataKomByDok($param);
            echo json_encode($data);
        }
        if ($act == "getLaporan") {
            $param = $this->input->post('param');
            $data = $this->tabel->SelectDataLaporan($param);

            $contentTable = '<table class="table table-hover mb-none">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Provinsi</th>
                                        <th>Kabupaten</th>
                                        <th>Kecamatan</th>
                                        <th>Nama Kecamatan</th>                                                    
                                        <th>Kode Komoditas</th>
                                        <th>Nama Komoditas</th>
                                        <th>Kode Kualitas</th>
                                        <th>Nama Kualitas</th>
                                        <th>Harga Bulan Ini</th>
                                        <th>Harga Bulan Sebelumnya</th>
                                    </tr>
                                </thead>
                                <tbody>';
            foreach ($data as $d) {
                $contentTable .= '<tr>';
                $contentTable .= '<td style="text-align:center">' . $index . '</td>';
                $contentTable .= '<td>' . $d['KodeProv'] . '</td>';
                $contentTable .= '<td>' . $d['KodeKab'] . '</td>';
                $contentTable .= '<td>' . $d['KodeKec'] . '</td>';
                $contentTable .= '<td>' . $d['Deskripsi'] . '</td>';
                $contentTable .= '<td>' . $d['KodeKom'] . '</td>';
                $contentTable .= '<td>' . $d['NamaKom'] . '</td>';
                $contentTable .= '<td>' . $d['KodeKualitas'] . '</td>';
                $contentTable .= '<td>' . $d['NamaKualitas'] . '</td>';
                $contentTable .= '<td>' . $d['Harga'] . '</td>';
                $contentTable .= '<td>' . $d['HargaPrev'] . '</td>';
                $contentTable .= '</tr>';
                $index++;
            }
            $contentTable .= '</tbody></table>';
            $data['tabel'] = $contentTable;
            echo json_encode($data);
        }
    }

}
