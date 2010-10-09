<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage Simple_Catch
 * @since Simple Catch 1.0
 */
?>
	<div id="footer">
    	<div class="layout-978">
			<div class="copyright">تمام حقوق اين وب سايت برای
				<a href="<?php echo home_url('/') ?>" title="<?php echo esc_attr(get_bloginfo('description', 'display')); ?>"> <?php bloginfo('name'); ?> </a>محفوظ است.
			</div>

            <div class="powered-by no-margin-left">
			<a href="http://validator.w3.org/check?uri=referer" title='HTML5 Valid' target="_blank"> HTML5 Valid</a> By <a href="http://www.Evazzadeh.com" title='جواد عوض زاده کاکرودی | Javad Evazzadeh kakroudi' target="_blank">Javad Evazzadeh </a>|<a href="http://www.Serena.ir" title='با افتخار قدرت گرفته از وردپرس، طراحی اولیه توسط Catch Themes، طراحی مجدد از جواد عوض زاده کاکرودی' target="_blank"> Some Right Reserved</a>
            </div><!-- .col7 -->
				
				<div class="center"><?php if( function_exists( 'simplecatch_footerlogo' ) ) : simplecatch_footerlogo(); endif; ?></div>			
		</div><!-- .layout-978 -->
	</div><!-- #footer -->      
<?php wp_footer(); ?>
</body>
</html>