<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_receiving_input extends CI_Model {

	var $table = 'v_item_inv2';
	var $column_order = array('categoryname','itemname',null); //set column field database for datatable orderable
	var $column_search = array('categoryname','itemname'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('categoryname' => 'desc'); // default order

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{

		$this->db->from($this->table);

		$i = 0;

		foreach ($this->column_search as $item) // loop column
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{

				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	function get_detail($id){
		$query=$this->db->query("select * from receivingdtl where id='$id'");
		return $query->result();
	}

	function get_produk($id){
		$query=$this->db->query("select * from v_item_inv2 where itemid='$id'");
		return $query->result();
	}

	function count_filtered_detail($id)
	{
		$query=$this->db->query("select count(id) from receivingdtl where id='$id'");
		return $query->num_rows();
	}

	public function count_all_detail($id)
	{
		$query=$this->db->query("select * from receivingdtl where id='$id'");
		return $query->num_rows();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('itemid',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function save_detail($data)
	{
		$this->db->insert('receivingdtl', $data);
		return $this->db->insert_id();
	}

	public function save_header($data)
	{
		// var_dump('/kasir/kasir/detail/'.$data['id']);
		// exit();
		$this->db->insert('receivinghdr', $data);
		redirect('/inventory/receiving/input/detail/'.$data['id']);
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('itemid', $id);
		$this->db->delete($this->table);
	}

  function select_trtype(){
    $query=$this->db->query("select * from mtrtype");
    return $query->result();
  }

  function select_kategori(){
    $query=$this->db->query("select * from mitemcategory");
    return $query->result();
  }

	function select_header($id){
		$query=$this->db->query("select * from receivinghdr where id='$id'");
		return $query->row();
	}

  function select_ukuran(){
    $query=$this->db->query("select * from mukuran");
    return $query->result();
  }

  function select_location(){
    $query=$this->db->query("select * from mlocation_inv");
    return $query->result();
  }

	function select_bank(){
    $query=$this->db->query("select * from mbank");
    return $query->result();
  }

	function select_voucher(){
    $query=$this->db->query("select * from mvoucher");
    return $query->result();
  }

	function get_tagihan($id){
    $query=$this->db->query("select sum(amount*qty) as tagihan from transdtl where id='$id'");
    return $query->row();
  }

	function get_type_pay($bankid){
    $query=$this->db->query("select bank from mbank where bankid='$bankid'");
    return $query->row();
  }

	function get_exp_voucher($id){
    $query=$this->db->query("select expireddate from mvoucher where voucherid='$id'");
    return $query->row();
  }

	public function delete_detail($id)
	{
		$this->db->where('id_detail', $id);
		$this->db->delete('receivingdtl');
	}

}
