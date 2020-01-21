<?php include ("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) { redirect("login.php"); } ?>

    <!-- Left Panel -->
   <?php include ("includes/sidebar.php"); ?>
    <!-- Left Panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        <?php include ("includes/top.php"); ?>
        <!-- Header-->
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
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
            <div class="ui-typography">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div class="col-md-6 col-lg-3">
                                    <div class="card bg-flat-color-1 text-light">
                                        <div class="card-body">
                                            <div class="h4 m-0"><?php echo $session->count; ?></div>
                                            <div>New Views</div>
                                            <small class="text-light">Total New Views</small>
                                            <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                            <small class="text-light">Just a total view</small>
                                        </div>
                                    </div>
                                </div><!--/.col-->

                                <div class="col-md-6 col-lg-3">
                                    <div class="card bg-flat-color-3 text-light">
                                        <div class="card-body">
                                            <div class="h4 m-0"><?php echo Photo::count_all(); ?></div>
                                            <div>Photos</div>
                                            <small class="text-light">Total Photos in Gallery</small>
                                            <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                            <a href="photos.php"><small class="text-light">View Details</small></a>
                                        </div>
                                    </div>
                                </div><!--/.col-->

                                <div class="col-md-6 col-lg-3">
                                    <div class="card bg-flat-color-4 text-light">
                                        <div class="card-body">
                                            <div class="h4 m-0"><?php echo User::count_all(); ?></div>
                                            <div>Users</div>
                                            <small class="text-light">Total Users</small>
                                            <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                            <a href="users.php"><small class="text-light">View Details</small></a>
                                        </div>
                                    </div>
                                </div><!--/.col-->

                                <div class="col-md-6 col-lg-3">
                                    <div class="card bg-flat-color-2 text-light">
                                        <div class="card-body">
                                            <div class="h4 m-0"><?php echo Comment::count_all(); ?></div>
                                            <div>Comments</div>
                                            <small class="text-light">Total Comments</small>
                                            <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                            <a href="comments.php"><small class="text-light">View Details</small></a>
                                        </div>
                                    </div>
                                </div><!--/.col-->
                            </div>

                            <div class="d-flex justify-content-center">
                                <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div><!-- .animated -->

       </div>
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<?php include("includes/footer.php"); ?>