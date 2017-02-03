<?php include_once("../common/header.php"); ?>
<?php
use App\experiance\experiance;
$experiance= new experiance();
$experiance->setdata($_SESSION['userinfo']);
$experiance =$experiance->trashlist();


?>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Experiance <small>Statistics Overview</small>
            </h1>

        </div>
    </div>
    <!-- /.row -->


    <!-- /.row -->


    <!-- /.row -->


    <!-- /.row -->

    <div class="row">


    <div class="col-lg-12">
    <div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions Panel</h3>
    </div>
    <div class="panel-body">
    <div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
    <thead>
    <tr>
        <th>Designation</th>
        <th>Company_name</th>
        <th>Start_date</th>
        <th>End_date</th>
        <th> Company_location</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>


<?php if(is_array($experiance)){ ?>
    <?php foreach ($experiance as $value){ ?>
        <tr>
            <td> <?php echo $value['designation']; ?></td>
            <td><?php echo $value['company_name']; ?></td>
            <td><?php echo $value['start_date']; ?></td>
            <td><?php echo $value['end_date']; ?></td>
            <td><?php echo $value['company_location']; ?></td>

            <td> <a href="restoreentry.php?id=<?php echo $value['id'] ?>" >restore</a> </td>
        </tr>
    <?php } ?>

<?php }else ?>
    </tbody>
    </table>
    </div>
    <div class="text-right">
        <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include_once("../common/footer.php"); ?>