<?php include("includes/header.php"); ?>
<?php

$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 6;
$items_total_counts = Photo::count_all();
$paginate = new Paginate($page, $items_per_page, $items_total_counts);

$sql = "SELECT * FROM photos ";
$sql .= "LIMIT {$items_per_page} ";
$sql .= "OFFSET {$paginate->offset()} ";
$photos = Photo::find_by_query($sql);

?>
<body class="gallery-photogallery home-demo-2">
<?php include("includes/nav.php") ?>

<!-- START TITLE SECTION -->
<section id="page-title">
    <div class="title-image">
        <!--<h1>beatswave</h1>-->
        <img src="resources/images/logo1.png" alt="Logo 1">
    </div>
    <div class="global-title wow zoomIn">
        <h1>GALLERY BLOG</h1>
    </div>
</section>
<!-- END TITLE SECTION -->

<!-- START PHOTOGALLERY SECTION -->
<section id="discography">
    <div class="row">
      <?php foreach ($photos as $photo) : ?>
        <div class="w-100 col-md-4 music-banner" >
            <div class="w-100">
                <img class="music-banner-image" src="admin/<?php echo $photo->picture_path(); ?>" alt="David Cohen">
                <div class="music-banner-text">
                    <div class="dis-name">
                        <h2><?php echo $photo->title; ?></h2>
                        <p><?php echo $photo->caption; ?></p>
                    </div>
                </div>
                <a href="photo.php?id=<?php echo $photo->id; ?>" class="music-banner-link"></a>
            </div>
        </div>
      <?php endforeach; ?>
    </div>
</section>

<div class="see-more">
    <?php

     if ($paginate->page_total() > 1) {
         if ($paginate->has_next()) {
             echo "<a href='index.php?page={$paginate->next()}' class='more text-white mr-5'> Next &raquo;</a>";
         }

         if ($paginate->has_previous()) {
             echo "<a href='index.php?page={$paginate->previous()}' class='more text-white ml-5'>&laquo; Previous</a>";
         }
     }

    ?>

</div>


<!-- END PHOTOGALLERY SECTION -->

<?php include("includes/footer.php") ?>
