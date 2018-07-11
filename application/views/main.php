<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

if(!empty($this->session->userdata('name'))){
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

    <script src="http://localhost/sportssystem/index.php/../js/jquery.js"></script>
    <script src="http://localhost/sportssystem/index.php/../js/bootstrap.min.js"></script>
    <script src="http://localhost/sportssystem/index.php/../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="http://localhost/sportssystem/index.php/../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="http://localhost/sportssystem/index.php/../css/bootstrap-reboot.min.css"/>
    <link rel="stylesheet" href="http://localhost/sportssystem/index.php/../css/bootstrap-grid.min.css"/>
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
                        <li><a href="http://localhost/derick/index.php/home/main">Home</a></li>
                        <li id="seen"><a href="#notification" class="dropdown-toggle" data-toggle="dropdown-menu"><span class="glyphicon glyphicon-globe"></span>&nbsp;Notifications<span class="badge count"></span></a>
                            <ul class="dropdown-menu"></ul>
                        </li>
                        <li><a href="http://localhost/derick/index.php/home/logout">Logout</a></li>
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
<li><a href="http://localhost/derick/home/main"><span class="icon-house"></span>Home</a></li>
<li id="seen"><a href="#notification" class="dropdown-toggle" data-toggle="dropdown-menu"><span class="fa fa-globe"></span>&nbsp;Notifications<span class="badge count"></span></a>
                            <ul class="dropdown-menu"></ul>
                        </li>
                        <li><a href="http://localhost/derick/home/logout?device=web">Logout</a></li>
                        </ul>
</nav>
</header>
       <br/><br/>
       <div class="container"id="messages">
       <?php //print_r( $_SERVER );?>
       <table class="table table-striped table-bordered table-responsive table-hover"id="msg_table">
       <?php
        foreach($res as $r){
            echo'<tr><td><a href="#"class="view_msg"id="'.$r->id.'">'.$r->sender.'</a></td><td><a href="#"class="view_msg"id="'.$r->id.'">'.$r->date_sent.'</a></td><td><a href="#"class="view_msg"id="'.$r->id.'">'.$r->subject.'</a></td>';
            echo '</tr>';
        }
       ?> 
       </table>   
       </div>
       <div class="container"id="message"></div>
       <div class="window-popup">
            <div class="wp-content container">
                <h1>Reply Message<span style="float: right;color:red;"id="button-popup-close"class="dialog_close">&times;</span></h1>
                <form action="http://localhost/derick/index.php/home/reply_message"method="post"id="reply_form">
                    <div class="error warn"></div>
                    <div class="form-group">
                       <label class="control-label">Recipent Name</label>
                       <input type="text" class="form-control"name="recipient"id="recipient"required/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Recipent E-mail Address</label>
                        <input type="text" class="form-control"id="recipient_email"name="recipient_email"required/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Subject</label>
                        <input type="text" class="form-control"id="subject"name="subject"required/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Message</label>
                        <textarea class="form-control"name="message"rows="5"required></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary"type="submit">Send</button>
                    </div>
                </form>
            </div>
        </div>
	</body>
</html>
<script type="text/javascript">
    $(function(){
        $('.warn').html('');
        get_messages();
        $('#message').hide();
        $('.view_msg').on('click',function(){
            var id=$(this).attr('id');
            $.ajax({
                url:'http://localhost/derick/index.php/home/view_message',
                type:'POST',
                data:{'id':id,'device':'web'},
                success:function(msg){
                    $('#message').html(msg);
                    $('#messages').hide();
                    $('#message').show();
                    $('#back').on('click',function(){
                        $('#messages').show();
                        $('#message').hide();
                    });
                    $('#button-popup').click(function(){
                        $('.window-popup').fadeIn('slow');
                        var recipient_name=$('.r_sender').attr('id');
                        var recipient_email=$('.r_email').attr('id');
                        var recipient_subject=$('.r_subject').attr('id');
                        //alert(recipient_name+' '+recipient_email+' '+recipient_subject);
                        $('#recipient').val(sender_name);
                        $('#recipient_email').html(recipient_email);
                    });
                    $('#button-popup-close').click(function(){
                        $('.window-popup').fadeOut("slow");
                    });
                },
                error:function(){
                    alert('Something went wrong!');
                }
            });
        });
        var contador=1;
    //function main(){
        $('#show_menu').click(function(){
            //$('nav').toggle();
            $('#mysection').css('margin-top','50px');
            $('#message').css('margin-top','90px');
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
                 $('#message').css('margin-top','1em');
            }
        });
        function get_messages(){
            $.ajax({
                url:'http://localhost/derick/index.php/home/get_messages',
                type:'POST',
                data:{'device':'web'},
                dataType:'json',
                success:function(msg){
                    var count=msg.count;
                    //var new_messages=msg.new_message;
                    if(count!=0){
                        $('.badge').html(msg.count);
                    }else{
                        $('.badge').html('');
                    }
                    $('.dropdown-menu').html(msg.output);
                    /*var message_rows=$('#msg_table tr td a');
                    for(i=0;i<message_rows.length;i++){
                        for(j=0;j<new_messages.length){
                            if(message_rows[i].attr('id')==new_messages)
                        }
                        
                    }*/
                    $('#msg_table').append(msg.new_message);
                    $('.dropdown-menu').append('<li><a href="">See more</a></li>');
                    //$('.count').html(data.unseen_notification);
                },
                error:function(){
                    alert('Something went wrong!');
                }
            });
        }
        setInterval(get_messages,10000);
        $('#seen').on('click',function(){
            var seen='web';
            $.ajax({
                url:'http://localhost/derick/index.php/home/notification_seen',
                type:'POST',
                data:{'device':seen},
                success:function(msg){
                    get_messages();
                    return false;
                },
                error:function(){
                    alert('Something went wrong!');
                }
            });
        });
        $('#button-popup').click(function(){
            $('.window-popup').fadeIn('slow');
        });
        $('#button-popup-close').click(function(){
            $('.window-popup').fadeOut("slow");
        });
        $('#reply_form').on('submit',function(e){
            e.preventDefault();
            $('.warn').html('');
            var r_email=/([\w\-]+\@[\w\-]+\.[\w\-]+)/;
            var recipient_email=$('#recipient_email').val();
            if(!r_email.test(recipient_email)){
                $('.warn').html('<b>Incorrect email formart!!</b>');
            }else{
                var message_details=$('#reply_form').serialize();
                var u=$('#reply_form').attr('action');
                var m=$('#reply_form').attr('method');
                $.ajax({
                    url:u,
                    type:m,
                    data:message_details,
                    success:function(msg){
                        if(msg=='Sent'){
                            alert('Message sent');
                        }else{
                            $('.warn').html(msg);
                        }
                        $('#reply_form')[0].reset();
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
.dialog_close{
    cursor: pointer;
}      
.warn{
    color:red;
}
pre {
    tab-size: 8;
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
#msg_table tr td a{
    text-decoration: none;
    color:#00CCFF;
}
#msg_table tr td a:hover{
    text-decoration: none;
    color:#00CCFF;
}
#message{
    background: rgba(255,255,255,0.7);
    padding: 2em;
    width:60%;
}
#h{

}  
.window-popup{
    width:100%;
    height:100%;
    position:fixed;
    z-index:10;
    background:rgba(0,0,0,0.7);
    top:0;
    left:0;
    display:none;
}
.show_popup{
    display:block;
}
.wp-content{
    width:60%;
    height:550px;
    background:#ffffff;
    border-radius:3px;
    position:absolute;
    left:20%;
    right: 20%;
    top:10%;
    padding-left:20px;
    padding-right:20px;
}
.wp-content a{
    padding:10px;
    background:#3498db;
    color:#ffffff;
    text-decoration:none;
    position:absolute;
    right:20px;
    bottom:20px;
    border-radius:5px;
}
@media screen and (max-width: 768px) {
    .wp-content{
        width: 90%;
        height:550px;
        background:#ffffff;
        border-radius:3px;
        position:absolute;
        top:10%;
        left:5%;
        right: 5%;
        padding-left:20px;
        padding-right:20px;
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
    #message{
        width:100%;
        height:100%;
    }
}    
</style>
<?php
}else{
    redirect('http://localhost/derick/index.php/home/me');
}
?>