<?php include_once("../common/header.php"); ?>
<?php
use App\skills\skills;
$skills= new skills();
$skills->setdata($_SESSION['userinfo']);
$skills =$skills->trashlist();


?>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Skills <small>Statistics Overview</small>
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
        <th>Title</th>
        <th>Desc</th>
        <th>Lavel</th>
        <th>Experience</th>
        <th> Experience area </th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>


<?php if(is_array($skills)){ ?>
    <?php foreach ($skills as $value){ ?>
        <tr>
            <td> <?php echo $value['title']; ?></td>
            <td><?php echo $value['description']; ?></td>
            <td><?php echo $value['level']; ?></td>
            <td><?php echo $value['experience']; ?></td>
            <td><?php echo $value['experience_area']; ?></td>

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