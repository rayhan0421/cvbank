<?php include_once("../common/adminheader.php"); ?>
<?php
use App\admin\resume;
$resume= new resume();

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
       <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
           <div class="panel panel-default">
               <div class="panel-heading" role="tab" id="headingOne">
                   <h4 class="panel-title">
                       <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                           About #1
                       </a>
                   </h4>
               </div>
               <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                   <div class="panel-body">

                  <?php

                  echo $resume->about();
                  ?>
                   </div>
               </div>
           </div>
           <div class="panel panel-default">
               <div class="panel-heading" role="tab" id="headingexpe">
                   <h4 class="panel-title">
                       <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseexp" aria-expanded="false" aria-controls="collapseexp">
                          experience #2
                       </a>
                   </h4>
               </div>
               <div id="collapseexp" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingexpe">
                   <div class="panel-body">
                      anim
                   </div>
               </div>
           </div>
           <div class="panel panel-default">
               <div class="panel-heading" role="tab" id="headingskill">
                   <h4 class="panel-title">
                       <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseskill" aria-expanded="false" aria-controls="collapseskill">
                           skill #3
                       </a>
                   </h4>
               </div>
               <div id="collapseskill" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingskill">
                   <div class="panel-body">
                       skill cont
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
                       education cont
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
                       portfolio cont
                   </div>
               </div>
           </div>
           <div class="panel panel-default">
               <div class="panel-heading" role="tab" id="headingpublication">
                   <h4 class="panel-title">
                       <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsepublication" aria-expanded="false" aria-controls="collapsepublication">
                           publication #6
                       </a>
                   </h4>
               </div>
               <div id="collapsepublication" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingpublication">
                   <div class="panel-body">
                       publication cont
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
               <div id="collapsefacts" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfacts">
                   <div class="panel-body">
                       headingfacts cont
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
                       hobbies cont
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
                       post cont
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
               <div id="collapseaward" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingaward">
                   <div class="panel-body">
                       award cont
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
               <div id="collapseservice" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingservice">
                   <div class="panel-body">
                       service cont
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
               <div id="collapsesetting" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingsetting">
                   <div class="panel-body">
                       setting cont
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

<?php include_once("../common/footer.php"); ?>