</div>
</section>
<?php 
if((is_single() || is_page()) && !is_front_page() && !is_admin()) {
?>
<div class="container">
        <?php sn_comment(); ?>
</div>
<?php
}
?>
<footer class="theme-footer">
    <div class="container">
        <div class="inner-wrapper">
            <div class="top-footer-data-wrapper">
                <div class="row">
                    <div class="col-lg-4 col-sm-6 footer-logo mb-4 mb-lg-0">
                        <div class="logo mb-3">
                            <?php the_custom_logo(); ?>
                        </div>
                        <?php echo do_shortcode('[sc name="footer-infomation"]'); ?>
                    </div>
                    <div class="row col-lg-8">
                        <?php echo do_shortcode('[sc name="footer-menu"]'); ?>
                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.top-footer-data-wrapper -->
            <div class="bottom-footer d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-start justify-content-md-between">
                <p class="copyright">© <?= date('Y') ?> <a href="<?= home_url() ?>">IZONE</a> All Right Reserved</p>
                <div>
                    <ul class="list-unstyled">
                        <?php echo do_shortcode('[sc name="footer-social-network-list"]'); ?>
                    </ul>

                </div>
            </div> <!-- /.bottom-footer -->
        </div>
    </div> <!-- /.container -->
</footer>
</div>
</div>
<nav class="mobilenav" id="mobilenav-main">
    <div class="mobilenav-scrollbar">
        <!-- Brand -->
        <div class="mobilenav-header">
            <h3 class="mobilenav-title">MENU</h3>
            <a href="#" class="mobilenav-close">
                <svg width="18" height="18" viewBox="0 0 18 18">
                    <g id="close-thin" transform="translate(-503.601 -121.601)">
                        <path d="M.012.148,23.45,0l-.012,1.856L0,2Z" transform="translate(505.018 121.601) rotate(45)" />
                        <path d="M0,0,23.439.148,23.45,2,.012,1.856Z" transform="translate(521.6 123.018) rotate(135)" />
                    </g>
                </svg>
            </a>
        </div>
        <div class="mobilenav-inner">
            <?php
            menu('mobile-menu');
            ?>
        </div>
    </div>
</nav>
<div class="fixed-btn">
    <?php
    $posts = get_posts([
        'post_type' => 'schedule',
        'post_status' => 'publish',
        'numberposts' => 1,
        'order' => 'DESC',
    ]);
    if ($posts) {
        foreach ($posts as $post) {
            setup_postdata($post);
            echo do_shortcode('[sc name="attachment-button" link="'. get_the_permalink() .'"]');
        }
    }
    wp_reset_postdata();
    ?>
</div>
<?php echo do_shortcode('[sc name="cookie-popup" logo="' . esc_url(wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0]) . '"]'); ?>

<?php wp_footer(); ?>
</body>

</html>