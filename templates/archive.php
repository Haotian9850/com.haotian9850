<?php
  include 'header.php';
?>

    <!-- Breadcrumb Area Start -->
    <section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(../resources/img/<?php echo ARCHIVE_TITLE_BACKGROUND ?>);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title">Latest Posts</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php"><i class="icon_house_alt"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Posts</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

    <!-- Blog Area Start -->
    <div class="alime-blog-area section-padding-80-0 mb-70">
        <div class="container">
            <div class="row">
                <?php foreach($results["posts"] as $post){ ?>
                <!-- Single Blog Area -->
                <div class="col-12 col-lg-6">
                    <div class="single-post-area wow fadeInUpBig" data-wow-delay="100ms">
                        <!-- Post Thumbnail -->
                        <a href="#" class="post-thumbnail"><img src="../resources/img/<?php echo htmlspecialchars($post->coverImage) ?>" style="width:600px;height:300px;object-fit:cover" alt=""></a>
                        <!-- Post Catagory -->
                        <a href="#" class="btn post-catagory">
                            <?php echo htmlspecialchars($post->author) ?>
                        </a>
                        <!-- Post Conetent -->
                        <div class="post-content">
                            <div class="post-meta">
                                <a href="#">
                                <?php echo htmlspecialchars($post->publicationDate) ?>
                                </a>
                            </div>
                            <a href=".?action=viewPost&amp;postId=<?php echo $post->id?>" class="post-title"><?php echo htmlspecialchars($post->title) ?></a>
                        </div>
                    </div>
                </div>
                <?php } ?>
             

            </div>
        </div>
    </div>
    <!-- Blog Area End -->

<?php
  include 'footer.php';
?>