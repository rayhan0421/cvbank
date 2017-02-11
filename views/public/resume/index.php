<?php
include ("../../../vendor/autoload.php");
use App\admin\resume;

$resume = new resume();

$resume->setdata($_GET);

if(!isset($_GET['id'])){
header("location:http://localhost/cvbank");
}


?>

<?php
$setting = $resume->settings();
$about = $resume->about();

$hobby= $resume->hobbies();
$facts = $resume->facts();
$education = $resume->education();

$award= $resume->award();

$port =$resume->portfolio();

$exp = $resume->experience();
$skill = $resume->skill();

$post = $resume->post();



?>


<?php//die(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Professional VCARD </title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="../../../assets/public/resume/images/favicon.ico">

    <!-- CSS | STYLE -->

    <link rel="stylesheet" type="text/css" href="../../../assets/public/resume/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../../../assets/public/resume/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../../../assets/public/resume/css/linecons.css" />
    <link rel="stylesheet" type="text/css" href="../../../assets/public/resume/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="../../../assets/public/resume/css/colors/green.css" />
    <link rel="stylesheet" type="text/css" href="../../../assets/public/resume/css/style.css" />

    <!-- CSS | Google Fonts -->

    <link href='http://fonts.googleapis.com/css?family=Montserrat:400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:200,400,300,500,600' rel='stylesheet' type='text/css'>

    <noscript>
        <style>
        @media screen and (max-width: 755px) {
            .hs-content-scroller {
                overflow: visible;
            }
        }
        </style>
    </noscript>


</head>

<body>
    <!-- Page preloader -->
    <div id="page-loader">
        <canvas id="demo-canvas"></canvas>
    </div>
    <!-- container -->
    <div id="hs-container" class="hs-container">

        <!-- Sidebar-->
        <div class="aside1">
            <a class="contact-button"><i class="fa fa-paper-plane"></i></a>
            <a target="_blank" class="download-button" href="http://localhost/cvbank/views/public/resume/single.php?id=<?php echo $_GET['id']; ?>"><i class="fa fa-cloud-download"></i></a>
            <a class="download-button" href="../../../index.php"><i class="fa fa-search"></i></a>
            <div class="aside-content"><span class="part1">CVBANK</span><span class="part2">Professional Vcard</span>
            </div>
        </div>
        <aside class="hs-menu" id="hs-menu">
            <!-- <canvas id="demo-canvas"></canvas> -->

            <!-- Profil Image-->
            <div class="hs-headline">
                <a id="my-link" href="#my-panel"><i class="fa fa-bars"></i></a>

                <div class="img-wrap">
                    <img src="http://localhost/cvbank/storage/images/<?php echo $setting['featured_img']; ?>" alt=""/>
                </div>
                <div class="profile_info">
                    <h1><?php echo $setting['fullname']; ?></h1>
                    <h4><?php echo $setting['title']; ?></h4>
                    <h6><span class="fa fa-location-arrow"></span>&nbsp;&nbsp;&nbsp;<?php echo $setting['address']; ?></h6>
                </div>
                <div style="clear:both"></div>
            </div>
            <div class="separator-aside"></div>
            <!-- End Profil Image-->

            <!-- menu -->
            <nav>
                <a href="#section1"><span class="menu_name">ABOUT</span><span class="fa fa-home"></span> </a>
                <a href="#section2"><span class="menu_name">RESUME</span><span class="fa fa-newspaper-o"></span> </a>
                <a href="#section3"><span class="menu_name">posts</span><span class="fa fa-pencil"></span> </a>

                <a href="#section5"><span class="menu_name">TEACHING</span><span class="fa fa-book"></span> </a>
                <a href="#section6"><span class="menu_name">SKILLS</span><span class="fa fa-diamond"></span> </a>
                <a href="#section7"><span class="menu_name">WORKS</span><span class="fa fa-archive"></span> </a>
                <a href="#section8"><span class="menu_name">CONTACT</span><span class="fa fa-paper-plane"></span> </a>
            </nav>
            <!-- end menu-->
            <!-- social icons -->
            <div class="aside-footer">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa fa-github"></i></a>
            </div>
            <!-- end social icons -->
        </aside>
        <!-- End sidebar -->

        <!-- Go To Top Button -->
        <a href="#hs-menu" class="hs-totop-link"><i class="fa fa-chevron-up"></i></a>
        <!-- End Go To Top Button -->

        <!-- hs-content-scroller -->
        <div class="hs-content-scroller">
            <!-- Header -->
            <div id="header_container">
                <div id="header">
                    <div><a class="home"><i class="fa fa-home"></i></a>
                    </div>
                    <div><a href="" class="previous-page arrow"><i class="fa fa-angle-left"></i></a>
                    </div>
                    <div><a href="" class="next-page arrow"><i class="fa fa-angle-right"></i></a>
                    </div>
                    <div><a href="http://localhost/cvbank/views/public/resume/single.php?id=<?php echo $_GET['id']; ?> " target="_blank"><i class="fa fa-download"></i></a>
                    </div>
                    <!-- News scroll -->

                    <!-- End News scroll -->
                </div>
            </div>
            <!-- End Header -->

            <!-- hs-content-wrapper -->
            <div class="hs-content-wrapper">
                <!-- About section -->
                <article class="hs-content about-section" id="section1">
                    <span class="sec-icon fa fa-home"></span>
                    <div class="hs-inner">
                        <span class="before-title">.01</span>
                        <h2>ABOUT</h2>
                        <span class="content-title">PERSONAL DETAILS</span>
                        <div class="aboutInfo-contanier">
                            <div class="about-card">

                                <div class="face1 card-face">
                                    <div class="about-cover card-face">

                                        <div class="about-details">
                                            <div><span class="fa fa-inbox"></span><span class="detail"><?php echo $about['umail']; ?> </span>
                                            </div>
                                            <div><span class="fa fa-phone"></span><span class="detail"><?php echo $about['phone']; ?></span>
                                            </div>
                                        </div>

                                        <div class="cover-content-wrapper">
                                            <span class="about-description">
                                                <span class="rw-words">
                                                    <?php echo substr($about['bio'],0,80); ?>


                                                <span>
                                            </span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="more-details">
                                <div class="tabbable tabs-vertical tabs-left">
                                    <ul id="myTab" class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#bio" data-toggle="tab">Bio</a>
                                        </li>
                                        <li>
                                            <a href="#hobbies" data-toggle="tab">Hobbies</a>
                                        </li>
                                        <li>
                                            <a href="#facts" data-toggle="tab">Facts</a>
                                        </li>
                                    </ul>
                                    <div id="myTabContent" class="tab-content">

                                        <div class="tab-pane fade in active" id="bio">
                                            <h3>BIO</h3>
                                            <h4>ABOUT ME</h4>
                                      <p><?php echo $about['bio']; ?></p>
                                         </div>
                                        <div class="tab-pane fade" id="hobbies">
                                            <h3>HOBBIES</h3>
                                            <h4>INTERESTS</h4>
                                            <?php foreach ($hobby as $value) { ?>
                                            <div class="hobbie-wrapper row">
                                                <div class=" col-md-3" style="color: #761c19">
                                                    <?php echo $value['title'] ?>
                                                </div>
                                                <div class="hobbie-description col-md-9">
                                          <?php echo $value['description'] ?>
                                                </div>
                                                <div style="clear:both;"></div>
                                            </div>
                                        <?php } ?>
                                            <div style="clear:both;"></div>
                                        </div>
                                        <div class="tab-pane fade" id="facts">
                                            <h3>FACTS</h3>
                                            <h4>NUMBERS ABOUT ME</h4>
                                            <?php foreach ($facts as $value){  ?>
                                            <div class="facts-wrapper col-md-6">
                                                <div class="facts-icon"><i class="li_bulb"></i>
                                                </div>
                                                <div class="facts-number"><?php echo $value['no_of_items'] ?></div>
                                                <div class="facts-description"><?php echo $value['title'] ?></div>
                                            </div>
                                            <?php } ?>
                                            <div style="clear:both;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </article>
                <!-- End About Section -->

                <!-- Resume Section -->
                <article class="hs-content resume-section" id="section2">
                    <span class="sec-icon fa fa-newspaper-o"></span>
                    <div class="hs-inner">
                        <span class="before-title">.02</span>
                        <h2>RESUME</h2>
                        <!-- Resume Wrapper -->
                        <div class="resume-wrapper">
                            <ul class="resume">
                                <!-- Resume timeline -->
                                <li class="time-label">
                                    <span class="content-title">EDUCATION</span>
                                </li>


                              <?php foreach ($education as $value ) { ?>

                                <li>
                                    <div class="resume-tag">
                                        <span class="fa fa-university"></span>
                                        <div class="resume-date">
                                            <span><?php echo explode('-',$value['passing_year'])[0]; ?></span>
                                            <div class="separator"></div>
                                            <span><?php echo $value['course_duration'] ?></span>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <span class="timeline-location"><i class="fa fa-map-marker"></i><?php echo $value['education_board'] ?></span>
                                        <h3 class="timeline-header"><?php echo $value['main_subject'] ?></h3>
                                        <div class="timeline-body">
                                            <h4><?php echo $value['institute'] ?></h4>
                                            <span>
                                                Title:  <?php echo $value['title'] ?>
                                                RESULT: <?php echo $value['result'] ?>
                                            </span>
                                        </div>
                                    </div>
                                </li>
                                <?php } ?>
                                <li class="time-label">
                                    <span class="content-title">HONORS AND AWARDS</span>
                                </li>
                              <?php foreach ($award as $value){ ?>
                                <li>
                                    <div class="resume-tag">
                                        <span class="fa fa-star-o"></span>
                                        <div class="resume-date">
                                            <span><?php echo explode('-',$value['year'])[0]; ?></span>

                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <span class="timeline-location"><i class="fa fa-map-marker"></i><?php echo $value['location'] ?></span>
                                        <h3 class="timeline-header"><?php echo $value['title'] ?></h3>
                                        <div class="timeline-body">
                                            <h4><?php echo $value['organization'] ?></h4>
                                            <span><?php echo $value['description'] ?></span>
                                             </div>
                                    </div>
                                </li>
                                <?php } ?>
                                <!-- End Resume timeline -->
                            </ul>
                        </div>
                        <!-- End Resume Wrapper -->
                    </div>
                </article>
                <!-- End Resume Section-->

                <!-- Publication Section -->
                <article class="hs-content publication-section" id="section3">
                    <span class="sec-icon fa fa-pencil"></span>
                    <div class="hs-inner">
                        <span class="before-title">.03</span>
                        <h2>Blogs</h2>
                        <!-- Filter/Sort Menu -->
                        <span class="content-title">Blog LIST</span>

                        <!-- End Filter/Sort Menu -->

                        <!-- publication wrapper -->
                        <div id="mygrid">
                            <?php $serial=1; ?>
                            <!-- publication item -->
                            <?php foreach ($post as $value) { $serial++?>
                            <div class="publication_item" data-groups='["all","CONFERENCES"]' data-date-publication="2007-12-01">
                                <div class="media">
                                    <a href=".publication-detail<?php echo $serial; ?>" class="ex-link open_popup" data-effect="mfp-zoom-out"><i class="fa fa-plus-square-o"></i></a>
                                    <div class="date pull-left">
                                        <span class="day"> <?php echo explode('-',$value['created_at'])[0]; ?></span>
                                        <span class="month"><?php echo explode('-',$value['created_at'])[1]; ?></span>
                                        <span class="year"><?php echo substr(explode('-',$value['created_at'])[2],0,2); ?></span>
                                    </div>
                                    <div class="media-body">
                                        <h3><?php echo $value['title']; ?></h3>
                                        <h4><?php echo $value['categories']; ?></h4>
                                        <span class="publication_description"><?php echo substr($value['description'],0,200); ?>  </span> </div>
                                    <hr style="margin:8px auto">
                                    <span class="label label-primary"><?php echo $value['tags']; ?></span>

                                    <span class="publication_authors"></span>
                                </div>
                                <div class="mfp-hide mfp-with-anim publication-detail<?php echo $serial;?> publication-detail">
                                    <div class="image_work">

                                    </div>
                                    <div class="project_content">
                                        <h3 class="publication_title"><?php echo $value['title']; ?></h3>

                                        <span class="label label-primary"><?php echo $value['categories']; ?></span>

                                        <p class="project_desc"> <?php echo $value['description']; ?> </p>
                                    </div>
                                    <a class="ext_link" href="#"><i class="fa fa-external-link"></i></a>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                               <!-- End publication item -->
                             <?php } ?>
                            <!-- publication item -->

                        </div>
                        <!-- End Publication Wrapper -->
                    </div>
                    <div class="clear"></div>
                </article>
                <!-- End Publication Section -->

                <!-- Research Section -->

                <!-- End Research Section -->

                <!-- Teaching Section -->
                <article class="hs-content teaching-section" id="section5">
                    <span class="sec-icon fa fa-book"></span>
                    <div class="hs-inner">
                        <span class="before-title">.05</span>
                        <h2>Experience</h2>
                        <div class="teaching-wrapper">
                            <ul class="teaching">

                             <?php foreach ($exp as $value) { ?>

                                <li>
                                    <div class="teaching-tag">
                                        <span class="fa fa-suitcase"></span>
                                        <div class="teaching-date">
                                            <span><?php echo explode('-',$value['start_date'])[0]; ?></span>
                                            <div class="separator"></div>
                                            <span><?php echo  explode('-',$value['end_date'])[0]; ?></span>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header"><?php echo $value['designation']; ?></h3>
                                        <div class="timeline-body">
                                            <h4><?php echo $value['company_name']; ?></h4>
                                          <span><?php echo $value['company_location']; ?></span>
                                         </div>
                                    </div>
                                </li>

                            <?php } ?>
                            </ul>
                        </div>
                    </div>
                </article>
                <!-- End Teaching Section -->

                <!-- Skills Section -->
                <article class="hs-content skills-section" id="section6">
                    <span class="sec-icon fa fa-diamond"></span>
                    <div class="hs-inner">
                        <span class="before-title">.06</span>
                        <h2>SKILLS</h2>
                        <?php foreach ($skill as $value) {?>
                        <span class="content-title"><?php echo $value['title']; ?></span>
                        <div class="skolls">
                            <span class="skill-description"><?php echo $value['description']; ?></span>
                            <div class="bar-main-container">
                                <div class="wrap">

                                    <span class="skill-detail"><i class="fa fa-bar-chart"></i>LEVEL : <?php echo $value['level']; ?></span><span class="skill-detail"><i class="fa fa-binoculars"></i>EXPERIENCE : <?php echo $value['experience']; ?></span>



                                </div>
                            </div>
                        </div>
                      <?php } ?>
                    </div>
                </article>
                <!-- End Skills Section -->

                <!-- Works Section -->
                <article class="hs-content works-section" id="section7">
                    <span class="sec-icon fa fa-archive"></span>
                    <div class="hs-inner">
                        <span class="before-title">.07</span>
                        <h2>WORKS</h2>
                        <div class="portfolio">
                            <!-- Portfolio Item -->
                             <?php $i=1; ?>
                            <?php foreach ($port as $value) { $i++; ?>
                            <!-- Portfolio Item -->
                            <figure class="effect-milo">
                                <img src="http://localhost/cvbank/storage/images/<?php echo $value['img']; ?>" alt="img11"  />
                                <figcaption>
                                    <span class="label"><?php echo $value['category']; ?></span>
                                    <div class="portfolio_button">
                                        <h3><?php echo $value['title']; ?></h3>
                                        <a href=".work<?php echo $i; ?>" class="open_popup" data-effect="mfp-zoom-out">
                                            <i class="hovicon effect-9 sub-b"><i class="fa fa-search"></i></i>
                                        </a>
                                    </div>
                                    <div class="mfp-hide mfp-with-anim work_desc work<?php echo $i; ?>">
                                        <div class="col-md-6">
                                            <div class="image_work">
                                                <img  src="http://localhost/cvbank/storage/images/<?php echo $value['img']; ?>" alt="img">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="project_content">
                                                <h2 class="project_title">
                                                    <?php echo $value['description']; ?>
                                           </div>
                                        </div>
                                        <a class="ext_link" href="#"><i class="fa fa-external-link"></i></a>
                                        <div style="clear:both"></div>
                                    </div>
                                </figcaption>
                            </figure>

                            <?PHP  } ?>
                            <!-- End Portfolio Item -->
                        </div>
                        <!-- End Portfolio Wrapper -->
                    </div>
                </article>
                <!-- End Works Section -->

                <!-- Contact Section -->
                <article class="hs-content contact-section" id="section8">
                    <span class="sec-icon fa fa-paper-plane"></span>
                    <div class="hs-inner">
                        <span class="before-title">.08</span>
                        <h2>CONTACT</h2>
                        <div class="contact_info">
                            <h3>Get in touch</h3>
                            <hr>
                            <h5>We are waiting to assist you</h5>
                            <h6>Simply use the form below to get in touch</h6>

                            <hr>
                        </div>
                        <!-- Contact Form -->
                        <form action="../../admin/contacts/store.php" method="post">
                        <fieldset id="contact_form">
                            <div id="result"></div>
                            <input type="text" name="name" id="name" placeholder="NAME" />
                            <input type="email" name="email" id="email" placeholder="EMAIL" />
                            <textarea name="message" id="message" placeholder="MESSAGE"></textarea>

                            <input type="hidden" name="user_id"  value="<?php echo $_GET['id']; ?>" />
                            <input type="submit" class="submit_btn" id="submit_btn" value="Send" />
                        </fieldset>
                        </form>

                        <!-- End Contact Form -->
                    </div>
                </article>
                <!-- End Contact Section -->
            </div>
            <!-- End hs-content-wrapper -->
        </div>
        <!-- End hs-content-scroller -->
    </div>
    <!-- End container -->
    <div id="my-panel">
    </div>

    <!-- PLUGIN SCRIPTS -->

    <script type="text/javascript" src="../../../assets/public/resume/js/jquery.min.js"></script>
    <script type="text/javascript" src="../../../assets/public/resume/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../../assets/public/resume/js/default.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="../../../assets/public/resume/js/watch.js"></script>
    <script type="text/javascript" src="../../../assets/public/resume/js/layout.js"></script>
    <script type="text/javascript" src="../../../assets/public/resume/js/main.js"></script>

    <!-- END PLUGIN SCRIPTS -->
</body>

</html>
