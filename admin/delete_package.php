<?php 
include'config.php';
$package_id=$_GET['id'];
 $query="DELETE FROM package WHERE id='{$package_id}'";
 $result=mysqli_query($conn,$query) or die("Query Failed");
 if($result){
  	header("location:package.php");
  } 
 ?>