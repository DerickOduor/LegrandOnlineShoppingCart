<?php 
echo 'Try<br/>';
$res=$this->db->get('products')->result();
//phpinfo();
//ini_set('memory_limit','1024M');
echo memory_get_usage(). " bytes \n";
foreach($res as $r){
  echo $r->tag;
  $tag=$r->tag;
  
  if(isset($tags)){
    foreach($tags as $t){
      if($t!=$tag){
        array_push($tags, $tag);
      }
    }
  }else{
    $tags=array();
    array_push($tags, $tag);
  }
}        
print_r($tags);       
?>