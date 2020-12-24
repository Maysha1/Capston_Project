<?php
include "header.php";  
include'config.php';
if(isset($_POST['submit'])){
  $title=mysqli_real_escape_string($conn,$_POST['packname']);
  $venue=mysqli_real_escape_string($conn,$_POST['price']);
  if(isset($_FILES['fileToUpload'])){
    $errors=array();
    $file_name=$_FILES['fileToUpload']['name'];
    $file_size=$_FILES['fileToUpload']['size'];
    $file_tmp=$_FILES['fileToUpload']['tmp_name'];
    $file_type=$_FILES['fileToUpload']['type'];
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

  
  $query="INSERT INTO package (packname,price,image) VALUES('$title','$venue','$new_name')";
    $result=mysqli_query($conn,$query) or die("Query failed.");
    if($result){
      header("location:package.php");
    }
}
?>

  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add New Package Name</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="<?php $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="title">Package Name</label>
                          <input type="text" name="packname" class="form-control" autocomplete="off" required>
                      </div>
                      
                      <div class="form-group">
                          <label for="venue">Price</label>
                          <input type="number" name="price" class="form-control" autocomplete="off" required >

                      </div>
                     
                      <div class="form-group">
                          <label for="images">Package Image</label>
                          <input type="file" name="fileToUpload" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
