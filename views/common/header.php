<?php
include ("../../vendor/autoload.php");
session_start();
use App\Contact\Contact;

$con = new Contact();
$con->setdata($_SESSION['userinfo']);
$con = $con->alert();


if(!isset($_SESSION['userinfo'])){

    header("location: http://localhost/cvbank/views/login/");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CVBANK User  Admin </title>

    <!-- Bootstrap Core CSS -->
    <link href="../../assets/deshboard/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../assets/deshboard/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../../assets/deshboard/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../assets/deshboard/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="../../assets/deshboard/js/jquery.js"></script>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
           <a href="http://localhost/cvbank/views/deshboard/"><img height="50" width="80" src="../../assets/logo.png" /></a>        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                <ul class="dropdown-menu alert-dropdown">
                   <?php
                   if(!empty($con)){ ?>

                    <?php foreach ($con as $value) { ?>

                    <li>
                        <a href="http://localhost/cvbank/views/contact/index.php">Mail From<span class="label label-default">  <?php  echo $value['cmail']; ?> </span></a>
                    </li>
                       <?php  } ?>
                   <?php } ?>
                    <li class="divider"></li>
                    <li>
                        <a href="http://localhost/cvbank/views/contact/index.php">View All</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php if(array_key_exists('userinfo', $_SESSION)){
                        echo $name = $_SESSION['userinfo'][0]['username'];

                        $id= $_SESSION['userinfo'][0]['id'];



                    } ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="http://localhost/cvbank/views/users/"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>


                    <li class="divider"></li>
                    <li>
                        <a href="http://localhost/cvbank/views/login/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

          <?php if($_SESSION['userinfo'][0]['user_role']==1) {?>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="active">
                    <a href="http://localhost/cvbank/views/deshboard/"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#settings"><i class="fa fa-wrench" aria-hidden="true"></i> Settings <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="settings" class="collapse">
                        <li>
                            <a href="http://localhost/cvbank/views/settings"><i class="fa fa-envelope"></i>  veiw settings  </a>
                        </li>
<!--                        <li>-->
<!--                            <a href="http://localhost/cvbank/views/settings/restore.php"><i class="fa fa-adjust"></i> trash</a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="http://localhost/cvbank/views/settings/index.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> edit</a>-->
<!--                        </li>-->
<!---->
<!--                        <li>-->
<!--                            <a href="http://localhost/cvbank/views/settings/index.php"> <i class="fa fa-th-list" aria-hidden="true"></i> list</a>-->
<!--                        </li>-->
                    </ul>
                </li>
                <li class="<?php echo explode('/',$_SERVER['PHP_SELF'])[3] == 'aboutme' ? 'active' : '';?>">
                    <a href="javascript:;" data-toggle="collapse" data-target="#AboutMe"><i class="fa fa-fighter-jet" aria-hidden="true"></i> About<i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="AboutMe" class="collapse">
                        <li>
                            <a href="http://localhost/cvbank/views/aboutme/"><i class="fa fa-envelope"></i> About me  </a>
                        </li>

                    </ul>
                </li>
                <li class="<?php echo explode('/',$_SERVER['PHP_SELF'])[3] == 'education' ? 'active' : '';?>">
                    <a href="javascript:;" data-toggle="collapse" data-target="#education"><i class="fa fa-institution" aria-hidden="true"></i>Education <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="education" class="collapse">
                        <li>
                            <a href="http://localhost/cvbank/views/education/create.php"><i class="fa fa-envelope"></i>  new  </a>
                        </li>
                        <li>
                            <a href="http://localhost/cvbank/views/education/restore.php"><i class="fa fa-adjust"></i> trash</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> edit</a>
                        </li>

                        <li>
                            <a href="http://localhost/cvbank/views/education/index.php"> <i class="fa fa-th-list" aria-hidden="true"></i> list</a>
                        </li>
                    </ul>
                </li>
                <li class="<?php echo explode('/',$_SERVER['PHP_SELF'])[3] == 'skills' ? 'active' : '';?>">
                    <a href="javascript:;" data-toggle="collapse" data-target="#skill"><i class="fa fa-paperclip" aria-hidden="true"></i> Skill <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="skill" class="collapse">
                        <li>
                            <a href="http://localhost/cvbank/views/skills/create.php"><i class="fa fa-envelope"></i> new</a>
                        </li>
                        <li>
                            <a href="http://localhost/cvbank/views/skills/"><i class="fa fa-th-list" aria-hidden="true"></i> views skill</a>
                        </li>
                        <li>
                            <a href="http://localhost/cvbank/views/skills/restore.php"><i class="fa fa-adjust"></i> Trash skills</a>
                        </li>
                    </ul>
                </li>
                <li class="<?php echo explode('/',$_SERVER['PHP_SELF'])[3] == 'experience' ? 'active' : '';?>">
                    <a href="javascript:;" data-toggle="collapse" data-target="#experiences"><i class="fa fa-empire" aria-hidden="true"></i> Experiences <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="experiences" class="collapse">
                        <li>
                            <a href="http://localhost/cvbank/views/experience/create.php"><i class="fa fa-envelope"></i>  new  </a>
                        </li>
                        <li>
                            <a href="http://localhost/cvbank/views/experience/restore.php"><i class="fa fa-adjust"></i> trash</a>
                        </li>


                        <li>
                            <a href="http://localhost/cvbank/views/experience/index.php"> <i class="fa fa-th-list" aria-hidden="true"></i> list</a>
                        </li>
                    </ul>
                </li>
                <li class="<?php echo explode('/',$_SERVER['PHP_SELF'])[3] == 'Portfolio' ? 'active' : '';?>">
                    <a href="javascript:;" data-toggle="collapse" data-target="#portfolios"><i class="fa fa-windows" aria-hidden="true"></i> Portfolios <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="portfolios" class="collapse">
                        <li>
                            <a href="http://localhost/cvbank/views/Portfolio/create.php"><i class="fa fa-envelope"></i>  new  </a>
                        </li>
                        <li>
                            <a href="http://localhost/cvbank/views/Portfolio/restore.php"><i class="fa fa-adjust"></i> trash</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> edit</a>
                        </li>

                        <li>
                            <a href="http://localhost/cvbank/views/Portfolio/index.php"> <i class="fa fa-th-list" aria-hidden="true"></i> list</a>
                        </li>
                    </ul>
                </li>
                <li class="<?php echo explode('/',$_SERVER['PHP_SELF'])[3] == 'post' ? 'active' : '';?>">
                    <a href="javascript:;" data-toggle="collapse" data-target="#posts"><i class="fa fa-paper-plane" aria-hidden="true"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="posts" class="collapse <?php echo explode('/',$_SERVER['PHP_SELF'])[3] == 'post' ? 'in' : '';?>">
                        <li>
                            <a href="http://localhost/cvbank/views/post/create.php"><i class="fa fa-envelope"></i>  new  </a>
                        </li>
                        <li>
                            <a href="http://localhost/cvbank/views/post/restore.php"><i class="fa fa-adjust"></i> trash</a>
                        </li>


                        <li>
                            <a href="http://localhost/cvbank/views/post/index.php"> <i class="fa fa-th-list" aria-hidden="true"></i> list</a>
                        </li>
                    </ul>
                </li>
                <li class="<?php echo explode('/',$_SERVER['PHP_SELF'])[3] == 'service' ? 'active' : '';?>">
                    <a href="javascript:;" data-toggle="collapse" data-target="#services"><i class="fa fa-shield" aria-hidden="true"></i> Services <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="services" class="collapse <?php echo explode('/',$_SERVER['PHP_SELF'])[3] == 'service' ? 'in' : '';?>">
                        <li>
                            <a href="http://localhost/cvbank/views/service/create.php"><i class="fa fa-envelope"></i>  new  </a>
                        </li>
                        <li>
                            <a href="http://localhost/cvbank/views/service/restore.php"><i class="fa fa-adjust"></i> trash</a>
                        </li>


                        <li>
                            <a href="http://localhost/cvbank/views/service/index.php"> <i class="fa fa-th-list" aria-hidden="true"></i> list</a>
                        </li>
                    </ul>
                </li>
                <li class="<?php echo explode('/',$_SERVER['PHP_SELF'])[3] == 'facts' ? 'active' : '';?>">
                    <a href="javascript:;" data-toggle="collapse" data-target="#facts"><i class="fa fa-cc-discover" aria-hidden="true"></i> Facts <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="facts" class="collapse">
                        <li>
                            <a href="http://localhost/cvbank/views/facts/create.php"><i class="fa fa-envelope"></i>  new  </a>
                        </li>
                        <li>
                            <a href="http://localhost/cvbank/views/facts/restore.php"><i class="fa fa-adjust"></i> trash</a>
                        </li>
                        <li>
                            <a href="http://localhost/cvbank/views/facts/index.php"> <i class="fa fa-th-list" aria-hidden="true"></i> list</a>
                        </li>
                    </ul>
                </li>
                <li class="<?php echo explode('/',$_SERVER['PHP_SELF'])[3] == 'hobbies' ? 'active' : '';?>">
                    <a href="javascript:;" data-toggle="collapse" data-target="#hobbies"><i class="fa fa-gamepad" aria-hidden="true"></i> Hobbies <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="hobbies" class="collapse">
                        <li>
                            <a href="http://localhost/cvbank/views/hobbies/create.php"><i class="fa fa-envelope"></i>  new  </a>
                        </li>
                        <li>
                            <a href="http://localhost/cvbank/views/hobbies/restore.php"><i class="fa fa-adjust"></i> trash</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> edit</a>
                        </li>

                        <li>
                            <a href="http://localhost/cvbank/views/hobbies/index.php"> <i class="fa fa-th-list" aria-hidden="true"></i> list</a>
                        </li>
                    </ul>
                </li>


                <li class="<?php echo explode('/',$_SERVER['PHP_SELF'])[3] == 'award' ? 'active' : '';?>">
                    <a href="javascript:;" data-toggle="collapse" data-target="#awards"><i class="fa fa-floppy-o" aria-hidden="true"></i> Awards <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="awards" class="collapse">
                        <li>
                            <a href="http://localhost/cvbank/views/award/create.php"><i class="fa fa-envelope"></i>  new  </a>
                        </li>
                        <li>
                            <a href="http://localhost/cvbank/views/award/restore.php"><i class="fa fa-adjust"></i> trash</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> edit</a>
                        </li>

                        <li>
                            <a href="http://localhost/cvbank/views/award/index.php"> <i class="fa fa-th-list" aria-hidden="true"></i> list</a>
                        </li>
                    </ul>
                </li>

                <li class="<?php echo explode('/',$_SERVER['PHP_SELF'])[3] == 'contact' ? 'active' : '';?>">
                    <a href="javascript:;" data-toggle="collapse" data-target="#contacts"><i class="fa fa-mail-reply" aria-hidden="true"></i> Contacts <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="contacts" class="collapse">
                        <li>
                            <a href="http://localhost/cvbank/views/contact/create.php"><i class="fa fa-envelope"></i>  new  </a>
                        </li>
                        <li>
                            <a href="http://localhost/cvbank/views/contact/restore.php"><i class="fa fa-adjust"></i> trash</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> edit</a>
                        </li>

                        <li>
                            <a href="http://localhost/cvbank/views/contact/index.php"> <i class="fa fa-th-list" aria-hidden="true"></i> list</a>
                        </li>
                    </ul>
                </li>























                <li>




            </ul>
        </div>
   <?php  }else {?>
              <div class="collapse  navbar-collapse navbar-ex1-collapse">
                  <ul class="nav navbar-nav side-nav">
                      <li class="active">
                          <a href="http://localhost/cvbank/views/admin/"><i class="fa fa-fw fa-dashboard"></i>Admin Dashboard</a>
                      </li>


                  </ul>
              </div>

        <?php }?>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close " data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="fa fa-info" aria-hidden="true"></i>
                        <?php


                        if(isset($_SESSION['msg'])){
                            echo $_SESSION['msg'];
                            echo "<br/>";
                            unset($_SESSION['msg']);
                        }else{
                            echo "Welcome";
                            echo "<br/>";
                        }

                        if(isset($_SESSION['fail'])){
                            echo "<i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i>" ."  ";
                            echo $_SESSION['fail'];
                            echo "<br/>";
                            unset($_SESSION['fail']);
                        }












                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <?php  $page=explode('/',$_SERVER['PHP_SELF'])[3]; ?>
                    <?php if($page=="aboutme" || $page==="settings"){ ?>
                    <ul class="nav nav-pills">

                    </ul>
                    <?php }else{ ?>
                    <ul class="nav nav-pills">
                        <li role="presentation" class="active"><a href="create.php"><i class="fa fa-envelope"></i>  new  </a></li>
                        <li role="presentation"><a href="restore.php"><i class="fa fa-adjust"></i> trash</a></li>
                        <li role="presentation"><a href="index.php"> <i class="fa fa-th-list" aria-hidden="true"></i> list</a></li>
                    </ul>
                    <?php } ?>
                </div>

            </div>