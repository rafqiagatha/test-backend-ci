<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_barang extends CI_Controller {


	function __construct()
	  { 
	    parent::__construct(); 
	    $this->load->helper('url');
	    $this->load->model('M_barang');
	    $this->load->helper(array('form', 'url'));
	    $this->load->library('session');
		$this->load->library('upload');

		if($this->session->userdata('status') != "success_login"){
            redirect('C_login');
        }
	  }

	public function tabel_barang()
	{
		$data['jabatan'] = $this->session->userdata('jabatan');
		$data['barang'] = $this->M_barang->get_barang();

		$this->load->view('V_header');
		$this->load->view('barang/V_barang',$data);
		$this->load->view('V_footer');
	}

	public function create()
	{
		$this->load->view('V_header');
		$this->load->view('barang/V_create_barang');
		$this->load->view('V_footer');
	} 

	public function input_data_barang()
	{
		//upload attachment
		$config['upload_path']      = './upload/barang';
		$config['allowed_types']    = 'gif|jpg|png|jpeg';
		$config['max_size']         = '10000';
		$config['max_width']        = '3000';
		$config['max_height']       = '3000';   
		$config['encrypt_name']			= TRUE;    
		$this->upload->initialize($config);
		if(!$this->upload->do_upload('FOTO_BARANG')){
			$gambar="";
			$error = $this->upload->display_errors();
		}else{
			$gambar=$this->upload->file_name;
		}
	
		$pic = $this->session->userdata('pic');
		$harga = $this->input->post('HARGA_BARANG');
		if($harga > 20000 && $harga < 40000){
			$diskon = $harga * 0.05;
		}else if($harga > 40000){
			$diskon = $harga * 0.1;
		}else{
			$diskon = 0;
		}
		$data = array(
			
		  'ID_BARANG'        		=> $this->input->post('ID_BARANG'),
		  'NAMA_BARANG'        		=> $this->input->post('NAMA_BARANG'),
		  'KATEGORI_BARANG'       	=> $this->input->post('KATEGORI_BARANG'),
		  'HARGA_BARANG'      		=> $this->input->post('HARGA_BARANG'),
		  'DISKON_BARANG'  			=> $diskon,
		  'FOTO_BARANG'        	 	=> $gambar,
		  'ID_USER'       			=> $pic,
	
		);
		$this->M_barang->insert_db_barang($data);
		$this->session->set_flashdata('success', 'Data berhasil ditambahkan');
		redirect('C_barang/tabel_barang'); 
	}

	public function edit($id)
	{ 
		$data['barang'] = $this->M_barang->get_barangid($id);

		$this->load->view('V_header');
		$this->load->view('barang/V_edit_barang',$data);
		$this->load->view('V_footer');
	}

	public function update_data_barang()
	{	
		$id = $this->input->post('ID_BARANG');

		$pic = $this->session->userdata('pic');

		$harga = $this->input->post('HARGA_BARANG');
		if($harga > 20000 && $harga < 40000){
			$diskon = $harga * 0.05;
		}else if($harga > 40000){
			$diskon = $harga * 0.1;
		}else{
			$diskon = 0;
		}

		if($_FILES['FOTO_BARANG']['name']){
			//upload attachment
			$config['upload_path']      = './upload/barang';
			$config['allowed_types']    = 'gif|jpg|png|jpeg';
			$config['max_size']         = '10000';
			$config['max_width']        = '3000';
			$config['max_height']       = '3000';   
			$config['encrypt_name']			= TRUE;    
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('FOTO_BARANG')){
				$gambar="";
				$error = $this->upload->display_errors();
			}else{
				$gambar=$this->upload->file_name;
			}
		
			$param=array(
				'NAMA_BARANG'        		=> $this->input->post('NAMA_BARANG'),
				'KATEGORI_BARANG'       	=> $this->input->post('KATEGORI_BARANG'),
				'HARGA_BARANG'      		=> $this->input->post('HARGA_BARANG'),
				'DISKON_BARANG'  			=> $diskon,
				'FOTO_BARANG'        	 	=> $gambar,
				'ID_USER'       			=> $pic,
			);
		}else{
			$param=array(
				'NAMA_BARANG'        		=> $this->input->post('NAMA_BARANG'),
				'KATEGORI_BARANG'       	=> $this->input->post('KATEGORI_BARANG'),
				'HARGA_BARANG'      		=> $this->input->post('HARGA_BARANG'),
				'DISKON_BARANG'  			=> $diskon,
				'ID_USER'       			=> $pic,
		  	);
		}
		$this->M_barang->update_barang($param,$id);
		$this->session->set_flashdata('update', 'Data berhasil diupdate');
		redirect('C_barang/tabel_barang');
	} 

	public function delete($id)
	{
		$this->M_barang->delete_barang($id);
		$this->session->set_flashdata('delete', 'Data telah dihapus');
		redirect('C_barang/tabel_barang');
	}
}
