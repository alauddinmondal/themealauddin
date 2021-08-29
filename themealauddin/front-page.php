<?php get_header(); ?>

<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <!-- <li data-target="#demo" data-slide-to="2"></li> -->
  </ul>
  <div class="carousel-inner">

<?php $alaslide = new WP_Query(array(
    'post_type' => 'slider',
)); 
$alauddin = 0;
while($alaslide->have_posts()): $alaslide->the_post();
$alauddin++;

?>

<?php if($alauddin == 1): ?>
    <div class="carousel-item active">
<?php else: ?>
    <div class="carousel-item">
<?php endif; ?>
      <div class="sliderImge"><?php the_post_thumbnail(); ?></div>
      <div class="carousel-caption spCustomslider" >
        <div class="spcSlidercontent" style="background:url('http://localhost/newsite/wp-content/uploads/2021/01/borderimg-273x300.png') no-repeat 0 0;">
            <div class="sliderDesign">
                <h3><?php the_title(); ?></h3>
                <p><?php the_excerpt(); ?></p>
            </div>
        </div>
      </div>   
    </div>
<?php endwhile; ?>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
   
<!----container for slider--->

<section class="page-wrap">
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <?php get_template_part('includes/section','content'); ?>
        <!-- <?php //get_search_form(); ?> -->
        </div>
    </div>
</div>
</section>

<?php get_footer(); ?>