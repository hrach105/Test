<?php //Template Name: News ?>

<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // Get current page number
            $args = array(
                'posts_per_page' => 5,
                'paged' => $paged,
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                $i = 0;
                ?>
                <h1 class="page-title">News</h1>
                <?php while ($query->have_posts()) : $query->the_post();
                $i++; ?>
                <?php

                if ($i === 1) { ?>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <span class="date"><?php echo get_the_date(); ?></span>
                        <h2>
                            <a class="post-item-title" href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                        </h2>
                    </div>

                <?php } else { ?>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail(); ?>
                            </div>
                        <?php endif; ?>
                        <span class="date"><?php echo get_the_date(); ?></span>
                        <h2>
                            <a class="post-item-title" href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                        </h2>
                    </div>
                <?php } ?>
            <?php endwhile; ?>

                <div class="pagination posts-pagination">
                    <?php
                    echo paginate_links(array(
                        'total' => $query->max_num_pages,
                        'current' => $paged,
                        'prev_text' => __('<svg xmlns="http://www.w3.org/2000/svg" width="13" height="19" viewBox="0 0 13 19" fill="none">
<path d="M0.908591 8.54405L8.80457 0.896439C9.35032 0.367854 10.2328 0.367854 10.7728 0.896439L12.0849 2.16729C12.6306 2.69588 12.6306 3.55061 12.0849 4.07357L6.49383 9.5L12.0907 14.9208C12.6364 15.4494 12.6364 16.3041 12.0907 16.8271L10.7786 18.1036C10.2328 18.6321 9.35032 18.6321 8.81037 18.1036L0.914396 10.456C0.362839 9.92737 0.362839 9.07263 0.908591 8.54405Z" fill="#262626"/>
</svg>'),
                        'next_text' => __('<svg xmlns="http://www.w3.org/2000/svg" width="13" height="19" viewBox="0 0 13 19" fill="none">
<path d="M12.0914 10.5091L4.19543 18.5815C3.64968 19.1395 2.76719 19.1395 2.22724 18.5815L0.915117 17.2401C0.369366 16.6821 0.369366 15.7799 0.915118 15.2279L6.50617 9.5L0.909313 3.77804C0.363561 3.22009 0.363561 2.31787 0.909313 1.76585L2.22144 0.418466C2.76719 -0.139485 3.64968 -0.139485 4.18963 0.418466L12.0856 8.49094C12.6372 9.04889 12.6372 9.95111 12.0914 10.5091Z" fill="#262626"/>
</svg>'),
                    ));
                    ?>
                </div>

                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p>No posts found</p>
            <?php endif; ?>
        </div>
    </div>

<?php get_footer(); ?>