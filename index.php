<?php
get_header(); ?>

<script type="text/javascript">

jQuery(document).ready(function() {

  jQuery(function($){

    $.supersized({
    	autoplay				:	1,
    	slide_interval          :   2000,
    	transition              :   1,
    	transition_speed		:	700,
    	// Components
    	horizontal_center       :   0,			// Horizontally center background
    	slide_links				:	'blank',
    	slides 					:  	[
<?php  $args = array( 'post_type' => 'hp_pt' );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hp-post-thumbnail' );
  if (has_post_thumbnail( $post->ID ) ):
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hp-post-thumbnail' ); ?>
    {image : '<?php echo $image[0]; ?>'},
<?php
  endif;
endwhile; ?>
]
    });
  });
});
</script>

<?php get_footer(); ?>