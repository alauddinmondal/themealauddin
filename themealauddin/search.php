<?php get_header(); ?>
<section class="page-wrap">
<div class="container">
<div class="row">




<div class="col-md-12">
<h2>Search results for: '<?php echo get_search_query(); ?>'</h2>
<?php get_template_part('includes/section','searchresults'); ?>

<?php
global $wp_query;
$big = 999999999;
echo paginate_links(
array(
'base'=> str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
'format'=> '?paged=%#%',
'current'=> max(1, get_query_var('paged')),
'total'=>$wp_query->max_num_pages
)
);
?>
</div>


</div>
</div>
</section>
<?php get_footer(); ?>