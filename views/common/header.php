<?php
include ("../../vendor/autoload.php");
session_start();

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
            <a class="navbar-brand" href="index.html"><i class="fa fa-eye-slash" aria-hidden="true"></i> CVBANK</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                <ul class="dropdown-menu message-dropdown">
                    <li class="message-preview">
                        <a href="#">
                            <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                <div class="media-body">
                                    <h5 class="media-heading"><strong>John Smith</strong>
                                    </h5>
                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="message-preview">
                        <a href="#">
                            <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                <div class="media-body">
                                    <h5 class="media-heading"><strong>John Smith</strong>
                                    </h5>
                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="message-preview">
                        <a href="#">
                            <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                <div class="media-body">
                                    <h5 class="media-heading"><strong>John Smith</strong>
                                    </h5>
                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="message-footer">
                        <a href="#">Read All New Messages</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                <ul class="dropdown-menu alert-dropdown">
                    <li>
                        <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">View All</a>
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
                        <a href="../users/index.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                    </li>

                    <li class="divider"></li>
                    <li>
                        <a href="http://localhost/cvbank/views/login/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="active">
                    <a href="http://localhost/cvbank/views/deshboard/"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>

                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#awards"><i class="fa fa-newspaper-o" aria-hidden="true"></i> awards <i class="fa fa-fw fa-caret-down"></i></a>
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

                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#contacts"><i class="fa fa-newspaper-o" aria-hidden="true"></i> contacts <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="contacts" class="collapse">
                        <li>
                            <a href="#"><i class="fa fa-envelope"></i>  new  </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-adjust"></i> trash</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> edit</a>
                        </li>

                        <li>
                            <a href="#"> <i class="fa fa-th-list" aria-hidden="true"></i> list</a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#education"><i class="fa fa-newspaper-o" aria-hidden="true"></i> education <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="education" class="collapse">
                        <li>
                            <a href="#"><i class="fa fa-envelope"></i>  new  </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-adjust"></i> trash</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> edit</a>
                        </li>

                        <li>
                            <a href="#"> <i class="fa fa-th-list" aria-hidden="true"></i> list</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#experiences"><i class="fa fa-newspaper-o" aria-hidden="true"></i> experiences <i class="fa fa-fw fa-caret-down"></i></a>
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

                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#portfolios"><i class="fa fa-newspaper-o" aria-hidden="true"></i> portfolios <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="portfolios" class="collapse">
                        <li>
                            <a href="#"><i class="fa fa-envelope"></i>  new  </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-adjust"></i> trash</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> edit</a>
                        </li>

                        <li>
                            <a href="#"> <i class="fa fa-th-list" aria-hidden="true"></i> list</a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#publication"><i class="fa fa-newspaper-o" aria-hidden="true"></i> publication <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="publication" class="collapse">
                        <li>
                            <a href="#"><i class="fa fa-envelope"></i>  new  </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-adjust"></i> trash</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> edit</a>
                        </li>

                        <li>
                            <a href="#"> <i class="fa fa-th-list" aria-hidden="true"></i> list</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#hobbies"><i class="fa fa-newspaper-o" aria-hidden="true"></i> hobbies <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="hobbies" class="collapse">
                        <li>
                            <a href="#"><i class="fa fa-envelope"></i>  new  </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-adjust"></i> trash</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> edit</a>
                        </li>

                        <li>
                            <a href="#"> <i class="fa fa-th-list" aria-hidden="true"></i> list</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#posts"><i class="fa fa-newspaper-o" aria-hidden="true"></i> posts <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="posts" class="collapse">
                        <li>
                            <a href="http://localhost/cvbank/views/post/index.php"><i class="fa fa-envelope"></i>  new  </a>
                        </li>
                        <li>
                            <a href="http://localhost/cvbank/views/post/restore.php"><i class="fa fa-adjust"></i> trash</a>
                        </li>


                        <li>
                            <a href="http://localhost/cvbank/views/post/index.php"> <i class="fa fa-th-list" aria-hidden="true"></i> list</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#services"><i class="fa fa-newspaper-o" aria-hidden="true"></i> services <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="services" class="collapse">
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

                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#settings"><i class="fa fa-newspaper-o" aria-hidden="true"></i> settings <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="settings" class="collapse">
                        <li>
                            <a href="http://localhost/cvbank/views/settings/create.php"><i class="fa fa-envelope"></i>  new  </a>
                        </li>
                        <li>
                            <a href="http://localhost/cvbank/views/settings/restore.php"><i class="fa fa-adjust"></i> trash</a>
                        </li>
                        <li>
                            <a href="http://localhost/cvbank/views/settings/index.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> edit</a>
                        </li>

                        <li>
                            <a href="http://localhost/cvbank/views/settings/index.php"> <i class="fa fa-th-list" aria-hidden="true"></i> list</a>
                        </li>
                    </ul>
                </li>



                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#AboutMe"><i class="fa fa-newspaper-o" aria-hidden="true"></i> About Me <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="AboutMe" class="collapse">
                        <li>
                            <a href="#"><i class="fa fa-envelope"></i>  new  </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-adjust"></i> trash</a>
                        </li>
                        <li>
                            <a href="#"> <i class="fa fa-th-list" aria-hidden="true"></i> list</a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#skill"><i class="fa fa-newspaper-o" aria-hidden="true"></i> skill <i class="fa fa-fw fa-caret-down"></i></a>
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
                <li>

                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#facts"><i class="fa fa-newspaper-o" aria-hidden="true"></i> facts <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="facts" class="collapse">
                        <li>
                            <a href="#"><i class="fa fa-envelope"></i>  new  </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-adjust"></i> trash</a>
                        </li>
                        <li>
                            <a href="#"> <i class="fa fa-th-list" aria-hidden="true"></i> list</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                </li>

            </ul>
        </div>
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