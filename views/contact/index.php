<?php include_once("../common/header.php"); ?>
<?php
use App\Contact\Contact;
$Contact= new Contact();
$Contact->setdata($_SESSION['userinfo']);
$Contact2 =$Contact->index();


?>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Contact <small>Statistics Overview</small>
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
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
        <th>Phone</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>


<?php if(is_array($Contact2)){ ?>
    <?php foreach ($Contact2 as $value){ ?>
        <tr>
            <td> <?php echo $value['name']; ?></td>
            <td><?php echo $value['cmail']; ?></td>
            <td><textarea cols="10" rows="10" class="form-control"> <?php echo $value['message']; ?> </textarea> </td>
            <td><?php echo $value['phone']; ?></td>
            <td>
                <a href="trash.php?id=<?php echo $value['cid'] ?>" >delete</a> </td>
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