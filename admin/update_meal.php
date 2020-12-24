<?php 
include "header.php";
include'config.php';
if(isset($_POST['submit'])){
  $id=mysqli_real_escape_string($conn,$_POST['id']);
  $mealname=mysqli_real_escape_string($conn,$_POST['mealname']);
  $price=mysqli_real_escape_string($conn,$_POST['price']);
  $description=mysqli_real_escape_string($conn,$_POST['description']);
  if(empty($_FILES['new-image']['name'])){
    $new_name=$_POST['old-image'];
  }
  else{
    $errors=array();
    $file_name=$_FILES['new-image']['name'];
    $file_size=$_FILES['new-image']['size'];
    $file_tmp=$_FILES['new-image']['tmp_name'];
    $file_type=$_FILES['new-image']['type'];
    $file_div=explode('.',$file_name);
    $file_ext=end($file_div);
    $extensions=array("jpeg","jpg","png");
    if(in_array($file_ext,$extensions)== false){
      $errors[]="This extension file not allowed, Please choose a JPG or JPEG or PNG file";
    }
    if($file_size>2097152){
      $errors[]="Maximum File size 2MB or Lower";
    }
    $new_name= time()."-".basename($file_name);
    $target="upload/".$new_name;
    if(empty($errors)==true){
      move_uploaded_file($file_tmp,$target);
    }else{
      print_r($errors);
      die();
    }
}

  $query="UPDATE meal SET mealname='{$mealname}',description='{$description}',price='{$price}',image='{$new_name}' WHERE id='{$id}'";
  $result=mysqli_query($conn,$query) or die("Query Failed");
  if($result){
    header("location:meal.php");
  } 
}

?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Our Meal</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">

<?php 
include'config.php';
  $id=$_GET['id'];
  $query1="SELECT *FROM meal WHERE id={$id}";
  $result1=mysqli_query($conn,$query1);
  $count=mysqli_num_rows($result1);
  if($count>0){
    while($row=mysqli_fetch_assoc($result1)){

 ?>        
        <!-- Form for show edit-->
        <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <input type="hidden" name="id"  class="form-control" value="<?php echo  $row['id']; ?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="title">Meal name</label>
                <input type="text" name="mealname"  class="form-control" id="exampleInputUsername" value="<?php echo  $row['mealname']; ?>">
            </div>
             <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description"  class="form-control" id="exampleInputUsername" value="<?php echo  $row['description']; ?>">
            </div>
           
           
            <div class="form-group">
                <label for="venue">Price</label>
                <input type="number" name="price"  class="form-control" id="exampleInputUsername" value="<?php echo  $row['price']; ?>">
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="new-image">
                <img  src="upload/<?php echo  $row['image']; ?>" height="150px">
                <input type="hidden" name="old-image" value="<?php echo  $row['image']; ?>">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->

<?php 
    }
}
 ?>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
