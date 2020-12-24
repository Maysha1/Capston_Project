<?php 
include'config.php';
$order_id=$_GET['order_id'];
 $query="DELETE FROM orders WHERE order_id='{$order_id}'";
 $result=mysqli_query($conn,$query) or die("Query Failed");
 if($result){
  	header("location:orders.php");
  } 
 ?>