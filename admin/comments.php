<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) { redirect("login.php"); } ?>

<?php $comments = Comment::find_all(); ?>

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
                    <h1>Comments</h1>
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
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Body</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach($comments as $comment) : ?>
                                    <tr>
                                        <td><?php echo $comment->photo_id; ?></td>
                                        <td><?php echo $comment->author; ?></td>
                                        <td><?php echo $comment->body; ?></td>
                                        <td>
                                            <a href="delete_comment.php?id=<?php echo $comment->id; ?>" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a>
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
