<?php include_once("../common/header.php"); ?>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
               profil Setting <small></small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i>Setting
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->


    <!-- /.row -->


    <!-- /.row -->

    <div class="row">

        <div class="col-lg-6">
            <h2>change password </h2>
            <div class="table-responsive">
                <form action="update.php" method="post">
                    <div class="form-group">
                        <label for="password">old password:</label>
                        <input type="password" name="passwordsignup" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="pwd">new Password:</label>
                        <input type="password" name="passwordsignup_confirm" class="form-control" id="pwd">
                    </div>

                    <button type="submit" class="btn btn-default">Update</button>
                </form>
            </div>
        </div>



    </div>
    <!-- /.row -->

    <div class="row">



    </div>
    <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include_once("../common/footer.php"); ?>