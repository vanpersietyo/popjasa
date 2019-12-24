<?php

use TelegramBot\Api\BotApi;

if (!defined('BASEPATH')) exit('No direct script access allowed');


class Generate extends CI_Controller
{
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

	public function tes(){
	    $this->load->library('PDF_AutoPrint');

        $pdf = new PDF_AutoPrint();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 20);
        $pdf->Text(90, 50, 'Print me!');
        $pdf->AutoPrint();
        $pdf->Output();
	}

	public function tes_telegram(){
		$tes = $this->db->get('teasa');
//        https://api.telegram.org/bot710184082:AAHnSUgubt6_b_fF0dlxOxRxJMVYU5rwEK4/getUpdates
	}

	public function tes_pusher(){
		$this->load->library('Pusher');
		var_dump($this->pusher->initialize());
	}

	public function tes_try($number){
		try {
			$this->checkNum($number);
			//If the exception is thrown, this text will not be shown
			echo 'If you see this, the number is 1 or below';
		}

		//catch exception
		catch(Exception $e) {
			echo 'Message: ' .$e->getMessage().' - '.$e->getCode();
		}
	}

	/**
	 * @param $number
	 * @return bool
	 * @throws Exception
	 */
	private function checkNum($number)
	{
		if($number>1) {
			throw new Exception("Value must be 1 or below",'404');
		}
		return true;
	}

	public function template(){
	    $data = [
	        'link'      => $this->conversion->getController('template_tes',TRUE),
        ];
	    $this->load->view('template/layout',$data);
    }

    public function template_tes(){
        $pages = 'tes/tes';
	    echo $this->load->view($pages,'',true);
	}
    public function template_tes_2(){
        $pages = 'tes/tes2';
	    echo $this->load->view($pages,'',true);
	}

    public function js(){
	    $data = [
	        'pages' => 'tes/js'
        ];
        $this->load->view('template/layout',$data);
    }

    public function get_data($id){
	    $this->load->model('master/M_user');
	    $user = $this->M_user->get_by_id($id);
	    echo json_encode($user);
    }

    public function tes_pdf(){
		$this->load->library('report');
//		$this->report->paper('','tes/tes_pdf','A4','','');
		$var = [
			'page'          => 'tes/tes_pdf',
			'size'          => 'A4',
			'orientation'   => 'portrait',
			'data'          => ''
		];

		$this->load->view('template/paper/full_page',$var);

	}

	public function tes_curl(){
		$url = '';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
		$html = curl_exec($ch);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
}

/* End of file Level.php */
