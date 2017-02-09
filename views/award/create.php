<?php include_once("../common/header.php"); ?>
<?php
use App\award\award;
$award= new award();
//$skills->setdata($_SESSION['userinfo']);
$award =$award->index($_SESSION['userinfo']);


?>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Award <small>Statistics Overview</small>
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
                    <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Award Panel</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <form role="form" action="store.php" method="post">

                            <div class="form-group">
                                <label>Title</label>
                                <input name="title" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>Organization</label>
                                <input name="organization" class="form-control">

                            </div>

                            <div class="form-group">
                                <label for="dec">Description</label>

                                <textarea cols="6" rows="6" name="description" class="form-control" id="dec"></textarea>

                            </div>
                            <div class="form-group">
                                <label>Location</label>
                                <input name="location" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>Year</label>
                                <input type="text" name="year" class="form-control">

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