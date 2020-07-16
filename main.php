<?php
/*
Plugin Name: Fake Pay For WooCommerce
Description: Creates a fake payment gateway for admin users.
Author: Anthony Graddy, Edited by Elias Turner
Author URI: https://sailextech.me
Plugin URI: https://github.com/sonicer105/wp-woo-fake-pay
Original Author URI: https://www.dashboardq.com
Original Plugin URI: https://github.com/agraddy/wp-woo-fake-pay
Version: 1.1.0
*/

add_action( 'plugins_loaded', 'fake_pay_init_gateway_class' );

add_filter( 'woocommerce_payment_gateways', 'fake_pay_add_gateway_class' );

function fake_pay_init_gateway_class() {
	class WC_Gateway_Fake_Pay extends WC_Payment_Gateway {
		function __construct() {
			$this->id = 'fake_pay';
			$this->method_title = 'Fake Pay';
			$this->method_description = 'Creates a fake payment gateway for admin users.';

			$this->init_form_fields();
			$this->init_settings();

			$this->title = $this->get_option( 'title' );
			$this->description = $this->get_option( 'description' );

			add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
		}

		function init_form_fields() {
			$this->form_fields = array(
				'enabled' => array(
					'title' => __( 'Enable/Disable', 'woocommerce' ),
					'type' => 'checkbox',
					'label' => __( 'Enable Fake Pay', 'woocommerce' ),
					'default' => 'no'
				),
				'title' => array(
					'title' => __( 'Title', 'woocommerce' ),
					'type' => 'text',
					'description' => __( 'Payment method title that the customer will see on your website.', 'woocommerce' ),
					'default' => __( 'Fake Pay', 'woocommerce' ),
					'desc_tip'      => true,
				),
				'description' => array(
					'title' => __( 'Description', 'woocommerce' ),
					'type' => 'textarea',
					'description' => __( 'Payment method description that the customer will see on your website.', 'woocommerce' ),
					'desc_tip'      => true,
					'default' => __( 'This option is only available to admin users.', 'woocommerce' )
				)
			);
		}

		function process_payment( $order_id ) {
			global $woocommerce;
			$order = new WC_Order( $order_id );

			$order->payment_complete();

			// Remove cart
			$woocommerce->cart->empty_cart();

			// Return thankyou redirect
			return array(
				'result' => 'success',
				'redirect' => $this->get_return_url( $order )
			);
		}
	}
}

function fake_pay_add_gateway_class( $methods ) {
	$methods[] = 'WC_Gateway_Fake_Pay'; 
	return $methods;
}

