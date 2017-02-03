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
                             </tr>
                             <?php
                             $about = $resume->about();
                             $sl=1;
                             if(is_array($about)){

                                 foreach ($about as $value){ ?>
                                       <tr>
                                           <td><?php echo $sl++; ?> </td>
                                           <td><?php echo $value['title']; ?> </td>
                                            <td> <?php echo $value['phone']; ?></td>
                                           <td> <?php echo $value['bio'] ;?></td>
                                       </tr>



                                     <?php

                                 }
                             }

                             ?>
                               </table>
                           </div>

                           <div id="aboutadd" class="tab-pane fade">
                               <h3>add new</h3>
                               <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                           </div>

                       </div>
                  <?php


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
                       <ul class="nav nav-pills">
                           <li class="active"><a data-toggle="pill" href="#expe">views</a></li>

                           <li><a data-toggle="pill" href="#expeadd">Add New</a></li>

                       </ul>

                       <div class="tab-content">
                           <div id="expe" class="tab-pane fade in active">
                               <h3>views</h3>
                               <p> expe Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                           </div>

                           <div id="expeadd" class="tab-pane fade">
                               <h3>add new</h3>
                               <p> aexpe add Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                           </div>

                       </div>
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
                       <ul class="nav nav-pills">
                           <li class="active"><a data-toggle="pill" href="#skill">views</a></li>

                           <li><a data-toggle="pill" href="#skilladd">Add New</a></li>

                       </ul>

                       <div class="tab-content">
                           <div id="skill" class="tab-pane fade in active">
                               <h3>views</h3>
                               <p>askil ing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                           </div>

                           <div id="skilladd" class="tab-pane fade">
                               <h3>add new</h3>
                               <p> askill e omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
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
                               <p>education ing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                           </div>

                           <div id="educationadd" class="tab-pane fade">
                               <h3>add new</h3>
                               <p> education e omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
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
                               <p>portfolio ing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                           </div>

                           <div id="portfolioadd" class="tab-pane fade">
                               <h3>add new</h3>
                               <p> portfolio e omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                           </div>

                       </div>
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
                       <ul class="nav nav-pills">
                           <li class="active"><a data-toggle="pill" href="#publicationnew">views</a></li>

                           <li><a data-toggle="pill" href="#publicationadd">Add New</a></li>

                       </ul>

                       <div class="tab-content">
                           <div id="publicationnew" class="tab-pane fade in active">
                               <h3>views</h3>
                               <p>publication ing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                           </div>

                           <div id="publicationadd" class="tab-pane fade">
                               <h3>add new</h3>
                               <p> publication e omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
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
               <div id="collapsefacts" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfacts">
                   <div class="panel-body">
                       <ul class="nav nav-pills">
                           <li class="active"><a data-toggle="pill" href="#factsnew">views</a></li>

                           <li><a data-toggle="pill" href="#factsadd">Add New</a></li>

                       </ul>

                       <div class="tab-content">
                           <div id="factsnew" class="tab-pane fade in active">
                               <h3>views</h3>
                               <p> facts publication ing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                           </div>

                           <div id="factsadd" class="tab-pane fade">
                               <h3>add new</h3>
                               <p>facts publication e omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
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
                               <p>hobbies publication ing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                           </div>

                           <div id="hobbiesadd" class="tab-pane fade">
                               <h3>add new</h3>
                               <p>hobbies e omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
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
                               <p>post publication ing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                           </div>

                           <div id="postadd" class="tab-pane fade">
                               <h3>add new</h3>
                               <p>post e omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
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
               <div id="collapseaward" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingaward">
                   <div class="panel-body">
                       <ul class="nav nav-pills">
                           <li class="active"><a data-toggle="pill" href="#awardnew">views</a></li>

                           <li><a data-toggle="pill" href="#awardadd">Add New</a></li>

                       </ul>

                       <div class="tab-content">
                           <div id="awardnew" class="tab-pane fade in active">
                               <h3>views</h3>
                               <p>award ing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                           </div>

                           <div id="awardadd" class="tab-pane fade">
                               <h3>add new</h3>
                               <p>award e omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
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
               <div id="collapseservice" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingservice">
                   <div class="panel-body">
                       <ul class="nav nav-pills">
                           <li class="active"><a data-toggle="pill" href="#servicenew">views</a></li>

                           <li><a data-toggle="pill" href="#serviceadd">Add New</a></li>

                       </ul>

                       <div class="tab-content">
                           <div id="servicenew" class="tab-pane fade in active">
                               <h3>views</h3>
                               <p>service ing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                           </div>

                           <div id="serviceadd" class="tab-pane fade">
                               <h3>add new</h3>
                               <p>service e omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
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
               <div id="collapsesetting" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingsetting">
                   <div class="panel-body">
                       <ul class="nav nav-pills">
                           <li class="active"><a data-toggle="pill" href="#settingnew">views</a></li>

                           <li><a data-toggle="pill" href="#settingadd">Add New</a></li>

                       </ul>

                       <div class="tab-content">
                           <div id="settingnew" class="tab-pane fade in active">
                               <h3>views</h3>
                               <p><?php echo $resume->contact(); ?></p>
                           </div>

                           <div id="settingadd" class="tab-pane fade">
                               <h3>add new</h3>
                               <p>setting e omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
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

<?php include_once("../common/footer.php"); ?>