<?php
/**
 * Output of the [wp-manual-orders] shortcode (if the user is logged in)
 *
 * @since      0.0.1
 * @package    WordPress Manual Orders
 * @author     Nahid Ferdous Mohit
 */


$current_user   = wp_get_current_user();
?>

<h3 class="wpmo_customer_welcome_msg">Welcome <?php echo $current_user->display_name ?>! Here is your purchase history.</h3>
<p class="wpmo_customer_logout"><a href="<?php echo wp_logout_url( get_permalink() ); ?>">Logout</a></p>

<?php

//Query
global $post;
$the_query = new WP_QUERY ( array (
	'post_type' => 'wpmo_order',
	'posts_per_page' => -1,
) );

?>

<table class="wpmo_order_table">
	<tbody>
		<tr>
			<th>Order ID</th>
			<th>Product</th>
			<th>Unit Price</th>
			<th>Quantity</th>
			<th>Total Price</th>
			<th>Carrier</th>
			<th>Tracking</th>
		</tr>

<?php

// Loop
while ( $the_query->have_posts() ) : $the_query->the_post();

	$check_user = get_post_meta( $post->ID, 'wpmo_order_customer_meta_box_customer_select', true );
	$current_user = wp_get_current_user();

	if ( $check_user == $current_user->user_login ) { ?>

		<tr class="order">
			<td><?php echo get_the_ID(); ?></td>
			<td><?php echo get_post_meta( $post->ID, 'wpmo_order_product_meta_box_product_name', true ); ?></td>
			<td><?php echo '$' . get_post_meta( $post->ID, 'wpmo_order_product_meta_box_product_price', true ); ?></td>
			<td><?php echo get_post_meta( $post->ID, 'wpmo_order_product_meta_box_product_quantity', true ); ?></td>
			<td><?php echo '$' . get_post_meta( $post->ID, 'wpmo_order_product_meta_box_product_quantity', true ) * get_post_meta( $post->ID, 'wpmo_order_product_meta_box_product_price', true ); ?></td>
			<td><?php echo get_post_meta( $post->ID, 'wpmo_order_details_meta_box_carrier', true ); ?></td>
			<td><?php echo get_post_meta( $post->ID, 'wpmo_order_details_meta_box_tracking', true ); ?></td>
		</tr> 

		<?php

	}

endwhile;

?>

	</tbody>
</table>

<?php

wp_reset_postdata();
