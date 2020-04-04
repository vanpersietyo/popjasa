<?php


class Setup extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
        $this->M_login->isLogin();
    }

    public function changepassword()
    {
       echo "construct";
       exit();
    }

}
