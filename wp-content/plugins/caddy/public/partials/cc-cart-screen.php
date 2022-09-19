<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! is_object( WC()->cart ) ) {
	return;
}

$cc_empty_class          = ( WC()->cart->is_empty() ) ? ' cc-empty' : '';
$cart_total              = floatval( preg_replace( '#[^\d.]#', '', WC()->cart->get_cart_contents_total() ) );
$cc_free_shipping_amount = get_option( 'cc_free_shipping_amount' );
$wc_currency_symbol      = get_woocommerce_currency_symbol();
$total_cart_item_count   = is_object( WC()->cart ) ? WC()->cart->get_cart_contents_count() : 0;
$cc_free_shipping_bar    = true;

$free_shipping_remaining_amount = floatval( $cc_free_shipping_amount ) - floatval( $cart_total );
$free_shipping_remaining_amount = ! empty( $free_shipping_remaining_amount ) ? $free_shipping_remaining_amount : 0;

// Bar width based off % left
$cc_bar_amount = 100;
if ( ! empty( $cc_free_shipping_amount ) && $cart_total <= $cc_free_shipping_amount ) {
	$cc_bar_amount = ( $cart_total * 100 / $cc_free_shipping_amount );
}

$current_user_id    = get_current_user_id();
$cc_sfl_items_array = get_user_meta( $current_user_id, 'cc_save_for_later_items', true );
if ( ! is_array( $cc_sfl_items_array ) ) {
	$cc_sfl_items_array = array();
}
$cc_sfl_items = array_reverse( array_unique( $cc_sfl_items_array ) );

$cc_shipping_country       = get_option( 'cc_shipping_country' );
$cc_disable_branding       = get_option( 'cc_disable_branding' ); // Get disable branding
$cc_disable_branding_class = ( 'disabled' === $cc_disable_branding ) ? ' cc-no-branding' : '';

$currency_symbol = get_woocommerce_currency_symbol();
$cart_items      = WC()->cart->get_cart();
$cart_items_data = array_reverse( $cart_items );

$first_product_id = 0;
$first_cart_item  = array_slice( $cart_items_data, 0, 1, true );
if ( ! empty( $first_cart_item ) ) {
	foreach ( $first_cart_item as $first_product ) {
		$first_product_id = $first_product['product_id'];
	}
}
$rest_cart_item = array_slice( $cart_items_data, 1 );
$cc_bar_active  = ( $cart_total >= $cc_free_shipping_amount ) ? ' cc-bar-active' : '';

?>

<div class="cc-cart-container">

	<?php do_action( 'caddy_before_cart_screen_data' ); ?>

	<div class="cc-notice"></div>

	<div class="cc-body<?php echo esc_attr( $cc_empty_class ); ?>">

		<?php do_action( 'caddy_display_registration_message' ); ?>

		<?php if ( ! WC()->cart->is_empty() ) { ?>

			<?php if ( ! empty( $cc_free_shipping_amount ) && $cc_free_shipping_bar ) { ?>
				<div class="cc-fs cc-text-left">
					<?php do_action( 'caddy_free_shipping_title_text' ); // Free shipping title html ?>
				</div>
			<?php } ?>

			<?php do_action( 'caddy_before_cart_items' ); ?>

			<div class="cc-row cc-cart-items cc-text-center">
				<?php Caddy_Public::cart_items_list( $first_cart_item ); ?>

				<!--Product recommendation screen-->
				<div class="cc-product-upsells-wrapper">
					<?php
					if ( 0 !== $first_product_id ) {
						do_action( 'caddy_product_upsells_slider', $first_product_id );
					}
					?>
				</div>

				<?php Caddy_Public::cart_items_list( $rest_cart_item ); ?>

			</div>

			<?php do_action( 'caddy_after_cart_items' ); ?>

			<?php
			if ( wc_coupons_enabled() ) {
				$applied_coupons = WC()->cart->get_applied_coupons();
				?>
				<div class="cc-coupon">
					<div class="woocommerce-notices-wrapper"><?php wc_print_notices(); ?></div>
					<?php
					// Coupon form will only display when there is no coupon code applied.
					if ( empty( $applied_coupons ) ) {
						?>
						<div class="cc-coupon-title"><?php esc_html_e( 'Apply a promo code:', 'caddy' ); ?></div>
					<?php } ?>
					<div class="cc-coupon-form">
						<?php
						// Coupon form will only display when there is no coupon code applied.
						if ( empty( $applied_coupons ) ) {
							?>
							<div class="coupon">
								<form name="apply_coupon_form" id="apply_coupon_form" method="post">
									<input type="text" name="cc_coupon_code" id="cc_coupon_code" placeholder="<?php echo esc_html__( 'Promo code', 'caddy' ); ?>" />
									<input type="submit" class="cc-button-sm cc-coupon-btn" name="cc_apply_coupon" value="<?php echo esc_html__( 'Apply', 'caddy' ); ?>">
								</form>
							</div>
						<?php } ?>

						<?php
						// Check if there is any coupon code is applied.
						if ( ! empty( $applied_coupons ) ) {
							foreach ( $applied_coupons as $code ) {
								$coupon_detail   = new WC_Coupon( $code );
								$coupon_data     = $coupon_detail->get_data();
								$discount_amount = $coupon_data['amount'];
								$discount_type   = $coupon_data['discount_type'];

								if ( 'percent' == $discount_type ) {
									$coupon_amount_text = $discount_amount . '%';
								} else {
									$coupon_amount_text = $currency_symbol . $discount_amount;
								}
								?>
								<div class="cc-applied-coupon">
									<span class="cc_applied_code"><?php echo esc_html( $code ); ?></span><?php echo esc_html( __( ' promo code ( ', 'caddy' ) . $coupon_amount_text . __( ' off ) applied.', 'caddy' ) ); ?>
									<a href="javascript:void(0);" class="cc-remove-coupon"><?php esc_html_e( 'Remove', 'caddy' ); ?></a>
								</div>
								<?php
							}
						} ?>

					</div>
				</div>
			<?php } ?>
		<?php } else { ?>
			<div class="cc-empty-msg">
				<i class="ccicon-cart-empty"></i>
				<span class="cc-title"><?php esc_html_e( 'Your Cart is empty!', 'caddy' ); ?></span>

				<?php if ( ! empty( $cc_sfl_items ) ) { ?>
					<p><?php esc_html_e( 'You haven\'t added any items to your cart yet, but you do have products in your saved list.', 'caddy' ); ?></p>
					<a href="javascript:void(0);" class="cc-button cc-view-saved-items"><?php esc_html_e( 'View Saved Items', 'caddy' ); ?></a>
				<?php } else { ?>
					<p><?php esc_html_e( 'It looks like you haven\'t added any items to your cart yet.', 'caddy' ); ?></p>
					<a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="cc-button"><?php esc_html_e( 'Browse Products', 'caddy' ); ?></a>
				<?php } ?>
			</div>
		<?php } ?>

	</div>

	<?php do_action( 'caddy_after_cart_screen_data' ); ?>

	<?php if ( ! WC()->cart->is_empty() ) { ?>
		<div class="cc-cart-actions<?php echo $cc_disable_branding_class; ?>">

			<?php do_action( 'caddy_before_cart_screen_totals' ); ?>

			<div class="cc-totals">
				<div class="cc-total-box">
					<span class="cc-total-text">
						<?php if ( $total_cart_item_count > 1 ) { ?>
							<?php echo esc_html__( 'Subtotal - ', 'caddy' ) . $total_cart_item_count . esc_html__( ' items', 'caddy' ); ?>
						<?php } else { ?>
							<?php echo esc_html__( 'Subtotal - ', 'caddy' ) . $total_cart_item_count . esc_html__( ' item', 'caddy' ); ?>
						<?php } ?>
						<br><span class="cc-subtotal-subtext"><?php esc_html_e( 'Shipping &amp; taxes calculated at checkout.', 'caddy' ); ?></span>
					</span>
					<?php
					$coupon_discount_amount = 0;
					if ( wc_coupons_enabled() ) {
						$applied_coupons = WC()->cart->get_applied_coupons();
						if ( ! empty( $applied_coupons ) ) {
							foreach ( $applied_coupons as $code ) {
								$coupon                 = new WC_Coupon( $code );
								$coupon_discount_amount = WC()->cart->get_coupon_discount_amount( $coupon->get_code(), WC()->cart->display_cart_ex_tax );
							}
						}
					}
					$cc_cart_subtotal    = WC()->cart->get_displayed_subtotal();
					$caddy_cart_subtotal = (float) ( $cc_cart_subtotal - $coupon_discount_amount );
					?>
					<span class="cc-total-amount"><?php echo wc_price( $caddy_cart_subtotal, array( 'currency' => get_woocommerce_currency() ) ); ?></span>
				</div>
			</div>

			<?php do_action( 'caddy_after_cart_screen_totals' ); ?>

			<a href="<?php echo wc_get_checkout_url(); ?>" class="cc-button cc-button-primary"><?php esc_html_e( 'Checkout Now', 'caddy' ); ?></a>

			<?php do_action( 'caddy_after_cart_screen_checkout_button' ); ?>

		</div>
	<?php } ?>
	<input type="hidden" name="cc-compass-count-after-remove" class="cc-cart-count-after-product-remove" value="<?php echo $total_cart_item_count; ?>">

	<?php
	$cc_compass_desk_notice = '';
	$cc_compass_mob_notice  = 'mob_disable_notices';
	$cc_is_mobile           = '';
	$caddy_license_status   = get_option( 'caddy_premium_edd_license_status' );
	if ( isset( $caddy_license_status ) && 'valid' === $caddy_license_status ) {
		$cc_compass_desk_notice = get_option( 'cp_desktop_notices' );
		$cc_compass_mob_notice  = get_option( 'cp_mobile_notices' );
		$cc_compass_mob_notice  = ( wp_is_mobile() ) ? $cc_compass_mob_notice : '';
	}
	$cc_is_mobile = ( wp_is_mobile() ) ? 'yes' : 'no';
	?>
	<input type="hidden" name="cc-compass-desk-notice" class="cc-compass-desk-notice" value="<?php echo $cc_compass_desk_notice; ?>">
	<input type="hidden" name="cc-compass-mobile-notice" class="cc-compass-mobile-notice" value="<?php echo $cc_compass_mob_notice; ?>">
	<input type="hidden" class="cc-is-mobile" value="<?php echo $cc_is_mobile; ?>">

	<?php
	if ( 'disabled' !== $cc_disable_branding ) {
		$cc_affiliate_id = get_option( 'cc_affiliate_id' );
		$powered_by_link = ! empty( $cc_affiliate_id ) ? 'https://www.usecaddy.com?ref=' . $cc_affiliate_id : 'https://www.usecaddy.com';
		?>
		<div class="cc-poweredby cc-text-center">
			<?php
			echo sprintf(
				'%1$s <img src="%2$s" alt="Voltage Emoji"> %3$s <a href="%4$s" rel="noopener noreferrer" target="_blank">%5$s</a>',
				__( 'Powered', 'caddy' ),
				plugin_dir_url( __DIR__ ) . 'img/voltage-emoji.png',
				__( 'by', 'caddy' ),
				esc_url( $powered_by_link ),
				__( 'Caddy', 'caddy' )
			);
			?>
		</div>
	<?php } ?>
</div>
