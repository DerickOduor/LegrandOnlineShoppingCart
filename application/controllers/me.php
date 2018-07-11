<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
        $this->load->helper('directory');
		$this->load->library('session');

	}
	public function index(){
        $this->load->helper('url');
		$this->load->view('me');
	}
	public function login(){
        if(isset($_POST['username'])&&isset($_POST['password'])){
            $username=$this->input->post('username');
            $passsword=$this->input->post('password');
        }else{
            $this->index();
        }
        
    }
    
}