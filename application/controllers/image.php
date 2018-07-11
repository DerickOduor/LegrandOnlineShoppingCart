<?php
class Image extends CI_Controller{

	//var $data=array();
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$config=array(
			'upload_path'=>'images/',
			'allowed_types'=>'jpg|jpeg|png|bmp',
			'max_size'=>0,
			'file_name'=>url_title($this->input->post('file')),
			'encrypt_name'=>true
		);
		$this->load->library('upload',$config);
		if($this->upload->do_upload('file')){
			$this->db->insert('image_table',array('file_name'=>$this->upload->file_name));
			$this->session->set_flashdata('msg','Success!');
			redirect('http://localhost/derick/index.php/image');
		}
		$data['get_image']=$this->db->get('image_table');
		//$data=array('get_image'=>);
		$this->load->view('image',/*$this->*/$data);
	}

	public function delete_image($image){
		$this->db->where('file_name',$image);
		$this->db->delete('image_table');
		@unlink('images/'.$image);
		$this->session->set_flashdata('msg','Success!');
		redirect('http://localhost/derick/index.php/image');
	}
}
?>