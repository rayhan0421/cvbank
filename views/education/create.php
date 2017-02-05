<?php include_once("../common/header.php"); ?>
<?php
use App\education\education;
$education= new education();
$education->setdata($_SESSION['userinfo']);
$education =$education->index($_SESSION['userinfo']);


?>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Education  <small>Statistics Overview</small>
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
                    <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Education Panel</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <form role="form" action="store.php" method="post">

                            <div class="form-group">
                                <label>Title</label>
                                <input name="title" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>Institute</label>
                                <input name="institute" class="form-control">

                            </div>

                            <div class="form-group">
                                <label>Result</label>
                                <input name="result" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>Passing_year</label>
                                <input name="passing_year" class="form-control" type="date">

                            </div>
                            <div class="form-group">
                                <label>Main_subject</label>
                                <input name="main_subject" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>Education_board</label>
                                <input name="education_board" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>Course_duration</label>
                                <input name="course_duration" class="form-control">

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