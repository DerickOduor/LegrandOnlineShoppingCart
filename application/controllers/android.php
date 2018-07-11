<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
        $this->load->helper('directory');
		$this->load->library('session');

	}

	public function login(){
		$username=$this->input->post('username');
        $password=$this->input->post('password');

        if($this->input->post('device')=='android'){
            $d=$this->db->get_where('customers',array('email'=>$username,'password'=>$password));
            if($d->num_rows()>0){
                $data=$this->db->get_where('customers',array('email'=>$username,'password'=>$password))->result();
                $response['login_details']=array();
                foreach($data as $da){
                    $logged_user=$da->username;
                    $logged_id=$da->id;
                    $detail['username']=$da->username;
                    $detail['email']=$da->email;
                    $detail['id']=$da->id;
                    array_push($response['login_details'], $detail);
                    $this->session->set_userdata(array('customer_name'=>$logged_user,'customer_id'=>$logged_id));
                }
                $response['success']=1;
                echo(json_encode($response));
            }else{
                $response['success']=0;
                $response['login_details']='Failed';
                echo(json_encode($response));
            }
        }
	}

	public function register(){
		$username=$this->input->post('username');
        $password=$this->input->post('password');
        $email=$this->input->post('email');
        $phone=$this->input->post('phone');
        $gender=$this->input->post('gender');

		if($this->input->post('device')=='android'){
            $register=$this->db->insert('customers',array('username'=>$username,'password'=>$password,'email'=>$email,'phone'=>$phone,'gender'=>$gender));
            $response['register_details']=array();
            if($register==TRUE){
                $response['success']=1;
                $response['register_details']='success';
                echo(json_encode($response));
            }else{
                $response['success']=0;
                $response['register_details']='Failed';
                echo(json_encode($response));
            }
        }
	}

	public function get_products(){
        $products=$this->db->get('products')->result();
        $response['products']=array();
        foreach ($products as $p) {
            $detail['name']=$p->name;
            $detail['id']=$p->id;
            $detail['price']=$p->price;
            $detail['tag']=$p->tag;
            $detail['quantity']=$p->quantity;
            $detail['picture']=$p->picture;
            $detail['description']=$p->description;
            $detail['gender']=$p->gender;
            array_push($response['products'], $detail);
        }
        echo(json_encode($response));
        //print_r($products);
    }

    public function get_product($id){
        $products=$this->db->get_where('products',array('id'=>$id))->result();
        $response['products']=array();
        foreach ($products as $p) {
            $detail['name']=$p->name;
            $detail['id']=$p->id;
            $detail['price']=$p->price;
            $detail['tag']=$p->tag;
            $detail['quantity']=$p->quantity;
            $detail['picture']=$p->picture;
            $detail['description']=$p->description;
            $detail['gender']=$p->gender;
            array_push($response['products'], $detail);
        }
        echo(json_encode($response));
    }
}	