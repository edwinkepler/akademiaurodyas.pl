<?php
    // To prevent from opening include and scripts outside of a page
    define( "PAGE", TRUE );
?>

<!doctype html>
<html class="no-js" lang="pl">
<head>
    <?php include( "php/include.meta.php" ) ?>
</head>
    <body>
        <?php include( "php/include.navigation.php" ) ?>

        <header id="header">
            <div class="header-bg prices-background-cover" data-interchange="[assets/img/header/misc_bg_large.jpg, default], [assets/img/header/misc_bg_small.jpg, small], [assets/img/header/misc_bg_medium.jpg, medium], [assets/img/header/misc_bg_large.jpg, large]"></div>
            <div class="row padding-top-25rem">
                <div class="small-20 large-7 column column-padding">
                    <div class="card color-1 bg-color-1">
                        <p class="text-xhuge text-center no-margin object-padding">404</p>
                    </div>
                </div>
            </div>
        </header>

        <section class="padding-bottom-50px bg-color-3 color-2">
            <div class="row">
                <div class="small-20 medium-13 column column-padding">
                    <h2>Niestety strona, której szukasz nie istnieje. Skorzystaj z wyszukiwarki obok lub kliknij 'Cofnij' w swojej przeglądarce</h2>
                </div>
                <div class="small-20 medium-7 column column-padding">
                    <div class="row">
                        <?php
                            include( "php/element.searchfield.php" );
                        ?>
                        <div class="small-20 column margin-top-05rem">
                            <div class="card color-1 bg-color-1 object-padding">
                                <p class="text-left object-padding">Karnety okolicznościowe - prezent dla bliskiej osoby</p>
                                <p class="text-left text-justify no-margin object-margin">Jeśli szukacie Państwo dla kogoś podarunku i chcecie żeby to było coś oryginalnego, zapraszamy do zakupu karnetu okolicznościowego i ofiarowania zabiegu (na twarz lub ciało) bądź serii spotkań idealnie dobranych do potrzeb obdarowywanej osoby.</p>
                                <p class="text-left text-justify object-padding">Prócz tego oferujemy jeszcze karty stałego klienta upoważniające do zniżek na zabiegi i kosmetyki.</p>
                            </div>
                        </div>
                        <div class="small-20 column margin-top-05rem">
                            <div class="card color-1 bg-color-1 object-padding">
                                <p class="text-left object-padding">Sprzedaż kosmetyków</p>
                                <p class="text-left text-justify no-margin object-margin">Nasza oferta obejmuje sprzedaż kosmetyków detalicznych stanowiących idealne uzupełnienie dla intensywnej kuracji prowadzonej w gabinecie.</p>
                            </div>
                        </div>
                        <?php
                            $categories_names = array( "face", "body", "massage", "hands", "misc" );
                            $categories_titles = array( "Kosmetyka twarzy", "Pielęgnacja ciała", "Masaż", "Dłonie i stopy", "Inne zabiegi" );
                            for ( $i = 0; $i < 5; $i++ ) {
                                if ( $name != $categories_names[$i] ){
                                    echo "<div class=\"small-20 column margin-top-05rem hide-for-small-only\">";
                                        echo "<div class=\"card price-card color-1 bg-color-1\" data-interchange=\"[assets/img/cards/" . $categories_names[$i] . "_slim.jpg, small], [assets/img/cards/" . $categories_names[$i] . "_slim.jpg, small]\">";
                                        echo "<div class=\"card-upper-stripe margin-bottom-70px\"></div>";
                                            echo "<div class=\"price-card-block\">";
                                            echo "<a href=\"cennik.php?cat=" . $categories_names[$i] . "\">";
                                                echo "<div class=\"price-button\">";
                                                echo "<p class=\"color-2\">" . $categories_titles[$i] . "</p>";
                                                echo "<div class=\"button-hover\">";
                                                    echo "<div class=\"button-hover-right\"></div>";
                                                    echo "<div class=\"button-hover-left\"></div>";
                                                echo "</div>";
                                            echo "</div>";
                                        echo "</a>";
                                        echo "<div class=\"card-stripe\"></div>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <?php include( "php/include.contact.php" ) ?>
        <?php include( "php/include.footer.php" ) ?>
        <?php include( "php/include.scripts.php" ) ?>
    </body>
</html>
