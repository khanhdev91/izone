<?php
get_header();
?>
<div class="page-title">
    <div class="container">
        <ol class="breadcrumb m-0 px-0 py-3">
            <li class="breadcrumb-item"><a href="<?php echo home_url() ?>" rel="nofollow">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="<?php echo get_post_type_archive_link(get_post_type()) ?>">Đội Hình Giảng viên</a></li>
            <li class="breadcrumb-item active"><?php echo the_title(); ?></li>
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
                                <div class="p-0 col-12 col-md-10 col-lg-8 m-auto">
                                    <div class="ps-relative mb-3 mt-2 mt-md-3">
                                        <div class="thumb-ratio ratio-1-1">
                                            <a href="#">
                                                <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="article-header mt-3">
                                    <h1 class="text-center">
                                        <?php the_title(); ?>
                                    </h1>
                                    <?php sn_action() ?>
                                </div>
                                <div class="post-detail mb-4">
                                    <!-- get post form backend -->

                                    <div class="p-0 col-12 col-md-8 col-lg-6 m-auto">
                                        <div class="pre-line text-justify d-block">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php sn_comment() ?>
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
