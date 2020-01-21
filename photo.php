<?php

require_once ("admin/includes/init.php");

if (empty($_GET['id'])) {
    redirect('index.php');
}

$photo = Photo::find_by_id($_GET['id']);

if (isset($_POST['submit'])) {
    $author = trim($_POST['author']);
    $body = trim($_POST['body']);
    $new_comment = Comment::create_comment($photo->id, $author, $body);
    if ($new_comment && $new_comment->save()) {
        redirect("photo.php?id={$photo->id}");
    }
    else {
        $message = "There was some problems saving";
    }

   }
   else {
       $author = "";
       $body = "";
   }

   $comments = Comment::find_the_comments($photo->id);

?>

<?php include("includes/header.php"); ?>
<body class="blog-single-post home-demo-2">
<?php include("includes/nav.php") ?>

<!-- START TITLE SECTION -->
<section id="page-title">
    <div class="title-image">
        <!--<h1>beatswave</h1>-->
        <img src="resources/images/logo1.png" alt="Logo 1">
    </div>
    <div class="global-title wow zoomIn">
        <h1>BLOG</h1>
    </div>
</section>
<!-- END TITLE SECTION -->

<!-- START BLOG POST SECTION -->
<section id="blog-post">
    <div class="section">
        <div class="row blog-content">
            <div class="col-sm-9 post-content">
                <div class="featured-image">
                    <div class="featured-overly"></div>
                    <img src="admin/<?php echo $photo->picture_path(); ?>" alt="">
                </div>



                <div class="post-text">
                    <div class="post-heading">
                        <h2><?php echo $photo->title; ?></h2>
                        <div class="post-by">
                            <span><?php echo $photo->caption; ?></span>
                        </div>
                    </div>
                    <p><?php echo $photo->description; ?></p>
                </div>


                <div class="post-share">
                    <span>SHARE :</span>
                    <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                </div>
                <?php foreach ($comments as $comment) : ?>
                <div class="post-author">
                    <div class="author-info">
                        <div class="author-image">
                            <img src="resources/images/no-pic.png" alt="No Pic" class="no-pic" style="display: none;">
                            <img src="resources/images/eye_spy.png" alt="Eye Spy">
                        </div>
                        <div class="author-name-date">
                            <p><?php echo $comment->author; ?></p>
                            <p>5 hours ago</p>
                        </div>
                        <em>Your comment is awaiting moderation</em>
                    </div>
                    <div class="author-description">
                        <p><?php echo $comment->body ?>
                        </p>
                    </div>
                    <span class="reply">Reply<i class="fa fa-angle-right" aria-hidden="true"></i></span>
                </div>
                <?php endforeach; ?>
                <div class="form">
                    <h2>POST A COMMENT</h2>
                    <form method="post">
                        <div class="row fild_1">
                            <div class="col-12">
                                <input type="text" class="form-control" name="author" placeholder="Author">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="body" rows="3" placeholder="Comment"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">POST COMMENT</button>
                    </form>
                </div>
            </div>
            <div class="col-sm-3 sitebar">
                <div class="blog-search">
                    <form class="form-inline md-form mr-auto mb-4">
                        <input class="mr-sm-2" type="text" placeholder="Search..." aria-label="Search">
                        <button class="search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
                <div class="blog-categories">
                    <h2>CATEGORIES</h2>
                    <div class="p-categories">
                        <a href="#" class="categories-line">
                            <span class="c-name">Singles</span>
                            <span class="c-count">98</span>
                        </a>
                        <a href="#" class="categories-line">
                            <span class="c-name">Audio</span>
                            <span class="c-count">102</span>
                        </a>
                        <a href="#" class="categories-line">
                            <span class="c-name">Gallery</span>
                            <span class="c-count">83</span>
                        </a>
                        <a href="#" class="categories-line">
                            <span class="c-name">Image</span>
                            <span class="c-count">04</span>
                        </a>
                        <a href="#" class="categories-line">
                            <span class="c-name">Discussion</span>
                            <span class="c-count">109</span>
                        </a>
                        <a href="#" class="categories-line">
                            <span class="c-name">Design</span>
                            <span class="c-count">50</span>
                        </a>
                        <a href="#" class="categories-line">
                            <span class="c-name">Video</span>
                            <span class="c-count">102</span>
                        </a>
                    </div>
                </div>
                <div class="blog-recent-post">
                    <h2>RECENT POSTS</h2>
                    <div class="p-recent-posts">
                        <a href="#" class="resent-posts-line">
                            <div class="recent-post-image">
                                <img src="resources/images/toa-heftiba.png" alt="Toa Heftiba">
                            </div>
                            <div class="recent-post-name">
                                <h3>jurney towards a lifestyle</h3>
                                <span>Jun. 16 2019</span>
                            </div>
                        </a>
                        <a href="#" class="resent-posts-line">
                            <div class="recent-post-image">
                                <img src="resources/images/photo.png" alt="Photo">
                            </div>
                            <div class="recent-post-name">
                                <h3>Fashionable shoes</h3>
                                <span>Jun. 18 2019</span>
                            </div>
                        </a>
                        <a href="#" class="resent-posts-line">
                            <div class="recent-post-image">
                                <img src="resources/images/photo-1.png" alt="Photo 1">
                            </div>
                            <div class="recent-post-name">
                                <h3>really awesome’s Adventure</h3>
                                <span>Jun. 23 2019</span>
                            </div>
                        </a>
                        <a href="#" class="resent-posts-line">
                            <div class="recent-post-image">
                                <img src="resources/images/photo-2.png" alt="Photo 2">
                            </div>
                            <div class="recent-post-name">
                                <h3>Man Hunting in jungle</h3>
                                <span>Jun. 25 2019</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BLOG POST SECTION -->

<?php include("includes/footer.php") ?>
