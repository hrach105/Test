<?php get_header()?>
<div class="single-books">
   <div class="container">
       <div class="row">
           <div class="col-7">
               <div class="book-item">
                   <div class="row">
                       <div class="col-6">
                           <?php if ( has_post_thumbnail() ) : ?>
                               <div class="book-thumbnail">
                                   <?php the_post_thumbnail('medium'); // Display featured image ?>
                               </div>
                           <?php endif; ?>
                           <?php
                           $author = get_post_meta( get_the_ID(), 'book-author', true );
                           $year = get_post_meta( get_the_ID(), 'book-year', true );
                           $genre = get_post_meta( get_the_ID(), 'book-genre', true );
                           $isbn = get_post_meta( get_the_ID(), 'book-isbn', true );
                           if ( !empty($author) || !empty($year) || !empty($genre) || !empty($isbn) ) :
                               ?>
                               <div class="book-meta">
                                   <?php if ( !empty($year) ) : ?>
                                       <p><strong>Publication Year:</strong> <?php echo esc_html( $year ); ?></p>
                                   <?php endif; ?>

                                   <?php if ( !empty($genre) ) : ?>
                                       <p><strong>Genre:</strong> <?php echo esc_html( $genre ); ?></p>
                                   <?php endif; ?>

                                   <?php if ( !empty($isbn) ) : ?>
                                       <p><strong>ISBN:</strong> <?php echo esc_html( $isbn ); ?></p>
                                   <?php endif; ?>
                               </div>
                           <?php endif; ?>
                       </div>
                       <div class="col-6">
                           <div class="book-info">
                               <h1><?php the_title(); ?></h1>
                               <p><?php echo $author ?></p>
                               <div class="book-content">
                                   <?php the_content(); ?>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="col-4 offset-1">
               <?php
               $args = array(
                   'post_type' => 'book',
                   'posts_per_page' => 3,
                   'post__not_in' => array(get_the_ID())
               );
               $related_books = new WP_Query($args);
               if ($related_books->have_posts()) {

                   echo '<ul class="related-books">';
                   echo '<h2>Releated Books</h2>';
                   while ($related_books->have_posts()) {
                       $related_books->the_post();
                       ?>
                       <li>
                           <?php if ( has_post_thumbnail() ) : ?>
                               <div class="book-thumbnail">
                                   <?php the_post_thumbnail('medium'); ?>
                               </div>
                           <?php endif; ?>
                           <div class="related-book-details">
                               <h3><?php the_title(); ?></h3>
                               <p><?php echo $author; ?></p>
                               <a href="<?php the_permalink(); ?>">
                                   More
                                   <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                                       <path d="M5.95246 1.43771L6.64613 0.726013C6.93985 0.424662 7.4148 0.424662 7.70539 0.726013L13.7797 6.955C14.0734 7.25635 14.0734 7.74365 13.7797 8.04179L7.70539 14.274C7.41167 14.5753 6.93673 14.5753 6.64613 14.274L5.95246 13.5623C5.65562 13.2577 5.66187 12.7608 5.96496 12.4627L9.73016 8.78235H0.749916C0.334338 8.78235 0 8.43932 0 8.01294V6.98706C0 6.56068 0.334338 6.21766 0.749916 6.21766H9.73016L5.96496 2.53733C5.65874 2.23918 5.65249 1.74227 5.95246 1.43771Z" fill="#4CE0D7"/>
                                   </svg>
                               </a>

                           </div>
                       </li>
                       <?php
                   }
                   echo '</ul>';
                   wp_reset_postdata();
               } else {

               }

               ?>
           </div>
       </div>
   </div>
</div>



<?php
$current_genre = get_post_meta(get_the_ID(), 'book-genre', true);


if ($current_genre) {
    $args = array(
        'post_type' => 'book',
        'meta_query' => array(
            array(
                'key' => 'book-genre',
                'value' => $current_genre,
                'compare' => '='
            )
        ),
        'posts_per_page' => 5,
        'post__not_in' => array(get_the_ID())
    );

    $same_genre_books = new WP_Query($args); ?>
 <div class="container">
     <div class="same-genre-books">
         <?php
         if ($same_genre_books->have_posts()) {
             echo '<h2 class="section-title">You might also enjoy</h2>';
             echo '<div class="row genre-posts">';
             while ($same_genre_books->have_posts()) {
                 $same_genre_books->the_post();
                 ?>

                 <div class="col-3">
                     <?php if ( has_post_thumbnail() ) : ?>
                         <div class="book-thumbnail">
                             <?php the_post_thumbnail('medium'); ?>
                         </div>
                     <?php endif; ?>
                     <a class="post-item-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                     <span><?= $author ?></span>
                 </div>

                 <?php
             }
             echo '</div>';
             wp_reset_postdata();
         } else {
         }
         ?>
     </div>
 </div>
   <?php }
?>








<?php get_footer()?>
