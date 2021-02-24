</div>
</section>
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
                        <div class="col-lg-4 col-sm-6 footer-list mb-4 mb-lg-0">
                            <h4 class="title text-uppercase pb-0 pb-sm-4">Giới thiệu</h4>
                            <ul class="list-unstyled">
                                <li><a href="ve-izone--gioi-thieu.html">Về Izone</a></li>
                                <li><a href="ve-izone--doi-tac.html">Đối tác của Izone</a></li>
                                <li><a href="giang-vien--danh-sach.html">Đội Hình Giảng viên</a></li>
                            </ul>
                        </div> <!-- /.footer-list -->
                        <div class="col-lg-4 col-sm-6 footer-list mb-4 mb-lg-0">
                            <h4 class="title text-uppercase pb-0 pb-sm-4">ĐÀO TẠO</h4>
                            <ul class="list-unstyled">
                                <li><a href="khoa-hoc--danh-sach.html">Khóa Học</a></li>
                                <li><a href="lich-khai-giang--thang-11.html">Lịch khai giảng</a></li>
                                <li><a href="test-online--form.html">Test Online</a></li>
                                <li><a href="luyen-thi-ielts-online--danh-sach.html">Luyện Thi IELTS Online</a></li>
                            </ul>
                        </div> <!-- /.footer-list -->
                        <div class="col-lg-4 col-sm-6 footer-list mb-4 mb-lg-0">
                            <h4 class="title text-uppercase pb-0 pb-sm-4">Liên Hệ</h4>
                            <ul class="list-unstyled">
                                <li><a href="dang-ky-hoc.html">Đăng Ký Học</a></li>
                                <li><a href="#">Tuyển Dụng</a></li>
                                <li><a href="#">Khác</a></li>
                            </ul>
                        </div> <!-- /.footer-list -->
                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.top-footer-data-wrapper -->
            <div class="bottom-footer d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-start justify-content-md-between">
                <p class="copyright">© 2019 <a href="trang-chu.html">IZONE</a> All Right Reserved</p>
                <div>
                    <ul class="list-unstyled">
                        <li>
                            <a href="https://www.facebook.com/IELTSIZONE/" class="ml-0 ml-md-2 mr-2 mr-md-0 bg-facebook" data-toggle="tooltip" data-title="Fanpage">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/groups/ielszonevn/" class="ml-0 ml-md-2 mr-2 mr-md-0 bg-facebook" data-toggle="tooltip" data-title="IELTS Zone Group">
                                <i class="fa fa-facebook-square" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/ielts_izone/" class="ml-0 ml-md-2 mr-2 mr-md-0 bg-instagram" data-toggle="tooltip" data-title="Instagram">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/IELTSIZONE" class="ml-0 ml-md-2 mr-2 mr-md-0 bg-youtube" data-toggle="tooltip" data-title="Youtube">
                                <i class="fa fa-youtube-play" aria-hidden="true"></i>
                            </a>
                        </li>
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
    <a title="LỊCH KHAI GIẢNG" href="lich-khai-giang--thang-11.html">
        <div class="fixed-btn-icon"><img src="/wp-content/uploads/2020/01/khoahoc.png" alt="icon"></div>
        <div class="fixed-btn-text">LỊCH KHAI GIẢNG</div>
    </a>
</div>
<a href="javascript:void(0);" class="cd-top">Top</a>

<?php echo do_shortcode('[sc name="cookie-popup" logo="' . esc_url(wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0]) . '"]'); ?>

<?php wp_footer(); ?>
<!-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5de78fb38192bc45"></script> -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0&appId=585028375359473&autoLogAppEvents=1"></script>
</body>
</html>
