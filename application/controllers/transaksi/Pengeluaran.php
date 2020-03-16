<?php


class Pengeluaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_trs_pengeluaran');
        $this->load->model('M_bank', 'M_bank');
        $this->load->model('M_login');
        $this->M_login->isLogin();
    }

    public function index()
    {
        $data['pages'] = 'transaksi/pengeluaran/index';
        $this->load->view('layout', $data);
    }

    public function ajax_list()
    {
        $this->load->helper('url');

        $list = $this->M_trs_pengeluaran->get_datatables();
        $data = array();
        foreach ($list as $d) {
            $row = array();
            $row[] = '<p class="badge badge-dark" style="font-size: 15px;">' . $d->id_trs_rekbiaya;
            $row[] = '<h5 class="text-bold-500">' . $d->periode;
            $row[] = '<h5 class="text-bold-500">' . $d->keterangan;
            $row[] = '<h5 class="text-bold-500">' . number_format($d->total_pengeluaran);
            $row[] = '<p class="text-bold-500">' . date("d/m/Y", strtotime($d->tgl_input));
            $row[] = '<p class="text-bold-500">' . $d->inputby;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Isi Detail Pengeluaran" onclick="detail(' . "'" . $d->id_trs_rekbiaya . "'" . ')"><i class="la la-plus"></i></a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person(' . "'" . $d->id_trs_rekbiaya . "'" . ')"><i class="la la-close"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "recordsTotal" => $this->M_trs_pengeluaran->count_all(),
            "recordsFiltered" => $this->M_trs_pengeluaran->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->M_trs_pengeluaran->get_by_id($id);
        //$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }

    public function ajax_add()
    {
        //$this->_validate();
        $kode = date('Ymds');
        $data = array(
            'id_trs_rekbiaya' => $this->M_trs_pengeluaran->get_ID('id_trs_rekbiaya'),
            'periode' => $this->input->post('periode'),
            'keterangan' => $this->input->post('keterangan'),
            'kd_cabang' => $this->session->userdata('cabang'),
            'total_pengeluaran' => 0,
            'tgl_input' => date('Y-m-d H:i:s'),
            'inputby' => $this->session->userdata('yangLogin'),
        );

        $insert = $this->M_trs_pengeluaran->save($data);

        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            'itemname' => $this->input->post('itemname'),
            'amount' => $this->input->post('amount'),
            'trtype' => $this->input->post('trtype'),
            'kd_cabang' => $this->session->userdata('cabang'),
            'itemcategoryid' => $this->input->post('itemcategoryid'),
            'ukuranid' => $this->input->post('ukuranid'),
            'lastmodify' => date('Y-m-d H:i:s'),
        );
        $this->M_trs_pengeluaran->update(array('itemid' => $this->input->post('itemid')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $this->M_trs_pengeluaran->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('periode') == '') {
            $data['inputerror'][] = 'periode';
            $data['error_string'][] = 'Silahkan Pilih Periode ..';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    function detail($id)
    {
        $data['id'] = $id;
        $data['bank'] = $this->M_bank->get_data();
        $data['headers'] = $this->M_trs_pengeluaran->get_by_id($id);
        $data['rekbiaya'] = $this->M_trs_pengeluaran->get_mrekbiaya();
        $data['pages'] = 'transaksi/pengeluaran/detail';
        $this->load->view('layout', $data);
    }

    public function ajax_add_detail()
    {
        $kode = date('Ymds');
        $data = array(
            'id_dtlrekbiaya' => $this->M_trs_pengeluaran->get_ID_detail('id_trs_rekbiaya'),
            'id_trs_rekbiaya' => $this->input->post('id_header'),
            'kd_bank' => $this->input->post('kd_bank'),
            'id_rekbiaya' => $this->input->post('id_rekbiaya'),
            'keterangan' => $this->input->post('keterangan'),
            'harga' => str_replace(".", "", $this->input->post('harga')),
            'tgl_input' => date('Y-m-d H:i:s'),
            'inputby' => $this->session->userdata('yangLogin'),
        );
        // var_dump($data);
        // exit();

        $insert = $this->M_trs_pengeluaran->save_detail($data, $this->input->post('id_header'));

        echo json_encode(array("status" => TRUE));
    }

    public function ajax_list_detail($id)
    {
        $this->load->helper('url');

        $list = $this->M_trs_pengeluaran->get_datatables_detail($id);
        $data = array();
        foreach ($list as $d) {
            $row = array();
            $row[] = '<h5>' . $d->nm_rekbiaya;
            $row[] = '<h5 class="text-bold-500">' . number_format($d->harga);
            $row[] = '<h5 class="text-bold-500">' . $d->keterangan;
            $row[] = '<h5 class="text-bold-500">' . $d->nm_bank;
            $row[] = '<p class="text-bold-500">' . date("d/m/Y", strtotime($d->tgl_input));
            $row[] = '<p class="text-bold-500">' . $d->inputby;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_detail(' . "'" . $d->id_dtlrekbiaya . "'" . ')"><i class="la la-close"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "recordsTotal" => $this->M_trs_pengeluaran->count_all_detail($id),
            "recordsFiltered" => $this->M_trs_pengeluaran->count_filtered_detail($id),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_delete_detail($id)
    {
        $this->M_trs_pengeluaran->delete_by_id_detail($id);
        echo json_encode(array("status" => TRUE));
    }


}
