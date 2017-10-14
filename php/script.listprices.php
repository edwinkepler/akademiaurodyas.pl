<?php
    // To prevent from opening include and scripts outside of a page
    if( !defined( "PAGE" ) ) {
        die();
    }

    $cennik = simplexml_load_file( "assets/data/cennik.xml" );

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

    function list_items( $xml_file, $item_category, $item_subcategory ) {
        foreach ( $xml_file->$item_category->$item_subcategory->zabieg as $zabieg ) {
            echo "<div class=\"price-list-item\">";
                echo "<div class=\"price-list-text\">";
                    echo "<p class=\"text-justify no-margin object-padding\">" . $zabieg->nazwa, PHP_EOL . $zabieg->opis, PHP_EOL . "</p>";
                echo "</div>";
                echo "<div class=\"price-list-circle\">";
                    echo "<div class=\"price-list-circle-inner\">";
                        echo "<div class=\"display-table height-100 width-100\">";
                            echo "<div class=\"display-table-cell\">";
                                echo "<div class=\"block\">";
                                    echo "<p class=\"no-margin\">" . $zabieg->cena, PHP_EOL . "</p>";
                                    if ( $zabieg->cena != "" && $zabieg->czas != "" ) {
                                        echo "<hr>";
                                    }
                                    echo "<p class=\"no-margin\">" . $zabieg->czas, PHP_EOL . "</p>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        }
    }
?>

<div class="row">
    <div class="small-20 medium-13 column column-padding">
        <div class="card color-1 bg-color-1 object-padding">
            <?php
                switch ( $name ) {
                    case "face":
                        echo "<p class=\"object-padding text-huge\">Zabiegi podstawowe</p>";
                        list_items( $cennik, "twarz", "podstawowy" );
                        echo "<p class=\"object-padding text-huge\">Zabiegi intensywne</p>";
                        list_items( $cennik, "twarz", "intensywny" );
                        echo "<p class=\"object-padding text-huge\">Zabiegi intensywne</p>";
                        list_items( $cennik, "twarz", "intensywny" );
                        echo "<p class=\"object-padding text-huge\">Exfoliacja</p>";
                        list_items( $cennik, "twarz", "exfoliacja" );
                        echo "<p class=\"object-padding text-huge\">Mikrodermabrazja</p>";
                        list_items( $cennik, "twarz", "mikrodermabrazja" );
                        echo "<p class=\"object-padding text-huge\">Fale dzwiękowe</p>";
                        list_items( $cennik, "twarz", "fale" );
                        echo "<p class=\"object-padding text-huge\">Mezoterapia</p>";
                        list_items( $cennik, "twarz", "mezoterapia" );
                        break;
                    case "body":
                        list_items( $cennik, "ciało", "podstawowy" );
                        break;
                    case "massage":
                        list_items( $cennik, "masaż", "podstawowy" );
                        break;
                    case "hands":
                        echo "<p class=\"object-padding text-huge\">Dłonie</p>";
                        list_items( $cennik, "dłoniestopy", "dłonie" );
                        echo "<p class=\"object-padding text-huge\">Pielęgnacja stóp</p>";
                        list_items( $cennik, "dłoniestopy", "pielęgnacjastóp" );
                        echo "<p class=\"object-padding text-huge\">Podologia</p>";
                        list_items( $cennik, "dłoniestopy", "podologia" );
                        break;
                    case "misc":
                        echo "<p class=\"object-padding text-huge\">Henna</p>";
                        list_items( $cennik, "pozostałe", "henna" );
                        echo "<p class=\"object-padding text-huge\">Depilacja</p>";
                        list_items( $cennik, "pozostałe", "depilacja" );
                        break;
                }
            ?>
        </div>
    </div>
    <div class="small-20 medium-7 column column-padding">
        <div class="row">
            <?php
                include( "element.searchfield.php" );
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
