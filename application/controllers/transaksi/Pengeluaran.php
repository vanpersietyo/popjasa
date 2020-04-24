<?php

class Pengeluaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_trs_pengeluaran');
        $this->load->model('M_trs_detail_rekening_biaya');
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
        $this->load->model('transaksi/keuangan/M_v_trs_rekening_biaya');
        $list = $this->M_v_trs_rekening_biaya->find();
        $data = array();
        foreach ($list as $d) {
            $row = array();
            $row[] = '<span class="badge badge-dark" style="font-size: 15px;">' . $d->id_trs_rekbiaya."</span>";
            $row[] = $d->periode;
            $row[] = '<span class="badge badge-success" style="font-size: 15px;"> Tahun '. $d->tahun. '</span>';
            $row[] = $d->keterangan;
            $row[] = $d->total_pengeluaran;
            $row[] = date("d/m/Y", strtotime($d->tgl_input));
            $row[] = $d->inputby;

            $row[] = '
                <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Isi Detail Pengeluaran" onclick="detail(' . "'" . $d->id_trs_rekbiaya . "'" . ')"><i class="fa fa-plus"></i></a>
	            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person(' . "'" . $d->id_trs_rekbiaya . "'" . ')"><i class="fa fa-times"></i></a>';
            $data[] = $row;
        }

        $output = array(
            "recordsTotal"      => $this->M_v_trs_rekening_biaya->count(),
            "recordsFiltered"   => $this->M_v_trs_rekening_biaya->count(),
            "data"              => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_add()
    {
        $this->_validate();
        $periode = $this->input->post(M_trs_pengeluaran::periode);
        $data = array(
            M_trs_pengeluaran::id_trs_rekbiaya  => $this->M_trs_pengeluaran->get_ID(),
            M_trs_pengeluaran::periode          => $periode,
            M_trs_pengeluaran::keterangan       => $this->input->post(M_trs_pengeluaran::keterangan),
            M_trs_pengeluaran::kd_cabang        => $this->session->userdata('cabang'),
            M_trs_pengeluaran::total_pengeluaran=> 0,
            M_trs_pengeluaran::tgl_input        => date('Y-m-d H:i:s'),
            M_trs_pengeluaran::tahun            => date('Y'),
            M_trs_pengeluaran::bulan            => Conversion::monthNumber($periode,true) ?: date('m'),
            M_trs_pengeluaran::inputby          => $this->session->userdata('yangLogin'),
        );
        $this->M_trs_pengeluaran->save($data);
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
        $this->conversion->translate_error_form_validation();
        $data = $data['inputerror'] = $data['notiferror'] = $data['notiferror'] = []; //inisialisasi
        $data['status']         = TRUE; // TRUE = validation lolos | FALSE = validation gagal
        $data['sw_alert']       = FALSE; // TRUE = kirim error swal dari controller | FALSE : tidak kirim error swal

		$this->form_validation->set_rules('periode', 'Periode', 'required|trim');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
//
		if ($this->form_validation->run() == FALSE){
			$data['status'] = FALSE;
			foreach ($this->form_validation->error_array() as $dtl => $value) {
				$data['inputerror'][]   = $dtl;
				$data['notiferror'][]   = Conversion::template_error($value);
			}
		}

		$tahun   = date('Y');
		$periode = $this->input->post(M_trs_pengeluaran::periode);
		$exists  = $this->M_trs_pengeluaran->find([
		    M_trs_pengeluaran::periode  => $periode,
		    M_trs_pengeluaran::tahun    => $tahun
        ]);
		if($exists){
            $data['status']     = FALSE;
            $data['inputerror'][] = M_trs_pengeluaran::periode;
            $data['notiferror'][] = Conversion::template_error("Periode $periode $tahun Sudah Ada!");
        }
//        $exist  = $this->M_trans_penambahan_a->find($where);
//        if($exist){
//            $data['message']        = 'Data Produk Sudah Ada';
//            $data['sw_alert']       = TRUE;
//            $data['status']         = FALSE;
//        }

        if(!$data['status'])
        {
            echo json_encode($data);
            exit();
        }
    }

    function detail($id)
    {
        $headers    = $this->M_trs_pengeluaran->get_by_id($id);
        if($headers){
            $periode    = Conversion::monthNumber($headers->periode,true);
            $currentday = $headers->tahun.'-'.$periode.'-'.date('d');
            $date       = $headers->tahun.'-'.$periode.'-01';
            $data       = [
                'id'        => $id,
                'bank'      => $this->M_bank->get_data(),
                'headers'   => $headers,
                'rekbiaya'  => $this->M_trs_pengeluaran->get_mrekbiaya(),
                'firstDay'  => $date,
                'currentDay'=> $currentday,
                'lastDay'   => Conversion::convert_date($date,'Y-m-t'),
                'pages'     => 'transaksi/pengeluaran/detail'
            ];
//            echo "<pre>";
//            var_dump($data);
//            echo "</pre>";
//            die();
            $this->load->view('layout', $data);
        }
    }

    public function ajax_add_detail()
    {
        $this->_validateDetail();
        $idRekBiaya = $this->input->post(M_trs_detail_rekening_biaya::id_trs_rekbiaya);
        $data = array(
            'id_dtlrekbiaya'    => $this->M_trs_detail_rekening_biaya->get_ID(),
            'id_trs_rekbiaya'   => $idRekBiaya,
            'kd_bank'           => $this->input->post(M_trs_detail_rekening_biaya::kd_bank),
            'id_rekbiaya'       => $this->input->post(M_trs_detail_rekening_biaya::id_rekbiaya),
            'keterangan'        => $this->input->post(M_trs_detail_rekening_biaya::keterangan),
            'harga'             => Conversion::unmasked_money($this->input->post(M_trs_detail_rekening_biaya::harga)),
            'tgl_input'         => $this->input->post(M_trs_detail_rekening_biaya::tgl_input),
            'inputby'           => $this->session->userdata('yangLogin'),
        );
        $this->M_trs_detail_rekening_biaya->save($data);

        echo json_encode(array("status" => TRUE));
    }

    private function _validateDetail()
    {
        $this->conversion->translate_error_form_validation();
        $data               = $data['inputerror'] = $data['notiferror'] = $data['notiferror'] = []; //inisialisasi
        $data['status']     = TRUE; // TRUE = validation lolos | FALSE = validation gagal
        $data['sw_alert']   = FALSE; // TRUE = kirim error swal dari controller | FALSE : tidak kirim error swal

        $this->form_validation->set_rules(M_trs_detail_rekening_biaya::tgl_input, 'Tanggal Pengeluaran', 'required|trim');
        $this->form_validation->set_rules(M_trs_detail_rekening_biaya::harga, 'Jumlah Pengeluaran', 'required|trim');
        $this->form_validation->set_rules(M_trs_detail_rekening_biaya::keterangan, 'Keterangan', 'required|trim');
//
        if ($this->form_validation->run() == FALSE){
            $data['status'] = FALSE;
            foreach ($this->form_validation->error_array() as $dtl => $value) {
                $data['inputerror'][]   = $dtl;
                $data['notiferror'][]   = Conversion::template_error($value);
            }
        }

        $harga = Conversion::unmasked_money($this->input->post(M_trs_detail_rekening_biaya::harga));
        if($harga <= 0){
            $data['status']     = FALSE;
            $data['inputerror'][] = M_trs_detail_rekening_biaya::harga;
            $data['notiferror'][] = Conversion::template_error("Jumlah Pengeluaran Harus Lebih Dari 0");
        }

        if(!$data['status'])
        {
            echo json_encode($data);
            exit();
        }
    }

    public function ajax_list_detail($id)
    {
        $this->load->model('transaksi/keuangan/M_v_trs_detail_rekening_biaya');
        $list = $this->M_v_trs_detail_rekening_biaya->find([M_v_trs_detail_rekening_biaya::id_trs_rekbiaya => $id]);
        $data = array();
        if($list){
            /** @var M_v_trs_detail_rekening_biaya $d */
            foreach ($list as $d) {
                $row = array();
                $row[] = Conversion::convert_date($d->tgl_input,'d-m-Y');
                $row[] = $d->nm_rekbiaya;
                $row[] = $d->keterangan;
                $row[] = $d->harga;
                $row[] = $d->kd_bank;
                $row[] = $d->inputby;
                //add html for action
                $row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_detail(' . "'" . $d->id_dtlrekbiaya . "'" . ')"><i class="fas fa-times"></i></a>';

                $data[] = $row;
            }
        }
        $output = array(
            "recordsTotal"      => $this->M_v_trs_detail_rekening_biaya->count([M_v_trs_detail_rekening_biaya::id_trs_rekbiaya => $id]),
            "recordsFiltered"   => $this->M_v_trs_detail_rekening_biaya->count([M_v_trs_detail_rekening_biaya::id_trs_rekbiaya => $id]),
            "data"              => $data,
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
