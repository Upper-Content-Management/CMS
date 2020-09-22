<?php
get_header();
?>
	<section id="post">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				the_content();
			}
		} 
		?>
	</section>
<?php
get_footer();
