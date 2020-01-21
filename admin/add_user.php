<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) { redirect("login.php"); } ?>

<?php

$user = new User();

if (isset($_POST['create'])){
  if ($user) {
      $session->message("The user has been added");
      $user->username = $_POST['username'];
      $user->first_name = $_POST['first_name'];
      $user->last_name = $_POST['last_name'];
      $user->password = $_POST['password'];
      $user->set_file($_FILES['user_image']);
      $user->upload_photo();
      $user->save();
      redirect("users.php");
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
            <strong class="card-title">Data Table</strong>
         </div>
         <div class="card-body">
               <div class="col-lg-9">

                   <form action="" method="post" enctype="multipart/form-data">

                       <div class="form-group">
                           <label for="username" class="control-label mb-1">Username</label>
                           <input name="username" type="text" class="form-control">
                       </div>

                       <div class="form-group">
                           <label for="first_name" class="control-label mb-1">First Name</label>
                           <input name="first_name" type="text" class="form-control">
                       </div>

                       <div class="form-group has-success">
                           <label for="last_name" class="control-label mb-1">Last Name</label>
                           <input name="last_name" type="text" class="form-control">
                       </div>

                       <div class="form-group has-success">
                           <label for="password" class="control-label mb-1">Password</label>
                           <input name="password" type="password" class="form-control">
                       </div>
                       <div class="d-flex justify-content-between">
                         <input type="file" name="user_image" class="form-control-file">
                         <button type="submit" name="create" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;Add User</button>
                       </div>

                   </form>




                    </div>
                  </div>


                </div>
              </div>
         </div><!-- .animated -->
    </div><!-- .content -->
</div><!-- /#right-panel -->

 <!-- Right Panel -->
<?php include("includes/footer.php"); ?>
