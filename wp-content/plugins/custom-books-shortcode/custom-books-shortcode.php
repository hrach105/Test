<?php
/*
Plugin Name: Custom Books Shortcode
Description: Adds a shortcode to display Books custom post type.
Version: 1.0
Author: Hrach
*/

function books_shortcode_with_pagination($atts) {
    ob_start();

    // Default attributes
    $atts = shortcode_atts( array(
        'posts_per_page' => 6,
        'paged' => 1,
    ), $atts, 'book_list_pagination' );

    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => 'book',
        'posts_per_page' => $atts['posts_per_page'],
        'paged' => $paged
    );

    $books_query = new WP_Query( $args );

    if ( $books_query->have_posts() ) :
        echo '<div class="books-list row">';
        while ( $books_query->have_posts() ) : $books_query->the_post(); ?>

           <div class="col-4">
               <div class="book-item">
                   <?php if ( has_post_thumbnail() ) : ?>
                       <div class="book-thumbnail">
                           <?php the_post_thumbnail('medium'); ?>
                       </div>
                   <?php endif; ?>
                   <div class="book-info">
                       <h2> <a class="post-item-title" href="<?php the_permalink(); ?>"><?php the_title(); // Book title ?></a></h2>

                       <?php
                       $author = get_post_meta( get_the_ID(), 'book-author', true );
                       if ( !empty($author) || !empty($year) || !empty($genre) || !empty($isbn) ) :
                           ?>
                           <div class="book-meta">
                               <?php if ( !empty($author) ) : ?>
                                   <p><strong>By:</strong> <?php echo esc_html( $author ); ?></p>
                               <?php endif; ?>
                           </div>
                       <?php endif; ?>
                   </div>
               </div>
           </div>

        <?php endwhile;
        echo '</div>';

        echo '<div class="pagination">';
        echo paginate_links( array(
            'total' => $books_query->max_num_pages,
            'current' => $paged,
            'prev_text' => __('<svg xmlns="http://www.w3.org/2000/svg" width="13" height="19" viewBox="0 0 13 19" fill="none">
            <path d="M0.908591 8.54405L8.80457 0.896439C9.35032 0.367854 10.2328 0.367854 10.7728 0.896439L12.0849 2.16729C12.6306 2.69588 12.6306 3.55061 12.0849 4.07357L6.49383 9.5L12.0907 14.9208C12.6364 15.4494 12.6364 16.3041 12.0907 16.8271L10.7786 18.1036C10.2328 18.6321 9.35032 18.6321 8.81037 18.1036L0.914396 10.456C0.362839 9.92737 0.362839 9.07263 0.908591 8.54405Z" fill="#262626"/>
            </svg>'),
            'next_text' => __('<svg xmlns="http://www.w3.org/2000/svg" width="13" height="19" viewBox="0 0 13 19" fill="none">
            <path d="M12.0914 10.5091L4.19543 18.5815C3.64968 19.1395 2.76719 19.1395 2.22724 18.5815L0.915117 17.2401C0.369366 16.6821 0.369366 15.7799 0.915118 15.2279L6.50617 9.5L0.909313 3.77804C0.363561 3.22009 0.363561 2.31787 0.909313 1.76585L2.22144 0.418466C2.76719 -0.139485 3.64968 -0.139485 4.18963 0.418466L12.0856 8.49094C12.6372 9.04889 12.6372 9.95111 12.0914 10.5091Z" fill="#262626"/>
            </svg>'),
        ) );
        echo '</div>';

        wp_reset_postdata();
    else :
    endif;

    return ob_get_clean();
}
add_shortcode( 'book_list_pagination', 'books_shortcode_with_pagination' );



function books_shortcode_with_ajax() {
    ob_start();

    $args = array(
        'post_type' => 'book',
        'posts_per_page' => 4,
        'paged' => 1
    );
    $books_query = new WP_Query($args);

    if ($books_query->have_posts()) :
        echo '<div id="books-ajax-list" class="row">';
        while ($books_query->have_posts()) : $books_query->the_post(); ?>
            <div class="col-3">
                <div class="book-item">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="book-thumbnail">
                            <?php the_post_thumbnail('medium'); // Display featured image ?>
                        </div>
                    <?php endif; ?>
                    <div class="book-info">
                        <h2><a class="post-item-title" href="<?php the_permalink(); ?>"><?php the_title(); // Book title ?></a></h2>

                        <?php
                        $author = get_post_meta(get_the_ID(), 'book-author', true);

                        if (!empty($author) || !empty($year) || !empty($genre) || !empty($isbn)) : ?>
                            <div class="book-meta">
                                <?php if (!empty($author)) : ?>
                                    <p><strong>By:</strong> <?php echo esc_html($author); ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endwhile;
        echo '</div>';
        wp_reset_postdata();
    else :
    endif;
    ?>
    <button id="load-more-books" data-page="1">Load More</button>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#load-more-books').on('click', function() {
                var page = $(this).data('page');
                var button = $(this);
                $.ajax({
                    url: '<?php echo admin_url("admin-ajax.php"); ?>',
                    type: 'post',
                    data: {
                        action: 'load_more_books',
                        page: page
                    },
                    beforeSend: function() {
                        button.text('Loading...');
                    },
                    success: function(response) {
                        if(response){
                            $('#books-ajax-list').append(response);
                            button.data('page', page + 1);
                            button.text('Load More');
                        } else {
                            button.text('No more books');
                            button.prop('disabled', true);
                        }
                    }
                });
            });
        });
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('book_list_ajax', 'books_shortcode_with_ajax');

function load_more_books_ajax_handler() {
    $paged = $_POST['page'] + 1;
    $args = array(
        'post_type' => 'book',
        'posts_per_page' => 4,
        'paged' => $paged
    );
    $books_query = new WP_Query($args);
    if ($books_query->have_posts()) :
        while ($books_query->have_posts()) : $books_query->the_post(); ?>
          <div class="col-3">
              <div class="book-item">
                  <?php if ( has_post_thumbnail() ) : ?>
                      <div class="book-thumbnail">
                          <?php the_post_thumbnail('medium');?>
                      </div>
                  <?php endif; ?>
                  <div class="book-info">
                      <h2><a class="post-item-title" href="<?php the_permalink(); ?>"><?php the_title(); // Book title ?></a></h2>
                      <?php
                      $author = get_post_meta(get_the_ID(), 'book-author', true);
                      $year = get_post_meta(get_the_ID(), 'book-year', true);
                      $genre = get_post_meta(get_the_ID(), 'book-genre', true);
                      $isbn = get_post_meta(get_the_ID(), 'book-isbn', true);
                      if (!empty($author) || !empty($year) || !empty($genre) || !empty($isbn)) : ?>
                          <div class="book-meta">
                              <?php if (!empty($author)) : ?>
                                  <p><strong>By:</strong> <?php echo esc_html($author); ?></p>
                              <?php endif; ?>
                              <?php if (!empty($year)) : ?>
                                  <p><strong>Publication Year:</strong> <?php echo esc_html($year); ?></p>
                              <?php endif; ?>
                              <?php if (!empty($genre)) : ?>
                                  <p><strong>Genre:</strong> <?php echo esc_html($genre); ?></p>
                              <?php endif; ?>
                              <?php if (!empty($isbn)) : ?>
                                  <p><strong>ISBN:</strong> <?php echo esc_html($isbn); ?></p>
                              <?php endif; ?>
                          </div>
                      <?php endif; ?>
                  </div>
              </div>
          </div>
        <?php endwhile;
        wp_reset_postdata();
    endif;
    die();
}
add_action('wp_ajax_load_more_books', 'load_more_books_ajax_handler');
add_action('wp_ajax_nopriv_load_more_books', 'load_more_books_ajax_handler');




function books_shortcode_styles() {
    ?>

    <?php
}
add_action( 'wp_head', 'books_shortcode_styles' );

?>