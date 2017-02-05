<?php include_once("../common/header.php"); ?>
<?php
use App\Portfolio\Portfolio;
$Portfolio= new Portfolio();
$Portfolio->setdata($_SESSION['userinfo']);
$Portfolio =$Portfolio->index();


?>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Portfolio <small>Statistics Overview</small>
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
        <th>Description</th>
        <th>image</th>
        <th>category</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>


<?php if(is_array($Portfolio)){ ?>
    <?php foreach ($Portfolio as $value){ ?>
        <tr>
            <td> <?php echo $value['title']; ?></td>
            <td><?php echo $value['description']; ?></td>
            <td><img height="150" width="150" src="http://localhost/cvbank/storage/images/<?php echo $value['img']; ?>" /> </td>
            <td><?php echo $value['category']; ?></td>
            <td> <a href="edit.php?id=<?php echo $value['portid'] ?>">Edit</a>/
                <a href="trash.php?id=<?php echo $value['portid'] ?>" >delete</a> </td>
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