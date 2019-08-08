<?php

/**
 * Masonry Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'masonry-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'masonry';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview ) {
    $className .= ' is-admin';
}

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php if( have_rows('masonry') ): ?>
		<div class="grid">
			<?php while( have_rows('masonry') ): the_row(); 
				$image = get_sub_field('image') ?: 'https://picsum.photos/1200/300';
				?>
				<div class="grid-item">
					<img src="<?php echo $image ?>">
				</div>
			<?php endwhile; ?>
		</div>
	<?php else: ?>
		<p>Please add some images.</p>
	<?php endif; ?>
</div>