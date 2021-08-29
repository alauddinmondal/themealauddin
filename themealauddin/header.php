<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPC</title>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

<?php wp_head(); ?>
</head>
<body>
<header>
<div class="top-level-bar">
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <ul class="toplevelistleft float-md-left float-sm-center">
                <li>Email: <a href="mailto:hello@successpoint.ae">hello@successpoint.ae</a></li>
                <li>Contact: <a href="callto:+971555528210">+971555528210</a></li>
            </ul>
        </div>
        


        <div class="col-sm-12 col-md-6">
        <i class="fa fa-search customBtnsearch float-md-right float-sm-right" aria-hidden="true" data-toggle="modal" data-target="#exampleModal"></i>
        <ul class="toplevelistright float-md-right float-sm-left">
                <li><a href="#">Alumni</a></li>
                <li><a href="#">Event</a></li>
                <li><a href="#">Apply</a></li>
            </ul>
        

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body spCustomodelbody">
        <div class="modelSearchForm">
        <?php get_search_form(); ?>
</div>
      </div>
     
    </div>
  </div>
</div>
       
</div>

</div>
</div>
</div> 

</header>


<nav class="spcNavbar">
<div class="container">
  <div class="row">

    <div class="col-md-4 col-sm-6 col-xs-6 mobileWidthspc">
    <a class="navbar-brand spcustomLogo" href="<?php echo home_url(); ?>">
  <?php 
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    ?>
    <img src="<?php echo $image[0]; ?>" alt="<?php echo $alt_text; ?>">
    <?php 
      $image_id = get_post_thumbnail_id(get_the_ID());
      $alt_text = get_post_meta($image_id , '_wp_attachment_image_alt', true);
      ?>
    
  </a>
  
         
    </div>

<div class="col-md-8 col-sm-6 col-xs-6 mobileWidthspc">
<div class="spcMainmenu">
    <?php
    wp_nav_menu( array( 'theme_location' => 'topspcmenu' ) ); 
    ?>
       
        </div>
    </div>
    
  </div>
</div>
</nav>