<?php
/**
 * ACF Button Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

use Lean\Load;

// Create id attribute allowing for custom "anchor" value.
$id = 'acf-button-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'acf-button';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}

$link = get_field( 'link' );
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class_name ); ?>">
	<?php
		Load::atom(
			'buttons/link-as-button', [
				'label' => $link['title'],
				'url' => $link['url'],
				'target' => $link['target'] ? $link['target'] : '_self',
			]
		);
	?>
</div>
