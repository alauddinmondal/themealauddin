<?php if( have_posts() ):?>
<?php while( have_posts() ): the_post(); ?>
<?php echo get_the_date('l, F jS, Y'); ?>
<hr>
<?php the_content(); ?>


<?php
$tags = get_the_tags();
if($tags):
foreach($tags as $tag): ?>
<a href="<?php echo get_tag_link($tag->term_id); ?>" class="badge badge-success"><?php echo $tag->name; ?></a>

<?php endforeach; ?>
<?php endif;?>

<br><br>
Categories: <?php 
$categories = get_the_category();
foreach($categories as $cat):?>
<a href="<?php echo get_category_link($cat->term_id); ?>" style="border:1px solid;padding:3px 10px;"><?php echo $cat->name; ?></a>
<?php endforeach; ?>

<?php //comments_template(); ?>

<?php endwhile; ?>

<?php endif; ?>