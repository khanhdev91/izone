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
$parent_category = get_category_by_slug('course');
if ($parent_category) {
    $child_categories = get_categories([
        'parent' => $parent_category->term_id,
        'orderby' => 'slug',
        'hide_empty' => false,
    ]);
}
$query = [
    'post_type' => 'course',
    'post_status' => 'publish',
    'numberposts' => -1,
    'order' => 'ASC',
];
$blocks = [];
if (!empty($child_categories)) {
    foreach ($child_categories as $child_category) {
        $query['cat'] = $child_category->term_id;
        $temp['category'] = $child_category;
        $temp['posts'] = get_posts($query);
        $blocks[] = $temp;
    }
} else {
    $temp['category'] = $parent_category;
    $temp['posts'] = get_posts($query);
    $blocks[] = $temp;
}
if ($blocks) {
    foreach ($blocks as $block) {
?>
        <section class="main_page_colum_layout list-course-section">
            <section class="news_post_main">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="article-header">
                                        <h1 class="text-center">
                                            <?= $block['category']->name ?>
                                        </h1>
                                    </div>
                                    <div class="post-detail mb-4">
                                        <div class="list-course repeat-<?= count($block['posts']) >=5 ? 5 : count($block['posts'])?>">
                                            <?php
                                            $temp = ['danger', 'primary', 'info', 'warning'];
                                            $i = -1;
                                            foreach ($block['posts'] as $post) {
                                                $i++;
                                                setup_postdata($post);
                                            ?>
                                                <div class="item">
                                                    <div class="card mb-0">
                                                        <div class="card-header">
                                                            <h5 class="fs-14 fs-md-15 h3 mb-0"><?php the_title() ?></h5>
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
                                                            <div class="p-2">
                                                                <ul class="list-unstyled mb-4">
                                                                    <?php
                                                                    $excerpt_items = [];
                                                                    if (has_excerpt()) {
                                                                        $excerpt_items = preg_split("/\r\n|\n|\r/", get_the_excerpt());
                                                                    }
                                                                    foreach ($excerpt_items as $item) {
                                                                    ?>
                                                                        <li class="mb-2">
                                                                            <div class="d-flex align-items-center">
                                                                                <div class="icon icon-xs icon-shape bg-gradient-<?php echo $temp[$i % 4]; ?> text-white shadow rounded-circle"></div>
                                                                                <span class="pl-2 text-xs d-block"><?php echo $item ?></span>
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
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
<?php
    }
}
get_footer();
