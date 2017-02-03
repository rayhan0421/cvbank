<?php include_once("../common/header.php"); ?>
<?php
use App\skills\skills;
$skills= new skills();
$skills->setdata($_GET);


$value= $skills->show();



?>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Skills <small>update</small>
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
                                <label>desc</label>
                                <input name="desc" value="<?php echo $value['description']; ?>" class="form-control">

                            </div>

                            <div class="form-group">
                                <label>lavel</label>
                                <input name="lavel" value="<?php echo $value['level']; ?>" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>experienc</label>
                                <input name="experience" value="<?php echo $value['experience']; ?>" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>area</label>
                                <input value="<?php echo $value['experience_area']; ?>" name="area" class="form-control">
                                <input value="<?php echo $value['id']; ?>" name="id"  class="form-control">
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