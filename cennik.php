<?php
    // To prevent from opening include and scripts outside of a page
    define( "PAGE", TRUE );

    switch ( $_GET["cat"] ) {
        case "face":
            $title="Kosmetyka twarzy";
            $name="face";
            break;
        case "body":
            $title="Pielęgnacja ciała";
            $name="body";
            break;
        case "massage":
            $title="Masaż";
            $name="massage";
            break;
        case "hands":
            $title="Dłonie i stopy";
            $name="hands";
            break;
        case "misc":
            $title="Inne zabiegi";
            $name="misc";
            break;
        default:
            $title="Cennik";
            $name="prices";
    }
?>

<!doctype html>
<html class="no-js" lang="pl">
<head>
    <?php include( "php/include.meta.php" ) ?>
</head>
    <body>
        <?php include( "php/include.navigation.php" ) ?>

        <header id="header">
            <div class="header-bg prices-background-cover" data-interchange="[assets/img/header/<?php echo $name ?>_bg_large.jpg, default], [assets/img/header/<?php echo $name ?>_bg_small.jpg, small], [assets/img/header/<?php echo $name ?>_bg_medium.jpg, medium], [assets/img/header/<?php echo $name ?>_bg_large.jpg, large]"></div>
            <div class="row padding-top-25rem">
                <div class="small-20 large-7 column column-padding">
                    <div class="card color-1 bg-color-1">
                        <p class="text-xhuge text-center no-margin object-padding"><?php echo $title ?></p>
                    </div>
                </div>
            </div>
        </header>

        <section id=<?php echo "\"" . $title . "\" "; ?>class="padding-bottom-50px bg-color-3 color-2">
            <?php
                if( $name != "prices" ) {
                    include( "php/script.listprices.php" );
                } else {
                    include( "php/include.prices.php" );
                }
            ?>
        </section>

        <?php include( "php/include.contact.php" ) ?>
        <?php include( "php/include.footer.php" ) ?>
        <?php include( "php/include.scripts.php" ) ?>
    </body>
</html>
