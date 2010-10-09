<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Simple_Catch
 * @since Simple Catch 1.0
 */
get_header(); ?>
		<div id="main" class="layout-978">
        	<div id="content" class="col8">
            	<div class="post error404">
                	<h1 class="entry-title">خطای 404 - صفحه موجود نیست</h1>
                	<h2>متاسفیم! محتوایی در این آدرس وجود ندارد.که می تواند به یکی از دلایل زیر باشد.</h2>

               	 	<p>شما آدرس را به اشتباه تایپ کرده اید و یا صفحه ی مورد نظر شما منتقل و یا حذف شده است.</p>
               	 	<h3>لطفا اقدامات زیر را انجام دهید</h3>
                	<p>آدرس را دوباره چک کرده و پس از تصحیح صفحه را رفرش کنید و یا از طریق کادر جستجوی زیر به دنبال هدفتان بروید</p>
                	
					<?php get_search_form(); ?>
              	</div>
       		</div><!-- #content-->
        </div><!--#main-->
<?php get_footer(); ?>