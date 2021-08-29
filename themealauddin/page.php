<?php get_header(); ?>
<section class="page-wrap">
<div class="pageTitlespc">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center"><?php the_title(); ?></h2>
                <div class="breadCrumbspc">
                <?php
                if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                }
            ?>
            </div>
            </div>
            
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php get_template_part('includes/section','content'); ?>
            
        </div>
    </div>
</div>








<!-- <div class="container">
<div class="row">
<div class="col-md-3 sidebarBg">

<?php //if(is_active_sidebar('page-sidebar')): ?>
<?php //dynamic_sidebar('page-sidebar') ?>

<?php //endif; ?>
</div>
</div>
</div> -->



</section>


<?php get_footer(); ?>