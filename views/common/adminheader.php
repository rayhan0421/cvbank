
<?php
include ("../../vendor/autoload.php");
session_start();

if(!isset($_SESSION['userinfo'])){

    header("location: http://localhost/cvbank/views/login/");
}else{
    $role= $_SESSION['userinfo'][0]['user_role'];


    if($role==1){

        header("location: http://localhost/cvbank/views/deshboard/");
    }
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
    <link href="../../assets/css/jquery.dataTables.min.css" rel="stylesheet">
   <!-- Custom Fonts -->
    <link href="../../assets/deshboard/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>



    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="../../assets/deshboard/js/jquery.js"></script>
    <script src="../../assets/js/jquery.dataTables.min.js"></script>
    <script src="../../assets/js/buttons.print.min.js"></script>
    <script src="../../assets/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="../../assets/ckeditor/ckeditor.js"></script>


    <script type="text/javascript">
        function openKCFinder(div) {
            window.KCFinder = {
                callBack: function(url) {
                    window.KCFinder = null;
                    div.innerHTML = '<div style="margin:5px">Loading...</div>';
                    var img = new Image();
                    img.src = url;
                    img.onload = function() {

                        div.innerHTML = '<img height="100" width="100" id="img" src="' + url + '" />';
                        var img = document.getElementById('img');
                        var o_w = img.offsetWidth;
                        var o_h = img.offsetHeight;
                        var f_w = div.offsetWidth;
                        var f_h = div.offsetHeight;
                        if ((o_w > f_w) || (o_h > f_h)) {
                            if ((f_w / f_h) > (o_w / o_h))
                                f_w = parseInt((o_w * f_h) / o_h);
                            else if ((f_w / f_h) < (o_w / o_h))
                                f_h = parseInt((o_h * f_w) / o_w);
                            img.style.width = f_w + "px";
                            img.style.height = f_h + "px";
                        } else {
                            f_w = o_w;
                            f_h = o_h;
                        }
                        img.style.marginLeft = parseInt((div.offsetWidth - f_w) / 2) + 'px';
                        img.style.marginTop = parseInt((div.offsetHeight - f_h) / 2) + 'px';
                        img.style.visibility = "visible";
                        getimagelink(url);
                    }
                }
            };
            window.open('/cvbank/src/kcfinder/browse.php?type=images&dir=images/public',
                'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
                'directories=0, resizable=1, scrollbars=0, width=800, height=600'
            );
        }
        function openKCFinder2(div) {
            window.KCFinder = {
                callBack: function(url) {
                    window.KCFinder = null;
                    div.innerHTML = '<div style="margin:5px">Loading...</div>';
                    var img = new Image();
                    img.src = url;
                    img.onload = function() {

                        div.innerHTML = '<img height="100" width="100" id="img2" src="' + url + '" />';
                        var img = document.getElementById('img2');
                        var o_w = img.offsetWidth;
                        var o_h = img.offsetHeight;
                        var f_w = div.offsetWidth;
                        var f_h = div.offsetHeight;
                        if ((o_w > f_w) || (o_h > f_h)) {
                            if ((f_w / f_h) > (o_w / o_h))
                                f_w = parseInt((o_w * f_h) / o_h);
                            else if ((f_w / f_h) < (o_w / o_h))
                                f_h = parseInt((o_h * f_w) / o_w);
                            img.style.width = f_w + "px";
                            img.style.height = f_h + "px";
                        } else {
                            f_w = o_w;
                            f_h = o_h;
                        }
                        img.style.marginLeft = parseInt((div.offsetWidth - f_w) / 2) + 'px';
                        img.style.marginTop = parseInt((div.offsetHeight - f_h) / 2) + 'px';
                        img.style.visibility = "visible";
                        getimagelink2(url);
                    }
                }
            };
            window.open('/cvbank/src/kcfinder/browse.php?type=images&dir=images/public',
                'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
                'directories=0, resizable=1, scrollbars=0, width=800, height=600'
            );
        }






    </script>
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
            <a href="http://localhost/cvbank/views/deshboard/"><img height="50" width="80" src="../../assets/logo.png" /></a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">


            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php if(array_key_exists('userinfo', $_SESSION)){
                      echo $name = $_SESSION['userinfo'][0]['username'];

                      $id= $_SESSION['userinfo'][0]['id'];



                    } ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                    <li>
                        <a href="../users/index.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>

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
                    <a href="http://localhost/cvbank/views/admin/"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>



                <li>
                    <a href="resume.php"><i class="fa fa-book"></i> Resume </a>
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
