<?php
    // To prevent from opening include and scripts outside of a page
    define( "PAGE", TRUE );
?>

<!doctype html>
<html class="no-js" lang="pl">
<head>
    <?php include("php/include.meta.php") ?>
</head>
    <body>
        <?php include("php/include.navigation.php") ?>
        <?php include("php/include.header.php") ?>
        <?php include("php/include.about.php") ?>
        <?php include("php/include.gallery.php") ?>
        <?php include("php/include.contact.php") ?>
        <?php include("php/include.footer.php") ?>
        <?php include("php/include.scripts.php") ?>
    </body>
</html>
