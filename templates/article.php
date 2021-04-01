<?php
/*
  Template Name: Article
 */

get_header();
?>
<div class="page-title">
    <div class="container">
        <ol class="breadcrumb m-0 px-0 py-3">
            <li class="breadcrumb-item"><a href="<?php echo home_url() ?>" rel="nofollow">Trang chủ</a></li>
            <li class="breadcrumb-item active"><?php echo the_title(); ?></li>
        </ol>
    </div>
</div>
<section class="main_page_colum_layout">
    <section class="news_post_main">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php
                    while (have_posts()) :
                        the_post();
                        ?>
                        <div class="card">
                            <div class="about-izone-images">
                                <?php
                                if (has_post_thumbnail()) {
                                    echo '<img src="' . get_the_post_thumbnail_url() . '" alt="">';
                                }
                                ?>
                            </div>
                            <div class="card-body">
                                <div class="post-detail mb-4">
                                    <div class="mt-16 about-izone-post">
                                        <?php
                                        the_content();
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div><?php sn_action(); ?></div>
                        <?php
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
    </section>
</section>
<?php
get_footer();
