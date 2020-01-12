<?php


class Track extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Project_logs');
        $this->load->model('M_project');
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
        $data = [
            "project_log" => $project_log,
            'pages' => 'customer/list_order',
        ];
        $this->load->view('layout_customer', $data);
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
}
