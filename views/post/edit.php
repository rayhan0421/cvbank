<?php include_once("../common/header.php"); ?>
<?php
use App\post\post;
$post= new post();
$post->setdata($_GET);


$value= $post->show();



?>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Post <small>update</small>
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
                                <label for="dec">Desc</label>
                              <textarea id="posteditor" cols="8" rows="8" name="desc" class="form-control"><?php echo $value['description']; ?></textarea>

                            </div>

                            <div class="form-group">
                                <label>Tags</label>
                                <input name="tags" value="<?php echo $value['tags']; ?>" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>Categories</label>
                                <input name="categories" value="<?php echo $value['categories']; ?>" class="form-control">
                                <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                            </div>


                            <button type="submit" class="btn btn-default">update</button>

                        </form>
                        <script type="text/javascript" >
                            // Replace the <textarea id="editor1"> with a CKEditor
                            // instance, using default configuration.
                            CKEDITOR.replace( 'posteditor' );


                            function getimagelink(src) {
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