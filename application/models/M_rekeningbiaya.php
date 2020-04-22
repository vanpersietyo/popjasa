<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_rekeningbiaya extends CI_Model
{
    //Models
    const id_rekbiaya = "id_rekbiaya";
    const id_jns_rekbiaya = "id_jns_rekbiaya";
    const nm_rekbiaya = "nm_rekbiaya";
    const keterangan = "keterangan";
    const tgl_input = "tgl_input";
    const inputby = "inputby";
    const lastmodify = "lastmodify";
    const TABLE = "m_rekening_biaya";

//for inisialisasi.
    public $id_rekbiaya;
    public $id_jns_rekbiaya;
    public $nm_rekbiaya;
    public $keterangan;
    public $tgl_input;
    public $inputby;
    public $lastmodify;

    var $table = 'm_rekening_biaya';
    var $primary_key = 'id_rekbiaya';

    var $column_order = array(null, 'id_rekbiaya', 'id_jns_rekbiaya', 'nm_rekbiaya', 'keterangan', 'tgl_input', null); //set column field database for datatable orderable
    var $column_search = array('id_rekbiaya', 'id_jns_rekbiaya', 'nm_rekbiaya', 'keterangan', 'tgl_input'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('tgl_input' => 'desc'); // default order

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
            if ($_POST['search']['value']) // if datatable send POST for search
            {
                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
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

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_rekbiaya', $id);
        $query = $this->db->get();

        return $query->row();
    }

    function get_ID()
    {
        $tahun = date('y');
        $bulan = date('m');
        $q = $this->db->query("select MAX(RIGHT(id_rekbiaya,3)) as kd_max from m_rekening_biaya");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }
        return "RB" . $kd;
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function update_where($where, $data)
    {
        $this->db->update($this->table, $data, $where);
    }

    public function delete_by_id($id)
    {
        $this->db->where('id_rekbiaya', $id);
        $this->db->delete($this->table);
    }

    function select_jenis_rekening_biaya()
    {
        $query = $this->db->query("select * from m_jenis_rekening_biaya");
        return $query->result();
    }

    /**
     * @param array $data
     * @return array|CI_DB|M_rekeningbiaya
     */
    public function select($data = [])
    {
        if (empty($data)) {
            $data = $this->db->get($this->table);
        } else {
            if (isset($data['column'])) {
                $this->db->select($data['column']);
            }

            if (isset($data['group'])) {
                $this->db->group_by($data['group']);  // Produces: GROUP BY title, date
            }

            if (isset($data['join'])) {
                $i = 0;
                foreach ($data['join'] as $key => $value) {
                    if (isset($data['type_join'])) {
                        $type = $data['type_join'][$i];
                        if($type){
                            $this->db->join($key, $value,$type);
                        }else{
                            $this->db->join($key, $value);
                        }
                    }else{
                        $this->db->join($key, $value);
                    }
                    $i = $i + 1;
                }
            }

            if (isset($data['order'])) {
                foreach ($data['order'] as $key => $value) {
                    $this->db->order_by($key, $value);
                }
            }

            if (isset($data['limit'])) {
                $this->db->limit($data['limit']);
            }
            $data = isset($data['where']) ? $this->db->get_where($this->table . " a", $data['where']) : $this->db->get($this->table . " a");
        }
        return $data->result();
    }

    /**
     * @param array $data
     * @return array | M_rekeningbiaya
     */
    public function select_first($data = []){
        if(empty($data)){
            $data = $this->db->get($this->table);
        }else{
            if(isset($data['column'])){
                $this->db->select($data['column']);
            }

            if(isset($data['order'])){
                foreach ($data['order'] as $key => $value) {
                    $this->db->order_by($key,$value);
                }
            }
            $this->db->limit(1);
            $data = $data['where'] ? $this->db->get_where($this->table, $data['where']) : $this->db->get($this->table);
        }
        return $data->row();
    }

    /**
     * @param null|array|string $where
     * @param array $order
     * @return array|bool|M_rekeningbiaya
     */
    public function find_first($where = null, $order = []){
        //cek order
        if($order){
            foreach ($order as $key => $value) {
                $this->db->order_by($key,$value);
            }
        }
        //cek where
        $data = $where ? $this->db->get_where($this->table, $where) : $this->db->get($this->table);
        return $data->row();
    }

    /**
     * @param null|array|string $where
     * @param array $order
     * @return array|bool|M_rekeningbiaya
     */
    public function find($where = null, $order = [],$limit = null){
        //cek order
        if($order){
            foreach ($order as $key => $value) {
                $this->db->order_by($key,$value);
            }
        }

        if(!empty($limit)){
            $this->db->limit($limit);
        }

        //cek where
        $data = $where ? $this->db->get_where($this->table, $where) : $this->db->get($this->table);
        return $data->result();
    }

    /**
     * @param null $where
     * @param array $order
     * @return int
     */
    public function count($where = null){
        //cek where
        $data = $where ? $this->db->get_where($this->table, $where) : $this->db->get($this->table);
        //return
        return $data->num_rows();
    }

    /**
     * @param null 	$column
     * @param null 	$where
     * @return int
     */
    public function sum($column = null,$where = null){
        //cek where
        $this->db->select_sum($column,'total');
        $data = $where ? $this->db->get_where($this->table, $where) : $this->db->get($this->table);
        //return
        return $data->row()->total;
    }

}
