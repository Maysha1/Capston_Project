<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-7">
                  <h1 class="admin-heading">All Order</h1>
              </div>
              <div class="col-md-12">

  <?php 
  include'config.php';
  $limit=5;
  if(isset($_GET['page'])){
    $page_number=$_GET['page'];
  }
  else{
    $page_number=1;
  }
  
  $offset=($page_number-1)*$limit;
  $query="SELECT *FROM orders ORDER BY order_id ASC LIMIT {$offset},{$limit}";
  $result=mysqli_query($conn,$query);
  $count=mysqli_num_rows($result);
  if($count>0){

   ?>
                  <table class="content-table">
                      <thead>
                          <th>Order ID</th>
                          <th>Customer Name</th>
                          <th>Address</th>
                          <th>Phone Number</th>
                          <th>Meal Type</th>
                          <th>Package Name</th>
                          <th>Date</th>
                          <th>Payment Type</th>
                          <th>Transation Id</th>
                          <th>Action</th>

                      </thead>
                      <tbody>

  <?php 
  while($row=mysqli_fetch_assoc($result)){
    $row['order_id'];
    $row['customer_name'];
    $row['address'];
    $row['phone_num'];
    $row['meal_type'];
    $row['package_name'];
    $row['date'];
    $row['payment_type'];
    $row['trans_id'];
    
    
    ?>
                          <tr>
                              <td><?php echo  $row['order_id']; ?></td>
                              <td><?php echo  $row['customer_name']; ?></td>
                              <td><?php echo  $row['address']; ?></td>
                              <td><?php echo  $row['phone_num']; ?></td>
                              <td><?php echo  $row['meal_type']; ?></td>
                              <td><?php echo  $row['package_name']; ?></td>
                              <td><?php echo  $row['date']; ?></td>
                              <td><?php echo  $row['payment_type']; ?></td>
                              <td><?php echo  $row['trans_id']; ?></td>
                              <td class='delete'><a onclick="return confirm(
                              'Are you sure want to delete?')" href='delete_orders.php?order_id=<?php echo  $row['order_id']; ?>'><i class='fa fa-trash-o'></i></a></td>
                              
                          </tr>
  <?php  } ?>
                      </tbody>
  <?php } ?>
                  </table>
<?php 
$query1="SELECT *FROM orders";
$result1=mysqli_query($conn,$query1) OR die("failed");
if(mysqli_num_rows($result1)){
  $total_recoards=mysqli_num_rows($result1);
  $total_page=ceil($total_recoards/$limit);
  echo"<ul class='pagination admin-pagination'>";
  if($page_number>1){
    echo '<li><a href="orders.php?page='.($page_number-1).'"><b><<</b></a></li>';
  }
  for($i=1; $i<=$total_page; $i++){
    if($i==$page_number){
      $active="active";
    }
    else{
      $active="";
    }
    echo'<li class='.$active.'><a href="orders.php?page='.$i.'">'.$i.'</a></li>';
  }
  if($page_number<$total_page){
     echo '<li><a href="orders.php?page='.($page_number+1).'"><b>>></b></a></li>';
  }
 
  echo"</ul>";
}

 ?>
                  
                      <!--<li class="active"><a>1</a></li>-->
                  
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
