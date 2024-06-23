<?php //Template Name: Books ?>

<?php get_header()?>
<div class="container">
    <section class="books-wrapper">
        <div class="book-list-container">
            <h2 class="section-title">Books</h2>
            <?php echo do_shortcode('[book_list_pagination]'); ?>
        </div>
    </section>
</div>
<?php get_footer()?>
