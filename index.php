<?php
/**
 * Main template
 *
 * @package Basticom
 */

get_header(); ?>

	<main id="primary" class="site-main">
		<div class="container">
			<?php
			if ( have_posts() ) :

				if ( is_home() && ! is_front_page() ) :
					?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
					<?php
				endif;

				while ( have_posts() ) :
					the_post();

					the_content();

				endwhile;

				the_posts_navigation();

			else :

				the_content();

			endif;
			?>
		</div>
	</main>

<?php
get_footer();
