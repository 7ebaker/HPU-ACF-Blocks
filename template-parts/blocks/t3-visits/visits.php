<?php

/**
 * Visits Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'visits-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'visits';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview ) {
    $className .= ' is-admin';
}
$group = get_field('visits');

$i = 0;

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php if( $group ): ?>
    
    <div class="module-title">Schedule a Visit</div>
    
		<div class="row"><!-- Start Accordion -->
            <div class="col">
                <div class="tabs">
                      
			<?php while( have_rows('toggle_list') ): the_row(); 
				$label = get_sub_field('label') ?: 'Label';
                $content = get_sub_field('content') ?: 'Content - Lorem ipsum dolor sit amet, rutrum mi mus molestie porta donec, a risus pede, volutpat malesuada cum urna ac pede at, imperdiet phasellus amet suspendisse dapibus. Lacus sociosqu quam id, sed nullam, aliquam sit ac. Nisl hendrerit gravida convallis auctor ut nulla. Erat mi ultricies praesent justo erat.';
				?>
				
				<div class="eliTab"> <!-- Template for each accordion item -->
                    <input type="checkbox" id="chck<?php $i++; ?>">
				    <label class="tab-label" for="chck<?php $i++; ?>"><?php echo $label ?></label>
				    <div class="tab-content"><?php echo $content ?></div>
				</div> <!-- End Template for each accordion item -->
			<?php endwhile; ?>		
		         </div>
          </div> 
        </div><!-- End Accordion -->
	<?php else: ?>
		<p>Please add some toggle content.</p>
	<?php endif; ?>
</div>