<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$tags=array("","Shirts","Trousers","Sweaters");
$gender=array("","Unisex","Male","Female");
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
              <li id="drop"class="active"><a href="#"id="view_cart"><span class="glyphicon glyphicon-shopping-cart"></span><span class="badge badge-default"id="cart_qty">0</span>&nbsp;Cart&nbsp;<span class="glyphicon glyphicon-menu-down"></span></a>
                <!--<ul class="sub-menu">
                    <li id="cart_actions"><b><span id="view_cart_">View Cart</span><span id="check_out">Check out</span></b></li>
                </ul>-->
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

    <div class="container main">
      <?php 
      
        ?>
        
        <div class="container-fluid section">  
        
      <?php
      if(isset($_SESSION['cart'])){
        if(count($_SESSION['cart'])==0){
          echo 'No items in your cart. <a href="http://localhost/legrand">Go for shopping</a>';
        }else{
          echo '
                <div class="row"><div class="container col-md-2">
                  <button class="btn btn-danger"id="clear_cart_btn">Clear Cart</button>
                </div>
                <div class="container col-md-2 pull-right">
                  <a href="http://localhost/legrand/home/checkout"class="btn btn-primary">Check Out</a>
                </div>
                </div>';
          echo'<table class="table table-bordered"id="cart_items">';
          echo'<tr><th>Image</th><th>ID</th><th>Name</th><th>Quantity</th><th>Price</th><th>Action</th></tr>';
          $total_price=0;
          foreach($_SESSION['cart'] as $key=>$value){
            $cart_item=$this->db->get_where('products',array('id'=>$value['id']))->result();
            $quantity_=$value['quantity'];
            foreach($cart_item as $item){
              $total_price+=doubleval($item->price)*intval($quantity_);
              echo'<tr id="'.$item->id.'"><td id="item_pic">'.img(array('width'=>'100%','height'=>'50px','class'=>'img-fluid','src'=>'images/'.$item->picture)).'</td><td id="item_id">'.$value['id'].'</td><td id="item_name">'.$item->name.'</td><td id="item_qty"><form action="http://localhost/legrand/home/update_item_qty/'.$item->id.'/'.$item->price.'"method="POST"class="form update_qty"id="'.$item->id.'"><input type="number"name="qty"value="'.$value['quantity'].'"class="form-control"min="1"max="'.$item->quantity.'"id="'.$item->id.'"required/><button type="submit" class="btn btn-primary btn-sm update_btn"id="'.$item->id.'">Update</button></form></td><td id="item_price">Kshs. <span id="'.$item->id.'">'.doubleval($item->price)*intval($quantity_).'</span></td><td id="delete_item"><a href="#"class="btn btn-danger btn-sm delete_btn"id="'.$item->id.'">Remove&nbsp;<span class="glyphicon glyphicon-trash"></span></a></td></tr>';
            }
            
          }
          echo '<tr><td colspan="4"><b>Total Price</b></td><td style="color:red"><b>Kshs. <span id="total_price">'.$total_price.'</span></b></td></tr>';
          echo '</table>';
        }
      }
      ?>
      </div>
    </div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function() {  
    $('.update_btn').hide();
    $('.update_qty').find('input').focus(function(){
      $('.update_qty').find("button").slideUp('5000','linear');
      var id=$(this).attr('id')
      $('.update_qty').find("button#"+id).slideDown('5000','linear');
    });
    $('.update_qty').find('input').focusout(function(){
      $('.update_qty').find("button").slideUp('5000','linear');
    });
    $('.update_qty').on('submit',function(e){
      e.preventDefault();
      var btn_id=$(this).find('button').attr('id');
      var new_qty=$(this).serialize();
      var u=$(this).attr('action');
      var m=$(this).attr('method');
      //alert(new_qty);
      alert(btn_id+" "+new_qty);
      $.ajax({
        url:u,
        method:m,
        data:new_qty,
        success:function(msg){
          window.open('http://localhost/legrand/home/view_cart','_self');
          /*alert(msg);
          get_cart_items();
          var cart_qty=0;
            var total_price=0;
            var p,q=0;
            $.each(msg.cart, function(i,post){
              if(post.id==btn_id){
                alert('Found');
                p=parseInt(post.price);
                q=parseInt(post.quantity);
              }else{
                alert('Not');
              }
              //cart_qty++;
              //price=
              //total_price+=parseInt(post.price)*parseInt(post.quantity);
              //$('.cart_error').append(i);
              //$('.sub-menu').append('<li><a href="#">'+post.id+' '+post.price+'</a></li>');
              //$('#total_price').html(total_price);
              //$('span#'+btn_id).html(parseInt(post.price)*parseInt(post.quantity));
              //alert(parseInt(post.price)*parseInt(post.quantity));
            });
            $('span#'+btn_id).html(p*q);*/
            //$('#cart_qty').html(cart_qty);
        },
        error:function(){
          alert('Something went wrong!');
        }
      });
    });
    $('.delete_btn').on('click',function(){
      var id=$(this).attr('id');
      //alert(id);
      $.ajax({
        url:'http://localhost/legrand/home/remove_cart_item',
        method:'POST',
        data:{'id':id},
        success:function(msg){
          //alert(msg);
          if(msg=='Deleted'){
            //$('tr#'+id).slideUp('5000','linear');
            $('tr#'+id).remove();
            get_cart_items();
            if($('table tr').length==2){
              $('.section').html('No items in your cart. <a href="http://localhost/legrand">Go for shopping</a>');
              get_cart_items();
            }
          }
        },
        error:function(){
          alert('Something went wrong!');
        }
      });
    });
    
    $('#clear_cart_btn').on('click',function(){
      var clear_cart=true;
      $.ajax({
        url:'http://localhost/legrand/home/clear_cart',
        method:'POST',
        data:{'clear':clear_cart},
        success:function(msg){
          alert(msg);
          $('.sub-menu').html('<li id="cart_actions"><b><span id="view_cart_">View Cart</span><span id="check_out">Check out</span></b></li>');
          $('#cart_qty').html('');
          $('#cart_items').html('');
          $('#clear_cart_btn').hide();
          window.open('http://localhost/legrand','_self');
        },
        error:function(){
          alert('Something went wrong!');
        }
      });
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
            var total_price=0;
            $.each(msg.cart, function(i,post){
              cart_qty++;
              //price=
              total_price+=parseInt(post.price)*parseInt(post.quantity);
              $('.cart_error').append(i);
              $('.sub-menu').append('<li><a href="#">'+post.id+' '+post.price+'</a></li>');
              $('#total_price').html(total_price);
              //$('#i_p').html(parseInt(post.price)*parseInt(post.quantity));
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
    $('#search_form').on('submit',function(e){
      e.preventDefault();
      var form_data=$('#search_form').serialize();
      var u=$('#search_form').attr('action');
      var m=$('#search_form').attr('method');
      $.ajax({
        url:u,
        method:m,
        data:form_data,
        success:function(msg){
          if(msg=='No match found'){
            $('#err_msg').html(msg);
          }else{
            $('.section').html(msg);
          }
        },
        error:function(){
          alert('Something went wrong!');
        }
      });
    });
});
</script>
<style type="text/css">
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
      .item{
        border: solid 1px rgba(0,0,0,0.2);
        padding: 5px;
      }
      .btn{
        width: 100%
      }
      .name{
        margin: 5px;
        font-family: tahoma;
      }
      .name a{
        text-decoration: none;
        color:#001f3f;
        font-size: 16px;
      }
      .input-group{
        width: 40%;
        margin-left: 30%;
        margin-right: 30%;
        margin-bottom: 20px;
      }
      #err_msg{
        width: 40%;
        margin-left: 30%;
        margin-right: 30%;
        margin-bottom: 5px;
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
      #item_id{
        width: 5%;
        text-align: center;
      }
      #item_name{
        width:30%;
      }
      #item_pic{
        width: 5%;
        padding: auto;
      }
      #item_price{
        width:10%;
      }
      #item_qty{
        width: 5%;
        text-align: center;
      }
      #clear_cart_btn{
        margin-bottom: 10px;
      }
      #delete_item{
        color: red;
        width:4%;
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
          .input-group{
            width: 80%;
            margin-left: 10%;
            margin-right: 10%;
          }
      } 
</style>
