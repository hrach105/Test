<?php
/*
Plugin Name: Custom Book Post Type
Description: Adds a custom post type for Books.
Version: 1.0
Author: Hrach
*/

function create_book_post_type() {
    $labels = array(
        'name' => _x( 'Books', 'Post Type General Name', 'textdomain' ),
        'singular_name' => _x( 'Book', 'Post Type Singular Name', 'textdomain' ),
        'menu_name' => __( 'Books', 'textdomain' ),
        'name_admin_bar' => __( 'Book', 'textdomain' ),
        'archives' => __( 'Book Archives', 'textdomain' ),
        'attributes' => __( 'Book Attributes', 'textdomain' ),
        'parent_item_colon' => __( 'Parent Book:', 'textdomain' ),
        'all_items' => __( 'All Books', 'textdomain' ),
        'add_new_item' => __( 'Add New Book', 'textdomain' ),
        'add_new' => __( 'Add New', 'textdomain' ),
        'new_item' => __( 'New Book', 'textdomain' ),
        'edit_item' => __( 'Edit Book', 'textdomain' ),
        'update_item' => __( 'Update Book', 'textdomain' ),
        'view_item' => __( 'View Book', 'textdomain' ),
        'view_items' => __( 'View Books', 'textdomain' ),
        'search_items' => __( 'Search Book', 'textdomain' ),
        'not_found' => __( 'Not found', 'textdomain' ),
        'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
        'featured_image' => __( 'Featured Image', 'textdomain' ),
        'set_featured_image' => __( 'Set featured image', 'textdomain' ),
        'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
        'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
        'insert_into_item' => __( 'Insert into book', 'textdomain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this book', 'textdomain' ),
        'items_list' => __( 'Books list', 'textdomain' ),
        'items_list_navigation' => __( 'Books list navigation', 'textdomain' ),
        'filter_items_list' => __( 'Filter books list', 'textdomain' ),
    );
    $args = array(
        'label' => __( 'Book', 'textdomain' ),
        'description' => __( 'A custom post type for books', 'textdomain' ),
        'labels' => $labels,
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
    );
    register_post_type( 'book', $args );
}
add_action( 'init', 'create_book_post_type', 0 );

function create_book_taxonomy() {
    $labels = array(
        'name' => _x( ' Taxonomies', 'Taxonomy General Name', 'textdomain' ),
        'singular_name' => _x( ' Taxonomy', 'Taxonomy Singular Name', 'textdomain' ),
        'menu_name' => __( ' Taxonomies', 'textdomain' ),
        'all_items' => __( 'All  Taxonomies', 'textdomain' ),
        'parent_item' => __( 'Parent  Taxonomy', 'textdomain' ),
        'parent_item_colon' => __( 'Parent  Taxonomy:', 'textdomain' ),
        'new_item_name' => __( 'New  Taxonomy Name', 'textdomain' ),
        'add_new_item' => __( 'Add New  Taxonomy', 'textdomain' ),
        'edit_item' => __( 'Edit  Taxonomy', 'textdomain' ),
        'update_item' => __( 'Update  Taxonomy', 'textdomain' ),
        'view_item' => __( 'View  Taxonomy', 'textdomain' ),
        'separate_items_with_commas' => __( 'Separate  taxonomies with commas', 'textdomain' ),
        'add_or_remove_items' => __( 'Add or remove  taxonomies', 'textdomain' ),
        'choose_from_most_used' => __( 'Choose from the most used', 'textdomain' ),
        'popular_items' => __( 'Popular  Taxonomies', 'textdomain' ),
        'search_items' => __( 'Search  Taxonomies', 'textdomain' ),
        'not_found' => __( 'Not Found', 'textdomain' ),
        'no_terms' => __( 'No  taxonomies', 'textdomain' ),
        'items_list' => __( ' Taxonomies list', 'textdomain' ),
        'items_list_navigation' => __( ' Taxonomies list navigation', 'textdomain' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );
    register_taxonomy( 'let_taxonomy', array( 'book' ), $args );
}
add_action( 'init', 'create_book_taxonomy', 0 );

function add_book_meta_boxes() {
    add_meta_box(
        'book_details',
        'Book Details',
        'book_details_callback',
        'book',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'add_book_meta_boxes' );

function book_details_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'book_nonce' );
    $book_stored_meta = get_post_meta( $post->ID );
    ?>
    <p>
        <label for="book-author" class="book-row-title"><?php _e( 'Author', 'textdomain' )?></label>
        <input type="text" name="book-author" id="book-author" value="<?php if ( isset ( $book_stored_meta['book-author'] ) ) echo $book_stored_meta['book-author'][0]; ?>" />
    </p>
    <p>
        <label for="book-year" class="book-row-title"><?php _e( 'Publication Year', 'textdomain' )?></label>
        <input type="text" name="book-year" id="book-year" value="<?php if ( isset ( $book_stored_meta['book-year'] ) ) echo $book_stored_meta['book-year'][0]; ?>" />
    </p>
    <p>
        <label for="book-genre" class="book-row-title"><?php _e( 'Genre', 'textdomain' )?></label>
        <input type="text" name="book-genre" id="book-genre" value="<?php if ( isset ( $book_stored_meta['book-genre'] ) ) echo $book_stored_meta['book-genre'][0]; ?>" />
    </p>
    <p>
        <label for="book-isbn" class="book-row-title"><?php _e( 'ISBN', 'textdomain' )?></label>
        <input type="text" name="book-isbn" id="book-isbn" value="<?php if ( isset ( $book_stored_meta['book-isbn'] ) ) echo $book_stored_meta['book-isbn'][0]; ?>" />
    </p>
    <?php
}

function save_book_meta( $post_id ) {
    // Check for nonce security
    if ( ! isset( $_POST['book_nonce'] ) || ! wp_verify_nonce( $_POST['book_nonce'], basename( __FILE__ ) ) ) {
        return $post_id;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }
    if ( isset( $_POST['book-author'] ) ) {
        update_post_meta( $post_id, 'book-author', sanitize_text_field( $_POST['book-author'] ) );
    }
    if ( isset( $_POST['book-year'] ) ) {
        update_post_meta( $post_id, 'book-year', sanitize_text_field( $_POST['book-year'] ) );
    }
    if ( isset( $_POST['book-genre'] ) ) {
        update_post_meta( $post_id, 'book-genre', sanitize_text_field( $_POST['book-genre'] ) );
    }
    if ( isset( $_POST['book-isbn'] ) ) {
        update_post_meta( $post_id, 'book-isbn', sanitize_text_field( $_POST['book-isbn'] ) );
    }
}
add_action( 'save_post', 'save_book_meta' );
?>
