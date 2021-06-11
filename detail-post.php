  <!-- xác định trang detail -->
          <?php
            $key = $_GET["p"];
             $type = $_GET["type"];
                
                 /*tao sql truy van*/
             $url = "http://localhost:8080/api-gr3atcode/common/ALL_getData?action=getDetail&table=". $type . "&link=" .$key;
            
         $ch = curl_init();
             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
             curl_setopt($ch, CURLOPT_URL,$url);
             $json=curl_exec($ch);
             curl_close($ch);
             $json_object = json_decode($json);
             if($json_object->status != 'OK'){
              
             }else{
        ?>  

    <!--kết thuc xác định detail -->

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
    <title>Gr3atCode - Chi tiết bài viết</title>
    
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
                    <a class="nav-link page-scroll" href="gr3atcode.com">TRANG CHỦ <span class="sr-only">(current)</span></a>
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
                    <div id="content_html">
                        <div id="content_detail">
                           <h1><?php 
                          // echo urldecode($json_object->title);
                           ?></h1>
                        </div>
                    </div>
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

                         <!-- show content html --> 
        <?php 
      //  $str_content_html = urldecode($json_object->content_html);
       // $arr_content = explode('###', $str_content_html);
        ?>
        <div id="content_html">
            <div id="content_detail">
             
                <!-- tai lieu -->
                <div  id="iframelive">
                  <iframe style=" width:100%;height:500px ;border:none;"
                  src=
                  "https://docs.google.com/presentation/d/e/2PACX-1vTDRC9guPFJwYHu09GfZkbGmrcmlbLt_DACxj7dC3alTQyX0NxuiLbv0dDFxugArSljcfyd1Tu7a4jw/embed?start=false&loop=false&delayms=3000" frameborder="0" width="960" height="569" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"
                  ></iframe></div>

                <!-- youtube -->
                <div style="margin-top: 100px;"  id="iframelive">
                  <iframe   style="width:100%; height:500px; border:none;";
             src="https://www.youtube.com/embed/9t1IsxTeyHQ"
             ></iframe></div>
    <!--kết thuc show content html -->




                        </div> <!-- end of col -->
                    </div> <!-- end of row -->
                </div> <!-- end of container -->
            </div> <!-- end of ex-basic-1 -->
            <!-- end of breadcrumbs -->   
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
                    <div class="button-container" style="margin: auto; width: 150px;">
                        <a class="btn-solid-reg page-scroll" href=
                         <?php 
                        // echo $arr_content[2]
                         ?>
                    ;>Thảo Luận</a>
                    </div>
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
    <?php }?>    
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
    <script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

    <script type="text/javascript">
        //function to fix height of iframe!
        var calcHeight = function () {
            var headerDimensions = $(#mainlivedemo).height();
            var selector = ($(.stretched).length > 0) ? #iframelive : #iframelive iframe;
            $(selector).height($(window).height() - headerDimensions);
        }
        $(document).ready(function () {
            calcHeight();
        });
        $(window).resize(function () {
            calcHeight();
        }).load(function () {
            calcHeight();
        });
              </script>
    <script src="js/scripts.js">
    </script> <!-- Custom scripts -->
</body>
</html>
