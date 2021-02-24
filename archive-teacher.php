<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package izone
 */
get_header();
?>
<div class="page-title">
    <div class="container">
        <ol class="breadcrumb m-0 px-0 py-3">
            <li class="breadcrumb-item"><a href="<?php echo home_url() ?>" rel="nofollow">Trang chủ</a></li>
            <li class="breadcrumb-item active">Đội hình giảng viên</li>
        </ol>
    </div>
</div>
<section class="main_page_colum_layout">
    <section class="news_post_main">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="article-header">
                                <h1 class="text-center">
                                    CHÂN DUNG GIẢNG VIÊN IZONE
                                </h1>
                                <?php sn_action() ?>
                                <div class="post-sumary text-center mb-4 content-750 mx-auto">
                                    <!-- get post-sumary form backend -->
                                    <p>IZONE - IELTS Chiến Lược với đội ngũ giảng viên có trình độ chuyên môn cao và sự tận tâm trong công việc đã không ngừng nỗ lực, đào tạo hơn 10.000 học viên trong suốt 5 năm hoạt động. Chúng ta cùng tìm hiểu về những con người đã tạo nên sự thành công của IZONE ngày hôm nay.
                                    </p>
                                </div>
                            </div>
                            <?php if (have_posts()) : ?>

                                <div class="post-detail mb-4">
                                    <div class="list-giangvien">

                                        <?php
                                        /* Start the Loop */
                                        while (have_posts()) :
                                            the_post();
                                            ?>
                                            <div class="dh-gv-item mb-2">
                                                <div class="ps-relative mb-3">
                                                    <div class="thumb-ratio ratio-1-1">
                                                        <a href="<?php the_permalink() ?>">
                                                            <div class="details">
                                                                <span class="title">Xem chi tiết</span>
                                                            </div>
                                                            <?php
                                                            if (has_post_thumbnail()) {
                                                                echo '<img src="' . get_the_post_thumbnail_url() . '" alt="">';
                                                            } else {
                                                                echo '<img src="'.get_template_directory_uri() . '/assets/app/images/teacher.jpg" alt="">';
                                                            }
                                                            ?>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <h5 class="h3 title">
                                                        <a href="<?php the_permalink() ?>">
                                                            <span class="text-center d-block mb-1 fs-14 fs-md-17"><?php the_title() ?></span>
                                                        </a>
                                                        <?php the_excerpt() ?>
                                                    </h5>
                                                </div>
                                            </div>
                                            <?php
                                        endwhile;
                                        ?>
                                    </div>
                                    <?php sn_comment() ?>
                                </div>
                                <?php
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<?php
get_footer();
