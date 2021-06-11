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
    <title>Gr3atCode - Hiển thị tất cả bài viết</title>
    
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
</head>
<body data-spy="scroll" data-target=".fixed-top">
       <!-- xác định key next tu index -->
        <?php
            $name = "";
                $key = $_GET["key"];
                if($key == "hottrend"){
                    $name = "Danh Sách Hot Trend";
                }else{
                    if($key == "course"){
                        $name = "Danh Sách Khóa Học";
                    }
                    if($key == "project"){
                        $name = "Danh Sách Source Code";
                    }
                }
        ?>
    <!--kết thuc xác định key next tu index -->
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
                    <a class="nav-link page-scroll" href="index.php">TRANG CHỦ <span class="sr-only">(current)</span></a>
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
            </span>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navbar -->


    <!-- Header -->
    <header id="header" class="ex-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1><?php echo $name; ?></h1>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->


    <!-- Breadcrumbs -->
    <div class="ex-basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs">
                        <a href="index.php">Home</a><i class="fa fa-angle-double-right"></i><span>
                        </span>
                    </div> <!-- end of breadcrumbs -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of breadcrumbs -->
        <!-- show all --> 

    <!-- Services -->
    <div id="services" class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title"><?php echo $name?></div>
                    <h2>--------------------<br>Gr3atCode.com</h2>
                </div> <!-- end of col -->
            </div>
                    <?php
                        $key = $_GET["key"];
                            if($key == "hottrend"){ ?>
                         <!-- danh sách các trend mới nhất  -->
        <!-- Description -->
        <div  id="intro"  class="cards-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" id="1_hottrend">
                        <!-- lấy dữ liệu trend -->
                     <button style="display: none" class="url">
                        https://gr3atcode.com/api/hottrend.php?start=0
                     </button>
                      <button style="display: none" class="type_">1</button>
                            <!-- kết thúc lấy dữ liệu trend -->
                        </div> <!-- end of col -->
                    </div> <!-- end of row -->
                </div> <!-- end of container -->
            </div> <!-- end of cards-1 -->
            <!-- end of description -->
               <?php }else{
                    if($key == "course"){ ?>
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
                    <div class="col-lg-12" id="2_course">
                                <!-- lấy dữ liệu course -->
                    <button style="display: none" class="url">
                         https://gr3atcode.com/api/course.php?start=0
                    </button>
                     <button style="display: none" class="type_">2</button>          <!-- kết thúc lấy dữ liệu course -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-2 -->
    <!-- end of services -->
                 <?php  }
                    if($key == "project"){ ?>
     <div id="projects" class="cards-2">
        <div class="container">
            <div class="row">
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12" id="3_project">     
                            <!-- lấy dữ liệu project -->
                     <button style="display: none" class="url">
                         https://gr3atcode.com/api/project.php?start=0
                    </button>
                     <button style="display: none" class="type_">3</button>
                    <!-- kết thúc lấy dữ liệu project -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-2 -->
    <!-- end of services -->
              <?php      }
                }
        ?>
    <!--kết thuc xác định key next tu index -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-2 -->
    <!-- end of services -->
        <!-- end show all -->
                        </div> <!-- end of col--> 
                    </div> <!-- end of row -->
                
                </div> <!-- end of col-->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-2 -->
    <!-- end of privacy content -->
    <!-- Breadcrumbs -->
    <div class="ex-basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs">
                        <div class="button-container">
                            <a class="btn-solid-reg page-scroll"
                            ><span class="loadmore">Tải thêm</span></a>
                        </div> <!-- end of button-container -->
                        <span></span>
                    </div> <!-- end of breadcrumbs -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of breadcrumbs -->
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
    <script>
	var st = 0;
        var hottrend_page = 0;
        // nhan url
        var url_tmp = $('.url');
        var url_ok = url_tmp.text();
        // xac dinh type can hien thi la trend->1 course->2 project->3
        var type_tmp = $('.type_');
        var type_ok = type_tmp.text();
        // document ready
        $(function(){
            get_hottrend();
        });

        $('.loadmore').click(function(){
            hottrend_page+=st;
            get_hottrend(hottrend_page);
        });
        function get_hottrend(page) {
            if(!page){
                page=0;
            }
            var new_start = "start="+page;
            //document.write(url_ok);
            var link = url_ok.replace("start=0", new_start);
            //document.write(url_ok);
            var Loadbtn = $('.loadmore');
            var pre_text = Loadbtn.text();
            Loadbtn.text('loading...');
            $.ajax({
                type: 'get',
                url: link,
                dataType: 'json',
                success: function(hottrend){
                    console.log('hottrend --> ',hottrend); 
                    var len = hottrend.items.length;  
		    st = hottrend.nextId;
                    if(len == 0){
                        $('.loadmore').fadeOut();
                    }
                    setTimeout(function(){
                         append_render_hottrend(hottrend);
                          Loadbtn.text(pre_text);
                    }, 0)
                }
            });
        }
        function append_render_hottrend(hottrend){
             console.log('--> ',type_ok); 
            if(type_ok == '1'){
            var html = '';
            start = hottrend.nextId;
            var arr = hottrend.items;
            $.each(arr, function(index, trend){  

            //----------------------------------------------           
                html+='<div class="card" style="margin-left: 70px;">';
                html+='<span class="fa-stack">';
                html+='<span class="hexagon"></span>';
                html+='<img class="fas fa-stack-1x" src=';
                html+=decodeURIComponent(trend.thumbnail.replace(/\+/g, ' '));
                html+='></img>';
                html+='</span>';
                html+='<div class="card-body">';
                html+='<h4 class="card-title">';
                html+='<a  style="text-decoration:none;" href=detail-post.php?type=hottrend&p=';
                html+=trend.link+'>'+decodeURIComponent(trend.title.replace(/\+/g, ' '))+'</a>';
                html+='</h4><p>';
                html+=decodeURIComponent(trend.short_desc.replace(/\+/g, ' '));
                html+='</p>';
                html+='</div>';
                html+='</div>';
         //-------------------------------------------------------

            });$('#1_hottrend').append(html);}

                  if(type_ok == '2'){
                    var html = '';
                    var arr = hottrend.items;
                    $.each(arr, function(index, trend){
                     
                             html+='<div class="card">';
                            html+='<div class="card-image">';
                            html+='<img class="img-fluid_1" src=';
                            html+=decodeURIComponent(trend.thumbnail.replace(/\+/g, ' '));
                            html+='></div>';
                            html+='<div class="card-body"><h3 class="card-title">';
                             html+='<a  style="text-decoration:none;" href=detail-post.php?type=course&p=';
                html+=trend.link+'>'+decodeURIComponent(trend.title.replace(/\+/g, ' '))+'</a>';
                html+='</h4><p>';
                            html+=decodeURIComponent(trend.author.replace(/\+/g, ' '));
                            html+='</p>';
                            html+=decodeURIComponent(trend.overview.replace(/\+/g, ' '));
                            html+='<p class="price">Ngày update <span>';
                            html+=trend.updated;
                            html+='</span></p></div></div>';
                            
                    });$('#2_course').append(html);}

              if(type_ok == '3'){
                    var html = '';
                    var arr = hottrend.items;
                    $.each(arr, function(index, trend){
                      
                            html+='<div class="card">';
                            html+='<div class="card-image">';
                            html+='<img class="img-fluid_1" src=';
                            html+=decodeURIComponent(trend.thumbnail.replace(/\+/g, ' '));
                            html+='></div><div class="card-body">';
                            html+='<h3 class="card-title">';
                           html+='<a  style="text-decoration:none;" href=detail-post.php?type=course&p=';
                html+=trend.link+'>'+decodeURIComponent(trend.title.replace(/\+/g, ' '))+'</a>';
                html+='</h3><p>';
                            html+=decodeURIComponent(trend.author.replace(/\+/g, ' '));
                            html+='</p><ul class="list-unstyled li-space-lg">';
                            html+=decodeURIComponent(trend.overview.replace(/\+/g, ' '))  
                            html+='</ul><p class="price">ghi chú<span>';
                            html+=decodeURIComponent(trend.updated.replace(/\+/g, ' '))
                            html+='</span></p></div></div>';
                           
                    });$('#3_project').append(html);}
        }
    </script>
</body>
</html>
