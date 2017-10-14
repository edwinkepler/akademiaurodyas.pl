<?php
    // To prevent from opening include and scripts outside of a page
    if( !defined( "PAGE" ) ) {
        die();
    }
?>
<div class="small-20 column end">
    <div class="card color-1 bg-color-1 object-padding">
        <p>Szukasz konkretnego zabiegu? Skorzystaj z wyszukiwarki:</p>
        <form id="search-field" method="get" action="szukaj.php">
            <div class="row">
                <div class="small-16 large-16 medium-13 column no-right-padding">
                    <input type="text" name="search" placeholder="Szukaj" required>
                </div>
                <div class="small-4 large-4 medium-7 column no-left-padding">
                    <input type="submit" class="button bg-color-3 color-2" value="Szukaj">
                </div>
            </div>
        </form>
    </div>
</div>
