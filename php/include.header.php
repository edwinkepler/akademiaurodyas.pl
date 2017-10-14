<?php
    // To prevent from opening include and scripts outside of a page
    if( !defined( "PAGE" ) ) {
        die();
    }
?>

<header id="header" class="padding-bottom-50px">
    <div class="header-bg" data-interchange="[assets/img/header/pink_head_bg_large.jpg, default], [assets/img/header/pink_head_bg_small.jpg, small], [assets/img/header/pink_head_bg_medium.jpg, medium], [assets/img/header/pink_head_bg_large.jpg, large]">
    <div class="bg-shader"></div>
    </div>
    <div class="row">
        <div class="medium-20 column column-padding">
            <div class="display-table height-40rem margin-top-1rem width-100">
                <div class="display-table-cell text-center">
                    <h1 class="text-header-flavor no-margin color-1 text-shadow margin-top-10rem">Bądź jeszcze piękniejsza</h1>
                </div>
            </div>
        </div>
    </div>
    <section id="prices">
        <?php include("php/include.prices.php") ?>
    </section>
</header>
<div class="section-spacer"></div>
