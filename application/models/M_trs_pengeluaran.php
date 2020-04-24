<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_trs_pengeluaran extends CI_Model
{
//Models
    const id_trs_rekbiaya = "id_trs_rekbiaya";
    const kd_cabang = "kd_cabang";
    const keterangan = "keterangan";
    const periode = "periode";
    const tgl_input = "tgl_input";
    const inputby = "inputby";
    const total_pengeluaran = "total_pengeluaran";
    const tahun = "tahun";
    const bulan = "bulan";
    const TABLE = "trs_rekening_biaya";

//for inisialisasi.
    public $id_trs_rekbiaya;
    public $kd_cabang;
    public $keterangan;
    public $periode;
    public $tgl_input;
    public $inputby;
    public $tahun;
    public $bulan;
    public $total_pengeluaran;

    var $table = 'trs_rekening_biaya';
    var $primary_key = 'id_trs_rekbiaya';

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
        SELECT A.*,B.nm_rekbiaya,c.nm_bank
        FROM trs_detail_rekening_biaya A
        JOIN m_rekening_biaya B ON A.id_rekbiaya=B.id_rekbiaya
				JOIN bank c ON A.kd_bank=c.kd_bank
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

    /**
     * @param $id
     * @return array|bool|M_trs_pengeluaran
     */
    public function get_by_id($id)
    {
        $this->db->from('trs_rekening_biaya');
        $this->db->where('id_trs_rekbiaya', $id);
        $query = $this->db->get();

        return $query->row();
    }

    function get_ID()
    {
        $tahun = date('y');
        $bulan = date('m');
        $q = $this->db->query("select MAX(RIGHT(id_trs_rekbiaya,3)) as kd_max from trs_rekening_biaya");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }
        return "PGO$tahun$bulan" . $kd;
    }

    function get_ID_detail()
    {
        $tahun = date('y');
        $bulan = date('m');
        $q = $this->db->query("select MAX(RIGHT(id_dtlrekbiaya,3)) as kd_max from trs_detail_rekening_biaya");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }
        return "DPG$tahun$bulan" . $kd;
    }

    public function save($data)
    {
        $this->db->insert('trs_rekening_biaya', $data);
        return $this->db->insert_id();
    }

    public function save_detail($data, $id)
    {
        $query = $this->get_by_id($id);
        $update = array(
            'total_pengeluaran' => $query->total_pengeluaran + $data['harga'],
        );
        $where = array('id_trs_rekbiaya' => $data['id_trs_rekbiaya'],);
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
        $query_detail = $this->db->query("select sum(harga) as jumlah,id_trs_rekbiaya from trs_detail_rekening_biaya where id_dtlrekbiaya='$id'");
        $data_detail = $query_detail->row();

        $query_header = $this->db->query("select * from trs_rekening_biaya where id_trs_rekbiaya='$data_detail->id_trs_rekbiaya'");
        $data_header = $query_header->row();

        $update = array(
            'total_pengeluaran' => (($data_header->total_pengeluaran) - ($data_detail->jumlah)),
        );
        $where = array('id_trs_rekbiaya' => $data_header->id_trs_rekbiaya);

        $this->db->update('trs_rekening_biaya', $update, $where);
        $this->db->where('id_dtlrekbiaya', $id);
        $this->db->delete('trs_detail_rekening_biaya');
    }

    function get_mrekbiaya()
    {
        $query = $this->db->query("SELECT * FROM m_rekening_biaya");
        return $query->result();
    }

    /**
     * @param null|array|string $where
     * @param array $order
     * @return array|bool|M_trs_pengeluaran
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
     * @return array|bool|M_trs_pengeluaran
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

    /**
     * @param null $where
     * @param array $order
     * @return int
     */
    public function count($where = null)
    {
        //cek where
        $data = $where ? $this->db->get_where($this->table, $where) : $this->db->get($this->table);
        //return
        return $data->num_rows();
    }

    /**
     * @param null $column
     * @param null $where
     * @return int
     */
    public function sum($column = null, $where = null)
    {
        //cek where
        $this->db->select_sum($column, 'total');
        $data = $where ? $this->db->get_where($this->table, $where) : $this->db->get($this->table);
        //return
        return $data->row()->total ?: 0;
    }

    /**
     * @param array $data
     * @return array | M_trs_pengeluaran
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
                foreach ($data['join'] as $key => $value) {
                    $this->db->join($key, $value);
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
     * @return array | M_trs_pengeluaran
     */
    public function select_first($data = [])
    {
        if (empty($data)) {
            $data = $this->db->get($this->table);
        } else {
            if (isset($data['column'])) {
                $this->db->select($data['column']);
            }

            if (isset($data['order'])) {
                foreach ($data['order'] as $key => $value) {
                    $this->db->order_by($key, $value);
                }
            }
            $this->db->limit(1);
            $data = $data['where'] ? $this->db->get_where($this->table, $data['where']) : $this->db->get($this->table);
        }
        return $data->row();
    }

}
