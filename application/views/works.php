<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<html>
	<head>
		<title>Derick</title>
		<!--<script type="text/javascript"src></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">-->
        <link rel="stylesheet" href="http://localhost/derick/index.php/../css/bootstrap.css"/>
        <link rel="stylesheet" href="http://localhost/derick/index.php/../font-awesome/css/font-awesome.css"/>
        <link rel="stylesheet" href="http://localhost/derick/index.php/../css/bootstrap.css"/>
        
        <link rel="stylesheet" href="http://localhost/derick/index.php/../css/style1.css"/>

        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->
        <script src="http://localhost/derick/index.php/../js/bootstrap.js"></script>

    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
    <script src="http://localhost/derick/index.php/../js/jquery.js"></script>
    <script src="http://localhost/derick/index.php/../js/script.js"></script>
	</head>
	<body>
    
<header>
<div class="menu_bar">
    <a href="#"class="bt-menu">
        <span class="icon-list2"><button id="show_menu"data-toggle="collapse-side" data-target=".side-collapse" data-target-2=".side-collapse-container" type="button" class="navbar-toggle pull-left"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></span>
    </a>
</div>
<nav>
<ul>
<li><a href="http://localhost/derick/"><span class="icon-house"></span>Home</a></li>
<li><a href="http://localhost/derick/index.php/home/services"><span class="icon-suitcase"></span>Services</a></li>
<li><a href="http://localhost/derick/index.php/home/skills">My skills</a></li>
<li><a href="http://localhost/derick/index.php/home/contacts"><span class="icon-rocket"></span>Contacts</a></li>
</ul>
</nav>
</header>
       <div class="container section">
           <ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="#">Home</a></li>
  <li role="presentation"><a href="#">Profile</a></li>
  <li role="presentation"><a href="#">Messages</a></li>
</ul>


<ul class="nav nav-pills">
  <li role="presentation" class="active"><a href="#">Home</a></li>
  <li role="presentation"><a href="#">Profile</a></li>
  <li role="presentation"><a href="#">Messages</a></li>
</ul>

<p class="navbar-text">Signed in as Mark Otto</p>


<p class="navbar-text navbar-right">Signed in as <a href="#" class="navbar-link">Mark Otto</a></p>


<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data</li>
</ol>


<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning!</strong> Better check yourself, you're not looking too good.
</div>


<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
    30%
  </div>
</div>


<div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
    <span class="sr-only">45% Complete</span>
  </div>
</div>


<div class="row">
  <div class="col-lg-6">
    <div class="input-group">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
      <input type="text" class="form-control" placeholder="Search for...">
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-6">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="button">Go!</button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->



       </div>
	</body>
</html>
<script type="text/javascript">
   /* $(function(){
        //alert('ready');
        var sideslider = $('[data-toggle=collapse-side]');
        var sel = sideslider.attr('data-target');
        var sel2 = sideslider.attr('data-target-2');
        sideslider.click(function(event){
            $(sel).toggleClass('in');
            $(sel2).toggleClass('out');
        });
    });*/
</script>
<style type="text/css">
header{
    width:100%;
    margin-top: -20px;
}
header nav{
    width:100%;
    background:#024959;
}
.menu_bar{
    display:none;
}
header nav ul{
    overflow:hidden;
    list-style:none;
}
header nav ul li{
    float:left;
    padding-top: 20px;
} 
header nav ul li a{
    color:#fff;
    padding:20px;
    display:block;
    text-decoration:none;
}
header nav ul li span{
    margin-right:0px;
}
header nav ul li a:hover{
    color: rgba(255,255,255,0.7);
    background:#037E8C;
    text-decoration:none;
}
.section{

}      
pre {
    tab-size: 8;
}
      
@media screen and (max-width: 768px) {

    header{
        width: 100%;
    }
    header .menu_bar{
        display: block;
        width: 100%;
        height: 70px;
        background: #024959;    
    }
    .bt_menu{
        
    }
    #show_menu{
        background: #024959;
    }
    #show_menu:hover{
        background: #ffffff;
        color: #024959;
    }
    header nav{
        width:90%;
        left:-100%;
        margin:0;
        position:fixed;
        background: rgba(0, 128, 128,0.7);
    }
    header nav ul li{
        display:block;
        float:none;
        border-bottom:1px solid rgba(255,255,255,0.3);
        height: 40px;
        padding-top: 0px;
    }
    header nav ul li a{
        color:#fff;
        padding:10px;
        display:block;
        text-decoration:none;
    }
    header nav ul li a:hover{
        color: rgba(255,255,255,0.7);
        background:#037E8C;
        text-decoration:none;
    }
    .menu_bar{
        display:block;
        width:100%;
        background:#ccc; 
    }
    .menu_bar .bt-menu{
        display:block;
        padding:20px;
        background:#024959; 
        color:#fff;
        text-decoration:none;
        font-weight:bold;
        font-size:25px;
        -webkit-box-sizing:border-box;
        -moz-box-sizing:border-box;
        box-sizing:border-box;
    }
    .menu_bar span{
        float:right;
        font-size:40px;
    }
   
    
}    
</style>
<script type="text/javascript">
    $(function(){
    
    var contador=1;
    //function main(){
        $('#show_menu').click(function(){
            //$('nav').toggle();
            $('#section').css('margin-top','170px');
            if(contador==1){
                $('nav').animate({
                    left:'0'
                });
                contador=0;
            }else{
                contador=1;
                $('nav').animate({
                    left:'-100%'
                });
                $('#section').css('margin-top','0px');
            }
        });
    //}
});
</script>