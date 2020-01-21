<?php include("includes/header.php"); ?>
<?php include("includes/photo_library_modal.php"); ?>
<?php if (!$session->is_signed_in()) { redirect("login.php"); } ?>

<?php

if (empty($_GET['id'])) {
    redirect("users.php");
}

$user = User::find_by_id($_GET['id']);
if (isset($_POST['update'])){
  if ($user) {
      $user->username = $_POST['username'];
      $user->first_name = $_POST['first_name'];
      $user->last_name = $_POST['last_name'];
      $user->password = $_POST['password'];
      if (empty($_FILES['user_image'])) {
          $user->save();
          redirect("user.php");
          $session->message("The user has been update");
      }
      else {
        $user->set_file($_FILES['user_image']);
        $user->upload_photo();
        $user->save();
        $session->message("The user has been update");;
        //redirect("user.php");
      }

   }

}

?>

<!-- Left Panel -->
<?php include("includes/sidebar.php"); ?>
<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <?php include("includes/top.php"); ?>

    <!-- Header-->
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Edit Users</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="../index.php" target="_blank">Visit Home Page</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Header-->
<div class="content mt-3">
 <div class="animated fadeIn">
 <div class="row">

<div class="col-md-12">
      <div class="card">
         <div class="card-header">
             <p class="text-center" style="color: black"><?php echo $message; ?></p>
         </div>
         <div class="card-body">
             <form action="" method="post" enctype="multipart/form-data">
             <div class="col-lg-6">
                 <div class="card">
                     <div class="card-body card-block">
                         <div class="form-group text-center">
                             <div class="card-header user-header alt bg-dark">
                                 <div class="media justify-content-center user_image_box">
                                    <a href="#" data-toggle="modal" data-target="#photo-library">
                                        <img class="align-self-center rounded-circle mr-3"
                                          style="width:140px; height:140px;" alt=""
                                          src="<?php echo $user->image_path_and_placeholder() ?>">
                                    </a>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="card-footer">
                         <input type="file" name="user_image" class="form-control-file">
                     </div>
                 </div>
             </div>

               <div class="col-lg-6">
                       <div class="form-group">
                           <label for="username" class="control-label mb-1">Username</label>
                           <input name="username" type="text" class="form-control" value="<?php echo $user->username; ?>">
                       </div>

                       <div class="form-group">
                           <label for="first_name" class="control-label mb-1">First Name</label>
                           <input name="first_name" type="text" class="form-control" value="<?php echo $user->first_name; ?>">
                       </div>

                       <div class="form-group has-success">
                           <label for="last_name" class="control-label mb-1">Last Name</label>
                           <input name="last_name" type="text" class="form-control" value="<?php echo $user->last_name; ?>">
                       </div>

                       <div class="form-group has-success">
                           <label for="password" class="control-label mb-1">Password</label>
                           <input name="password" type="password" class="form-control" value="<?php echo $user->password; ?>">
                       </div>

                   <div class="d-flex justify-content-between">
                       <a href="delete_user.php?id=<?php echo $user->id; ?>" class="btn btn-danger" id="user-id"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a>
                       <button type="submit" name="update" class="btn btn-primary"><i class="fa fa-refresh"></i>&nbsp;Update User</button>
                   </div>


                    </div>

                  </form>

                  </div>

                </div>
              </div>
         </div><!-- .animated -->
    </div><!-- .content -->
</div><!-- /#right-panel -->

 <!-- Right Panel -->
<?php include("includes/footer.php"); ?>
