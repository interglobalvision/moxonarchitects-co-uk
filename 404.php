<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package moxon2014
 */

get_header(); ?>

	<div>
		<main id="main" class="site-main" role="main" style="margin-left:220px; margin-top:25px;" >

			<section class="error-404 not-found">
				<header class="page-header" style="width:200px;">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'moxon2014' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content" style="width:200px;">
					<p>It looks like nothing was found at this location. Maybe try one of the links in the main menu</p>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>