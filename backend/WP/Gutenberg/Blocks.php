<?php
namespace Lean\WP\Gutenberg;

/**
 * Create the Gutenberg blocks.
 *
 * @package LeanNs
 */
class Blocks {
	/**
	 * Init.
	 */
	public static function init() {
		add_action( 'init', [ __CLASS__, 'create_blocks' ] );
	}

	/**
	 * Blocks creation.
	 * More information: https://www.advancedcustomfields.com/resources/acf_register_block_type/
	 */
	public static function create_blocks() {
		// ACF Button Block.
		self::create_block(
			[
				'title'       => 'ACF Button',
				'name'        => 'acf-button',
				'description' => 'ACF button block',
				'icon'        => 'button',
				'post_types'  => array( 'post', 'page' ),
			]
		);
	}

	/**
	 * Block generator
	 *
	 * @param array $args The name of the block.
	 */
	public static function create_block( $args ) {
		if ( isset( $args['title'] ) && '' !== $args['title'] &&
			isset( $args['name'] ) && '' !== $args['name'] &&
			function_exists( 'acf_register_block' ) ) {
			$args = wp_parse_args(
				$args,
				[
					'render_template' => 'backend/WP/Gutenberg/blocks/' . $args['name'] . '.php',
					'category'        => 'reusable',
					'icon'            => 'star-filled',
				]
			);

			acf_register_block( $args );
		}
	}
}
