<?php include_once("../common/header.php"); ?>
<?php
use App\facts\facts;
$facts= new facts();
$facts->setdata($_GET);


$value= $facts->show();


?>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
               facts<small>update</small>
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
                                <label>no of items</label>
                                <input type="text" name="item" value="<?php echo $value['no_of_items']; ?>" class="form-control">

                            </div>

                            <div class="form-group">
                                <label>image</label>

                                <img height="150" id="previmg" width="150" src="http://localhost<?php echo $value['img']; ?>" />
                                <div id="image" onclick="openKCFinder(this)"><div style="margin:1px">Click here to choose an image</div></div>

                                <input type="hidden" name="img" id="imagesrc">
                            </div>
                            <input type="hidden" value="<?php echo $value['id']; ?>" name="id"  class="form-control">

                            <button type="submit" class="btn btn-default">update</button>

                        </form>
                        <script type="text/javascript" >
                            // Replace the <textarea id="editor1"> with a CKEditor



                            function getimagelink(src) {
                                var link = document.getElementById("previmg");
                                link.style.display = "none";
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