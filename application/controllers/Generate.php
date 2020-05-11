<?php

use Mpdf\Mpdf;
use Mpdf\MpdfException;

if (!defined('BASEPATH')) exit('No direct script access allowed');


class Generate extends CI_Controller
{
    function __construct(){
        parent::__construct();

        $this->load->model('M_login');
        $this->M_login->isLogin();
        $this->load->model('M_Customer');
        $this->load->model('M_project');
    }

	public function index(){
		$tabel = $this->db->list_tables();
		echo 'Generate Tabel :<br>';
		foreach ($tabel as $i => $item)
		{
			echo '<a href="'.site_url('generate/tabel/').$item.'" target="_blank">';
			echo $item;
			echo '</a>';
			echo '<br>';
		}
	}

    public function tabel($table = null){
    	$this->load->library('conversion');
        $primarykey = $this->conversion->get_primary_key($table);
        $query      = $this->db->list_fields($table);
        echo "//Models<br>";

		foreach ($query as $value){
			echo 'const '.$value.'   =   "'.$value.'";<br>';
		}
		echo 'const TABLE   =   "'.$table.'";<br>';

		echo '<br>';
		echo '//for inisialisasi.<br>';
		foreach ($query as $value){
			echo 'public $'.$value.';<br>';
		}

        echo '<br>var $table        = '."'".$table."';";
        echo '<br>';
        echo 'var $primary_key  = '."'".$primarykey."';";
        echo '<br>';

        echo "<br><br>//Controllers<br>";
        echo "private".'$layout'."     = 'template/layout';";
        echo '<br>';
        echo "private".'$index_path'." = 'master/".strtolower(str_replace("V_","",$table))."/';";
        echo '<br>';
        echo "private".'$path_view'."  = 'pages/master/".strtolower(str_replace("V_","",$table))."/';<br><br>";

        echo '$INPUT = [<br>'."'UPDATE'          =>".'$this->input->post'."('UPDATE'),<br>";
        foreach ($query as $value){
            echo 'M_'.strtolower(str_replace('V_','',$table)).'::T_'.$value.'=>$this->input->post'."(".'M_'.strtolower(str_replace('V_','',$table)).'::T_'.$value."),<br>";
        }
        echo "];";
    }

    public function update_database($method = 'url'){
        if ($handle = opendir('database/update/')) {
            $files = [];
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    $files[] = $entry;
                }
            }
            closedir($handle);
        }
        sort($files);
        foreach ($files as $item) {
            $file 		= base_url('database/update/').$item;
            $exist 		= $this->db->get_where('log_update',['script_name' => $item]);
            if($exist->num_rows()){
                echo $item." Sudah Ada.";
                echo $method === 'url' ? '<br>' : "\n";
            }else{
                echo $method === 'url' ? '<br>' : "\n";
                echo "Starting Execute Script : $item.";
                echo $method === 'url' ? '<br>' : "\n";

                $templine 	= '';
                $lines 		= file($file);
                if ($lines) {
                    foreach ($lines as $line) {
                        if (substr($line, 0, 2) == '--' || $line == '')
                            continue;
                        $templine .= $line;
                        if (substr(trim($line), -1, 1) == ';') {
                            if($method === 'cli'){
                                echo "$templine\n";
                            }else{
                                echo "<pre><code>".$templine.'</code></pre><br>';
                            }
                            $this->db->trans_begin();
                            $this->db->query($templine) ; //or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
                            $templine = '';
                            if ($this->db->trans_status() === FALSE)
                            {
                                $this->db->trans_rollback();
                                echo "$item Gagal Dieksekusi.";
                                echo $method === 'url' ? '<br>' : "\n";
                            }
                            else
                            {
                                $this->db->trans_commit();
                                echo "$item Berhasil Dieksekusi.";
                                echo $method === 'url' ? '<br>' : "\n";
                            }
                        }
                    }
                }
            }
        }
        echo "Database Sudah Terupdate.";
        echo $method === 'url' ? '<br>' : "\n";
    }

    public function tes_pdf(){
        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4-L',
            'orientation' => 'L'
        ]);
        $html = $this->load->view('html_to_pdf', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function tes_pdf_2($id){
        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4-L',
            'orientation' => 'L'
        ]);
        $data['dokumen'] = $this->M_project->get_dokumen($id);
        $html = $this->load->view('html_to_pdf_2', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function labarugi(){
        $tgl_awal=date("Y-m-d", strtotime($this->input->post('TGL_01')));
        $tgl_akhir=date("Y-m-d", strtotime($this->input->post('TGL_02')));
        $TGL01=date("Y-m-d", strtotime($tgl_awal));
        $TGL02=date("Y-m-d", strtotime($tgl_akhir));
        $TGL2=date("d/m/Y", strtotime($tgl_akhir));
        $TGL1=date("d/m/Y", strtotime($tgl_awal));

        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4-L',
            'orientation' => 'L'
        ]);
        $data['periode'] = strtoupper(date("F Y", strtotime($tgl_akhir)));
        $data['sysdate'] = date('d/m/Y H:i');
        $data['operator']=$this->session->userdata('yangLogin');
        $data['cabang']=$this->session->userdata('nm_cabang');
        $html = $this->load->view('report/labarugi_new', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function dok_progress($id){
        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4-L',
            'orientation' => 'L'
        ]);
        $data['dokumen'] = $this->M_project->get_dokumen($id);
        //$this->load->view('report/progress', $data);
       $html = $this->load->view('report/progress',$data,true);
       $mpdf->WriteHTML($html);
       $mpdf->Output();
    }

}

/* End of file Level.php */
