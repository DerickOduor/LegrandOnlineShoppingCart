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
              <li class="active"><a href="http://localhost/legrand/home/profile"><span class="glyphicon glyphicon-user"></span>&nbsp;'.$this->session->userdata('customer_name').'</a></li>
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
    <div class="row"id="main">
        <div class="col-md-2 col-sm-12 col-xs-12 side_nav">
            <ul>
                <li id="li_or" class="active"><a href="#orders"id="v_orders">Orders</a></li>
                <li id="li_hi"><a href="#history"id="v_history">History</a></li>
                <li id="li_pr"><a href="#profile"id="v_profile">My Profile</a></li>
                <li id="li_me"><a href="#messages"id="v_messages">Messages</a></li>
            </ul>
        </div>
        <div class="col-md-10 col-sm-12 col-xs-12 main_content">
          <div id="orders"class="container">
            <div class="row"id="pending">
            <?php 
            $order_number=0;
            $pending_orders=$this->db->get_where('customer_orders',array('customer_id'=>$this->session->userdata('customer_id'),'order_confirmed'=>'YES','acknowledged'=>'NO','delivery_status'=>'InTransit'))->result();
            foreach($pending_orders as $r){
              $order_number=$r->order_num;
            }
            ?>
            
              <?php 
              if(count($pending_orders)!=0){
                $cumm_price=0;
                
                ?>
                You have ordered the following items:<br/>
                <table class="table table-bordered table-striped table-sm"id="pending_table">
                  <tr><td colspan="5"><b>Order No.:&nbsp;</b><?php echo $order_number;?></td></tr>
                  <tr><th>Picture</th><th>Product Name</th><th>Quantity</th><th>Price</th><th>Total Price</th></tr>
                <?php
                foreach($pending_orders as $r){
                  $prod=array();
                  $pic_url='';
                  $product_name='';
                  $order_number=$r->order_num;
                  $name=$this->db->get_where('products',array('id'=>$r->product_id))->result();
                  foreach($name as $n){
                    $product_name=$n->name;
                    $pic_url=$n->picture;
                    $prod=array('product_name'=>$product_name,'picture'=>$pic_url);

                  }
                  echo'<tr><td>'.img(array('width'=>'80px','height'=>'50px','class'=>'img-fluid','src'=>'images/'.$prod['picture'])).'</td><td>'.$prod['product_name'].'</td><td>'.$r->quantity.'</td><td>'.$r->price.'</td><td>'.$r->price*$r->quantity.'</td></tr>';
                  $cumm_price+=$r->price*$r->quantity;
                }
                echo '';
              }else{
                echo'<p>You have no pending orders. Would like to go shopping? <a href="http://localhost/legrand">Yes</a>&nbsp;</p>';
              }
              ?>
              <tr><td colspan="4">To pay:</td><td>Kes.&nbsp;<?php echo $cumm_price;?></td></tr>
              <br/>
            
          </table>
          <form action="http://localhost/legrand/index.php/home/cancel_order/<?php echo $order_number;?>"method="POST"class="form">
            <div class="row">
              <div class="col-md-2">
                <button type="submit"class="btn btn-danger btn-md">Cancel Order</button>
              </div>
            </div>
          </form>
            </div>
            <div class="row"id="history">
              <?php 
            $pending_orders=$this->db->get_where('customer_orders',array('customer_id'=>$this->session->userdata('customer_id'),'order_confirmed'=>'YES','acknowledged'=>'YES','delivery_status'=>'Delivered'))->result();
            foreach($pending_orders as $r){
              $order_number=$r->order_num;
            }
            ?>
              <?php 
              if(count($pending_orders)!=0){
              ?>
              Your history is as follows:<br/>
              <table class="table table-bordered table-striped table-sm table-responsive"id="history_table">
                <tr><th>Order No.</th><th>Picture</th><th>Product Name</th><th>Quantity</th><th>Price</th><th>Total Price</th></tr>
              <?php  
                $cumm_price=0;
                $order_number=0;
                foreach($pending_orders as $r){
                  $prod=array();
                  $pic_url='';
                  $product_name='';
                  $order_number=$r->order_num;
                  $name=$this->db->get_where('products',array('id'=>$r->product_id))->result();
                  foreach($name as $n){
                    $product_name=$n->name;
                    $pic_url=$n->picture;
                    $prod=array('product_name'=>$product_name,'picture'=>$pic_url);

                  }
                  echo'<tr><td>'.$order_number.'</td><td>'.img(array('width'=>'80px','height'=>'50px','class'=>'img-fluid','src'=>'images/'.$prod['picture'])).'</td><td>'.$prod['product_name'].'</td><td>'.$r->quantity.'</td><td>'.$r->price.'</td><td>'.$r->price*$r->quantity.'</td></tr>';
                  $cumm_price+=$r->price*$r->quantity;
                }
                echo '';
              }else{
                echo'<p>You have no order history. Make one? <a href="http://localhost/legrand">Yes</a>&nbsp;</p>';
              }
              ?>
              <br/>
            
          </table>
            </div>
          </div>
          <div id="profile"class="container"></div>
          <div id="messages"class="container"></div>
        </div>
    </div>
    </body>
</html>
<script type="text/javascript">
$(document).ready(function() { 
  //$('#history,#messages,#profile').hide();
  $('v_orders').click(function(){
    $('#history,#messages,#profile').slideUp('900','linear');
    $('#orders').slideDown('900','linear');
    $('#li_me,#li_pr,#li_hi').removeClass('active');
    $(this).addClass('active');
  });
  $('v_messages').click(function(){
    alert('a');
    $('#history,#orders,#profile').slideUp('900','linear');
    $('#messages').slideDown('900','linear');
    $('#li_or,#li_pr,#li_hi').removeClass('active');
    $(this).addClass('active');
  });
  $('v_history').click(function(){
    $('#messages,#orders,#profile').slideUp('900','linear');
    $('#history').slideDown('900','linear');
    $('#li_or,#li_pr,#li_me').removeClass('active');
    $(this).addClass('active');
  });
  $('v_profile').click(function(){
    $('#history,#orders,#messages').slideUp('900','linear');
    $('#profile').slideDown('900','linear');
    $('#li_or,#li_me,#li_hi').removeClass('active');
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
body {
          padding-top: 50px;
          position: relative;
          height: 100%
      }
#main{
    background: #fff;
    width: 100%;

}      
.main_content{
    min-height: 680px;
    padding: 20px;
}
.side_nav{
    border-right: solid 2px rgba(0,0,0,0.5);
    padding-left: 0;
    padding-right: 0;
    padding-top: 20px;
    padding-bottom: 20px;

}
.side_nav ul{
    list-style: none;
    width: 100%;
    margin: 0;
    left: 0;
    padding-left: 0;
    padding-right: 0;
}
.side_nav ul li{
    margin-bottom: 5px;
    padding-left: 20px;
    padding-right: 20px;
}
.side_nav ul li a{
    padding-left: 10px;
    padding-right: 10px;
    text-decoration: none;
    color: #000;
}
.side_nav ul li a:hover{
    text-decoration: underline;
    color: rgba(0,0,0,0.5);
}
#pending_table,#history_table{
  width: 90%;
}
      pre {
          tab-size: 8;
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
          .side_nav{
            border-right: hidden;
            padding-left: 20px;
            padding-right: 0;
            padding-top: 10px;
            padding-bottom: 10px;
            position: fixed;
            z-index: 10;
          }
          .side_nav ul{
            list-style: none;
            width: 100%;
            height: 100%;
            margin: 0;
            left: 0;
            padding-left: 0;
            padding-right: 0;
            background: rgba(255,255,255);
          }
          .side_nav ul li{
            height: 100%;
            display: inline;
            margin-bottom: 5px;
            padding: 5px;
            
          }
          .side_nav ul li a{
            width: 100%;
            height: 100%;
            padding: 5px;
            text-decoration: none;
            color: #fff;
            font-size: 11px;
            background: rgba(0,0,0,0.7);
          }   
          .side_nav ul li a:hover{
            color: rgba(0,0,0,0.7);
            background: #fff;
          }  
          .main_content{
            padding-top: 50px;
          } 
      } 
</style>
