<?php get_header() ?>

<?php get_template_part('partials/content', 'page-hero'); ?>
<div class="container">
		<?php

	if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>

			<?php the_content() ?>
		
		<?php endwhile;

	else :
		echo '<p>There are no posts!</p>';

	endif;

	?>
</div>

<?php get_footer(); ?>