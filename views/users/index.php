<?php include_once("../common/header.php"); ?>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Setting <small></small>
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
            <h2>user info </h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Action</th>


                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php echo $_SESSION['userinfo'][0]['username']; ?> </td>
                        <td><?php echo $_SESSION['userinfo'][0]['email']; ?></td>
                        <td> <a href="edit.php?id=<?php echo $_SESSION['userinfo'][0]['id']; ?>" >Edit</a>   </td>

                    </tr>

                    </tbody>
                </table>
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