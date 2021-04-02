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
<section class="main_page_colum_layout">
    <section class="news_post_main">
        <div class="container">
            <div class="row">
                <?php if (have_posts()) : ?>
                <div class="col-12 col-lg-9 order-1 order-lg-0">
                    <div class="card">
                        <div class="card-body p-3 p-md-4">
                            <div class="news-list d-flex flex-column">
                                <?php while (have_posts()) : the_post(); ?>
                                    <div class="news-item border-bottom border-bottom-dark feature-news">
                                        <div class="d-flex align-items-center">
                                            <div class="news-thumb ps-relative w-75px w-sm-100px w-md-175px">
                                                <div class="w-100 thumb-ratio ratio-1-1">
                                                    <a href=""><img src="<?= has_post_thumbnail() ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/assets/app/images/noimage.jpg' ?>" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="news-info flex-grow-1 pl-2">
                                                <h3 class="mb-1"><a href="<?php the_permalink() ?>" class="text-dark main-title mb-2 fs-15 fs-md-17"><?php the_title() ?></a></h3>
                                                <p class="mb-2 text-muted text-truncate-3 d-none d-md-block"><?= wp_trim_words( get_the_content(), 80 ); ?></p>
                                                <p class="mb-0 text-muted fs-13"><a href="<?php the_permalink() ?>" class="text-main">Read more</a></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <?php nav_pagination(); ?>
                    </div>
                </div>
                <?php endif; ?>
                <div class="col-12 col-lg-3 order-0 order-lg-1 sidebar-detail">
                    <?php get_sidebar('test'); ?>
                </div>
            </div>
        </div>
    </section>
</section>
<?php
get_footer();
