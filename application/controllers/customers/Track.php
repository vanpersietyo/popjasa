<?php


class Track extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Project_logs');
        $this->load->model('M_Project_ket');
        $this->load->model('M_Project_izin');
        $this->load->model('M_Project_uraian');
        $this->load->model('M_Project_terima');
        $this->load->model('M_project');
        $this->load->model('M_Customer');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data['pages'] = 'customer/search_track';
        $this->load->view('layout_customer', $data);
    }


    public function order()
    {
        $id = $this->input->post('id_inv');
        $project_log = $this->M_Project_logs->get_by_id($id);
        $data['id_header'] = $id;
        $data['produk'] = $this->M_project->get_trs_project_by_project($id);
        $hdr = $this->M_project->get_trs_project_by_project($id);
        $data['id_customer'] = $hdr->id_customer;
        $data['customer'] = $this->M_Customer->get_by_id($hdr->id_customer);
        $data['produk'] = $this->M_project->get_produk();
        $data['project'] = $hdr;
        $data['id_project']=$id;
        if ($hdr->st_data == 1) {
            $data['status'] = 'disabled';
        } else {
            $data['status'] = '';
        }
        $data['project_log']= $project_log;

        $data['pages'] = 'customer/list_order';
        $this->load->view('layout_customer', $data);
    }

    public function ajax_produk($id)
    {
        $this->load->helper('url');

        $list = $this->M_project->get_user_project($id);
        $data = array();

        foreach ($list as $d) {
            $row = array();
            $row[] = '<h5 class="text-bold-500">' . $d->nama_layanan;
            $row[] = $d->harga_jual;


            $data[] = $row;
        }

        $output = array(

            "recordsTotal" => $this->M_project->count_all_project($id),
            "recordsFiltered" => $this->M_project->count_filtered_project($id),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function json($id)
    {
        $list = $this->M_Project_logs->get_by_id_list($id);
        $data = array();
        $no = 0;
        foreach ($list as $field) {
            if ($field->Status_log == 0) {
                $status = '<h5 class="text-bold-500 text-info">New Progress';
            } elseif ($field->Status_log == 1) {
                $status = '<h5 class="text-bold-500 text-red">On Progress';
            } else {
                $status = '<h5 class="text-bold-500 text-red">Finish';
            }
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $status;
            $row[] = $field->tgl_log;
            $row[] = $field->keterangan;
            $row[] = $field->created_by;
            $data[] = $row;
        }

        $output = array(
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function show_keterangan($id){
        $row = $this->M_Project_ket->get_by_id($id);
        $data = array(
            'Ket_Email' => $row->Ket_Email,
            'Email_Pengurus' => $row->Email_Pengurus,
            'No_Telp' => $row->No_Telp,
            'Ket_Luas' => $row->Ket_Luas,
            'Ket_Bidang_Usaha' => $row->Ket_Bidang_Usaha,
            'Ket_Bidang_Usaha_Utama' => $row->Ket_Bidang_Usaha_Utama,
            'Ket_Informasi' => $row->Ket_Informasi,
            'ID_Project_Ket' => $row->ID_Project_Ket,
            'ID_Hdr_Project' => $row->ID_Hdr_Project,
            'ID_Project' => $row->ID_Project,
            'Created_By' => $row->Created_By,
            'EntryTime' => $row->EntryTime,
            'Modified_By' => $row->Modified_By,
            'Last_Mofidified' => $row->Last_Mofidified,
            'id' =>$id
        );
        $this->load->view('customer/show_keterangan', $data);
    }

    function show_izin($id){
        $row = $this->M_Project_izin->get_by_id($id);
        $data = array(
            'Bool_Izin_Akta_Notaris' => $row->Bool_Izin_Akta_Notaris,
            'Izin_Akta_Notaris' => $row->Izin_Akta_Notaris,
            'Bool_Izin_Pengesahan' => $row->Bool_Izin_Pengesahan,
            'Izin_Pengesahan' => $row->Izin_Pengesahan,
            'Bool_NPWP' => $row->Bool_NPWP,
            'Bool_NPWP_Perusahaan' => $row->Bool_NPWP_Perusahaan,
            'Bool_SKT_Perusahaan' => $row->Bool_SKT_Perusahaan,
            'Bool_SIUP_TDP' => $row->Bool_SIUP_TDP,
            'Bool_Registrasi' => $row->Bool_Registrasi,
            'Bool_PKP' => $row->Bool_PKP,
            'Bool_SK_Domisili' => $row->Bool_SK_Domisili,
            'Izin_Lain' => $row->Izin_Lain,
            'ID_Project_JNS' => $row->ID_Project_JNS,
            'ID_Hdr_Project' => $row->ID_Hdr_Project,
            'ID_Project' => $row->ID_Project,
            'Created_by' => $row->Created_by,
            'EntryTime' => $row->EntryTime,
            'Modified_by' => $row->Modified_by,
            'Last_Modified' => $row->Last_Modified,
            'id' =>$id
        );
        $this->load->view('customer/Show_izin', $data);
    }

    function show_uraian($id){
        $row = $this->M_Project_uraian->get_by_id($id);
        $data = array(
            'nm_perusahaan' => $row->nm_perusahaan,
            'modal' => $row->modal,
            'presentase_shm' => $row->presentase_shm,
            'hrg_saham' => $row->hrg_saham,
            'No_Telp' => $row->No_Telp,
            'No_Fax' => $row->No_Fax,
            'alamat' => $row->alamat,
            'kota' => $row->kota,
            'kelurahan' => $row->kelurahan,
            'kabupaten' => $row->kabupaten,
            'izin_persetujuan' => $row->izin_persetujuan,
            'signature_commander' => $row->signature_commander,
            'penerima' => $row->penerima,
            'ID_Project_Uraian' => $row->ID_Project_Uraian,
            'ID_Hdr_Project' => $row->ID_Hdr_Project,
            'ID_Project' => $row->ID_Project,
            'Created_by' => $row->Created_by,
            'EntryTime' => $row->EntryTime,
            'Modified_by' => $row->Modified_by,
            'Last_Modified' => $row->Last_Modified,
            'id' =>$id
        );
        $this->load->view('customer/show_uraian', $data);
    }

    function show_terima($id){
        $row = $this->M_Project_terima->get_by_id($id);
        $data = array(
            'bool_ktp' => $row->bool_ktp,
            'bool_ktp_asli' => $row->bool_ktp_asli,
            'bool_npwp' => $row->bool_npwp,
            'bool_npwp_asli' => $row->bool_npwp_asli,
            'bool_sertifikat' => $row->bool_sertifikat,
            'bool_sertifikat_asli' => $row->bool_sertifikat_asli,
            'bool_imb' => $row->bool_imb,
            'bool_imb_asli' => $row->bool_imb_asli,
            'bool_stempel' => $row->bool_stempel,
            'jml_materai' => $row->jml_materai,
            'bool_sk_domisili' => $row->bool_sk_domisili,
            'bool_sk_domisili_asli' => $row->bool_sk_domisili_asli,
            'bool_surat_sewa' => $row->bool_surat_sewa,
            'bool_surat_sewa_asli' => $row->bool_surat_sewa_asli,
            'ID_Project_terima' => $row->ID_Project_terima,
            'ID_Hdr_Project' => $row->ID_Hdr_Project,
            'ID_Project' => $row->ID_Project,
            'Created_by' => $row->Created_by,
            'EntryTime' => $row->EntryTime,
            'Modified_by' => $row->Modified_by,
            'Last_Modified' => $row->Last_Modified,
            'id' => $id
        );
        $this->load->view('customer/show_terima', $data);
    }

}
