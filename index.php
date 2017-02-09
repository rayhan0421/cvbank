<?php
include ("vendor/autoload.php");
session_start();
use App\home\search\search;

if(isset($_GET['skill'])){

 $_SESSION['skill'] = $_GET['skill'];
}else{
    unset($_SESSION['skill']);
}



$totalrows='';
$totalpage='';
if(isset($_GET['page'])){
    $currentpage = $_GET['page']-1;
}else{
    $currentpage = 0;
}


?>

<?php
if(isset($_GET['keyword'])){
   $keyword='';
   foreach ($_GET as $key=>$value){

       $keyword.=$key."=".$value."&";
    }


}


?>



<html>
<head>
    <title>cvsearch</title>

    <link href="assets/deshboard/css/bootstrap.min.css" rel="stylesheet">
 <style>

     #flipkart-navbar {
         background-color: #81B71A !important;
         color: #FFFFFF;
     }

     .row1{
         padding-top: 10px;
     }

     .row2 {
         padding-bottom: 20px;
     }

     .flipkart-navbar-input {
         padding: 11px 16px;
         border-radius: 2px 0 0 2px;
         border: 0 none;
         outline: 0 none;
         font-size: 15px;
     }

     .flipkart-navbar-button {
         background-color: #ffe11b;
         border: 1px solid #ffe11b;
         border-radius: 0 2px 2px 0;
         color: #565656;
         padding: 10px 0;
         height: 43px;
         cursor: pointer;
     }

     .cart-button {
         background-color: #2469d9;
         box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .23), inset 1px 1px 0 0 hsla(0, 0%, 100%, .2);
         padding: 10px 0;
         text-align: center;
         height: 41px;
         border-radius: 2px;
         font-weight: 500;
         width: 120px;
         display: inline-block;
         color: #FFFFFF;
         text-decoration: none;
         color: inherit;
         border: none;
         outline: none;
     }

     .cart-button:hover{
         text-decoration: none;
         color: #fff;
         cursor: pointer;
     }

     .cart-svg {
         display: inline-block;
         width: 16px;
         height: 16px;
         vertical-align: middle;
         margin-right: 8px;
     }

     .item-number {
         border-radius: 3px;
         background-color: rgba(0, 0, 0, .1);
         height: 20px;
         padding: 3px 6px;
         font-weight: 500;
         display: inline-block;
         color: #fff;
         line-height: 12px;
         margin-left: 10px;
     }

     .upper-links {
         display: inline-block;
         padding: 0 11px;
         line-height: 23px;
         font-family: 'Roboto', sans-serif;
         letter-spacing: 0;
         color: inherit;
         border: none;
         outline: none;
         font-size: 12px;
     }

     .dropdown {
         position: relative;
         display: inline-block;
         margin-bottom: 0px;
     }

     .dropdown:hover {
         background-color: #fff;
     }

     .dropdown:hover .links {
         color: #000;
     }

     .dropdown:hover .dropdown-menu {
         display: block;
     }

     .dropdown .dropdown-menu {
         position: absolute;
         top: 100%;
         display: none;
         background-color: #fff;
         color: #333;
         left: 0px;
         border: 0;
         border-radius: 0;
         box-shadow: 0 4px 8px -3px #555454;
         margin: 0;
         padding: 0px;
     }

     .links {
         color: #fff;
         text-decoration: none;
     }

     .links:hover {
         color: #fff;
         text-decoration: none;
     }

     .profile-links {
         font-size: 12px;
         font-family: 'Roboto', sans-serif;
         border-bottom: 1px solid #e9e9e9;
         box-sizing: border-box;
         display: block;
         padding: 0 11px;
         line-height: 23px;
     }

     .profile-li{
         padding-top: 2px;
     }

     .largenav {
         display: none;
     }

     .smallnav{
         display: block;
     }

     .smallsearch{
         margin-left: 15px;
         margin-top: 15px;
     }

     .menu{
         cursor: pointer;
     }

     @media screen and (min-width: 768px) {
         .largenav {
             display: block;
         }
         .smallnav{
             display: none;
         }
         .smallsearch{
             margin: 0px;
         }
     }
     a:active {
         background-color: yellow;
     }

     /*Sidenav*/
     .sidenav {
         height: 100%;
         width: 0;
         position: fixed;
         z-index: 1;
         top: 0;
         left: 0;
         background-color: #fff;
         overflow-x: hidden;
         transition: 0.5s;
         box-shadow: 0 4px 8px -3px #555454;
         padding-top: 0px;
     }

     .sidenav a {
         padding: 8px 8px 8px 32px;
         text-decoration: none;
         font-size: 25px;
         color: #818181;
         display: block;
         transition: 0.3s
     }

     .sidenav .closebtn {
         position: absolute;
         top: 0;
         right: 25px;
         font-size: 36px;
         margin-left: 50px;
         color: #fff;
     }

     @media screen and (max-height: 450px) {
         .sidenav a {font-size: 18px;}
     }

     .sidenav-heading{
         font-size: 36px;
         color: #fff;
     }
 </style>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "70%";
            // document.getElementById("flipkart-navbar").style.width = "50%";
            document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.body.style.backgroundColor = "rgba(0,0,0,0)";
        }
        function expr2()
        {
            var checkbox = document.getElementById("skill");

            if(!checkbox.checked){
               <?php unset($_SESSION['skill']); ?>;
                alert( checkbox.checked );
            }else{
              <?php $_SESSION['skill'] = 'skill'; ?>
                alert( checkbox.checked );
            }


        }

        function expr()
        {
            var i = 0 ;
            i = <?php echo 35; ?>;
            alert( i );
        }
    </script>
</head>

<body>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<div id="flipkart-navbar">
    <div class="container">
        <div class="row row1">
            <ul class="largenav pull-right">
                <li class="upper-links"><a class="links" href="http://localhost/cvbank/views/users">Login</a></li>
                <li class="upper-links"><a class="links" href="http://localhost/cvbank/views/users">SignUp</a></li>



            </ul>
        </div>

        <div class="row row2">
            <div class="col-sm-2">
                <h2 style="margin:0px;"><span class="smallnav menu" onclick="openNav()">☰ CVBANK</span></h2>
                <a href="index.php" style="text-decoration: none"> <h1 style="margin:0px;"><span class="largenav">CVBANK</span></h1> </a>
            </div>
            <div class="flipkart-navbar-search smallsearch col-sm-8 col-xs-11">
              <form action="" method="get">
                  <div class="row">
                      <div class="form-group" style="width: 30%">
                          <label for="sel1">Filter:</label>
                          <select name="filter" class="form-control" id="sel1">
                              <option selected> no filter </option>
                              <option value="skill">Skill</option>
                              <option value="exp">Experience</option>

                          </select>
                      </div>
                      <input  class="flipkart-navbar-input col-xs-11" style="color:black" type="search" placeholder="Search for employee, cv and resume" autosave="saved-searches" name="keyword">

                      <button class="flipkart-navbar-button col-xs-1">
                          <svg width="15px" height="15px">
                              <path d="M11.618 9.897l4.224 4.212c.092.09.1.23.02.312l-1.464 1.46c-.08.08-.222.072-.314-.02L9.868 11.66M6.486 10.9c-2.42 0-4.38-1.955-4.38-4.367 0-2.413 1.96-4.37 4.38-4.37s4.38 1.957 4.38 4.37c0 2.412-1.96 4.368-4.38 4.368m0-10.834C2.904.066 0 2.96 0 6.533 0 10.105 2.904 13 6.486 13s6.487-2.895 6.487-6.467c0-3.572-2.905-6.467-6.487-6.467 "></path>
                          </svg>
                      </button>

                  </div>

              </form>

            </div>

        </div>
    </div>
</div>

<div class="container">

    <div class="row">
        <div class="col-lg-12">

            <div class="container">
                <?php if(isset($_GET['keyword'])) {?>
                 <?php
                    $results=array();
                    $search = new search();

                    $search->sktitle = "no";
                    if(!empty($_GET['keyword'])){
                        $search->setdata($_GET);
                        $results = array();

                        $sl=0;
                        $results = $search->search($totalrows,$perpage,$currentpage,$sl);
                        $totalpage =  ceil($totalrows/$perpage);
                    }



                    ?>
                <hgroup class="mb20">
                    <h1>total Search <?php echo $totalrows." and " ;?> Results for <?php echo $_GET['keyword'] ?></h1>

                    <br/>
                </hgroup>
                 <?php if(!empty($_GET['keyword'])){

                     ?>

                    

                        <?php foreach ($results as $value) { ?>
                <section class="col-xs-12 col-sm-6 col-md-12">
                    <article class="search-result row">

                        <div class="col-xs-12 col-sm-12 col-md-7 excerpet">
                            <h3><a href="http://localhost/cvbank/views/public/resume?id=<?php echo $value['uid']; ?> " title=""><?php echo $value['abtitle'] ?></a></h3>
                            <p> <?php echo substr($value['abbio'],0,200); ?>.......<a href="http://localhost/cvbank/views/public/resume?id=<?php echo $value['uid']; ?> ">readmore</a> </p>
                        </div>
                        <span class="clearfix borda"></span>
                    </article>




                </section>
                 <?php } ?>
                  <?php  } ?>
                <?php  } ?>

                <hr/>
                <ul class="pagination">
                <?php
                if(isset($totalpage) && !empty($totalpage)){
                    for($i=1;$i<=$totalpage;$i++){
                        ?>
                    <li> <a class="active" href="?<?php echo $keyword; ?>page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php
                    }
                }


                ?>
                </ul>


                <hr/>
            </div>
            <?php if(!isset($_GET['keyword'])) {?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                  <h1>no cv found</h1>
                    </div>

                </div>

            </div>
            <?php  } ?>

       </div>

    </div>
</div>

</body>


</html>
