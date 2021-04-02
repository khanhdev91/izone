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
                <div class="col-12 col-lg-9 order-1 order-lg-0">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="article-header">
                                <h1 class="text-center">
                                    <?php the_title(); ?>
                                </h1>
                            </div>
                            <?php if (get_the_post_thumbnail_url()) : ?>
                                <div class="p-0 col-12 col-md-10 col-lg-9 m-auto">
                                    <div class="ps-relative mb-3 mt-2 mt-md-3">
                                        <div class="thumb-ratio ratio-1-1">
                                            <a href="#">
                                                <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="post-detail mb-4">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                    <div><?php sn_action(); ?></div>
                    <div class="card d-none d-md-block mb-3">
                        <div class="card-body p-0">
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center w-50">
                                <?php if($previous_post = get_previous_post()): ?>
                                    <a href="<?= get_permalink($previous_post->ID) ?>" class="d-flex align-items-center justify-content-center bg-danger text-white w-50px h-50px">
                                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                                    </a>
                                    <div class="d-flex align-items-center flex-fill min-w-1">
                                        <a href="<?= get_permalink($previous_post->ID) ?>" class="px-3 text-nowrap text-truncate text-default text-hover-main"><?= $previous_post->post_title ?></a>
                                    </div>
                                <?php endif; ?>
                                </div>
                                <?php if($next_post = get_next_post()): ?>
                                <div class="d-flex align-items-center w-50">
                                    <div class="d-flex align-items-center flex-fill min-w-1">
                                        <a href="<?= get_permalink($next_post->ID) ?>" class="px-3 text-nowrap text-truncate text-default text-hover-main"><?= $next_post->post_title ?></a>
                                    </div>
                                    <a href="<?= get_permalink($next_post->ID) ?>" class="d-flex align-items-center justify-content-center bg-danger text-white w-50px h-50px">
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3 order-0 order-lg-1 sidebar-detail">
                    <?php get_sidebar('schedule'); ?>
                </div>
            </div>
        </div>
    </section>
</section>
<?php
get_footer();
