<?php include_once("../common/header.php"); ?>
<?php
use App\Contact\Contact;
$Contact= new Contact();
$Contact->setdata($_SESSION['userinfo']);
$Contact =$Contact->index($_SESSION['userinfo']);



?>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Contact <small>Statistics Overview</small>
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
                        <form role="form" action="store.php" method="post">

                            <div class="form-group">
                                <label>Name</label>
                                <input name="name" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" class="form-control">

                            </div>

                            <div class="form-group">
                                <label for="mail">Message</label>
                                <textarea id="mail"  name="message" class="form-control" rows="8" cols="8"></textarea>


                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input name="phone" class="form-control">

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