<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="http://localhost/derick/index.php/../css/bootstrap.css"/>
        
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->
        <script src="http://localhost/derick/index.php/../js/bootstrap.js"></script>

    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
    <script src="http://localhost/derick/index.php/../js/jquery.js"></script>
    <script src="http://localhost/derick/index.php/../js/script.js"></script>
</head>
<body>
<div class="container">
<?php 
	echo $this->session->flashdata('msg');
	echo form_open_multipart();
	echo form_upload('file');
	echo form_submit('upload','Upload');
	echo form_close();
?>
</div>
<div class="row">
	<?php 
	if($get_image->num_rows()>0){
		foreach($get_image->result() as $d){
			echo'<div class="col-lg-2">';
				echo'<span>'.img(array('width'=>'100','height'=>'70','src'=>'images/'.$d->file_name)).'</span>';
				echo'<span>'.anchor(base_url('images/'.$d->file_name),'View').' | '.anchor('image/delete_image/'.$d->file_name,'Delete').'</span>';
			echo '</div>'
			;
		}
	}else{
		echo'<div class="container">';
			echo'<span>Image is empty!</span>';
		echo'</div>';
	}
	?>
</div>
</body>
</html>