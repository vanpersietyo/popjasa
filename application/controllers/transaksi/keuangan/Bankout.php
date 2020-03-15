<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bankout extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('transaksi/keuangan/M_bankout', 'M_bankout');
        $this->load->model('M_bank');
        $this->load->model('M_login');
    }

    public function index()
    {
        $data['bank'] = $this->M_bank->find();
        $data['pages'] = 'transaksi/keuangan/bankout/list_bankout';
        $this->load->view('layout', $data);
    }

    public function ajax_data()
    {
        $list = $this->M_bankout->find([],[M_bankout::TGL_TRANS => 'desc']);
        $data = array();
        if($list){
            /** @var M_bankout[] $list */
            foreach ($list as $d) {
                $row = array();
                $konfirmasi = $d->ST_DATA ?
                    "<span class='badge badge-success'>SUDAH KONFIRMASI</span>"
                    :
                    "<span class='badge badge-danger'>BELUM KONFIRMASI</span>";
                $button = $d->ST_DATA ?
                    '<button type="button" class="btn btn-blue bg-accent-4 dropdown-toggle btn-sm" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
                    <div class="dropdown-menu">
					    <a class="dropdown-item" href="javascript:void(0)" onclick="lookup(' . "'" . $d->ID_TRANS . "'" . ')"><i class="ft-file"></i> Lihat Data</a>
                    </div>'
                    :
                    '<button type="button" class="btn btn-blue bg-accent-4 dropdown-toggle btn-sm" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
					<div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:void(0)" onclick="konfirmasi(' . "'" . $d->ID_TRANS . "'" . ')"><i class="ft-check"></i> Konfirmasi Data</a>
						<a class="dropdown-item"  href="javascript:void(0)" onclick="edit_person(' . "'" . $d->ID_TRANS . "'" . ')"><i class="ft-edit"></i> Edit Data</a>
						<a class="dropdown-item" href="javascript:void(0)" onclick="delete_person(' . "'" . $d->ID_TRANS . "'" . ')"><i class="ft-trash"></i> Hapus Data</a>
                    </div>';
                $row[] = $button;
                $row[] = $d->ID_TRANS;
                $row[] = Conversion::convert_date($d->TGL_TRANS,'d-m-Y');
                $row[] = $d->KD_BANK;
                $row[] = $d->SLD_KELUAR;
                $row[] = $d->KETERANGAN;
                $row[] = $konfirmasi;
                $row[] = $d->ID_OPR;

                $data[] = $row;
            }
        }

        $output = array(

            "recordsTotal"      => $this->M_bankout->count_all(),
            "recordsFiltered"   => $this->M_bankout->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }


    public function ajax_edit($id)
    {
        $data = $this->M_bankout->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $this->_validate();
        $data = [
            'ID_TRANS'      => $this->M_bankout->get_ID(),
            'KD_BANK'       => $this->input->post('KD_BANK'),
            'SLD_KELUAR'    => str_replace(".", "", $this->input->post('SLD_KELUAR')),
            'TGL_TRANS'     => Conversion::convert_date($this->input->post(M_bankout::TGL_TRANS),'Y-m-d'),
            'ST_DATA'       => 0,
            'TGL_BUAT'      => date("Y-m-d H:i:s"),
            'KETERANGAN'    => $this->input->post('KETERANGAN'),
            'ID_OPR'        => $this->session->userdata('yangLogin'),
        ];
        $this->M_bankout->save($data);

        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            'KD_BANK'       => $this->input->post('KD_BANK'),
            'SLD_KELUAR'    => str_replace(".", "", $this->input->post('SLD_KELUAR')),
            'TGL_TRANS'     => Conversion::convert_date($this->input->post(M_bankout::TGL_TRANS),'Y-m-d'),
            'KETERANGAN'    => $this->input->post('KETERANGAN'),
        );
        $this->M_bankout->update(array('ID_TRANS' => $this->input->post(M_bankout::ID_TRANS)), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $this->M_bankout->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_konfirmasi($id)
    {
        $data = array(
            'ST_DATA' => 1,
        );
        $this->M_bankout->update(array('ID_TRANS' => $id), $data);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $this->conversion->translate_error_form_validation();
        $data = $data['inputerror'] = $data['notiferror'] = $data['notiferror'] = []; //inisialisasi
        $data['status']         = TRUE; // TRUE = validation lolos | FALSE = validation gagal
        $data['sw_alert']       = FALSE; // TRUE = kirim error swal dari controller | FALSE : tidak kirim error swal

        //validasi input
        $this->form_validation->set_rules(M_bankout::KD_BANK, 'Kode Bank', 'required|trim');
        $this->form_validation->set_rules(M_bankout::SLD_KELUAR, 'Saldo Keluar', 'required|trim');
        $this->form_validation->set_rules(M_bankout::TGL_TRANS, 'Tanggal Transaksi', 'required|trim');

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
