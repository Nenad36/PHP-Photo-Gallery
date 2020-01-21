<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) { redirect("login.php"); } ?>

<?php

if (empty($_GET['id'])) {
    redirect("photos.php");
}
else {
    $photo = Photo::find_by_id($_GET['id']);
    if(isset($_POST['update'])) {
        if ($photo) {
            $photo->title = $_POST['title'];
            $photo->caption = $_POST['caption'];
            $photo->description = $_POST['description'];
            $photo->alternate_text = $_POST['alternate_text'];
            if (empty($_FILES['filename'])) {
                $photo->save();
            } else {
                $photo->set_file($_FILES['filename']);
                $photo->save();
                redirect("edit_photo.php?={$photo->id}");
            }

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
                        </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body card-block">
                                            <div class="form-group text-center">
                                                <div class="card-header user-header alt bg-dark">
                                                    <div class="media justify-content-center">
                                                        <img class="align-self-center rounded-circle mr-3"
                                                             style="width:140px; height:140px;" alt=""
                                                             src="<?php echo $photo->picture_path(); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <input type="file" name="filename" class="form-control-file">
                                        </div>

                                        <div class="form-group">
                                            <label for="caption" class="control-label mb-1">Title</label>
                                            <input name="title" type="text" class="form-control" value="<?php echo $photo->title; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="caption" class="control-label mb-1">Caption</label>
                                            <input name="caption" type="text" class="form-control" value="<?php echo $photo->caption; ?>">
                                        </div>
                                        <div class="form-group has-success">
                                            <label for="alternate_text" class="control-label mb-1">Alternate Text</label>
                                            <input name="alternate_text" type="text" class="form-control" value="<?php echo $photo->alternate_text; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="control-label mb-1">Description</label>
                                            <textarea name="description" rows="5" placeholder="Content..." class="form-control"><?php echo $photo->description; ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body card-block">
                                        <aside class="profile-nav alt">
                                            <section class="card">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">
                                                        <a href="#"> <i class="fa fa-file-image-o" aria-hidden="true"></i> Photo id
                                                            <span class="badge badge-primary pull-right"><?php echo $photo->id ?></span></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <a href="#"> <i class="fa fa-file" aria-hidden="true"></i> Filename
                                                            <span class="badge badge-danger pull-right"><?php echo $photo->filename; ?></span></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <a href="#"> <i class="fa fa-file-text"></i> File Type
                                                            <span class="badge badge-success pull-right"><?php echo $photo->type; ?></span></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <a href="#"> <i class="fa fa-file-o"></i> File Size
                                                            <span class="badge badge-warning pull-right r-activity"><?php echo $photo->size; ?></span></a>
                                                    </li>
                                                </ul>

                                            </section>
                                        </aside>
                                    </div>
                                    <div class="card-footer">
                                        <a href="delete_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-danger btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Delete</a>
                                        <button type="submit" name="update" class="btn btn-primary btn-sm">
                                            <i class="fa fa-refresh"></i> Update
                                        </button>
                                    </div>
                                </div>

                            </form>

                        </div>

                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
</div>

  <!-- Right Panel -->
<?php include("includes/footer.php"); ?>

