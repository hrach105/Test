<div class="post-single">
   <div class="container">
      <div class="row">
          <div class="col-12 col-sm-12 col-md-7 col-lg-9 col-xl-9">
              <div class="post-item">
                  <?php ?>
                      <span class="date"><?php echo get_the_date() ?> <?php calculate_reading_time(); ?></span>
                      <h1><?php echo get_the_title() ?></h1>
                  <?php ?>
                  <?php task_post_thumbnail(); ?>
                  <p><?php the_content(); ?></p>
              </div>
          </div>
          <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
              <?php get_sidebar();?>
          </div>
      </div>
   </div>
</div>



