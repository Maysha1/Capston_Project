<?php 
include "header.php";
include "config.php";



if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $add=$_POST['address'];
   $phn=$_POST['phn_num'];
   $meal=$_POST['meal_type'];
   $packname=$_POST['packname'];
   $date=$_POST['date'];
   $payment=$_POST['payment_type'];
   $trans=$_POST['trans_num'];



    
    $query="INSERT INTO orders (customer_name,address,phone_num,meal_type,package_name,date,payment_type,trans_id) VALUES('$name','$add','$phn','$meal','$packname','$date','$payment','$trans')";
    $result=mysqli_query($conn,$query) or die("Query failed.");
    if($result){
      echo "<script>
        alert('Congratulation!!! Your Order is Received');
        window.location.href='index.php';
        </script>";
        }
}

 ?>


   <!-- breadcrumb start-->
   <section class="breadcrumb breadcrumb_bg">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="breadcrumb_iner text-center">
                  <div class="breadcrumb_iner_item">
                     <h2>Stay Us & Give Order</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
<!--<h4>Beleave we provide best quality food. And we know that we take yours belives. Thanks for staying us.</h4>--> 



<section class="regervation_part section_padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="section_tittle">
                        <p>Reservation your Meal</p>
                        <h2>Complete those process</h2>
                    </div>
                </div>
            </div>

<?php 
include "config.php";
 $id=$_GET['id'];
  $query1="SELECT *FROM package WHERE id={$id}";
  $result1=mysqli_query($conn,$query1);
  $count=mysqli_num_rows($result1);
  if($count>0){
    while($row=mysqli_fetch_assoc($result1)){      
     $row['id'];
     $row['packname'];


?>


            <div class="row">
                <div class="col-lg-6">
                    <div class="regervation_part_iner">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="" name="name" placeholder="Name *" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="" name="address"
                                        placeholder="Address *" required>
                                       
                                </div>
                                     <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="pnone" name="phn_num" placeholder="Phone number *" required>
                                </div>



                                <div class="form-group col-md-6">
                                    <select class="form-control" id="Select" name="meal_type">
                                        <option value="0" selected> Meal Type*</option>
                                        <option value="Premium">Premium</option>
                                        <option value="Standerd"> Standerd</option>
                                    </select>
                                    
                                </div>

                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="" name="packname"
                                        value="<?php echo  $row['packname'];?>" >

                                </div>

                               
                                <div class="form-group col-md-6">
                                    <div class="input-group date">
                                       <input type="date" name="date" class="form-control" autocomplete="off" required>
                                    </div>
                                </div>

                               
                                <div class="form-group col-md-6">
                                    <select class="form-control" id="Select" name="payment_type">
                                        <option value="0" selected>Payment Type *</option>
                                        <option value="Bkash">Bkash</option>
                                        <option value="Nogod">Nagod</option>
                                                                             
                                    </select>
                                </div>
                                
                                 <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="" name="trans_num"
                                        placeholder="Transation Number *" required>
                                       
                                </div>


                            </div>


                            <div class="regerv_btn">
                                <input type="submit" name="submit" class="btn_4" value="conform" >
                            </div>
                        </form>
<?php 
    }
}
 ?>


              </div>
                </div>
            </div>
        </div>
    </section>
    <!--::regervation_part end::-->












  <?php include "footer.php"; ?>