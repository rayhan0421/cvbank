<?php include_once("../common/header.php"); ?>
<?php
use App\education\education;
$education= new education();
$education->setdata($_GET);
$value= $education->show();
?>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Education <small>update</small>
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
                                <label>Title</label>
                                <input name="title" value="<?php echo $value['title']; ?>" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>institute</label>
                                <input name="institute" value="<?php echo $value['institute']; ?>" class="form-control">

                            </div>

                            <div class="form-group">
                                <label>result</label>
                                <input name="result" value="<?php echo $value['result']; ?>" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>passing_year</label>
                                <input name="passing_year" value="<?php echo $value['passing_year']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>main_subject</label>
                                <input name="main_subject" value="<?php echo $value['main_subject']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>education_board</label>
                                <input name="education_board" value="<?php echo $value['education_board']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Course_duration</label>
                                <input value="<?php echo $value['course_duration']; ?>" name="course_duration" class="form-control">
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