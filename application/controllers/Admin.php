<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
        $this->load->helper('directory');
		$this->load->library('session');

	}

	public function index(){
        $this->load->helper('url');
		$this->load->view('admin/admin');
	}
	public function main(){
        $this->load->helper('url');
        $products['res']=$this->db->get('products')->result();
		$this->load->view('admin/main',$products);
	}
	public function new_product(){
        $this->load->helper('url');
		$this->load->view('admin/new_product');
	}
	public function profile(){
        $this->load->helper('url');
		$this->load->view('admin/profile');
	}
	public function logout(){
        $this->session->sess_destroy();
		$this->load->view('admin/admin');
	}

	public function edit_product($id){
		$product['res']=$this->db->get_where('products',array('id'=>$id))->result();
		$this->load->view('admin/edit_product',$product);
	}

	public function login(){
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$device=$this->input->post('device');
		//echo $username.$password.$device;

		$pass=sha1($password,20);
		//$this->db->insert('admin',array('email'=>$username,'password'=>$pass,'username'=>'Derick Oduor'));
		if($device=='web'){
			$d=$this->db->get_where('admin',array('email'=>$username,'password'=>$password));
			if($d->num_rows()>0){
				$data=$this->db->get_where('admin',array('email'=>$username,'password'=>$password))->result();
				foreach($data as $da){
					$logged_user=$da->username;
					$logged_id=$da->id;
					$logged_profile_pic=$da->profilepic;
					$this->session->set_userdata(array('name'=>$logged_user,'id'=>$logged_id,'pic'=>$logged_profile_pic));
				}
				$products['res']=$this->db->get('products')->result();
				$this->load->view('admin/main',$products);
			}else{
				$this->session->sess_destroy();
                $this->session->set_flashdata('err_msg','Incorrect username or password!');
                $this->index();
			}
        }else{

		}
	}
	public function add_new_product(){
		$product_name=$this->input->post('product');
		$price=$this->input->post('price');
		$quantity=$this->input->post('quantity');
		$description=$this->input->post('description');
		$tag=$this->input->post('tag');
		$gender=$this->input->post('gender');
		//echo $product_name." ".$price." ".$quantity." ".$description." ".$tag." ".$gender;

		if($price<=0){
			$this->session->set_flashdata('msg','Price must be greater than 0');
			$this->session->set_flashdata('product',$product_name);
			$this->session->set_flashdata('price',$price);
			$this->session->set_flashdata('quantity',$quantity);
			$this->session->set_flashdata('description',$description);
			$this->session->set_flashdata('tag',$tag);
			$this->session->set_flashdata('gender',$gender);
			$this->load->view('admin/new_product');

		}elseif($quantity<=0){
			$this->session->set_flashdata('msg','Quantity must be greater than 0');
			$this->session->set_flashdata('product',$product_name);
			$this->session->set_flashdata('quantity',$quantity);
			$this->session->set_flashdata('price',$price);
			$this->session->set_flashdata('description',$description);
			$this->session->set_flashdata('tag',$tag);
			$this->session->set_flashdata('gender',$gender);
			$this->load->view('admin/new_product');
		}else{
			$insert_product=$this->db->insert('products',array('name'=>$product_name,'price'=>$price,'description'=>$description,'quantity'=>$quantity,'gender'=>$gender,'tag'=>$tag));
			if($insert_product==TRUE){
				$product_id['res']=$this->db->get_where('products',array('name'=>$product_name))->result();
				
				$this->session->set_flashdata('msg','Success!');
				$this->load->view('admin/add_product_pic',$product_id);
			}else{
				$this->session->set_flashdata('msg','Error occured while adding the product: Contact developer!');
				$this->load->view('admin/add_new_product');
			}
		}
	}
	public function upload_product_pic($id){
		$config=array(
			'upload_path'=>'images/',
			'allowed_types'=>'jpg|jpeg|png|bmp',
			'max_size'=>0,
			'file_name'=>url_title($this->input->post('file')),
			'encrypt_name'=>true
		);
		$this->load->library('upload',$config);
		if($this->upload->do_upload('file')){
			$this->db->set(array('picture'=>$this->upload->file_name));
        	$this->db->where(array('id'=>$id));
        	$this->db->update('products',array('picture'=>$this->upload->file_name));
			
			//$this->db->insert('products',array('picture'=>$this->upload->file_name));
			$this->session->set_flashdata('msg','Success!');
			/*$image=$this->db->get_where('products',array('id'=>$id));
			foreach($image->result() as $i){
				echo'<div class="col-lg-2">';
				echo'<div>'.img(array('width'=>'100','height'=>'70','src'=>'images/'.$i->picture)).'</div>';
				echo'<div>'.anchor(base_url('images/'.$i->picture),'View').' | '.anchor('image/delete_image/'.$i->picture,'Delete').'</div>';
				echo '</div>';
			}
			echo "Success i";*/
			$products['res']=$this->db->get('products')->result();
			$this->load->view('admin/main',$products);
			//redirect('http://localhost/legrand/index.php/admin/main');
		}
	}
	public function upload_product_pic_2($id){
		$config=array(
			'upload_path'=>'images/',
			'allowed_types'=>'jpg|jpeg|png|bmp',
			'max_size'=>0,
			'file_name'=>url_title($this->input->post('file')),
			'encrypt_name'=>true
		);
		$this->load->library('upload',$config);
		if($this->upload->do_upload('file')){
			$this->db->set(array('picture_2'=>$this->upload->file_name));
        	$this->db->where(array('id'=>$id));
        	$this->db->update('products',array('picture_2'=>$this->upload->file_name));
			
			//$this->db->insert('products',array('picture'=>$this->upload->file_name));
			$this->session->set_flashdata('msg','Success!');
			/*$image=$this->db->get_where('products',array('id'=>$id));
			foreach($image->result() as $i){
				echo'<div class="col-lg-2">';
				echo'<div>'.img(array('width'=>'100','height'=>'70','src'=>'images/'.$i->picture)).'</div>';
				echo'<div>'.anchor(base_url('images/'.$i->picture),'View').' | '.anchor('image/delete_image/'.$i->picture,'Delete').'</div>';
				echo '</div>';
			}
			echo "Success i";*/
			$products['res']=$this->db->get('products')->result();
			$this->load->view('admin/main',$products);
			//redirect('http://localhost/legrand/index.php/admin/main');
		}
	}

	public function upload_product_pic_3($id){
		$config=array(
			'upload_path'=>'images/',
			'allowed_types'=>'jpg|jpeg|png|bmp',
			'max_size'=>0,
			'file_name'=>url_title($this->input->post('file')),
			'encrypt_name'=>true
		);
		$this->load->library('upload',$config);
		if($this->upload->do_upload('file')){
			$this->db->set(array('picture_3'=>$this->upload->file_name));
        	$this->db->where(array('id'=>$id));
        	$this->db->update('products',array('picture_3'=>$this->upload->file_name));
			
			//$this->db->insert('products',array('picture'=>$this->upload->file_name));
			$this->session->set_flashdata('msg','Success!');
			/*$image=$this->db->get_where('products',array('id'=>$id));
			foreach($image->result() as $i){
				echo'<div class="col-lg-2">';
				echo'<div>'.img(array('width'=>'100','height'=>'70','src'=>'images/'.$i->picture)).'</div>';
				echo'<div>'.anchor(base_url('images/'.$i->picture),'View').' | '.anchor('image/delete_image/'.$i->picture,'Delete').'</div>';
				echo '</div>';
			}
			echo "Success i";*/
			$products['res']=$this->db->get('products')->result();
			$this->load->view('admin/main',$products);
			//redirect('http://localhost/legrand/index.php/admin/main');
		}
	}

	public function upload_product_pic_4($id){
		$config=array(
			'upload_path'=>'images/',
			'allowed_types'=>'jpg|jpeg|png|bmp',
			'max_size'=>0,
			'file_name'=>url_title($this->input->post('file')),
			'encrypt_name'=>true
		);
		$this->load->library('upload',$config);
		if($this->upload->do_upload('file')){
			$this->db->set(array('picture_4'=>$this->upload->file_name));
        	$this->db->where(array('id'=>$id));
        	$this->db->update('products',array('picture_4'=>$this->upload->file_name));
			
			//$this->db->insert('products',array('picture'=>$this->upload->file_name));
			$this->session->set_flashdata('msg','Success!');
			/*$image=$this->db->get_where('products',array('id'=>$id));
			foreach($image->result() as $i){
				echo'<div class="col-lg-2">';
				echo'<div>'.img(array('width'=>'100','height'=>'70','src'=>'images/'.$i->picture)).'</div>';
				echo'<div>'.anchor(base_url('images/'.$i->picture),'View').' | '.anchor('image/delete_image/'.$i->picture,'Delete').'</div>';
				echo '</div>';
			}
			echo "Success i";*/
			$products['res']=$this->db->get('products')->result();
			$this->load->view('admin/main',$products);
			//redirect('http://localhost/legrand/index.php/admin/main');
		}
	}

	public function upload_product_pic_5($id){
		$config=array(
			'upload_path'=>'images/',
			'allowed_types'=>'jpg|jpeg|png|bmp',
			'max_size'=>0,
			'file_name'=>url_title($this->input->post('file')),
			'encrypt_name'=>true
		);
		$this->load->library('upload',$config);
		if($this->upload->do_upload('file')){
			$this->db->set(array('picture_5'=>$this->upload->file_name));
        	$this->db->where(array('id'=>$id));
        	$this->db->update('products',array('picture_5'=>$this->upload->file_name));
			
			//$this->db->insert('products',array('picture'=>$this->upload->file_name));
			$this->session->set_flashdata('msg','Success!');
			/*$image=$this->db->get_where('products',array('id'=>$id));
			foreach($image->result() as $i){
				echo'<div class="col-lg-2">';
				echo'<div>'.img(array('width'=>'100','height'=>'70','src'=>'images/'.$i->picture)).'</div>';
				echo'<div>'.anchor(base_url('images/'.$i->picture),'View').' | '.anchor('image/delete_image/'.$i->picture,'Delete').'</div>';
				echo '</div>';
			}
			echo "Success i";*/
			$products['res']=$this->db->get('products')->result();
			$this->load->view('admin/main',$products);
			//redirect('http://localhost/legrand/index.php/admin/main');
		}
	}
	public function search_product(){
		$product_name=$this->input->post('product_name');
		//$product_count=$this->db->get_where('products',array('name'=>$product_name));
		$product_count=$this->db->query('select * from products where name like "%'.$product_name.'%"');
		if($product_count->num_rows()>0){
			//$product=$this->db->get_where('products',array('name'=>$product_name))->result();
			$product=$this->db->query('select * from products where name like "%'.$product_name.'%"')->result();
			$product_result='<table class="table table-responsive table-bordered" id="products">';
			$product_result.='<tr><th>Image</th><th>Id</th><th>Name</th><th>Quantity</th><th>Price</th><th>Tag</th><th>Gender</th><th>Action</th></tr>';
			foreach($product as $p){
				$id=$p->id;
				$picture=$p->picture;
				$name=$p->name;
				$quantity=$p->quantity;
				$price=$p->price;
				$description=$p->description;
				$tag=$p->tag;
				$gender=$p->gender;

				$product_result.='<tr><td>'.anchor(base_url('images/'.$picture),img(array("width"=>"50","height"=>"30","src"=>"images/".$picture))).'
    			</td><td>'.$id.'</td><td>'.$name.'</td><td>'.$quantity.'</td><td>'.$price.'</td><td>'.$tag.'</td><td>'.$gender.'</td><td><a href="http://localhost/legrand/index.php/admin/	edit_product/<?php echo $r->id?>">Edit</a></td></tr>';
			}
			$product_result.='</table>';
			echo($product_result);
		}else{
			echo "No match found";
		}
	}

}	
