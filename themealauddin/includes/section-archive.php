
<?php if( have_posts() ):?>
<?php while( have_posts() ): the_post(); ?>
<div class="card mb-3">
<div class="card-body d-flex justify-content-center align-items-center">



<a href = "<?php the_permalink(); ?>">
<?php if ( has_post_thumbnail() ) { 
the_post_thumbnail(array(300,200), get_the_ID() );
} 

else{?>
	
<img src="<?php echo get_template_directory_uri().'/images/borderimg.png'; ?>" style="width:300px;height:200px;" alt="<?php the_title(); ?>" class="img-fluid mb3 img-thumbnail mr-4"> 

<?php }

?>

</a>


	
	
<div class="blog-content ml-4">
<h2><?php the_title(); ?></h2>
<?php the_excerpt(); ?>
<br/><br/>
<a href="<?php the_permalink(); ?>" class="btn btn-small btn-primary">Read more</a>
<br><br>
</div>
</div>
</div>
<?php endwhile; ?>

<?php endif; ?>


