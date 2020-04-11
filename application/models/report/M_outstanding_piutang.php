<?php


class M_outstanding_piutang extends CI_Model
{
    //Models
    const tgl_input = "tgl_input";
    const Periode = "Periode";
    const id_customer = "id_customer";
    const nm_customer = "nm_customer";
    const id_layanan = "id_layanan";
    const nama_layanan = "nama_layanan";
    const jml_order = "jml_order";
    const harga_jual = "harga_jual";
    const jumlah_pay = "jumlah_pay";
    const sisa = "sisa";
    const TABLE = "v_outstanding_doc_finish";

//for inisialisasi.
    public $tgl_input;
    public $Periode;
    public $id_customer;
    public $nm_customer;
    public $id_layanan;
    public $nama_layanan;
    public $jml_order;
    public $harga_jual;
    public $jumlah_pay;
    public $sisa;

    var $table = 'v_outstanding_doc_finish';
    var $table2 = 'v_outstanding_doc_not_finish';
    var $primary_key = 'tgl_input';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * @param int $id
     * @return bool|M_outstanding_piutang
     */
    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where($this->primary_key, $id);
        $query = $this->db->get();
        return $query->num_rows() == 0 ? FALSE : $query->row();
    }

    /**
     * @param null|array|string $where
     * @param array $order
     * @return array|bool|M_outstanding_piutang
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
     * @return array|bool|M_outstanding_piutang
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
     * @return array | M_outstanding_piutang
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
     * @return array | M_outstanding_piutang
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

    function get_rekap($tgl_awal, $tgl_akhir, $status) {
        $cabang=$this->session->userdata('cabang');
        if ($status == 1) {
            $query=$this->db->query("
                SELECT nm_customer,nama_layanan,sum(jml_order) as qty, harga_jual, sum(jumlah_pay) as bayar, sum(sisa) as outstanding
                FROM v_outstanding_doc_finish
                WHERE kd_cabang='$cabang'
                and STR_TO_DATE(tgl_input,'%Y-%m-%d') >= DATE('$tgl_awal')
                and STR_TO_DATE(tgl_input,'%Y-%m-%d') <= DATE('$tgl_akhir')
                GROUP BY nm_customer, nama_layanan
                    ");
        }else {
            $sql = "
                SELECT nm_customer,nama_layanan,sum(jml_order) as qty, harga_jual, sum(jumlah_pay) as bayar, sum(sisa) as outstanding
                FROM v_outstanding_doc_not_finish
                WHERE kd_cabang='$cabang'
                and STR_TO_DATE(tgl_input,'%Y-%m-%d') >= DATE('$tgl_awal')
                and STR_TO_DATE(tgl_input,'%Y-%m-%d') <= DATE('$tgl_akhir')
                GROUP BY nm_customer, nama_layanan
                    ";
            $query=$this->db->query($sql);
        }
        return $query->result();
    }
}