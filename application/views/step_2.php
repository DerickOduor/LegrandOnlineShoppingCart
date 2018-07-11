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
    <div class="container main">
<?php 
if(!empty($this->session->userdata('customer_name'))){
  
?>
    
      <div class="row"id="steps">
        <div class="col-md-4 col-sm-4 col-xs-4 step"id="step1_">Step<br/>
          <a href="http://localhost/legrand/home/checkout"id="step1"disabled><span class=""><button type="button" class="btn btn-default btn-circle"><b>1</b></button></span></a>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4 step"id="step2_">Step<br/>
          <a href="#"id="step2"><span class=""><button type="button" class="btn btn-info btn-circle"><b>2</b></button></span></a>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4 step"id="step3_">Step<br/>
          <a href="#"id="step3"disabled><span class=""><button type="button" class="btn btn-default btn-circle"><b>3</b></button></span></a>
        </div>
      </div>
      
      <div class="container"id="payment">
        <div class="panel panel-info">
          <div class="panel-heading">Payment option</div>
          <div class="panel-body">
            <p>
            Choose your payment method:<br/><br/>
            <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
              <label class="radio-inline"id="mpesa_c">
                <input type="radio" name="optradio"><?php echo img(array('max-width'=>'100%','height'=>'40px','src'=>'images/mpesa2.jpg','alt'=>'M-Pesa'))?>
              </label>
              </div>
              <div class="col-md-4 col-sm-12 col-xs-12">
              <label class="radio-inline"id="paypal_c">
                <input type="radio" name="optradio"><?php echo img(array('max-width'=>'100%','height'=>'40px','src'=>'images/paypal.jpg','alt'=>'Paypal'))?>
              </label>
              </div>
              <div class="col-md-4 col-sm-12 col-xs-12">
              <label class="radio-inline"id="pesapal_c">
                <input type="radio" name="optradio"><?php echo img(array('max-width'=>'100%','height'=>'40px','src'=>'images/pesapal.png','alt'=>'Pesapal'))?>
              </label>
              </div>
              </div>
            </p>
            <div class="container"id="mpesa">
              Paybill No.:&nbsp;&nbsp;XXXXXX<br/>
              Account is your phone number.<br/><br/>
              <form action="http://localhost/legrand/home/transaction/<?php echo $this->session->userdata('customer_id');?>"method="POST"class="form">
                <div class="row">
                  <div class="form-group col-md-3">
                    <label class="control-label"for="trxno">Enter the transaction no.</label>
                    <input type="text"name="trxno"class="form-control"placeholder="Transaction no."required />
                  </div>
                </div>
                <div class="row">  
                  <div class="form-group col-md-3">
                    <button type="submit"class="btn btn-info">Submit</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="jumbotron"id="paypal">
              <div class="container">
                This module is under development.
              </div>
            </div>
            <div class="jumbotron"id="pesapal">
              <div class="container">
                This module is under development.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  
      
<?php 
}else{
  redirect('http://localhost/legrand/home/go_login_c/c');
}
?>
    </div>


</body>
</html>
<script type="text/javascript">
$(document).ready(function() { 
  $('#mpesa').hide();
  $('#pesapal').hide();
  $('#paypal').hide();
  $('#mpesa_c').click(function(){
    $('#mpesa').fadeIn('fast','linear');
    $('#pesapal').fadeOut('fast','linear');
    $('#paypal').fadeOut('fast','linear');
    $('#pesapal_c').attr('checked',false);
    $('#paypal_c').attr('checked',false);
  });
  $('#pesapal_c').click(function(){
    $('#mpesa').fadeOut('fast','linear');
    $('#pesapal').fadeIn('fast','linear');
    $('#paypal').fadeOut('fast','linear');
    $('#mpesa_c').prop('checked',false);
    $('#paypal_c').prop('checked',false);
  });
  $('#paypal_c').click(function(){
    $('#mpesa').fadeOut('fast','linear');
    $('#pesapal').fadeOut('fast','linear');
    $('#paypal').fadeIn('fast','linear');
    $('#pesapal_c').prop('checked',false);
    $('#mpesa_c').prop('checked',false);
  });
    $('#step2').click(function(){
      $('#payment').slideDown('fast','linear');
      $('#address').slideUp('fast','linear');
      $('#confirm_order').slideUp('fast','linear');
    });
    $('#step1').click(function(){
      /*$('#payment').slideUp('fast','linear');
      $('#address').slideDown('fast','linear');
      $('#confirm_order').slideUp('fast','linear');
      $(this).addClass('active');*/
    });
    $('#step3').click(function(){
      /*$('#payment').slideUp('fast','linear');
      $('#address').slideUp('fast','linear');
      $('#confirm_order').slideDown('fast','linear');
      $(this).addClass('active');*/
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
      #mpesa,#pesapal,#paypal{
        padding:10px;
        margin: 20px;
        font-size:  16px;
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
