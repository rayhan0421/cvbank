<?php include_once("../common/header.php"); ?>
<?php
use App\settings\settings;
$settings= new settings();
$settings->setdata($_GET);


$value= $settings->show();


?>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Settings <small>update</small>
            </h1>

        </div>
    </div>
    <!-- /.row -->


    <!-- /.row -->


    <!-- /.row -->


    <!-- /.row -->

    <div class="row">


        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>Settings Panel</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <form role="form" action="update.php" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" value="<?php echo $value['title']; ?>" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>Fullname</label>
                                <input type="text" name="fullname" value="<?php echo $value['fullname']; ?>" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="description" value="<?php echo $value['description']; ?>" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" value="<?php echo $value['address']; ?>" class="form-control">

                            </div>

                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="featured_img" value="<?php echo $value['featured_img']; ?>" class="form-control">
                                <img height="150" width="150" src="http://localhost/cvbank/storage/images/<?php echo $value['featured_img']; ?>" />

                            </div>
                            <input type="hidden" value="<?php echo $value['id']; ?>" name="id"  class="form-control">

                            <button type="submit" class="btn btn-default">update</button>

                        </form>
                    </div>
                    <div class="text-right">

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