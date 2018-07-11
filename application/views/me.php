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

        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->
        <script src="http://localhost/derick/index.php/../js/bootstrap.js"></script>

    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
    <script src="http://localhost/derick/index.php/../js/jquery.js"></script>
    <script src="http://localhost/derick/index.php/../js/script.js"></script>
    </head>
    <body>
       <!--<header role="banner" class="navbar navbar-fixed-top navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button data-toggle="collapse-side" data-target=".side-collapse" data-target-2=".side-collapse-container" type="button" class="navbar-toggle pull-left"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="navbar-inverse side-collapse in">
                <nav role="navigation" class="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="http://localhost/derick/index.php/home/me">Home</a></li>
                    </ul>
                </nav>
            </div>
        </div>
       </header>-->
       <header>
<div class="menu_bar">
    <a href="#"class="bt-menu">
        <span class="icon-list2"><button id="show_menu"data-toggle="collapse-side" data-target=".side-collapse" data-target-2=".side-collapse-container" type="button" class="navbar-toggle pull-left"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></span>
    </a>
</div>
<nav>
<ul>
<li><a href="http://localhost/derick/"><span class="icon-house"></span>Home</a></li>
</nav>
</header>
       <div class="container"id="mysection">
           <form action="http://localhost/derick/index.php/home/login"method="post"class="form"id="login"autocomplete="off">
               <input type="hidden"name="device"id="device"value="web"/>
               <div class="form-group">
                   <label class="control-label">Username</label>
                   <input type="text"name="username"id="username"class="form-control"required/>
               </div>
               <div class="form-group">
                   <label class="control-label">Password</label>
                   <input type="password"name="password"id="username"class="form-control"required/>
               </div>
               <div class="form-group">
                   <button type="submit"class="btn btn-info">Login</button>
               </div>
            
           </form>
       </div>
    </body>
</html>
<script type="text/javascript">
    $(function(){
    
    var contador=1;
    //function main(){
        $('#show_menu').click(function(){
            //$('nav').toggle();
            $('#mysection').css('margin-top','50px');
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
                $('#mysection').css('margin-top','1em');
            }
        });
    //}
    });
</script>
<style type="text/css">
body {
    position: relative;
}
      
pre {
    tab-size: 8;
}
#mysection{
    padding: 2em;
    margin-left: 30em;
    margin-right: 30em;
    margin-top: 1em;
    background: rgba(0,0,20,0.5);
}      
.control-label{
    color:#00CCFF;
    font-family: tahoma;
    font-size: 20px;
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
.section{

}      

@media screen and (max-width: 768px) {
    #mysection{
        padding: 0.5em;
        margin-left: 5em;
        margin-right: 5em;
        margin-top: 1em;
        background: rgba(0,0,20,0.5);
    }
    
}
@media screen and (max-width: 1048px) {
    #mysection{
        padding: 0.5em;
        margin-left: 5em;
        margin-right: 5em;
        margin-top: 1em;
        background: rgba(0,0,20,0.5);
    }
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