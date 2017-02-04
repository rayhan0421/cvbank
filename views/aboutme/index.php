<?php include_once("../common/header.php"); ?>
<?php
use App\aboutme\aboutme;

$ab= new aboutme();
$ab->setdata($_SESSION['userinfo']);
$ab =$ab->index();

?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            About Me <small> </small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> About Me
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                <!-- /.row -->


                <!-- /.row -->


                <!-- /.row -->

                <div class="row">



                </div>
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions Panel</h3>
                            </div>
    <div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
    <thead>
    <tr>
        <th>Title</th>
        <th>phone</th>
        <th>bio</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>


<?php if(is_array($ab)){ ?>
      <form action="update.php" method="post" enctype="multipart/form-data">
        <tr>
            <td><input type="text" name="title" value="<?php echo $ab['title']; ?>" />  </td>
            <td> <input type="text" name="phone" value="<?php echo $ab['phone']; ?>"></td>
            <td><input name="bio" value=" <?php echo $ab['bio']; ?>" type="text" > </td>

            <td> <a href="edit.php?id=<?php echo $ab['id'] ?>">Update</a>

      </form>
<?php }else ?>
    </tbody>
    </table>

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