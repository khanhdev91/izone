<?php
get_header();
?>
<div class="page-title">
    <div class="container">
        <ol class="breadcrumb m-0 px-0 py-3">
            <li class="breadcrumb-item"><a href="<?php echo home_url() ?>" rel="nofollow">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="<?php echo get_post_type_archive_link(get_post_type())?>">Khóa học</a></li>
            <li class="breadcrumb-item active"><?php echo the_title(); ?></li>
        </ol>
    </div>
</div>
<section class="main_page_colum_layout">
    <section class="news_post_main">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="card sidebar-sticky mb-2" id="market-statistics-nav">
                        <div class="card-body p-0">
                            <nav class="navbar">
                                <ul class="nav nav-pills">
                                    <li class="">
                                        <a class="active" href="#market-statistics-1">Thông tin chung</a>
                                    </li>
                                    <li class="">
                                        <a class="" href="#market-statistics-2">Cấu trúc</a>
                                    </li>
                                    <li class="">
                                        <a class="" href="#market-statistics-3">Phương pháp</a>
                                    </li>
                                    <li class="">
                                        <a class="" href="#market-statistics-4">Giảng viên</a>
                                    </li>
                                    <li class="">
                                        <a class="" href="#market-statistics-5">Phản hồi</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <?php
                    while (have_posts()) :
                        the_post();
                        the_content();
                    endwhile;

                    /**
                     * sidebar
                     */
                    if (is_active_sidebar('sidebar-course')) :
                        ?>
                        <div class="col-12 col-lg-4">
                            <?php dynamic_sidebar('sidebar-course'); ?>
                        </div>
                        <?php
                    endif;
                    ?>                                    
                </div>
            </div>
        </div>
    </section>
</section>
<?php
get_footer();
