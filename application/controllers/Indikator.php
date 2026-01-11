<?php
/**********************************************************/
/* File        : Indikator.php                            */
/* Lokasi File : ./application/controllers/Indikator.php  */
/* Copyright   : CV Adiva                                 */
/* Publish     : Automated Checlist                       */
/*--------------------------------------------------------*/
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Indikator
class Indikator extends CI_Controller
{
	// Konstrutor 
    function __construct()
    {
        parent::__construct();
        $this->load->model('Indikator_model'); // Memanggil Indikator_model yang terdapat pada models
		$this->load->model('Users_model'); // Memanggil Users_model yang terdapat pada models
        $this->load->library('form_validation'); // Memanggil form_validation yang terdapat pada library        
		$this->load->library('datatables'); // Memanggil datatables yang terdapat pada library
    }
	
	// Fungsi untuk menampilkan halaman utama indikator
    public function index()
    {
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
		
		// Menampilkan data berdasarkan id-nya yaitu username
		$row = $this->Users_model->get_by_id($this->session->userdata['username']);
		$data = array(	
			'wa'       => 'Green',
			'univ'     => 'Automated Checklist',
			'username' => $row->username,
			'email'    => $row->email,
			'level'    => $row->level,
		);		
		$this->load->view('header_list',$data); // Menampilkan bagian header dan object data users 
        $this->load->view('indikator/indikator_list'); // Menampilkan halaman utama indikator
		$this->load->view('footer_list'); // Menampilkan bagian footer		 
    } 
    
	// Fungsi JSON
    public function json() {
        header('Content-Type: application/json');
        echo $this->Indikator_model->json(); // Menampilkan data json yang terdapat pada Indikator_model
    }
	
	// Fungsi menampilkan form Create Indikator
    public function create() 
    {
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
		// Menampilkan data berdasarkan id-nya yaitu username
		$row = $this->Users_model->get_by_id($this->session->userdata['username']);
		$dataAdm = array(	
			'wa'       => 'Green',
			'univ'     => 'Automated Checklist',
			'username' => $row->username,
			'email'    => $row->email,
			'level'    => $row->level,
		);	
		
		// Menampung data yang diinputkan 
        $data = array(
            'button' => 'Create',
			'back'   => site_url('indikator'),
            'action' => site_url('indikator/create_action'),
			'id_indikator' => set_value('id_indikator'),
			'no_indikator' => set_value('no_indikator'),
			'indikator' => set_value('indikator'),
			'kelompok' => set_value('kelompok'),
			'inputer' => set_value('inputer'),
		);
		$this->load->view('header', $dataAdm); // Menampilkan bagian header dan object data users 
        $this->load->view('indikator/indikator_form', $data); // Menampilkan form indikator
		$this->load->view('footer'); // Menampilkan bagian footer
    }
    
	// Fungsi untuk melakukan aksi simpan data
    public function create_action() 
    {
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
		
        $this->_rules(); // Rules atau aturan bahwa setiap form harus diisi
		
		// Jika form indikator belum diisi dengan benar 
		// maka sistem akan meminta user untuk menginput ulang
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } 
		// Jika form indikator telah diisi dengan benar 
		// maka sistem akan menyimpan kedalam database
		else {
            $data = array(
				'no_indikator' => $this->input->post('no_indikator',TRUE),
				'indikator' => $this->input->post('indikator',TRUE),
				'indikator' => $this->input->post('indikator',TRUE),
				'kelompok' => $this->input->post('kelompok',TRUE),
				'inputer' => $this->input->post('inputer',TRUE),
			);

            $this->Indikator_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('indikator'));
        }
    }
    
	// Fungsi menampilkan form Update Indikator
    public function update($id) 
    {	
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
		
		// Menampilkan data berdasarkan id-nya yaitu username
		$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
		$dataAdm = array(	
				'wa'       => 'Green',
				'univ'     => 'Automated Checklist',
				'username' => $rowAdm->username,
				'email'    => $rowAdm->email,
				'level'    => $rowAdm->level,
		);	
		
		// Menampilkan data berdasarkan id-nya yaitu indikator
        $row = $this->Indikator_model->get_by_id($id);
		
		// Jika id-nya dipilih maka data indikator ditampilkan ke form edit indikator
        if ($row) {
			
            $data = array(
                'button' => 'Update',
				'back'   => site_url('indikator'),
                'action' => site_url('indikator/update_action'),
				'id_indikator' => set_value('id_indikator', $row->id_indikator), 
				'no_indikator' => set_value('no_indikator', $row->no_indikator),
				'indikator' => set_value('indikator', $row->indikator),
				'kelompok' => set_value('kelompok', $row->kelompok),
				'inputer' => set_value('inputer', $row->inputer),
			);
			$this->load->view('header',$dataAdm); // Menampilkan bagian header dan object data users 
            $this->load->view('indikator/indikator_form', $data); // Menampilkan form indikator 
			$this->load->view('footer'); // Menampilkan bagian footer
        } 
		// Jika id-nya yang dipilih tidak ada maka akan menampilkan pesan 'Record Not Found'
		else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('indikator'));
        }
    }
    
	// Fungsi untuk melakukan aksi update data
    public function update_action() 
    {
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
		
        $this->_rules(); // Rules atau aturan bahwa setiap form harus diisi
		
		// Jika form indikator belum diisi dengan benar 
		// maka sistem akan meminta user untuk menginput ulang
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_indikator', TRUE));
        } 
		// Jika form indikator telah diisi dengan benar 
		// maka sistem akan melakukan update data indikator kedalam database
		else {			
		    $data = array(
				'id_indikator' => $this->input->post('id_indikator',TRUE),
				'no_indikator' => $this->input->post('no_indikator',TRUE),
				'indikator' => $this->input->post('indikator',TRUE),
				'kelompok' => $this->input->post('kelompok',TRUE),
				'inputer' => $this->input->post('inputer',TRUE),
			);

            $this->Indikator_model->update($this->input->post('id_indikator', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('indikator'));
        }
    }
    
	// Fungsi untuk melakukan aksi delete data berdasarkan id yang dipilih
    public function delete($id) 
    {
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
		
        $row = $this->Indikator_model->get_by_id($id);
		
		//jika id indikator yang dipilih tersedia maka akan dihapus
        if ($row) {
            $this->Indikator_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('indikator'));
        } 
		//jika id indikator yang dipilih tidak tersedia maka akan muncul pesan 'Record Not Found'
		else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('indikator'));
        }
    }
	
	// Fungsi rules atau aturan untuk pengisian pada form (create/input dan update)
    public function _rules() 
    {
	$this->form_validation->set_rules('no_indikator', 'No indikator', 'trim|required');
	$this->form_validation->set_rules('indikator', 'Indikator', 'trim|required');

	$this->form_validation->set_rules('id_indikator', 'id_indikator', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Indikator.php */
/* Location: ./application/controllers/Indikator.php */
/* Please DO NOT modify this information : */
?>