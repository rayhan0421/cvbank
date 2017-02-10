<?php include_once("../common/adminheader.php"); ?>

<?php
use App\admin\resume;
$resume= new resume();
$sl=1;
?>

<?php
if(isset($_SESSION['about'])){


?>
    <script> alert("update seccesfully"); </script>
 <?php

}
unset($_SESSION['about']);
?>

<?php

if(!isset($_GET['id']) && !empty($_GET['id'])){
    ?>
    <a class="btn btn-info" href="resume.php">Return </a> <br/>
    <?php
   die("no user found");

}else{
    $resume->setdata($_GET);
?>

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                User  <small> Overview</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i>Active User
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->


    <!-- /.row -->
<div class="row">
    <div class="col-lg-12">
    </div>

</div>
    <div class="row">
   <div class="col-lg-12">
       <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
           <div class="panel panel-default">
               <div class="panel-heading" role="tab" id="headingOne">
                   <h4 class="panel-title">
                       <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                           About #1
                       </a>
                   </h4>
               </div>
               <div id="collapseOne" class="panel-collapse collapse <?php if(isset($_SESSION['aboute'])){ echo "in"; unset($_SESSION['aboute']);  } ?>" role="tabpanel" aria-labelledby="headingOne">
                   <div class="panel-body">
                       <ul class="nav nav-pills">
                           <li class="active"><a data-toggle="pill" href="#about">views</a></li>

                           <li><a data-toggle="pill" href="#aboutadd">Add New</a></li>

                       </ul>

                       <div class="tab-content">
                           <div id="about" class="tab-pane fade in active">
                               <h3>views</h3>
                               <table class="table">
                                   <tr>
                                       <td>SL</td>
                                       <td>Title </td>
                                       <td>phone</td>
                                       <td>bio</td>

                                       <td> action </td>
                                   </tr>
                                   <?php
                                   $about = $resume->about();

                                   if(is_array($about)){

                                     ?>
                                           <form action="abouts/update.php" method="post">
                                               <tr>
                                                   <td>  <?php echo 1; ?> </td>
                                                   <td>
                                                       <div class="form-group">
                                                       <input class="form-control" type="text" value=" <?php echo $about['title']; ?>" name="title" >
                                                       </div>
                                                   </td>
                                                   <td >
                                                       <div class="form-group">
                                                       <input class="form-control" type="text" value="<?php echo $about['phone']; ?> " name="phone">
                                                       </div>
                                                   </td>
                                                   <td width="300" >
                                                       <div class="form-group">
                                                       <textarea class="form-control" cols="26" rows="8" name="bio"><?php echo $about['bio'] ;?> </textarea>
                                                       </div>

                                                   </td>


                                                   </td>

                                                   <td>
                                                       <input  type="hidden" name="id" value="<?php echo $about['aboutid']; ?>" />
                                                       <input type="hidden" name="user_id" value="<?php echo $about['user_id']; ?>" />
                                                       <input type="submit" value="Update" >
                                                       <a   href="abouts/delete.php?user_id=<?php echo $about['user_id']; ?> & id=<?php  echo $about['aboutid']; ?>"> Delete </a> </td>
                                               </tr>
                                           </form>



                                           <?php


                                   }

                                   ?>
                               </table>
                           </div>

                           <div id="aboutadd" class="tab-pane fade">
                               <h3>add new</h3>
                               <form action="abouts/store.php" method="post">



                                   <div class="form-group">
                                       <label for="usr">Title:</label>
                                       <input type="text" name="title" value="" class="form-control" id="usr">
                                   </div>
                                   <div class="form-group">
                                       <label for="pwd">phone</label>
                                       <input type="text"   name="phone"  value="" class="form-control" id="pwd">
                                   </div>
                                   <div class="form-group">
                                       <label for="bio">bio</label>
                                       <textarea class="form-control" rows="5" name="bio" id="bio"> </textarea>
                                   </div>
                                   <input type="hidden" name="user_id"  value="<?php echo $_GET['id']; ?>" class="form-control" id="pwd">


                                   <button type="submit" class="btn btn-primary">Add</button>
                               </form>
                           </div>

                       </div>

                   </div>
               </div>
           </div>
           <div class="panel panel-default">
               <div class="panel-heading" role="tab" id="headingexpe">
                   <h4 class="panel-title">
                       <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseexp" aria-expanded="true" aria-controls="collapseexp">
                          experience #2
                       </a>
                   </h4>
               </div>
               <div id="collapseexp" class="panel-collapse collapse <?php if(isset($_SESSION['about'])){ echo "in"; /* unset($_SESSION['about']);*/ } ?>" role="tabpanel" aria-labelledby="headingexpe">
                   <div class="panel-body">
                       <ul class="nav nav-pills">
                           <li class="active"><a data-toggle="pill" href="#expe">views</a></li>

                           <li><a data-toggle="pill" href="#expeadd">Add New</a></li>

                       </ul>

                       <div class="tab-content">
                           <div id="expe" class="tab-pane fade in active">
                               <h3>views</h3>
                               <table class="table">
                                   <tr>

                                       <td>Title </td>
                                       <td>desc</td>
                                       <td>experience</td>
                                       <td>level</td>
                                       <td>area</td>
                                       <td> action </td>
                                   </tr>
                                   <?php
                                   $exp = $resume->experience();
                                   if(is_array($exp)){ ?>

                                    <?php  foreach($exp as $value){  ?>
                                           <?php $l=1;$l++ ?>
                                           <form action="experiences/update.php" method="post">
                                               <tr>

                                                   <td> <input type="text" value=" <?php echo $value['designation']; ?>" name="designation" >  </td>
                                                   <td > <input type="text" value="<?php echo $value['company_name']; ?> " name="company_name"></td>
                                                   <td ><input type="date" value="<?php echo $value['start_date'] ;?>" name="start_date" ></td>
                                                   <td > <input type="date" value="<?php echo $value['end_date'] ;?>" name="end_date" ></td>
                                                   <td > <input type="text" value="<?php echo $value['company_location'];?>" name="company_location">


                                                   </td>

                                                   <td>
                                                       <input  type="hidden" name="id" value="<?php echo $value['experiencesid']; ?>" />
                                                       <input type="hidden" name="user_id" value="<?php echo $value['user_id']; ?>" />
                                                       <input type="submit" >
                                                       <a   href="experiences/delete.php?user_id=<?php echo $value['user_id']; ?> & id=<?php  echo $value['experiencesid']; ?>"> Delete </a> </td>
                                               </tr>
                                           </form>



                                           <?php

                                       } ?>
                               <?php
                                   }

                                   ?>



                               </table>
                           </div>

                           <div id="expeadd" class="tab-pane fade">
                               <h3>add new</h3>
                               <div class="table-responsive">
                                   <form role="form" action="experiences/store.php" method="post">

                                       <div class="form-group">
                                           <label>Designation</label>
                                           <input name="designation" class="form-control">

                                       </div>
                                       <div class="form-group">
                                           <label>Company_name</label>
                                           <input name="company_name" class="form-control">

                                       </div>

                                       <div class="form-group">
                                           <label>Start_date</label>
                                           <input name="start_date" class="form-control"  type="date">

                                       </div>
                                       <div class="form-group">
                                           <label>End_date</label>
                                           <input name="end_date" class="form-control"  type="date">

                                       </div>
                                       <div class="form-group">
                                           <label>Company_location</label>
                                           <input name="company_location" class="form-control">

                                       </div>
                                       <input  type="hidden" name="user_id" value="<?php echo $_GET['id']; ?>" class="form-control">
                                       <button type="submit" class="btn btn-default">Save</button>

                                   </form>
                               </div>
                           </div>

                       </div>
                   </div>
               </div>
           </div>
           <div class="panel panel-default">
               <div class="panel-heading" role="tab" id="headingskill">
                   <h4 class="panel-title">
                       <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseskill" aria-expanded="true" aria-controls="collapseskill">
                           skill #3
                       </a>
                   </h4>
               </div>
               <div id="collapseskill" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingskill">
                   <div class="panel-body">
                       <ul class="nav nav-pills">



                           <li><a data-toggle="pill" href="#skilldelete">views</a></li>
                           <li><a data-toggle="pill" href="#skilladd">Add New</a></li>
                       </ul>

                       <div class="tab-content">


                           <div id="skilldelete" class="tab-pane fade in active">
                               <h3>views</h3>
                               <table class="table-responsive">
                                   <tr>

                                       <td>Title </td>
                                       <td>desc</td>
                                       <td>experience</td>
                                       <td>level</td>
                                       <td>area</td>
                                       <td> action </td>
                                   </tr>
                                   <?php
                                   $skill = $resume->skill();

                                   if(is_array($about)){

                                       foreach ($skill as $value){ $sl=1;?>
                                           <form action="skills/update.php" method="post">
                                               <tr>

                                                   <td> <input type="text" value=" <?php echo $value['title']; ?>" name="title" >  </td>
                                                   <td > <input type="text" value="<?php echo $value['description']; ?> " name="desc"></td>
                                                   <td ><input type="text" value="<?php echo $value['experience'] ;?>" name="experience" ></td>
                                                   <td > <input type="text" value="<?php echo $value['level'] ;?>" name="level" ></td>
                                                   <td > <input type="text" value="<?php echo $value['experience_area'];?>" name="area">


                                                   </td>

                                                   <td>
                                                       <input  type="hidden" name="id" value="<?php echo $value['skillid']; ?>" />
                                                       <input type="hidden" name="user_id" value="<?php echo $value['user_id']; ?>" />
                                                       <input type="submit" >
                                                       <a   href="skills/delete.php?user_id=<?php echo $value['user_id']; ?> & id=<?php  echo $value['skillid']; ?>"> Delete </a> </td>
                                               </tr>
                                           </form>



                                           <?php

                                       }
                                   }

                                   ?>
                               </table>
                           </div>


                           <div id="skilladd" class="tab-pane fade">
                               <h3>add new</h3>
<p>
                               <div class="table-responsive">
                                   <form role="form" action="skills/store.php" method="post">

                                       <div class="form-group">
                                           <label>Title</label>
                                           <input name="title" class="form-control">

                                       </div>
                                       <div class="form-group">
                                           <label>desc</label>
                                           <input name="desc" class="form-control">

                                       </div>

                                       <div class="form-group">
                                           <label>lavel</label>
                                           <input name="lavel" class="form-control">

                                       </div>
                                       <div class="form-group">
                                           <label>experienc</label>
                                           <input name="experience" class="form-control">

                                       </div>
                                       <div class="form-group">
                                           <label>area</label>
                                           <input name="area" class="form-control">

                                       </div>
                                       <input name="id" type="hidden" value="<?php echo $_GET['id']; ?>" class="form-control">
                                       <button type="submit" class="btn btn-default">Save</button>

                                   </form>

</p>

                                 </div>

                       </div>
                   </div>
               </div>
           </div>
           <div class="panel panel-default">
               <div class="panel-heading" role="tab" id="headingeducation">
                   <h4 class="panel-title">
                       <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseedu" aria-expanded="false" aria-controls="collapseedu">
                           education #4
                       </a>
                   </h4>
               </div>
               <div id="collapseedu" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingeducation">
                   <div class="panel-body">
                       <ul class="nav nav-pills">
                           <li class="active"><a data-toggle="pill" href="#education">views</a></li>

                           <li><a data-toggle="pill" href="#educationadd">Add New</a></li>

                       </ul>

                       <div class="tab-content">
                           <div id="education" class="tab-pane fade in active">
                               <h3>views</h3>

                                           <table class="table-responsive" >
                                               <tr>

                                                   <td>Title </td>
                                                   <td >institute</td>
                                                   <td >passing_year</td>
                                                   <td >main_subject</td>
                                                   <td >education_board</td>
                                                   <td > course_duration </td>
                                                   <td >action</td>
                                               </tr>
                                               <?php
                                               $education = $resume->education();

                                               if(is_array($education)){

                                                   foreach ($education as $value){ $sl=1;?>
                                                       <form action="educations/update.php" method="post">
                                                           <tr >

                                                               <td > <input type="text" value=" <?php echo $value['title']; ?>" name="title" >  </td>
                                                               <td > <input type="text" value="<?php echo $value['institute']; ?> " name="institute"></td>
                                                               <td ><input type="text" value="<?php echo $value['result'] ;?>" name="result" ></td>
                                                               <td > <input type="text" value="<?php echo $value['passing_year'] ;?>" name="passing_year" ></td>
                                                               <td  > <input type="text" value="<?php echo $value['main_subject'];?>" name="main_subject"> </td>

                                                               <td > <input type="text" value="<?php echo $value['education_board'];?>" name="education_board"> </td>
                                                               <td >

                                                                   <input type="text" value="<?php echo $value['course_duration'];?>" name="course_duration">


                                                               </td>

                                                               <td>
                                                                   <input  type="hidden" name="id" value="<?php echo $value['educationsid']; ?>" />
                                                                   <input type="hidden" name="user_id" value="<?php echo $value['user_id']; ?>" />
                                                                   <input type="submit" value="update">
                                                                   <a   href="educations/delete.php?user_id=<?php echo $value['user_id']; ?> & id=<?php  echo $value['educationsid']; ?>"> Delete </a>
                                                               </td>
                                                       </form>
                                                           </tr>




                                                       <?php  } ?>

                                               <?php } ?>
                                           </table>

                           </div>

                           <div id="educationadd" class="tab-pane fade">
                               <h3>add new</h3>
                               <div class="table-responsive">
                                   <form role="form" action="educations/store.php" method="post">

                                       <div class="form-group">
                                           <label>Title</label>
                                           <input name="title" class="form-control">

                                       </div>
                                       <div class="form-group">
                                           <label>Institute</label>
                                           <input name="institute" class="form-control">

                                       </div>

                                       <div class="form-group">
                                           <label>Result</label>
                                           <input name="result" class="form-control">

                                       </div>
                                       <div class="form-group">
                                           <label>Passing_year</label>
                                           <input name="passing_year" class="form-control" type="date">

                                       </div>
                                       <div class="form-group">
                                           <label>Main_subject</label>
                                           <input name="main_subject" class="form-control">

                                       </div>
                                       <div class="form-group">
                                           <label>Education_board</label>
                                           <input name="education_board" class="form-control">

                                       </div>
                                       <div class="form-group">
                                           <label>Course_duration</label>
                                           <input name="course_duration" class="form-control">

                                       </div>
                                       <input name="id" type="hidden" value="<?php echo $_GET['id']; ?>" class="form-control">
                                       <button type="submit" class="btn btn-default">Save</button>

                                   </form>
                               </div>
                           </div>

                       </div>
                   </div>
               </div>
           </div>
           <div class="panel panel-default">
               <div class="panel-heading" role="tab" id="headingportfolio">
                   <h4 class="panel-title">
                       <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseportfolio" aria-expanded="false" aria-controls="collapseportfolio">
                           portfolio #5
                       </a>
                   </h4>
               </div>
               <div id="collapseportfolio" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingportfolio">
                   <div class="panel-body">
                       <ul class="nav nav-pills">
                           <li class="active"><a data-toggle="pill" href="#portfolio">views</a></li>

                           <li><a data-toggle="pill" href="#portfolioadd">Add New</a></li>

                       </ul>

                       <div class="tab-content">
                           <div id="portfolio" class="tab-pane fade in active">
                               <h3>views</h3>

                               <table class="table">
                                   <tr>

                                       <td>Title </td>
                                       <td>desc</td>
                                       <td>img</td>
                                       <td>category</td>
                                       <td> action </td>
                                   </tr>
                                   <?php
                                   $portfolio = $resume->portfolio();

                                   if(is_array($portfolio)){

                                       foreach ($portfolio as $value){ $sl=1;?>
                                           <form action="portfolios/update.php" method="post" enctype="multipart/form-data">
                                               <tr>

                                                   <td> <input type="text" value=" <?php echo $value['title']; ?>" name="title" >  </td>
                                                   <td > <input type="text" value="<?php echo $value['description']; ?> " name="description"></td>
                                                   <td >
                                                       <input type="file" value="<?php echo $value['img'] ;?>" name="img" >
                                                       <?php if(!empty($value['img'])) { ?>

                                                           <img height="150" width="150" src="http://localhost/cvbank/storage/images/<?php echo $value['img']; ?>" />
                                                       <?php } ?>
                                                   </td>
                                                   <td > <input type="text" value="<?php echo $value['category'] ;?>" name="category" ></td>


                                                   </td>

                                                   <td>
                                                       <input  type="hidden" name="id" value="<?php echo $value['portfoliosid']; ?>" />
                                                       <input type="hidden" name="user_id" value="<?php echo $value['user_id']; ?>" />
                                                       <input type="submit" >
                                                       <a   href="portfolios/delete.php?user_id=<?php echo $value['user_id']; ?> & id=<?php  echo $value['portfoliosid']; ?>"> Delete </a> </td>
                                               </tr>
                                           </form>



                                           <?php

                                       }
                                   }

                                   ?>
                               </table>
                           </div>

                           <div id="portfolioadd" class="tab-pane fade">
                               <h3>add new</h3>
                               <div class="table-responsive">
                                   <form role="form" action="portfolios/store.php" method="post" enctype="multipart/form-data">

                                       <div class="form-group">
                                           <label>Title</label>
                                           <input name="title" class="form-control">

                                       </div>
                                       <div class="form-group">
                                           <label>Description</label>
                                           <input name="description" class="form-control">

                                       </div>

                                       <div class="form-group">
                                           <label>Image</label>
                                           <input type="file" name="img" class="form-control">

                                       </div>
                                       <div class="form-group">
                                           <label>Category</label>
                                           <input name="category" class="form-control">

                                       </div>
                                       <input name="user_id" type="hidden" value="<?php echo $_GET['id']; ?>" class="form-control">


                                       <button type="submit" class="btn btn-default">Save</button>

                                   </form>
                               </div>
                           </div>

                       </div>
                   </div>
               </div>
           </div>

           </div>
           <div class="panel panel-default">
               <div class="panel-heading" role="tab" id="headingfacts">
                   <h4 class="panel-title">
                       <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefacts" aria-expanded="false" aria-controls="collapsefacts">
                           facts #7
                       </a>
                   </h4>
               </div>
               <div id="collapsefacts" class="panel-collapse collapse <?php if(isset($_SESSION['facts'])){ echo "in" ; unset($_SESSION['facts']); } ?>" role="tabpanel" aria-labelledby="headingfacts">
                   <div class="panel-body">
                       <ul class="nav nav-pills">
                           <li class="active"><a data-toggle="pill" href="#factsnew">views</a></li>

                           <li><a data-toggle="pill" href="#factsadd">Add New</a></li>

                       </ul>

                       <div class="tab-content">
                           <div id="factsnew" class="tab-pane fade in active">
                               <h3>views</h3>
                               <table class="table">
                                   <tr>

                                       <td>Title </td>

                                       <td>no_of_items</td>
                                       <td>imges</td>

                                       <td> action </td>
                                   </tr>
                                   <?php
                                   $facts = $resume->facts();

                                   if(is_array($facts)){
                                       $sl=1;

                                       foreach ($facts as $value){ $sl++;?>
                                           <form action="facts/update.php" method="post" enctype="multipart/form-data">
                                               <tr>

                                                   <td> <input type="text" value=" <?php echo $value['title']; ?>" name="title" >  </td>

                                                   <td ><input type="text" value="<?php echo $value['no_of_items'] ;?>" name="no_of_items" ></td>
                                                   <td >
                                                      <?php if(!empty($value['img'])) { ?>

                                                       <img  id="previmg22<?php echo $sl; ?>"  src="http://localhost<?php echo $value['img']; ?>" />
                                                  <?php } ?>
                                                       <div id="image" onclick="openKCFinder22<?php echo $sl; ?>(this)"><div style="margin:1px">Click here to choose an image</div></div>

                                                       <input type="hidden" name="img" id="imagesrc22<?php echo $sl; ?>">

                                                   </td>



                                                   </td>

                                                   <td>
                                                       <input  type="hidden" name="id" value="<?php echo $value['factsid']; ?>" />
                                                       <input type="hidden" name="user_id" value="<?php echo $value['user_id']; ?>" />
                                                       <input type="submit" value="Update">
                                                       <a   href="facts/delete.php?user_id=<?php echo $value['user_id']; ?> & id=<?php  echo $value['factsid']; ?>"> Delete </a> </td>
                                               </tr>
                                           </form>


                                           <script type="text/javascript" >
                                               function openKCFinder22<?php echo $sl; ?>(div) {
                                                   window.KCFinder = {
                                                       callBack: function(url) {
                                                           window.KCFinder = null;
                                                           div.innerHTML = '<div style="margin:5px">Loading...</div>';
                                                           var img = new Image();
                                                           img.src = url;
                                                           img.onload = function() {

                                                               div.innerHTML = '<img height="100" width="100" id="img22<?php echo $sl; ?>" src="' + url + '" />';
                                                               var img = document.getElementById('img22<?php echo $sl; ?>');
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
                                                               getimagelink22<?php echo $sl; ?>(url);
                                                           }
                                                       }
                                                   };
                                                   window.open('/cvbank/src/kcfinder/browse.php?type=images&dir=images/public',
                                                       'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
                                                       'directories=0, resizable=1, scrollbars=0, width=800, height=600'
                                                   );
                                               }
                                               // Replace the <textarea id="editor1"> with a CKEditor



                                               function getimagelink22<?php echo $sl; ?>(src) {
                                                   var link = document.getElementById("previmg22<?php echo $sl; ?>");
                                                   link.style.display = "none";


                                                   document.getElementById("imagesrc22<?php echo $sl; ?>").value =src;

                                               }

                                           </script>


                                           <?php

                                       }
                                   }

                                   ?>
                               </table>
                            </div>

                           <div id="factsadd" class="tab-pane fade">
                               <h3>add new</h3>
                               <div class="table-responsive">
                                   <form role="form" action="facts/store.php" method="post" enctype="multipart/form-data">

                                       <div class="form-group">
                                           <label>Title</label>
                                           <input name="title" class="form-control">

                                       </div>
                                       <div class="form-group">
                                           <label>No of items</label>
                                           <input type="number" name="no_of_items" class="form-control"> </input>
                                           <input type="hidden" name="user_id" value="<?php echo $_GET['id']; ?>" class="form-control"> </input>

                                       </div>

                                       <div class="form-group">
                                           <label>image</label>
                                           <div id="image" onclick="openKCFinder3(this)"><div style="margin:5px">Click here to choose an image</div></div>

                                       </div>
                                       <input type="hidden" name="img" id="imagesrc3" required>


                                       <input type="submit" class="btn btn-default" />

                                   </form>

                                   <script type="text/javascript" >
                                       // Replace the <textarea id="editor1"> with a CKEditor


                                       function openKCFinder3(div) {
                                           window.KCFinder = {
                                               callBack: function(url) {
                                                   window.KCFinder = null;
                                                   div.innerHTML = '<div style="margin:5px">Loading...</div>';
                                                   var img = new Image();
                                                   img.src = url;
                                                   img.onload = function() {

                                                       div.innerHTML = '<img height="100" width="100" id="img3" src="' + url + '" />';
                                                       var img = document.getElementById('img3');
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
                                                       getimagelink3(url);
                                                   }
                                               }
                                           };
                                           window.open('/cvbank/src/kcfinder/browse.php?type=images&dir=images/public',
                                               'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
                                               'directories=0, resizable=1, scrollbars=0, width=800, height=600'
                                           );
                                       }
                                       function getimagelink3(src) {
                                          // var link = document.getElementById("img3");


                                          // link.style.display = "none";
                                           document.getElementById("imagesrc3").value =src;

                                       }

                                   </script>
                               </div>
                                </div>

                       </div>
                   </div>
               </div>
           </div>
           <div class="panel panel-default">
               <div class="panel-heading" role="tab" id="headinghobbies">
                   <h4 class="panel-title">
                       <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsehobbies" aria-expanded="false" aria-controls="collapsehobbies">
                           hobbies #8
                       </a>
                   </h4>
               </div>
               <div id="collapsehobbies" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headinghobbies">
                   <div class="panel-body">
                       <ul class="nav nav-pills">
                           <li class="active"><a data-toggle="pill" href="#hobbiesnew">views</a></li>

                           <li><a data-toggle="pill" href="#hobbiesadd">Add New</a></li>

                       </ul>

                       <div class="tab-content">
                           <div id="hobbiesnew" class="tab-pane fade in active">
                               <h3>views</h3>
                               <table class="table">
                                   <tr>
                                       <td>SL</td>
                                       <td>Title </td>
                                       <td>desc</td>
                                       <td>img</td>

                                       <td> action </td>
                                   </tr>
                                   <?php
                                   $hoby = $resume->hobbies();
                                   $sl=1;
                                   if(is_array($hoby)){

                                       foreach ($hoby as $value){ ?>
                                           <form action="hobbies/update.php" method="post" enctype="multipart/form-data">
                                               <tr>
                                                   <td>  <?php echo $sl++; ?> </td>
                                                   <td> <input type="text" value=" <?php echo $value['title']; ?>" name="title" >  </td>
                                                   <td > <input type="text" value="<?php echo $value['description']; ?> " name="description"></td>
                                                   <td >
                                                       <?php if(!empty($value['img'])) { ?>

                                                           <img  id="previmg92<?php echo $sl; ?>"  src="http://localhost<?php echo $value['img']; ?>" />
                                                       <?php } ?>
                                                       <div id="image" onclick="openKCFinder92<?php echo $sl; ?>(this)"><div style="margin:1px">Click here to choose an image</div></div>

                                                       <input type="hidden" name="img" id="imagesrc92<?php echo $sl; ?>">
                                                   </td>



                                                   </td>

                                                   <td>
                                                       <input  type="hidden" name="id" value="<?php echo $value['hobbiesid']; ?>" />
                                                       <input type="hidden" name="user_id" value="<?php echo $value['user_id']; ?>" />
                                                       <input type="submit" >
                                                       <a   href="hobbies/delete.php?user_id=<?php echo $value['user_id']; ?> & id=<?php  echo $value['hobbiesid']; ?>"> Delete </a> </td>
                                               </tr>
                                           </form>

                                           <script type="text/javascript" >
                                               function openKCFinder92<?php echo $sl; ?>(div) {
                                                   window.KCFinder = {
                                                       callBack: function(url) {
                                                           window.KCFinder = null;
                                                           div.innerHTML = '<div style="margin:5px">Loading...</div>';
                                                           var img = new Image();
                                                           img.src = url;
                                                           img.onload = function() {

                                                               div.innerHTML = '<img height="100" width="100" id="img92<?php echo $sl; ?>" src="' + url + '" />';
                                                               var img = document.getElementById('img92<?php echo $sl; ?>');
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
                                                               getimagelink92<?php echo $sl; ?>(url);
                                                           }
                                                       }
                                                   };
                                                   window.open('/cvbank/src/kcfinder/browse.php?type=images&dir=images/public',
                                                       'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
                                                       'directories=0, resizable=1, scrollbars=0, width=800, height=600'
                                                   );
                                               }
                                               // Replace the <textarea id="editor1"> with a CKEditor



                                               function getimagelink92<?php echo $sl; ?>(src) {
                                                   var link = document.getElementById("previmg92<?php echo $sl; ?>");
                                                   link.style.display = "none";


                                                   document.getElementById("imagesrc92<?php echo $sl; ?>").value =src;

                                               }

                                           </script>

                                           <?php

                                       }
                                   }

                                   ?>
                               </table>
                           </div>

                           <div id="hobbiesadd" class="tab-pane fade">
                               <h3>add new</h3>
                               <div class="table-responsive">
                                   <form role="form" action="hobbies/store.php" method="post" enctype="multipart/form-data">

                                       <div class="form-group">
                                           <label>Title</label>
                                           <input name="title" class="form-control">

                                       </div>
                                       <div class="form-group">
                                           <label>description</label>
                                           <input type="text" name="description" class="form-control"> </input>

                                       </div>

                                       <div class="form-group">
                                           <label>image</label>
                                           <div id="image" onclick="openKCFinder4(this)"><div style="margin:5px">Click here to choose an image</div></div>

                                       </div>
                                       <input type="hidden" name="img" id="imagesrc4" required>
                                       <input name="user_id" type="hidden" value="<?php echo $_GET['id']; ?>" class="form-control">


                                       <button type="submit" class="btn btn-default">Save</button>

                                   </form>

                                   <script type="text/javascript" >
                                       // Replace the <textarea id="editor1"> with a CKEditor


                                       function openKCFinder4(div) {
                                           window.KCFinder = {
                                               callBack: function(url) {
                                                   window.KCFinder = null;
                                                   div.innerHTML = '<div style="margin:5px">Loading...</div>';
                                                   var img = new Image();
                                                   img.src = url;
                                                   img.onload = function() {

                                                       div.innerHTML = '<img height="100" width="100" id="img4" src="' + url + '" />';
                                                       var img = document.getElementById('img4');
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
                                                       getimagelink4(url);
                                                   }
                                               }
                                           };
                                           window.open('/cvbank/src/kcfinder/browse.php?type=images&dir=images/public',
                                               'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
                                               'directories=0, resizable=1, scrollbars=0, width=800, height=600'
                                           );
                                       }
                                       function getimagelink4(src) {
                                           // var link = document.getElementById("img3");


                                           // link.style.display = "none";
                                           document.getElementById("imagesrc4").value =src;

                                       }

                                   </script>
                               </div>
                           </div>

                       </div>
                   </div>
               </div>
           </div>
           <div class="panel panel-default">
               <div class="panel-heading" role="tab" id="headingpost">
                   <h4 class="panel-title">
                       <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsepost" aria-expanded="false" aria-controls="collapsepost">
                           post #9
                       </a>
                   </h4>
               </div>
               <div id="collapsepost" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingpost">
                   <div class="panel-body">
                       <ul class="nav nav-pills">
                           <li class="active"><a data-toggle="pill" href="#postnew">views</a></li>

                           <li><a data-toggle="pill" href="#postadd">Add New</a></li>

                       </ul>

                       <div class="tab-content">
                           <div id="postnew" class="tab-pane fade in active">
                               <h3>views</h3>
                               <table class="table">
                                   <tr>
                                       <td>SL</td>
                                       <td>Title </td>
                                       <td>description</td>
                                       <td>experience</td>
                                       <td>level</td>
                                       <td>area</td>
                                       <td> action </td>
                                   </tr>
                                   <?php
                                   $po = $resume->post();

                                   if(is_array($po)){

                                       foreach ($po as $value){ $sl=1;?>
                                           <form action="posts/update.php" method="post">
                                               <tr>
                                                   <td>  <?php echo $sl++; ?> </td>
                                                   <td> <input type="text" value=" <?php echo $value['title']; ?>" name="title" >  </td>
                                                   <td > <input type="text" value="<?php echo $value['description']; ?> " name="desc"></td>
                                                   <td ><input type="text" value="<?php echo $value['tags'] ;?>" name="tags" ></td>
                                                   <td > <input type="text" value="<?php echo $value['categories'] ;?>" name="categories" ></td>



                                                   </td>

                                                   <td>
                                                       <input  type="hidden" name="id" value="<?php echo $value['postsid']; ?>" />
                                                       <input type="hidden" name="user_id" value="<?php echo $value['user_id']; ?>" />
                                                       <input type="submit" >
                                                       <a   href="posts/delete.php?user_id=<?php echo $value['user_id']; ?> & id=<?php  echo $value['postsid']; ?>"> Delete </a> </td>
                                               </tr>
                                           </form>



                                           <?php

                                       }
                                   }

                                   ?>
                               </table>
                           </div>

                           <div id="postadd" class="tab-pane fade">
                               <h3>add new</h3>
                               <div class="table-responsive">
                                   <form role="form" action="posts/store.php" method="post">

                                       <div class="form-group">
                                           <label>Title</label>
                                           <input name="title" class="form-control">

                                       </div>
                                       <div class="form-group">
                                           <label>desc</label>
                                           <input name="desc" class="form-control">

                                       </div>

                                       <div class="form-group">
                                           <label>tags</label>
                                           <input name="tags" class="form-control">

                                       </div>
                                       <div class="form-group">
                                           <label>	categories</label>
                                           <input name="categories" class="form-control">
                                           <input type="hidden" name="user_id" value="<?php echo $_GET['id']; ?>" class="form-control"> </input>


                                       </div>


                                       <button type="submit" class="btn btn-default">Save</button>

                                   </form>
                               </div>
                           </div>

                       </div>
                   </div>
               </div>
           </div>
           <div class="panel panel-default">
               <div class="panel-heading" role="tab" id="headingaward">
                   <h4 class="panel-title">
                       <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseaward" aria-expanded="false" aria-controls="collapseaward">
                           award #10
                       </a>
                   </h4>
               </div>
               <div id="collapseaward" class="panel-collapse collapse  <?php if(isset($_SESSION['awards'])){ echo "in"; unset($_SESSION['awards']); } ?>" role="tabpanel" aria-labelledby="headingaward">
                   <div class="panel-body">
                       <ul class="nav nav-pills">
                           <li class="active"><a data-toggle="pill" href="#awardnew">views</a></li>

                           <li><a data-toggle="pill" href="#awardadd">Add New</a></li>

                       </ul>

                       <div class="tab-content">
                           <div id="awardnew" class="tab-pane fade in active">
                               <h3>views</h3>
                               <table class="table">
                                   <tr>
                                       <td>SL</td>
                                       <td>Title </td>
                                       <td>description</td>
                                       <td>organization</td>
                                       <td>location</td>
                                       <td>year</td>
                                       <td> action </td>
                                   </tr>
                                   <?php
                                   $awards = $resume->award();

                                   if(is_array($awards)){

                                       foreach ($awards as $value){ $sl=1?>
                                           <form action="awards/update.php" method="post">
                                               <tr>
                                                   <td>  <?php echo $sl++; ?> </td>
                                                   <td> <input type="text" value=" <?php echo $value['title']; ?>" name="title" >  </td>
                                                   <td > <input type="text" value="<?php echo $value['description']; ?> " name="desc"></td>
                                                   <td ><input type="text" value="<?php echo $value['organization'] ;?>" name="organization" ></td>
                                                   <td > <input type="text" value="<?php echo $value['location'] ;?>" name="location" ></td>
                                                   <td > <input type="text" value="<?php echo $value['year'];?>" name="year">


                                                   </td>

                                                   <td>
                                                       <input  type="hidden" name="id" value="<?php echo $value['awardsid']; ?>" />
                                                       <input type="hidden" name="user_id" value="<?php echo $value['user_id']; ?>" />
                                                       <input type="submit" value="Update">
                                                       <a   href="awards/delete.php?user_id=<?php echo $value['user_id']; ?> & id=<?php  echo $value['awardsid']; ?>"> Delete </a> </td>
                                               </tr>
                                           </form>



                                           <?php

                                       }
                                   }

                                   ?>
                               </table>

                           </div>

                           <div id="awardadd" class="tab-pane fade">
                               <h3>add new</h3>
                               <div class="table-responsive">
                                   <form role="form" action="awards/store.php" method="post">

                                       <div class="form-group">
                                           <label>Title</label>
                                           <input name="title" class="form-control">

                                       </div>
                                       <div class="form-group">
                                           <label>Organization</label>
                                           <input name="organization" class="form-control">

                                       </div>

                                       <div class="form-group">
                                           <label>Description</label>
                                           <textarea name="description" cols="12" rows="12" class="form-control"></textarea>

                                       </div>
                                       <div class="form-group">
                                           <label>Location</label>
                                           <input name="location" class="form-control">

                                       </div>
                                       <div class="form-group">
                                           <label>Year</label>
                                           <input type="text" name="year" class="form-control">

                                       </div>
                                       <input type="hidden" name="user_id" value="<?php echo $_GET['id']; ?>" class="form-control">
                                       <button type="submit" class="btn btn-default">Add Awards</button>

                                   </form>
                               </div>
                           </div>

                       </div>
                   </div>
               </div>
           </div>
           <div class="panel panel-default">
               <div class="panel-heading" role="tab" id="headingservice">
                   <h4 class="panel-title">
                       <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseservice" aria-expanded="false" aria-controls="collapseservice">
                           service #11
                       </a>
                   </h4>
               </div>
               <div id="collapseservice" class="panel-collapse collapse <?php if(isset($_SESSION['service'])){ echo $_SESSION['service']; unset($_SESSION['service']); } ?>" role="tabpanel" aria-labelledby="headingservice">
                   <div class="panel-body">
                       <ul class="nav nav-pills">
                           <li class="active"><a data-toggle="pill" href="#servicenew">views</a></li>

                           <li><a data-toggle="pill" href="#serviceadd">Add New</a></li>

                       </ul>

                       <div class="tab-content">
                           <div id="servicenew" class="tab-pane fade in active">
                               <h3>views</h3>
                               <table class="table">
                                   <tr>
                                       <td>SL</td>
                                       <td>Title </td>
                                       <td>description	</td>

                                       <td>img</td>
                                       <td> action </td>
                                   </tr>
                                   <?php
                                   $service = $resume->service();

                                   if(is_array($service)){

                                       foreach ($service as $value){ $sl=1?>
                                           <form action="services/update.php" method="post" enctype="multipart/form-data">
                                               <tr>
                                                   <td>  <?php echo $sl++; ?> </td>
                                                   <td> <input type="text" value=" <?php echo $value['title']; ?>" name="title" >  </td>
                                                   <td > <input type="text" value="<?php echo $value['description']; ?> " name="desc"></td>
                                                   <td >
                                                    <input type="file" name="img">
                                                       <img  height="150" width="150" src="http://localhost/cvbank/storage/images/<?php echo $value['img']; ?>" />
                                                   </td>


                                                   </td>

                                                   <td>
                                                       <input  type="hidden" name="id" value="<?php echo $value['servicesid']; ?>" />
                                                       <input type="hidden" name="user_id" value="<?php echo $value['user_id']; ?>" />
                                                       <input type="submit" value="Update" >
                                                       <a   href="services/delete.php?user_id=<?php echo $value['user_id']; ?> & id=<?php  echo $value['servicesid']; ?>"> Delete </a> </td>
                                               </tr>
                                           </form>



                                           <?php

                                       }
                                   }

                                   ?>
                               </table>
                           </div>

                           <div id="serviceadd" class="tab-pane fade">
                               <h3>add new</h3>
                               <div class="table-responsive">
                                   <form role="form" action="services/store.php" method="post" enctype="multipart/form-data">

                                       <div class="form-group">
                                           <label>Title</label>
                                           <input name="title" class="form-control">

                                       </div>
                                       <div class="form-group">
                                           <label>desc</label>
                                           <textarea cols="6" rows="6"  name="desc" class="form-control"> </textarea>

                                       </div>

                                       <div class="form-group">
                                           <label>image</label>
                                           <input type="file" name="img" class="form-control">

                                       </div>
                                       <input type="hidden" name="user_id" value="<?php echo $_GET['id']; ?>">


                                       <button type="submit" class="btn btn-default">Save</button>

                                   </form>
                               </div>
                           </div>

                       </div>
                   </div>
               </div>
           </div>
           <div class="panel panel-default">
               <div class="panel-heading" role="tab" id="headingsetting">
                   <h4 class="panel-title">
                       <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsesetting" aria-expanded="false" aria-controls="collapsesetting">
                           setting #12
                       </a>
                   </h4>
               </div>
               <div id="collapsesetting" class="panel-collapse collapse <?php if(isset($_SESSION['setting'])){ echo $_SESSION['setting']; unset($_SESSION['setting']); } ?>" role="tabpanel" aria-labelledby="headingsetting">
                   <div class="panel-body">
                       <ul class="nav nav-pills">
                           <li class="active"><a data-toggle="pill" href="#settingnew">views</a></li>

                           <li><a data-toggle="pill" href="#settingadd">Add New</a></li>

                       </ul>

                       <div class="tab-content">
                           <div id="settingnew" class="tab-pane fade in active">
                               <h3>views</h3>
                               <table class="table">
                                   <tr>
                                       <td>SL</td>
                                       <td>Title </td>
                                       <td>fullname</td>
                                       <td>description</td>
                                       <td>address</td>
                                       <td>feature image</td>
                                       <td> action </td>
                                   </tr>
                                   <?php
                                   $setting = $resume->settings();

                                   if(is_array($setting)){ $sl=1?>


                                           <form action="settings/update.php" method="post" enctype="multipart/form-data">
                                               <tr>
                                                   <td>  <?php echo $sl++; ?> </td>
                                                   <td> <input type="text" value=" <?php echo $setting['title']; ?>" name="title" >  </td>
                                                   <td > <input type="text" value="<?php echo $setting['fullname']; ?> " name="fullname"></td>
                                                   <td ><input type="text" value="<?php echo $setting['description'] ;?>" name="description" ></td>
                                                   <td > <input type="text" value="<?php echo $setting['address'] ;?>" name="address" ></td>
                                                   <td >
                                                       <input type="file" name="img">
                                                       <img height="150" width="150" src="http://localhost/cvbank/storage/images/<?php echo $setting['featured_img']; ?>" />

                                                   </td>

                                                   <td>
                                                       <input  type="hidden" name="id" value="<?php echo $setting['settingsid']; ?>" />
                                                       <input type="hidden" name="user_id" value="<?php echo $setting['user_id']; ?>" />
                                                       <input type="submit" value="Update" >
                                                       <a   href="settings/delete.php?user_id=<?php echo $setting['user_id']; ?> & id=<?php  echo $setting['settingsid']; ?>"> Delete </a> </td>
                                               </tr>
                                           </form>



                                           <?php


                                   }

                                   ?>
                               </table>
                           </div>

                           <div id="settingadd" class="tab-pane fade">
                               <h3>add new</h3>

                               <div class="table-responsive">
                                   <form role="form" action="settings/store.php" method="post" enctype="multipart/form-data">

                                       <div class="form-group">
                                           <label>Title</label>
                                           <input name="title" class="form-control">

                                       </div>
                                       <div class="form-group">
                                           <label>fullname</label>
                                           <input name="fullname" class="form-control">

                                       </div>

                                       <div class="form-group">
                                           <label>description</label>
                                           <input name="description" class="form-control">

                                       </div>
                                       <div class="form-group">
                                           <label>address</label>
                                           <input name="address" class="form-control">

                                       </div>
                                       <input name="user_id" type="hidden" value="<?php echo $_GET['id']; ?>" class="form-control">
                                       <div class="form-group">
                                           <label>featured_img</label>
                                           <input type="file" name="featured_img" class="form-control">

                                       </div>

                                       <button type="submit" class="btn btn-default">Save</button>

                                   </form>
                               </div>
                           </div>

                       </div>
                   </div>
               </div>
           </div>


       </div>
   </div>
    </div>
    <!-- /.row -->

    <div class="row">

    </div>

    <?php

     }

?>

    <!-- /.row -->


    <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include_once("../common/adminfooter.php"); ?>