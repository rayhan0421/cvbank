<?php include_once("../common/header.php"); ?>
<?php
use App\Contact\Contact;
$Contact= new Contact();
$Contact->setdata($_GET);


$value= $Contact->show();



?>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Contact <small>update</small>
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
                    <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Contact Panel</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <form role="form" action="update.php" method="post">

                            <div class="form-group">
                                <label>Name</label>
                                <input name="name" value="<?php echo $value['name']; ?>" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" value="<?php echo $value['email']; ?>" class="form-control">

                            </div>

                            <div class="form-group">
                                <label for="mail">Message</label>

                                <textarea id="mail" cols="8" rows="10" name="message" class="form-control"><?php echo $value['message']; ?></textarea>

                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input name="phone" value="<?php echo $value['phone']; ?>" class="form-control">
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