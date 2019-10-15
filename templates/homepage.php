<?php
  include 'header.php';
?>

    <section class="welcome-area">
        <div class="welcome-slides owl-carousel">

        <!-- Single Slide -->
            <div class="single-welcome-slide bg-img bg-overlay" style="background-image: url(../resources/img/cover.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <!-- Welcome Text -->
                        <div class="col-12 col-lg-12 col-xl-12">
                            <div class="welcome-text">
                                <h2 data-animation="bounceInDown" data-delay="900ms">Hi, welcome to Hao's Online Space!</h2>
                                <p data-animation="bounceInDown" data-delay="500ms">University of Virginia (Graduating May 2020) | Computer Science, Astronomy</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php foreach($results["posts"] as $post){ ?>
            <!-- Single Slide -->
            <div class="single-welcome-slide bg-img bg-overlay" style="background-image: url(../resources/img/<?php echo htmlspecialchars($post->coverImage) ?>);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <!-- Welcome Text -->
                        <div class="col-12 col-lg-12 col-xl-12">
                            <div class="welcome-text">
                                <h2 data-animation="bounceInDown" data-delay="900ms"><?php echo htmlspecialchars($post->title) ?></h2>
                                <p data-animation="bounceInDown" data-delay="500ms"><?php echo htmlspecialchars($post->summary) ?></p>
                                <div class="hero-btn-group" data-animation="bounceInDown" data-delay="100ms">
                                    <a href=".?action=viewPost&amp;postId=<?php echo $post->id?>" class="btn alime-btn mb-3 mb-sm-0 mr-4">Read full story</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
    </section>
    <!-- Welcome Area End -->

    <!-- Gallery Area Start -->
    <div class="alime-portfolio-area section-padding-80 clearfix">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Projects Menu -->
                    <div class="alime-projects-menu">
                        <div class="portfolio-menu text-center">
                            <button class="btn" data-filter=".about-me">About me</button>
                            <button class="btn" data-filter=".about-site">About this site</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row alime-portfolio">
                <!-- Single Gallery Item -->
                <div class="col-md-12 single_gallery_item about-me mb-30 wow fadeInUp" data-wow-delay="100ms">
                    <div class="single-portfolio-content">
                    <br/>
                    <?php echo ABOUT_ME ?>
                    </div>
                </div>

                <!-- Single Gallery Item -->
                <div class="col-md-12 single_gallery_item about-site mb-30 wow fadeInUp" data-wow-delay="300ms">
                    <div class="single-portfolio-content">
                    <br/>
                    <?php echo ABOUT_SITE ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php
  include 'footer.php';
?>