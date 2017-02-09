<?php include_once("../common/header.php"); ?>
<?php
use App\Portfolio\Portfolio;
$Portfolio= new Portfolio();
$Portfolio->setdata($_SESSION['userinfo']);
$Portfolio =$Portfolio->index($_SESSION['userinfo']);


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


        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Portfolio Panel</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <form role="form" action="store.php" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Title</label>
                                <input name="title" class="form-control">

                            </div>
                            <div class="form-group">
                                <label for="dec">Description</label>

                                <textarea  name="description" class="form-control" id="dec" cols="5" rows="6" ></textarea>

                            </div>

                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="img" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <input name="category" class="form-control">

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