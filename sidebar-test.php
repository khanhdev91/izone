<?php
$test_category = get_category_by_slug('test');
$parent_categories = get_categories([
    'parent' => $test_category->term_id,
    'orderby' => 'slug',
    'hide_empty' => false,
]);
?>
<div class="sidebar-sticky">
    <div class="card">
        <div class="card-header py-2">
            <h5 class="h3 mb-0">Chọn mục tiêu</h5>
        </div>
        <div class="card-body p-0">
            <div class="nano-content">
                <ul class="gw-nav gw-nav-list">
                <?php foreach($parent_categories as $parent_category) {
                        $sub_categories = get_categories([
                            'parent' => $parent_category->term_id,
                            'orderby' => 'slug',
                            'hide_empty' => false,
                        ]); ?>
                        <li class="arrow-down bg-<?= $parent_category->slug ?>">
                            <a  href="<?= get_category_link($parent_category) ?>" class="gw-menu d-flex align-items-center justify-content-between">
                                <span class="gw-menu-text"><?= $parent_category->slug . ' ' . count($sub_categories) ?> </span>
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                            <ul class="gw-submenu">
                                <?php foreach($sub_categories as $sub_category) { ?> 
                                <li class="">
                                    <a title="<?= $sub_category->name ?>" href="<?= get_category_link($sub_category) ?>"><?= $sub_category->name ?></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>