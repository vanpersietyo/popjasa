<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *
 *   _________ Codeigniter 3 Autocomplete for PHPStorm ____________
 *
  1) Controllers
  2) Models
  3) Create named properties for your application Models,
  can then access the model methods from the controller.

  WORK IN PROGRESS, this is still rough but does work for CI 3

*/

/**
 *
 *                         * ************** for Controllers *****************
 *============ Codeigniter Core System ================
 * @property CI_Benchmark $benchmark              Benchmarks
 * @property CI_Config $config                    This class contains functions that enable config files
 * @property CI_Controller $controller            This class object is the super class that every library in.
 * @property CI_Exceptions $exceptions            Exceptions Class
 * @property CI_Hooks $hooks                      Provides a mechanism to extend the base system
 * @property CI_Input $input                      Pre-processes global input data for security
 * @property CI_Lang $lang                        Language Class
 * @property CI_Loader $load                      Loads views and files
 * @property CI_Log $log                          Logging Class
 * @property CI_Output $output                    Responsible for sending final output to browser
 * @property CI_Profiler $profiler                Display benchmark results, queries you have run, etc
 * @property CI_Router $router                    Parses URIs and determines routing
 * @property CI_URI $uri                          Retrieve information from URI strings
 * @property CI_Utf8 $utf8                        Provides support for UTF-8 environments
 *
 *
 * @property CI_Model $model                      Codeigniter Model Class
 *
 * @property CI_Driver $driver                    Codeigniter Drivers
 *
 *
 *============ Codeigniter Libraries ================
 *
 * @property CI_Cache $cache                      Caching
 * @property CI_Calendar $calendar                This class enables the creation of calendars
 * @property CI_Email $email                      Permits email to be sent using Mail, Sendmail, or SMTP.
 * @property CI_Encryption $encryption            The Encryption Library provides two-way data encryption.
 * @property CI_Upload $upload                    File Uploading class
 * @property CI_Form_validation $form_validation  Form Validation class
 * @property CI_Ftp $ftp                          FTP Class
 * @property CI_Image_lib $image_lib              Image Manipulation class
 * @property CI_Migration $migration              Tracks & saves updates to database structure
 * @property CI_Pagination $pagination            Pagination Class
 * @property CI_Parser $parser                    Template parser
 * @property CI_Security $security                Processing input data for security.
 * @property CI_Session $session                  Session Class
 * @property CI_Table $table                      HTML table generation
 * @property CI_Trackback $trackback              Trackback Sending/Receiving Class
 * @property CI_Typography $typography            Typography Class
 * @property CI_Unit_test $unit_test              Simple testing class
 * @property CI_User_agent $agent            Identifies the platform, browser, robot, or mobile
 * @property CI_Xmlrpc $xmlrpc                    XML-RPC request handler class
 * @property CI_Xmlrpcs $xmlrpcs                  XML-RPC server class
 * @property CI_Zip $zip                          Zip Compression Class
 *
 *
 *                          *============ Database Libraries ================
 *
 *
 * @property CI_DB_query_builder $db   Database
 * @property CI_DB_forge $dbforge     Database
 * @property CI_DB_result $result                 Database
 *
 *
 *
 *
 *                            *============ Codeigniter Depracated  Libraries ================
 *
 * @property CI_Javascript $javascript            Javascript (not supported
 * @property CI_Jquery $jquery                    Jquery (not supported)
 * @property CI_Encrypt $encrypt                  Its included but move over to new Encryption Library
 *
 *
 *                            *============ Codeigniter Project Models ================
 *  Models that are in your project. if the model is in a folder, still just use the model name.
 *
 *  load the model with Capital letter $this->load->model('People') ;
 *  $this->People-> will show all the methods in the People model
 *
 * Custom Models
 *
 * //DASHBOARD
 * @property M_dir            				    $M_dir
 * @property M_hrd            				    $M_hrd
 *
 * //Master
 * --TABEL
 * @property M_login            				$M_login
 * @property M_user             				$M_user
 * @property M_Customer         				$M_Customer
 * @property M_layanan                          $M_layanan
 * @property M_harga                            $M_harga
 * @property M_Fix_assets                       $M_Fix_assets
 * @property M_bank                             $M_bank
 * @property M_cabang                           $M_cabang
 * @property M_karyawan                         $M_karyawan
 * @property M_gaji                             $M_gaji
 * @property M_rekeningbiaya                    $M_rekeningbiaya
 *
 * --VIEW
 * @property M_v_m_karyawan                     $M_v_m_karyawan
 *
 * Transaksi

 * Project
 * @property M_project                          $M_project
 * @property M_Project_ket                      $M_Project_ket
 * @property M_Project_izin                     $M_Project_izin
 * @property M_Project_uraian                   $M_Project_uraian
 * @property M_Project_terima                   $M_Project_terima
 * @property M_Project_terima_ktp               $M_project_terima_ktp
 * @property M_Project_logs                     $M_Project_logs
 * @property MProgres_kepuasan                  $MProgres_kepuasan
 * Aset
 * @property M_Trs_asset                        $M_Trs_asset

 * keuangan
 * @property M_bankin                           $M_bankin
 * @property M_bankout                          $M_bankout
 * @property M_trs_pengeluaran                  $M_trs_pengeluaran
 * @property M_trs_detail_rekening_biaya        $M_trs_detail_rekening_biaya
 * @property M_pembayaran_karyawan              $M_pembayaran_karyawan
 * @property M_trs_pembayaran                   $M_trs_pembayaran

 * HRD
 * --TABEL
 * @property M_trans_potongan                   $M_trans_potongan
 * @property M_trs_hrd_piutang_karyawan         $M_trs_hrd_piutang_karyawan
 * @property M_trs_hrd_bonus_karyawan           $M_trs_hrd_bonus_karyawan
 * @property M_trs_hrd_gaji                     $M_trs_hrd_gaji
 * @property M_trs_hrd_cuti                     $M_trs_hrd_cuti
 * @property M_trs_hrd_potongan_karyawan        $M_trs_hrd_potongan_karyawan
 * @property M_trs_hrd_tunjangan_karyawan       $M_trs_hrd_tunjangan_karyawan
 *
 * --VIEW
 * @property M_v_trs_hrd_potongan_karyawan      $M_v_trs_hrd_potongan_karyawan
 * @property M_v_trs_hrd_gaji                   $M_v_trs_hrd_gaji
 * @property M_v_trs_hrd_bonus_karyawan         $M_v_trs_hrd_bonus_karyawan
 * @property M_v_trs_hrd_tunjangan_karyawan     $M_v_trs_hrd_tunjangan_karyawan
 * @property M_v_trs_hrd_piutang_karyawan       $M_v_trs_hrd_piutang_karyawan
 * @property M_v_trs_hrd_pembayaran_karyawan    $M_v_trs_hrd_pembayaran_karyawan
 * @property M_v_trs_rekening_biaya             $M_v_trs_rekening_biaya
 * @property M_v_trs_detail_rekening_biaya      $M_v_trs_detail_rekening_biaya
 *
 *
 *  * Report
 * @property M_v_rekapitulasi_cashflow          $M_v_rekapitulasi_cashflow
 * @property M_v_rekapitulasi_cashflow_per_day  $M_v_rekapitulasi_cashflow_per_day
 * @property M_labarugi                         $M_labarugi
 * @property M_v_paybycustomers                 $M_v_paybycustomers
 * @property M_v_pengeluaran                    $M_v_pengeluaran
 * @property M_outstanding_piutang              $M_outstanding_piutang
 *
 *
 * Custom  Libraries
 * @property Unirest $unirest
 * @property Conversion $conversion
 *
 */
class CI_Controller
{
    public function __construct()
    {

    }
};

/*
 *
 *   _________ Codeigniter 3 Autocomplete for PHPStorm ____________
 *
  1) Controllers
  2) Models
  3) Create named properties for your application Models,
  can then access the model methods from the controller.

  WORK IN PROGRESS, this is still rough but does work for CI 3

*/

/**
 *
 *                         * ************** for Controllers *****************
 *============ Codeigniter Core System ================
 * @property CI_Benchmark $benchmark              Benchmarks
 * @property CI_Config $config                    This class contains functions that enable config files
 * @property CI_Controller $controller            This class object is the super class that every library in.
 * @property CI_Exceptions $exceptions            Exceptions Class
 * @property CI_Hooks $hooks                      Provides a mechanism to extend the base system
 * @property CI_Input $input                      Pre-processes global input data for security
 * @property CI_Lang $lang                        Language Class
 * @property CI_Loader $load                      Loads views and files
 * @property CI_Log $log                          Logging Class
 * @property CI_Output $output                    Responsible for sending final output to browser
 * @property CI_Profiler $profiler                Display benchmark results, queries you have run, etc
 * @property CI_Router $router                    Parses URIs and determines routing
 * @property CI_URI $uri                          Retrieve information from URI strings
 * @property CI_Utf8 $utf8                        Provides support for UTF-8 environments
 *
 *
 * @property CI_Model $model                      Codeigniter Model Class
 *
 * @property CI_Driver $driver                    Codeigniter Drivers
 *
 *
 *============ Codeigniter Libraries ================
 *
 * @property CI_Cache $cache                      Caching
 * @property CI_Calendar $calendar                This class enables the creation of calendars
 * @property CI_Email $email                      Permits email to be sent using Mail, Sendmail, or SMTP.
 * @property CI_Encryption $encryption            The Encryption Library provides two-way data encryption.
 * @property CI_Upload $upload                    File Uploading class
 * @property CI_Form_validation $form_validation  Form Validation class
 * @property CI_Ftp $ftp                          FTP Class
 * @property CI_Image_lib $image_lib              Image Manipulation class
 * @property CI_Migration $migration              Tracks & saves updates to database structure
 * @property CI_Pagination $pagination            Pagination Class
 * @property CI_Parser $parser                    Template parser
 * @property CI_Security $security                Processing input data for security.
 * @property CI_Session $session                  Session Class
 * @property CI_Table $table                      HTML table generation
 * @property CI_Trackback $trackback              Trackback Sending/Receiving Class
 * @property CI_Typography $typography            Typography Class
 * @property CI_Unit_test $unit_test              Simple testing class
 * @property CI_User_agent $agent            Identifies the platform, browser, robot, or mobile
 * @property CI_Xmlrpc $xmlrpc                    XML-RPC request handler class
 * @property CI_Xmlrpcs $xmlrpcs                  XML-RPC server class
 * @property CI_Zip $zip                          Zip Compression Class
 *
 *
 *                          *============ Database Libraries ================
 *
 *
 * @property CI_DB_query_builder $db   Database
 * @property CI_DB_forge $dbforge     Database
 * @property CI_DB_result $result                 Database
 *
 *
 *
 *
 *                            *============ Codeigniter Depracated  Libraries ================
 *
 * @property CI_Javascript $javascript            Javascript (not supported
 * @property CI_Jquery $jquery                    Jquery (not supported)
 * @property CI_Encrypt $encrypt                  Its included but move over to new Encryption Library
 *
 *
 *                            *============ Codeigniter Project Models ================
 *  Models that are in your project. if the model is in a folder, still just use the model name.
 *
 *  load the model with Capital letter $this->load->model('People') ;
 *  $this->People-> will show all the methods in the People model
 *
 * Custom Models
 *
 * //Master
 * @property M_login            				$M_login
 * @property M_user             				$M_user
 * @property M_customer         				$M_customer
 * @property M_Project_terima_ktp               $M_project_terima_ktp

 *

 * Transaksi
 *

 * Custom  Libraries
 * @property Unirest        	$unirest
 * @property Conversion         $conversion
 *
 */
class CI_Model
{
    public function __construct()
    {
    }
};

/* End of file autocomplete.php */
/* Location: ./application/config/autocomplete.php */
