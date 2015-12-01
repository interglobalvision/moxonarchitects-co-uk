<?php
/**
 *
 * @package moxon2014
 * Template Name: Blog
 */

get_header(); ?>

<?php
query_posts(
  array(
  'post_type'=> 'post',
  'paged'=>$paged
));
?>
			<ul id="cbp-rfgrid" class="myclient">
			<?php
			if ( have_posts() ) : while ( have_posts() ) : the_post();
			?>
			<li class="news-item" style="line-height:0;">
				<?php if ( has_post_thumbnail()) : ?>
				    <?php the_post_thumbnail(); ?>
				<?php endif; ?>

				<div class="myhover" style="display:none; opacity:1;">
				    <h1><?php the_title(); ?><span>&nbsp;&middot;&nbsp;<?php the_time('m.Y') ?></span></h1>
				    <?php the_content(); ?>
				</div>
			</li>
			<?php endwhile; ?>
			<?php endif; ?>
			</ul>
			<div class="pagination"><?php next_posts_link(); ?></div>

<!-- /post -->

<div class="see-more-box">
    Scroll Down For More articles
    <img src="<?php bloginfo('template_url'); ?>/images/arrow-down.png" alt="more indicator" />
</div>

<script>
jQuery(document).ready(function(){

  jQuery(function ($) {
    setTimeout(function() {
        $('.see-more-box').fadeOut('slow');
    }, 2000);
	});

  jQuery(function(){
    jQuery('.attachment-post-thumbnail').contenthover({
      overlay_background:'#000',
      overlay_opacity:0.8
    });
  });

    jQuery(".myclient").on("mouseenter", "li", function(){
      jQuery(this).find('.myhover').fadeIn(400);
    }).on("mouseleave", "li", function(){
      jQuery(this).find('.myhover').stop().fadeOut(100);
    });

});

jQuery(document).ajaxComplete(function(){

  jQuery(".myclient").on("mouseenter", "li", function(){
    jQuery(this).find('.myhover').fadeIn(400);
  }).on("mouseleave", "li", function(){
    jQuery(this).find('.myhover').stop().fadeOut(100);
  });

});
</script>

<?php get_footer(); ?>