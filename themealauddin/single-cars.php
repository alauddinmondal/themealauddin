<?php get_header(); ?>
<section class="page-wrap">
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2><?php the_title(); ?></h2>
            <?php  if(has_post_thumbnail()):?>
                <img src="<?php the_post_thumbnail_url('blog-large'); ?>" alt="<?php the_title(); ?>" class="img-fluid mb3 img-thumbnail">
            <?php endif; ?>
        
            <?php get_template_part('includes/section','cars'); ?>
                <?php wp_link_pages(); ?>
                
            </div>
               
              
               
            <div class="col-md-6">
                <ul>
                    <li>Color: <?php echo get_post_meta($post->ID, 'Color', true) ?></li>
                    <li>Registration: <?php echo get_post_meta($post->ID, 'Registration', true) ?></li>
                </ul>
            </div>
    </div>
</div>
</section>
<?php get_footer(); ?>