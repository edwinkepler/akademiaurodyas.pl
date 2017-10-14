<?php
    // To prevent from opening include and scripts outside of a page
    if( !defined( "PAGE" ) ) {
        die();
    }
?>
<section id="navigation">
    <div class="">
        <div class="row block height35px nav-bg-color-1">
            <div class="nav-stripe-name color-1 margin-left-05rem float-left">
                <div class="contener-for-log">
                    <h5 class="no-margin show-for-medium">Akademia Urody</h5>
                    <a href="index.php"><img class="show-for-small logo" src="assets/img/logo/logo.png" alt="Akademia Urody Agnieszki Sasin"></img></a>
                    <h5 class="no-margin show-for-medium">Agnieszki Sasin</h5>
                </div>
            </div>
            <nav class="nav-main margin-right-05rem float-right">
                <div class="nav-inner-wrapper upper-nav show-for-large">
                    <a class="color-1" href="https://www.facebook.com/AkademiaUrodyAS/" target="_blank">FACEBOOK</a>
                    <a class="color-1" href="index.php#contact">KONTAKT</a>
                    <a class="color-1" href="index.php#gallery">SALON</a>
                    <a class="color-1" href="index.php#team">ZESPÓŁ</a>
                    <a class="color-1" href="index.php#about">O MNIE</a>
                    <a class="color-1" href="index.php#prices">CENNIK</a>
                </div>
                <div class="dropdown-mobile-menu hide-for-large">
                    <button class="button button-mobile no-margin no-border">MENU</button>
                      <div class = "mobile-nav text-center no-margin ">
                        <a href="index.php#prices">CENNIK</a>
                        <a href="index.php#about">O MNIE</a>
                        <a href="index.php#team">ZESPÓŁ</a>
                        <a href="index.php#gallery">SALON</a>
                        <a href="index.php#contact">KONTAKT</a>
                        <a href="http://example.com" target="_blank">FACEBOOK</a>
                        <a href="cennik.php?cat=face">KOSMETYKA TWARZY</a>
                        <a href="cennik.php?cat=body">PIELĘGNACJA CIAŁA</a>
                        <a href="cennik.php?cat=massage">MASAŻ</a>
                        <a href="cennik.php?cat=hands">PIELĘGNACJA STÓP I RĄK</a>
                        <a href="cennik.php?cat=misc">INNE ZABIEGI</a>
                      </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="show-for-large">
        <div class="row block height25px nav-bg-color-2">
            <nav class="nav-main margin-right-05rem float-right">
                <div class="nav-inner-wrapper lower-nav">
                    <a class="text-smaller color-3" href="cennik.php?cat=misc">INNE ZABIEGI</a>
                    <a class="text-smaller color-3" href="cennik.php?cat=hands">PIELĘGNACJA STÓP I RĄK</a>
                    <a class="text-smaller color-3" href="cennik.php?cat=massage">MASAŻ</a>
                    <a class="text-smaller color-3" href="cennik.php?cat=body">PIELĘGNACJA CIAŁA</a>
                    <a class="text-smaller color-3" href="cennik.php?cat=face">KOSMETYKA TWARZY</a>
                </div>
            </nav>
        </div>
    </div>
</section>
