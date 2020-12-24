<?php 
include "header.php";
include "config.php";

 ?>

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>Our Packages</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  

     <!--::exclusive_item_part start::-->
      <section class="blog_item_section blog_section section_padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="section_tittle">
                        <h2>Choose A Plan</h2>
                    </div>
                </div>
            </div>

            <div class="row">
<?php 
  $query="SELECT *FROM package ORDER BY id";
  $result=mysqli_query($conn,$query);
  $count=mysqli_num_rows($result);
  if($count>0){
     while($row=mysqli_fetch_assoc($result)){
    $row['packname'];
    $row['price'];
    $row['image'];
        
?>

                <div class="col-sm-6 col-lg-4">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                           <img src="admin/upload/<?php echo$row['image'];?>" alt="">
                        </div>
                        <div class="single_blog_text">
                          
                            <h4><strong> <?php echo $row['packname'];?>  </strong> </h4>
                            <h4> <strong>  <?php echo $row['price'];?></strong> TK / MEAL </h4>
                            <a href="#" class="btn_3">Read More <img src="img/icon/left_1.svg" alt=""></a>
                            <br>

                            <a href="order.php?id=<?php echo $row['id'];?>" class="btn_3">Select This Plan<img src="img/icon/left_1.svg" alt=""></a>
                        </div>
                    </div>
                </div>

 <?php }

  } ?>


            </div>
        </div>
    </section>
    <!--::exclusive_item_part end::-->



    <section class="intro_video_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro_video_iner text-center">
                        <h2>Expect The Best</h2>
                        <div class="intro_video_icon">
                            <a id="play-video_1" class="video-play-button popup-youtube"
                                href="https://www.youtube.com/watch?v=pBFQdxA-apI">
                                <span class="ti-control-play"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






   <?php include "footer.php"; ?>