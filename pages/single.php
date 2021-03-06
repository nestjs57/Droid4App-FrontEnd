<!DOCTYPE html>
<html>
<head>
<title>magExpress | Pages | Single</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="../assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="../assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
<!--[if lt IE 9]>
<script src="../assets/js/html5shiv.min.js"></script>
<script src="../assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<?php
session_start();
 ?>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
              <li><a href="../index.html">Home</a></li>
              <li><a href="page.html">About</a></li>
              <li><a href="contact.html">Contact</a></li>
              <li><a href="404.html">Error Page</a></li>
            </ul>
          </div>
          <div class="header_top_right">
            <form action="#" class="search_form">
              <input type="text" placeholder="Text to Search">
              <input type="submit" value="">
            </form>
          </div>
        </div>
        <div class="header_bottom">
          <div class="header_bottom_left"><a class="logo" href="../index.html">mag<strong>Express</strong> <span>A Pro Magazine Template</span></a></div>
          <div class="header_bottom_right"><a href="#"><img src="../images/addbanner_728x90_V1.jpg" alt=""></a></div>
        </div>
      </div>
    </div>
  </header>
  <div id="navarea">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav custom_nav">
            <li class=""><a href="../index.html">Home</a></li>
            <li class="dropdown"> <a href="#" class="" data-toggle="dropdown" role="button" aria-expanded="false">Archives</a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="archive-main.html">Archive</a></li>
                <li><a href="archive1.html">Archive 1</a></li>
                <li><a href="archive2.html">Archive 2</a></li>
                <li><a href="archive3.html">Archive 3</a></li>
              </ul>
            </li>
            <li><a href="single.html">Single page</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="404.html">404 page</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <section id="mainContent">
    <div class="content_bottom">
      <div class="col-lg-8 col-md-8">
        <div class="content_bottom_left">
          <div class="single_page_area">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li><a href="#">Technology</a></li>
              <li class="active">Duis quis erat non nunc fringilla </li>
            </ol>
            <h2 class="post_titile">
              <?php //หัวข้อข่าว
                require "../dbconnect.php";


                $sql = "SELECT * FROM data_post WHERE post_id='$_GET[id]'";
                $query = mysqli_query($DBConect,$sql);
                $row = mysqli_fetch_assoc($query);
                echo $row['post_name'];


                $post_type = $row['post_type'];

                if ($post_type==1) {
                  $href = "category_game.php";
                  $tag = "เกม";
                }
                if ($post_type==2) {
                  $href = "category_photo.php";
                  $tag = "รูปภาพและวิดิโอ";
                }
                if ($post_type==3) {
                  $href = "category_entertrain.php";
                  $tag = "บันเทิง";
                }
                if ($post_type==4) {
                  $href = "category_education.php";
                  $tag = "การศึกษา";
                }
                if ($post_type==5) {
                  $href = "category_other.php";
                  $tag = "อื่นๆ";
                }
                if ($post_type==6) {
                  $href = "category_android.php";
                  $tag = "มือถือแอนดรอยด์";
                }
                echo "</h2>";
                echo "<div class='single_page_content'>";
                echo "<div class='post_commentbox'> <a href=''><i class='fa fa-user'></i>โดย ".$row['post_by']."</a> <span><i class='fa fa-calendar'></i>".$row['post_day']."/".$row['post_month']."/".$row['post_year']."</span> <a href='".$href."'><i class='fa fa-tags'></i>".$tag."</a> </div>";

                ?>

              <?php
                require "../dbconnect.php";
                $sql = "SELECT * FROM data_post WHERE post_id = '$_GET[id]'";
                $query = mysqli_query($DBConect,$sql);
                $row = mysqli_fetch_assoc($query);

                echo "<img class='img-center' src='../images/".$row['post_img']."' alt=''><br>";

              ?>

              <?php

              require "../dbconnect.php";
              echo "<p>";
                  $sql = "SELECT * FROM data_detailpost WHERE post_id = '$_GET[id]' ";
                  $query = mysqli_query($DBConect,$sql);
                  while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
                  {
                    $detail = $row['detailpost_detail'];
                    //$img =  $row['detailpost_img'];



                    if (!empty($row['detailpost_detail'])) {
                      echo $detail."<br> <br>";
                    }
                    if (!empty($row['detailpost_img'])) {
                      echo "<img class='img-center' src='../images_detail/".$row['detailpost_img']."' alt=''><br>";
                    }


                  }


              echo "</p> ";

               ?>


              <?php

              require "../dbconnect.php";
              if (!empty($_SESSION['user'])) { //ถ้าเป็น Admin จะแสดง form เพิ่มข่าว
                # code...
                //echo "<h2>เพิ่มข้อมูล ( Admin )</h2>";
                echo "<form action='detailpost_insert.php?id=".$_GET['id']."' method='POST' enctype='multipart/form-data'>";
                echo  "<textarea class='form-control' name='detailpost' rows='5' id='comment'></textarea> <br>";

                echo  "<input type='file' class='custom-file-input' name='news_img'><br>";


                echo  "<input type='submit' value='เพิ่ม' class='btn btn-default'>";
                echo"</form>";
              }

              ?>

            </div>
          </div>
        </div>
        <div class="post_pagination">
          <div class="prev"> <a class="angle_left" href="#"><i class="fa fa-angle-double-left"></i></a>
            <div class="pagincontent"> <span>Previous Post</span> <a href="#">Aliquam quam orci in molestie a tempor nec</a> </div>
          </div>
          <div class="next">
            <div class="pagincontent"> <span>Next Post</span> <a href="#">Aliquam quam orci in molestie a tempor nec</a> </div>
            <a class="angle_right" href="#"><i class="fa fa-angle-double-right"></i></a> </div>
        </div>
        <div class="share_post"> <a class="facebook" href="#"><i class="fa fa-facebook"></i>Facebook</a> <a class="twitter" href="#"><i class="fa fa-twitter"></i>Twitter</a> <a class="googleplus" href="#"><i class="fa fa-google-plus"></i>Google+</a> <a class="linkedin" href="#"><i class="fa fa-linkedin"></i>LinkedIn</a> <a class="stumbleupon" href="#"><i class="fa fa-stumbleupon"></i>StumbleUpon</a> <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>Pinterest</a> </div>
        <div class="similar_post">
          <h2>Similar Post You May Like <i class="fa fa-thumbs-o-up"></i></h2>
          <ul class="small_catg similar_nav wow fadeInDown animated">
            <li>
              <div class="media wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"> <a class="media-left related-img" href="#"><img src="../images/112x112.jpg" alt=""></a>
                <div class="media-body">
                  <h4 class="media-heading"><a href="#">Duis condimentum nunc pretium lobortis </a></h4>
                  <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra </p>
                </div>
              </div>
            </li>
            <li>
              <div class="media wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"> <a class="media-left related-img" href="#"><img src="../images/112x112.jpg" alt=""></a>
                <div class="media-body">
                  <h4 class="media-heading"><a href="#">Duis condimentum nunc pretium lobortis </a></h4>
                  <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra </p>
                </div>
              </div>
            </li>
            <li>
              <div class="media wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"> <a class="media-left related-img" href="#"><img src="../images/112x112.jpg" alt=""></a>
                <div class="media-body">
                  <h4 class="media-heading"><a href="#">Duis condimentum nunc pretium lobortis </a></h4>
                  <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra </p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="content_bottom_right">
          <div class="single_bottom_rightbar">
            <h2>Recent Post</h2>
            <ul class="small_catg popular_catg wow fadeInDown">
              <li>
                <div class="media wow fadeInDown"> <a href="#" class="media-left"><img alt="" src="../images/112x112.jpg"> </a>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="#">Duis condimentum nunc pretium lobortis </a></h4>
                    <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra </p>
                  </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="#" class="media-left"><img alt="" src="../images/112x112.jpg"> </a>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="#">Duis condimentum nunc pretium lobortis </a></h4>
                    <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra </p>
                  </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="#" class="media-left"><img alt="" src="../images/112x112.jpg"> </a>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="#">Duis condimentum nunc pretium lobortis </a></h4>
                    <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra </p>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="single_bottom_rightbar">
            <ul role="tablist" class="nav nav-tabs custom-tabs">
              <li class="active" role="presentation"><a data-toggle="tab" role="tab" aria-controls="home" href="#mostPopular">Most Popular</a></li>
              <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="messages" href="#recentComent">Recent Comment</a></li>
            </ul>
            <div class="tab-content">
              <div id="mostPopular" class="tab-pane fade in active" role="tabpanel">
                <ul class="small_catg popular_catg wow fadeInDown">
                  <li>
                    <div class="media wow fadeInDown"> <a class="media-left" href="#"><img src="../images/112x112.jpg" alt=""></a>
                      <div class="media-body">
                        <h4 class="media-heading"><a href="#">Duis condimentum nunc pretium lobortis </a></h4>
                        <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra </p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a class="media-left" href="#"><img src="../images/112x112.jpg" alt=""></a>
                      <div class="media-body">
                        <h4 class="media-heading"><a href="#">Duis condimentum nunc pretium lobortis </a></h4>
                        <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra </p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a class="media-left" href="#"><img src="../images/112x112.jpg" alt=""></a>
                      <div class="media-body">
                        <h4 class="media-heading"><a href="#">Duis condimentum nunc pretium lobortis </a></h4>
                        <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra </p>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <div id="recentComent" class="tab-pane fade" role="tabpanel">
                <ul class="small_catg popular_catg">
                  <li>
                    <div class="media wow fadeInDown"> <a class="media-left" href="#"><img src="../images/112x112.jpg" alt=""></a>
                      <div class="media-body">
                        <h4 class="media-heading"><a href="#">Duis condimentum nunc pretium lobortis </a></h4>
                        <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra </p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a class="media-left" href="#"><img src="../images/112x112.jpg" alt=""></a>
                      <div class="media-body">
                        <h4 class="media-heading"><a href="#">Duis condimentum nunc pretium lobortis </a></h4>
                        <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra </p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a class="media-left" href="#"><img src="../images/112x112.jpg" alt=""></a>
                      <div class="media-body">
                        <h4 class="media-heading"><a href="#">Duis condimentum nunc pretium lobortis </a></h4>
                        <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra </p>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="single_bottom_rightbar">
            <h2>Blog Archive</h2>
            <div class="blog_archive wow fadeInDown">
              <form action="#">
                <select>
                  <option value="">Blog Archive</option>
                  <option value="">October(20)</option>
                </select>
              </form>
            </div>
          </div>
          <div class="single_bottom_rightbar wow fadeInDown">
            <h2>Popular Lnks</h2>
            <ul>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Blog Home</a></li>
              <li><a href="#">Error Page</a></li>
              <li><a href="#">Social link</a></li>
              <li><a href="#">Login</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<footer id="footer">
  <div class="footer_top">
    <div class="container">
      <div class="row">
        <!--<div class="col-lg-4 col-md-4 col-sm-4">
          <div class="single_footer_top wow fadeInLeft">
            <h2>Flicker Images</h2>
            <ul class="flicker_nav">
              <li> <a href="#"><img src="../images/75x75.jpg" alt=""></a> </li>
              <li> <a href="#"><img src="../images/75x75.jpg" alt=""></a> </li>
              <li> <a href="#"><img src="../images/75x75.jpg" alt=""></a> </li>
              <li> <a href="#"><img src="../images/75x75.jpg" alt=""></a> </li>
              <li> <a href="#"><img src="../images/75x75.jpg" alt=""></a> </li>
              <li> <a href="#"><img src="../images/75x75.jpg" alt=""></a> </li>
              <li> <a href="#"><img src="../images/75x75.jpg" alt=""></a> </li>
              <li> <a href="#"><img src="../images/75x75.jpg" alt=""></a> </li>
            </ul>
          </div>
        </div>-->
        <!--<div class="col-lg-4 col-md-4 col-sm-4">
          <div class="single_footer_top wow fadeInDown">
            <h2>Labels</h2>
            <ul class="labels_nav">
              <li><a href="#">Gallery</a></li>
              <li><a href="#">Business</a></li>
              <li><a href="#">Games</a></li>
              <li><a href="#">Fashion</a></li>
              <li><a href="#">Sports</a></li>
              <li><a href="#">Technology</a></li>
              <li><a href="#">Slider</a></li>
              <li><a href="#">Life &amp; Style</a></li>
            </ul>
          </div>
        </div>-->
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="single_footer_top wow fadeInRight">
            <h2>About Us</h2>
            <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed nec laoreet orci, eget ullamcorper quam. Phasellus lorem neque, </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer_bottom">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="footer_bottom_left">
            <p>Copyright &copy; 2045 <a href="../index.html">magExpress</a></p>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="footer_bottom_right">
            <p>Developed BY Wpfreeware</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/wow.min.js"></script>
<script src="../assets/js/slick.min.js"></script>
<script src="../assets/js/custom.js"></script>
</body>
</html>
