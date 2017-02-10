<?php include_once("../common/header.php"); ?>
<?php
use App\facts\facts;
$facts= new facts();
$facts->setdata($_SESSION['userinfo']);
//$service=$service->index($_SESSION['userinfo']);


?>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                facts <small>Statistics Overview</small>
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
                        <form role="form" action="store.php" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Title</label>
                                <input name="title" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>No of items</label>
                                <input type="number" name="item" class="form-control"> </input>

                            </div>

                            <div class="form-group">
                                <label>image</label>
                                <div id="image" onclick="openKCFinder(this)"><div style="margin:5px">Click here to choose an image</div></div>

                            </div>
                            <input type="hidden" name="img" id="imagesrc">


                            <button type="submit" class="btn btn-default">Save</button>

                        </form>
                        <script type="text/javascript" >
                            // Replace the <textarea id="editor1"> with a CKEditor



                            function getimagelink(src) {
                                var link = document.getElementById("img");
                                console.log(link);
                                var link = document.getElementById("img");
                                document.getElementById("imagesrc").value =src;

                            }

                        </script>
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