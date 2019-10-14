<?php
  include 'header.php';
?>

    <!-- Breadcrumb Area Start -->
    <section class="breadcrumb-area blog bg-img bg-overlay jarallax" style="background-image: url(../resources/img/<?php echo htmlspecialchars($results["post"]->coverImage) ?>);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title"><?php echo htmlspecialchars($results["post"]->title) ?></h2>
                        <div class="post-meta">
                        <a class="post-author"><?php echo htmlspecialchars($results["post"]->summary) ?></a>
                        </div>
                        <div class="post-meta">
                            <a href="#" class="post-author">By <?php echo htmlspecialchars($results["post"]->author) ?></a>
                            <a href="#" class="post-date"><?php echo htmlspecialchars($results["post"]->publicationDate) ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

    <!-- Blog Details Area Start -->
    <div class="alime--blog-area section-padding-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <!-- Blog Details Text -->
                    <div class="blog-details-text">
                    <?php echo htmlspecialchars($results["post"]->content) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Details Area End -->


<?php
  include 'footer.php';
?>