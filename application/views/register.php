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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script> 

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
        <a class="navbar-brand" href="http://localhost/legrand">Le Grand</a>
        <div class="navbar-header">
          <button data-toggle="collapse-side" data-target=".side-collapse" data-target-2=".side-collapse-container" type="button" class="navbar-toggle pull-left"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="navbar-inverse side-collapse in">
          <nav role="navigation" class="navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href="http://localhost/legrand/"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
              <li id="drop"><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span><span class="badge badge-default">0</span>&nbsp;Cart&nbsp;<span class="glyphicon glyphicon-menu-down"></span></a>
                <ul class="sub-menu">
                    <li><a href="#">Cart is empty</a></li>
                </ul>
              </li>
              <!--<li><a href="http://localhost/legrand/index.php/admin/orders"><span class="glyphicon glyphicon-wrench"></span>&nbsp;Orders</a></li>-->
              <?php 
              if(!empty($this->session->userdata('customer_name'))){
                echo'<li><a href="#"><span class="glyphicon glyphicon-globe"></span>&nbsp;Notifications</a></li>
              <li><a href="http://localhost/legrand/home/profile"><span class="glyphicon glyphicon-user"></span>&nbsp;'.$this->session->userdata('name').'</a></li>
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
      <form action="http://localhost/legrand/home/register"method="POST"class="form"autocomplete="off">
        <input type="hidden"name="device"value="web"/>
        <div class="">
        <div style="color:red"><?php echo $this->session->flashdata('err_msg')?></div>
        <div class="form-group user_div row">
          <label class="col-sm-2 col-form-label"for="username">Username</label>
          <div class="col-sm-5"><input type="text"name="username"id="username"class="form-control"placeholder="Username"required /></div><div class="user_err col-sm-3"></div>
        </div> 
        <div class="form-group password_div row">
          <label class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-5"><input type="password"name="password"id="password"class="form-control"placeholder="Password"required /></div><div class="col-sm-3 pass_err"></div>
        </div>
        <div class="form-group email_div row">
          <label class="col-sm-2 col-form-label">E-mail Address</label>
          <div class="col-sm-5"><input type="text"name="email"id="email"class="form-control"placeholder="E-mail"required /></div><div class="col-sm-3 email_err"></div>
        </div>
        <div class="form-group phone_div row">
          <label class="col-sm-2 col-form-label">Phone</label>
          <div class="col-sm-5"><input type="text"name="phone"id="phone"class="form-control"placeholder="Phone"required /></div><div class="col-sm-3 \ phone_err"></div>
        </div>
        <div class="form-group gender_div row">
          <label class="col-sm-2 col-form-label">Gender</label>
          <div class="col-sm-5"><select class="form-control"name="gender"id="gender"required>
            <option></option>
            <option>Male</option>
            <option>Female</option>
          </select></div><div class="col-sm-3 gender_err"></div>
        </div>
        <div class="form-group">
          <button type="submit"class="btn btn-info">Register</button>
        </div>
      </form>
    </div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){   
    var sideslider = $('[data-toggle=collapse-side]');
    var sel = sideslider.attr('data-target');
    var sel2 = sideslider.attr('data-target-2');
    sideslider.click(function(event){
        $(sel).toggleClass('in');
        $(sel2).toggleClass('out');
    });

    $('#username').on('focusout',function(){
      if(!(/^[a-zA-Z]*$/).test($('#username').val())){
        $('.user_div').addClass('has-warning');
        $('.user_err').html('Letters only no white spaces!').css('color','red');
        $('#username').addClass('form-control-warning');
      }else{
        $('.user_div').removeClass('has-warning');
        $('#username').removeClass('form-control-warning');
        $('.user_div').addClass('has-success');
        $('.user_err').html('');
        $('#username').addClass('form-control-success');
      }
    });
    $('#phone').on('focusout',function(){
      var phone=$('#phone').val();
      if(!(/^[0-9]*$/).test($('#phone').val())||phone.length!=10){
        $('.phone_div').addClass('has-warning');
        $('.phone_err').html('Invalid phone number!').css('color','red');
        $('#phone').addClass('form-control-warning');
      }else{
        $('.phone_div').removeClass('has-warning');
        $('#phone').removeClass('form-control-warning');
        $('.phone_div').addClass('has-success');
        $('.phone_err').html('');
        $('#phone').addClass('form-control-success');
      }
    });
    
    $('#email').on('focusout',function(){
      var password=$('#email').val();
      if(!(/([\w\-]+\@[\w\-]+\.[\w\-]+)/).test($('#email').val())){
        $('.email_div').addClass('has-warning');
        $('.email_err').html('Invalid E-mail!').css('color','red');
        $('#email').addClass('form-control-warning');
      }else{
        $('.email_div').removeClass('has-warning');
        $('#email').removeClass('form-control-warning');
        $('.email_div').addClass('has-success');
        $('.email_err').html('');
        $('#email').addClass('form-control-success');
      }
    });
    $('#password').on('focusout',function(){
      var password=$('#password').val();
      if(!(/([a-zA-Z0-9]+)/).test($('#password').val())){
        $('.password_div').addClass('has-warning');
        $('.pass_err').html('Invalid Password!').css('color','red');
        $('#email').addClass('form-control-warning');
      }else if(password.length<6){
        $('.password_div').addClass('has-warning');
        $('.pass_err').html('Invalid Password!').css('color','red');
        $('#email').addClass('form-control-warning');
      }else if(password.length>15){
        $('.password_div').addClass('has-warning');
        $('.pass_err').html('Invalid Password!').css('color','red');
        $('#email').addClass('form-control-warning');
      }else{
        $('.password_div').removeClass('has-warning');
        $('#password').removeClass('form-control-warning');
        $('.password_div').addClass('has-success');
        $('.pass_err').html('');
        $('#password').addClass('form-control-success');
      }
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
      .alert{
        line-height: 5px;
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
      } 
</style>
<!--<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span><span id="gender_err"></span></div>-->