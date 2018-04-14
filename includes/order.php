<?php
/**
 * 'Order' post type and it's metaboxes
 *
 * @since      0.0.1
 * @package    WordPress Manual Orders
 * @author     Nahid Ferdous Mohit
 */

// Add the 'Order' post type
function create_order_post_type() {
  register_post_type( 'wpmo_order',
    array(
      'labels' => array(
        'name' => __( 'Manual Orders' ),
        'singular_name' => __( 'Manual Order', 'wp-manual-orders' ),
        'add_new_item' => __( 'Add New Manual Order', 'wp-manual-orders' ),
        'edit_item' => __( 'Edit Manual Order', 'wp-manual-orders' ),
        'new_item' => __( 'New Manual Order', 'wp-manual-orders' ),
        'view_item' => __( 'View Manual Order', 'wp-manual-orders' ),
        'view_items' => __( 'View Manual Orders', 'wp-manual-orders' ),
        'not_found' => __( 'No manual orders found', 'wp-manual-orders' ),
        'not_found_in_trash' => __( 'No manual orders found in Trash', 'wp-manual-orders' ),
        'all_items' => __( 'All Manual Orders', 'wp-manual-orders' ),
      ),
      'public' => true,
      'has_archive' => false,
      'rewrite' => array( 'slug' => 'wpmo_orders' ),
      'show_ui' => true,
      'show_in_menu' => true,
      'supports' => false,
      'capability_type' => array( 'wpmo_order', 'wpmo_orders' ),
      'map_meta_cap' => true,
    )
  );
}
add_action( 'init', 'create_order_post_type' );

// Add meta boxes
function wpmo_orders_meta_box_add() {
    // Products Meta Box
	add_meta_box( 'wpmo_order_product_meta_box', __( 'Product', 'wp-manual-orders' ), 'wpmo_order_product_meta_box_callback', 'wpmo_order', 'normal', 'default' );

    // Customer Meta Box
	add_meta_box( 'wpmo_order_customer_meta_box', __( 'Customer', 'wp-manual-orders' ), 'wpmo_order_customer_meta_box_callback', 'wpmo_order', 'normal', 'default' );

    // Order Details Meta Box
	add_meta_box( 'wpmo_order_details_meta_box', __( 'Order Details', 'wp-manual-orders' ), 'wpmo_order_details_meta_box_callback', 'wpmo_order', 'normal', 'default' ); 
}
add_action( 'add_meta_boxes', 'wpmo_orders_meta_box_add' );

// Product Meta Box Callback Output
function wpmo_order_product_meta_box_callback( $post ) {
	echo 'Enter the product ordered';

	$values = get_post_custom( $post->ID );
    $product_name = isset( $values['wpmo_order_product_meta_box_product_name'] ) ? esc_attr( $values['wpmo_order_product_meta_box_product_name'][0] ) : '';
	$product_quantity = isset( $values['wpmo_order_product_meta_box_product_quantity'] ) ? esc_attr( $values['wpmo_order_product_meta_box_product_quantity'][0] ) : '';
    $product_price = isset( $values['wpmo_order_product_meta_box_product_price'] ) ? esc_attr( $values['wpmo_order_product_meta_box_product_price'][0] ) : '';

    // We'll use this nonce field later on when saving.
    wp_nonce_field( 'wpmo_meta_box_nonce', 'meta_box_nonce' );
    ?>
    <p>
    	<label for="wpmo_order_product_meta_box_product_name"><?php echo __( 'Product Name', 'wp-manual-orders' ); ?></label>
        <input type="text" id="wpmo_order_product_meta_box_product_name" name="wpmo_order_product_meta_box_product_name" value="<?php echo $product_name; ?>" />
    </p>
    <p>
    	<label for="wpmo_order_product_meta_box_product_quantity"><?php echo __( 'Quantity', 'wp-manual-orders' ); ?></label>
    	<input type="number" id="wpmo_order_product_meta_box_product_quantity" name="wpmo_order_product_meta_box_product_quantity" value="<?php echo $product_quantity; ?>" />
    </p>
    <p>
        <label for="wpmo_order_product_meta_box_product_price"><?php echo __( 'Price', 'wp-manual-orders' ); ?></label>
        <input type="number" id="wpmo_order_product_meta_box_product_price" name="wpmo_order_product_meta_box_product_price" value="<?php echo $product_price; ?>" />
    </p>
    <?php    
}

// Customer Meta Box Callback Output
function wpmo_order_customer_meta_box_callback( $post ) {
	echo 'Select ordering customer';
	$values = get_post_custom( $post->ID );
	$customer_selected = isset( $values['wpmo_order_customer_meta_box_customer_select'] ) ? esc_attr( $values['wpmo_order_customer_meta_box_customer_select'][0] ) : '';

    // We'll use this nonce field later on when saving.
    wp_nonce_field( 'wpmo_meta_box_nonce', 'meta_box_nonce' );

	// The Query
	?> 
    <p>
        <label for="wpmo_order_customer_meta_box_customer_select">Customer</label>
        <?php 
        $args = array(
            'role' => 'wpmo_customer',
        );
        $users = get_users( $args );
        ?>

        <select name="wpmo_order_customer_meta_box_customer_select" id="wpmo_order_customer_meta_box_customer_select">
            <option value="">Select Customer</option>
            <?php foreach ($users as $user) {
                echo '<option value="' . $user->user_login . '"' . selected( $customer_selected, $user->user_login ) . '>' . $user->user_login .'</option>';
            } ?>
        </select>
    </p>
    <?php    
}

// Order Details Meta Box Callback Output
function wpmo_order_details_meta_box_callback( $post ) {
	echo 'Fill in the order details';

	$values = get_post_custom( $post->ID );
	$ord_carrier = isset( $values['wpmo_order_details_meta_box_carrier'] ) ? esc_attr( $values['wpmo_order_details_meta_box_carrier'][0] ) : '';
	$ord_tracking = isset( $values['wpmo_order_details_meta_box_tracking'] ) ? esc_attr( $values['wpmo_order_details_meta_box_tracking'][0] ) : '';

    // We'll use this nonce field later on when saving.
    wp_nonce_field( 'cp_meta_box_nonce', 'meta_box_nonce' );
    ?>
    <p>
    	<label for="wpmo_order_details_meta_box_carrier">Carrier</label>
    	<input type="text" id="wpmo_order_details_meta_box_carrier" name="wpmo_order_details_meta_box_carrier" value="<?php echo $ord_carrier; ?>" />
    </p>
    <p>
    	<label for="wpmo_order_details_meta_box_tracking">Tracking</label>
    	<input type="text" id="wpmo_order_details_meta_box_tracking" name="wpmo_order_details_meta_box_tracking" value="<?php echo $ord_tracking; ?>" />
    </p>
	<?php
}

// Save the metaboxes
function wpmo_order_meta_box_save( $post_id ) {
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'cp_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;
     
    // Make sure your data is set before trying to save it

    // Product Name
    if( isset( $_POST['wpmo_order_product_meta_box_product_name'] ) )
        update_post_meta( $post_id, 'wpmo_order_product_meta_box_product_name', esc_attr( $_POST['wpmo_order_product_meta_box_product_name'] ) );

    // Product Quantity
    if( isset( $_POST['wpmo_order_product_meta_box_product_quantity'] ) )
        update_post_meta( $post_id, 'wpmo_order_product_meta_box_product_quantity', esc_attr( $_POST['wpmo_order_product_meta_box_product_quantity'] ) );

    // Product Price
    if( isset( $_POST['wpmo_order_product_meta_box_product_price'] ) )
        update_post_meta( $post_id, 'wpmo_order_product_meta_box_product_price', esc_attr( $_POST['wpmo_order_product_meta_box_product_price'] ) );
    
    // Customer     
    if( isset( $_POST['wpmo_order_customer_meta_box_customer_select'] ) )
        update_post_meta( $post_id, 'wpmo_order_customer_meta_box_customer_select', esc_attr( $_POST['wpmo_order_customer_meta_box_customer_select'] ) );
    
    // Carrier
    if( isset( $_POST['wpmo_order_details_meta_box_carrier'] ) )
        update_post_meta( $post_id, 'wpmo_order_details_meta_box_carrier', esc_attr( $_POST['wpmo_order_details_meta_box_carrier'] ) );
    
    // Tracking
    if( isset( $_POST['wpmo_order_details_meta_box_tracking'] ) )
        update_post_meta( $post_id, 'wpmo_order_details_meta_box_tracking', esc_attr( $_POST['wpmo_order_details_meta_box_tracking'] ) );
}
add_action( 'save_post', 'wpmo_order_meta_box_save' );

/**
 * Order Lists
 */

// Adding columns and ordering
function wpmo_order_columns($columns) {
    $new = array();
    foreach($columns as $key => $date) {
        if ($key=='date') // Put the Thumbnail column before the Author column
            $new['post_id'] = 'Order ID';
        $new[$key] = $date;
    }
    return $new;
}
add_filter('manage_wpmo_order_posts_columns', 'wpmo_order_columns');

// Column content
function wpmo_order_columns_content( $column_name, $post_id ) {
    if ($column_name == 'post_id') {
        $post_id  = get_the_ID();
        echo '<a href=" ' . get_edit_post_link() . ' " >' . $post_id . '</a>';
    }
}
add_action( 'manage_wpmo_order_posts_custom_column', 'wpmo_order_columns_content', 10, 2 );

// Remove title column
function wpmo_order_remove_title_column( $columns ) {
    unset($columns['title']);
    return $columns;
}
function wpmo_order_column_init() {
    add_filter( 'manage_wpmo_order_posts_columns' , 'wpmo_order_remove_title_column' );
}
add_action( 'admin_init' , 'wpmo_order_column_init' );

//Remove View Link
function remove_row_actions_wpmo_order( $actions ) {
    if( get_post_type() === 'wpmo_order' )
        unset( $actions['view'] );
        unset( $actions['inline hide-if-no-js'] ); 
    return $actions;
}
add_filter( 'post_row_actions', 'remove_row_actions_wpmo_order' );