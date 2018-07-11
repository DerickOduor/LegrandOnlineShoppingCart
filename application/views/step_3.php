<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?php base_url('index.php')?>css/bootstrap.min.css"/>
    <script src="<?php base_url('index.php')?>js/bootstrap.js"></script>
    <script src="<?php base_url('index.php')?>js/jquery.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script> 

    <script src="http://localhost/sportssystem/index.php/../js/jquery.js"></script>
    <script src="http://localhost/sportssystem/index.php/../js/bootstrap.min.js"></script>
    <script src="http://localhost/sportssystem/index.php/../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="http://localhost/sportssystem/index.php/../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="http://localhost/sportssystem/index.php/../css/bootstrap-reboot.min.css"/>
    <link rel="stylesheet" href="http://localhost/sportssystem/index.php/../css/bootstrap-grid.min.css"/>
    <title>LeGrand</title>
</head>
<body>
    <header role="banner" class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <a class="navbar-brand" href="http://localhost/legrand/">Le Grand</a>
        <div class="navbar-header">
          <button data-toggle="collapse-side" data-target=".side-collapse" data-target-2=".side-collapse-container" type="button" class="navbar-toggle pull-right"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="navbar-inverse side-collapse in">
          <nav role="navigation" class="navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href="http://localhost/legrand/"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
              <li id="drop"><a href="#"id="view_cart"><span class="glyphicon glyphicon-shopping-cart"></span><span class="badge badge-default"id="cart_qty">0</span>&nbsp;Cart&nbsp;<span class="glyphicon glyphicon-menu-down"></span></a>
                <ul class="sub-menu">
                    <li id="cart_actions"><b><span id="view_cart_">View Cart</span><span id="check_out">Check out</span></b></li>
                </ul>
              </li>
              <!--<li><a href="http://localhost/legrand/index.php/admin/orders"><span class="glyphicon glyphicon-wrench"></span>&nbsp;Orders</a></li>-->
              <?php 
              if(!empty($this->session->userdata('customer_name'))){
                echo'<li><a href="#"><span class="glyphicon glyphicon-globe"></span>&nbsp;Notifications</a></li>
              <li><a href="http://localhost/legrand/home/profile"><span class="glyphicon glyphicon-user"></span>&nbsp;'.$this->session->userdata('customer_name').'</a></li>
              <li><a href="http://localhost/legrand/home/logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>';
              }else{
              ?>
              <li><a href="http://localhost/legrand/home/go_login"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Login</a></li>
              <?php 
              }?>          
            </ul>
          </nav>
        </div>
      </div>
    </header>
<br/>
    

</div>
<?php 
if(!empty($this->session->userdata('customer_name'))){
  
?>
    
      <div class="row"id="steps">
        <div class="col-md-4 col-sm-4 col-xs-4 step"id="step1_">Step<br/>
          <a href="#"id="step1"class="active"><span class=""><button type="button" class="btn btn-default btn-circle"><b>1</b></button></span></a>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4 step"id="step2_">Step<br/>
          <a href="#"id="step2"class="disabled"><span class=""><button type="button" class="btn btn-default btn-circle"><b>2</b></button></span></a>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4 step"id="step3_">Step<br/>
          <a href="#"id="step3"class="disabled"><span class=""><button type="button" class="btn btn-info btn-circle"><b>3</b></button></span></a>
        </div>
      </div>
      <?php 
      $res=$data['res']=$this->db->get_where('customer_orders',array('order_num'=>$this->session->userdata('order_num'),'order_confirmed'=>'NO'))->result();
      
      if(count($res)==0){
        unset($_SESSION['order_num']);
        echo '<div class="container">Empty order!<br/><a href="http://localhost/legrand">Go shopping!</a></div>';
      }else{


      ?>
      <div class="container"id="confirm_order">
        <div class="panel panel-info">
          <div class="panel-heading">Please confirm your order: Check the boxes and submit.</div>
          <div class="panel-body">
          <div class="container"><b>Order No.:&nbsp;</b><?php echo $this->session->userdata('order_num');?></div>
          <table class="table table-bordered table-striped table-sm">
          <form action="http://localhost/legrand/index.php/home/confirm_order"method="POST"class="form">
          <tr><th>Action</th><th>Picture</th><th>Product Name</th><th>Quantity</th><th>Price</th><th>Total Price</th></tr>
          <?php 

          foreach($res as $r){
            $prod=array();
            $pic_url='';
            $product_name='';
            $name=$this->db->get_where('products',array('id'=>$r->product_id))->result();
            foreach($name as $n){
              $product_name=$n->name;
              $pic_url=$n->picture;
              $prod=array('product_name'=>$product_name,'picture'=>$pic_url);

              //$this->session->set_userdata(array('product_name'=>$product_name,'pic_url'=>$pic_url));
            }
            //print_r($res);
            
            echo'<tr><td><input type="checkbox"name="item_checked[]"id="'.$r->product_id.'"value="'.$r->product_id.'"class="form-control"required/></td><td>'.img(array('width'=>'80px','height'=>'50px','class'=>'img-fluid','src'=>'images/'.$prod['picture'])).'</td><td>'.$prod['product_name'].'</td><td>'.$r->quantity.'</td><td>'.$r->price.'</td><td>'.$r->price*$r->quantity.'</td><td><a href="http://localhost/legrand/index.php/home/remove_from_order/'.$r->product_id.'"class="btn btn-danger"id="'.$r->product_id.'"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a></td></tr>';
            /*unset($_SESSION['product_name']);
            unset($_SESSION['pic_url']);*/
          }
          ?>
          <br/>
            <div class="form-group">
                <button type="submit"class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;Confirm Order</button>
            </div>
          </form>
          </table>
          </div>
        </div>
      </div>
      <?php 
      }
      ?>
  </div>
      
<?php 
}else{
  redirect('http://localhost/legrand/home/go_login_c/c');
}
?>
    </div>
<!--

-->
<script language="javascript">
/*
function showMacAddress(){
alert('A');
var obj = new ActiveXObject("WbemScripting.SWbemLocator");

var s = obj.ConnectServer(".");

var properties = s.ExecQuery("SELECT * FROM Win32_NetworkAdapterConfiguration");

var e = new Enumerator (properties);

var output;

output='<table border="0" cellPadding="5px" cellSpacing="1px" bgColor="#CCCCCC">';

output=output + '<tr bgColor="#EAEAEA"><td>Caption</td><td>MACAddress</td></tr>';

while(!e.atEnd())

{

e.moveNext();

var p = e.item ();

if(!p) continue;

output=output + '<tr bgColor="#FFFFFF">';

output=output + '<td>' + p.Caption; + '</td>';

output=output + '<td>' + p.MACAddress + '</td>';

output=output + '</tr>';

}

output=output + '</table>';

document.getElementById("box").innerHTML=output;
alert(output);
}
*/
</script>
 <!-- <input type="button" value="Show MAC Address" onclick="showMacAddress()" />

<div id="box">

</div>-->



<!--

-->




</body>
</html>
<script type="text/javascript">
$(document).ready(function() { 
    $('#step2').click(function(){
      /*$('#payment').slideDown('fast','linear');
      $('#address').slideUp('fast','linear');
      $('#confirm_order').slideUp('fast','linear');
      $(this).removeClass('btn-default');
      $(this).addClass('btn-info');*/
    });
    $('#step1').click(function(){
      /*$('#payment').slideUp('fast','linear');
      $('#address').slideDown('fast','linear');
      $('#confirm_order').slideUp('fast','linear');
      $(this).addClass('active');*/
    });
    $('#step3').click(function(){
      $('#payment').slideUp('fast','linear');
      $('#address').slideUp('fast','linear');
      $('#confirm_order').slideDown('fast','linear');
      $(this).addClass('active');
    });
    get_cart_items();
    function get_cart_items(){
      $('.cart_error').html('');
      var form_data=$('#quantity_requested').val();
      //var form_data=$(this).serialize();
      var u=$(this).attr('action');
      var m=$(this).attr('method');
      $.ajax({
        url:'http://localhost/LeGrand/index.php/home/get_cart_items',
        method:'POST',
        data:{'get_cart':'get_cart'},
        dataType:'json',
        success:function(msg){
          if(msg.cart=='exists'){
            //alert('item exists');
            $('.cart_error').html('Item exists in your cart!');
          }else{
            $('.sub-menu').html('<li id="cart_actions"><b><span id="view_cart_">View Cart</span><span id="check_out">Check out</span></b></li>');
            var cart_qty=0;
            $.each(msg.cart, function(i,post){
              cart_qty++;
              $('.cart_error').append(i);
              $('.sub-menu').append('<li><a href="#">'+post.id+' '+post.price+'</a></li>');
            });
            $('#cart_qty').html(cart_qty);

          }
          $('#view_cart_').on('click',function(){
            window.open('http://localhost/legrand/home/view_cart','_self');
          });
        },
        error:function(){
          alert('Something went wrong!');
        }
      });
    }
    $('#view_cart').on('click',function(){
      window.open('http://localhost/legrand/home/view_cart','_self');
    });
    $('#view_cart_').on('click',function(){
      window.open('http://localhost/legrand/home/view_cart','_self');
    });
    var sideslider = $('[data-toggle=collapse-side]');
    var sel = sideslider.attr('data-target');
    var sel2 = sideslider.attr('data-target-2');
    sideslider.click(function(event){
        $(sel).toggleClass('in');
        $(sel2).toggleClass('out');
    });
    
});
</script>
<style type="text/css">
.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
 body {
          padding-top: 50px;
          position: relative;
      }
      
      pre {
          tab-size: 8;
      }
      .main{
        margin-top: 10px;
        font-family: tahoma;
      }
      #drop:hover .sub-menu {
        z-index:1;
        opacity:1;
      }
      .sub-menu {
        width:160%;
        padding:5px 0px;
        position:absolute;
        top:100%;
        left:0px;
        z-index:-1;
        opacity:0;
        transition:opacity linear 0.15s;
        box-shadow:0px 2px 3px rgba(0,0,0,0.2);
        background:#fff;
      }
      .sub-menu li a:hover, .sub-menu .current-item a {
        background:#3e3436;
      }
      .sub-menu li a {
        text-decoration: none;
        padding:10px 30px;
        display:block;
        color: rgba(0,0,0,0.7);
      }
      .sub-menu li a:hover{
        color: #fff;
      }
      .sub-menu li {
        display:block;
        font-size:16px;
      }
      .sub-menu #cart_actions{
        font-size: 13px;
        display: inline-block;
        padding-left: 18%;
      }
      .sub-menu #cart_actions span{
        padding: 5px;

      }
      .sub-menu #cart_actions span:hover{
        background: rgba(0,0,0,0.7);
        color: #fff;
        cursor: pointer;
      }
      #step1_,#step2_,#step3_{
        font-family: tahoma;
      }
      #steps{
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 10%;
        margin-right: 10%;
      }
      @media screen and (max-width: 768px) {
        .side-collapse-container{
            width:100%;
            position:relative;
            left:0;
            transition:left .4s;
          }
          .side-collapse-container.out{
            left:200px;
          }
          .side-collapse {
            top:50px;
            bottom:0;
            left:0;
            width:200px;
            position:fixed;
            overflow:hidden;
            transition:width .4s;
          }
          .side-collapse.in {
             width:0;
          }
          #steps{
            margin-left: 5%;
            margin-right: 5%;
          }
      } 
</style>
