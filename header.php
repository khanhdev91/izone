<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="canonical" href="canonical_url">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php fb_metadata(); ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId: '536192910686775',
                xfbml: true,
                version: 'v10.0'
            });
            FB.AppEvents.logPageView();
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <div class="fb-customerchat" attribution="setup_tool" page_id="106253867468828">
    </div>
    <div class="wrapper-container mobilenav-wrapper header-fixed">
        <div id="page-wrapper">
            <div class="header-top bg-light py-1 fs-12">
                <div class="container">
                    <div class="row d-flex align-items-center justify-content-between">
                        <?php echo do_shortcode('[sc name="header-hotline-email"]'); ?>
                    </div>
                </div>
            </div>
            <header class="header">
                <div class="container">
                    <div class="header-content">
                        <div class="header-left">
                            <a title="Home page" href="<?php echo home_url() ?>" class="Izone-logo">
                                <img src="<?php echo esc_url(wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0]) ?>" alt="Izone">
                            </a>
                        </div>
                        <div class="header-center">
                            <div class="menu hidden-xs">
                                <?php
                                menu('main-menu');
                                ?>
                            </div>
                        </div>
                        <div class="header-right">
                            <div class="toggle-menu-right">
                                <div class="toggle-menu ">
                                    <a title="Menu" href="#" class="mobilenav-toggle">
                                        <svg width="20" height="19" viewBox="0 0 20 19">
                                            <g transform="translate(-5.834 2)">
                                                <g transform="translate(5.834 -2)">
                                                    <g transform="translate(-5.834 2)">
                                                        <rect width="20" height="3" rx="1.5" transform="translate(5.834 -2)" />
                                                    </g>
                                                    <g transform="translate(-5.834 10)">
                                                        <rect width="20" height="3" rx="1.5" transform="translate(5.834 -2)" />
                                                    </g>
                                                    <g transform="translate(-5.834 18)">
                                                        <rect width="20" height="3" rx="1.5" transform="translate(5.834 -2)" />
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="fix-header"></div>
            <section id="site-content">
                <div id="main">