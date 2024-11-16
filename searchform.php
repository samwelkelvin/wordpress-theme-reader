<form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="widget-search">
    <input type="search" class="mb-3" placeholder="<?php echo esc_attr_e('Search &hellip;', 'bootstrap-blog') ?>"
        value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_e('Search for:', 'bootstrap-blog') ?>" />

    <!-- <input class="mb-3" id="search-query" name="s" type="search" placeholder="Type &amp; Hit Enter..."> -->

    <i class="ti-search"></i>
    <button type="submit" class="btn btn-primary btn-block">Search</button>
</form>