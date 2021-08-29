<form action="<?php echo esc_url(home_url('/')); ?>" method="get">

<!-- <input type="hidden" name="cat" value="10"> -->
<input type="search" name="s" value="<?php the_search_query(); ?>" required>
<button type="submit">Search</button>
</form>