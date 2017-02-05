<?php include_once("../common/header.php"); ?>
<?php
use App\experience\experience;
$experience= new experience();
$experience->setdata($_GET);


$value= $experience->show();



?>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Experience <small>update</small>
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
                    <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> skill Panel</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <form role="form" action="update.php" method="post">

                            <div class="form-group">
                                <label>Designation</label>
                                <input name="designation" value="<?php echo $value['designation']; ?>" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>Company_name</label>
                                <input name="company_name" value="<?php echo $value['company_name']; ?>" class="form-control">

                            </div>

                            <div class="form-group">
                                <label>Start_date</label>
                                <input name="start_date" value="<?php echo $value['start_date']; ?>" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>End_date</label>
                                <input name="end_date" value="<?php echo $value['end_date']; ?>" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>Company_location</label>
                                <input value="<?php echo $value['company_location']; ?>" name="company_location" class="form-control">
                                <input type="hidden" value="<?php echo $value['id']; ?>" name="id"  class="form-control">
                            </div>

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