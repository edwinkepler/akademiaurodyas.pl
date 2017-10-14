<?php
    // To prevent from opening include and scripts outside of a page
    define( "PAGE", TRUE );

    $search = $_GET["search"];
?>

<!doctype html>
<html class="no-js" lang="pl">
<head>
    <?php include( "php/include.meta.php" ) ?>
</head>
    <body>
        <?php include( "php/include.navigation.php" ) ?>

        <header id="header">
            <div class="header-bg prices-background-cover" data-interchange="[assets/img/header/search_bg_large.jpg, default], [assets/img/header/search_bg_small.jpg, small], [assets/img/header/search_bg_medium.jpg, medium], [assets/img/header/search_bg_large.jpg, large]"></div>
            <div class="row padding-top-25rem">
                <div class="small-20 large-7 column column-padding">
                    <div class="card color-1 bg-color-1">
                        <p class="text-xhuge text-center no-margin object-padding">
                            <?php
                                echo "Szukaj";
                                if( $search != "" ){
                                    echo ": " . $search;
                                }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </header>

        <section id="search" class="padding-bottom-50px bg-color-3 color-2">
            <?php
                if( $search == "" ) {
                    echo "<div class=\"row\">";
                        echo "<div class=\"small-10 column column-padding\">";
                            echo "<div class=\"row\">";
                                    include( "php/element.searchfield.php" );
                                echo "</div>";
                        echo "</div>";
                    echo "</div>";
                    include( "php/include.prices.php" );
                } else {
                    include( "php/script.search.php" );
                }
            ?>
        </section>

        <?php include( "php/include.contact.php" ) ?>
        <?php include( "php/include.footer.php" ) ?>
        <?php include( "php/include.scripts.php" ) ?>
    </body>
</html>
