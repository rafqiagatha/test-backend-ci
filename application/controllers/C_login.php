<?php

class C_login extends CI_Controller {

	public function __construct() {

		parent::__construct();
	
		$this->load->library('session');
		

	}

    public function index($error = NULL) {

		$this->load->view('login/V_login');

	}
    public function login(){
        $username = $this->input->post('USERNAME');
        $password = $this->input->post('PASSWORD');
        $this->db->where('USERNAME', $username);
        $this->db->where('PASSWORD', $password);
        $get_data = $this->db->get('user')->row();
    
        if (!empty($get_data)) {
          $session_data = array(
              'jabatan' 	=> 	$get_data->ID_JABATAN,
              'nama' 	=> 	$get_data->NAMA_USER,
              'pic' 	=> 	$get_data->ID_USER,
              'status' 		=> 'success_login'
              );
          $this->session->set_userdata($session_data);
          redirect('C_barang/tabel_barang');
  
        }else{
            
            echo '<script> alert("Username atau Password salah") </script>';
            $this->load->view('login/V_login');
  
        }
      }
      function logout(){
          $this->session->sess_destroy();
          redirect(site_url('C_login'));
      }
}
