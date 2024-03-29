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
            <h5 class="h3 mb-0 fs-14 fs-md-17 text-center">ĐĂNG KÝ HỌC</h5>
        </div>
        <div class="card-body p-3">
            <?php echo do_shortcode('[sc name="register-form" ]'); ?>
        </div>
    </div>
</div>