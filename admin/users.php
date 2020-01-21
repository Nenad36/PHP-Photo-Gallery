<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) { redirect("login.php"); } ?>

<?php $users = User::find_all(); ?>

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
                    <h1>Users</h1>
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
                            <a href="add_user.php" class="btn btn-outline-info btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add User</a> <p class="text-center" style="color: black"><?php echo $message; ?></p>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Photo</th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach($users as $user) : ?>
                                    <tr>
                                        <td><?php echo $user->id; ?></td>
                                        <td><img width="70px" height="62px" src="<?php echo $user->image_path_and_placeholder(); ?>" alt=""></td>
                                        <td><?php echo $user->username; ?></td>
                                        <td><?php echo $user->first_name; ?></td>
                                        <td><?php echo $user->last_name ?></td>
                                        <td>
                                            <a href="edit_user.php?id=<?php echo $user->id; ?>" class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Edit</a>
                                            <a href="delete_user.php?id=<?php echo $user->id; ?>" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->
<?php include("includes/footer.php"); ?>
