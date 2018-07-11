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
        <link rel="stylesheet" href="http://localhost/derick/index.php/../css/style1.css"/>
        <link rel="stylesheet" href="http://localhost/derick/index.php/../font-awesome/css/font-awesome.css"/>
        <link rel="stylesheet" href="http://localhost/derick/index.php/../font-awesome/font/fontawesome-webfont.eot"/>
        <link rel="stylesheet" href="http://localhost/derick/index.php/../font-awesome/font/fontawesome-webfont.svg"/>
        <link rel="stylesheet" href="http://localhost/derick/index.php/../font-awesome/font/fontawesome-webfont.ttf"/>
        <link rel="stylesheet" href="http://localhost/derick/index.php/../font-awesome/font/fontawesome-webfont.woff"/>
        <link rel="stylesheet" href="http://localhost/derick/index.php/../font-awesome/font/fontawesome-webfont.wff2"/>
        <link rel="stylesheet" href="http://localhost/derick/index.php/../font-awesome/font/fontawesome-webfont.otf"/>
        <link rel="stylesheet" href="http://localhost/derick/index.php/../font-awesome/font/fontawesome-webfont.eot"/>
        <link rel="stylesheet" href="http://localhost/derick/index.php/../font-awesome/scss/_animated.scss"/>
        <link rel="stylesheet" href="http://localhost/derick/index.php/../font-awesome/scss/font-awesome.scss"/>
        
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
<li><a href="http://localhost/derick/"><span class="fa fa-home"></span>&nbsp;Home</a></li>
<li><a href="http://localhost/derick/index.php/home/services"><span class="fa fa-wrench"></span>&nbsp;Services</a></li>
<li><a href="http://localhost/derick/index.php/home/skills">My skills</a></li>
<li><a href="http://localhost/derick/index.php/home/contacts"><span class="icon-rocket"></span>Contacts</a></li>
</nav>
</header>
       <div class="container"id="section">
        <div class="row row-cont">
            
                <div class="col-sm-3 contact"><span class="fa fa-envelope-o" aria-hidden="true"></span><br/>Email address <br/>oduorderick@gmail.com</div>
                <div class="col-sm-3 contact"><span class="fa fa-phone" aria-hidden="true"></span><br/>Phone <br/>0715812661</div>
                <div class="col-sm-3 contact"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span><br/>Address <br/></div>
                <div class="col-sm-3 contact"><br/>Fax <br/></div>
               
        </div>
        <div class="container contact_form_div">
            <form name=""method="POST"action="msg.php"class="form"id="v_form">
                <div class="container"id="warn"></div>
                <div class="container talk">
                    <b>Talk to me</b><br/>
                </div>
                <div class="container warning"></div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="v_name"class="control-label">Your name</label>
                            <input type="text"class="form-control"name="v_name"placeholder="Your name"id="v_name"required/>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="v_email"class="control-label">Your e-mail</label>
                            <input type="text"class="form-control"name="v_email"placeholder="E-mail"id="v_email"required/>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="v_subject"class="control-label">Subject</label>
                            <input type="text"class="form-control"name="v_subject"placeholder="subject"id="v_sub"required/>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="form-group">
                        <label for="v_msg"class="control-label">Your message</label>
                        <textarea type="text"name="v_msg"class="form-control"id="v_msg"rows="5"required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit"value="Submit"class="btn btn-info"id="submit"placeholder="Your message"/>
                    </div>
                </div>
            </form>
        </div>
        <div class=" container col"id="social_div">
            <div class="row soc-row"><span class="fa fa-facebook social" aria-hidden="true"></span><span class="soc_name">Facebook/Derick Oduor</span></div>
            <div class="row soc-row"><span class="fa fa-twitter social" aria-hidden="true"></span><span class="soc_name">Twitter/oduor_derroh</span></div>
            <div class="row  soc-row"><span class="fa fa-instagram social" aria-hidden="true"></span><span class="soc_name">Instagram/derick_oduor</span></div>
        </div>
        </div>
        <?php
        // put your code here
        ?>
        <footer>
            <div class="container">
            <ul class="nav navbar-nav"id="footer_nav">
              <li><a href="http://localhost/derick/"><span class="icon-house"></span>Home</a></li>
<li><a href="http://localhost/derick/index.php/home/services"><span class="icon-suitcase"></span>Services</a></li>
<li><a href="http://localhost/derick/index.php/home/skills">My skills</a></li>
<li><a href="http://localhost/derick/index.php/home/contacts"><span class="icon-rocket"></span>Contacts</a></li>
            </ul>
            </div>
        </footer>
	</body>
</html>
<script type="text/javascript">
    $(function(){
        //alert('ready');
        var contador=1;
    //function main(){
        $('#show_menu').click(function(){
            //$('nav').toggle();
            if(contador==1){
                $('#section').css('margin-top','170px');
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
        $('#v_form').on('submit',function(e){
            e.preventDefault();
            $('#warn').html('');
            var sender=$('#v_name').val();
            var message=$('#v_msg').val();
            var email=$('#v_email').val();
            var subject=$('#v_sub').val();

            var r_email=/([\w\-]+\@[\w\-]+\.[\w\-]+)/;
            var r_email2=/([\w\-]+\@[\w\-]+\.[\w\-]+\.[\w\-]+)/;
            if(sender==''||email==''||subject==''||message==''){
                $('#warn').html('Please fill in all the fields');
            }else{
                var form_data=$('#v_form').serialize();
                //alert(form_data);
                $.ajax({
                    url:'http://localhost/derick/index.php/home/send_message',
                    type:'POST',
                    data:form_data,
                    success:function(msg){
                        $('#v_form')[0].reset();
                        alert(msg);
                    },
                    error:function(){
                        alert('Something went wrong!');
                    }
                });
            }
        });
    });
</script>
<style type="text/css">
body {
    position: relative;
}
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
#section{
    
}      
pre {
    tab-size: 8;
}
.control-label{
    color:#00CCFF;
    font-family: tahoma;
    font-size: 20px;
}      
@media screen and (max-width: 768px) {
   header{
        width: 100%;
        margin-top: 0px;
    }
    header .menu_bar{
        display: block;
        width: 100%;
        height: 50px;
        background: #024959;    
    }
    .menu_space{
        margin-top: 170px;
    }
    #show_menu{
        background: #024959;
    }
    #show_menu:hover{
        background: #ffffff;
        color: #024959;
    }
    header nav{
        width:100%;
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