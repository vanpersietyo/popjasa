<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_trs_pengeluaran extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	function get_datatables()
	{
		$query = $this->db->query("SELECT * FROM trs_rekening_biaya");
		return $query->result();
	}

	function count_filtered()
	{
		  $query = $this->db->query("SELECT * FROM trs_rekening_biaya");
  		return $query->num_rows();
	}

	public function count_all()
	{
    $query = $this->db->query("SELECT * FROM trs_rekening_biaya");
    return $query->num_rows();
	}

  function get_datatables_detail($id)
	{
		$query = $this->db->query("
        SELECT A.*,B.nm_rekbiaya
        FROM trs_detail_rekening_biaya A
        JOIN m_rekening_biaya B ON A.id_rekbiaya=B.id_rekbiaya
        where id_trs_rekbiaya='$id'
        ");
		return $query->result();
	}

	function count_filtered_detail($id)
	{
		$query = $this->db->query("
		SELECT *
        FROM trs_detail_rekening_biaya A
        JOIN m_rekening_biaya B ON A.id_rekbiaya=B.id_rekbiaya
        where id_trs_rekbiaya='$id'
		");
  		return $query->num_rows();
	}

	public function count_all_detail($id)
	{
        $query = $this->db->query("
		SELECT *
        FROM trs_detail_rekening_biaya A
        JOIN m_rekening_biaya B ON A.id_rekbiaya=B.id_rekbiaya
        where id_trs_rekbiaya='$id'
		");
    return $query->num_rows();
	}

	public function get_by_id($id)
	{
		$this->db->from('trs_rekening_biaya');
		$this->db->where('id_trs_rekbiaya',$id);
		$query = $this->db->get();

		return $query->row();
	}

	function get_ID(){
				$tahun=date('y');
				$bulan=date('m');
				$q = $this->db->query("select MAX(RIGHT(id_trs_rekbiaya,3)) as kd_max from trs_rekening_biaya");
				$kd = "";
				if($q->num_rows()>0){
						foreach($q->result() as $k){
								$tmp = ((int)$k->kd_max)+1;
								$kd = sprintf("%03s",$tmp);
						}
				}else{
						$kd = "001";
				}
				return "PGO$tahun$bulan".$kd;
	}

  function get_ID_detail(){
				$tahun=date('y');
				$bulan=date('m');
				$q = $this->db->query("select MAX(RIGHT(id_dtlrekbiaya,3)) as kd_max from trs_detail_rekening_biaya");
				$kd = "";
				if($q->num_rows()>0){
						foreach($q->result() as $k){
								$tmp = ((int)$k->kd_max)+1;
								$kd = sprintf("%03s",$tmp);
						}
				}else{
						$kd = "001";
				}
				return "DPG$tahun$bulan".$kd;
	}

	public function save($data)
	{
		$this->db->insert('trs_rekening_biaya', $data);
		return $this->db->insert_id();
	}

  public function save_detail($data,$id)
	{
    $query=$this->get_by_id($id);
    $update = array(
      'total_pengeluaran' => $query->total_pengeluaran+$data['harga'],
    );
    $where = array('id_trs_rekbiaya' => $data['id_trs_rekbiaya'], );
    $this->db->update('trs_rekening_biaya', $update, $where);
		$this->db->insert('trs_detail_rekening_biaya', $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update('trs_rekening_biaya', $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_trs_rekbiaya', $id);
		$this->db->delete('trs_rekening_biaya');
	}

  public function delete_by_id_detail($id)
	{
    $query_detail=$this->db->query("select sum(harga) as jumlah,id_trs_rekbiaya from trs_detail_rekening_biaya where id_dtlrekbiaya='$id'");
    $data_detail=$query_detail->row();

    $query_header=$this->db->query("select * from trs_rekening_biaya where id_trs_rekbiaya='$data_detail->id_trs_rekbiaya'");
    $data_header=$query_header->row();

    $update = array(
      'total_pengeluaran' => (($data_header->total_pengeluaran)-($data_detail->jumlah)),
    );
    $where = array('id_trs_rekbiaya' => $data_header->id_trs_rekbiaya );

    $this->db->update('trs_rekening_biaya', $update, $where);
		$this->db->where('id_dtlrekbiaya', $id);
		$this->db->delete('trs_detail_rekening_biaya');
	}

  function get_mrekbiaya()
	{
		$query = $this->db->query("SELECT * FROM m_rekening_biaya");
		return $query->result();
	}


}
