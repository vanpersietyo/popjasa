<?php


class Progress extends CI_Controller{
	function __construct(){
		parent::__construct();

		$this->load->model('M_login');
		$this->M_login->isLogin();
		$this->load->model('M_Customer');
		$this->load->model('M_project');
	}

	public function index(){
		$data['pages']='sales/progress/list_progress';
		$this->load->view('layout',$data);
	}

  function update_track($id){
      $data['id_header'] = $id;
      $data['produk'] = $this->M_project->get_trs_project_by_project($id);
      $hdr = $this->M_project->get_trs_project_by_project($id);
      $data['id_customer'] = $hdr->id_customer;
      $data['customer'] = $this->M_Customer->get_by_id($hdr->id_customer);
      $data['produk'] = $this->M_project->get_produk();
      $data['project'] = $hdr;
      if ($hdr->st_data == 1) {
          $data['status'] = 'disabled';
      } else {
          $data['status'] = '';
      }

      $data['pages'] = 'sales/progress/update_track2';
      $this->load->view('layout', $data);
      // $data['pages']='sales/progress/update_track';
      // $this->load->view('layout',$data);
  }

	public function ajax_list()
    {
        $this->load->helper('url');

        $list = $this->M_project->get_trs_project_confirmed();
        $data = array();

        foreach ($list as $d) {
            $row = array();
            if ($d->st_data == 1) {
                $status = '<h5 class="text-bold-500 text-info">Confirmed';
            } else {
                $status = '<h5 class="text-bold-500 text-red">Not Confirmed';
            }
            if ($d->st_project==1){
                $project_a='<span class="badge badge-primary badge-md">PopJasa</span>';
            }else{
                $project_a='<span class="badge badge-warning badge-md">Jasamura</span>';
            }
            if ($this->session->userdata('akses_user')=='OPS' | $this->session->userdata('akses_user')=='ops'){
                $row[] = '<button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-toggle="dropdown"
														aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
														<div class="dropdown-menu">
														<a class="dropdown-item"  href="javascript:void(0)" onclick="update_track(' . "'" . $d->id_project . "'" . ')"><i class="ft-share-2"></i> Update Progress</a>
														</div>';
            }else{
                $row[] = '<button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-toggle="dropdown"
														aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
														<div class="dropdown-menu">
														<a class="dropdown-item"  href="javascript:void(0)" onclick="create(' . "'" . $d->id_project . "'" . ')"><i class="ft-file"></i> Lihat Project</a>
														<a class="dropdown-item"  href="javascript:void(0)" onclick="invoice(' . "'" . $d->id_project . "'" . ')"><i class="ft-printer"></i> Cetak Invoice</a>
														<a class="dropdown-item"  href="javascript:void(0)" onclick="update_track(' . "'" . $d->id_project . "'" . ')"><i class="ft-share-2"></i> Update Progress</a>
														</div>';
            }

            $row[] = '<h5 class="text-bold-500">' . $d->id_project;
            $row[] = '<h5 class="text-bold-500">' . $d->nm_customer;
            if ($this->session->userdata('akses_user')=='OPS' | $this->session->userdata('akses_user')=='ops'){
            }else{
                $row[] = '<h5 class="text-bold-500">' . number_format($d->harga_jual);
            }
            $date = date("d/m/Y", strtotime($d->tgl_input));
            $row[] = $status;
            $row[] = $project_a;
            $row[] = '<h5 class="text-bold-500">' . $date;
            $row[] = '<h5 class="text-bold-500">' . $d->input_by;
            //add html for action


            $data[] = $row;
        }

		$output = array(
            "recordsTotal" => $this->M_project->count_trs_project_hdr(),
            "recordsFiltered" => $this->M_project->count_trs_project_hdr(),
            "data" => $data,
        );
		//output to json format
		echo json_encode($output);
	}

	function save_minuta(){
		echo "sukses";
	}

	function cetak($id){
        $data['dokumen'] = $this->M_project->get_dokumen($id);
        var_dump($data);
    }

}
