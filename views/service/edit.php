<?php include_once("../common/header.php"); ?>
<?php
use App\service\service;
$service= new service();
$service->setdata($_GET);


$value= $service->show();


?>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Service<small>update</small>
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
                    <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> service Panel</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <form role="form" action="update.php" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" value="<?php echo $value['title']; ?>" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>desc</label>
                                <input type="text" name="desc" value="<?php echo $value['description']; ?>" class="form-control">

                            </div>

                            <div class="form-group">
                                <label>image</label>
                                <input type="file" name="img" value="<?php echo $value['img']; ?>" class="form-control">
                                 <img height="150" width="150" src="http://localhost/cvbank/storage/images/<?php echo $value['img']; ?>" />

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