<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Simple_Catch
 * @since Simple Catch 1.0
 */

get_header(); 

	if( function_exists( 'simplecatch_display_div' ) ) {
		$themeoption_layout = simplecatch_display_div();
	}
      
	if (have_posts()): ?>
		<h2 class="entry-title"><?php printf( 'نمایش نتایج جستجو برای : <span class="img-title">%s</span>', get_search_query() ); ?></h2>
		
		<?php while (have_posts()) : the_post(); ?>
		
			<div <?php post_class();?>>
				
				<h3><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php the_title(); ?></a></h3>
				<?php the_excerpt(); ?>
				<div class="row-end"></div>
			</div> <!-- .post -->
		
		<?php endwhile; 
			// Checking WP Page Numbers plugin exist
			if ( function_exists('wp_pagenavi' ) ) : 
				wp_pagenavi();
			
			// Checking WP-PageNaviplugin exist
			elseif ( function_exists('wp_page_numbers' ) ) : 
				wp_page_numbers();
				 
			else: ?>
				<ul class="default-wp-page">
					<li class="previous"><?php next_posts_link( 'قبلی' ); ?></li>
					<li class="next"><?php previous_posts_link( 'بعدی' ); ?></li>
				</ul>         
		
			<?php endif; 
		
	else : ?>
		<h2><?php printf('نتایج جستجوی <span> "%s" </span> با هیچ یک از محتواهای این وب سایت مطابقت نداشت', get_search_query() ); ?></h2>
		<div class="post">
			<h3>چند پیشنهاد</h3>
			<ul>
				<li>  املای تمام کلمات را بررسی نمایید.</li>
				<li>  از کلمات کلیدی دیگری استفاده نمایید.</li>
				<li>  از کلمات کلیدی عمومی تری استفاده نمایید.</li>
			</ul> 
			<?php get_search_form(); ?>
		</div> <!-- .post -->
		
<?php endif; ?>

    </div> <!-- #content -->
            
 	<?php 
    if( $themeoption_layout == 'right-sidebar' ) {
        get_sidebar(); 
    }?>
            
</div> <!-- #main -->

<?php get_footer(); ?> 