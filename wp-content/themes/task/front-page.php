<?php get_header()?>

<div class="container">
    <section class="last-added-post">
        <?php
        $args = array(
            'posts_per_page' => 1,
            'orderby'        => 'date',
            'order'          => 'DESC',
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) :
            $highlighted_post_ids = array();
            while ($query->have_posts()) : $query->the_post(); ?>
                <div class="col-12">
                    <div class="post-image">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php the_post_thumbnail(); ?>
                        </a>
                    </div>
                    <div class="post-content">
                        <span><?php the_date(); ?> <?php calculate_reading_time(); ?></span>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div>
                </div>
                <?php
                $highlighted_post_ids[] = get_the_ID();
            endwhile;
            wp_reset_postdata();
        else :
        endif;
        ?>
    </section>

    <section class="row posts">
        <?php
        $the_query = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'post__not_in' => $highlighted_post_ids,
        ));

        if ($the_query->have_posts()) : ?>
            <h2 class="section-title">Latest News</h2>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <div class="col-4 post-item">
                    <?php the_post_thumbnail(); ?>
                    <span class="date"><?php echo get_the_date(); ?> <?php calculate_reading_time(); ?></span>
                    <h2><a class="post-item-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </div>
            <?php endwhile;

            wp_reset_postdata();
        else :
            echo 'No posts found';
        endif;
        ?>
    </section>

    <section class="books-wrapper">
        <div class="book-list-container">
            <h2 class="section-title">Books</h2>
            <?php echo do_shortcode('[book_list_ajax]'); ?>
        </div>
    </section>
</div>

<?php get_footer()?>
