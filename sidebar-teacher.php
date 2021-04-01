<?php
global $post;
$same_teachers = get_posts([
    'post_type' => 'teacher',
    'orderby' => 'rand',
    'post_status' => 'publish',
    'numberposts' => 3,
    'post__not_in' => is_single() ? [get_the_ID()] : []
]);
?>
<div class="sidebar-sticky">
    <div class="card">
        <div class="card-header py-2 text-center">
            <h5 class="h3 mb-0">Các giảng viên tương tự</h5>
        </div>
        <div class="card-body p-0">
            <ul class="gw-nav gw-nav-list">
                <?php
                foreach ($same_teachers as $post) {
                    $excerpt = '';
                    $excerpt_items = preg_split("/\r\n|\n|\r/", get_the_excerpt());
                    foreach ($excerpt_items as $item) {
                        if ($item) {
                            $class = '';
                            if (preg_match('/^\d\.\d(.*)ielts/', strtolower($item)) || preg_match('/^ielts(.*)\d\.\d/', strtolower($item))) {
                                $class = 'ielts-point';
                            }
                            $excerpt .= '<small class="text-center d-block mb-0 h5 font-weight-normal ' . $class . '">' . $item . '</small>';
                        }
                    }
                ?>
                    <a href="<?= get_the_permalink() ?>">
                        <div class="gv-item">
                            <div class="card">
                                <div class="card-body gv-card-body">
                                    <div class="gv-avatar">
                                        <img src="<?= (has_post_thumbnail() ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/assets/app/images/noimage.jpg') ?> " alt="">
                                    </div>
                                    <div class="mb-4 text-center">
                                        <h5 class="h3 title">
                                            <span class="mb-1 teacher-name"><?= get_the_title() ?></span>
                                            <small class="d-block h4 font-weight-light text-truncate-3 text-justify"><?= $excerpt ?></small>
                                        </h5>
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