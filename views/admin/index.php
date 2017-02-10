<?php include_once("../common/adminheader.php"); ?>
<?php
use App\admin\admin;
$admin= new admin();
$admin->setdata($_SESSION['userinfo']);
$data =$admin->index();
$sl= 1;

?>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Dashboard <small>Statistics Overview</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->


    <!-- /.row -->

    <div class="row">
         <div class="col-lg-12">

             <script>
                 $(document).ready(function(){

                     $('#users').DataTable( {
                         "paging":   true,
                         "ordering": true,
                         "info":     true

                     } );
                 });
             </script>


             <table id="users" class="display" cellspacing="0" width="100%">
                 <thead>
                 <tr>
                     <th>SL</th>
                     <th>username</th>
                     <th>title</th>
                     <th>bio</th>
                     <th>Resume</th>
                     <th>active</th>
                     <th>action</th>



                 </tr>
                 </thead>

                 <tbody>

                 <?php if(!empty($data)){ ?>
                     <?php foreach ($data as $value) { ?>
                         <tr>
                             <td> <?php echo $sl++; ?>  </td>
                             <td><?php echo $value['username']; ?> </td>
                             <td><?php echo $value['title']; ?> </td>
                             <td><?php echo  $value['bio'] ;?> </td>
                             <td> <a target="_blank" href="http://localhost/cvbank/views/public/resume/single.php?id=<?php echo $value['user_id']; ?>">View Resume</a> </td>
                             <td><?php  if($value['is_active']){ echo "active"; }else{ echo "<span style='color:orangered'>inactive</span>"; } ?> </td>
                             <td><a href="userdetails.php?id=<?php echo $value['user_id'];  ?> ">details</a> </td>
                         </tr>
                     <?php } ?>
                 <?php  } ?>
                 <?php if(empty($data)){ ?>

                     <h1>no cv available</h1>

                 <?php  } ?>

                 </tbody>
             </table>
         </div>
    </div>
    <!-- /.row -->

    <div class="row">

    </div>
    <!-- /.row -->


    <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include_once("../common/adminfooter.php"); ?>