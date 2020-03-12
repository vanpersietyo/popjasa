<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bankin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_bankin', 'M_bankin');
		$this->load->model('M_bankout', 'M_bankout');
		$this->load->model('M_bank', 'M_bank');
		$this->load->model('M_login');
	}

//	public function index()
//	{
//		$data['bank']   = $this->M_bank->get_data();
//		$data['pages']  = 'transaksi/bankin/list_bankin';
//		$this->load->view('layout', $data);
//	}
    public function index()
    {
        $data['bank']       = $this->M_bank->find();
        $data['pages']      = 'transaksi/bankin/list_bankin';
        $this->load->view('layout', $data);
    }

    public function ajax_data()
    {
        $this->load->helper('url');
        $list = $this->M_bankin->get_user();
        $data = array();
        foreach ($list as $d) {
            $row = array();
            if ($d->ST_DATA == 1) {
                $row[] = '<button type="button" class="btn btn-blue bg-accent-4 dropdown-toggle btn-sm" data-toggle="dropdown"
														aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
														<div class="dropdown-menu">
															<a class="dropdown-item"  href="javascript:void(0)" onclick="edit_person(' . "'" . $d->ID_TRANS . "'" . ')"><i class="ft-edit"></i> Edit Data</a>
															<a class="dropdown-item" href="javascript:void(0)" onclick="lookup(' . "'" . $d->ID_TRANS . "'" . ')"><i class="ft-file"></i> View Data</a>
														</div>';
            } else {
                $row[] = '<button type="button" class="btn btn-blue bg-accent-4 dropdown-toggle btn-sm" data-toggle="dropdown"
															aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
															<div class="dropdown-menu">
                              	<a class="dropdown-item" href="javascript:void(0)" onclick="konfirmasi(' . "'" . $d->ID_TRANS . "'" . ')"><i class="fa fa-check info"></i><b class="info"> Konfirmasi Data</b></a>
																<a class="dropdown-item"  href="javascript:void(0)" onclick="edit_person(' . "'" . $d->ID_TRANS . "'" . ')"><i class="ft-edit"></i> Edit Data</a>
																<a class="dropdown-item" href="javascript:void(0)" onclick="delete_person(' . "'" . $d->ID_TRANS . "'" . ')"><i class="ft-trash"></i> Hapus Data</a>
																<a class="dropdown-item" href="javascript:void(0)" onclick="lookup(' . "'" . $d->ID_TRANS . "'" . ')"><i class="ft-file"></i> View Data</a>
															</div>';
            }
            $row[] = $d->ID_TRANS;
            $row[] = $d->KD_BANK;
            $row[] = number_format($d->SLD_MASUK);
            $row[] = $d->KETERANGAN;
            $row[] = strtoupper(date("d-m-Y", strtotime($d->TGL_BUAT)));
            $row[] = $d->ID_OPR;

            $data[] = $row;
        }

        $output = array(

            "recordsTotal" => $this->M_bankin->count_all(),
            "recordsFiltered" => $this->M_bankin->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }


    public function ajax_edit($id)
    {
        $data = $this->M_bankin->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $this->_validate();
        $kode = date('Ymds');
        $data = array(
            'ID_TRANS' => $this->M_bankin->get_ID(),
            'KD_BANK' => $this->input->post('KD_BANK'),
            'SLD_MASUK' => str_replace(".", "", $this->input->post('SLD_MASUK')),
            'ST_DATA' => 0,
            'TGL_BUAT' => strtoupper(date("Y-m-d H:i:s", strtotime($this->input->post('TGL_BUAT')))) ?: date("Y-m-d H:i:s"),
            'KETERANGAN' => $this->input->post('KETERANGAN'),
            'TGL_TRANS' => date('Y-m-d H:i:s'),
            'ID_OPR' => $this->session->userdata('yangLogin'),
        );

        $insert = $this->M_bankin->save($data);

        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            'KD_BANK' => $this->input->post('KD_BANK'),
            'SLD_MASUK' => str_replace(".", "", $this->input->post('SLD_MASUK')),
            'TGL_BUAT' => strtoupper(date("Y-m-d H:i:s", strtotime($this->input->post('TGL_BUAT')))),
            'KETERANGAN' => $this->input->post('KETERANGAN'),
        );
        $this->M_bankin->update(array('ID_TRANS' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $this->M_bankin->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_konfirmasi($id)
    {
        //  $this->_validate();
        $data = array(
            'ST_DATA' => 1,
        );
        $this->M_bankin->update(array('ID_TRANS' => $id), $data);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $this->conversion->translate_error_form_validation();
        $data = $data['inputerror'] = $data['notiferror'] = $data['notiferror'] = []; //inisialisasi
        $data['status']         = TRUE; // TRUE = validation lolos | FALSE = validation gagal
        $data['sw_alert']       = FALSE; // TRUE = kirim error swal dari controller | FALSE : tidak kirim error swal

        //validasi input
        $this->form_validation->set_rules(M_bankin::KD_BANK, 'Kode Bank', 'required|trim');
        $this->form_validation->set_rules(M_bankin::SLD_MASUK, 'Saldo Masuk', 'required|trim');

        if ($this->form_validation->run() == FALSE){
            $data['status'] = FALSE;
            foreach ($this->form_validation->error_array() as $dtl => $value) {
                $data['inputerror'][]   = $dtl;
                $data['notiferror'][]   = Conversion::template_error($value);
            }
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }
}
