<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_project extends CI_Model {

    //Models
    const id_project = "id_project";
    const id_hdr_project = "id_hdr_project";
    const kd_cabang = "kd_cabang";
    const id_customer = "id_customer";
    const id_layanan = "id_layanan";
    const harga_jual = "harga_jual";
    const keterangan = "keterangan";
    const input_by = "input_by";
    const tgl_input = "tgl_input";
    const st_data = "st_data";
    const nm_project = "nm_project";
    const TABLE = "trs_project";

//for inisialisasi.
    public $id_project;
    public $id_hdr_project;
    public $kd_cabang;
    public $id_customer;
    public $id_layanan;
    public $harga_jual;
    public $keterangan;
    public $input_by;
    public $tgl_input;
    public $st_data;
    public $nm_project;

    var $table = 'trs_project';
    var $primary_key = 'id_project';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_user($id){
		$query=$this->db->query("
      SELECT a.id_project,a.id_layanan,c.nama_layanan,d.harga,a.id_customer,b.nm_customer,a.harga_jual,a.keterangan,a.input_by,a.tgl_input,a.st_data
      FROM trs_project a,m_customer b, m_layanan c, m_harga_layanan d
      WHERE a.id_customer=b.id_customer AND a.id_layanan=c.id_layanan AND a.id_layanan=d.id_layanan AND a.id_hdr_project='$id'
      ORDER BY a.tgl_input asc
			");
		return $query->result();
	}

	public function get_trs_project_hdr(){
		$query=$this->db->query("
				select a.id_hdr_project,a.nm_project,a.kd_cabang,a.id_customer,b.nm_customer,a.jml_penjualan,a.keterangan,a.input_by,a.tgl_input,a.st_data
				from trs_project_hdr a
				JOIN m_customer b ON a.id_customer=b.id_customer
				  ORDER BY a.tgl_input asc
			");
		return $query->result();
	}

	public function get_trs_project_hdr_confirmed(){
		$query=$this->db->query("
				select a.id_hdr_project,a.kd_cabang,a.id_customer,b.nm_customer,a.jml_penjualan,a.keterangan,a.input_by,a.tgl_input,a.st_data
				from trs_project_hdr a
				JOIN m_customer b ON a.id_customer=b.id_customer and a.st_data=1
				  ORDER BY a.tgl_input desc
			");
		return $query->result();
	}

	public function get_trs_project_hdr_id($id){
		$query=$this->db->query("
			SELECT * from trs_project_hdr where id_hdr_project='$id'
			");
		return $query->row();
	}

	public function count_trs_project_hdr(){
		$query=$this->db->query("
			SELECT * from trs_project_hdr
			");
		return $query->num_rows();
	}

	public function get_projectid($id){
		$query=$this->db->query("
    SELECT a.id_project,a.id_layanan,c.nama_layanan,d.harga,a.id_customer,b.nm_customer,a.harga_jual,a.keterangan,a.input_by,a.tgl_input,a.st_data
    FROM trs_project a
    JOIN m_customer b ON a.id_customer=b.id_customer
    JOIN m_layanan c ON a.id_layanan=c.id_layanan
    LEFT JOIN m_harga_layanan d ON a.id_layanan=d.id_layanan
    WHERE a.id_project='$id'
			");
		return $query->row();
	}

  function get_produk(){
    $query=$this->db->query("
		SELECT a.nama_layanan,a.id_layanan,b.id_hrg_layanan,b.harga
			FROM m_layanan a, m_harga_layanan b
			where a.id_layanan=b.id_layanan
			");
		return $query->result();
  }

	function count_produk()
	{
    $query=$this->db->query("
	 	SELECT a.nama_layanan,a.id_layanan,b.id_hrg_layanan,b.harga
			FROM m_layanan a, m_harga_layanan b
			where a.id_layanan=b.id_layanan
      ");
		return $query->num_rows();
	}

	function get_ID(){
		$tahun=date('Y');
		$bulan=date('m');
		$q = $this->db->query("select MAX(RIGHT(id_project,5)) as kd_max from trs_project");
		$kd = "";
		if($q->num_rows()>0){
				foreach($q->result() as $k){
						$tmp = ((int)$k->kd_max)+1;
						$kd = sprintf("%05s",$tmp);
				}
		}else{
				$kd = "00001";
		}
		return "PRO$tahun$bulan".$kd;
	}

	function get_ID_hdr(){
		$tahun=date('Y');
		$bulan=date('m');
		$q = $this->db->query("select MAX(RIGHT(id_hdr_project,5)) as kd_max from trs_project_hdr");
		$kd = "";
		if($q->num_rows()>0){
				foreach($q->result() as $k){
						$tmp = ((int)$k->kd_max)+1;
						$kd = sprintf("%05s",$tmp);
				}
		}else{
				$kd = "00001";
		}
		return "POP$tahun$bulan".$kd;
	}


	function count_filtered()
	{
    $query=$this->db->query("
      SELECT a.id_project,a.id_layanan,c.nama_layanan,d.harga,a.id_customer,b.nm_customer,a.harga_jual,a.keterangan,a.input_by,a.tgl_input
      FROM trs_project a,m_customer b, m_layanan c, m_harga_layanan d
      WHERE a.id_customer=b.id_customer AND a.id_layanan=c.id_layanan AND a.id_layanan=d.id_layanan
      ");
		return $query->num_rows();
	}

	public function count_all()
	{
    $query=$this->db->query("
      SELECT a.id_project,a.id_layanan,c.nama_layanan,d.harga,a.id_customer,b.nm_customer,a.harga_jual,a.keterangan,a.input_by,a.tgl_input
      FROM trs_project a,m_customer b, m_layanan c, m_harga_layanan d
      WHERE a.id_customer=b.id_customer AND a.id_layanan=c.id_layanan AND a.id_layanan=d.id_layanan
      ");
		return $query->num_rows();
	}

	function count_filtered_project($id)
	{
    $query=$this->db->query("
      SELECT a.id_project,a.id_layanan,c.nama_layanan,d.harga,a.id_customer,b.nm_customer,a.harga_jual,a.keterangan,a.input_by,a.tgl_input
      FROM trs_project a,m_customer b, m_layanan c, m_harga_layanan d
      WHERE a.id_customer=b.id_customer AND a.id_layanan=c.id_layanan AND a.id_layanan=d.id_layanan AND a.id_customer='$id'
      ");
		return $query->num_rows();
	}

	public function count_all_project($id)
	{
    $query=$this->db->query("
      SELECT a.id_project,a.id_layanan,c.nama_layanan,d.harga,a.id_customer,b.nm_customer,a.harga_jual,a.keterangan,a.input_by,a.tgl_input
      FROM trs_project a,m_customer b, m_layanan c, m_harga_layanan d
      WHERE a.id_customer=b.id_customer AND a.id_layanan=c.id_layanan AND a.id_layanan=d.id_layanan AND a.id_customer='$id'
      ");
		return $query->num_rows();
	}

	public function get_by_id($id)
	{
		$this->db->from('trs_project');
		$this->db->where('id_project',$id);
		$query = $this->db->get();

		return $query->row();
	}

	// public function get_trs_project_hdr_id($id)
	// {
	// 	$this->db->from('trs_project');
	// 	$this->db->where('id_customer',$id);
	// 	$query = $this->db->get();
	//
	// 	return $query->row();
	// }

	public function get_jml_penjualan($id)
	{
		$query = $this->db->query("select SUM(harga_jual) as jml_penjualan from trs_project where id_hdr_project='$id'");
		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert('trs_project', $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update('trs_project', $data, $where);
		return $this->db->affected_rows();
	}

	public function simpan_transaksi($where, $hdr, $detail)	{
		// $this->db->insert('trs_project_hdr', $input);
		$this->db->update('trs_project_hdr', $hdr, $where);
		$this->db->update('trs_project', $detail, $where);
		return $this->db->affected_rows();
	}

	public function input_header($data)
	{
		$this->db->insert('trs_project_hdr', $data);
		return $this->db->insert_id();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_project', $id);
		$this->db->delete('trs_project');
	}

	public function delete_project_by_id($id)
	{
		$this->db->where('id_hdr_project', $id);
		$this->db->delete('trs_project');

		$this->db->where('id_hdr_project', $id);
		$this->db->delete('trs_project_hdr');
	}

	//report

	public function get_project_hdr($id){
		$query=$this->db->query("
		select a.id_hdr_project,a.kd_cabang,a.id_customer,b.nm_customer,a.jml_penjualan,a.keterangan,a.input_by,a.tgl_input,a.st_data
		from trs_project_hdr a
		JOIN m_customer b ON a.id_customer=b.id_customer
		where a.id_hdr_project='$id' and a.st_data='1'
			");
		return $query->row();
	}

	public function get_project_dtl($id){
		$query=$this->db->query("
		select a.id_hdr_project,a.kd_cabang,a.id_customer,b.nm_customer,a.jml_penjualan,a.keterangan,a.input_by,a.tgl_input,a.st_data,c.id_layanan,d.nama_layanan,c.harga_jual
		from trs_project_hdr a
		JOIN m_customer b ON a.id_customer=b.id_customer
		JOIN trs_project c ON a.id_hdr_project=c.id_hdr_project
		JOIN m_layanan d ON c.id_layanan=d.id_layanan
		where a.id_hdr_project='$id' and a.st_data='1'
			");
		return $query->result();
	}



    /**
     * @param null|array|string $where
     * @param array $order
     * @return array|bool|M_project
     */
    public function find_first($where = null, $order = [])
    {
        //cek order
        if ($order) {
            foreach ($order as $key => $value) {
                $this->db->order_by($key, $value);
            }
        }
        //cek where
        $data = $where ? $this->db->get_where($this->table, $where) : $this->db->get($this->table);
        $result = $data->num_rows();
        return empty($result) ? FALSE : $data->row();
    }

    /**
     * @param null|array|string $where
     * @param array $order
     * @return array|bool|M_project
     */
    public function find($where = null, $order = [])
    {
        //cek order
        if ($order) {
            foreach ($order as $key => $value) {
                $this->db->order_by($key, $value);
            }
        }
        //cek where
        $data = $where ? $this->db->get_where($this->table, $where) : $this->db->get($this->table);

        $result = $data->num_rows();
        //return
        return empty($result) ? FALSE : $data->result();
    }

    public function get_trs_project()
    {
        $query = $this->db->query("
				select a.id_project,a.id_hdr_project,a.nm_project,a.kd_cabang,a.id_customer,b.nm_customer,a.harga_jual,a.keterangan,a.input_by,a.tgl_input,a.st_data,a.st_project
				from trs_project a
				JOIN m_customer b ON a.id_customer=b.id_customer
				ORDER BY a.tgl_input DESC
			");
        return $query->result();
    }

    public function get_trs_project_by_project($id)
    {
        $query = $this->db->query("
			SELECT * from trs_project where id_project='$id'
			");
        return $query->row();
    }

    public function get_trs_project_confirmed()
    {
        $query = $this->db->query("
				select a.id_project,a.kd_cabang,a.id_customer,b.nm_customer,a.harga_jual,a.keterangan,a.input_by,a.tgl_input,a.st_data,a.st_project
				from trs_project a
				JOIN m_customer b ON a.id_customer=b.id_customer and a.st_data=1 ORDER BY a.tgl_input desc
			");
        return $query->result();
    }

    public function get_user_project($id)
    {
        $query = $this->db->query("
        SELECT a.id_project,a.id_layanan,c.nama_layanan,d.harga,a.id_customer,b.nm_customer,a.harga_jual,a.keterangan,a.input_by,a.tgl_input,a.st_data,c.keterangan
          FROM trs_project a
          JOIN m_customer b ON a.id_customer=b.id_customer
          JOIN m_layanan c ON a.id_layanan=c.id_layanan
          LEFT JOIN m_harga_layanan d ON a.id_layanan=d.id_layanan
          WHERE a.id_project='$id'
			");
        return $query->result();
    }

    function get_dokumen($id){
        $query = $this->db->query("
               SELECT nm_customer, kota_customer, Ket_Email, Email_Pengurus, kt_notelp, Ket_Luas, Ket_Bidang_Usaha,
                      Ket_Bidang_Usaha_Utama, Ket_Informasi, ID_Project_Ket, Pass_Email, Info_Asset, Info_Tanah, Info_Usaha_Utama,
                      kt_keterangan, Bool_Izin_Akta_Notaris, Izin_Akta_Notaris, Bool_Izin_Pengesahan, Izin_Pengesahan,
                      iz_npwp, Bool_NPWP_Perusahaan, Bool_SKT_Perusahaan, Bool_SIUP_TDP, Bool_Registrasi, Bool_PKP,
                      iz_sk_domisili, Izin_Lain, ID_Project_JNS, iz_keterangan, nm_perusahaan, modal, presentase_shm, hrg_saham,
                      ur_notelp, No_Fax, alamat, kota, kelurahan, kabupaten, izin_persetujuan, signature_commander, penerima,
                      ID_Project_Uraian, modal_disetor, ur_keterangan, kecamatan, bool_ktp, trm_npwp, bool_sertifikat, bool_imb,
                      bool_stempel, jml_materai,trm_sk_domisili, bool_surat_sewa, ID_Project_terima, jml_ktp, trm_keterangan,
                      id_project, id_hdr_project, kd_cabang, id_customer, id_layanan, harga_jual, tp_keterangan, input_by,
                      tgl_input, st_project, st_data, nm_project, st_minuta, st_akte, st_domisili, st_npwp, st_pn, st_siup,
                      st_pkp
                FROM v_cetak_blanko_project blk 
                WHERE blk.`id_project`='$id'
			");
        return $query->row();

    }

}
