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
					$files[] = "$entry";
					$exist = $this->db->get_where('log_update',['script_name' => $entry]);
					if($exist->num_rows()){
//						if($method == 'cli'){
//							echo "Script $entry Sudah Ada. \n";
//						}else{
//							echo "Script $entry Sudah Ada. <br>";
//						}
					}else{
//						Untuk testing
//						$this->db->insert('log_update',['script_name' => $entry]);

						if($method == 'cli'){
//							echo "Script $entry Belum Ada. Starting Execute $entry.\n";
							echo "Starting Execute $entry.\n";
						}else{
//							echo "Script $entry belum Ada. Starting Execute $entry.<br>";
							echo "Starting Execute $entry.<br>";
						}

						$file 		= base_url('database/update/').$entry;
						$filename 	= $file;
						// Temporary variable, used to store current query
						$templine = '';
						// Read in entire file
						$lines = file($filename);
						// Loop through each line

                        if($lines){
                            $this->db->trans_begin();
                            foreach ($lines as $line)
                            {
                                // Skip it if it's a comment
                                if (substr($line, 0, 2) == '--' || $line == '')
                                    continue;
                                // Add this line to the current segment
                                $templine .= $line;
                                // If it has a semicolon at the end, it's the end of the query
                                if (substr(trim($line), -1, 1) == ';')
                                {
                                    // Perform the query
                                    if($method == 'cli'){
                                        echo "$templine\n";
                                    }else{
                                        echo "<pre><code>".$templine.'</code></pre><br>';
                                    }
                                    $this->db->query($templine) ; //or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
                                    // Reset temp variable to empty
                                    $templine = '';
                                }
                            }
                            if ($this->db->trans_status() === FALSE)
                            {
                                $this->db->trans_rollback();
                                if($method == 'cli'){
                                    echo "$entry Gagal Dieksekusi.\n";
                                }else{
                                    echo "$entry Gagal Dieksekusi.<br>";
                                }
                            }
                            else
                            {
                                $this->db->trans_commit();
                                if($method == 'cli'){
                                    echo "$entry Berhasil Dieksekusi.\n";
                                }else{
                                    echo "$entry Berhasil Dieksekusi.<br>";
                                }
                            }
                        }else{
                            if($method == 'cli'){
                                echo "$entry Tidak Bisa Dieksekusi.\n";
                            }else{
                                echo "$entry Tidak Bisa Dieksekusi.<br>";
                            }
                        }
					}
				}
			}
			closedir($handle);
		}
		if($method == 'cli'){
			echo "Database Sudah Terupdate.\n";
		}else{
			echo "Database Sudah Terupdate.<br>";

		}
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
