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
                <div class="col-12 col-lg-8">
                    <?php
                    while (have_posts()) :
                        the_post();
                        the_content();
                    endwhile;
                    ?>
                </div>
                <div class="col-12 col-lg-4 sidebar-detail">
                    <?php get_sidebar('course'); ?>
                </div>
            </div>
        </div>
    </section>
</section>
<?php
get_footer();
