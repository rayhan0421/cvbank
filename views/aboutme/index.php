<?php include_once("../common/header.php"); ?>
<?php
use App\aboutme\aboutme;

$ab= new aboutme();
$ab->setdata($_SESSION['userinfo']);
$ab =$ab->index();

if($ab) {
   //echo "<pre>";
    //var_dump($ab);
   // die();
}
?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            About Me <small> </small>
                        </h1>

                    </div>
                </div>
                <!-- /.row -->


                <!-- /.row -->


                <!-- /.row -->


                <!-- /.row -->

                <div class="row">


<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> 608d69a63a084caff6cf761069c8c1c1c9c80719


<?php if(is_array($ab)){ ?>
      <form action="update.php" method="post">

=======


<?php if(is_array($ab)){ ?>
      <form action="update.php" method="post">

>>>>>>> a2876a67feb3f3f278b88695378810c999114492


          <div class="form-group">
              <label for="usr">Title:</label>
              <input type="text" name="title" value="<?php echo $ab['title']; ?>"" class="form-control" id="usr">
          </div>
          <div class="form-group">
              <label for="pwd">phone</label>
              <input type="text"   name="phone"  value="<?php echo $ab['phone']; ?>" class="form-control" id="pwd">
          </div>
          <div class="form-group">
              <label for="comment">Comment:</label>
              <textarea class="form-control" rows="5" name="bio" id="comment"><?php echo $ab['bio']; ?></textarea>
          </div>
          <input type="hidden"   name="id"  value="<?php echo $ab['id']; ?>" class="form-control" id="pwd">


          <button type="submit" class="btn btn-primary">Update</button>
      </form>
<?php }

else {
 ?>
    <form action="update.php" method="post">



        <div class="form-group">
            <label for="usr">Title:</label>
            <input type="text" name="title" value="<?php echo $ab['title']; ?>"" class="form-control" id="usr">
        </div>
        <div class="form-group">
            <label for="pwd">phone</label>
            <input type="text"   name="phone"  value="<?php echo $ab['phone']; ?>" class="form-control" id="pwd">
        </div>
        <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea class="form-control" rows="5" name="bio" id="comment"><?php echo $ab['bio']; ?></textarea>
        </div>



        <button type="submit" class="btn btn-primary">Update</button>
    </form>


    <?php  }?>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include_once("../common/footer.php"); ?>