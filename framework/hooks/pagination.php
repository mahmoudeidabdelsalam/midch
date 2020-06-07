<?php
/**
 * Bootstrap Compitable Pagination Function
 * @uses paginate_links
 * @since 1.0
 */
function base_pagination($args = array(), $query_object = 'wp_query') {
    if ($query_object == 'wp_query') {
        global $wp_query;
        $main_query = $wp_query;
    } else {
        $main_query = $query_object;
    }
    //var_dump($wp_query);
    $big = 99999; // This needs to be an unlikely integer
    // For more options and info view the docs for paginate_links()
    // http://codex.wordpress.org/Function_Reference/paginate_links
    $current_page = max(1, get_query_var('paged'));
    $pages_count = $main_query->max_num_pages;
    $default_args = array(
        //'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'current' => $current_page,
        'total' => $pages_count,
        'mid_size' => 2,
        'prev_text' => 'Previous',
        'next_text' => 'Next',
        'type' => 'array'
    );
    $args = wp_parse_args($args, $default_args);
    $paginate_links = paginate_links($args);
    if ($paginate_links) {
        ?>
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <?php foreach ($paginate_links as $link): ?>
              <li class="page-item"><?php echo $link; ?></li>
            <?php endforeach; ?>
          </ul>
        </nav>
        <?php
    }
}
