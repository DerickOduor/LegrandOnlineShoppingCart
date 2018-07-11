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
        $products['res']=$this->db->get('products')->result();
        $this->load->helper('url');
		$this->load->view('home',$products);
	}
    public function logout(){
        /*$this->session->unset_userdata('customer_name');*/unset($_SESSION['customer_name']);
        $this->index();
        /*$products['res']=$this->db->get('products')->result();
        $this->load->view('home',$products);*/
    }
    public function go_register(){
        $this->load->view('register');
    }
    public function go_login(){
        $this->load->view('login');
    }
    public function go_login_c($checkout){
        $this->session->set_userdata('check_out','c_o');
        $this->load->view('login');
    }
    public function go_register_c($checkout){
        $this->session->set_userdata('check_out','c_o');
        $this->load->view('login');
    }
    public function try_(){
        $this->load->view('try');
    }
    public function step_2(){
        $this->load->view('step_2');
    }
    public function step_3(){
        /*$data['res']=$this->db->get_where('customer_orders',array('order_num'=>$this->session->userdata('order_num'),'order_confirmed'=>'NO'))->result();*/
        $this->load->view('step_3');
    }
    public function profile(){
        $this->load->view('profile');
    }
    public function myorder(){
        $this->load->view('myorder');
    }
    public function checkout(){
        $this->load->view('check_out');
    }
    public function category($tag){
        $products['res']=$this->db->get_where('products',array('tag'=>$tag))->result();
        $this->load->view('category',$products);
    }
    public function view_product($id){
        $product['res']=$this->db->get_where('products',array('id'=>$id))->result();
        $this->load->view('view_product',$product);
    }
	public function login(){
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        //$device=;
        //echo $username.$password.$device;

        $pass=sha1($password,20);
        //$this->db->insert('admin',array('email'=>$username,'password'=>$pass,'username'=>'Derick Oduor'));
        if($this->input->post('device')=='web'){
            $d=$this->db->get_where('customers',array('email'=>$username,'password'=>$password));
            if($d->num_rows()>0){
                //echo "string";
                $data=$this->db->get_where('customers',array('email'=>$username,'password'=>$password))->result();
                foreach($data as $da){
                    $logged_user=$da->username;
                    $logged_id=$da->id;
                    //$logged_profile_pic=$da->profilepic;
                    $this->session->set_userdata(array('customer_name'=>$logged_user,'customer_id'=>$logged_id));
                }
                
                if(($this->session->userdata('check_out'))=='c_o'){
                    unset($_SESSION['check_out']);
                    $this->checkout();
                }else{
                    $products['res']=$this->db->get('products')->result();
                    $this->load->view('home',$products);
                }
                
                
            }else{
                //$this->session->sess_destroy();
                $this->session->set_flashdata('err_msg','Incorrect username or password!');
                $this->index();
            }
                
        }elseif($this->input->post('device')=='android'){
            $d=$this->db->get_where('customers',array('email'=>$username,'password'=>$password));
            if($d->num_rows()>0){
                //echo "string";
                $data=$this->db->get_where('customers',array('email'=>$username,'password'=>$password))->result();
                $response['login_details']=array();
                foreach($data as $da){
                    $logged_user=$da->username;
                    $logged_id=$da->id;
                    $detail['username']=$da->username;
                    $detail['email']=$da->email;
                    $detail['id']=$da->id;
                    //$logged_profile_pic=$da->profilepic;
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

        //echo($device.$username.$password.$email.$phone.$gender);
        if($this->input->post('device')=='web'){
            $register=$this->db->insert('customers',array('username'=>$username,'password'=>$password,'email'=>$email,'phone'=>$phone,'gender'=>$gender));
            if($register==TRUE){
                $this->session->set_flashdata('err_msg','Registration success!');
                //$this->go_login();
                if(($this->session->userdata('reg_checkout'))=='set'){
                    unset($_SESSION['reg_checkout']);
                    $c='c_o';
                    $this->go_login_c($c);
                }else{
                    $this->session->set_flashdata('err_msg','Registration success!');
                    $this->go_login();
                    /*$products['res']=$this->db->get('products')->result();
                    $this->load->view('home',$products);*/
                }
            }
        }elseif($this->input->post('device')=='android'){
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
    public function search_product(){
        $product_name=$this->input->post('product_name');
        //echo($product_name." Received");
        //$product_count=$this->db->get_where('products',array('name'=>$product_name));
        $product_count=$this->db->query('select * from products where name like "%'.$product_name.'%"');
        if($product_count->num_rows()>0){
            //$product=$this->db->get_where('products',array('name'=>$product_name))->result();
            $product=$this->db->query('select * from products where name like "%'.$product_name.'%"')->result();
            $product_result='<div class="row">';
            foreach($product as $p){
                $id=$p->id;
                $picture=$p->picture;
                $name=$p->name;
                $quantity=$p->quantity;
                $price=$p->price;
                $description=$p->description;
                $tag=$p->tag;
                $gender=$p->gender;

                $product_result.='<div class="col-md-2 col-sm-4 col-xs-6 item"><div class="name"><a href="http://localhost/LeGrand/index.php/home/view_product/'.$p->id.'">'.$p->name.'</a></div><div><a href="http://localhost/LeGrand/index.php/home/view_product/'.$p->id.'">'.img(array('width'=>'100%','height'=>'120','src'=>'images/'.$p->picture)).'</a></div><div style="color:red"><b>Kes.'.$p->price.'</b></div><div><a href="http://localhost/LeGrand/index.php/home/view_product/'.$p->id.'"><button class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Buy</button></a></div></div>';
            }
            $product_result.='</div>';
            echo($product_result);
        }else{
            echo "No match found";
        }
    }
    
    public function add_to_cart($id,$price){
        $quantity=$this->input->post('quantity');
        //echo "Received ".$quantity;
        //unset($_SESSION['cart']);
        $cart_products=array();
        if(isset($_SESSION['cart'])){
            $product=array("id"=>$id,"price"=>$price,"id"=>$id,"quantity"=>$quantity);
            $cart='';
            $in_cart='not_in_cart';
            foreach($_SESSION['cart'] as $key=>$value){
                if($id==$value['id']){
                    $in_cart='exists';
                    $cart_products='exists';
                    break;
                }
                
            }
            if($in_cart=='not_in_cart'){
                    array_push($_SESSION['cart'],$product);
                    foreach($_SESSION['cart'] as $key=>$value){
                        array_push($cart_products, array('id'=>$value['id'],'price'=>$value['price'],'quantity'=>$value['quantity']));
                    }    
            }else{
                $cart_products='exists';
            }
            print_r(json_encode(array('cart'=>$cart_products)));
        }else{
            $_SESSION['cart']=array();
            $product=array("id"=>$id,"price"=>$price,"id"=>$id,"quantity"=>$quantity);
            array_push($_SESSION['cart'],$product);
            $cart='';
            foreach($_SESSION['cart'] as $key=>$value){
                array_push($cart_products, array('id'=>$value['id'],'price'=>$value['price'],'quantity'=>$value['quantity']));
            }
            print_r(json_encode(array('cart'=>$cart_products)));
        }
    }
    public function update_item_qty($id,$price){
        $count=0;
        $quantity=$this->input->post('qty');
        if(isset($_SESSION['cart'])){
            $index=array_search($id, array_column($_SESSION['cart'],'id'));
            //unset($_SESSION['cart'][$index]);
            //echo $index;
            //print_r($_SESSION['cart']);
            foreach($_SESSION['cart'] as $key=>$value){
                //$count++;
                if($value['id']==$id){
                    unset($_SESSION['cart'][$key]);
                    $product=array("id"=>$id,"price"=>$price,"id"=>$id,"quantity"=>$quantity);
                    array_push($_SESSION['cart'],$product);
                    //echo'Update '.$index.' '.$quantity;
                    $this->get_cart_items();
                }
               // array_push($cart_products, array('id'=>$value['id'],'price'=>$value['price'],'quantity'=>$value['quantity']));
            }
        }
    }
    public function remove_cart_item(){
        $id=$this->input->post('id');
        $count=0;
        if(isset($_SESSION['cart'])){
            $index=array_search($id, array_column($_SESSION['cart'],'id'));
            //unset($_SESSION['cart'][$index]);
            //echo $index;
            //print_r($_SESSION['cart']);
            foreach($_SESSION['cart'] as $key=>$value){
                //$count++;
                if($value['id']==$id){
                    unset($_SESSION['cart'][$key]);
                    echo'Deleted';
                }
               // array_push($cart_products, array('id'=>$value['id'],'price'=>$value['price'],'quantity'=>$value['quantity']));
            }
        }
    }
    public function clear_cart(){
        $_SESSION['cart']=array();
        if(count($_SESSION['cart'])==0){
            echo "Cart cleared";
        }

    }
    public function get_cart_items(){
        //$get_cart=$_POST['get_cart'];
        if(isset($_SESSION['cart'])){
            $cart_products=array();
            foreach($_SESSION['cart'] as $key=>$value){
                array_push($cart_products, array('id'=>$value['id'],'price'=>$value['price'],'quantity'=>$value['quantity']));
            }
            print_r(json_encode(array('cart'=>$cart_products)));
        }else{
            $cart_products='exists';
            print_r(json_encode(array('cart'=>$cart_products)));
        }
    }

    public function view_cart(){
        if(isset($_SESSION['cart'])){
            $cart_products=array();
            foreach($_SESSION['cart'] as $key=>$value){
                array_push($cart_products, array('id'=>$value['id'],'price'=>$value['price'],'quantity'=>$value['quantity']));
            }
            //print_r(json_encode(array('cart'=>$cart_products)));
        }else{
            $cart_products='exists';
            //print_r(json_encode(array('cart'=>$cart_products)));
        }
        $this->load->view('cart');
    }

    public function address($customer_id){
        $name=$this->input->post('name');
        $phone=$this->input->post('phone');
        $location=$this->input->post('location');
        $order_num=$this->input->post('order_num');
        $station=$this->input->post('station');
        $date_placed=gmstrftime("%Y-%m-%d %H:%M:%S",time()+60*60*3);

        if(isset($_SESSION['cart'])){
            $total_price=0;
            $_SESSION['customer_orders']=array();
            foreach($_SESSION['cart'] as $key=>$value){
                $total_price+=$value['price']*$value['quantity'];
                if(isset($_SESSION['customer_orders'])){
                    array_push($_SESSION['customer_orders'], array('customer_name'=>$name,'customer_id'=>$customer_id,'order_num'=>$order_num,'phone'=>$phone,'location'=>$location,'station'=>$station,'date_placed'=>$date_placed,'product_id'=>$value['id'],'price'=>$value['price'],'quantity'=>$value['quantity'],'total_price'=>$value['price']*$value['quantity']));
                }else{
                    $_SESSION['customer_orders']=array();
                    array_push($_SESSION['customer_orders'], array('customer_name'=>$name,'customer_id'=>$customer_id,'order_num'=>$order_num,'phone'=>$phone,'location'=>$location,'station'=>$station,'date_placed'=>$date_placed,'product_id'=>$value['id'],'price'=>$value['price'],'quantity'=>$value['quantity'],'total_price'=>$value['price']*$value['quantity']));
                }
            }
            //print_r($_SESSION['customer_orders']);
            unset($_SESSION['cart']);
            redirect('http://localhost/legrand/index.php/home/step_2');
        }
    }

    public function transaction($customer_id){
        $order_made=FALSE;
        //print_r($_SESSION['customer_orders']);
        $i=0;
        $count=count($_SESSION['customer_orders']);
        //echo 'Count='.$count;
        if(isset($_SESSION['customer_orders'])){
            foreach($_SESSION['customer_orders'] as $key=>$value){
                $order_made=$this->db->insert('customer_orders',array('customer_name'=>$value['customer_name'],'customer_id'=>$value['customer_id'],'order_num'=>$value['order_num'],'phone'=>$value['phone'],'location'=>$value['location'],'station'=>$value['station'],'date_placed'=>$value['date_placed'],'product_id'=>$value['product_id'],'price'=>$value['price'],'quantity'=>$value['quantity'],'total_price'=>$value['price']*$value['quantity']));
                //echo $i++.'<br/>';
                /*while ($count==$i) {
                    break;
                    echo "broke-";
                }*/
            }
            unset($_SESSION['customer_orders']);
        }
        //print_r($_SESSION['customer_orders']);
        if($order_made==TRUE){
            $data['res']=$this->db->get_where('customer_orders',array('order_num'=>$this->session->userdata('order_num'),'order_confirmed'=>'NO'))->result();
            //echo'Success';
            $this->step_3();
            //print_r($data);
        }else{
            echo'error!';
        }
    } 
    public function confirm_order(){
        if(!empty($this->input->post('item_checked'))){
            foreach($this->input->post('item_checked') as $checked){
                //echo $checked;
                $this->db->set(array('order_confirmed'=>'YES','order_paid'=>'YES'));
                $this->db->where(array('order_confirmed'=>'NO','customer_id'=>$this->session->userdata('customer_id'),'product_id'=>$checked));
                $confirm=$this->db->update('customer_orders',array('order_confirmed'=>'YES','order_paid'=>'YES'));
                if($confirm==FALSE){
                    break;
                    echo "Error occured!";
                }else{
                    continue;
                    //$this->load->view('myorder',$data);
                }
            }
           $order_number=$this->session->userdata('order_num');
            unset($_SESSION['order_num']);
            unset($_SESSION['customer_orders']);
            unset($_SESSION['cart']);
            $this->profile();
            //$data['res']=$this->db->get_where('customer_orders',array('order_num'=>$order_number,'order_confirmed'=>'YES'))->result();
            //print_r($data);
            //$this->load->view('myorder',$data);
        }
    } 
    public function remove_from_order($product_id){
        $this->db->where(array('product_id'=>$product_id,'order_confirmed'=>'NO'));
        $deleted=$this->db->delete('customer_orders');
        if($deleted==TRUE){
            $this->step_3();
        }else{
            echo "Error occured";
        }
    }  
    public function cancel_order($order_number){
        $this->db->set(array('order_confirmed'=>'CANCELLED','order_paid'=>'NO'));
        $this->db->where(array('order_confirmed'=>'YES','customer_id'=>$this->session->userdata('customer_id'),'order_num'=>$order_number));
        $cancel=$this->db->update('customer_orders',array('order_confirmed'=>'CANCELLED','order_paid'=>'NO'));
        if($cancel==TRUE){
            $this->profile();
        }
    }

    public function android_login(){
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
        }else{
            $response['success']=0;
            $response['login_details']='Failed';
            echo(json_encode($response));
        }
    }

    public function android_register(){
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

    public function android_get_products($tag){
        $products=$this->db->get_where('products',array('tag'=>$tag))->result();
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

    public function android_get_categories(){
        $products=$this->db->get('categories')->result();
        $response['categories']=array();
        foreach ($products as $p) {
            $detail['name']=$p->name;
            $detail['id']=$p->id;
            $detail['picture']=$p->picture;
            array_push($response['categories'], $detail);
        }
        echo(json_encode($response));
        //print_r($products);
    }

    public function android_get_product($id){
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
            $detail['picture_2']=$p->picture_2;
            $detail['picture_3']=$p->picture_3;
            $detail['picture_4']=$p->picture_4;
            $detail['picture_5']=$p->picture_5;
            array_push($response['products'], $detail);
        }
        echo(json_encode($response));
    }
}