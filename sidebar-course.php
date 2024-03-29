<?php
$excerpt_items = preg_split("/\r\n|\n|\r/", get_the_excerpt());
$temp = ['danger', 'primary', 'info', 'warning'];
$color = $temp[rand(0,3)];
?>
<div class="card mb-2 home-course-section">
    <div class="card-header p-2">
        <h5 class="h3 mb-0 fs-14 fs-md-17 text-center"><?php the_title() ?></h5>
    </div>
    <div class="card-body p-2">
        <?php
        if(is_single()) {
            if(has_post_thumbnail()) {
        ?>
        <div class="">
            <img src="<?= get_the_post_thumbnail_url() ?>" alt="">
        </div>
        <?php
            }
        }
        ?>
        <div class="p-3">
            <ul class="list-unstyled mb-0">
                <?php foreach ($excerpt_items as $item) { ?>
                <li class="mb-2">
                    <div class="d-flex align-items-center">
                        <div class="icon icon-xs icon-shape bg-gradient-<?= $color ?> text-white shadow rounded-circle"></div>
                        <span class="pl-2 text-sm d-block"><?= $item ?></span>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<div class="card mb-2">
    <div class="card-body pl-2 pr-2 pb-1">
        <div class="post-share mb-0">
            <div class="addthis_inline_share_toolbox"><?php sn_action(); ?></div>
        </div>
    </div>
</div>
<div class="sidebar-sticky">
    <div class="d-flex align-items-center bg-white shadow mb-2" style="border-radius: .375rem;">
        <div>
            <img width="55" height="48" src="<?= get_template_directory_uri() . '/assets/app/images/social-proof.png' ?>">
        </div>
        <div class="pl-2">
            <span class="bought-number">52</span> học viên đã đăng ký
        </div>
    </div>
    <div class="card">
        <div class="card-header p-2">
            <!-- Title -->
            <h5 class="h3 mb-0 fs-14 fs-md-17 text-center">ĐĂNG KÝ GIỮ CHỖ</h5>
        </div>
        <div class="card-body p-3">
            <?php echo do_shortcode('[sc name="register-form" ]'); ?>
        </div>
    </div>
</div>