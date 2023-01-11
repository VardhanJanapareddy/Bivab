<?php
/**
 * Search Form template
 *
 * @package BLUEBELL
 * @author Theme Arc
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}
?>
<!-- Search -->
<div class="sidebar-widget search-box">
    <form method="post" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div class="form-group">
            <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Enter Search Keywords', 'bluebell' ); ?>" required="">
            <button type="submit"><span class="icon far fa-search"></span></button>
        </div>
    </form>
</div>