<?php include_once("../common/header.php"); ?>
<?php
use App\award\award;
$award= new award();
$award->setdata($_GET);


$value= $award->show();



?>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                award <small>update</small>
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
                        <form role="form" action="update.php" method="post">

                            <div class="form-group">
                                <label>Title</label>
                                <input name="title" value="<?php echo $value['title']; ?>" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>Organization</label>
                                <input name="organization" value="<?php echo $value['organization']; ?>" class="form-control">
                                organization
                            </div>

                            <div class="form-group">
                                <label for="dec">Description</label>
                                <textarea id="dec" name="description" class="form-control" cols="6" rows="6"></textarea>


                            </div>
                            <div class="form-group">
                                <label>Location</label>
                                <input name="location" value="<?php echo $value['location']; ?>" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>Year</label>
                                <input value="<?php echo $value['year']; ?>" name="Year" class="form-control">
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