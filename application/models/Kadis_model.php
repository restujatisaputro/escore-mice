<?php
/**************************************************/
/* File    :Kadis_model.php                       */
/* Location: ./application/models/Kadis_model.php */
/**************************************************/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//*************************************
// deklarasi awal membuat kelas
//*************************************
class Kadis_model extends CI_Model
{
   
   // bagian properti
   
    public $table = 'tb_kadisdinkes';
    public $id = 'id_kadis';
    public $order = 'DESC';
    
	// konstrutor
    //****************************   
   function __construct()
    {
        parent::__construct();
    }

    // Tabel data dengan nama kadis	
    function json() {
        $this->datatables->select('id_kadis,nama,nip,alamat,no_handphone,email,photo');
        $this->datatables->from('tb_kadisdinkes');        
        $this->datatables->add_column('action', anchor(site_url('kadis/update/$1'),'<button type="button" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></button>'), 'id_kadis');
		return $this->datatables->generate();
    }
   
   // Menampilkan semua data 
   function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // Menampilkan semua data berdasarkan id-nya
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // menampilkan jumlah data
    function total_rows($q = NULL) {
    $this->db->like('id_kadis', $q);
	$this->db->or_like('id_kadis', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('nip', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('no_handphone', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('photo', $q);	
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

     // Menampilkan data dengan jumlah limit
    function get_limit_data($limit, $start = 0, $q = NULL) {
    $this->db->order_by($this->id, $this->order);
    $this->db->like('id_kadis', $q);
	$this->db->or_like('id_kadis', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('nip', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('no_handphone', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('photo', $q);	
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // Merubah data kedalam database
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }    

}

/* End of file Kadis_model.php */
/* Location: ./application/models/Kadis_model.php */