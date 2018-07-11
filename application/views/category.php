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
              <li class="active"><a href="http://localhost/legrand/"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
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

    <div class="container main">
      <?php 
      /*$products=$this->db->get_where('products',array('tag'=>'Phone'))->result();
      print_r($products);*/
      if(empty($res)){
        print_r($res);
        echo'empty';
      }else{
        
        ?>
        <form action="http://localhost/legrand/home/search_product"method="POST"id="search_form">
        <div class="input-group">
            <input type="text" class="form-control" name="product_name"placeholder="Search for..."required/>
            <span class="input-group-btn">
              <button class="btn btn-info" type="submit"id="search_btn"><span class="glyphicon glyphicon-search"></span></button>
            </span>
        </div> 
        <div id="err_msg"></div>
        </form> 
        <div class="container section">  
        <?php
        echo'<div class="row"><legend></legend>';
        foreach($res as $r){
          //if($r->tag=='Phone'){
            echo'<div class="col-md-2 col-sm-6 col-xs-12 item"><div class="name"><a href="http://localhost/leGrand/index.php/home/view_product/'.$r->id.'">'.$r->name.'</a></div><div><a href="http://localhost/leGrand/index.php/home/view_product/'.$r->id.'">'.img(array('max-width'=>'100%','height'=>'80px','class'=>'img rounded mx-auto d-block','src'=>'images/'.$r->picture)).'</a></div><div style="color:red"><b>Kes.'.$r->price.'</b></div><div><a href="http://localhost/LeGrand/index.php/home/view_product/'.$r->id.'"><button class="btn btn-success buy_btn"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Buy</button></a></div></div>';
          //}
          
        }
        echo'</div>';
      }
      ?>
    </div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function() {   
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
      .img{
        margin: auto;
      }
      .buy_btn{}
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
      .equal-height{
        display: flex;
        flex-wrap: wrap;
      }
      .row.equal-height > [class*='col-'] > .thumbnail > img {
        height: 100px; /* force image's height */

        /* force image fit inside it's "box" */
        -webkit-object-fit: cover;
           -moz-object-fit: cover;
            -ms-object-fit: cover;
             -o-object-fit: cover;
                object-fit: cover;
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
