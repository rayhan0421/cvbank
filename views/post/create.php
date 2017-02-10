<?php include_once("../common/header.php"); ?>
<?php
use App\post\post;
$post= new post();
$post->setdata($_SESSION['userinfo']);
$post =$post->index($_SESSION['userinfo']);


?>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Post <small>Statistics Overview</small>
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
        <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Post Panel</h3>
    </div>
    <div class="panel-body">
    <div class="table-responsive">
        <form role="form" action="store.php" method="post">

            <div class="form-group">
                <label>Title</label>
                <input name="title" class="form-control">

            </div>
            <div class="form-group">
                <label>desc</label>

                <textarea  id="posteditor" name="desc" class="form-control" rows="6" cols="6"></textarea>

            </div>

            <div class="form-group">
                <label>tags</label>
                <input name="tags" class="form-control">

            </div>
            <div class="form-group">
                <label>	categories</label>
                <input name="categories" class="form-control">

            </div>


        <button type="submit" class="btn btn-default">Save</button>

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