<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<!-- SEO Meta Tags -->
    <meta name="description" content="Gr3atCode là công cụ giúp học lập trình trở nên đơn giản và thú vị, Gr3atCode cung cấp kho tài liệu khổng lồ về IT.">
    <meta name="author" content="Hao P. Do - Phu H. Le">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="Gr3atCode" /> <!-- website name -->
	<meta property="og:site" content="https://gr3atcode.com/" /> <!-- website link -->
	<meta property="og:title" content="GreatCode - Công cụ chia sẻ và học lập trình"/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="Gr3atCode là công cụ giúp học lập trình trở nên đơn giản và thú vị, Gr3atCode cung cấp kho tài liệu khổng lồ về IT." /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="https://gr3atcode.com/images/GreatCode.png" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="https://gr3atcode.com/" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />
	
    <!-- Website Title -->
    <title>Gr3atCode - Công cụ giúp học lập trình trở nên đơn giản và thú vị</title>
	
   <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
	<!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">
    <style type="text/css">
        .text {
             display: block;
             width: 80px;
             overflow: hidden;
             white-space: nowrap;
             text-overflow: ellipsis;
        }
        .short_desc{
             display: block;
             width: 100%;
             height: 100px;
             overflow: hidden;
             white-space: nowrap;
             text-overflow: ellipsis;
        }
    </style>
</head>
<body data-spy="scroll" data-target=".fixed-top">

    <!-- submit contribution -->
    <?php
        if(isset($_POST["submit_contribution"])){
           $captcha;
           if(isset($_POST['g-recaptcha-response'])){
              $captcha = $_POST['g-recaptcha-response'];
           }
           if(!$captcha){
             ?><script type="text/javascript">alert("Lỗi, hãy đảm bảo bạn nhập đủ thông tin")</script><?php
              
           }else{
              $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?6LeiKeMZAAAAAFmB89AUK9R-oN8ZMeL6YJTXXtLm".$_SERVER['REMOTE_ADDR']);
              if($response.success == false){
                   ?><script type="text/javascript">alert("Lỗi, Hãy Kiểm tra thông tin bạn nhập")</script><?php  
               
              }else{
                $namez= $_POST["lname"];
                $name = urlencode(trim($namez));
                $emailz = $_POST["lemail"];
                $email = urlencode(trim($emailz));
                $contentz = $_POST["cmessage"];
                $content = urlencode(trim($contentz));
            require("connect.php");
            $sql = "CALL insert_contribution( '$name', '$email', '$content', '1') ";
            $result = mysqli_query($conn, $sql);
            if($result){
                mysqli_close($conn);
                ?><script type="text/javascript">alert("Đóng góp của bạn đã được gửi đi")</script><?php
            }else{ 
               ?><script type="text/javascript">alert("Lỗi đường truyền, hãy thử lại")</script><?php
                echo mysqli_error($conn);
            }
              }
           }
        }
    ?>

    <!-- Preloader -->
 	<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div> 
    <!-- end of preloader -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Aria</a> -->
        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="index.php"><img src="images/GreatCode.png" alt="alternative"></a>
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#header">TRANG CHỦ <span class="sr-only">(current)</span></a>
                </li>
                <!-- new Menu -->     
                 <li class="nav-item">
                    <a class="nav-link page-scroll" href="#intro">CÓ GÌ MỚI ?</a>
                </li>  
                <!-- end new menu -->
                 <li class="nav-item">
                    <a class="nav-link page-scroll" href="#services">KHÓA HỌC</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#callMe">GỬI ĐÓNG GÓP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#projects">DỰ ÁN - ĐỀ TÀI</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link page-scroll" href="#about">CÂU CHUYỆN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#contact">LIÊN HỆ</a>
                </li>
            </ul>
            <span class="nav-item social-icons">
                <span class="fa-stack">
                    <a href="https://www.facebook.com/groups/learningsomething">
                        <span class="hexagon"></span>
                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                    </a>
                </span>
                <span class="fa-stack">
                    <a href="https://www.youtube.com/channel/UCBnUr9H8THbZIjLhJb2cbFw">
                        <span class="hexagon"></span>
                        <i class="fab fa-pinterest fa-stack-1x"></i>
                    </a>
                </span>
                <span class="fa-stack">
                    <a href="admin/index.php">
                        <span class="hexagon"></span>
                        <i></i>
                    </a>
                </span>
            </span>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navbar -->


    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-container">
                            <h1><span id="js-rotating">Gr3atCode,Khóa Học,Gr3atCode,Góc chia sẻ,Gr3atCode,Mã nguồn free</span></h1>
                            <p class="p-heading p-large">thay vì tập trung vào vấn đề, hãy tập trung vào giải pháp</p>
                            <a class="btn-solid-lg page-scroll" href="#intro">KHÁM PHÁ</a>
                             <!-- thong bao mới-->
                                <!-- php get thong bao -->
                               <?php
                                   $url = "localhost:8080/api-gr3atcode/notification/Notification_getData?action=getAll&table=notification&start=0&p_id=1";
                                    $ch = curl_init();
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    curl_setopt($ch, CURLOPT_URL,$url);
                                    $json=curl_exec($ch);
                                    curl_close($ch);
                                    $json_object = json_decode($json);
                                    $arr = $json_object->items;
                                    $leng = count($arr);
                                    for($i = 0; $i<$leng; $i++){
                                        $obj = $arr[$i];
                                        if($obj->is_disabled== 0){?>
                                              <div id="notifi">
                                                    <b  style="color: #00cc99" >
                                                        -- thong bao --
                                                    </b>
                                                    <p style="color: #fff"><?php
                                                        foreach ($obj as $key => $value) {
                                                            if($key != 'id' && $key!= 'is_disabled'){
                                                                ?><?php echo urldecode($value); ?>
                                                                <?php
                                                            }
                                                        }?>
                                                </p>
                                            </div><?php
                                        }
                                    }
                                ?>
                                    <!-- end php get thong bao -->
                             <!-- hết thong bao mới-->
                        </div>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->

    


    <!-- Intro -->
    <div class="basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="text-container">
                        <div class="section-title">GIỚI THIỆU</div>
                        <h2>cùng nhau học tập, cùng nhau chia sẽ kiến thức, và cùng nhau phát triển !!!</h2>
                        <p>Cùng nhau, chúng ta sẽ cố gắng xây dựng một cộng đồng IT lớn mạnh, tại đây, các bạn có thể tìm thấy các khóa học miễn phí, các câu chuyện lập trình, source code mẫu, và những kiến thức được thu nạp và chia sẽ cho nhau</p>
                        <p class="testimonial-text">"Gr3atCode"</p>
                        <div class="testimonial-author">---------------------------------------------------</div>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-7">
                    <div class="image-container">
                            <img class="img-fluid" src="images/intro.png" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of intro -->
        <!-- Intro -->
    <div  id="intro"  class="basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="text-container">
                        <div class="section-title">Nguyễn Trọng Thanh - Nguyễn Công Nhật</div>
                        <h2><a href="cautrucdulieu">HỌC CẤU TRÚC DỮ LIỆU - THUẬT TOÁN</a>
                        </h2>
                        <p>Các thuật toán danh cho sinh viên đam mê lập trình thi đấu ( olympic - ACM ),biên soạn lại, với nội dung ngắn ngọn, dễ hiểu,có code demo, có mô phỏng...</p>
                         <div class="section-title">Nguyễn Võ Hoàng Long</div>
                        <h2><a href="">THỰC HÀNH</a></h2>
                        <p>Hệ thống bài tập, chấm bài và thi online, nơi các bạn thực hành các thuật toán đã học, làm các ví dụ cụ thể...</p>
                        <p class="testimonial-text">"Gr3atCode"</p>
                        <div class="testimonial-author"></div>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-7">
                    <div class="image-container">
                            <img class="img-fluid" src="images/unname.png" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of intro -->

    <!-- danh sách các trend mới nhất  -->
    <!-- Description -->
    <div class="cards-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- lấy dữ liệu trend -->
                         <?php
                          include ('php/detail_link.php');
                                 $url = "localhost:8080/api-gr3atcode/hottrend/Hottrend_getData?action=getAll&table=hottrend&start=0&p_id=1";
                                    $ch = curl_init();
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    curl_setopt($ch, CURLOPT_URL,$url);
                                    $json=curl_exec($ch);
                                    curl_close($ch);
                                    $json_object = json_decode($json);
                                    $arr = $json_object->items;
                                    $leng = count($arr);
                                    for($i = 0; $i<$leng; $i++){
                                        $obj = $arr[$i];
                                        if($obj->is_disabled== 0){
                                            ?>
                                            <!-- Card -->
                                            <div class="card">
                                                <span class="fa-stack">
                                                    <span></span>
                                                         <img class="fas fa-stack-1x" alt="trend mới nhất" src=
                                                            <?php echo urldecode($obj->thumbnail); ?>
                                                         ></img>
                                                </span>
                                                <div class="card-body">
                                                    <?php 
                                                     $li = "detail-post.php?type=hottrend&p=".
                                                     urldecode($obj->link);?> 
                                                    <h4 class="card-title">
                                                         <a style="text-decoration:none;"
                                                          href=<?php echo $li;?>
                                                         ><?php echo urldecode($obj->title); ?></a>
                                                        </h4>
                                                    <p>
                                                        <span><?php echo urldecode($obj->short_desc);?></span>
                                                        
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- end of card -->           
                                            <?php
                                        }
                                    }
                                ?>
                    <!-- kết thúc lấy dữ liệu trend -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
              <div class="button-container" style="margin: auto; width: 150px;">
                        <a class="btn-solid-reg page-scroll" href=
                        "all_post.php?key=<?php echo 'hottrend'; ?>";>XEM HẾT</a>
                    </div>
        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of description -->


    <!-- Services -->
    <div id="services" class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">KHÓA HỌC MIỄN PHÍ</div>
                    <h2>Chọn khóa học mà bạn đang cần<br>< tất cả đều miễn phí ></h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                            <!-- lấy dữ liệu course -->
                         <?php
                               
                                 $url = "localhost:8080/api-gr3atcode/course/Course_getData?action=getAll&table=course&start=0&p_id=1";
                                    $ch = curl_init();
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    curl_setopt($ch, CURLOPT_URL,$url);
                                    $json=curl_exec($ch);
                                    curl_close($ch);
                                    $json_object = json_decode($json);
                                    $arr = $json_object->items;
                                    $leng = count($arr);
                                    for($i = 0; $i<$leng; $i++){
                                        $obj = $arr[$i];
                                        if($obj->is_disabled== 0){
                                            ?>                    
                                                <!-- Card -->
                                                <div class="card">
                                                    <div class="card-image">
                                                        <img class="img-fluid_1" alt="course khóa học"
                                                        src=<?php echo urldecode($obj->thumbnail); ?> >
                                                    </div>
                                                    <div class="card-body">
                                                        <?php 
                                                        $li = "detail-post.php?type=course&p=".urldecode($obj->link);?> 

                                                        <h3 class="card-title"><a style="text-decoration:none;"
                                                            href=<?php echo $li;?>
                                                            ><?php echo urldecode($obj->title);?></a></h3>
                                                        <p> <?php echo urldecode($obj->author); ?> </p>
                                                        <ul class="list-unstyled li-space-lg">
                                                            <?php $str_over = urldecode($obj->overview);
                                                                $arr_over = explode('-', $str_over);
                                                                foreach ($arr_over as $s) {
                                                                    ?>
                                                                     <li class="media">
                                                                        <i class="fas fa-square" style="font-size: 20px">
                                                                            <span ><?php echo trim($s);?></span>
                                                                         </i>
                                                                        <div class="media-body"></div>
                                                                    </li> 
                                                            <?php }?>
                                                        </ul>
                                                        <p class="price">Ngày update <span>  <?php echo urldecode($obj->updated);?> </span></p>
                                                    </div>
                                                </div>
                                                <!-- end of card -->    
                                            <?php
                                        }
                                    }
                                ?>
                    <!-- kết thúc lấy dữ liệu course -->


                </div> <!-- end of col -->
            </div> <!-- end of row -->
              <div class="button-container" style="margin: 10px">
                        <a class="btn-solid-reg page-scroll" href=
                        "all_post.php?key=<?php echo 'course'; ?>";>XEM HẾT</a>
                    </div>
        </div> <!-- end of container -->
    </div> <!-- end of cards-2 -->
    <!-- end of services -->
    
  <!-- cut 1 -->

    <!-- Testimonials -->
    <div class="slider">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Card Slider -->
                    <div class="slider-container">
                        <div class="swiper-container card-slider">
                            <div class="swiper-wrapper">
                            <!-- lấy dữ liệu contribution -->
                         <?php
                                   $url = "localhost:8080/api-gr3atcode/contribution/Contribution_getData?action=getAll&table=contribution&start=0&p_id=1";
                                    $ch = curl_init();
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    curl_setopt($ch, CURLOPT_URL,$url);
                                    $json=curl_exec($ch);
                                    curl_close($ch);
                                    $json_object = json_decode($json);
                                    $arr = $json_object->items;
                                    $leng = count($arr);
                                    for($i = 0; $i<$leng; $i++){
                                        $obj = $arr[$i];
					                   $r = rand(1, 25);
                                        if($obj->is_disabled == 0){?>    
                                        <!-- Slide những người đóng góp-->
                                    <div class="swiper-slide">
                                        <div class="card">
                                            <?php  if($r <=5 ){?>
                                            <img class="card-image" src="images/dong.png"
                                             alt="alternative">
                                         <?php }?>
                                          <?php  if($r >5 && $r <=10 ){?>
                                            <img class="card-image" src="images/vang.png"
                                             alt="alternative">
                                         <?php }?>
                                          <?php  if($r >10 && $r <=15 ){?>
                                            <img class="card-image" src="images/thu.png"
                                             alt="alternative">
                                         <?php }?>
                                          <?php  if($r >15){?>
                                            <img class="card-image" src="images/cao_thu.png"
                                             alt="alternative">
                                         <?php }?>
                                            <div class="card-body">
                                                <div class="testimonial-text">
                                                   <?php echo urldecode($obj->content).'</br>'.
                                                        urldecode($obj->email)
                                                   ; ?>
                                                </div>
                                                <div class="testimonial-author">                
                                                   <?php echo urldecode($obj->name); ?>
                                                </div>
                                                 <div class="testimonial-author">
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end of swiper-slide -->
                                    <!-- end of slide -->
                                            <?php
                                        }
                                    }
                                ?>
                    <!-- kết thúc lấy dữ liệu contribution -->
                            </div> <!-- end of swiper-wrapper -->
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <!-- end of add arrows -->
                        </div> <!-- end of swiper-container -->
                    </div> <!-- end of sliedr-container -->
                    <!-- end of card slider -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of slider -->
    <!-- end of testimonials -->


    <!-- Call Me -->
    <div id="callMe" class="form-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <div class="section-title">GỬI ĐÓNG GÓP</div>
                        <h2 class="white">Liên Kết với nhau</h2>
                        <p class="white">Đóng góp của bạn sẽ được đăng tải lên trang <i>"kèm tên và đóng góp của bạn"</i> khi nó được kiểm duyệt thành công. thank you very much !</p>
                        <ul class="list-unstyled li-space-lg white">
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">Bạn Cần giúp đỡ, bạn gặp rắc rối ? nói cho tôi</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">Hãy nói lên đóng góp, ý kiến của bạn</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">Khóa học của bạn xây dưng,dự án bạn muốn chia sẽ</div>
                            </li>
                        </ul>
                    </div>
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <!-- Call Me Form -->
                    <form method="POST" data-toggle="validator" data-focus="false">
                        <div class="form-group">
                            <input type="text" class="form-control-input" id="lname" name="lname" required>
                            <label class="label-control" for="lname">Tên</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control-input" id="lemail" name="lemail" required>
                            <label class="label-control" for="lemail">Email</label>
                            <div class="help-block with-errors"></div>
                        </div>
                         <div class="form-group">
                            <input type="text" name="cmessage" class="form-control-textarea" id="cmessage" required></input>
                            <label class="label-control" for="cmessage">Nội dung đóng góp, ...</label>
                            <div class="help-block with-errors"></div>
                        </div> 
                        <!-- i am not robot -->
                       <div class="g-recaptcha" data-sitekey="6LeiKeMZAAAAAHEeoNAggXyAE-iJmxkstVaG0f6A"></div>

                        <div class="form-group">
                            <input  class="form-control-submit-button" type="submit" name="submit_contribution" value="SUBMIT" class="btn_bot">
                        </div>
                        <div class="form-message">
                            <div id="lmsgSubmit" class="h3 text-center hidden"></div>
                        </div>
                         <!--js-->
                      <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                    </form>
                    <!-- end of call me form -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of form-1 -->
    <!-- end of call me -->


     <div id="projects" class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">DỰ ÁN - ĐỀ TÀI</div>
                    <h2>hướng dẫn, source code, Dự án - đề tài mẫu</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">		
                            <!-- lấy dữ liệu project -->
                         <?php
                                    $url = "localhost:8080/api-gr3atcode/project/Project_getData?action=getAll&table=project&start=0&p_id=1";   
                                    $ch = curl_init();
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    curl_setopt($ch, CURLOPT_URL,$url);
                                    $json=curl_exec($ch);
                                    curl_close($ch);
                                    $json_object = json_decode($json);
                                    $arr = $json_object->items;
                                    $leng = count($arr);
                                    for($i = 0; $i<$leng; $i++){
                                        $obj = $arr[$i];
                                        if($obj->is_disabled== 0){
                                            ?>
                                           <!-- Card -->
                                            <div class="card">
                                                <div class="card-image">
                                                    <img class="img-fluid_1" src=
                                                    <?php echo urldecode($obj->thumbnail); ?>; alt="alternative">
                                                </div>
                                                <div class="card-body">
                                                     <?php  $li = "detail-post.php?type=project&p=".urldecode($obj->link);?>
                                              
                                                    <h3 class="card-title">
                                                        <a style="text-decoration:none;"
                                                        href=<?php echo $li;?>>
                                                        <?php echo urldecode($obj->title); ?></a></h3> <!-- tên de tai -->
                                                    <p><?php echo urldecode($obj->author);?> </p>
                                                    <ul class="list-unstyled li-space-lg">
                                                                <?php $str_over = urldecode($obj->overview);
                                                                $arr_over = explode('-', $str_over);
                                                                foreach ($arr_over as $s) {
                                                                    ?>
                                                                     <li class="media">
                                                                        <i class="fas fa-square" style="font-size: 20px">
                                                                        <?php echo $s ?>
                                                                        </i>
                                                                        <div class="media-body"></div>
                                                                    </li> 
                                                            <?php }?>   
                                                    </ul>
                                                    <p class="price"><span>
                                                        <?php echo urldecode($obj->updated); ?>
                                                        </span></p>
                                                </div>
                                            </div>
                                            <!-- end of card -->    
                                            <?php
                                        }
                                    }
                                ?>
                    <!-- kết thúc lấy dữ liệu project -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
             <div class="button-container" style="margin: 10px;">
                            <a class="btn-solid-reg page-scroll" href=
                            "all_post.php?key=<?php echo 'project'; ?>";>XEM HẾT</a>
                    </div>
        </div> <!-- end of container -->
    </div> <!-- end of cards-2 -->
    <!-- end of services -->


    <!-- About -->
    <div  class="counter">
        <div class="container">
            <div id="about" class="row">
                <div class="col-lg-5 col-xl-6">
                    <div class="image-container">
                        <img class="img-fluid" src="images/gr.jpg" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-7 col-xl-6">
                    <div class="text-container">
                        <div class="section-title">về chúng tôi</div>
                        <h2>Thông số tiêu biểu</h2>
                        <p></p>
                        <ul class="list-unstyled li-space-lg">
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">Đăng ký kênh youtube Đỗ Phúc Hảo nhé <3.</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">sự quan tâm,và đóng góp của các bạn là động lực giúp chúng ta phát triển</div>
                            </li>
                        </ul>      
                                  <!-- lấy dữ liệu vote -->
                                <?php
                                    $url = "localhost:8080/api-gr3atcode/vote/Vote_getData?action=getAll&table=vote&start=0&p_id=1";
                                    $ch = curl_init();
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    curl_setopt($ch, CURLOPT_URL,$url);
                                    $json=curl_exec($ch);
                                    curl_close($ch);
                                    $json_object = json_decode($json); 
                                    $arr = $json_object->items;
                                    $leng = count($arr);
                                    for($i = 0; $i<$leng; $i++){
                                        $obj = $arr[$i];
                                        if($obj->is_disabled== 0){
                                            ?>
                                                 <!-- Counter -->
                                                <div id="counter">
                                                    <div class="cell">
                                                        <div class="counter-value number-count" data-count=
                                                        <?php echo urldecode($obj->subscribe_yt);?>
                                                        ; >1</div>
                                                        <div class="counter-info">đăng ký<br>Youtube</div>
                                                    </div>
                                                    <div class="cell">
                                                        <div class="counter-value number-count" data-count=
                                                         <?php echo urldecode($obj->member_group);?>
                                                        >1</div>
                                                        <div class="counter-info">thành viên<br>nhóm</div>
                                                    </div>
                                                    </br>
                                                    <div class="cell">
                                                        <div class="counter-value number-count" data-count=
                                                         <?php echo urldecode($obj->number_post);?>
                                                        >1</div>
                                                        <div class="counter-info">số lượng<br>bài viết</div>
                                                    </div>                         
                                                </div>
                                                <!-- end of counter -->
                                            <?php
                                        }
                                    }
                                ?>
                    <!-- kết thúc lấy dữ liệu vote -->
                    </div> <!-- end of text-container -->      
                </div> <!-- end of col -->
                <!-- end thao luan -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of counter -->
    <!-- end of about -->

                 

<!-- cau chuyen vui -->
  <!-- Testimonials -->
    <div class="slider">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>TÂM SỰ - CÂU CHUYỆN VUI</h2>
                    <p class="p-heading">bạn có gì muốn chia sẽ ? gửi cho chúng tôi !</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-6">
                    <!-- Card Slider -->
                    <div class="slider-container">
                        <div class="swiper-container card-slider">
                            <div class="swiper-wrapper">
                                      <!-- lấy dữ liệu slide cau chuyen vui -->
                                    <?php
                                 $url = "localhost:8080/api-gr3atcode/funny/Funny_getData?action=getAll&table=funny&start=0&p_id=1";
                                    $ch = curl_init();
                                     // Will return the response, if false it print the response
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    // Set the url
                                    curl_setopt($ch, CURLOPT_URL,$url);
                                    // Execute
                                    $json=curl_exec($ch);
                                    // Closing
                                    curl_close($ch);
                                    // Decode JSON data thành mảng kết hợp trong PHP
                                    $json_object = json_decode($json); 
                                    $arr  = $json_object->items;
                                    $leng = count($arr);
                                    // Lặp qua mảng Kết hợp
                                    for($i = 0; $i<$leng; $i++){
                                        $obj = $arr[$i];
                                        if($obj->is_disabled== 0){
                                            ?>
                                               <!-- Slide những cau chuyen vui-->
                                    <div class="swiper-slide">
                                        <div class="card">
                                            <img class="card-image" src=
                                            <?php echo urldecode($obj->thumbnail);?>
                                             alt="alternative">
                                            <div class="card-body">
                                                <div class="testimonial-text">
                                                   <?php echo urldecode($obj->short_desc)
                                                   ; ?>
                                                </div>

                                                 <?php  $li = "detail-post.php?type=funny&p=".urldecode($obj->link);?>
                                                <div class="testimonial-author">
                                                    <a href=<?php echo $li;?>>
                                                        <?php echo urldecode($obj->title); ?>
                                                        </a>
                                                </div>
                                                 <div class="testimonial-author">
                                                     <?php  $li = "detail-post.php?type=funny&p=".urldecode($obj->link);?>
                                                    <a style=" text-decoration: none; color: black;"> class="btn-solid-reg page-scroll" href=
                                                    <?php echo $li;?>
                                                    >ĐỌC THÊM</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end of swiper-slide -->
                                    <!-- end of slide -->
                                            <?php
                                        }
                                    }
                                ?>
                    <!-- kết thúc lấy dữ liệu slide -->
                            </div> <!-- end of swiper-wrapper -->
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <!-- end of add arrows -->
                        </div> <!-- end of swiper-container -->
                    </div> <!-- end of sliedr-container -->
                    <!-- end of card slider -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of slider -->
    <!-- end of testimonials -->
<!-- hết câu chyện vui -->





    <!-- Contact -->
    <div id="contact" class="form-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <div class="section-title">LIÊN HỆ</div>
                        <h2>Thông Tin Của Tôi</h2>
                        <p>Bạn có thế kết nối với tôi bằng cách</p>
                        <ul class="list-unstyled li-space-lg">
                            <li class="address"><i class="fas fa-map-marker-alt"></i>Đà Nẵng</li>
                            <li><i class="fas fa-phone"></i><a href="tel:0328814589">032 8814 589</a></li>
                            <li><i class="fas fa-phone"></i><a href="tel:0365674592">0365 674 592</a></li>
                            <li><i class="fas fa-envelope"></i><a href="https://www.google.com/intl/vi/gmail/about/">Gr3atCode@gmail.com</a></li>
                        </ul>             
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                       <h3>THEO DÕI CHÚNG TÔI</h3>
                        <span class="fa-stack">
                            <a href="https://www.facebook.com/groups/learningsomething">
                                <span class="hexagon"></span>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="https://twitter.com/home?lang=vi">
                                <span class="hexagon"></span>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="https://www.youtube.com/channel/UCBnUr9H8THbZIjLhJb2cbFw">
                                <span class="hexagon"></span>
                                <i class="fab fa-pinterest fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="https://www.instagram.com/?hl=vi">
                                <span class="hexagon"></span>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="https://www.linkedin.com/in/lehuuphu/">
                                <span class="hexagon"></span>
                                <i class="fab fa-linkedin-in fa-stack-1x"></i>
                            </a>
                        </span>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of form-2 -->
    <!-- end of contact -->


    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="text-container about">
                        <h4>Gr3atCode</h4>
                        <p class="white">Hao P. Do - Phu H. Le</i>
                        </p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-md-2">
                    <div class="text-container">
                        <h4>Links</h4>
                        <ul class="list-unstyled li-space-lg white">
                            <li>
                                <a class="white" href="https://www.facebook.com/groups/learningsomething">Facebook.com</a>
                            </li>
                            <li>
                                <a class="white" href="https://www.youtube.com/channel/UCBnUr9H8THbZIjLhJb2cbFw">Youtube.com</a>
                            </li>
							<li>
                                <a class="white" href="https://gr3atcode.com/provision.php">Điều khoản</a>
                            </li>
                        </ul>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
             
                <div class="col-md-2">
                    <div class="text-container">
                        <h4></h4>
                        <ul class="list-unstyled li-space-lg">
                            <li>
                                <a class="white" href="index.php">
                                   Cung cấp bởi Gr3atCode © 2020
                                </a>
                            </li>              
                        </ul>
                    </div> <!-- end of text-container -->
                </div> 
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->  
    <!-- end of footer -->    
    <!-- Scripts -->
    <script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="js/morphext.min.js"></script> <!-- Morphtext rotating text in the header -->
    <script src="js/isotope.pkgd.min.js"></script> <!-- Isotope for filter -->
    <script src="js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="js/scripts.js"></script> <!-- Custom scripts -->
    <script type="text/javascript">
     
    </script>
</body>
</html>
