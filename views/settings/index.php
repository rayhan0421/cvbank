<?php include_once("../common/header.php"); ?>
<?php
use App\settings\settings;

$ab= new settings();
$ab->setdata($_SESSION['userinfo']);
$ab =$ab->index();



?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Settings <small> </small>
                        </h1>

                    </div>
                </div>
                <!-- /.row -->


                <!-- /.row -->


                <!-- /.row -->


                <!-- /.row -->

                <div class="row">









<?php if($ab){ ?>
      <form action="update.php" method="post" enctype="multipart/form-data">




          <div class="form-group">
              <label for="usr">Title:</label>
              <input type="text" name="title" value="<?php echo $ab['title']; ?>"" class="form-control" id="usr">
          </div>
          <div class="form-group">
              <label for="pwd">Fullname</label>
              <input type="text"   name="fullname"  value="<?php echo $ab['fullname']; ?>" class="form-control" id="pwd">
          </div>
          <div class="form-group">
              <label for="bio">Description</label>
              <textarea class="form-control" rows="5" name="description" id="bio"><?php echo $ab['description']; ?></textarea>
          </div>
          <div class="form-group">
              <label for="ads">Address</label>
              <input type="text"   name="address"  value="<?php echo $ab['address']; ?>" class="form-control" id="pwd">
          </div>

          <div class="form-group">
            <label>image</label>
            <input type="file" name="featured_img" class="form-control">
            <img height="150" width="150" src="../../storage/images/<?php echo $ab['featured_img']; ?>" />
           </div>
          <input type="hidden"   name="id"  value="<?php echo $ab['stid']; ?>" class="form-control" id="pwd">


          <button type="submit" class="btn btn-primary">Update</button>
      </form>
<?php }

else {
 ?>
         <form action="store.php" method="post" enctype="multipart/form-data">




          <div class="form-group">
              <label for="usr">Title:</label>
              <input type="text" name="title" value="<?php echo $ab['title']; ?>"" class="form-control" id="usr">
          </div>
          <div class="form-group">
              <label for="pwd">phone</label>
              <input type="text"   name="fullname"  value="<?php echo $ab['fullname']; ?>" class="form-control" id="pwd">
          </div>
          <div class="form-group">
              <label for="bio">Description</label>
              <textarea class="form-control" rows="5" name="description" id="bio"><?php echo $ab['description']; ?></textarea>
          </div>
          <div class="form-group">
              <label for="ads">Address</label>
              <input type="text"   name="address"  value="<?php echo $ab['address']; ?>" class="form-control" id="pwd">
          </div>

           <div class="form-group">
            <label>image</label>
             <input type="file" name="featured_img" class="form-control">
            </div>

          <button type="submit" class="btn btn-primary">Update</button>
      </form>


    <?php  } ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include_once("../common/footer.php"); ?>