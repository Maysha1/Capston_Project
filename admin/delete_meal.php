<?php 
include'config.php';
$meal_id=$_GET['id'];
 $query="DELETE FROM meal WHERE id='{$meal_id}'";
 $result=mysqli_query($conn,$query) or die("Query Failed");
 if($result){
  	header("location:meal.php");
  } 
 ?>