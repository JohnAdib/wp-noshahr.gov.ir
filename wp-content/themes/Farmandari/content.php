<?php
/**
 * This is the template that displays content for index and archive page
 *
 * @package WordPress
 * @subpackage Simple_Catch
 * @since Simple Catch 1.3.2
 */
?>

			<?php if ( have_posts() ) : 
                while( have_posts() ):the_post(); ?>	
            
                    <div <?php post_class(); ?> >
                        <?php //If category has thumbnail it displays thumbnail and excerpt of content else excerpt only 
                        if ( has_post_thumbnail() ) : ?>
                            <div class="col3 post-img">
                                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" ><?php the_post_thumbnail( 'featured' ); ?></a>
                            </div> <!-- .col3 -->  
                            <div class="col5">
                        <?php else : ?>
							<div class="col2 post-img">
								<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" ><?php echo"<img src='"; bloginfo('template_directory'); echo"/images/post_thumb.jpg' alt='"; the_title(); echo"' title='"; the_title(); echo"' />"; ?></a>
							</div> <!-- .col3 -->  
                            <div class="col6">
                        <?php endif; ?> 
								<?php echo get_post_meta($post->ID, 'Lid',true); ?>
                                <h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="bookmark" ><?php the_title(); ?></a></h2>
                                <ul class="post-by">
                                    <li class="no-padding-left"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php echo esc_attr(get_the_author_meta( 'display_name' ) ); ?>"></a></li>
                                    <li><?php the_time( 'j F Y' ); ?></li>
                                    <li class="last"><?php comments_popup_link( 'بدون ديدگاه', '1 ديدگاه ', '% ديدگاه' ); ?></li>
                                </ul>
                                <?php the_excerpt(); ?>
                            </div>   
                         
                            <div class="row-end"></div>
                    </div><!-- .post -->
                    <hr />
                    
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
								<li class="previous"><?php next_posts_link( 'مطالب قديمی تر' ); ?></li>
								<li class="next"><?php previous_posts_link( 'مطالب جدیدتر' ); ?></li>
							</ul>
                        <?php endif;
 					endif; 
                    ?>

                    			
			<?php else : ?>
                    <div class="post">
                        <h2>یافت نشد</h2>
                        <p>متاسفيم، شما به دنبال محتوايي هستيد که در اينجا نيست.</p>
                        <?php get_search_form(); ?>
                    </div><!-- .post -->
			
			<?php endif; ?>