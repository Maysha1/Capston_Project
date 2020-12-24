<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Package</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add_package.php">Add Packages</a>
              </div>
              <div class="col-md-12">
<?php 
  include'config.php';
  $limit=3;
  if(isset($_GET['page'])){
    $page_number=$_GET['page'];
  }
  else{
    $page_number=1;
  }
  
  $offset=($page_number-1)*$limit;
  $query="SELECT *FROM package ORDER BY id ASC LIMIT {$offset},{$limit}";
  $result=mysqli_query($conn,$query);
  $count=mysqli_num_rows($result);
  if($count>0){

   ?>                
                  <table class="content-table">
                      <thead>
                          <th>Package ID</th>
                          <th>Package Name</th>
                          <th>Price</th>
                          <th>Picture</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
<?php 
  while($row=mysqli_fetch_assoc($result)){

?>                        
                          <tr>
                              <td><?php echo  $row['id']; ?></td>
                              <td><?php echo  $row['packname']; ?></td>
                              <td><?php echo  $row['price']; ?></td>
                              <td><img src="upload/<?php echo  $row['image']; ?>" alt="" width="75px" height="75px"></td>
                              <td class='edit'><a href='update_package.php?id=<?php echo $row['id'];?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a onclick="return confirm(
                              'Are you sure want to delete?')" href='delete_package.php?id=<?php echo  $row['id']; ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
<?php  } ?>
                      </tbody>
<?php  } ?>                      
                  </table>
<?php 
$query1="SELECT *FROM package";
$result1=mysqli_query($conn,$query1) OR die("failed");
if(mysqli_num_rows($result1)){
  $total_recoards=mysqli_num_rows($result1);
  $total_page=ceil($total_recoards/$limit);
  echo"<ul class='pagination admin-pagination'>";
  if($page_number>1){
    echo '<li><a href="package.php?page='.($page_number-1).'"><b><<</b></a></li>';
  }
  for($i=1; $i<=$total_page; $i++){
    if($i==$page_number){
      $active="active";
    }
    else{
      $active="";
    }
    echo'<li class='.$active.'><a href="package.php?page='.$i.'">'.$i.'</a></li>';
  }
  if($page_number<$total_page){
     echo '<li><a href="package.php?page='.($page_number+1).'"><b>>></b></a></li>';
  }
 
  echo"</ul>";
}

 ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
