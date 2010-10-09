<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * @package WordPress
 * @subpackage Simple_Catch
 * @since Simple Catch 1.0
 */
 
get_header(); 
	
	if( function_exists( 'simplecatch_display_div' ) ) {
		$themeoption_layout = simplecatch_display_div();
	}
?>	
	
	
	
	
	<?php query_posts(  array('post_type' => 'meetings','posts_per_page'=> 20,'post_status' => array('publish','future')  )  );?>
		

			<?php if ( have_posts() ) : 
                while( have_posts() ):the_post(); ?>	
            
                    <div <?php post_class(); ?> >

                            <div class="col8">
							<div class="meetingli">
								 <em><?php the_title(); ?></em>
								 در روز <?php the_time('l مورخه j F Y؛ ساعت g:i a') ?>
								 <?php $tmpreg = SmartMetaBox::get('mreg'); if ( !empty( $tmpreg ) ) echo 'توسط '.$tmpreg ;?>
								 <?php $tmpplace = SmartMetaBox::get('mplace'); if ( !empty( $tmpplace ) ) echo 'در <strong>'.$tmpplace.'</strong>' ;?>

								 
								 
								<br /><i><?php echo SmartMetaBox::get('mdesc'); ?></i>
								
							</div>
                            </div>   
                         
                            <div class="row-end"></div>
                    </div><!-- .post -->
                    <div class="meetings"><hr /></div>
                    
          			<?php endwhile;
                    
            		// Checking WP Page Numbers plugin exist
					if ( function_exists('wp_pagenavi' ) ) : 
						wp_pagenavi();
					
					// Checking WP-PageNaviplugin exist
					elseif ( function_exists('wp_page_numbers' ) ) : 
						wp_page_numbers();
						   
					else: 
						global $wp_query;
						if ( $wp_query->max_num_pages > 1 ) : 
					?>
							<ul class="default-wp-page">
								<li class="previous"><?php next_posts_link( 'مطالب قديمي تر' ); ?></li>
								<li class="next"><?php previous_posts_link( 'مطالب جديدتر' ); ?></li>
							</ul>
                        <?php endif;
 					endif; 
                    ?>

                    			
			<?php else : ?>
                    <div class="post">
                        <h2>يافت نشد</h2>
                        <p>متاسفيم، شما به دنبال محتوايي هستيد که در اينجا نيست.</p>
                        <?php get_search_form(); ?>
                    </div><!-- .post -->
			
			<?php endif; ?>
	
	
	
	
	
	
	
	
	
        
	</div><!-- #content -->
            
	<?php 
    if( $themeoption_layout == 'right-sidebar' ) {
        get_sidebar(); 
    }?>
            
	</div><!-- #main --> 
        
<?php get_footer(); ?>