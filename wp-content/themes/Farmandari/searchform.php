<?php
/**
 * The template for displaying search forms in Simple Catch
 *
 * @package WordPress
 * @subpackage Simple_Catch
 * @since Simple Catch 1.0
 */
$options = get_option( 'simplecatch_options' );
if( !isset( $options[ 'search_display_text' ] ) ) {
	$options[ 'search_display_text' ] = "کلمه کلیدی";
}
if( !isset( $options[ 'search_button_text' ] ) ) {
	$options[ 'search_button_text' ] = "جستجو";
}
$simplecatch_search_display_text = $options[ 'search_display_text' ];
$simplecatch_search_button_text = $options[ 'search_button_text' ];
?>
    <form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    	<input type="text" class="search" value="<?php echo esc_attr( $simplecatch_search_display_text ); ?>" name="s" id="s" title="با استفاده از کلمات کلیدی به دنبال محتوای مورد نظر خود بگردید" />
        <button><?php printf( '%s', esc_attr( $simplecatch_search_button_text ) ); ?></button>
        <div class="CR"></div>
    </form>