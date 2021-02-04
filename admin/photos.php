<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php 

$users = User::find_by_id($_SESSION['user_id'])->photos();



 ?>



        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            

          <?php include("includes/top_nav.php"); ?>



            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            

         <?php include("includes/side_nav.php"); ?>



            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

           <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Photos
                            <small>Subheading</small>
                        </h1>

                        <p class="bg-success"><?php echo $message; ?></p>
                       
                    <div class="col-md-12">
                        
                   <table class="table table-hover">
                       
                   <thead>
                    <tr>
                       <th>Photo</th>
                       <th>Id</th>
                       <th>File Name</th>
                       <th>Tittle</th>
                       <th>Size</th>
                       <th>Comments</th>
                       </tr>
                   </thead>
                  <tbody>

                   <?php 
                  foreach ($users as $user) : ?>

                      <tr>
                          <td><img class="admin-photo-thumbnail" src="<?php echo $user->picture_path(); ?>" alt="">

                         <div class="action_links">
                        
                        <a class="delete_link" href="delete_photo.php?id=<?php echo $user->id; ?>">Delete</a>
                        <a href="edit_photo.php?id=<?php echo $user->id; ?>">Edit</a>
                        <a href="../photo.php?id=<?php echo $user->id ?>">View</a>



                         </div>



                          </td>
                          <td><?php echo $user->id; ?></td>
                          <td><?php echo $user->filename; ?></td>
                          <td><?php echo $user->title; ?></td>
                          <td><?php echo $user->size; ?></td>
                          <td>


                            <a href="comment_photo.php?id=<?php echo $user->id ?>">
                            <?php 
                            $comments = Comment::find_the_comments($user->id);

                            echo count($comments); 



                            ?>
                            
                            </a>


                          </td>
                      </tr>

                  <?php endforeach; ?>
                  </tbody>


                   </table><!--End of Table-->




                    </div>




                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>