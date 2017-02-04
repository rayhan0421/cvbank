<?php include_once("../common/header.php"); ?>
<?php
use App\settings\settings;
$settings= new settings();
$settings->setdata($_SESSION['userinfo']);
$settings =$settings->index($_SESSION['userinfo']);


?>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Settings <small>Statistics Overview</small>
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
                    <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> settings Panel</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <form role="form" action="store.php" method="post" enctype="multipart/form-data">

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
                            <div class="form-group">
                                <label>featured_img</label>
                                <input type="file" name="featured_img" class="form-control">

                            </div>

                            <button type="submit" class="btn btn-default">Save</button>

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