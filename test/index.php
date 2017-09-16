<?php 

$data['a'] = "abc";
$callback= $_GET['callback'];
echo $callback.'('.json_encode($data).')';
exit;
 
?>