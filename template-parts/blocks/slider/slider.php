<?php

/**
 * Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'slider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'slider';
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
    <?php if( have_rows('slides') ): ?>
		<div class="slides">
			<?php while( have_rows('slides') ): the_row(); 
				$image = get_sub_field('image') ?: 'https://picsum.photos/1200/300';
                //$title = get_sub_field('title') ?: 'Your title here...';
                $text = get_sub_field('testimonial') ?: 'Your testimonial here...';
                $name = get_sub_field('name') ?: '-FName LName';
                $role = get_sub_field('role') ?: 'Role';
                $text_color = get_sub_field('text_color');
				?>
				<div>
				<div class="slide-wrap" style="position: relative;
  text-align: center;">
					<img src="<?php echo $image ?>"><br>
					<blockquote class="testimonial-blockquote testimonial" style="color: <?php echo $text_color; ?>;">
                       <div class="testimonial-inner">
                        <span class="testimonial-text"><?php echo $text; ?></span><br>
                        <div style="margin-top:20px;">
                        <span class="testimonial-author"><?php echo $name; ?>, </span>
                        <span class="testimonial-role"><?php echo $role; ?></span> 
                        </div>  
                        </div>    
                    </blockquote>
                </div>
				</div>
			<?php endwhile; ?>
		</div>
	<?php else: ?>
		<p>Please add some slides.</p>
	<?php endif; ?>
</div>