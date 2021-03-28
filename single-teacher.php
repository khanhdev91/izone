<?php
get_header();
?>
<div class="page-title">
    <div class="container">
        <ol class="breadcrumb m-0 px-0 py-3">
            <?= generate_breadcrumb() ?>
        </ol>
    </div>
</div>
<?php
while (have_posts()) :
    the_post();
    ?>
    <section class="main_page_colum_layout">
        <section class="news_post_main">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php if(has_post_thumbnail()): ?>
                                <div class="p-0 col-12 col-md-10 col-lg-10 m-auto">
                                    <div class="ps-relative mb-3 mt-2 mt-md-3">
                                        <div class="thumb-ratio ratio-1-1">
                                            <a href="#">
                                                <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div class="article-header mt-3">
                                    <h1 class="text-center">
                                        <?php the_title(); ?>
                                    </h1>
                                    <?php sn_action() ?>
                                </div>
                                <div class="post-detail mb-4">
                                    <!-- get post form backend -->
                                    <div class="p-0 col-12 col-md-12 col-lg-10 m-auto">
                                        <div class="pre-line text-justify d-block">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <?php
endwhile;
get_footer();
