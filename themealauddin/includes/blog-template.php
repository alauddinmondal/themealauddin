<?php
/*
Template Name: Blog posts template
*/
$blog_posts = new WP_Query( array( 'post_type' => 'post', 'post_status’' => 'publish', 'posts_per_page' => -1 ) );

?>
<div class="container">

<div class="row">
<div class="col-md-8 col-sm-12">
<?php if ( $blog_posts->have_posts() ) : ?>
<div class = "blog-posts">
<?php while ( $blog_posts->have_posts() ) : $blog_posts->the_post(); ?>


<article id = "post-<?php the_ID(); ?>">
<div class="blogsingleRow">
<div class="combinespcPostthumb">


<a href = "<?php the_permalink(); ?>">
<?php if ( has_post_thumbnail() ) { 
the_post_thumbnail(array(300,200), get_the_ID() );
} 

else{?>
	
<img src="<?php echo get_template_directory_uri().'/images/borderimg.png'; ?>" style="width:300px;height:200px;" alt="<?php the_title(); ?>"> 

<?php }

?>

</a>
</div>


<div class="combinespcPostcontent">
<a href = "<?php the_permalink(); ?>"><h2 class = "post-title"><?php the_title(); ?></h2></a>

<div class = "post-category">
<?php the_category(', '); ?>
</div>
<div class = "post-excerpt">
<?php wp_kses_post( the_excerpt() ) ?>
</div>
<span class = "post-read-more">
<a itemprop = "url" href = "<?php the_permalink(); ?>" target = "_blank">
<?php echo esc_html__( 'Read more', 'theme-domain' ) ?>
</a>
</span>
</div>
</div>
 
</article>
<?php endwhile; ?>
</div> 
<?php else: ?>
<p class = "no-blog-posts">
<?php esc_html_e('Sorry, no posts matched your criteria.', 'theme-domain'); ?> 
</p>
<?php endif; 
wp_reset_postdata(); ?>

</div>


<div class="col-md-4 col-sm-12">
<?php get_sidebar(); ?>
</div>
</div>

</div>
