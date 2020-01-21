<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) { redirect("login.php"); } ?>

<?php

$message = "";
if (isset($_FILES['file'])) {
    $photo = new Photo();
    $photo->title = $_POST['title'];
    $photo->set_file($_FILES['file']);
    if ($photo->save()) {
        $message = "Photo uploaded succesfully";
    }
    else {
        $message = join("<br>", $photo->errors);
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
                    <h1>Upload photo</h1>
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
                                <div class="d-flex justify-content-center">
                                     <?php echo $message; ?>
                                </div>
                            </div>
                            <div class="card-body">

                                <form action="upload.php" method="post" enctype="multipart/form-data">
                                    <div class="card-body card-block">
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Text Input</label></div>
                                            <div class="col-12 col-md-9">
                                                  <input type="text" name="title" placeholder="Text" class="form-control">
                                                  <small class="form-text text-muted">This is a help text</small>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">File input</label></div>
                                            <div class="col-12 col-md-9"><input type="file" name="file" class="form-control-file"></div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                </form>


                                <div class="row">
                                    <div class="col-lg-12">
                                        <form action="upload.php" class="dropzone"></form>
                                    </div>
                                </div>

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
