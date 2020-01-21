<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) { redirect("login.php"); } ?>

<?php $photos = Photo::find_all(); ?>

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
                    <h1>Photos</h1>
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
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Id</th>
                                    <th>File Name</th>
                                    <th>Title</th>
                                    <th>Size</th>
                                    <th>Comments</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach($photos as $photo) : ?>
                                <tr>
                                    <td><img width="70px" height="62px" src="<?php echo $photo->picture_path(); ?>" alt=""></td>
                                    <td><?php echo $photo->id; ?></td>
                                    <td><?php echo $photo->filename; ?></td>
                                    <td><?php echo $photo->title; ?></td>
                                    <td><?php echo $photo->size ?></td>
                                    <td>
                                     <a href="comment_photo.php?id=<?php echo $photo->id; ?>">
                                      <?php
                                        $comments = Comment::find_the_comments($photo->id);
                                        if (!empty($comments)) {
                                            echo "You have a <span class='badge badge-danger'>" . count($comments) . "</span> comments";
                                        }
                                        else {
                                            echo "<mark>You have no  comments</mark>";
                                        }
                                      ?>
                                    </td>
                                    <td>
                                      <a href="../photo.php?id=<?php echo $photo->id; ?>" target="_blank" class="btn btn-outline-secondary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp; View</a>
                                      <a href="edit_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Edit</a>
                                      <a href="delete_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-outline-danger btn-sm delete-link"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a>
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
