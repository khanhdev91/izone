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
            <?= generate_breadcrumb() ?>
        </ol>
    </div>
</div>
<?php
global $post;
$posts = get_posts([
    'post_type' => 'course',
    'post_status' => 'publish',
    'numberposts' => -1,
    'order' => 'ASC',
        ]);
if ($posts) {
    ?>
    <section class="home-course-section pt-3 pt-md-4 pb-3 pb-md-5 bg-lighter">
        <div class="container">
            <div class="mb-4 d-flex align-items-center justify-content-between">
                <h3 class="display-4 font-bold text-center mb-0">CÁC KHÓA HỌC</h3>
            </div>
            <div class="">
                <div class="gv-slider owl-carousel owl-theme owl-loaded owl-drag" id="course-slider">
                    <?php
                    $temp = ['danger', 'primary', 'info', 'warning'];
                    $i = -1;
                    foreach ($posts as $post) {
                        $i++;
                        setup_postdata($post);
                        ?>
                        <div class="item">
                            <div class="card mb-0">
                                <div class="card-header">
                                    <h5 class="fs-14 fs-md-17 h3 mb-0"><?php the_title() ?></h5>
                                </div>
                                <div class="card-body p-0">
                                    <div class="">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            echo '<img src="' . get_the_post_thumbnail_url() . '" alt="">';
                                        } else {
                                            echo '<img src="' . get_template_directory_uri() . '/assets/app/images/noimage.jpg" alt="">';
                                        }
                                        ?>
                                    </div>
                                    <div class="p-4">
                                        <ul class="list-unstyled mb-4">
                                            <?php
                                            $excerpt_items = preg_split("/\r\n|\n|\r/", get_the_excerpt());
                                            foreach ($excerpt_items as $item) {
                                                ?>
                                                <li class="mb-2">
                                                    <div class="d-flex align-items-center">
                                                        <div class="icon icon-xs icon-shape bg-gradient-<?php echo $temp[$i % 4]; ?> text-white shadow rounded-circle"></div>
                                                        <span class="pl-2 text-sm d-block"><?php echo $item ?></span>
                                                    </div>
                                                </li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                        <a href="<?php the_permalink() ?>" class="btn btn-block btn-<?php echo $temp[$i % 4]; ?>">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}
get_footer();
