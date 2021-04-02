<?php
global $post;
$current_category = get_the_category();
$conditions = [
    'post_type' => 'test',
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status' => 'publish',
    'numberposts' => 3,
    'post__not_in' => is_single() ? [get_the_ID()] : [],
    'category_name' => $current_category[0]->slug
];
if (!empty($current_category)) {
    $conditions['category_name'] = $current_category[0]->slug;
}
$related_tests = get_posts($conditions);

$conditions = [
    'post_type' => 'test',
    'meta_key'  => 'post_views_count',
    'orderby'   => 'meta_value_num',
    'order'     => 'DESC',
    'post_status' => 'publish',
    'numberposts' => 3,
    'post__not_in' => is_single() ? [get_the_ID()] : [],
];
$most_view_tests = get_posts($conditions);
?>
<div class="sidebar-sticky">
    <div class="card">
        <div class="card-header py-2 text-center">
            <h5 class="h3 mb-0">Các bài viết liên quan</h5>
        </div>
        <div class="card-body p-0">
            <ul class="gw-nav gw-nav-list">
                <?php
                foreach ($related_tests as $post) {
                ?>
                    <a href="<?= get_the_permalink() ?>">
                        <div class="gv-item">
                            <div class="card">
                                <div class="related-tests">
                                    <div>
                                        <img src="<?= (has_post_thumbnail() ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/assets/app/images/noimage.jpg') ?> " alt="">
                                    </div>
                                    <div class="text-center">
                                        <h4>
                                            <span><?= get_the_title() ?></span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php }
                wp_reset_postdata();
                ?>
            </ul>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-header py-2 text-center">
            <h5 class="h3 mb-0">Các bài viết được quan tâm</h5>
        </div>
        <div class="card-body p-0">
            <ul class="gw-nav gw-nav-list">
                <?php
                foreach ($most_view_tests as $post) {
                ?>
                    <a href="<?= get_the_permalink() ?>">
                        <div class="gv-item">
                            <div class="card">
                                <div class="related-tests">
                                    <div>
                                        <img src="<?= (has_post_thumbnail() ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/assets/app/images/noimage.jpg') ?> " alt="">
                                    </div>
                                    <div class="text-center">
                                        <h4>
                                            <span><?= get_the_title() ?></span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php }
                wp_reset_postdata();
                ?>
            </ul>
        </div>
    </div>
</div>