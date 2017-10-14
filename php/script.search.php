<?php
    // To prevent from opening include and scripts outside of a page
    if( !defined( "PAGE" ) ) {
        die();
    }

    // Load xml file with prices
    $cennik = simplexml_load_file( "assets/data/cennik.xml" );

    // Function to search certain xml nodes and save those nodes to array
    function find_in_xml( $xml_file, $item_category, $item_subcategory, $find_this, &$array_name ) {
        foreach( $xml_file->$item_category->$item_subcategory->zabieg as $zabieg ) {
            // Compare strings
            if ( strpos( strtolower( $zabieg->nazwa ), $find_this ) !== false || strpos( strtolower( $zabieg->opis ), $find_this ) !== false ) {
                // Add xml node to array
                $array_name[] = $zabieg;
            }
        }
    }

    // Function for rendering html code with seach results
    // It takes xml node for 'zabieg'
    function render_search_item( $subcategory ) {
        echo "<div class=\"price-list-item\">";
            echo "<div class=\"price-list-text\">";
                echo "<p class=\"text-justify no-margin object-padding\">" . $subcategory->nazwa . " " . $subcategory->opis . "</p>";
            echo "</div>";
            echo "<div class=\"price-list-circle\">";
                echo "<div class=\"price-list-circle-inner\">";
                    echo "<div class=\"display-table height-100 width-100\">";
                        echo "<div class=\"display-table-cell\">";
                            echo "<div class=\"block\">";
                                echo "<p class=\"no-margin\">" . $subcategory->cena . "</p>";
                                if ( $subcategory->cena != "" && $subcategory->czas != "" ) {
                                    echo "<hr>";
                                }
                                echo "<p class=\"no-margin\">" . $subcategory->czas . "</p>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        echo "</div>";
    }
?>

<div class="row">
    <div class="small-20 medium-13 column column-padding">
        <div class="card color-1 bg-color-1 object-padding">

<?php
    // Create array of arrays with all categories to search in
    $search_results = [ "face" => array(), "body" => array(), "massage" => array(), "hands" => array(), "misc" => array() ] ;

    // Search for results
    // Face
    find_in_xml( $cennik, "twarz", "podstawowy", $search, $search_results["face"] );
    find_in_xml( $cennik, "twarz", "intensywny", $search, $search_results["face"] );
    find_in_xml( $cennik, "twarz", "exfoliacja", $search, $search_results["face"] );
    find_in_xml( $cennik, "twarz", "mikrodermabrazja", $search, $search_results["face"] );
    find_in_xml( $cennik, "twarz", "fale", $search, $search_results["face"] );
    find_in_xml( $cennik, "twarz", "mezoterapia", $search, $search_results["face"] );
    // Body
    find_in_xml( $cennik, "ciało", "podstawowy", $search, $search_results["body"] );
    // Massage
    find_in_xml( $cennik, "masaż", "podstawowy", $search, $search_results["massage"] );
    // Hands and foots
    find_in_xml( $cennik, "dłoniestopy", "dłonie", $search, $search_results["hands"] );
    find_in_xml( $cennik, "dłoniestopy", "stopy", $search, $search_results["hands"] );
    // Misc
    find_in_xml( $cennik, "pozostałe", "henna", $search, $search_results["misc"] );
    find_in_xml( $cennik, "pozostałe", "depilacja", $search, $search_results["misc"] );
    find_in_xml( $cennik, "pozostałe", "inne", $search, $search_results["misc"] );

    if( count( $search_results["face"] ) != 0 ){
        echo "<p class=\"object-padding text-huge\">Pielęgnacja twarzy</p>";
        for ( $i = 0; $i < count( $search_results["face"] ); $i++ ) {
            render_search_item( $search_results["face"][$i] );
        }
    }

    if( count( $search_results["body"] ) != 0 ){
        echo "<p class=\"object-padding text-huge\">Pielęgnacja ciała</p>";
        for ( $i = 0; $i < count( $search_results["body"] ); $i++ ) {
            render_search_item( $search_results["body"][$i] );
        }
    }

    if( count( $search_results["massage"] ) != 0 ){
        echo "<p class=\"object-padding text-huge\">Masaż</p>";
        for ( $i = 0; $i < count( $search_results["massage"] ); $i++ ) {
            render_search_item( $search_results["massage"][$i] );
        }
    }

    if( count( $search_results["hands"] ) != 0 ){
        echo "<p class=\"object-padding text-huge\">Pielęgnacja dłoni i stóp</p>";
        for ( $i = 0; $i < count( $search_results["hands"] ); $i++ ) {
            render_search_item( $search_results["hands"][$i] );
        }
    }

    if( count( $search_results["misc"] ) != 0 ){
        echo "<p class=\"object-padding text-huge\">Inne</p>";
        for ( $i = 0; $i < count( $search_results["misc"] ); $i++ ) {
            render_search_item( $search_results["misc"][$i] );
        }
    }

    // If nothing was found
    if( count( $search_results["face"] ) == 0 && count( $search_results["body"] ) == 0 && count( $search_results["massage"] ) == 0 && count( $search_results["hands"] ) == 0 && count( $search_results["misc"] ) == 0 ) {
        echo "<p class=\"object-padding text-huge\">Niestety nie znaleziono żadnego wyniku dla twojego wyszukiwania.</p>";
    }
?>
        </div>
    </div>
    <div class="small-20 medium-7 column column-padding">
        <div class="row">
            <?php
                include( "element.searchfield.php" );
            ?>
        </div>
    </div>
</div>
