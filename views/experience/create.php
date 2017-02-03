<?php include_once("../common/header.php"); ?>
<?php
use App\experience\experience;
$experience= new experience();
//$skills->setdata($_SESSION['userinfo']);
$experience =$experience->index($_SESSION['userinfo']);


?>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                experience <small>Statistics Overview</small>
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
                    <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>Experience Panel</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <form role="form" action="store.php" method="post">

                            <div class="form-group">
                                <label>Designation</label>
                                <input name="designation" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>Company_name</label>
                                <input name="company_name" class="form-control">

                            </div>

                            <div class="form-group">
                                <label>Start_date</label>
                                <input name="start_date" class="form-control"  type="date">

                            </div>
                            <div class="form-group">
                                <label>End_date</label>
                                <input name="end_date" class="form-control"  type="date">

                            </div>
                            <div class="form-group">
                                <label>Company_location</label>
                                <input name="company_location" class="form-control">

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