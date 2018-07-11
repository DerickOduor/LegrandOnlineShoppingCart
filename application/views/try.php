<!DOCTYPE html>
<html>
<head>
	<title>Derick Oduor</title>
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
    <nav class="menu">
        <ul class="clearfix">
            <li><a href="#">Home</a></li>
            <li>
                <a href="#">Movies <span class="arrow">&#9660;</span></a>
 
                <ul class="sub-menu">
                    <li><a href="#">In Cinemas Now</a></li>
                    <li><a href="#">Coming Soon</a></li>
                    <li><a href="#">On DVD/Blu-ray</a></li>
                    <li><a href="#">Showtimes &amp; Tickets</a></li>
                </ul>
            </li>
            <li><a href="#">T.V. Shows</a></li>
            <li class="current-item"><a href="#">Photos</a></li>
            <li><a href="#">Site Help</a></li>
        </ul>
    </nav>
</header>
</body>
</html>
<script type="text/javascript">
	$(function(){
	
	var contador=1;
	//function main(){
		$('#show_menu').click(function(){
			//$('nav').toggle();
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
			}
		});
	//}
});
</script>
<style type="text/css">
body {
    }
 
.clearfix:after {
    display:block;
    clear:both;
}
 
/*----- Menu Outline -----*/
.menu-wrap {
    width:100%;
    box-shadow:0px 1px 3px rgba(0,0,0,0.2);
    background:#3e3436;
}
 
.menu {
    width:1000px;
    margin:0px auto;
}
 
.menu li {
    margin:0px;
    list-style:none;
    font-family:'Ek Mukta';
}
 
.menu a {
    transition:all linear 0.15s;
    color:#919191;
}
 
.menu li:hover > a, .menu .current-item > a {
    text-decoration:none;
    color:#be5b70;
}
 
.menu .arrow {
    font-size:11px;
    line-height:0%;
}
 
/*----- Top Level -----*/
.menu > ul > li {
    float:left;
    display:inline-block;
    position:relative;
    font-size:19px;
}
 
.menu > ul > li > a {
    padding:10px 40px;
    display:inline-block;
    text-shadow:0px 1px 0px rgba(0,0,0,0.4);
}
 
.menu > ul > li:hover > a, .menu > ul > .current-item > a {
    
}
 
/*----- Bottom Level -----*/
.menu li:hover .sub-menu {
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
 
.sub-menu li {
    display:block;
    font-size:16px;
}
 
.sub-menu li a {
    padding:10px 30px;
    display:block;
}
 
.sub-menu li a:hover, .sub-menu .current-item a {
    background:#3e3436;
}

</style>