<?php if( have_posts() ):?>
<?php while( have_posts() ): the_post(); ?>

<?php the_content(); ?>

<?php endwhile; ?>

<?php endif; ?>


<?php //if(have_posts()) : while(have_posts()): the_post(); ?>
<?php //the_content(); ?>
<?php //endwhile; else: endif; ?>